$(document).ready(function() {

  
 	$('button').click(function() {
	 	var cedula = $(this).val();

    	if(cedula.length>0){
    		var result = cedula.split('-');
    		if(result[2]=='Mod'){
    			document.getElementById('regActividad').style = "display:none";
    			document.getElementById('modActividad').style = "display:block";
    			document.getElementById('tipoactividadMod').value = result[1] ;
                document.getElementById('idActividad').value = result[0];
    		}
    	}
    });

});