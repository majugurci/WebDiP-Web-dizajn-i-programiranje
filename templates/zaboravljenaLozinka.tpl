{include file = "header1.tpl"}
	
	Unesite svoje korisničko ime i e-mail adresu kako bi Vam poslali novu lozinku.
	
	<pre>  </pre>
	
	<form id="zaboravljenaLozinka" name="lozinka" action="zaboravljenaLozinka.php" method="POST" enctype="multipart/form-data">
						<fieldset class="fieldsetRegistracija" style="width: 600px;">
							<legend class='fieldsetLegend'> Povrat lozinke: </legend>
							<div id='regsadrzaj' class='regSadrzaj'>
							<table border="0">
								<tr>
									<td class='labelRight'> <label for="korIme" >Korisničko ime: </label> </td>
									<td> <input type='text' name='korIme' id='korIme' {if isset($korIme)} value="{$korIme}"{/if} /> 
										 <span class='greska'>{$greskaKorIme}
										 {$greskaKorImeNePostoji}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> <label for="eMail">e-mail: </label> </td>
									<td> <input type='text' name='eMail' id='eMail' {if isset($eMail)} value="{$eMail}"{/if} /> 
										 <span class='greska'>{$greskaEmail}
										 {$emailNePostoji}</span>
									</td>
								</tr>
								<tr>
									<td class='labelRight'> </td>
									<td> <input type='submit' name='saljiLozinku' id='saljiLozinku' value='Pošalji lozinku'/>  </td>
								</tr>
							</table>
							</div>
						</fieldset>
					</form>
	
{include file = "footer.tpl"}