<?php
	require_once ("DB.php");
	class Korisnik {
		public $id_korisnik = "";
		public $status_korisnika_id_status = "";
		public $tip_korisnika_id_tip = "";
		public $korisnicko_ime = "";
		public $ime = "";
		public $prezime = "";
		public $email = "";
		public $lozinka = "";
		public $slika = "";
		public $aktivacijski_kod = "";
		public $neuspjesne_prijave = "";
		public $blokiran_do = "";
		
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}

		public static function getAll($where = "", $limit = "") {
			$korisnik = new Korisnik();
			$sql = "SELECT * FROM korisnik";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			$rs = $korisnik->upit($sql);
			$korisnici = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$korisnik = new Korisnik();
					foreach(get_object_vars($korisnik) as $kvar => $kval) {						
						$korisnik->$kvar=$red[$kvar];						
					}
					$korisnici[] = $korisnik;
				}
			}
			return $korisnici;
		}
		
	}
	
	class Casopis {
		public $id_casopis = "";
		public $korisnik_id_korisnik = "";
		public $naziv = "";
		public $izdavac = "";
		public $broj_strana = "";
		public $periodicnost_publikacije = "";
		
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}
		
		public static function getAll($where = "", $limit = "") {
			$casopis = new Casopis();
			$sql = "SELECT * FROM casopis";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			$rs = $casopis->upit($sql);
			$casopisi = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$casopis = new Casopis();
					foreach(get_object_vars($casopis) as $kvar => $kval) {						
						$casopis->$kvar=$red[$kvar];						
					}
					$casopisi[] = $casopis;
				}
			}
			return $casopisi;
		}
		
	}

	class Komentar {
		public $id_komentar = "";
		public $pretplata_id_pretplata = "";
		public $slika_id_slika = "";
		public $casopis_id_casopis = "";
		public $korisnik_id_korisnik = "";
		public $datum = "";
		public $tekst = "";
		
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}

		public static function getAll($where = "", $limit = "") {
			$komentar = new Komentar();
			$sql = "SELECT * FROM komentar";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			//echo $sql."<br />";
			$rs = $komentar->upit($sql);
			$komentari = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$komentar = new Komentar();
					foreach(get_object_vars($komentar) as $kvar => $kval) {						
						$komentar->$kvar=$red[$kvar];						
					}
					$komentari[] = $komentar;
				}
			}
			return $komentari;
		}

	}

	class Ocjena {
		public $id_ocjena = "";
		public $ocjena = "";
		public $casopis_id_casopis = "";
		public $korisnik_id_korisnik = "";

		
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}
		
		public static function getAll($where = "", $limit = "") {
			$ocjena = new Ocjena();
			$sql = "SELECT * FROM ocjena";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			$rs = $ocjena->upit($sql);
			$ocjene = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$ocjena = new Ocjena();
					foreach(get_object_vars($ocjena) as $kvar => $kval) {						
						$ocjena->$kvar=$red[$kvar];						
					}
					$ocjene[] = $ocjena;
				}
			}
			return $ocjene;
		}

	}

	class Slika {
		public $id_slika = "";
		public $casopis_id_casopis = "";
		public $lokacija = "";		
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}
		
		public static function getAll($where = "", $limit = "") {
			$slika = new Slika();
			$sql = "SELECT * FROM slika";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			$rs = $slika->upit($sql);
			$slike = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$slika = new Slika();
					foreach(get_object_vars($slika) as $kvar => $kval) {						
						$slika->$kvar=$red[$kvar];						
					}
					$slike[] = $slika;
				}
			}
			return $slike;
		}

	}
	
	class Pretplata {
		public $id_pretplata = "";
		public $id_korisnik = "";
		public $datum_pocetka = "";	
		public $datum_isteka = "";			
		
		public function upit($sql) {
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
		}
		
		public static function getAll($where = "", $limit = "") {
			$pretplata = new Pretplata();
			$sql = "SELECT * FROM pretplata";
			if (!empty($where)) {
				$sql .= " WHERE $where";
			}
			$sql .= $limit;
			$rs = $pretplata->upit($sql);
			$pretplate = array();
			if ($rs) {
				while($red = mysql_fetch_assoc($rs)) {
					$pretplata = new Pretplata();
					foreach(get_object_vars($pretplata) as $kvar => $kval) {						
						$pretplata->$kvar=$red[$kvar];						
					}
					$pretplate[] = $pretplata;
				}
			}
			return $pretplate;
		}

	}
	//session_start();
?>