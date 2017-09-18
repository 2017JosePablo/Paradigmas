$(document).ready(function() {
    $('button').click(function() {

    	if($(this).val().length>0){
    		var result = $(this).val().split('-');    		
    		document.getElementById(result[0]).innerHTML = getCamposRegistro(result[1]);	
    	}
    	
    });

});

							//puede ser P que se refiere a presidente entc 
function getCamposRegistro(tipo){
	var campos = "<table> <tr>";
	campos+="<tr><td>Cedula</td><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td>Telefono Movil</td><td>Correo</td></tr>";
	campos+="<td><input type='text' name='sociocedula"+tipo+"' id='sociocedula'  required></td>";
	campos+="<td><input type='text' name='socionombre"+tipo+"' id='socionombre'  required></td>";
	campos+="<td><input type='text' name='socioprimerapellido"+tipo+"' id='socioprimerapellido'  required> </td>";
	campos+="<td><input type='text' name='sociosegundoapellido"+tipo+"' id='sociosegundoapellido'  required>";
	campos+="</td><td><input type='text' name='sociotelmovil"+tipo+"' id='sociotelmovil'></td>";
	campos+="<td><input type='email'  required name='sociocorreo"+tipo+"' id='sociocorreo'></td></tr>";
	campos+="</table>"
	return campos;
}


