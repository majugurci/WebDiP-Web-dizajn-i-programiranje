<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Use case dijagram");
    $smarty->display ("uml.tpl");

?>