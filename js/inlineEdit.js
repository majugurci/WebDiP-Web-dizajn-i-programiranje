$(document).ready(function(){
									
									
									
		$('td.edit').click(function(){
							 
							   			
							            $('.ajax').html($('.ajax input').val());
							            $('.ajax').removeClass('ajax');
										
										$(this).addClass('ajax');
								  		$(this).html('<input id="editbox" size="'+$(this).text().length+'" type="text" value="' + $(this).text() + '">');
										
										$('#editbox').focus();
								        
								  }
						 
						 
						 
						 
						 );
					  
		$('td.edit').keydown(function(event){
									  
									  
									 arr = $(this).attr('class').split( " " );
									 
									 //document.write (arr);
									 
									 if(event.which == 13)
									 { 
								  		
								  		$.ajax({    type: "POST",
											        url:"komentariInline.php",
													data: "value="+$('.ajax input').val()+"&rownum="+arr[2]+"&field="+arr[1],
													success: function(data){
														 $('.ajax').html($('.ajax input').val());
							                             $('.ajax').removeClass('ajax');
													}});
									 }
								  
								  }
					 
						 
						 
						 );
		
		
		$('#editbox').live('blur',function(){

									 $('.ajax').html($('.ajax input').val());
							         $('.ajax').removeClass('ajax');
									});
									
		
	
	});