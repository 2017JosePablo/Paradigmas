<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Fincas</title>
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
                             $('#listaDistrmodificarito').html(html);        
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

            function agregarNuevaFinca(){
            
              document.getElementById('registrarFinca').style="display:block ";

            }

            function getSocio(){

            }
        </script>

   
</head>
<body>

<input type="hidden" id="provincia" name="fincarovincia" value="">
<input type="hidden" id="canton" name="fincacanton" value="">
<input type="hidden" id="distrito" name="fincadistrito" value="">


   <?php
 
       include '../business/fincaBusiness.php';
      $fincaBusiness = new fincaBusiness();

      $fincas = $fincaBusiness->  obtenerTodosTBfinca();
        echo "<table border ='1'><tr><tr><td align = 'center' colspan = '9'>Informacion Finca Socio</td></tr><td>Cedula </td><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td>Tamano de Finca</td> <td>Cantidad de bobinos </td> <td>Tipo de Finca </td> <td>Tipo de Actividad</td><td>Acciones</td></tr>";

        foreach ($fincas as $current) {     

            //echo "<td>".$fincas["socionombre"]."  </td>";

          echo "<tr>";
          echo "<td>".$current->getCedula()."  </td>";
          echo "<td>".$current->getNombre()."</td>";
          echo "<td>".$current->getPrimerApellido()."</td>";
          echo "<td>".$current->getSegundoApellido()."</td>";
          echo "<td>".$current->getArea()."  </td>";
          echo "<td>".$current->getCantidadBovinos()."  </td>";
          echo "<td>".$current->getFincaTipo()."  </td>";
          echo "<td>".$current->getTipoActividad()."  </td>";
          echo "<td> <button type='submit' id='modificarFinca' value='".$current->getCedula()."'>Modificar</button></td>";
          echo "<tr>";
          

          }

          echo "</table>";

    ?>


<input  type="submit"onclick="agregarNuevaFinca()" value="Agregar una nueva finca ">


<div  id="registrarFinca" style='display:none ;' >

  <form method="post" onsubmit="return validar()" action="../business/fincaAction.php">      
</br>
    <?php
 
       include '../business/socioBusiness.php';
      $socioBusiness = new socioBusiness();

      $socios = $socioBusiness->  obtenerTodosTBSocio();
       echo '<select name = "socioFinca"> ';
      foreach ($socios as $current) {     
        echo "<option  value = '".$current->getCedula()."'>";
        echo   $current->getCedula() .' -- '. $current->getNombre() .' '.$current->getPrimerApellido() .' '.$current->getSegundoApellido();
        echo "</option>";
          }
      echo '</select>';
    ?>
    <p>Datos de la finca:</p>
            <table>
                <tr>
                    <td>
                        Area de la Finca
                    </td>


                    <td>
                        Cantidad de Bobinos
                    </td>

                   
                    <td>Tipo de Cerca</td>

                </tr>
                <tr>

                    <td>
                        <input type="text" name="fincaarea" id="fincaarea"  required>
                    </td>
                    <td>
                        <input type="text" name="cantidadbobinos" id="cantidadbobinos"  required>
                    </td>
                   

                    <td>
                        <select id="ficatipocerca" name="ficatipocerca" class="form-control" onclick="provinciaSeleccionada()">
                          <option value="-1">Seleccione un tipo cerca</option>
                          <option value="1">Puas</option>
                          <option value="2">Electrica</option>
                          <option value="3">Mixta</option>
            
                        </select>
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
                <td>Pueblo:<input type="text" id="fincapueblo" required="" name="fincapueblo"> </td>
                <td>Otras Señas:<input type="text" id="fincaexacta" required="" name="fincaexacta"> </td>

            </tr>

            </table>
            <br> <br> <br>
        <input type="submit" value="Registrar finca" name="finalizar" id="finalizar"/><p>
    </form>

</div>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarFinca.js"></script>
 
</body>
</html>
