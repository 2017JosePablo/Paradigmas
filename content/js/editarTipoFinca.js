
$(document).ready(function() {

    $('button').click(function() {
    	var cedula = $(this).val();
    	if(cedula.length>0){
    		var result = cedula.split('-');
    		if(result[2] == 'Mod'){
    			document.getElementById('cajaInsert').style = "display:none";
    			document.getElementById('cajaUpdate').style = "display:block";
    			document.getElementById('tipofincaUp').value = result[1];
                document.getElementById('idTipoFinca').value = result[0];
    		}
    	}

    });
});