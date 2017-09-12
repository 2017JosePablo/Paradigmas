
$(document).ready(function() {

    $('button').click(function() {

    	var cedula = $(this).val();


    	if(cedula.length>0){

            var result = cedula.split('-');

            if(result[1]=='Ver'){
                alert('ver');
            }else if(result[1]=='Mod'){
                alert('Mod');
            }else if(result[1]=='Reg'){
                alert('Reg');
            }

        } 

        

    });
});