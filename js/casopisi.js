<!-- Komentar da se izbjegne pogreska kod starijih preglednika

//funkcija koja se poziva kad je cijeli dokument ucitan
			$(function(){
					$.ajax({
					url:'casopisi.php',
					data:{xml: '1', noPages: ''},
					type:'GET',
					dataType: 'xml',
					success: function(xml) {
						//dinamicki kreiramo tablicu (slicno kao document.createElement)
						var tablica = $('<table id="tablica" border="1px">');
						//tablica.append('<tr><th>Naziv</th><th>Izdavač</th><th>Broj stranica</th><th>Periodičnost</th></tr>');
						var $brojRedaka = 5;
						$(xml).find('casopis').each(function(){
							//generiramo redove iz xml-a i dodajemo ih na tablicu

							tablica.append('<tr><td width="100"><a href="komentari.php?casopisID=' + $(this).attr('id') + '&casopisNaziv=' + $(this).attr('naziv') + '">' + $(this).attr('naziv') + '</a></td><td width="100">' +$(this).attr('izdavac') + '</td><td width="100">' + $(this).attr('broj_strana') + '</td><td width="100">' + $(this).attr('periodicnost_publikacije') + '</td><td width="100">' + $(this).attr('ocjena') + '</td></tr>');
							
							$brojRedaka = $(this).attr('brojRedaka');
						});
						//gotovu tablicu postavimo na pripremljeno mjesto
						$('#jq').append(tablica);
						//dodamo paging element (kod preuzet sa http://devlegion.com/?page_id=15)
						
						$('#jq').append("<div class='pager'><a href='#' alt='First' class='firstPage'>First</a><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'></span> of <span class='totalPages'></span><a href='#' alt='Next' class='nextPage'>Next</a><a href='#' alt='Last' class='lastPage'>Last</a></div>");
						
						//napravimo client-side paginaciju tablice, prije je potrebno ukljuciti jquery.paginatetable.js 
						$('#tablica').paginateTable({ rowsPerPage: $brojRedaka });

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