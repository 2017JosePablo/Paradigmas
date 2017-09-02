
$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	if(cedula.length>0){

    		$.post('../business/socioAction.php', {cedula:cedula}, function(data){
			var array = JSON.parse(data);

			document.getElementById('cajaFormulario').style.display='block';
			document.getElementById('sociocedula').value = array['sociocedula'];
			document.getElementById('socionombre').value = array['socionombre'];
			document.getElementById('socioprimerapellido').value = array['socioprimerapellido'];
			document.getElementById('sociosegundoapellido').value = array['sociosegundoapellido'];
			document.getElementById('sociotelmovil').value = array['sociotelefono'];
			document.getElementById('sociocorreo').value = array['sociocorreo'];


			//document.getElementById('date').value = array['sociofechaingreso'];	

			//sociopueblo		

			//document.getElementById('sociopueblo').value = array['sociocorreo'];
			document.getElementById('sociopueblo').value = array['sociopueblo'];
			var tipoactividadid = array['tipoactividadid'];
			var fincatipoid = array['fincatipoid'];
			var tipoEstado = array['estadosociodetalle'];
			
			//$('#'+tipoactividadid+'').attr('checked',true);

			$('#'+tipoactividadid+'-actividad').attr('checked',true);

			$('#'+fincatipoid+'-tipo').attr('checked',true);

			$('#'+tipoEstado+'-estado').attr('checked',true);



			/*
			$(document).ready(function(){  
              $('input[type="radio"]').click(function(){  
                   var gender = $(this).val();
                   alert(gender);  
                  
              });  
         });
         */


			//alert(array['sociofechaingreso']);

//$socio = ["idsocio"=>$row["socioid"], "sociocedula"=> $row["sociocedula"],"socionombre"=>$row["socionombre"], "socioprimerapellido"=>$row["socioprimerapellido"], "sociosegundoapellido"=>$row["sociosegundoapellido"],"sociotelefono"=>$row["sociotelefono"]
  //                  ,"sociocorreo"=>$row["sociocorreo"],"tipoactividadnombre"=>$row["tipoactividadnombre"] , "fincatiponombre"=>$row["fincatiponombre"] ,"sociofechaingreso"=>$row["sociofechaingreso"] ,"socioestadodetalle"=>$row["socioestadodetalle"] ];




			
			//$('div#mostrarInformacion').text(data);

		});
	}else{

	}





    	


        
    });
});