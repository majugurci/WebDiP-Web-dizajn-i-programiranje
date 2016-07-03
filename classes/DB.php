<?php
$server = "localhost";
$korisnik = "WebDiP2011_032";
$lozinka = "admin_e12f";
$baza = "WebDiP2011_032";

$dbc = mysql_connect($server, $korisnik, $lozinka);
if(! $dbc) {
	echo "Problem kod povezivanja na bazu podataka!";
	exit;
}

$db = mysql_select_db($baza, $dbc);
if(! $db) {
	echo "Problem kod selektiranja baze podataka!";
	exit;
}

mysql_query("set names utf8");
?>