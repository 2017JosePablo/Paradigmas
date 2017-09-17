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
             // alert(document.getElementById('socioFinca').value);
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

<input type="hidden" id="provincia" name="fincarovincia" value="">
<input type="hidden" id="canton" name="fincacanton" value="">
<input type="hidden" id="distrito" name="fincadistrito" value="">


   <?php

       include '../business/fincaBusiness.php';
      $fincaBusiness = new fincaBusiness();

      $fincas = $fincaBusiness->  obtenerTodosTBfinca();
        echo "<table border ='1'><tr><td align = 'center' colspan = '6'>Informacion Finca Socio</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td align = 'center' colspan = '3'>Acciones </td>
        </tr>";

        foreach ($fincas as $current) {


            //echo "<td>".$fincas["socionombre"]."  </td>";

          echo "<tr>";
          echo "<td>".$current->getNombre()."</td>";
          echo "<td>".$current->getPrimerApellido()."</td>";
          echo "<td>".$current->getSegundoApellido()."</td>";
          echo "<td> <button type='submit' id='modificarFinca' value='".$current->getCedula()."-Ver'>Ver</button></td>";
          echo "<td> <button type='submit' id='modificarFinca' value='".$current->getCedula()."-Mod'>Modificar</button></td>";
          echo "<td> <button type='submit' id='modificarFinca' value='".$current->getCedula()."-Reg'>Registrar</button></td>";
          echo "<tr>";


          }

          echo "</table>";

    ?>

<div  id="registrarFinca" style='display:none ;' >

  <form id = 'frm' method="post"  action="../business/fincaAction.php">

  <input type="hidden" name="cedula" id="cedula" value="">

  <p id='Socio' ></p>


    <p>Datos de la finca:</p>
            <table>
                <tr>
                    <td>
                        Area de la Finca
                    </td>


                    <td>
                        Cantidad de Bobinos
                    </td>



                </tr>
                <tr>

                    <td>
                        <input type="text" name="fincaarea" id="fincaarea"  required>
                    </td>
                    <td>
                        <input type="text" name="cantidadbobinos" id="cantidadbobinos"  required>
                    </td>





                    </tr>

            </table>

                <div id="datosDireccion">

                <table>

                    <tr><td><br><p>Dirección Finca</p></td></tr>
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
                      <td>Pueblo:<input type="text" id="fincapueblo"  name="fincapueblo"> </td>
                      <td>Otras Señas:<input type="text" id="fincaexacta"  name="fincaexacta"> </td>

                  </tr>
                </table>
              </div>




            <br> <br> <br>

             <?php

             include '../business/actividadBusiness.php';
                    $actividadBusiness = new actividadBusiness();
                    $actividades = $actividadBusiness->obtenerTodosTBActividad();
                    echo "Tipo Actividad";
                    echo "</br>";
                     echo '<table>';
                    foreach ($actividades as $current) {
                        echo '<tr>';
                        if($current->getId()==1){
                             echo "<td> <input id ='".$current->getId()."-actividad' type='radio' name='tipoactividad' checked='' value='".$current->getId()."'> ".$current->getNombreActividad()."<br> </td>";
                        }else{
                              echo "<td> <input id ='".$current->getId()."-actividad' type='radio' name='tipoactividad'  value='".$current->getId()."'> ".$current->getNombreActividad()."<br> </td>";
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

                            echo "<td> <input id='".$curren->getId()."-tipo' type='radio' name='tipofinca' value='".$curren->getId()."'</td>";

                            echo '<td>'.$curren->getFincaTipoActividad().'</td>';


                            echo '</tr>';
                        }
                        echo '</table>';



                ?>
      </div>






            <div id="btnFinalizar">
              <input type="submit" value="Registrar finca" name="finalizar" hidden="" id="finalizar"/><p>
            </div>

            <div id="btnModificar">
              <input type="submit" value="Modificar finca" name="actualizar" hidden="" id="actualizar"/><p>
            </div>

    </form>

    <div id="cajaFinca" style='display:none ;'>



        <p>Datos personales:</p>

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

                </tr>


                <tr>
                    <td>
                        <input type="text"  id="ced" readonly>
                    </td>
                    <td>
                        <input  type="text"  id="nombre"  readonly>
                    </td>
                    <td>
                        <input  type="text"  id="primerapellido"  readonly>
                    </td>
                    <td>
                        <input  type="text" id="segundoapellido"  readonly>
                    </td>


                </tr>
                </table>

                 <table>
                <tr>
                    <td>
                        Area de la Finca
                    </td>


                    <td>
                        Cantidad de Bobinos
                    </td>



                </tr>
                <tr>

                    <td>
                        <input type="text" name="fincaarea" id="area" readonly="" >
                    </td>
                    <td>
                        <input type="text" name="cantidadbobinos" id="bobinos" readonly="" >
                    </td>

                    </tr>

                                <tr><td><br><p>Dirección de la Finca</p></td></tr>
                <tr>
                    <td>
                        Provincia : <input  type="text"  id = 'prov' readonly >

                    </td>

                    <td>
                        Canton : <input  type="text"  id = 'can' readonly >

                    </td>

                    <td>
                        Distrito : <input  type="text"  id = 'dis' readonly >
                    </td>

                 <td>Pueblo :<input  type="text"  id = 'pueb' readonly >

                 <td>Otros señas :<input  type="text"  id = 'dir' readonly >

            </tr>

            <tr>
                <td>
                    Tipo de Actividad : <input  type="text"  id = 'tipoActi' readonly >
                </td>

            </tr>
            <tr>
                <td>
                    Tipo Finca : <input  type="text"  id = 'tipoFinc' readonly >
                </td>
            </tr>
            </table>


    </div>
     <a href="../index.php">Regresar</a>


    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarFinca.js"></script>

</body>
</html>
