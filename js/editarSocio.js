

$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();

    	if(cedula.length>0){

    		document.getElementById("btnAgregar").style.display = 'none';
    		document.getElementById("btnModificar").style.display = 'block';

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

			
			$("input:radio").removeAttr("checked");

			$('#'+tipoactividadid+'-actividad').attr('checked',true);

			$('#'+fincatipoid+'-tipo').attr('checked',true);

			$('#'+tipoEstado+'-estado').attr('checked',true);

			//PONER los opcion selected

			
			var provincia = array['socioprovincia'];
			var cantones =array['sociocanton'];
			var distritos = array['sociodistrito'];

			//alert(provincia+' '+cantones+' '+distritos);
//
			//llenarCantones2(provincia);
			//setDistrito2(provincia,cantones);

		});
	}else{

	}
        
    });
});

function llenarCantones2(valor){
	if(valor >0){
    $.ajax({
            dataType: "json",
            url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/cantones.json",
            data: {},
            success: function (data) {
                var html = "<select class='form-control' id='listadoCantones' name = 'listadoCantones' >";

                html+="<option value = -1 >Seleccione un Canton</option>";
                 for(key in data) {
                 	
                 		html += "<option value="+key+">"+data[key]+"</option>"; 
                    
                }
                html += "</select>";
                $('#cajaCantones').html(html);
            }
        });
    }else{
        var html = "<select class='form-control'value = '-1'><option>Seleccione Un Canton</option></select>";
                $('#cajaCantones').html(html);
    }

}

function setDistrito2(valor,valorCantones){

    if(valor >0){
        $.ajax({
                dataType: "json",
             
                url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/canton/"+valorCantones+"/distritos.json",

                data: {},
                success: function (data) {
                    var html = "<select class='form-control' id='listadoDistritos' name = 'listadoDistrito'  >";
                     html+="<option value = -1>Selecciones un Distrito</option>";
                 
                    for(key in data) {
                    	
                    		html += "<option value="+key+">"+data[key]+"</option>";
                    	
                        
                    }
                    html += "</select>";
                    $('#cajaDistrito').html(html);
                }
        });
    }else{
        var html = "<select class='form-control' ><option value = '0' >Seleccione Un Distrito</option></select>";
                 $('#cajaDistrito').html(html);        
    }
}