<?php
	require_once("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	include ('classes/korisnik.php');
	include ('classes/DB.php');
	include('komentariInline.php');

	$smarty = new Smarty();
	session_start();
	
	$smarty->assign("naslov", "Detalji");
	
	// uključivanje potrebnih biblioteka za js/jquery
	
	$smarty->assign ("include1", '<link href="css/lightbox.css" rel="stylesheet" />');
	$smarty->assign ("include2", '<script src="js/jquery-1.7.2.min.js"></script>');
	$smarty->assign ("include3", '<script src="js/lightbox.js"></script>');
	$smarty->assign ("include4", '<script src="js/jquery.js" type="text/javascript"></script>');
	$smarty->assign ("include5", '<script src="js/inlineEdit.js" type="text/javascript"></script>');
	

	
	if (!isset ($_SESSION ['korIme'])) {
			$smarty->assign ("casopisiDetalji", "Kako bi vidjeli detalje časopisa prijavite se");
			$smarty->display ('prijava.tpl');
		}
	else {
	
		if (isset($_GET['casopisID'])) {
			$casopisID1 = mysql_real_escape_string($_GET['casopisID']);
		}
	
		if (isset($_GET['casopisNaziv'])) {
			$casopisNaziv = mysql_real_escape_string($_GET['casopisNaziv']);
		}
	
		$smarty->assign ("casopisNaziv", $casopisNaziv);
	
		$korisnik = $_SESSION['id_korisnik'];
		
		// provjeravam je li korisnik već ocjenio časopis, ako nije dopuštam mu ocjenjivanje
		
		$sql = "select * from ocjena where korisnik_id_korisnik='$korisnik' and casopis_id_casopis='$casopisID1'";
		$rez = mysql_query($sql) or die(mysql_error());
		$koris = mysql_fetch_row($rez);
		$ocjena1 = $koris[1];
		
		$smarty->assign("ocjenjeno", $ocjena1);
	
		// ocjenjivanje sadrzaja
		
		if ((isset ($_POST['ocjena'])) && !(isset ($ocjena1))) {
			$ocjena2 = $_POST ['ocjena2'];
		
			mysql_query("INSERT INTO ocjena (ocjena, casopis_id_casopis, korisnik_id_korisnik)
			VALUES ('$ocjena2', '$casopisID1', '$korisnik') ") or die(mysql_error());
			
			// refresh stranice po zavrestku upisa ocjene
			header("Location: #");
		}
		
		// komentiranje sadrzaja
		
		if (isset ($_POST['komentar1'])) {
			$komentar2 = $_POST ['komentar2'];
			
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
			
			$date = date("Y-m-d H:i:s", $pomak); 
		
			mysql_query("INSERT INTO komentar (casopis_id_casopis, korisnik_id_korisnik, datum, tekst)
			VALUES ('$casopisID1', '$korisnik', '$date', '$komentar2') ") or die(mysql_error());
			
			// refresh stranice po zavrestku upisa komentara
			header("Location: #");
		}
	
		$page = 0;
		
		// dohvaćam broj redaka po stranici
		$sql = "select * from broj_redaka where ID='1'";
		$rez = mysql_query($sql) or die(mysql_error());
		$red = mysql_fetch_row($rez);
		$broj_redaka = $red[1];
		
		$pageSize = $broj_redaka;
		if (isset($_GET['page'])) {
			$page = mysql_real_escape_string($_GET['page']);
			$page = $page - 1; //ljepse je vidjeti stranica 1 u ispisu nego stranica 0
		}
		$offset = $page * $pageSize;
		
		// ograničenja za bazu podataka, casopisID1 se preuzima iz _GET
		
		$limit = " LIMIT $pageSize OFFSET $offset";
		
		$where = "casopis_id_casopis='".$casopisID1."'";
			
		$totalNum = sizeof(Komentar::getAll($where, ""));
		
		$pages = ceil($totalNum / $pageSize) + 1;
		
		// dohvaćanja slika za galeriju
		
		$slike = Slika::getAll($where, "");
		
		$smarty->assign("slike", $slike);

		$komentari = Komentar::getAll($where, $limit);
				
		// dohvaćam ime korisnika
		
		for ($i = 0; $i < $broj_redaka; $i++) {
			$kor = $komentari[$i]->korisnik_id_korisnik;
			$sql = "select korisnicko_ime from korisnik where id_korisnik='$kor'";
			$rez = mysql_query($sql) or die(mysql_error());
			$koris = mysql_fetch_row($rez);
			$korisni[$i] = $koris[0];
		}
		$smarty->assign("koris", $korisni);
		
		$trenutniKorisnik = $_SESSION['tipKorisnika'];
		$trenutniKorisnikID = $_SESSION['id_korisnik'];
		
		if ($trenutniKorisnik == 4) {
			$where2 = "id_casopis = '$casopisID1'";
			$casopisiAdmin = Casopis::getAll($where2, $limit);
			
			$smarty->assign("casopisiAdmin", $casopisiAdmin);
			
		}
		
		if ($trenutniKorisnik == 3) {
			$where1 = "id_casopis='$casopisID1' and korisnik_id_korisnik='$trenutniKorisnikID'";
			$casopisiMod = Casopis::getAll($where1, $limit);
			
			$provjeri = mysql_query ("SELECT * FROM casopis WHERE id_casopis='$casopisID1' and korisnik_id_korisnik='$trenutniKorisnikID'");
			
			if (mysql_num_rows ($provjeri) == 1) {
				$smarty->assign("casopisiMod", $casopisiMod);
				
			}
			else {
				$smarty->assign("nijeMod", "Nije mod ovog časopisa");
			}
			
			
		}
	

		if ($pages > 5) {
			$pagstart = max($page - 2, 1);
			$pagend = min($pages, $page + 5);		
		} else {
			$pagstart = 1;
			$pagend = $pages;
		}
		
		$smarty->assign("pagstart", $pagstart);
		$smarty->assign("pagend", $pagend);
		$smarty->assign("komentari", $komentari);
		$smarty->assign("pages", $pages);
		$smarty->assign("page", $page + 1);
		$smarty->assign('komentari', $komentari);
		$smarty->display("komentari.tpl");

	}
?>