<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/DB.php');
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "Prijava");
	
	if (isset ($_GET['odjava'])) {
		unset ($_SESSION['korisnik']);
		session_destroy();
		header ('Location:index.php');
	} 
	
	if (isset($_POST['saljiLog'])) {
		$korIme = mysql_real_escape_string($_POST['korIme']);
		$lozinka = mysql_real_escape_string($_POST['lozinka']);
	
		
		if(empty($korIme)) {
			$greska ['korIme'] = "Niste unijeli korisničko ime";
			$smarty->assign ("greskaKorIme", "Niste unijeli korisničko ime");
		}

		if(empty($lozinka)) {
			$greska ['lozinka'] = "Niste unijeli lozinku";
			$smarty->assign ("greskaLozinka", "Niste unijeli lozinku");
		}

	if (empty($greska)) {
		
		$postoji = mysql_query ("select * from korisnik where korisnicko_ime = '$korIme'");
		
		if (mysql_num_rows ($postoji) == 1) { 
			$zapis = mysql_fetch_array ($postoji);
			$aktiviran = $zapis [1];
			$password = $zapis [7];
			$brojPrijava = $zapis [10];
			
			// ako unese dobro ime, lozinku i sa racunom je sve u redu
			if (($aktiviran=='2') && ($password==$lozinka)) {
				$id_korisnik = $zapis [0];
				$korIme = $zapis [3];
				$tipKorisnika = $zapis [2];
				$slika = $zapis [8];
				$_SESSION['id_korisnik'] = $id_korisnik;
				$_SESSION['korIme'] = $korIme;
				$_SESSION['tipKorisnika']=$tipKorisnika;
				$_SESSION['slika'] = $slika;
				if (isset($_POST['zapamtiMe'])) {
					setcookie("Korisnik", $korIme, time()+60*60*2);
				} 
				else {
					setcookie ("Korisnik", "", time() - 60*60*2);
				}
				
				// vracam broj neuspjesnih prijava na 0 nakon sto se uspjesno logira
				mysql_query("UPDATE korisnik SET neuspjesne_prijave='0' WHERE korisnicko_ime='$korIme'") or die(mysql_error());
				
				mysql_close();
				header('Location:index.php');
			}
			else {
				if ($aktiviran=='1') {
					$smarty->assign ("greskaLogin1", "Vaš korisnički račun još nije aktiviran.");
					$greska ['greskaLogin1'] = "Vaš korisnički račun još nije aktiviran.";
				}
				if ($aktiviran=='2') {
					
					// ako je unesena kriva lozinka i to 3 put onda zakljucavam racun, inace povecavam broj neuspjesnih prijava za 1
					if ($brojPrijava==2) {
						$smarty->assign ("greskaLogin3", "3 puta ste unijeli krivo lozinku, Vaš korisnički račun je blokiran.");
						mysql_query("UPDATE korisnik SET status_korisnika_id_status='3' WHERE korisnicko_ime='$korIme'") or die(mysql_error());
						
					}
					else {
						$smarty->assign ("greskaLogin2", "Unijeli ste krivu lozinku.");
						$brojPrijava = $brojPrijava+1;
						mysql_query("UPDATE korisnik SET neuspjesne_prijave='$brojPrijava' WHERE korisnicko_ime='$korIme'") or die(mysql_error());
					}
					
				}
				if ($aktiviran=='3') {
					$smarty->assign ("greskaLogin3", "Vaš korisnički račun je blokiran.");
					$greska ['greskaLogin3'] = "Vaš korisnički račun je blokiran.";
				}
				if ($aktiviran=='4') {
					$smarty->assign ("greskaLogin4", "Vaš korisnički račun je zamrznut.");
					$greska ['greskaLogin4'] = "Vaš korisnički račun je zamrznut.";
				}
				if ($aktiviran=='5') {
					$smarty->assign ("greskaLogin4", "Vaš korisnički račun je obrisan.");
					$greska ['greskaLogin5'] = "Vaš korisnički račun je obrisan.";
				}
				$smarty->display('prijava.tpl');
			}
			
		} 
		else {
			$smarty->assign ("greskaLogin6", "Račun s unešenim podacima ne postoji.");
			$smarty->display('prijava.tpl');
		}
	}
	}
	else { 
		$Korisnik="";
		if (isset($_COOKIE['Korisnik'])) {
			$Korisnik = $_COOKIE['Korisnik'];	
		}
		
		$smarty->assign("Korisnik", $Korisnik);
		$smarty->display("prijava.tpl");
	}

?>