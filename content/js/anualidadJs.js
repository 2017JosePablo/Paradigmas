$(document).ready(function() {
 	$('button').click(function() {
    var id = $(this).val();
    if(id.length>0){
      var result = id.split('~');
      if(result[0]=='seleccionar'){
           document.getElementById('cedulaResponsableAnualidad').value = result[1];
      }else if(result[0]=='editar'){
        
        alert("Editando");

      }
    }



    	}
    );

});
