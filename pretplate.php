<?php
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Pretplate");
	
	$korisnik = $_SESSION['korIme'];

	$smarty->assign ("korisnik", $korisnik);
	
	
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
			
		$totalNum = sizeof(Casopis::getAll("", ""));
		
		$pages = ceil($totalNum / $pageSize) + 1;

		$casopisi = Casopis::getAll("", $limit);

		if ($pages > 5) {
			$pagstart = max($page - 2, 1);
			$pagend = min($pages, $page + 5);		
		} else {
			$pagstart = 1;
			$pagend = $pages;
		}
		
		$smarty->assign("pagstart", $pagstart);
		$smarty->assign("pagend", $pagend);
		$smarty->assign("casopisi", $casopisi);
		$smarty->assign("pages", $pages);
		$smarty->assign("page", $page + 1);
		$smarty->display("pretplate.tpl");

?>
	