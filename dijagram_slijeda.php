<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Dijagrami slijeda");
    $smarty->display ("dijagram_slijeda.tpl");

?>