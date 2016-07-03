<?php /* Smarty version 2.6.6, created on 2012-06-17 18:53:31
         compiled from komentari.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<h1> Časopis: <b> <?php echo $this->_tpl_vars['casopisNaziv']; ?>
 </b> </h1>

	<pre>  </pre>
	
	<h2> Galerija starih naslovnica: </h2>
	
	<?php if (! $this->_tpl_vars['slike']): ?>
		Trenutno nemamo slika naslovnica u bazi podataka.
	<?php else: ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['slike']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href="<?php echo $this->_tpl_vars['slike'][$this->_sections['i']['index']]->lokacija; ?>
" rel="lightbox[roadtrip]"> <img src="<?php echo $this->_tpl_vars['slike'][$this->_sections['i']['index']]->lokacija; ?>
" width="100" height="170"/> </a>
		<?php endfor; endif; ?>
	<?php endif; ?>
	
	<pre>  </pre>
	
	<h2> Ocijeni časopis: </h2>
	
	<?php if (( $this->_tpl_vars['ocjenjeno'] == 1 || $this->_tpl_vars['ocjenjeno'] == 2 || $this->_tpl_vars['ocjenjeno'] == 3 || $this->_tpl_vars['ocjenjeno'] == 4 || $this->_tpl_vars['ocjenjeno'] == 5 )): ?>
	
		Vaša ocjena časopisa: <b><?php echo $this->_tpl_vars['ocjenjeno']; ?>
</b>
	
	<?php else: ?>
		<form name='ocijeni' action='<?php echo $_SERVER['REQUEST_URI']; ?>
' method='post'>
			<table id="tablica2" border="0px">
				<tr></tr>
				<tr>
					<td>
						<label for="ocijena"> Ocijena:</label>
					</td>
					<td>
						<input type="radio" name="ocjena2" value="1" /> 1
						<input type="radio" name="ocjena2" value="2" /> 2
						<input type="radio" name="ocjena2" value="3" checked="checked" /> 3
						<input type="radio" name="ocjena2" value="4" /> 4
						<input type="radio" name="ocjena2" value="5" /> 5
						
						<input type='submit' name='ocjena' value='Ocijeni'/>
					</td>
				</tr>
			</table>
		</form>
	<?php endif; ?>

	<pre>  </pre>
	<h2> Komentari korisnika na časopis: </h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="200">Komentar</th>
                <th width="100">Korisnik</th>
                <th width="150">Datum i vrijeme</th>
            </tr>
		</thead>
		<tbody>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['komentari']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <td><?php echo $this->_tpl_vars['komentari'][$this->_sections['i']['index']]->tekst; ?>
</td>
                    <td><?php echo $this->_tpl_vars['koris'][$this->_sections['i']['index']]; ?>
</td>
                    <td><?php echo $this->_tpl_vars['komentari'][$this->_sections['i']['index']]->datum; ?>
</td>
                </tr>
				
            <?php endfor; endif; ?>
			</tbody>
	      </table>
		  
		<?php if ($this->_tpl_vars['pages'] > 2): ?>
	 
		    <div id="pagination">
			
			<?php if ($this->_tpl_vars['page'] > 1): ?>
			    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&page=1">&lt;&lt;</a>		
			    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&page=<?php echo $this->_tpl_vars['page']-1; ?>
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
				 <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&page=<?php echo $this->_sections['p']['index']; ?>
"><?php echo $this->_sections['p']['index']; ?>
</a>
			      <?php endif; ?>
			   
			      
				 
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']-1): ?>			
			    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&page=<?php echo $this->_tpl_vars['page']+1; ?>
">&gt;</a>
			    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>
&page=<?php echo $this->_tpl_vars['pages']-1; ?>
">&gt;&gt;</a>	
			<?php endif; ?>
		    </div>
		
	    <?php endif; ?>
		
	<pre>  </pre>
	
	<h2> Dodaj komentar: </h2>
	
	<form name='komentiraj' action='<?php echo $_SERVER['REQUEST_URI']; ?>
' method='post'>
		<table id="tablica2" border="0px">
			<tr></tr>
			<tr>
				<td>
					<label for="komentar1"> Komentar:</label>
				</td>
				<td>
					<textarea name='komentar2' rows='5' cols='50'> </textarea>
					
					<input type='submit' name='komentar1' value='Objavi komentar'/>
				</td>
			</tr>
		</table>
	</form>

	<pre>  </pre>
      
	
		  
	<?php if (( $_SESSION['tipKorisnika'] == 4 )): ?>

	<h2> Uredi bibliografske podatke: </h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">ID</th>
                <th width="100">Naziv</th>
				<th width="100">Izdavač</th>
				<th width="100">Broj strana</th>
				<th width="100">Periodičnost (dana)</th>
            </tr>
		</thead>
		<tbody id="table_example">
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['casopisiAdmin']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <td><?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->id_casopis; ?>
</td>
                    <td class="edit naziv <?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->naziv; ?>
</td>
					<td class="edit izdavac <?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->izdavac; ?>
</td>
					<td class="edit broj_strana <?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->broj_strana; ?>
</td>
					<td class="edit periodicnost_publikacije <?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiAdmin'][$this->_sections['i']['index']]->periodicnost_publikacije; ?>
</td>
                </tr>
				
            <?php endfor; endif; ?>
			</tbody>
	      </table>
	
	<?php endif; ?>
	
	
		
	<?php if (( isset ( $this->_tpl_vars['nijeMod'] ) )): ?>
	
	<?php elseif (( $_SESSION['tipKorisnika'] == 3 )): ?>

	<h2> Uredi bibliografske podatke: </h2>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">ID</th>
                <th width="100">Naziv</th>
				<th width="100">Izdavač</th>
				<th width="100">Broj strana</th>
				<th width="100">Periodičnost (dana)</th>
            </tr>
		</thead>
		<tbody id="table_example">
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['casopisiMod']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <td><?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->id_casopis; ?>
</td>
                    <td class="edit naziv <?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->naziv; ?>
</td>
					<td class="edit izdavac <?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->izdavac; ?>
</td>
					<td class="edit broj_strana <?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->broj_strana; ?>
</td>
					<td class="edit periodicnost_publikacije <?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->id_casopis; ?>
"><?php echo $this->_tpl_vars['casopisiMod'][$this->_sections['i']['index']]->periodicnost_publikacije; ?>
</td>
                </tr>
				
            <?php endfor; endif; ?>
			</tbody>
	      </table>
	<?php else: ?>

	<?php endif; ?>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>