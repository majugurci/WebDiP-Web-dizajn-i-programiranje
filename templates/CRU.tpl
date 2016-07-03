{include file = "header3.tpl"}

				<div class="cru">
					<h4>CRU nad tablicama</h4>
					<form method="post" action="CRU.php">
							<select name="tb" >
									{section name=o loop=$opcije}
										<option value="{$opcije[o]}">{$opcije[o]}</option>
									{/section}
							</select>
							<input type="submit" name="ok" value="Odaberi" />
						</select>
					</form>
				</div>
					
				<div id="cruds">
				</div>
			
{include file = "footer.tpl"}