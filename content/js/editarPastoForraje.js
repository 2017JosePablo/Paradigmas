$(document).ready(function() {
    $('button').click(function() {
    	var cedula = $(this).val();
    	if(cedula.length>0){
    		var result = cedula.split('-');
    		if(result[2] == 'Mod'){


    			document.getElementById('cajaReg').style = "display:none";
    			document.getElementById('cajaEdi').style = "display:block";
    			document.getElementById('nombreForraje').value = result[1];
          document.getElementById('idForraje').value = result[0];

    		}
    	}

    });
});
