

$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();


    if(cedula.length>0){

        var result = cedula.split('-');

        if(result[1] == 'Mod'){
            document.getElementById('notificacionSocio').innerHTML = ''
            
            document.getElementById("cedulaVieja").value = cedula;

            document.getElementById("btnAgregar").style.display = 'none';
            document.getElementById("btnModificar").style.display = 'block';
            document.getElementById('cajaVerSocio').style.display = 'none';

            $.post('../business/socioAction.php', {cedula:result[0]}, function(data){

            var array = JSON.parse(data);

            document.getElementById('cajaFormulario').style.display='block';
            document.getElementById('sociocedula').value = array['sociocedula'];
            document.getElementById('socionombre').value = array['socionombre'];
            document.getElementById('socioprimerapellido').value = array['socioprimerapellido'];
            document.getElementById('sociosegundoapellido').value = array['sociosegundoapellido'];
            document.getElementById('sociotelmovil').value = array['sociotelefono'];
            document.getElementById('sociocorreo').value = array['sociocorreo'];
            document.getElementById('sociopueblo').value = array['sociopueblo'];
            var tipoactividadid = array['tipoactividadid'];
            var fincatipoid = array['fincatipoid'];
            var tipoEstado = array['estadosociodetalle'];

            
            $("input:radio").removeAttr("checked");

            $('#'+tipoactividadid+'-actividad').attr('checked',true);

            $('#'+fincatipoid+'-tipo').attr('checked',true);

            $('#'+tipoEstado+'-estado').attr('checked',true);
            
            var provincia = array['socioprovincia'];
            var cantones =array['sociocanton'];
            var distritos = array['sociodistrito'];

        });

        }else if(result[1] == 'Ver'){
            var tipoactividadid;
            var fincatipoid;
            var tipoEstado;
            document.getElementById('notificacionSocio').innerHTML = ''

            document.getElementById('cajaVerSocio').style.display = 'block';
            document.getElementById('cajaFormulario').style.display='none';
            document.getElementById("btnAgregar").style.display = 'none';
            document.getElementById("btnModificar").style.display = 'none';


            $.post('../business/socioAction.php', {cedula:result[0]}, function(data){

            var array = JSON.parse(data);


            document.getElementById('cedula').value = array['sociocedula'];
            document.getElementById('nombre').value = array['socionombre'];
            document.getElementById('primerapellido').value = array['socioprimerapellido'];
            document.getElementById('segundoapellido').value = array['sociosegundoapellido'];
            document.getElementById('telmovil').value = array['sociotelefono'];
            document.getElementById('correo').value = array['sociocorreo'];

            var fecha = array['sociofechaingreso'].split('-');
            var fechaSalida = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
            document.getElementById('fechaS').value = fechaSalida;


             tipoactividadid = array['tipoactividadid'];
             fincatipoid = array['fincatipoid'];
             tipoEstado = array['estadosociodetalle'];

           

            document.getElementById('prov').value = getProvincia(array['socioprovincia']);
            document.getElementById('can').value = getCanton(array['socioprovincia'],array['sociocanton']);
            document.getElementById('dis').value = getDistrito(array['socioprovincia'],array['sociocanton'],array['sociodistrito']);
            document.getElementById('pueb').value = array['sociopueblo'];

            



            });
            $.post('../business/socioAction.php', {tipoactividad:tipoactividadid,fincatipo:fincatipoid,estado:tipoEstado}, function(data){
                 alert(tipoactividadid+" "+fincatipoid+" "+tipoEstado);

            var arraySocio = JSON.parse(data);

            document.getElementById("tipoActi").value = arraySocio['tipoactividadnombre'];
            document.getElementById("tipoFinc").value = arraySocio['fincatiponombre'];
            document.getElementById("esta").value = arraySocio['socioestadodetalle'];

            });
                
            
        } else if(result[1] == 'Desac'){
            document.getElementById('cajaVerSocio').style.display = 'none';
            document.getElementById('cajaFormulario').style.display='none';
           
             
             $.post('../business/socioAction.php', {desactivar:result[0]}, function(data){

                if(data == 1){
                     document.getElementById('notificacionSocio').innerHTML = 'Socio Desactivado';
                }else{
                     document.getElementById('notificacionSocio').innerHTML = 'No se puede Desactivar ';
                }
             });

        }
    }
        
    });
});

function getProvincia(provincia){
    var result;
    $.ajax({
            dataType: "json",
            url: "https://ubicaciones.paginasweb.cr/provincias.json",
            data: {},
            async: false,
            success: function (data) {
                 for(key in data) {
                    if(key == provincia){
                        result =  data[key];
                        break;

                    }
                    
                }
            }
        });
    return result;

}

function getCanton(provincia,can){
    var canton;
    $.ajax({
            dataType: "json",
            url: "https://ubicaciones.paginasweb.cr/provincia/"+provincia+"/cantones.json",
            data: {},
            async: false,
            success: function (data) {
                 for(key in data) {
                    if(key == can){
                        canton =  data[key];
                        break;

                    }
                    
                }
            }
        });
    return canton;

}

function getDistrito(valor,valorCantones,distrito){
    var distrito;
        $.ajax({
                dataType: "json",
             
                url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/canton/"+valorCantones+"/distritos.json",

                data: {},
                async: false,

                success: function (data) {
                    for(key in data) {
                    	
                    		if(key == distrito){
                                distrito = data[key];
                                break;
                            }
                    	
                        
                    }
                }
        });
        return distrito;
}