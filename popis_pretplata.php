<?php
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Popis pretplata");
	
	$page = 0;
		
		// dohvaćam broj redaka po stranici
		$sql = "select * from broj_redaka where ID='1'";
		$rez = mysql_query($sql) or die(mysql_error());
		$red = mysql_fetch_row($rez);
		$broj_redaka = $red[1];
		
		$pageSize = $broj_redaka;
		if (isset($_GET['page'])) {
			$page = mysql_real_escape_string($_GET['page']);
			$page = $page - 1; //ljepse je vidjeti stranica 1 u ispisu nego stranica 0
		}
		$offset = $page * $pageSize;
				
		$limit = " LIMIT $pageSize OFFSET $offset";
			
		$totalNum = sizeof(Pretplata::getAll("", ""));
		
		$pages = ceil($totalNum / $pageSize) + 1;

		$pretplate = Pretplata::getAll("", $limit);

		// dohvaćam ime korisnika, da ne bih prikazivao njegov id
		for ($i=0; $i<$totalNum; $i++) {
			$kor = $pretplate[$i]->id_korisnik;
			$sql = "select korisnicko_ime from korisnik where id_korisnik='$kor'";
			$rez = mysql_query($sql) or die(mysql_error());
			$koris = mysql_fetch_row($rez);
			$korisni[$i] = $koris[0];
		}
		$smarty->assign("korisnik", $korisni);
		
		// dohvaćam ID časopisa iz druge tablice temeljem id pretplate
		for ($i=0; $i<$totalNum; $i++) {
			$pretplataID = $pretplate[$i]->id_pretplata;
			$sql = "select casopis_id_casopis from casopis_pretplate where pretplata_id_pretplata='$pretplataID'";
			$rez = mysql_query($sql) or die(mysql_error());
			$casop = mysql_fetch_row($rez);
			$casopisID[$i] = $casop[0];
		}
		
		// dohvaćam naziv časopisa iz druge tablice temeljem id pretplate
		for ($i=0; $i<$totalNum; $i++) {
			$sql = "select naziv from casopis where id_casopis='$casopisID[$i]'";
			$rez = mysql_query($sql) or die(mysql_error());
			$casop = mysql_fetch_row($rez);
			$casopis[$i] = $casop[0];
		}
		$smarty->assign("casopis", $casopis);

		if ($pages > 5) {
			$pagstart = max($page - 2, 1);
			$pagend = min($pages, $page + 5);		
		} else {
			$pagstart = 1;
			$pagend = $pages;
		}
		
		$smarty->assign("pagstart", $pagstart);
		$smarty->assign("pagend", $pagend);
		$smarty->assign("pretplate", $pretplate);
		$smarty->assign("pages", $pages);
		$smarty->assign("page", $page + 1);
		$smarty->display("popis_pretplata.tpl");

?>
	