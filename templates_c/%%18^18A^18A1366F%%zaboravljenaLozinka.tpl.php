<?php /* Smarty version 2.6.6, created on 2012-06-16 18:36:58
         compiled from zaboravljenaLozinka.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	Unesite svoje korisničko ime i e-mail adresu kako bi Vam poslali novu lozinku.
	
	<pre>  </pre>
	
	<form id="zaboravljenaLozinka" name="lozinka" action="zaboravljenaLozinka.php" method="POST" enctype="multipart/form-data">
						<fieldset class="fieldsetRegistracija" style="width: 600px;">
							<legend class='fieldsetLegend'> Povrat lozinke: </legend>
							<div id='regsadrzaj' class='regSadrzaj'>
							<table border="0">
								<tr>
									<td class='labelRight'> <label for="korIme" >Korisničko ime: </label> </td>
									<td> <input type='text' name='korIme' id='korIme' <?php if (isset ( $this->_tpl_vars['korIme'] )): ?> value="<?php echo $this->_tpl_vars['korIme']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaKorIme']; ?>

										 <?php echo $this->_tpl_vars['greskaKorImeNePostoji']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="eMail">e-mail: </label> </td>
									<td> <input type='text' name='eMail' id='eMail' <?php if (isset ( $this->_tpl_vars['eMail'] )): ?> value="<?php echo $this->_tpl_vars['eMail']; ?>
"<?php endif; ?> /> 
										 <span class='greska'><?php echo $this->_tpl_vars['greskaEmail']; ?>

										 <?php echo $this->_tpl_vars['emailNePostoji']; ?>
</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> <input type='submit' name='saljiLozinku' id='saljiLozinku' value='Pošalji lozinku'/>  </td>
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