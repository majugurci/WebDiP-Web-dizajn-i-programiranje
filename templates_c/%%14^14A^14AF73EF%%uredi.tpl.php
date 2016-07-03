<?php /* Smarty version 2.6.6, created on 2012-06-15 12:02:36
         compiled from uredi.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<form id="uredi" name="uredi" action="uredi_obrada.php" method="POST" enctype="multipart/form-data">
	<fieldset class="fieldsetRegistracija" style="width: 600px;">
		<legend class='fieldsetLegend'> Uređivanje podataka: </legend>
		<table border="0">
			<tr>
				<td class='labelRight'> <label for="ime"> Ime: </label> </td>
				<td><input type='text' name='ime' <?php if (isset ( $this->_tpl_vars['ime'] )): ?> value="<?php echo $this->_tpl_vars['ime']; ?>
"<?php endif; ?> />
					<?php echo $this->_tpl_vars['greskaIme']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="prezime"> Prezime: </label> </td>
				<td><input type='text' name='prezime' <?php if (isset ( $this->_tpl_vars['prezime'] )): ?> value="<?php echo $this->_tpl_vars['prezime']; ?>
"<?php endif; ?> />
					<?php echo $this->_tpl_vars['greskaPrezime']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="eMail"> e-mail: </label> </td>
				<td> <input type='text' name='eMail' <?php if (isset ( $this->_tpl_vars['eMail'] )): ?> value="<?php echo $this->_tpl_vars['eMail']; ?>
"<?php endif; ?>/> 
					<?php echo $this->_tpl_vars['greskaEmail']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="korIme"> Korisničko ime: </label> </td>
				<td> <input type='text' name='korIme' <?php if (isset ( $this->_tpl_vars['korIme1'] )): ?> value="<?php echo $this->_tpl_vars['korIme1']; ?>
"<?php endif; ?>/>
					<?php echo $this->_tpl_vars['greskaKorIme']; ?>

					<?php echo $this->_tpl_vars['greskaKorImePostoji']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="lozinka"> Lozinka: </label> </td>
				<td> <input type='password' name='lozinka' <?php if (isset ( $this->_tpl_vars['lozinka'] )): ?> value="<?php echo $this->_tpl_vars['lozinka']; ?>
"<?php endif; ?> />
					<?php echo $this->_tpl_vars['greskaLozinka']; ?>

					<?php echo $this->_tpl_vars['greskaLozinkaDuzina']; ?>

					<?php echo $this->_tpl_vars['greskaLozinka_krivo']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="lozinkaPot"> Ponovni unos lozinke: </label> </td>
				<td> <input type='password' name='lozinkaPot' <?php if (isset ( $this->_tpl_vars['lozinkaPot'] )): ?> value="<?php echo $this->_tpl_vars['lozinkaPot']; ?>
"<?php endif; ?> /> 
					<?php echo $this->_tpl_vars['greskaLozinkaPot']; ?>

					<?php echo $this->_tpl_vars['greskaLozinkaJednake']; ?>

				</td>
			</tr>
			</tr>
			<tr>
				<td class='labelRight'> <label for="slika"> Odaberite sliku: </label> </td>
				<td> <input type='file' name='slika' <?php if (isset ( $this->_tpl_vars['slika'] )): ?> value="<?php echo $this->_tpl_vars['slika']; ?>
"<?php endif; ?>/>
					<?php echo $this->_tpl_vars['greskaSlika']; ?>

					<?php echo $this->_tpl_vars['greskaSlikaEkstenzija']; ?>

				</td>
			</tr>
			<tr>
				<td class='labelRight'> <input id="reset" name="reset" type="reset" value="Obriši sve" /> </td>
				<td> <input type='submit' name='salji' value='Spremi promjene'/>  </td>
			</tr>
		</table>
	</fieldset>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>