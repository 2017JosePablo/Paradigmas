

$(document).ready(function() {
    $('button').click(function() {

    	var cedula = $(this).val();



    	if(cedula.length>0){

            var result = cedula.split('-');

            if(result[1]=='Ver'){

                $.post('../business/fincaAction.php', {cedulafinca:result[0]}, function(data){

                    var array = JSON.parse(data);

                    document.getElementById('registrarFinca').style="display:none";
                    document.getElementById('datosDireccion').style='display:none';
                    document.getElementById("actualizar").style="display:none";
                    document.getElementById("finalizar").style='display:none';
                    document.getElementById('cajaFinca').style='display:block';


                       // datos de la finca
                    document.getElementById("area").value = array['fincaarea'];
                    document.getElementById("bobinos").value = array['fincacantidadbobinos'];
                    document.getElementById('tipoActi').value = array['tipoactividadnombre'];
                    document.getElementById('tipoFinc').value = array['fincatiponombre'];

                    //datos Socio//
                    document.getElementById('ced').value = result[0];
                    document.getElementById('nombre').value = array['socionombre'];
                    document.getElementById('primerapellido').value = array['socioprimerapellido'];
                    document.getElementById('segundoapellido').value = array['sociosegundoapellido'];

                    ////Datos de direccion///
                    document.getElementById('prov').value = getProvincia(array['fincaprovincia']);
                    document.getElementById('can').value = getCanton(array['fincaprovincia'],array['fincacanton']);
                    document.getElementById('dis').value = getDistrito(array['fincaprovincia'],array['fincacanton'],array['fincadistrito']);
                    document.getElementById('pueb').value = array['fincaexacta'];
                    
                });


            }else{
                if(result[1]=='Mod'){



                     $.post('../business/fincaAction.php', {cedulafinca:result[0]}, function(data){
                        var array = JSON.parse(data);

                        document.getElementById("actualizar").style="display:block";
                        document.getElementById("finalizar").style='display:none';
                        document.getElementById('registrarFinca').style="display:block";

                        

                    

                    document.getElementById('cajaFinca').style='display:none';
                    document.getElementById('datosDireccion').style='display:block';


                        document.getElementById("cedula").value = result[0];
                        document.getElementById("fincaarea").value = array['fincaarea'];
                        document.getElementById("cantidadbobinos").value = array['fincacantidadbobinos'];


                    ////Datos de direccion///
                    //document.getElementById('prov').value = getProvincia(array['fincaprovincia']);
                    //document.getElementById('can').value = getCanton(array['fincaprovincia'],array['fincacanton']);
                    //document.getElementById('dis').value = getDistrito(array['fincaprovincia'],array['fincacanton'],array['fincadistrito']);


                    document.getElementById('fincapueblo').value = array['fincapueblo'];
                    document.getElementById("fincaexacta").value = array['fincaexacta'];

                    
                });

                }
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