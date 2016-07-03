{include file = "header3.tpl"}

	<h3>Pomak vremena</h3>
	<pre>  </pre>
	{if ($smarty.session.tipKorisnika==4)}
		<div class = "podaci">
			<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Postavi pomak</a></br>
			<a href="vrijeme.php?uzmi=pomak">Postavi sustavsko vrijeme</a> {$return}	
			<pre>  </pre>
			<p>Stvarno vrijeme: {$time}</p>
			<p>Virtualno vrijeme: {$vrijeme}<p>
		</div>	
	{else}
		{$neovlasteno}
	{/if}

{include file = "footer.tpl"}