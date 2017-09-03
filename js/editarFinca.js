$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	
    	if(cedula.length>0){
    		alert(cedula);
    	}


    });
});