

$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	if(cedula.length>0){

    		$.post('../business/fincaAction.php', {cedula:cedula}, function(data){
    			//alert("Selecionado editar");
    			var array = JSON.parse(data);

    			/*
    			document.getElementById("actualizar").style="display:block";
    			document.getElementById("finalizar").style='display:none';
    			document.getElementById('registrarFinca').style="display:block";
    			document.getElementById('datosDireccion').style='display:none';
    			document.getElementById("cedula").value = cedula;
    			document.getElementById("fincaarea").value = $result->getArea();
    			document.getElementById("cantidadbobinos").value = $result->getCantidadBovinos();
    			*/
			});

    	}
    });
});