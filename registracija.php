<?php
	require('classes/DB.php');
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	require_once('recaptchalib.php');
	$publickey = "6LdzItISAAAAAB95OGcT7TDBcoTdtByer18FM1bz";
	$privatekey = "6LdzItISAAAAAJWguhuA3Pmn-f5fWcIiK2_YYFMQ ";
	
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Registracija");
	
	$smarty->assign ("include1", '<script type="text/javascript" src="js/validacija_reg_log.js"></script>');

if (isset ($_POST['ime'])) {
	$ime = $_POST ['ime'];
	$prezime = $_POST ['prezime'];
	$eMail = $_POST ['eMail'];
	$korIme = $_POST ['korIme'];
	$lozinka = $_POST ['lozinka'];
	$lozinkaPot = $_POST ['lozinkaPot'];
	$slikaIme = $_FILES ['slika']['name'];
	$slikaImePrivremeno = $_FILES ['slika']['tmp_name'];
	$slikaEkstenzija = $_FILES ['slika']['type'];
	$slikaVelicina = $_FILES ['slika']['size'];
	
	if (empty ($ime)) {
		$greska ['ime'] = "Niste unijeli ime";
		$smarty->assign ("greskaIme", "Niste unijeli ime");
	} 
	else {
		$smarty->assign ("ime", $ime);
	}
	if (empty ($prezime)) {
		$greska ['prezime'] = "Niste unijeli prezime";
		$smarty->assign ("greskaPrezime", "Niste unijeli prezime");
	}
	else {
		$smarty->assign ("prezime", $prezime);
	}
	if (empty ($eMail)) {
		$greska ['eMail'] = "Niste unijeli email adresu";
		$smarty->assign ("greskaEmail", "Niste unijeli e-mail adresu");
	}
	else {
		$smarty->assign ("eMail", $eMail);
	}
	if (empty ($korIme)) {
		$greska ['korIme'] = "Niste unijeli korisničko ime";
		$smarty->assign ("greskaKorIme", "Niste unijeli korisničko ime");
	}
	else {
		$smarty->assign ("korIme", $korIme);
	}
	$korisnicko_ime = mysql_query ("SELECT * FROM korisnik WHERE korisnicko_ime = '".$korIme."'");
	
	if (mysql_num_rows ($korisnicko_ime) == 1) {
			$greska ['korImePostoji'] = "Korisničko ime je zauzeto";
			$smarty->assign ("greskaKorImePostoji", "Korisničko ime je zauzeto");
		}
	if (empty ($lozinka)) {
		$greska ['lozinka'] = "Niste unijeli lozinku";
		$smarty->assign ("greskaLozinka", "Niste unijeli lozinku");
	}
	else {
		$smarty->assign ("lozinka", $lozinka);
	}
	if (strlen($lozinka) < 6){
		$greska['lozinkaDuzina'] = "Lozinka treba sadržavati najmanje 6 znakova";
		$smarty->assign ("greskaLozinkaDuzina", "Lozinka treba sadržavati najmanje 6 znakova");
	}
	if (!preg_match("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!\"#$%&/()=?*]).{6,20})", $lozinka)) {
		$greska ['lozinka_krivo'] = "U lozinci moraju biti mala i velika slova, brojevi i posebni znakovi";
		$smarty->assign ("greskaLozinka_krivo", "U lozinci moraju biti mala i velika slova, brojevi i posebni znakovi");
	}
	if (empty ($lozinkaPot)) {
		$greska ['lozinkaPot'] = "Niste unijeli potvrdu lozinke";
		$smarty->assign ("greskaLozinkaPot", "Niste unijeli potvrdu lozinke");
	}
	else {
		$smarty->assign ("lozinkaPot", $lozinkaPot);
	}
	if ($lozinka != $lozinkaPot){
		$greska['lozinkaJednake'] = "Niste unijeli jednaku lozinku";
		$smarty->assign ("greskaLozinkaJednake", "Niste unijeli jednaku lozinku");
	}
	if (empty ($slikaIme)) {
		$greska ['slika'] = "Niste odabrali sliku";
		$smarty->assign ("greskaSlika", "Niste odabrali sliku");
	}
	else {
		$smarty->assign ("slikaIme", $slikaIme);
	}
	$imeSlikeSpremljeno = time() . "_$slikaIme";
	if ((($slikaEkstenzija == "image/gif") || ($slikaEkstenzija == "image/jpg") || ($slikaEkstenzija == "image/jpeg") || ($slikaEksteznija == "image/png")) && ($slikaVelicina<(1024*1024))) {
		move_uploaded_file ($slikaImePrivremeno, "upload/" . $imeSlikeSpremljeno);
	}
	else {
		$greska ['slikaEkstenzija'] = "Podržane esktenzije slike su: .gif, .jpg., .jpeg, .png veličine manje od 1 mb.";
		$smarty->assign ("greskaSlikaEkstenzija", "Podržane esktenzije slike su: .gif, .jpg., .jpeg, .png veličine manje od 1 mb.");
	}
	//captcha provjera
			if ($_POST["recaptcha_response_field"]) {
			
				$resp = recaptcha_check_answer ($privatekey,
								$_SERVER["REMOTE_ADDR"],
								$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);
			
				if ($resp->is_valid) {
					
				} else {
					# set the error code so that we can display it
					
					$error = $resp->error;
					$greska['recaptcha'] = "Krivo ste unijeli riječi";
					$smarty->assign ("greskaRecaptcha", "Niste dobro unijeli riječi");
					
				}
			} else {
				$greska['recaptcha'] = "Krivo ste unijeli riječi";
				$smarty->assign ("greskaRecaptcha", "Niste dobro unijeli riječi");
			}
			$smarty->assign("recaptcha", recaptcha_get_html($publickey, $error));
			//kraj captcha provjera

	if (empty ($greska)) {
	
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
		
		$token = time() + $pomak;
		
		$slikaBaza = "http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/upload/". $imeSlikeSpremljeno;
		
		mysql_query("INSERT INTO korisnik (status_korisnika_id_status, tip_korisnika_id_tip, korisnicko_ime, ime, prezime, email, lozinka, slika, aktivacijski_kod)
			VALUES ('1', '2', '$korIme', '$ime', '$prezime', '$eMail', '$lozinka', '$slikaBaza', '$token') ") or die(mysql_error());
			
		
		$mail = "Otvorite http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/aktivacija.php?token=$token kako bi aktivirali Vaš korisnički račun";
		
		if (mail ($eMail, 'Aktivacija', $mail)) {
			$poslan = 1;
		}
		else {
			$poslan = 2;
		}
		include("aktivacija_mail.php");
		//$smarty->display('korisnici.tpl');
		
	}

		else {
			$smarty->assign("recaptcha", recaptcha_get_html($publickey, $error));
			$smarty->display('registracija.tpl');
			//include("registracija.php");
		}
	}
	else { 
		$smarty->assign("recaptcha", recaptcha_get_html($publickey, $error));
		$smarty->display("registracija.tpl");
	}

?>