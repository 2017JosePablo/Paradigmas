

$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	if(cedula.length>0){

    		$.post('../business/fincaAction.php', {cedulaSocio:cedula}, function(data){


  
    			var array = JSON.parse(data);
                
                //alert("click");
    			
    			document.getElementById("actualizar").style="display:block";
    			document.getElementById("finalizar").style='display:none';
    			document.getElementById('registrarFinca').style="display:block";
    			document.getElementById('datosDireccion').style='display:none';
                
    			document.getElementById("cedula").value = array['fincaid'];

    			document.getElementById("fincaarea").value = array['fincaarea'];
    			document.getElementById("cantidadbobinos").value = array['fincacantidadbobinos'];
    			
			});

    	}
    });
});