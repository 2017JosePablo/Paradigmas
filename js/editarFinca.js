

$(document).ready(function() {

    $('button').click(function() {

    	var cedula = $(this).val();



    	if(cedula.length>0){


           
            if(cedula == 'registrar' || cedula == 'actualizar'){

                var tipoCerca = "";
                var validar = 0;

                var checkboxes = document.getElementById("frm").checkbox;
                var cont = 0; 
 
                for (var x=0; x < checkboxes.length; x++) {
                 if (checkboxes[x].checked) {

                    //tipoCerca += $("input:checkbox[id="+(x+1)+"]").val()+'-';
                    tipoCerca+=x+'-';
                    validar = 1;
                 
                 }
                }

                document.getElementById('selecCerca').value = validar;
                document.getElementById('tiposCerca').value =tipoCerca;

            }

            var result = cedula.split('-');



            if(result[1]=='Ver' || result[1]=='Mod' || result[1]=='Reg'){

            $.post('../business/fincaAction.php', {verificarfinca:result[0]}, function(data){
                //POSEE UNA FINCA

                if(data  == 1){

                    if(result[1]=='Ver'){

                        $.post('../business/fincaAction.php', {cedulafinca:result[0]}, function(data){
                            var array = JSON.parse(data);
                            document.getElementById('registrarFinca').style="display:none";
                            
                            document.getElementById("actualizar").style="display:none";
                            document.getElementById("finalizar").style='display:none';
                            document.getElementById('cajaFinca').style='display:block';


                            document.getElementById('registrarFinca').style="display:none ";
                            document.getElementById('finalizar').style='display:none';
                            document.getElementById('frm').reset(); 

                            document.getElementById('datosDireccion').style='display:none';


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
                            document.getElementById('pueb').value = array['fincapueblo'];

                            document.getElementById("dir").value = array['fincaexacta'];
                            
                            
                        });


                    }else{
                        if(result[1]=='Mod'){

                          
                            $.post('../business/fincaAction.php', {fincamodificar:result[0]}, function(data){

                                document.getElementById("Socio").innerHTML = '----------------'+result[0]+'----------------';
                               

                                
                                document.getElementById("cedula").value = result[0];

                                var array = JSON.parse(data);

                                document.getElementById("actualizar").style="display:block";
                                document.getElementById("finalizar").style='display:none';
                                document.getElementById('registrarFinca').style="display:block";

                                document.getElementById('cajaFinca').style='display:none';

                                document.getElementById('verUbic').style = 'display:block';

                               

                                document.getElementById("cedula").value = result[0];
                                document.getElementById("fincaarea").value = array['fincaarea'];
                                document.getElementById("cantidadbobinos").value = array['fincacantidadbobinos'];


                            ////Datos de direccion///
                            //document.getElementById('prov').value = getProvincia(array['fincaprovincia']);
                            //document.getElementById('can').value = getCanton(array['fincaprovincia'],array['fincacanton']);
                            //document.getElementById('dis').value = getDistrito(array['fincaprovincia'],array['fincacanton'],array['fincadistrito']);

                                var tipoactividadid = array['tipoactividadid'];
                                var fincatipoid = array['fincatipoid'];


                                $("input:radio").removeAttr("checked");

                                $('#'+tipoactividadid+'-actividad').attr('checked',true);

                                $('#'+fincatipoid+'-tipo').attr('checked',true);


                            document.getElementById('editoPro').value = array['fincaprovincia'];
                            document.getElementById('editoCan').value = array['fincacanton'];
                            document.getElementById('editoDis').value = array['fincadistrito'];
                            document.getElementById('editoPueblo').value = array['fincapueblo'];
                            document.getElementById("editoOtros").value = array['fincaexacta'];


                            document.getElementById('provF').value = getProvincia(array['fincaprovincia']);
                            document.getElementById('canF').value = getCanton(array['fincaprovincia'],array['fincacanton']);
                            document.getElementById('disF').value = getDistrito(array['fincaprovincia'],array['fincacanton'],array['fincadistrito']);
                            document.getElementById('puebF').value = array['fincapueblo'];

                            document.getElementById("dirF").value = array['fincaexacta'];

                           // document.getElementById('editarUbic').style='display:none';

                            
                        });

                }else{
                    if(result[1]=='Reg'){

                         $.post('../business/fincaAction.php', {verificarfinca:result[0]}, function(data){

                            if(data  == 1){
                                alert("Posee Datos, unicamente se puede modificar la finca");

                                document.getElementById('cajaFinca').style='display:none'
                                document.getElementById('actualizar').style = 'display:none';
                                document.getElementById('registrarFinca').style="display:none ";
                                document.getElementById('finalizar').style='display:none';
                                document.getElementById('frm').reset(); 

                                //document.getElementById('datosDireccion').style='display:block';
                            }else{
                                alert('No tiene Ninguna FInca');



                                document.getElementById('cajaFinca').style='display:none';

                                document.getElementById('actualizar').style = 'display:none';

                                document.getElementById('registrarFinca').style="display:block ";

                                document.getElementById('finalizar').style='display:block';

                                document.getElementById('frm').reset(); 

                                document.getElementById('datosDireccion').style='display:block';

                                document.getElementById('verUbic').style='display:none';
                                document.getElementById("cedula").value = result[0];

                                document.getElementById('editarUbic').style = 'display:none';
                            }


                        });

                       

                    }
                }

            }           
                    }else{
                        alert('No tiene Ninguna FInca uuuuuu');

                        if(result[1]=='Reg'){

                             $.post('../business/fincaAction.php', {verificarfinca:result[0]}, function(data){

                        

                                document.getElementById('cajaFinca').style='display:none'
                                document.getElementById('actualizar').style = 'display:none';
                                document.getElementById('verUbic').style='display:none';
                                //document.getElementById('editarUbic').style='display:none';





                                document.getElementById('datosDireccion').style = 'display:block';
                                document.getElementById('registrarFinca').style="display:block ";
                                document.getElementById('finalizar').style='display:block';
                                document.getElementById('frm').reset(); 

                                
                                
                                document.getElementById("cedula").value = result[0];
                            


                        });


                            
                        }else{


                            document.getElementById('verUbic').style='display:none';
                            document.getElementById('cajaFinca').style='display:none';
                            document.getElementById('actualizar').style = 'display:none';
                            document.getElementById('registrarFinca').style="display:none ";
                            document.getElementById('finalizar').style='display:none';
                            document.getElementById('frm').reset(); 
   

                        }

                    }
            });



    
    	}
    
    }});

    
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


function ocultarCajasDireccion(){
    


    alert('Estoy en method');


}