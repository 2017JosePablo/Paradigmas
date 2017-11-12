/* 
Autor: Olivier Blanco.
Fecha: 19/09/2014.
Descripción: Funciones para interactuar con las acciones del usuario
*/

$(document).ready(function(e) {
	
	$('.flexslider').flexslider({
		animation: "slide"
	});
    
	$('#show_menu').click(function(e) {
        
		$(this).animate({
			left: "-100%"
		},500);
		
		$('.overlay').fadeIn('slow');

		$('aside').animate({
			left: "0"
		},1000);
		
    });
	
	
	$('#hide_menu').click(function(e) {
        
		$('.overlay').fadeOut();

		$('aside').animate({
			left: "-100%"
		},1000);
		
		$('#show_menu').animate({
			left: "0"
		},500);
		
    });
	
	$('aside nav ul li a').click(function(e) {
		$(this).parent().find('ul').toggle();
    });
	
	$('aside nav ul li ul a').click(function(e) {
		$(this).parent().parent().show();
    });
	
	
	$('.menu a').click(function(e) {
		
		var url = $(this).attr('url');
		
		$("#content_ajax").load(url, function( response, status, xhr ) {
			if ( status == "error" ) {
				$("#content_ajax").html( '<div class="error"> ERROR ' + xhr.status + ": "+ url + " " + xhr.statusText + '</div>');
			}
		});
		
		$('.menu a').removeClass('current');
		$(this).addClass('current');
    });
	
	
});


$(document).on('submit','form.execute', function( event ) {
		
	var data = $(this).serialize();
	var url = $(this).attr('action');
	var method = $(this).attr('method');
	
	if(method=='post'){
		$.post( url, data, function(response) {
			$("#content_ajax").html(response);
		});
	}else{
		$.get( url, data, function(response) {
			$("#content_ajax").html(response);
		});
	}
	
	event.preventDefault();
	
});
