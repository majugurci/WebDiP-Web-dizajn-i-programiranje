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
	
	$result = mysql_query("Select * from korisnik");
	
	echo "<table border='1px'>
		<thead>
            <tr>
                <th width='100'>Korisničko ime</th>
				<th width='100'>Prezime</th>
				<th width='100'>Ime</th>
				<th width='100'>E-mail</th>
				<th width='100'>Lozinka</th>
            </tr>
		</thead>
		<tbody>
		";

		while($row = mysql_fetch_array($result)){
			echo "<tr><td>" . $row['korisnicko_ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['ime'] . "</td><td>" . $row['email'] . "</td><td>" . $row['lozinka'] . "</td></tr>";
		}
		
		echo "
		</tbody>
	</table> ";
	
?>