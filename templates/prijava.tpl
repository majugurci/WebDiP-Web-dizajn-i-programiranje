{include file = "header1.tpl"}
	
	<p> Za nastavak rada sa aplikacijom, molim prijavite se. </p>
					<form name='prijava' action='prijava.php' method='post'>
						<fieldset class='fieldsetLogin'>
							<legend class='fieldsetLegend'> Prijava: </legend>
							<table border="0" >
								<tr>
									<td class='labelRight'>  </td>
									<td> 
										{$casopisiDetalji}
										{$greskaLogin1}
										{$greskaLogin2}
										{$greskaLogin3}
										{$greskaLogin4}
										{$greskaLogin5}
										{$greskaLogin6}
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="korIme" > Korisničko ime: </label> </td>
									<td> <input type="text" name="korIme" id="korIme" value="{$Korisnik}"/> 
									
									</td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> 
										{$greskaKorIme}
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for='lozinka' > Lozinka: </label> </td>
									<td> <input type='password' name='lozinka' id='lozinka' /> </td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> 
										{$greskaLozinka}
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="zapamtiMe">Zapamti me?:</label> </td>
									<td> <input type="checkbox" name="zapamtiMe" id="zapamtiMe" value="1"/> <br/> </td>
								</tr>
								<tr>
									<td class='labelRight'> <input id="reset" name="reset" type="reset" value="Obriši" /> </td>
									<td> <input type='submit' name='saljiLog' value='Prijavi se' />  </td>
								</tr>
								<tr>
									<td class='labelRight'></td>
									<td> <a href="zaboravljenaLozinka.php">Zaboravljena lozinka?</a> </td>
								</tr>
							</table>
						</fieldset>
					</form>
	
{include file = "footer.tpl"}