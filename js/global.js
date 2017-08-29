$('#modificar-submit').on('click',function(){
	var cedula = $("#modificar-submit").val();

	if($.trim(cedula) != ' '){

		$.post('../business/socioAction.php', {cedula:cedula}, function(data){
			
			$('div#mostrarInformacion').text(data);

		});
	}

	
});
