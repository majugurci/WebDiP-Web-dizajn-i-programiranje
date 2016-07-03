<?php
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	require_once('recaptchalib.php');
	$mailhide_pubkey = '01E8kfaBvnR-lg95yzvxgSrw==';
	$mailhide_privkey = '7fffe2bbb6cc6335404956215875b74d';
	
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Korisnici");
	
	// ako korisnik nije admin ne može vidjeti popis kornisnika
	if ($_SESSION ['tipKorisnika']!=4) {
			$smarty->assign ("neovlasteno", "Pokušali ste pristupiti stranici za koju nemate dozvolu. Preusmjereni ste na poèetnu stranicu sustava!");
			$smarty->display ('index.tpl');
		}
	else {
		$page = 0;
		
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
		
		$totalNum = sizeof(Korisnik::getAll());
		
		$pages = ceil($totalNum / $pageSize) + 1;

		$korisnici = Korisnik::getAll("", $limit);

		foreach($korisnici as $korisnik) {
			$korisnik->email = recaptcha_mailhide_html ($mailhide_pubkey,
                              $mailhide_privkey,
                              $korisnik->email);
		}
		
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
		$smarty->display("korisnici.tpl");
	}
?>