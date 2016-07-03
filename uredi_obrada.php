<?php
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/DB.php');

	$smarty = new Smarty();
	session_start();
	
	$smarty->assign("naslov", "Uređivanje podataka");

	$korImeStaro = $_SESSION['edit'];
	
	if ($_SESSION['tipKorisnika']!=4 && $_SESSION['korIme']!=$korImeStaro) {
		
	}
	else {
	
	if (isset ($_POST['salji'])) {
	$ime = $_POST ['ime'];
	$prezime = $_POST ['prezime'];
	$eMail = $_POST ['eMail'];
	$korIme1 = $_POST ['korIme'];
	$lozinka = $_POST ['lozinka'];
	$lozinkaPot = $_POST ['lozinkaPot'];
	$slikaIme = $_FILES ['slika']['name'];
	$slikaImePrivremeno = $_FILES ['slika']['tmp_name'];
	$slikaEkstenzija = $_FILES ['slika']['type'];
	
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
	if (empty ($korIme1)) {
		$greska ['korIme'] = "Niste unijeli korisničko ime";
		$smarty->assign ("greskaKorIme", "Niste unijeli korisničko ime");
	}
	else {
		$smarty->assign ("korIme1", $korIme1);
	}
	$korisnicko_ime = mysql_query ("SELECT * FROM korisnik WHERE korisnicko_ime = '$korIme1'");
	$zapis = mysql_fetch_array ($korisnicko_ime);
	
	$korisnicko_ime1 = mysql_query ("SELECT * FROM korisnik WHERE korisnicko_ime = '$korImeStaro'");
	$zapis1 = mysql_fetch_array ($korisnicko_ime1);
	
	$korisnik = $zapis1['korisnicko_ime'];
	$slika = $zapis1['slika'];

	if (mysql_num_rows ($korisnicko_ime) == 1) {
			if ($zapis['korisnicko_ime'] == $korImeStaro) {
			
			}
			else {
			$greska ['korImePostoji'] = "Korisničko ime je zauzeto";
			$smarty->assign ("greskaKorImePostoji", "Korisničko ime je zauzeto");
			}
		}
	if (empty ($lozinka)) {
		$greska ['lozinka'] = "Niste unijeli lozinku";
		$smarty->assign ("greskaLozinka", "Niste unijeli lozinku");
	}
	else {
		$smarty->assign ("lozinka", $lozinka);
	}/*
	if (strlen($lozinka1) < 6){
		$greska['lozinkaDuzina'] = "Lozinka treba sadržavati najmanje 6 znakova";
		$smarty->assign ("greskaLozinkaDuzina", "Lozinka treba sadržavati najmanje 6 znakova");
	}
	if (!preg_match("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!\"#$%&/()=?*]).{6,20})", $lozinka1)) {
		$greska ['lozinka_krivo'] = "U lozinci moraju biti mala i velika slova, brojevi i posebni znakovi";
		$smarty->assign ("greskaLozinka_krivo", "U lozinci moraju biti mala i velika slova, brojevi i posebni znakovi");
	}*/
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
		$smarty->assign ("slikaIme", $slika);
		$slikaBaza = "$slika";
	}
	else {
		$smarty->assign ("slikaIme", $slikaIme);
		$imeSlikeSpremljeno = time() . "_$slikaIme";
		
		if ($slikaEkstenzija !=	"image/gif" || $slikaEkstenzija != "image/jpg" || $slikaEkstenzija != "image/jpeg" || $slikaEksteznija != "image/png") {
		move_uploaded_file ($slikaImePrivremeno, "upload/" . $imeSlikeSpremljeno);
		}
		
		else {
		$greska ['slikaEkstenzija'] = "Podržane esktenzije slike su: .gif, .jpg., .jpeg, .png";
		$smarty->assign ("greskaSlikaEkstenzija", "Podržane esktenzije slike su: .gif, .jpg., .jpeg, .png");
	
	}
	
	$slikaBaza = "http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/upload/". $imeSlikeSpremljeno;
	}
	
	
	
	if (empty ($greska)) {
		//$token = time();
		
		mysql_query ("UPDATE korisnik SET korisnicko_ime='$korIme1', ime='$ime', prezime='$prezime', email='$eMail', lozinka='$lozinka', slika='$slikaBaza' WHERE korisnicko_ime='$korImeStaro'") or die(mysql_error());
		
		
		//include("korisnici.php");
		//$smarty->display('korisnici.tpl');
		
		// mijenjam podatke u sessionu samo ako mijenjam svoje podatke
		if ($korImeStaro == $_SESSION['korIme']) {
		$_SESSION['korIme'] = $korIme1;
		$_SESSION['slika'] = $slikaBaza;
		}
		header("Location:index.php");
		
	}

		else {
			$smarty->display('uredi.tpl');
			//include("registracija.php");
		}
	}	
}
?>