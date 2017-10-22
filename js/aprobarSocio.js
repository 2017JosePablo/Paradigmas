$(document).ready(function() {
    $('button').click(function() {

    	if($(this).val().length>0){
            var result =  $(this).val().split('~');
            var cedula = result[0];
            if(result[1] == 'aprovar'){
              document.getElementById('cajaAprovacion').style='display:block';
              var temporal = "aprovado+"+cedula;
              var estadoUsuario = "estado+"+cedula;
              document.getElementById(temporal).style='color:#099503';
              document.getElementById(estadoUsuario).value= "Aprovado";


            }else if(result[1]=='rechazar'){
              //alert(cedula);
              document.getElementById('cajaMotivo').style='display:block';
              $.post('../business/socioBusiness.php',{idSocio:result[0]}, function(data){
              });

            }
        }
      });
});
