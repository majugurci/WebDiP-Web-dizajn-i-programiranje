{include file = "header1.tpl"}
	
	{if isset($korisnik)}
	
	<pre> Kliknite na časopis kako bi vidjeli mogućnosti pretplate </pre>
	<pre>  </pre>
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">Naziv</th>
                <th width="100">Izdavač</th>
                <th width="100">Broj stranica</th>
				<th width="100">Periodičnost (dani)</th>
            </tr>
		</thead>
		<tbody>
            {section name=i loop=$casopisi}
                <tr>
                    <td>
					<a href="pretplate_obrada.php?casopisID={$casopisi[i]->id_casopis}&casopisNaziv={$casopisi[i]->naziv}">{$casopisi[i]->naziv}</a>
					</td>
                    <td>{$casopisi[i]->izdavac}</td>
                    <td>{$casopisi[i]->broj_strana}</td>
					<td>{$casopisi[i]->periodicnost_publikacije}</td>
                </tr>
				
            {/section}
			</tbody>
	      </table>
		  
		{if $pages > 2}
	 
		    <div id="pagination">
			
			{if $page > 1}
			    <a href="{$smarty.server.REQUEST_URI}&page=1">&lt;&lt;</a>		
			    <a href="{$smarty.server.REQUEST_URI}&page={$page-1}">&lt;</a>
			{/if}
			{section name=p start=$pagstart loop=$pagend step=1}
			     {if $smarty.section.p.index==$page}
				<span>{$smarty.section.p.index}</span>
			     {else}
				 <a href="{$smarty.server.REQUEST_URI}&page={$smarty.section.p.index}">{$smarty.section.p.index}</a>
			      {/if}
			   
			      
				 
			{/section}
			{if $page < $pages-1}			
			    <a href="{$smarty.server.REQUEST_URI}&page={$page+1}">&gt;</a>
			    <a href="{$smarty.server.REQUEST_URI}&page={$pages-1}">&gt;&gt;</a>	
			{/if}
		    </div>
		
	    {/if}
	
	{else}
	
		<pre> Ovo je obavještajna stranica u vezi pretplana na časopise. </pre>
		<pre> Nakon što se prijavite moći ćete se pretplatiti na pojedine časopise. </pre>
		<pre>  </pre>
		<pre> Trenutne moguće pretplate su jednomjesečna, tromjesečna, šestomjesečna i godišnja pretplata na sve časopise. </pre>
	
	{/if}
	
	{if $smarty.session.tipKorisnika == 4}
		<pre>  </pre>
		<pre>  </pre>
		<pre>  </pre>
		<h2> Popis pretplata: </h2>  <a href="http://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_032/popis_pretplata.php">Popis</a>
	{/if}

{include file = "footer.tpl"}