<?php /* Smarty version 2.6.6, created on 2012-06-17 13:22:31
         compiled from brojRedaka.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<h2> Postavi broj redaka po tablici: </h2>
	
	Trenutni broj redaka: <?php echo $this->_tpl_vars['broj_redaka']; ?>


	<form name='brojRedaka' action='brojRedaka.php' method='post'>
		<table id="tablica2" border="0px">
			<tr></tr>
			<tr>
				<td class='labelRight'> <label for="brojRedaka" > Broj redaka: </label> </td>
				<td> <input type="text" name="brojRedaka" id="brojRedaka" value=""/> </td>
			</tr>
			<tr></tr>
			<tr>
				<td class='labelRight'> </td>
				<td> <input type='submit' name='salji' value='Postavi' />  </td>
			</tr>
		</table>
	</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>