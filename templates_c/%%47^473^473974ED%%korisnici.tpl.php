<?php /* Smarty version 2.6.6, created on 2012-06-17 10:16:10
         compiled from korisnici.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">ID Korisnika</th>
                <th width="100">Status</th>
                <th width="100">Tip</th>
                <th width="100">Korisničko ime</th>
				<th width="100">Ime</th>
				<th width="100">Prezime</th>
				<th width="100">E-mail</th>
				<th width="100">Slika</th>
            </tr>
		</thead>
		<tbody>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['korisnici']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                <tr>
					<td><?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->id_korisnik; ?>
</td>
					<td> 
						<?php if (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->status_korisnika_id_status == 1 )): ?>
							Neaktiviran
						<?php elseif (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->status_korisnika_id_status == 2 )): ?>
							Aktiviran
						<?php elseif (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->status_korisnika_id_status == 3 )): ?>
							Blokiran
						<?php elseif (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->status_korisnika_id_status == 4 )): ?>
							Zamrznut
						<?php else: ?>
							Obrisan
						<?php endif; ?>
					</td>
					<td> 
						<?php if (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->tip_korisnika_id_tip == 1 )): ?>
							Neregistriran
						<?php elseif (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->tip_korisnika_id_tip == 2 )): ?>
							Normalan
						<?php elseif (( $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->tip_korisnika_id_tip == 3 )): ?>
							Moderator
						<?php else: ?>
							Admin
						<?php endif; ?>
					</td>
                    <td>
					<?php if ($_SESSION['tipKorisnika'] == 4): ?>
						<a href="uredi.php?editId=<?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->korisnicko_ime; ?>
"><?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->korisnicko_ime; ?>
</a>
					<?php endif; ?>
					<?php if ($_SESSION['tipKorisnika'] != 4): ?>
						<?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->korisnicko_ime; ?>

					<?php endif; ?></td>
                    <td><?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->ime; ?>
</td>
                    <td><?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->prezime; ?>
</td>
                    <td><?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->email; ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['korisnici'][$this->_sections['i']['index']]->slika; ?>
" width="80" height="70" /></td>
                </tr>
				
            <?php endfor; endif; ?>
			</tbody>
	      </table>

	    <?php if ($this->_tpl_vars['pages'] > 2): ?>
	 
		    <div id="pagination">
			
			<?php if ($this->_tpl_vars['page'] > 1): ?>
			    <a href="?page=1">&lt;&lt;</a>		
			    <a href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
">&lt;</a>
			<?php endif; ?>
			<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['start'] = (int)$this->_tpl_vars['pagstart'];
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pagend']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
if ($this->_sections['p']['start'] < 0)
    $this->_sections['p']['start'] = max($this->_sections['p']['step'] > 0 ? 0 : -1, $this->_sections['p']['loop'] + $this->_sections['p']['start']);
else
    $this->_sections['p']['start'] = min($this->_sections['p']['start'], $this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] : $this->_sections['p']['loop']-1);
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = min(ceil(($this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] - $this->_sections['p']['start'] : $this->_sections['p']['start']+1)/abs($this->_sections['p']['step'])), $this->_sections['p']['max']);
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
			     <?php if ($this->_sections['p']['index'] == $this->_tpl_vars['page']): ?>
				<span><?php echo $this->_sections['p']['index']; ?>
</span>
			     <?php else: ?>
				 <a href="?page=<?php echo $this->_sections['p']['index']; ?>
"><?php echo $this->_sections['p']['index']; ?>
</a>
			      <?php endif; ?>
			   
			      
				 
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']-1): ?>			
			    <a href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
">&gt;</a>
			    <a href="?page=<?php echo $this->_tpl_vars['pages']-1; ?>
">&gt;&gt;</a>	
			<?php endif; ?>
		    </div>
		
	    <?php endif; ?>
      
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>