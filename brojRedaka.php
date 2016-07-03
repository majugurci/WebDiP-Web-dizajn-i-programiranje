<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Broj redaka");
	
	if ($_SESSION ['tipKorisnika']!=4) {
			$smarty->assign ("neovlasteno", "Pokušali ste pristupiti stranici za koju nemate dozvolu. Preusmjereni ste na početnu stranicu sustava!");
			$smarty->display ('index.tpl');
		}
	else {
		if (isset ($_POST['salji'])) {
			$brojRedaka = $_POST['brojRedaka'];
			
			mysql_query("UPDATE broj_redaka SET broj='$brojRedaka' WHERE ID='1'") or die(mysql_error());
		}
	
		$sql = "select * from broj_redaka where ID='1'";
		$rez = mysql_query($sql) or die(mysql_error());
		$red = mysql_fetch_row($rez);
		$broj_redaka = $red[1];
			
		$smarty->assign("broj_redaka", $broj_redaka);
	
		$smarty->display("brojRedaka.tpl");
	}
	
?>