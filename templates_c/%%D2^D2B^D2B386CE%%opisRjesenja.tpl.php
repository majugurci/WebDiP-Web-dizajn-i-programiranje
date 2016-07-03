<?php /* Smarty version 2.6.6, created on 2012-06-17 21:24:59
         compiled from opisRjesenja.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<h2> Popis i opis skripata </h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">Naziv skripte</th>
                <th width="300">Opis skripte</th>
            </tr>
		</thead>
		<tbody>
                <tr>
					<td> aktivacija.php </td>
					<td> Služi za provjeru ispravnosti tokena poslanog na mail korisnika </td> 
                </tr>
				<tr>
					<td> aktivacija_mail.php </td>
					<td> Služi za ispis poruke o uspješno poslanom mailu </td> 
                </tr>
				<tr>
					<td> brojRedaka.php </td>
					<td> Služi kako bi administrator postavio broj redaka koji se prikazuju u tablicama (straničenje) </td> 
                </tr>
				<tr>
					<td> casopisi.php </td>
					<td> Ispis svih časopisa iz baze podataka pomoću AJAX (XML) </td> 
                </tr>
				<tr>
					<td> CRU.php </td>
					<td> Omogućuje adminu CRU nad svim tablicama u bazi podataka </td> 
                </tr>
				<tr>
					<td> komentari.php </td>
					<td> Ispis svih podataka vezanih uz časopis, kao i mogućnost adminu i moderatoru da promjeni bibliografske podatke </td> 
                </tr>
				<tr>
					<td> korisnici.php </td>
					<td> Ispis svih korisnika iz baze podataka </td> 
                </tr>
				<tr>
					<td> prijava.php </td>
					<td> Prijava u sustav </td> 
                </tr>
				<tr>
					<td> registracija.php </td>
					<td> Registracija u sustav </td> 
                </tr>
				<tr>
					<td> uredi.php </td>
					<td> Uređivanje vlastitih podataka, omogućuje i adminu da promjeni podatke ostalih korisnika </td> 
                </tr>
				<tr>
					<td> vrijeme.php </td>
					<td> Omogućuje adminu da postavi sustavsko vrijeme </td> 
                </tr>
				<tr>
					<td> zaboravljenaLozinka.php </td>
					<td> Omogućuje korisniku da dobije novu lozinku na mail </td> 
                </tr>
				<tr>
					<td> zakljucani.php </td>
					<td> Daje adminu popis blokiranih korisnika i daje mu mogućnost odblokirati svakog pojedinačno </td> 
                </tr>
		</tbody>
	</table>
	
	<pre>  </pre>
	<pre>  </pre>
	<pre>  </pre>
	
	<h2> Popis korištenih tehnologija i alata </h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">Popis</th>
            </tr>
		</thead>
		<tbody>
                <tr>
					<td> Notepad++ </td>
                </tr>
				<tr>
					<td> FileZilla </td>
                </tr>
				<tr>
					<td> Visual Paradigm for UML </td>
                </tr>
				<tr>
					<td> DBDesignerFork </td>
                </tr>
				<tr>
					<td> FireBug </td>
                </tr>
				<tr>
					<td> HTML </td>
                </tr>
				<tr>
					<td> CSS </td>
                </tr>
				<tr>
					<td> PHP </td>
                </tr>
				<tr>
					<td> javascript </td>
                </tr>
				<tr>
					<td> jquery </td>
                </tr>
				<tr>
					<td> smarty </td>
                </tr>
				
		</tbody>
	</table>
	
	<pre>  </pre>
	<pre>  </pre>
	<pre>  </pre>
	
	<h2> Popis vanjskih skripata</h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">Naziv skripte</th>
                <th width="300">Opis skripte</th>
            </tr>
		</thead>
		<tbody>
                <tr>
					<td> Lightbox 2 </td>
					<td> Korišteno za prikaz galerije naslovnica časopisa </td> 
                </tr>
				<tr>
					<td> ajaxCRUD </td>
					<td> CRUD kontrola nad svim tablicama u bazi podatka </td> 
                </tr>
				<tr>
					<td> PaginateTable - jQuery </td>
					<td> Korišteno za paginaciju na korisničkoj strani </td> 
                </tr>
				<tr>
					<td> jQuery and PHP inline editing </td>
					<td> Služi za promjenu podataka časopisa direktno u tablici, bez potrebnog novog obrasca </td> 
                </tr>

				
		</tbody>
	</table>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>