<?php

	require('classes/DB.php');
	$kor = $_GET['kor'];
	
	$korisnicko_ime = mysql_query ("SELECT * FROM korisnik WHERE korisnicko_ime = '".$kor."'");
	
	if (mysql_num_rows ($korisnicko_ime) == 1) {
			$k=1;
			$greska ['korImePostoji'] = "Korisničko ime je zauzeto";
		}
	echo count($k);
?>