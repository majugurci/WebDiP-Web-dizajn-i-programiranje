<?php /* Smarty version 2.6.6, created on 2012-06-14 11:12:13
         compiled from opisZadatka.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<h2> Sustav za upravljanje pretplatama na časopise </h2>
					</br>
					<p>Sustav treba omoguciti kreiranje pretplate na casopise dodane u sustav od strane moderatora casopisa.
					Korisnik sustava može imati jednu od sljedecih uloga:</p>
					</br>
					<p>• <b>Neregistrirani korisnik</b> je korisnik koji nema korisnicki racun na sustavu. Clanom sustava može
					postati u slucaju registracije na sustav, bilo putem OpenID racuna (Google, Facebook i drugi sustavi koji
					podržavaju OID) ili putem ugradenog sustava za registraciju korisnika. Korisnik se smatra registriranim tek
					nakon aktivacije racuna putem aktivacijske poruke elektronicke pošte (link za aktivaciju vrijedi 24 sati).
					Neregistrirani korisnik ima mogucnost pregleda casopisa na koje je moguca pretplata putem našeg sustava
					kao i ritam pretplate sa financijskim detaljima. Registracija i aktivacija na sustav je zašticena sa captcha
					sustavom.</p>
					</br>
					<p>• <b>Registrirani korisnik</b> je korisnik koji ima kreiran i aktiviran korisnicki racun. U slucaju tri neuspješne
					prijave na sustav (za redom), korisniku se zakljucava pristup sustavu; u tom slucaju se aktiviranje
					korisnickog racuna obavlja od strane administratora sustava. U slucaju uspješne prijave na sustav, kreira se
					korisnicka sesija koja traje ili do isteka vremena podešenog od strane servera (default: 30 minuta) ili do
					odjave korisnika sa sustava. Registrirani korisnik ima pravo pregledavanja vlastitih pretplata sa opcijama
					prekida pretplate i produžavanja postojecih pretplata te kreiranja novog pretplatnickog odnosa sa
					casopisom na koji trenutno nije pretplacen. Maksimalan broj casopisa je 10 po strani. U slucaju da postoji
					više od 10 casopisa u sustavu njihov ispis se realizira putem stranicenja. Svaki casopis je opsina, uz
					biblografske podatke, i galerijom slika svih dosadašnjih naslovnica. Svaka nova pretplata se stavlja u
					korisnicku košaricu putem koje se realizira kupovina pretplate u sustavu. Košarica se realizira putem
					korisnicke sesije ili putem zapisa u bazu podataka. Svaki registrirani korisnik može, za casopise na koje je
					pretplacen, komentirati sadržaj casopisa, kvalitetu usluge, kvalitetu pretplate i tome slicno.
					Osim pregleda postojecih pretplata i pregleda casopisa na koje nije pretplacen, registrirani
					korisnik ima pravo upravljanja svojim podacima kao i kreiranja novog casopisa koje treba biti
					odoboreno od strane administratora. U slucaju odobrenja od strane administratora, korisnik koji
					kreira casopis postaje moderator doticnog casopisa i ima uvid u podatke vezane za taj casopis.
					Korisnik prima obavijest od sustava u svakom novom broju casopisa na koji je pretplacen koja sadrži
					uvid u sadržaj novog broja u obliku galerije slika.</p>
					</br>
					<p>• <b>Moderator casopisa</b> je korisnik koji je kreirao casopis odobren od strane administratora. Njegove
					ovlasti na sustavu su jednake kao i za registriranog korisnika sa nadopunom vezanom za ovlasti upravljanja
					kreiranim casopisom. Korisnik može biti moderator jednog ili više casopisa. Za kreirani casopis, kojem je
					moderator, ovaj korisnik ima pravo uvida i promjene biblografskih podataka, uvid u popis pretplatnika,
					kretanje pretplate u vremenskom intervalu, uvid u komentare. Prilikom kreiranja casopisa definiraju se ime
					casopisa, izdavac, broj strana, periodicnost publikacije (dnevna publikacija, tjedna, dvotjedna, mjesecnik i
					slicno). Sustav, putem definirane periodicnosti, svakih X dana zahtjeva od moderatora unošenje sadržaja
					novog broja zajedno sa galerijom slika odabranog sadržaja novog broja.</p>
					</br>
					<p>• <b>Tip korisnika administrator</b> ima sve ovlasti kao i moderator casopisa plus ovlasti upravljanjem
					korisnickim podacima svakog korisnika, uvid u statistiku rada sustava, uvid u statistiku pojedinog korisnika
					(frekventnost prijave, popis pretplacenih casopisa, uvid u komentare), blokiranja korisnickih racuna u
					slucaju povrede pravila korištenja (pritužba drugih korisnika, pritužba moderatora casopisa, vulgarni
					komentari i tome slicno), zamrzavanje korištenja racuna na odredeno vrijeme (X sati, X dana,...), brisanje
					korisnickih racuna u slucaju trece opomene, odobravanje casopisa, brisanje casopisa, odobravanje
					moderatora za novi casopis, dodavanje dodatnog moderatora na postojeci casopis, brisanje moderatora
					casopisa. Osim toga, on ima mogucnost upravljanja "sustavskim vremenom" radi simuliranja protoka
					vremena na projektnoj aplikaciji.</p>
				
				</p>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>