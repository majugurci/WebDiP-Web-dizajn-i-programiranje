<?php
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/DB.php');

	$smarty = new Smarty();
	session_start();
	
	$smarty->assign("naslov", "Uređivanje podataka");

	$korIme = $_SESSION['korIme'];
	$tipKorisnika = $_SESSION['tipKorisnika'];
	$slika = $_SESSION['slika'];

	$user = $_GET['editId'];
	
	$_SESSION['edit']=$user;
	
	$postoji = mysql_query ("select * from korisnik where korisnicko_ime = '$user'");
	$zapis = mysql_fetch_array ($postoji);
	
	//$korisnik = $zapis['korisnicko_ime'];
		
	$smarty->assign("user", $user);
	$smarty->assign("ime", $zapis['ime']);
	$smarty->assign("prezime", $zapis['prezime']);
	$smarty->assign("eMail", $zapis['email']);
	$smarty->assign("korIme1", $zapis['korisnicko_ime']);
	//$smarty->assign("korImeStaro", $zapis['korisnicko_ime']);
	$smarty->assign("lozinka", $zapis['lozinka']);
	$smarty->assign("lozinkaPot", $zapis['lozinka']);
	//$smarty->assign("registracija", $registracija);
	//$smarty->assign("greska", $greska);

	$smarty->assign("korIme", $korIme);
	$smarty->assign("tipKorisnika", $tipKorisnika);
	$smarty->assign("slika", $slika);
			
	$smarty->display("uredi.tpl");
?>