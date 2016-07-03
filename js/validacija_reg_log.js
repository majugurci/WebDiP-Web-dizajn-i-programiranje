<!-- Komentar da se izbjegne pogreska kod starijih preglednika

window.onload = function () {
	//alert('jej radi');
	
	// klikom na registracijsku tipku pokrećemo provjeru
	var registracija = document.querySelectorAll ("input[name='saljiReg']");
	echo (registracija);
	if (registracija.length==1) {
		var reg = registracija[0];
		echo (reg);
		reg.addEventListener ('click', checkRegistracija, true);
	}
	
	// klikom na login tipku pokrećemo provjeru
	/*
	var login = document.querySelectorAll ("input[name='saljiLog']");
	echo (login);
	if (login.length==1) {
		var log = login[0];
		echo (log);
		log.addEventListener ('click', checkLogin, true);
	}
	*/
	
	// bojanje trenutno označenog polja
	var unos = document.getElementsByTagName ("input");
	for(i = 0; i<unos.length; i++){
		unos[i].addEventListener ("focus", focus, false);
		unos[i].addEventListener ("blur", blur, false);
	}
	function focus () {
		this.style.backgroundColor = "yellow";
	}
	function blur () {
		this.style.backgroundColor = "";
	}
	
	/*
	// hoover efekt iznad tablice
	var red = document.getElementById ("korisnici").querySelectorAll ("tr");
	for(i = 0; i<red.length;i++){
	
		red[i].addEventListener ("mouseover", mouseover, false);
		red[i].addEventListener ("mouseout", mouseout, false);
	}
	
	function mouseover (){
		this.style.backgroundColor = "yellow";
	}
	function mouseout (){
		this.style.backgroundColor = ""; 
	}	
}
*/

function checkRegistracija (event) {
	echo (event);
	
	var korIme = document.getElementById ('korIme');
	echo (korIme);
	
	if (korIme != null) {
		
		var forma = korIme.form;
		echo (forma);
		event.preventDefault ();
		xmlhttpPost ('test.php?kor=' + korIme.value, forma);
		if (checkFormReg (forma)) {
			forma.submit ();
		}
	}
	/*
	korIme = document.getElementById ('korIme');	
	if (korIme != null) {
		event.preventDefault ();
		var forma = korIme.form;
		if (checkFormReg (forma)) {
			forma.submit ();
		}
	}
	*/
	
}

function checkFormReg (forma, postoji2) {
	var isOk = true;
	var postoji = postoji2;
	var greske = document.querySelectorAll("span.greska");
	for (i = 0; i < greske.length; i++) {
		greske[i].parentNode.removeChild(greske[i]);
	}
	
	for (i = 0; i < forma.elements.length; i++) {
		echo (forma.elements[i]);
		var el = forma.elements[i];
		el.className = '';
		if (el.value == '') {
			isOk = false;
			el.className = 'greska';
			var errMsg = document.createElement ('span');
			if (el.id == 'ime') {
				errMsg.innerHTML = "&nbspUnesite ime";
			}
			if (el.id == 'prezime') {
				errMsg.innerHTML = "&nbspUnesite prezime";
			}
			if (el.id == 'eMail') {
				errMsg.innerHTML = "&nbspUnesite e-mail";
			}
			if (el.id == 'korIme') {
				errMsg.innerHTML = "&nbspUnesite korisničko ime";
			}
			if (el.id == 'lozinka') {
				errMsg.innerHTML = "&nbspUnesite lozinku";
			}
			if (el.id == 'lozinkaPot') {
				errMsg.innerHTML = "&nbspUnesite potvrdu lozinke";
			}
			if (el.id == 'slika') {
				errMsg.innerHTML = "&nbspOdaberite sliku";
			}
			errMsg.className ='greska';
			el.parentNode.appendChild (errMsg);
		}
		else {
			if (el.id == 'ime') {
				var ime = el.value;
				
				var prvoSlovo = /^[A-ZČĆĐŠŽ]/;
				var ostalo = /^[A-zčćđšž ]*$/; // Sadrži i razmak jer neki ljudi imaju više imena
					
					
				if (!prvoSlovo.test (ime)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspIme mora započeti velikim slovom.";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}
				if (!ostalo.test (ime)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspIme mora sadržavati samo slova.";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}		
			}
			
			if (el.id == 'prezime') {
				var prezime = el.value;
				
				var prvoSlovo = /^[A-ZČĆĐŠŽ]/;
				var ostalo = /^[A-zčćđšž ]*$/; // Sadrži i razmak jer neki ljudi imaju više prezimena
					
					
				if (!prvoSlovo.test (prezime)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspPrezime mora započeti velikim slovom.";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}
				if (!ostalo.test (prezime)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspPrezime mora sadržavati samo slova.";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}		
			}
			
			if (el.id == 'eMail') {
				var eMail = el.value;
				
				//var sintaksa = /^\w{2,}@(\w{2,}\.){1,2}\w{2,}$/; // primjer sa predavanja		
				var sintaksa = /^((?:(?:(?:[a-zA-Z0-9][\.\-\+_]?)*)[a-zA-Z0-9])+)\@((?:(?:(?:[a-zA-Z0-9][\.\-_]?){0,62})[a-zA-Z0-9])+)\.([a-zA-Z0-9]{2,6})$/; // ovo je jedna od boljih provjera e-mail-a na koje sam naišao

				if (!sintaksa.test (eMail)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspUnijeli ste krivu e-mail adresu.";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}
			}
			if (el.id == 'lozinka') {
				var lozinka = el.value;
				
				var sintaksa = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#!\|"&'*.$%]).{6,})/;

				if (!sintaksa.test (lozinka)) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspLozinka mora sadržavati velika i mala slova, brojeve i posebne znakove";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}
			}
			
			if (el.id == 'lozinkaPot') {
				var lozinkaPot = el.value;
				sifra = document.getElementById("lozinka").value;
				if (sifra != lozinkaPot) {
					isOk = false;
					el.className = 'greska';
					var errMsg = document.createElement ('span');
					errMsg.innerHTML = "&nbspUnešene lozinke nisu jednake";
					errMsg.className = 'greska';
					el.parentNode.appendChild (errMsg);
				}
			}
		}
	}
	return isOk;
}

/*
function checkLogin (event) {
	echo (event);
	
	var korIme = document.getElementById ('korIme');
	echo (korIme);

	if (korIme != null) {
		var forma = korIme.form;
		echo(forma);
		event.preventDefault ();
		if (checkFormLog (forma)) {
			forma.submit();
			//document."login".submit();
		}
	}
}

function checkFormLog (forma){
	var isOk = true;
	var greske = document.querySelectorAll("span.greska");
	for(i = 0; i < greske.length; i++) {
		greske[i].parentNode.removeChild(greske[i]);
	}
	for (i = 0; i < forma.elements.length; i++) {
		echo (forma.elements[i]);
		var el = forma.elements[i];
		el.className = '';
		if (el.value == '' && (el.type!='checkbox')) {
			isOk = false;
			el.className = 'greska';
			var errMsg = document.createElement ('span');
			if (el.id == 'korIme') {
				errMsg.innerHTML = "&nbspUnesite korisničko ime";
			}
			if (el.id == 'lozinka') {
				errMsg.innerHTML = "&nbspUnesite lozinku";
			}
			errMsg.className = 'greska';
			el.parentNode.appendChild (errMsg);
		}
		else {
		
		}
	}
	return isOk; 
}
*/

function xmlhttpPost (strURL, forma) {
    var xmlHttpReq = false;
    var self = this;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest ();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject ("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open ('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader ('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function () {
        if (self.xmlHttpReq.readyState == 4) {
            if (self.xmlHttpReq.responseText == 1) {
				for (i = 0; i < forma.elements.length; i++) {
					echo (forma.elements[i]);
					var el = forma.elements[i];
					el.className = '';
					if (el.value == '') {
					}
					else {
						if (el.id == 'korIme') {
							isOk = false;
							el.className = 'greska';
							var errMsg = document.createElement ('span');
							errMsg.innerHTML = "&nbspKorisničko ime je zauzeto.";
							errMsg.className = 'greska';
							el.parentNode.appendChild (errMsg);
						}
					}
				}
				//alert ('Korisnik postoji');
			}
        }
    }
    self.xmlHttpReq.send(null);
}

function echo(objekt) {
	console.log(objekt);
}

// kraj komentara -->