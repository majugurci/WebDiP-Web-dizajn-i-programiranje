<?php /* Smarty version 2.6.6, created on 2012-06-18 01:02:25
         compiled from header3.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title> <?php echo $this->_tpl_vars['naslov']; ?>
 </title>
		<meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />
		<link href="css/majugurci2.css" rel="stylesheet" type="text/css" />	
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

		<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css"/>
		
		<?php echo $this->_tpl_vars['include1']; ?>

		<?php echo $this->_tpl_vars['include2']; ?>

		<?php echo $this->_tpl_vars['include3']; ?>

	</head>
	
	</body>
	
		<div id = 'kontenjer'>
	
			<div id = 'zaglavlje'>
				<h1>Jugurčić Mario</h1>
				<div id = 'korisnik'>
				<?php if (isset ( $_SESSION['korIme'] )): ?>
					<li> Dobrodošao: 
						<a href="uredi.php?editId=<?php echo $_SESSION['korIme']; ?>
">
							<b><?php echo $_SESSION['korIme']; ?>
</b>
						</a>
					</li>
					<li> <img src="<?php echo $_SESSION['slika']; ?>
" width="40" height="30" /> </li>
					<li> (<a href="prijava.php?odjava=true">Odjava</a>) </li>
				<?php endif; ?>
			</div>
			
			</div>
			
			<div id = 'izbornik'>
				<ul>
					<li><a href='index.php'> Početna </a> </li>
					<?php if (empty ( $_SESSION['korIme'] )): ?>
					<li><a href='prijava.php'> Prijava </a> </li>
					<li><a href='registracija.php'> Registracija </a> </li>
					<?php endif; ?>
					<li><a href='casopisi.php'> Časopisi </a> </li>
					<li><a href='pretplate.php'> Pretplate </a> </li>
					<?php if (( $_SESSION['tipKorisnika'] == 4 )): ?>
					<li><a href='administracija.php'> Admin </a> </li>
					<?php endif; ?>
					<li><a href='dokumentacija.php'> Dokumentacija </a> </li>
				</ul>
			</div>
			
			<div id="izbornik2">

				<div id="izbornik2Vrh"></div>

				<div id="izbornik2Linkovi">    
					<h3>Linkovi:</h3>
					<ul>
						<li><a href="korisnici.php">Popis korisnika</a></li>
						<li><a href="vrijeme.php">Podešavanja vremena</a></li>
						<li><a href="CRU.php">CRU kontrola</a></li>
						<li><a href="zakljucani.php">Otključaj korisnike</a></li>
						<li><a href="brojRedaka.php">Broj redaka</a></li>
					</ul>
				</div>
                
                
				<div id="izbornik2Dno"></div>
			</div>
			
			<div id = 'sadrzaj'>
				<div id = 'sadrzajVrh'></div>
				
				<div id = 'sadrzajStrane'>