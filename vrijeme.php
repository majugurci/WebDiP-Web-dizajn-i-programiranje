<?php
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Postavi vrijeme");

	if ($_SESSION['tipKorisnika'] !=4) {
		$smarty->assign("neovlasteno", "Samo administrator može pristupiti ovoj stranici");
		$smarty->display("vrijeme.tpl");
	}
	else {
	
		$url = 'http://arka.foi.hr/PzaWeb/PzaWeb2004/config/pomak.xml';

		if($_GET['uzmi'] == 'pomak'){
			
			
			// uzimanje pomaka i spremanje u lokalnu datoteku pomak.xml
			if(!($file = @fopen($url,'r'))) {
				  $greska = 'Došlo je do pogreške prilikom pomaka vremena';
				  return $greska;
			 }

			 $xml = fread($file, 1000);
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

			 $file = fopen("pomak.xml",'w');

			 fwrite($file,$xml);
			 fclose($file);
			
			$smarty->assign("return", $pomak);
		}
		
		$time = date("Y.m.d.-H:i:s", time());
		
		
		// isčitavanje pomaka iz datoteke
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

			$pomak = time() + ($pomak*60*60);
		
		
		$vrijeme = date("Y.m.d.-H:i:s", $pomak);
		$smarty->assign("vrijeme", $vrijeme);
		$smarty->assign("time", $time);
		$smarty->display("vrijeme.tpl");
	}
?>