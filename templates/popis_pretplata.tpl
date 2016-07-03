{include file = "header1.tpl"}
	
	<table id="tablica2" border="1px">
		<thead>
            <tr>
				<th width="100">ID</th>
                <th width="100">Korisnik</th>
                <th width="100">Časopis</th>
				<th width="100">Datum početka</th>
				<th width="100">Datum isteka</th>
            </tr>
		</thead>
		<tbody>
            {section name=i loop=$pretplate}
                <tr>
                    <td>{$pretplate[i]->id_pretplata}</td>
                    <td>{$korisnik[i]}</td>
					<td>{$casopis[i]}</td>
					<td>{$pretplate[i]->datum_pocetka}</td>
					<td>{$pretplate[i]->datum_isteka}</td>
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

{include file = "footer.tpl"}