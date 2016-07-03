<!-- Komentar da se izbjegne pogreska kod starijih preglednika

//funkcija koja se poziva kad je cijeli dokument ucitan
			$(function(){
				$.ajax({
					url:'komentari.php',
					data:{xml: '1', noPages: ''},
					type:'GET',
					dataType: 'xml',
					success: function(xml) {
						//dinamicki kreiramo tablicu (slicno kao document.createElement)
						var tablica = $('<table id="tablica" border="1px">');
						$(xml).find('komentar').each(function(){
							tablica.append('<tr><td width="200">' + $(this).attr('tekst') + '</td><td width="100">' + $(this).attr('korisnik') + '</td><td width="150">' + $(this).attr('datum') + '</td></tr>');
						});
						//gotovu tablicu postavimo na pripremljeno mjesto
						$('#jq').append(tablica);
						//dodamo paging element (kod preuzet sa http://devlegion.com/?page_id=15)
						
						$('#jq').append("<div class='pager'><a href='#' alt='First' class='firstPage'>First</a><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'></span> of <span class='totalPages'></span><a href='#' alt='Next' class='nextPage'>Next</a><a href='#' alt='Last' class='lastPage'>Last</a></div>");
						
						//napravimo client-side paginaciju tablice, prije je potrebno ukljuciti jquery.paginatetable.js 
						$('#tablica').paginateTable({ rowsPerPage: 5 });

						$('#tablica tr td').click(function(){

							var tdVrijednost = $(this).text();						
							console.log(tdVrijednost);
						});
						
						//prikazemo rezultat uz animaciju po zelji
						$('#jq').show('blind', 1000);
						}

			});
			
});
// kraj komentara -->