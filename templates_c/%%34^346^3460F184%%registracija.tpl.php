<?php /* Smarty version 2.6.6, created on 2012-06-16 18:55:17
         compiled from registracija.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<form id="registracija" name="registracija" action="registracija.php" method="POST" enctype="multipart/form-data">
						<fieldset class="fieldsetRegistracija" style="width: 600px;">
							<legend class='fieldsetLegend'> Registracija: </legend>
							<div id='regsadrzaj' class='regSadrzaj'>
							<table border="0">
								<tr>
									<td class='labelRight'> <label for="ime" >Ime: </label> </td>
									<td> <input type='text' name='ime' id='ime'  <?php if (isset ( $this->_tpl_vars['ime'] )): ?> value="<?php echo $this->_tpl_vars['ime']; ?>
"<?php endif; ?>/> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaIme']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="prezime">Prezime: </label> </td>
									<td> <input type='text' name='prezime' id='prezime' <?php if (isset ( $this->_tpl_vars['prezime'] )): ?> value="<?php echo $this->_tpl_vars['prezime']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaPrezime']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="eMail">e-mail: </label> </td>
									<td> <input type='text' name='eMail' id='eMail' <?php if (isset ( $this->_tpl_vars['eMail'] )): ?> value="<?php echo $this->_tpl_vars['eMail']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaEmail']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight' <label for="korIme">Korisničko ime: </label> </td>
									<td> <input type='text' name='korIme' id='korIme' <?php if (isset ( $this->_tpl_vars['korIme'] )): ?> value="<?php echo $this->_tpl_vars['korIme']; ?>
"<?php endif; ?> /> 
										<span class='greska'> <?php echo $this->_tpl_vars['greskaKorIme']; ?>

										 <?php echo $this->_tpl_vars['greskaKorImePostoji']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="lozinka">Lozinka: </label> </td>
									<td> <input type='password' name='lozinka' id='lozinka' <?php if (isset ( $this->_tpl_vars['lozinka'] )): ?> value="<?php echo $this->_tpl_vars['lozinka']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaLozinka']; ?>

									 	 <?php echo $this->_tpl_vars['greskaLozinkaDuzina']; ?>

									 	 <?php echo $this->_tpl_vars['greskaLozinka_krivo']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="lozinka">Ponovni unos lozinke: </label> </td>
									<td> <input type='password' name='lozinkaPot' id='lozinkaPot' <?php if (isset ( $this->_tpl_vars['lozinkaPot'] )): ?> value="<?php echo $this->_tpl_vars['lozinkaPot']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaLozinkaPot']; ?>

										 <?php echo $this->_tpl_vars['greskaLozinkaJednake']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="slika">Slika (<1mb): </label> </td>
									<td> <input type='file' name='slika' id='slika' <?php if (isset ( $this->_tpl_vars['slikaIme'] )): ?> value="<?php echo $this->_tpl_vars['slikaIme']; ?>
"<?php endif; ?> size="35"/>
										 <span class='greska'><?php echo $this->_tpl_vars['greskaSlika']; ?>

										 <?php echo $this->_tpl_vars['greskaSlikaEkstenzija']; ?>
</span>
								</td>
								</tr>
								

								<tr>
									<td align='right'> <label> Unesite riječi: </label> </td>
									<td>
										<?php echo $this->_tpl_vars['recaptcha']; ?>

										<span class='greska'><?php echo $this->_tpl_vars['greskaRecaptcha']; ?>
</span>
									</td>
								</tr>
								</tr>
								
								
								<tr>
									<td class='labelRight'> <input id="reset" name="reset" id='reset' type="reset" value="Obriši" /> </td>
									<td> <input type='submit' name='saljiReg' id='saljiReg' value='Registriraj me'/>  </td>
								</tr>
							</table>
							</div>
						</fieldset>
					</form>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>