<?php /* Smarty version 2.6.6, created on 2012-06-17 22:45:27
         compiled from prijava.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<p> Za nastavak rada sa aplikacijom, molim prijavite se. </p>
					<form name='prijava' action='prijava.php' method='post'>
						<fieldset class='fieldsetLogin'>
							<legend class='fieldsetLegend'> Prijava: </legend>
							<table border="0" >
								<tr>
									<td class='labelRight'>  </td>
									<td> 
										<?php echo $this->_tpl_vars['casopisiDetalji']; ?>

										<?php echo $this->_tpl_vars['greskaLogin1']; ?>

										<?php echo $this->_tpl_vars['greskaLogin2']; ?>

										<?php echo $this->_tpl_vars['greskaLogin3']; ?>

										<?php echo $this->_tpl_vars['greskaLogin4']; ?>

										<?php echo $this->_tpl_vars['greskaLogin5']; ?>

										<?php echo $this->_tpl_vars['greskaLogin6']; ?>

									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="korIme" > Korisničko ime: </label> </td>
									<td> <input type="text" name="korIme" id="korIme" value="<?php echo $this->_tpl_vars['Korisnik']; ?>
"/> 
									
									</td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> 
										<?php echo $this->_tpl_vars['greskaKorIme']; ?>

									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for='lozinka' > Lozinka: </label> </td>
									<td> <input type='password' name='lozinka' id='lozinka' /> </td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> 
										<?php echo $this->_tpl_vars['greskaLozinka']; ?>

									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="zapamtiMe">Zapamti me?:</label> </td>
									<td> <input type="checkbox" name="zapamtiMe" id="zapamtiMe" value="1"/> <br/> </td>
								</tr>
								<tr>
									<td class='labelRight'> <input id="reset" name="reset" type="reset" value="Obriši" /> </td>
									<td> <input type='submit' name='saljiLog' value='Prijavi se' />  </td>
								</tr>
								<tr>
									<td class='labelRight'></td>
									<td> <a href="zaboravljenaLozinka.php">Zaboravljena lozinka?</a> </td>
								</tr>
							</table>
						</fieldset>
					</form>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>