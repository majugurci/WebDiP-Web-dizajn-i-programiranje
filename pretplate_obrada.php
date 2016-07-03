<?php
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Pretplate");
	
	$korisnik = $_SESSION['korIme'];

	$smarty->assign ("korisnik", $korisnik);
	
	$korisnikID = $_SESSION['id_korisnik'];

	if (isset($_GET['casopisID'])) {
		$casopisID = mysql_real_escape_string($_GET['casopisID']);
	}
		
	if (isset($_GET['casopisNaziv'])) {
		$casopisNaziv = mysql_real_escape_string($_GET['casopisNaziv']);
	}
	
	$smarty->assign ("casopisNaziv", $casopisNaziv);
	
	
	// ispitujem je li korisnik pretplaæen na èasopis, ako je ispisujem mu do kada mu traje pretplata
	
	$sql = "select pretplata_id_pretplata from casopis_pretplate where casopis_id_casopis='$casopisID'";
	$rez = mysql_query($sql) or die(mysql_error());
	//$red = mysql_fetch_row($rez);
	$i=0;
	while ($red = mysql_fetch_array($rez)){
		$pretplate[$i] = $red[0];
		$i++;
	}

	$totalNum = sizeof($pretplate);
	
	for ($j=0; $j<$totalNum; $j++){
		$sql = "select * from pretplata where id_pretplata='$pretplate[$j]' and id_korisnik='$korisnikID'";
		$rez = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows ($rez) == 1) {
			$red = mysql_fetch_row($rez);
			$vrijemeKraja = $red[3];
			$smarty->assign ("vrijemeKraja", $vrijemeKraja);
		}
		
	}
	

	
	
	
	
	// ako korisnik odabere neku pretplatu
		
	if (isset($_GET['pretplata'])) {
		$pretplata = mysql_real_escape_string($_GET['pretplata']);
		
		// dohvat sustavskog vremena
		
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
							
		// pocetak pretplate
		$pocetak = date("Y-m-d H:i:s", $pomak);
		
		$kraj = $pomak + ($pretplata*60*60*24);
		
		// kraj pretplate
		$kraj = date("Y-m-d H:i:s", $kraj);
		
		// upisujem pretplatu u bazu
		mysql_query("INSERT INTO pretplata (id_korisnik, datum_pocetka, datum_isteka)
				VALUES ('$korisnikID', '$pocetak', '$kraj') ") or die(mysql_error());	
				
		// dohvaæam ID pretplate
		$sql = "select * from pretplata where datum_pocetka='$pocetak'";
		$rez = mysql_query($sql) or die(mysql_error());
		$red = mysql_fetch_row($rez);
		$pretplataID = $red[0];
		
		mysql_query("INSERT INTO casopis_pretplate (casopis_id_casopis, pretplata_id_pretplata)
				VALUES ('$casopisID', '$pretplataID') ") or die(mysql_error());	
		header("Location: http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/pretplate_obrada.php?casopisID=$casopisID&casopisNaziv=$casopisNaziv");
	}
	
	$smarty->display("pretplate_obrada.tpl");

?>
	