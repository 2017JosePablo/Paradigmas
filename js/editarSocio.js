$(document).ready(function() {
  $('select').on('change', function() {
    if(this.value>0){
      var idsocio =  this.value;
        document.getElementById('socioId').value = idsocio;
    }
  });
});

$(document).ready(function() {
    $('button').click(function() {


    	var cedula = $(this).val();


    if(cedula.length>0){
        var result = cedula.split('~');


        if(result[1] == 'Mod'){
            document.getElementById('notificacionSocio').innerHTML = ''
            document.getElementById("cedulaVieja").value = result[0];
            document.getElementById("agregarsocio").style.display = 'none';
            document.getElementById("modificarsocio").style.display = 'block';

            document.getElementById('cajaVerSocio').style.display = 'none';
            document.getElementById('editarUbic').style.display='none';
            document.getElementById('verDir').style.display='block';

            $.post('../business/socioAction.php', {cedula:result[0]}, function(data){

            var array = JSON.parse(data);

            document.getElementById('cajaFormulario').style.display='block';
            document.getElementById('sociocedula').value = array['sociocedula'];
            document.getElementById('socionombre').value = array['socionombre'];
            document.getElementById('socioprimerapellido').value = array['socioprimerapellido'];
            document.getElementById('sociosegundoapellido').value = array['sociosegundoapellido'];
            document.getElementById('sociotelmovil').value = array['sociotelefono'];
            document.getElementById('sociocorreo').value = array['sociocorreo'];
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

            document.getElementById('provE').value = getProvincia(array['socioprovincia']);
            document.getElementById('canE').value = getCanton(array['socioprovincia'],array['sociocanton']);
            document.getElementById('disE').value = getDistrito(array['socioprovincia'],array['sociocanton'],array['sociodistrito']);
            document.getElementById('puebE').value = array['sociopueblo'];

            document.getElementById("claveMostrarLabel").style.display = 'none';
            document.getElementById("claveMostrarInput").style.display = 'none';

            var fecha = array['sociofechaingreso'].split('-');
            var fechaSalida = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
            document.getElementById('fecha').value = fechaSalida;

            document.getElementById("recomendacion1").value = array['sociorecomendacionuno'];
            document.getElementById("recomendacion2").value = array['sociorecomendacionuno'];

        });

        }else if(result[1] == 'Ver'){
            var tipoactividadid;
            var fincatipoid;
            var tipoEstado;
            document.getElementById('notificacionSocio').innerHTML = ''

            document.getElementById('cajaVerSocio').style.display = 'block';
            document.getElementById('cajaFormulario').style.display='none';
            //document.getElementById("btnAgregar").style.display = 'none';
            //document.getElementById("btnModificar").style.display = 'none';
            document.getElementById("modificarsocio").style.display = 'none';

            $.post('../business/socioAction.php', {versocio:result[0]}, function(data){

            var array = JSON.parse(data);

            //alert();

            document.getElementById('cedula').value = array['sociocedula'];
            document.getElementById('nombre').value = array['socionombre'];
            document.getElementById('primerapellido').value = array['socioprimerapellido'];
            document.getElementById('segundoapellido').value = array['sociosegundoapellido'];
            document.getElementById('telmovil').value = array['sociotelefono'];
            document.getElementById('correo').value = array['sociocorreo'];

            var fecha = array['sociofechaingreso'].split('-');
            var fechaSalida = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
            document.getElementById('fechaS').value = fechaSalida;


             var tipoactividadid = array['tipoactividadid'];
             var fincatipoid = array['fincatipoid'];
             var tipoEstado = array['estadosociodetalle'];



            document.getElementById("tipoActi").value = array['tipoactividadnombre'];
            document.getElementById("tipoFinc").value = array['fincatiponombre'];
            document.getElementById("esta").value = array['socioestadodetalle'];




            document.getElementById('prov').value = getProvincia(array['socioprovincia']);
            document.getElementById('can').value = getCanton(array['socioprovincia'],array['sociocanton']);
            document.getElementById('dis').value = getDistrito(array['socioprovincia'],array['sociocanton'],array['sociodistrito']);
            document.getElementById('pueb').value = array['sociopueblo'];

            document.getElementById("recomendacion1Input").value = array['sociorecomendacionuno'];
            document.getElementById("recomendacion2Input").value = array['sociorecomendacionuno'];

            document.getElementById("claveMostrarLabel").style.display = 'none';
            document.getElementById("claveMostrarInput").style.display = 'none';

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

        }else if(result[1] == 'add'){
          document.getElementById("claveMostrarLabel").style.display = 'block';
          document.getElementById("claveMostrarInput").style.display = 'block';
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
