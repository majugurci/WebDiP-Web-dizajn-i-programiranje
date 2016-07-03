{include file = "header1.tpl"}

	<form id="uredi" name="uredi" action="uredi_obrada.php" method="POST" enctype="multipart/form-data">
	<fieldset class="fieldsetRegistracija" style="width: 600px;">
		<legend class='fieldsetLegend'> Uređivanje podataka: </legend>
		<table border="0">
			<tr>
				<td class='labelRight'> <label for="ime"> Ime: </label> </td>
				<td><input type='text' name='ime' {if isset($ime)} value="{$ime}"{/if} />
					{$greskaIme}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="prezime"> Prezime: </label> </td>
				<td><input type='text' name='prezime' {if isset($prezime)} value="{$prezime}"{/if} />
					{$greskaPrezime}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="eMail"> e-mail: </label> </td>
				<td> <input type='text' name='eMail' {if isset($eMail)} value="{$eMail}"{/if}/> 
					{$greskaEmail}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="korIme"> Korisničko ime: </label> </td>
				<td> <input type='text' name='korIme' {if isset($korIme1)} value="{$korIme1}"{/if}/>
					{$greskaKorIme}
					{$greskaKorImePostoji}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="lozinka"> Lozinka: </label> </td>
				<td> <input type='password' name='lozinka' {if isset($lozinka)} value="{$lozinka}"{/if} />
					{$greskaLozinka}
					{$greskaLozinkaDuzina}
					{$greskaLozinka_krivo}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <label for="lozinkaPot"> Ponovni unos lozinke: </label> </td>
				<td> <input type='password' name='lozinkaPot' {if isset($lozinkaPot)} value="{$lozinkaPot}"{/if} /> 
					{$greskaLozinkaPot}
					{$greskaLozinkaJednake}
				</td>
			</tr>
			</tr>
			<tr>
				<td class='labelRight'> <label for="slika"> Odaberite sliku: </label> </td>
				<td> <input type='file' name='slika' {if isset($slika)} value="{$slika}"{/if}/>
					{$greskaSlika}
					{$greskaSlikaEkstenzija}
				</td>
			</tr>
			<tr>
				<td class='labelRight'> <input id="reset" name="reset" type="reset" value="Obriši sve" /> </td>
				<td> <input type='submit' name='salji' value='Spremi promjene'/>  </td>
			</tr>
		</table>
	</fieldset>
</form>

{include file = "footer.tpl"}