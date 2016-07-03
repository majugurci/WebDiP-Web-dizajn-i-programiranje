<?php
	require('classes/DB.php');
	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Povrat lozinke");

if (isset ($_POST['saljiLozinku'])) {
	$korIme = $_POST ['korIme'];
	$eMail = $_POST ['eMail'];

	if (empty ($korIme)) {
		$greska ['korIme'] = "Niste unijeli korisničko ime";
		$smarty->assign ("greskaKorIme", "Niste unijeli korisničko ime");
	}
	else {
		$smarty->assign ("korIme", $korIme);
	}
	$korisnicko_ime = mysql_query ("SELECT * FROM korisnik WHERE korisnicko_ime = '".$korIme."'");
	
	if (mysql_num_rows ($korisnicko_ime) == 0) {
			$greska ['korImeNePostoji'] = "Korisničko ime ne postoji.";
			$smarty->assign ("greskaKorImeNePostoji", "Korisničko ime ne postoji.");
		}
	else {
	
		if (empty ($eMail)) {
			$greska ['eMail'] = "Niste unijeli email adresu";
			$smarty->assign ("greskaEmail", "Niste unijeli e-mail adresu");
		}
		else {
			$smarty->assign ("eMail", $eMail);
		}
		$mail = mysql_query ("SELECT * FROM korisnik WHERE email = '".$eMail."' AND korisnicko_ime = '".$korIme."'");
		
		if (mysql_num_rows ($mail) == 0) {
			$greska ['emailNePostoji'] = "Niste unijeli ispravan e-mail.";
			$smarty->assign ("emailNePostoji", "Niste unijeli ispravan e-mail.");
		}
	}
	
	if (empty ($greska)) {
		$lozinka = "";
		
		// definiram znakove koji mogu doci u pass
		$niz = "abcdefghijklmnoprstuvzABCDEFGHIJKLMNOPRSTUVZ123467890!#$&%";
		
		$duzina = strlen($niz);
		
		$i = 0;
	
		while ($i < 7) { 
			$znak = substr($niz, mt_rand(0, $duzina), 1);
			$lozinka .= $znak;
			$i++;
		}

		mysql_query("UPDATE korisnik SET lozinka='$lozinka' WHERE korisnicko_ime='$korIme'") or die(mysql_error());
			
		
		$mail = "Vaša nova lozinka je: $lozinka . Predlažemo da ju čim prije promjenite.";
		
		if (mail ($eMail, 'Zaboravljena lozinka', $mail)) {
			$poslan = 1;
		}
		else {
			$poslan = 2;
		}
		include("aktivacija_mail.php");
		
	}

	else {
			$smarty->display('zaboravljenaLozinka.tpl');
		}
	}
	else { 
		$smarty->display("zaboravljenaLozinka.tpl");
	}

?>