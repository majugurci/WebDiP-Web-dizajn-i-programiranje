{include file = "header1.tpl"}
	
	<form id="registracija" name="registracija" action="registracija.php" method="POST" enctype="multipart/form-data">
						<fieldset class="fieldsetRegistracija" style="width: 600px;">
							<legend class='fieldsetLegend'> Registracija: </legend>
							<div id='regsadrzaj' class='regSadrzaj'>
							<table border="0">
								<tr>
									<td class='labelRight'> <label for="ime" >Ime: </label> </td>
									<td> <input type='text' name='ime' id='ime'  {if isset($ime)} value="{$ime}"{/if}/> 
										 <span class='greska'>{$greskaIme}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="prezime">Prezime: </label> </td>
									<td> <input type='text' name='prezime' id='prezime' {if isset($prezime)} value="{$prezime}"{/if} /> 
										 <span class='greska'>{$greskaPrezime}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="eMail">e-mail: </label> </td>
									<td> <input type='text' name='eMail' id='eMail' {if isset($eMail)} value="{$eMail}"{/if} /> 
										 <span class='greska'>{$greskaEmail}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight' <label for="korIme">Korisničko ime: </label> </td>
									<td> <input type='text' name='korIme' id='korIme' {if isset($korIme)} value="{$korIme}"{/if} /> 
										<span class='greska'> {$greskaKorIme}
										 {$greskaKorImePostoji}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="lozinka">Lozinka: </label> </td>
									<td> <input type='password' name='lozinka' id='lozinka' {if isset($lozinka)} value="{$lozinka}"{/if} /> 
										 <span class='greska'>{$greskaLozinka}
									 	 {$greskaLozinkaDuzina}
									 	 {$greskaLozinka_krivo}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="lozinka">Ponovni unos lozinke: </label> </td>
									<td> <input type='password' name='lozinkaPot' id='lozinkaPot' {if isset($lozinkaPot)} value="{$lozinkaPot}"{/if} /> 
										 <span class='greska'>{$greskaLozinkaPot}
										 {$greskaLozinkaJednake}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="slika">Slika (<1mb): </label> </td>
									<td> <input type='file' name='slika' id='slika' {if isset($slikaIme)} value="{$slikaIme}"{/if} size="35"/>
										 <span class='greska'>{$greskaSlika}
										 {$greskaSlikaEkstenzija}</span>
								</td>
								</tr>
								

								<tr>
									<td align='right'> <label> Unesite riječi: </label> </td>
									<td>
										{$recaptcha}
										<span class='greska'>{$greskaRecaptcha}</span>
									</td>
								</tr>
								</tr>
								
								
								<tr>
									<td class='labelRight'> <input id="reset" name="reset" id='reset' type="reset" value="Obriši" /> </td>
									<td> <input type='submit' name='saljiReg' id='saljiReg' value='Registriraj me'/>  </td>
								</tr>
							</table>
							</div>
						</fieldset>
					</form>
	
{include file = "footer.tpl"}