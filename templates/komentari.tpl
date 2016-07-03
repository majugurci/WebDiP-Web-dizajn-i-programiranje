{include file = "header1.tpl"}

	<h1> Časopis: <b> {$casopisNaziv} </b> </h1>

	<pre>  </pre>
	
	<h2> Galerija starih naslovnica: </h2>
	
	{if !$slike}
		Trenutno nemamo slika naslovnica u bazi podataka.
	{else}
		{section name=i loop=$slike}
			<a href="{$slike[i]->lokacija}" rel="lightbox[roadtrip]"> <img src="{$slike[i]->lokacija}" width="100" height="170"/> </a>
		{/section}
	{/if}
	
	<pre>  </pre>
	
	<h2> Ocijeni časopis: </h2>
	
	{if ($ocjenjeno == 1 || $ocjenjeno == 2 || $ocjenjeno == 3 || $ocjenjeno == 4 || $ocjenjeno == 5)}
	
		Vaša ocjena časopisa: <b>{$ocjenjeno}</b>
	
	{else}
		<form name='ocijeni' action='{$smarty.server.REQUEST_URI}' method='post'>
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
	{/if}

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
            {section name=i loop=$komentari}
                <tr>
                    <td>{$komentari[i]->tekst}</td>
                    <td>{$koris[i]}</td>
                    <td>{$komentari[i]->datum}</td>
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
		
	<pre>  </pre>
	
	<h2> Dodaj komentar: </h2>
	
	<form name='komentiraj' action='{$smarty.server.REQUEST_URI}' method='post'>
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
      
	
	{* Admin uređuje podatke časopisa *}
	  
	{if ($smarty.session.tipKorisnika==4)}

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
            {section name=i loop=$casopisiAdmin}
                <tr>
                    <td>{$casopisiAdmin[i]->id_casopis}</td>
                    <td class="edit naziv {$casopisiAdmin[i]->id_casopis}">{$casopisiAdmin[i]->naziv}</td>
					<td class="edit izdavac {$casopisiAdmin[i]->id_casopis}">{$casopisiAdmin[i]->izdavac}</td>
					<td class="edit broj_strana {$casopisiAdmin[i]->id_casopis}">{$casopisiAdmin[i]->broj_strana}</td>
					<td class="edit periodicnost_publikacije {$casopisiAdmin[i]->id_casopis}">{$casopisiAdmin[i]->periodicnost_publikacije}</td>
                </tr>
				
            {/section}
			</tbody>
	      </table>
	
	{/if}
	
	
	{* Moderator uređuje podatke časopisa *}
	
	{if (isset($nijeMod))}
	
	{elseif ($smarty.session.tipKorisnika==3)}

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
            {section name=i loop=$casopisiMod}
                <tr>
                    <td>{$casopisiMod[i]->id_casopis}</td>
                    <td class="edit naziv {$casopisiMod[i]->id_casopis}">{$casopisiMod[i]->naziv}</td>
					<td class="edit izdavac {$casopisiMod[i]->id_casopis}">{$casopisiMod[i]->izdavac}</td>
					<td class="edit broj_strana {$casopisiMod[i]->id_casopis}">{$casopisiMod[i]->broj_strana}</td>
					<td class="edit periodicnost_publikacije {$casopisiMod[i]->id_casopis}">{$casopisiMod[i]->periodicnost_publikacije}</td>
                </tr>
				
            {/section}
			</tbody>
	      </table>
	{else}

	{/if}
	
{include file = "footer.tpl"}