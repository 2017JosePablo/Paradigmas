<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Socios</title>
	<link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>

            function provinciaSeleccionada(){
                var valor = document.getElementById("listaProvincias") .value ;
                if(valor != -1){
                    llenarCantones(valor);  
                    document.getElementById("provincia").value = valor;      
                }else{
                    var html = "<select class='form-control' id = 'listaProvincias' onclick='llenarCantones()'><option>Seleccione Una Provincia</option></select>";
                            $('#cajaProvincias').html(html);
                }
            
            }



             function llenarCantones(valor){
                var valor = document.getElementById("listaProvincias") .value ;
               if(valor >0){
                $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/cantones.json",
                        data: {},
                        success: function (data) {
                            var html = "<select class='form-control' id='listadoCantones' name = 'listadoCantones'  onclick=setDistrito() >";
                             for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            
                            html += "</select>";
                            $('#cajaCantones').html(html);
                        }
                    });
                
                }else{
                    var html = "<select class='form-control'  onclick=setDistrito()  ><option>Seleccione Un Canton</option></select>";
                            $('#cajaCantones').html(html);
                }
            }
            function setDistrito(){
                var valorCantones = document.getElementById("listadoCantones") .value ;
                document.getElementById("canton").value = valorCantones;
               var valor = document.getElementById("listaProvincias") .value ;
               if(valor >0){
                $.ajax({
                        dataType: "json",
                     
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/canton/"+valorCantones+"/distritos.json",

                        data: {},
                        success: function (data) {
                            var html = "<select class='form-control' id='listadoDistritos' name = 'listadoDistrito'  >";
                         
                            for(key in data) {

                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select>";
                            $('#listaDistrito').html(html);
                        }
                    });
                }else{
                    var html = "<select class='form-control'><option value = '0' >Seleccione Un Distrito</option></select>";
                             $('#listaDistrito').html(html);        
                }
           }

            function cargarValores(){
              document.getElementById("distrito").value =document.getElementById('listadoDistritos').options[document.getElementById('listadoDistritos').selectedIndex].value;
              document.getElementById("fech").value = document.getElementById("fecha").value;

            }

            function validar(){
                var todo_correcto = true;  
                if(document.getElementById("listaProvincias").value <0){
                     todo_correcto = false;
                }

                if (!todo_correcto) {
                    alert('Seleccione una Provincia'+document.getElementById("listaProvincias").value );    
                }
                    return todo_correcto;
                
            }
        </script>

   
</head>
<body>
<input type="hidden" id="provincia" name="socioprovincia" value="">
<input type="hidden" id="canton" name="sociocanton" value="">
<input type="hidden" id="distrito" name="sociodistrito" value="">

  
    <p>Datos personales:</p>

    <form method="post" onsubmit="return validar()" action="../business/socioAction.php">
            <table>
                <tr>
                    <td>
                    Cedula
                    </td>


                    <td>
                        Nombre
                    </td>

                    <td>
                        Primer Apellido
                    </td>

                    <td>
                        Segundo Apellido
                    </td>

                    <td>
                        Telefono Fijo
                    </td>


                    <td>
                        Telefono Movil
                    </td>

                    <td>
                        Correo
                    </td>
                </tr>
               

                <tr>
                    <td>
                        <input type="text" name="sociocedula" id="sociocedula"  required>
                    </td>
                    <td>
                        <input type="text" name="socionombre" id="socionombre"  required>
                    </td>
                    <td>
                        <input type="text" name="socioprimerapellido" id="socioprimerapellido"  required>
                    </td>       
                    <td>
                        <input type="text" name="sociosegundoapellido" id="sociosegundoapellido"  required>
                    </td>
                    
                    <td>
                        <input type="text" name="sociotelcasa" id="sociotelcasa">
                    </td>
                    
                    <td>
                        <input type="text" name="sociotelmovil" id="sociotelmovil">
                    </td>
                    <td>
                        <input type="email"  required="" name="sociocorreo" id="sociocorreo">
                    </td>
                   
                </tr>
                 <tr>
                    <td>
                        <br> Fecha Ingreso <br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="date"  required="" name="fecha"> <br> <br>
                    </td>
                </tr>

                <tr><td><br><p>Datos de Dirección</p></td></tr>
            <tr>
                <td>
                     <div class="form-group">
                      <label class="col-md-4 control-label" for="listaProvincias">Provincia</label>
                      <div class="col-md-4">
                        <select id="listaProvincias" name="listaProvincias" class="form-control" onclick="provinciaSeleccionada()">
                          <option value="-1">Seleccione Una Provincia</option>
                          <option value="1">San Jose</option>
                          <option value="2">Alajuela</option>
                          <option value="3">Cartago</option>
                          <option value="4">Heredia</option>
                          <option value="5">Guanacaste</option>
                          <option value="6">Puntarenas</option>
                          <option value="7">Limon</option>
                        </select>
                      </div>
                    </div>  
                </td>
                <td>    
                    <!-- Select Canton -->
                    <div class="form-group" >
                      <label class="col-md-4 control-label" for="listadeCantones">Canton</label>
                      <div class="col-md-4" id="cajaCantones">
                      </div>
                    </div>
                </td>
                <td>
                    <!-- Select Distrito-->
                    <div class="form-group" id="cajaDistrito" >
                      <label class="col-md-4 control-label" for="cajaDistrito">Distrito</label>
                      <div class="col-md-4" id="listaDistrito" >
                     
                      </div>
                    </div>
                 </td>
                 <td>Pueblo:<input type="text" id="sociopueblo" name="sociopueblo"> </td>

            </tr>
            </table>
            <br>
            <p>Tipo de Actividad</p>

            <?php
         
             include '../business/actividadBusiness.php';
                    $actividadBusiness = new actividadBusiness();
                    $actividades = $actividadBusiness->obtenerTodosTBActividad();
                     echo '<table>';
                    foreach ($actividades as $current) {     
                        echo '<tr>';
                        if($current->getId()==1){
                             echo '<td> <input type="radio" name="tipoactividad" checked="" value='.$current->getId().'> '.$current->getNombreActividad().'<br> </td>';
                        }else{
                             echo '<td> <input type="radio" name="tipoactividad" value='.$current->getId().'> '.$current->getNombreActividad().'<br></td>'; 
                        }            
                        echo '</tr>';
                    }
                        echo '</table>';

            ?>

            <br><br>
            <p>Tipo de Finca</p>

            <?php
         
         
            require '../data/tipoFincaData.php';
            $temp = new tipoFincaData();
            $tipoFinca = $temp->getAllTBTiposFincas();

     
                    echo '<table>';
                    foreach ($tipoFinca as $curren) {     
                        echo '<tr>';
                         echo '<td> <input type="radio" name="tipofinca" value='.$curren->getId().'</td>'; 

                        echo '<td>'.$curren->getFincaTipoActividad().'</td>'; 
                                  
                        echo '</tr>';
                    }
                        echo '</table>';

                        

            ?>
             <br><br>
             Estado Socio Detalle: <input type="text" name="sociodetalle" required="">
            <br><br>
        <input type="submit" value="Agrerar Socio" name="agregarsocio" id="agregarsocio"/><p>
    </form>
 

    <a href="../index.php">Regresar</a>
</body>
</html>
