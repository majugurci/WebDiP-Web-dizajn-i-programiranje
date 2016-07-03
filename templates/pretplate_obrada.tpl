{include file = "header1.tpl"}
	
	<h2> Časopis: {$casopisNaziv} </h2>
	
	{if isset($vrijemeKraja)}
	
	Vaša pretplata na ovaj časopis traje do: {$vrijemeKraja}
	
	{else}
	
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
				<td> <a href="{$smarty.server.REQUEST_URI}&pretplata=30"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 3 mjeseca </td>
				<td> <a href="{$smarty.server.REQUEST_URI}&pretplata=90"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 6 mjeseci </td>
				<td> <a href="{$smarty.server.REQUEST_URI}&pretplata=180"> Pretplati me! </a> </td>
			</tr>
			<tr>
				<td> 1 godina </td>
				<td> <a href="{$smarty.server.REQUEST_URI}&pretplata=360"> Pretplati me! </a> </td>
			</tr>
		</tbody>
	</table>
	
	{/if}

{include file = "footer.tpl"}