<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Otključaj račune");
	
	if ($_SESSION ['tipKorisnika']!=4) {
			$smarty->assign ("neovlasteno", "Pokušali ste pristupiti stranici za koju nemate dozvolu. Preusmjereni ste na početnu stranicu sustava!");
			$smarty->display ('index.tpl');
		}
	else {
		if (isset($_GET['editId'])) {
			$korisnikID = mysql_real_escape_string($_GET['editId']);
		}
		
		if (isset ($korisnikID)) {
			mysql_query("UPDATE korisnik SET status_korisnika_id_status='2', neuspjesne_prijave='0' WHERE id_korisnik='$korisnikID'") or die(mysql_error());
			// refresh stranice po zavrestku otključavanja
			header("Location: http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/zakljucani.php");
		}
				
		$page = 0;
		$pageSize = 5;
		if (isset($_GET['page'])) {
			$page = mysql_real_escape_string($_GET['page']);
			$page = $page - 1; //ljepse je vidjeti stranica 1 u ispisu nego stranica 0
		}
		$offset = $page * $pageSize;
		
		// ograničenja za bazu podataka, korisnikID se preuzima iz _GET
		
		$limit = " LIMIT $pageSize OFFSET $offset";
		
		$where = "status_korisnika_id_status='3'";
		
		// uzimam broj zakključanih kako bi znao prikazati poruku ako ih nema
		
		$totalNum = sizeof(Korisnik::getAll($where, $limit));
		
		$smarty->assign("brojZakljucanih", $totalNum);

		$korisnici = Korisnik::getAll($where, $limit);

		if ($pages > 5) {
			$pagstart = max($page - 2, 1);
			$pagend = min($pages, $page + 5);		
		} else {
			$pagstart = 1;
			$pagend = $pages;
		}
		
		$smarty->assign("pagstart", $pagstart);
		$smarty->assign("pagend", $pagend);
		$smarty->assign("korisnici", $korisnici);
		$smarty->assign("pages", $pages);
		$smarty->assign("page", $page + 1);
		$smarty->display("zakljucani.tpl");
	}
	
?>