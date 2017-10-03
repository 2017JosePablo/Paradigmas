$(document).ready(function() {

  
 	$('button').click(function() {
	 	var cedula = $(this).val();

    	if(cedula.length>0){
    		var result = cedula.split('-');
    		alert(result[0]);
    	}
    });

});