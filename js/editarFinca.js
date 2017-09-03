$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	
    	if(cedula.length>0){

    		$.post('../business/socioAction.php', {cedula:cedula}, function(data){
    			alert("Selecionado editar");

    			document.getElementById("btnModificar").style="display:block";
    			document.getElementById("btnFinalizar").style='display:none';
    			document.getElementById('registrarFinca').style="display:block";
    			document.getElementById('datosDireccion').style='display:none';
    			
			});


    	}


    });
});