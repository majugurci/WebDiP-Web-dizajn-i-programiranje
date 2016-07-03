<?php
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Časopisi");
	$smarty->assign ("include1", '<script type="text/javascript" src="js/jquery.paginatetable.js"></script>');
	$smarty->assign ("include2", '<script type="text/javascript" src="js/casopisi.js"></script>');

	$sql = "select * from broj_redaka where ID='1'";
	$rez = mysql_query($sql) or die(mysql_error());
	$red = mysql_fetch_row($rez);
	$broj_redaka = $red[1];
	
	$smarty->assign('brojRedaka', $broj_redaka);
	
	$totalNum = sizeof(Casopis::getAll());

	// dohvaćam id casopisa u polje
	
	$sql1 = "SELECT * FROM casopis";
	$rez1 = mysql_query($sql1) or die(mysql_error());
	$t=0;
	while($row1 = mysql_fetch_array($rez1)) {
		$idCasopisa[$t] = $row1['id_casopis'];
		$t++;
	}
	
	// za svaki casopis trazim ocjene i računam srednju aritmetičku vrijednost
	
	for ($k=0; $k<$totalNum; $k++) {
		$ocjena[$k] = 0;
		$brojac = 0;
		$sql = "select * from ocjena where casopis_id_casopis='$idCasopisa[$k]'";
		$rez = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($rez)) {
			$ocjena[$k] = $ocjena[$k] + $row['ocjena'];
			$brojac++;
		}
		if ($brojac != 0) {
			$ocjena[$k] = $ocjena[$k] / $brojac;
		}
	}	
		
	$smarty->assign('ocjena', $ocjena);
		
	$casopisi = Casopis::getAll("", "");
		
	if(isset($_GET['xml'])) {
		$smarty->assign('casopisi', $casopisi);
		header('Content-Type:text/xml');
		$smarty->display('casopisiXML.tpl'); 
	}
	else {
		$smarty->display("casopisi.tpl");
	}


?>