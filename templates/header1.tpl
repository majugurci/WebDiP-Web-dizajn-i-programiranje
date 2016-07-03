<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title> {$naslov} </title>
		<meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />
		<link href="css/majugurci.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

		<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css"/>
		
		{$include1}
		{$include2}
		{$include3}
		{$include4}
		{$include5}
	</head>
	
	</body>
	
		<div id = 'kontenjer'>
	
			<div id = 'zaglavlje'>
				<h1>Jugurčić Mario</h1>
				<div id = 'korisnik'>
				{if isset ($smarty.session.korIme)}
					<li> Dobrodošao: 
						<a href="uredi.php?editId={$smarty.session.korIme}">
							<b>{$smarty.session.korIme}</b>
						</a>
					</li>
					<li> <img src="{$smarty.session.slika}" width="40" height="30" /> </li>
					<li> (<a href="prijava.php?odjava=true">Odjava</a>) </li>
				{/if}
			</div>
				
			</div>
			
			
			<div id = 'izbornik'>
				<ul>
					<li><a href='index.php'> Početna </a> </li>
					{if empty ($smarty.session.korIme)}
					<li><a href='prijava.php'> Prijava </a> </li>
					<li><a href='registracija.php'> Registracija </a> </li>
					{/if}
					<li><a href='casopisi.php'> Časopisi </a> </li>
					<li><a href='pretplate.php'> Pretplate </a> </li>
					{if ($smarty.session.tipKorisnika==4)}
					<li><a href='administracija.php'> Admin </a> </li>
					{/if}
					<li><a href='dokumentacija.php'> Dokumentacija </a> </li>
				</ul>
			</div>
			
			<div id = 'sadrzaj'>
				<div id = 'sadrzajVrh'></div>
				
				<div id = 'sadrzajStrane'>