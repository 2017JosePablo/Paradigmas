<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Area Administrativa de Fincas</title>
  <link rel="stylesheet" href="../../css/style.css">
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
               var todo_correcto = false;


             // alert(document.getElementById('socioFinca').value);

              if(document.getElementById('selecCerca').value == 0){
                alert('Debe selecionar al menos un tipo de cerca');
                todo_correcto = false;
              }

              if( document.getElementById('selecModUbi').value == 0){
                if(document.getElementById("listaProvincias").value <0){
                alert('Seleccione una Provincia');
                  todo_correcto = false;
                }


                if(document.getElementById('fincapueblo').value<=0){
                  alert('Ingrese un pueblo');
                  todo_correcto = false;
                }

                if(document.getElementById('fincaexacta').value<=0){
                  alert('Ingrese una direccion Exacta');
                  todo_correcto = false;
                }


              }



            return todo_correcto;

            }

            function ocultarCajaDireccion(){
              document.getElementById('verUbic').style='display:none';
             // document.getElementById('editarUbic').style="display:none";
              document.getElementById('datosDireccion').style='display:none';
              document.getElementById('editoUbicacion').value = 1;

            }

            function soloNumeros(e){
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8){
                  return true;
              }
              patron =/[0-9]/;
              tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
}


        </script>

        <script type="text/javascript">
          var datefield=document.createElement("input")
          datefield.setAttribute("type", "date")
          if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
             document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
          }
         </script>

         <script>
            if(datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
               jQuery(function($){ //on document.ready
                   $('#fechaCVO').datepicker();
               })
            }
         </script>



</head>
<body>

<div id="cuerpo">

  <form id='frm'  method="post"  action="../business/fincaAction.php">
<input type="hidden" id="provincia" name="fincarovincia" value="">
<input type="hidden" id="canton" name="fincacanton" value="">
<input type="hidden" id="distrito" name="fincadistrito" value="">

  <h1>Gestíon de Finca</h1>
  <h2>Informacion Socio</h2>
   <?php

       require_once '../business/fincaBusiness.php';
      $fincaBusiness = new fincaBusiness();

      $fincas = $fincaBusiness->  obtenerTodosTBfinca();
        echo "<table ><tr class='cabeceraTabla'><td>Nombre</td>  <td>Primer Apellido</td><td>Segundo Apellido</td> <td align = 'center' colspan = '3'>Acciones </td> </tr>";

        foreach ($fincas as $current) {
          echo "<tr>";
          echo "<td>".$current->getNombre()."</td>";
          echo "<td>".$current->getPrimerApellido()."</td>";
          echo "<td>".$current->getSegundoApellido()."</td>";
          echo "<td> <button type='button' id='modificarFinca' value='".$current->getCedula()."~Ver'>Ver</button></td>";
          echo "<td> <button type='button' id='modificarFinca' value='".$current->getCedula()."~Mod'>Modificar</button></td>";
          echo "<td> <button type='button' id='modificarFinca' value='".$current->getCedula()."~Reg'>Registrar</button></td>";
          echo "</tr>";
          }
          echo "</table>";
    ?>

<div  id="registrarFinca" style='display:none;'>

  <input type="hidden" name="cedula" id="cedula" value="">

  <input type="hidden" name="selecModUbi" id="selecModUbi" value="1">
  <input type="hidden" id="tiposCerca" name="tiposCerca" value="">
  <input type="hidden" id="selecCerca"  value="">

   <input type="hidden"  name= "editoUbicacion" id="editoUbicacion" value="1">

   <input type="hidden"  name= "editoPro" id="editoPro" value="">
   <input type="hidden"  name= "editoCan" id="editoCan" value="">
   <input type="hidden"  name= "editoDis" id="editoDis" value="">
   <input type="hidden"  name= "editoPueblo" id="editoPueblo" value="">
   <input type="hidden"  name= "editoOtros" id="editoOtros" value="">

  <p id='Socio' ></p>
    <p>Datos de la finca:</p>
            <table>
                <tr>
                    <td>
                        Area de la Finca<h3 class="informacionUsuario">Si tiene más de una finca, debe totalizar y registrar un dato unificado.</h3>
                    </td>


                    <td>
                        Cantidad de Bobinos
                    </td>



                </tr>
                <tr>

                    <td>
                        <input type="text" name="fincaarea" id="fincaarea" onkeypress="return soloNumeros(event)" required>
                    </td>
                    <td>
                        <input type="text" name="cantidadbobinos" id="cantidadbobinos" onkeypress="return soloNumeros(event)"  required>
                    </td>
                </tr>

            </table>


                <div id="datosDireccion" style="display:none;">

                <table>

                    <tr><td><br><p>Dirección Finca</p></td></tr>
                      <tr>

                      <td>

                            <label class="col-md-4 control-label" for="listaProvincias">Provincia</label>

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
                      </td>
                      <td>
                          <!-- Select Canton -->

                            <label for="listadeCantones">Canton</label>
                            <div class="col-md-4" id="cajaCantones">

                            </div>
                      </td>
                      <td>
                          <!-- Select Distrito-->
                          <div id="cajaDistrito" >
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

                 <div id="verUbic" style="display: block">

                    <table>
                       <tr><td><br><p>Dirección de la Finca</p></td></tr>
                            <tr>
                                <td>
                                    Provincia : <input  type="text"  id = 'provF' name="provF" readonly >

                                </td>

                                <td>
                                    Canton : <input  type="text"  id = 'canF' name='canF' readonly >

                                </td>

                                <td>
                                    Distrito : <input  type="text"  id = 'disF' name="disF" readonly >
                                </td>

                             <td>Pueblo :<input  type="text"  id = 'puebF' name = "prubF" readonly >

                             <td>Otros señas :<input  type="text"  id = 'dirF' name= "dirF" readonly >

                             <td>
                               <button type="button" onclick="ocultarCajaDireccion()">Editar Ubicacion</button>
                             </td>

                        </tr>
                    </table>

            <p>Tipo de Finca</p>

                <?php
                include_once '../data/tipoFincaData.php';
                $temp = new tipoFincaData();
                $tipoFinca = $temp->getAllTBTiposFincas();
                  echo '<table>';
                  foreach ($tipoFinca as $curren) {
                      echo '<tr>';

                      echo "<td>".$curren->getFincaTipoActividad()."<input id='".$curren->getId()."-tipo' type='radio' checked name='tipofinca' value='".$curren->getId()."'></td>";
                      echo '</tr>';
                  }
                  echo '</table>';
          ?>

<p>CVO</p>

<input type='radio' name='radioCVO' id='radioCVOSI' onclick="verEspacios('fechaCVO','labelCVO')" checked='' value='1'> Si<br>
<input type="radio" name="radioCVO" id='radioCVONO'onclick="ocultarEspacios('fechaCVO','labelCVO')" value="2">No
<div id="cajaCVO">
  <p id="labelCVO"> Fecha de Aplicacion del Examen </p>
  <input type="date" name="fechaCVO" id="fechaCVO">
</div>
<br><br>


    <?php
    include '../business/fincaCercaBusiness.php';
    $fincaBusiness = new fincaCercaBusiness();
    $cont =1;

    $cerca = $fincaBusiness->getTipoCerca();
    echo '<table > <tr>  <td align = "center" >Tipo de cerca</td> </tr><tr></tr>';

    foreach ($cerca as $current) {
        echo '<tr>';
        echo '<td> <input  name ="checkbox" value="'.$current.'"type="checkbox" id="'.$cont.'" >'.$current.'</td>';

        echo '</tr>';

        $cont++;
    }
        echo '</table>';
  ?>

  <?php
  require_once '../business/pastoCorteBusiness.php';
  $pastoBussiness = new PastoCorteBusiness();

  $cerca = $pastoBussiness->mostrarPastosCorte();
//  echo "cerca: ".$cerca;

  echo '<table > <tr>  <td align = "center" >Tipo de pasto de corta</td> </tr><tr></tr>';

  foreach ($cerca as $current) {
      echo '<tr>';
      echo '<td> <input  name ="checkbox" value="'.$current->getId().'"type="checkbox" id="'.$cont.'" >'.$current->getNombre().'</td>';
      echo '</tr>';
  }
      echo '</table>';

  ?>

  <?php
  require_once '../business/pastoForrajeBusiness.php';
  $pastoBussiness = new PastoForrajeBusiness();
  $cerca = $pastoBussiness->mostrarPastosForraje();
  echo '<table > <tr>  <td align = "center" >Tipo de pasto de forraje</td> </tr><tr></tr>';

  foreach ($cerca as $current) {
      echo '<tr>';
      echo '<td> <input  name ="checkbox" value="'.$current->getId().'"type="checkbox" id="'.$cont.'" >'.$current->getNombre().'</td>';
      echo '</tr>';
  }
      echo '</table>';

  ?>




</div>



            <div id="btnFinalizar">
             <!-- <input type="button" value="Registrar finca" name="finalizar" hidden="" id="finalizar"/><p>-->

              <button type='submit'  id="finalizar" name='finalizar' value='registrar'>Registrar Finca</button>
            </div>

            <div id="btnModificar">
              <input type='submit'  id="actualizar" name='actualizar' value='Modificar Finca'>
            </div>
    </div>


    <div id="cajaFinca" style='display:none ;'>



        <p>Datos personales:</p>

             <table>
                <tr class='cabeceraTabla'>
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
                        Area de la Finca<h3 class="informacionUsuario"> (Has)</h3>
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

    <a href="../index.php"><input type="button" name="" value="Regresar"></a>



         </form>
  </div>



    <?php
      include_once "piePaginaView.php";
     ?>
</body>
</html>

<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="../js/editarFinca.js"></script>


<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
