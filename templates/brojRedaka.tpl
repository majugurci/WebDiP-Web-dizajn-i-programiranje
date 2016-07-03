{include file = "header3.tpl"}

	<h2> Postavi broj redaka po tablici: </h2>
	
	Trenutni broj redaka: {$broj_redaka}

	<form name='brojRedaka' action='brojRedaka.php' method='post'>
		<table id="tablica2" border="0px">
			<tr></tr>
			<tr>
				<td class='labelRight'> <label for="brojRedaka" > Broj redaka: </label> </td>
				<td> <input type="text" name="brojRedaka" id="brojRedaka" value=""/> </td>
			</tr>
			<tr></tr>
			<tr>
				<td class='labelRight'> </td>
				<td> <input type='submit' name='salji' value='Postavi' />  </td>
			</tr>
		</table>
	</form>
{include file = "footer.tpl"}