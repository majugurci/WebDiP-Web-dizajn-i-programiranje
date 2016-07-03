<?php /* Smarty version 2.6.6, created on 2012-06-17 10:16:51
         compiled from vrijeme.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<h3>Pomak vremena</h3>
	<pre>  </pre>
	<?php if (( $_SESSION['tipKorisnika'] == 4 )): ?>
		<div class = "podaci">
			<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Postavi pomak</a></br>
			<a href="vrijeme.php?uzmi=pomak">Postavi sustavsko vrijeme</a> <?php echo $this->_tpl_vars['return']; ?>
	
			<pre>  </pre>
			<p>Stvarno vrijeme: <?php echo $this->_tpl_vars['time']; ?>
</p>
			<p>Virtualno vrijeme: <?php echo $this->_tpl_vars['vrijeme']; ?>
<p>
		</div>	
	<?php else: ?>
		<?php echo $this->_tpl_vars['neovlasteno']; ?>

	<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>