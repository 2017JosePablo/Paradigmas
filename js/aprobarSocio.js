$(document).ready(function() {
    $('button').click(function() {

    	if($(this).val().length>0){
            var result =  $(this).val().split('~');
            var cedula = result[0];
          document.getElementById('socioid').value = result[0];
            if(result[1] == 'aprovar'){
              alert("aprovador");
              document.getElementById('cajaAprovacion').style='display:block';
              document.getElementById('cajaMotivo').style='display:none';
              document.getElementById('estadoSocio').value = "aprovado";

            }
            if(result[1]=='rechazar'){
              document.getElementById('cajaAprovacion').style='display:none';
              document.getElementById('cajaMotivo').style='display:block';
              document.getElementById('estadoSocio').value = "rechazado";
            }
        }
      });
});
