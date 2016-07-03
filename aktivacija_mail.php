<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Mail poslan");

	$poslan = $_GET['poslan'];
	
	$smarty->assign ("mail_OK", "Poslan Vam je mail sa daljnjim uputama.");
	
	if ($poslan==1) {
		$smarty->assign ("mailOK", "Poslan Vam je mail sa daljnjim uputama.");
	}
	
	if ($poslan==2) {
		$smarty->assign ("mailNotOK", "Dogodila se greška prilikom slanja maila.");
	}
	
	$smarty->display('aktivacija_mail.tpl');

?>