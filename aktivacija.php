<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	require("classes/DB.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Aktivacija");
    //$smarty->display ("aktivacija.tpl");

	$token = $_GET['token'];
	
	if (!($file = @fopen("pomak.xml",'r'))) {
				$pomak = 0;
			}else{
				$xml = fread($file, 10000);
				fclose($file);
				$dat = new DOMDocument;
				$dat->loadXML($xml);
				$pom = $dat->getElementsByTagName('pomak');
				foreach ($pom as $p) {
					$atribut = $p->attributes;
					foreach ($atribut as $attr => $vrijednost) {
						if ($attr == "brojSati") {
						$pomak = $vrijednost->value;
						}
					}
				}
			}
	
	$pomak = $pomak*60*60;
	
	$kod = mysql_query("select * from korisnik where aktivacijski_kod = '$token'");
	
	if ((mysql_num_rows ($kod) == 1) && (($token + 24*60*60) > (time()+$pomak))) {
		if ((mysql_query ("update korisnik set status_korisnika_id_status = 2 where aktivacijski_kod='$token'"))) {
				$smarty->assign ("aktivacijaOk", "Vaš račun je aktiviran.");
				$smarty->display('aktivacija.tpl');
		}
		else {
			$smarty->assign ("aktivacijaGreska", "Problem kod aktivacije vašeg računa.");
			$smarty->display('aktivacija.tpl');
		}
	}
	else {
		$smarty->assign ("aktivacijaNotOk", "Period aktivacije vašeg računa je istekao.");
		$smarty->display('aktivacija.tpl');
	}
	mysql_close();
?>