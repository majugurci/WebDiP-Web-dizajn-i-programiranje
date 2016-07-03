<?php /* Smarty version 2.6.6, created on 2012-06-18 00:42:04
         compiled from pretplate_obrada.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<h2> Časopis: <?php echo $this->_tpl_vars['casopisNaziv']; ?>
 </h2>
	
	<?php if (isset ( $this->_tpl_vars['vrijemeKraja'] )): ?>
	
	Vaša pretplata na ovaj časopis traje do: <?php echo $this->_tpl_vars['vrijemeKraja']; ?>

	
	<?php else: ?>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">Pretplata</th>
                <th width="100">Odaberi pretplatu</th>
            </tr>
		</thead>
		<tbody>
			<tr>
				<td> 1 mjesec </td>
				<td> <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&pretplata=30"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 3 mjeseca </td>
				<td> <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&pretplata=90"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 6 mjeseci </td>
				<td> <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&pretplata=180"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 1 godina </td>
				<td> <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&pretplata=360"> Pretplati me! </a> </td>
			</tr>
		</tbody>
	</table>
	
	<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>