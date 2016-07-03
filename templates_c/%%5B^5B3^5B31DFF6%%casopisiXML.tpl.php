<?php /* Smarty version 2.6.6, created on 2012-06-17 13:40:17
         compiled from casopisiXML.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>


<casopisi>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['casopisi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <casopis
					id="<?php echo $this->_tpl_vars['casopisi'][$this->_sections['i']['index']]->id_casopis; ?>
"
                    naziv="<?php echo $this->_tpl_vars['casopisi'][$this->_sections['i']['index']]->naziv; ?>
"
                    izdavac="<?php echo $this->_tpl_vars['casopisi'][$this->_sections['i']['index']]->izdavac; ?>
"
                    broj_strana="<?php echo $this->_tpl_vars['casopisi'][$this->_sections['i']['index']]->broj_strana; ?>
"
                    periodicnost_publikacije="<?php echo $this->_tpl_vars['casopisi'][$this->_sections['i']['index']]->periodicnost_publikacije; ?>
" 
					ocjena="<?php echo $this->_tpl_vars['ocjena'][$this->_sections['i']['index']]; ?>
" 
					brojRedaka="<?php echo $this->_tpl_vars['brojRedaka']; ?>
" 
				/>         
            <?php endfor; endif; ?>
</casopisi>