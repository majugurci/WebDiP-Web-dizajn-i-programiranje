{include file = "header3.tpl"}

	<h2> Zaključani korisnici </h2>

	{if ($brojZakljucanih==0)}
	
	<h3> Nema zaključanih korisnika </h3>
	
	{else}

	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">ID Korisnika</th>
                <th width="100">Korisničko ime</th>
				<th width="100">Otključaj račun</th>
            </tr>
		</thead>
		<tbody>
            {section name=i loop=$korisnici}
                <tr>
					<td>{$korisnici[i]->id_korisnik}</td>
                    <td>{$korisnici[i]->korisnicko_ime}</td>
                    <td><a href="zakljucani.php?editId={$korisnici[i]->id_korisnik}">Otključaj</a></td>
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
      
	 {/if}
{include file = "footer.tpl"}