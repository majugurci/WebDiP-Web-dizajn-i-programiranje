{include file = "header3.tpl"}

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
            {section name=i loop=$korisnici}
                <tr>
					<td>{$korisnici[i]->id_korisnik}</td>
					<td> 
						{if ($korisnici[i]->status_korisnika_id_status == 1)}
							Neaktiviran
						{elseif ($korisnici[i]->status_korisnika_id_status == 2)}
							Aktiviran
						{elseif ($korisnici[i]->status_korisnika_id_status == 3)}
							Blokiran
						{elseif ($korisnici[i]->status_korisnika_id_status == 4)}
							Zamrznut
						{else ($korisnici[i]->status_korisnika_id_status == 5)}
							Obrisan
						{/if}
					</td>
					<td> 
						{if ($korisnici[i]->tip_korisnika_id_tip == 1)}
							Neregistriran
						{elseif ($korisnici[i]->tip_korisnika_id_tip == 2)}
							Normalan
						{elseif ($korisnici[i]->tip_korisnika_id_tip == 3)}
							Moderator
						{else ($korisnici[i]->tip_korisnika_id_tip == 4)}
							Admin
						{/if}
					</td>
                    <td>
					{if $smarty.session.tipKorisnika == 4}
						<a href="uredi.php?editId={$korisnici[i]->korisnicko_ime}">{$korisnici[i]->korisnicko_ime}</a>
					{/if}
					{if $smarty.session.tipKorisnika != 4}
						{$korisnici[i]->korisnicko_ime}
					{/if}</td>
                    <td>{$korisnici[i]->ime}</td>
                    <td>{$korisnici[i]->prezime}</td>
                    <td>{$korisnici[i]->email}</td>
					<td><img src="{$korisnici[i]->slika}" width="80" height="70" /></td>
                </tr>
				
            {/section}
			</tbody>
	      </table>

	    {if $pages > 2}
	 
		    <div id="pagination">
			
			{if $page > 1}
			    <a href="?page=1">&lt;&lt;</a>		
			    <a href="?page={$page-1}">&lt;</a>
			{/if}
			{section name=p start=$pagstart loop=$pagend step=1}
			     {if $smarty.section.p.index==$page}
				<span>{$smarty.section.p.index}</span>
			     {else}
				 <a href="?page={$smarty.section.p.index}">{$smarty.section.p.index}</a>
			      {/if}
			   
			      
				 
			{/section}
			{if $page < $pages-1}			
			    <a href="?page={$page+1}">&gt;</a>
			    <a href="?page={$pages-1}">&gt;&gt;</a>	
			{/if}
		    </div>
		
	    {/if}
      
	
{include file = "footer.tpl"}