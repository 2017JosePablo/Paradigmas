$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	
    	if(cedula.length>0){

    		$.post('../business/socioAction.php', {cedula:cedula}, function(data){
    			alert("Selecionado editar");
			});


    	}


    });
});