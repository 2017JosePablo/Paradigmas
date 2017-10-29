
<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Socios</title>

    <link rel="stylesheet" type="text/css" href="../css/diseno.css">


    <!--MAscaras-->
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>


    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>





        <script type="text/javascript">
            jQuery(function($){
                $("#sociocedula").mask("9-9999999");
                $("#sociotelmovil").mask("9999 99 99");
            });
        </script>

        <script type="text/javascript">

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
                            var html = "<select class='form-control' id='listadoDistritos' name = 'listadoDistritos'  >";

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
            function mostrarFormularioSocio(){
      					document.getElementById("cajaFormulario").style.display='block';

                document.getElementById('cajaVerSocio').style.display ='none';

                document.getElementById('editarUbic').style.display='block';


                document.getElementById("btnModificar").style.display='none';
                document.getElementById("btnAgregar").style.display='block';
                document.getElementById("frm").reset();
               // $("input:radio").removeAttr("checked");
                $('#1-actividad').attr('checked',true);
                $('#1-tipo').attr('checked',true);
                $('#1-estado').attr('checked',true);

            }

            function mostrarUbicacion(){
                document.getElementById('editarUbic').style.display='block';
                document.getElementById('verDir').style.display='none';
                document.getElementById('selecModUbi').value = 0;

                document.getElementById('cajaVerSocio').style.display='none';
            }


            function ocultarEspacios(id,id2){
                document.getElementById(id).style="display:none";
                document.getElementById(id2).style="display:none";
            }
            function verEspacios(id1,id2){
                document.getElementById(id1).style="display:block";
                document.getElementById(id2).style="display:block";
            }
        </script>


    <script type="text/javascript">
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
               $('#fecha').datepicker();
               $('#fechaCVO').datepicker();
               $('#fechaBruc').datepicker();
               $('#fechaTuber').datepicker();


           })
        }
     </script>

    <script type="text/javascript">
    function validarLetras(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        patron =/[A-Za-z\s]/;
        te = String.fromCharCode(tecla);
    return patron.test(te);
    }

    </script>



    </head>
    <body>

    <p id="notificacionSocio" style="color: red" ></p>



<?php
    if (isset($_GET['error'])) {
        if (isset($_GET['error']) =='userexits') {
            echo "<p style='color:red'><strong> El Socio a ingresar ya esta registrado! </strong></p>";
        }
    }

?>


<input type="hidden" id="provincia" name="socioprovincia" value="">
<input type="hidden" id="canton" name="sociocanton" value="">
<input type="hidden" id="distrito" name="sociodistrito" value="">
<div style="overflow-x:auto;">
	<h1>Area administrativa de Socios</h1>
	<h2>Informacion del socio</h2>
    <?php
    include '../business/socioBusiness.php';

    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();

    echo '<table border ="1"><tr class="cabeceraTabla"><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td align = "center" colspan="3">Acciones</td> </tr>';

    foreach ($socios as $current) {
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';

        echo "<td> <button type='button' id='modificar-submit' value='".$current->getCedula()."~Ver'>Ver</button></td>";
        echo "<td> <button type='button' id='modificar-submit' value='".$current->getCedula()."~Mod'>Modificar</button></td>";
        echo "<td> <button type='button' id='modificar-submit' value='".$current->getCedula()."~Desac'>Desactivar</button></td>";
        echo '</tr>';
    }
    echo '</table>';

    ?>
	</div>

    <!--  </form> -->

    <button type = "reset" onclick="mostrarFormularioSocio()"> Agregar Nuevo Socio</button>



    <div id="cajaFormulario"  style='display:none;'>

    <form id= "frm" method="post" action="../business/socioAction.php" enctype="multipart/form-data">

    <input type="hidden" id="cedulaVieja" name= "cedulaVieja" value="">
    <input type="hidden" id="selecModUbi" name="ModUbi" value="1">

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
                        <input type="text" class='letra' name="socionombre"  onkeypress="return validarLetras(event)" id="socionombre"  required>
                    </td>
                    <td>
                        <input type="text" name="socioprimerapellido" id="socioprimerapellido" onkeypress="return validarLetras(event)"  required>
                    </td>
                    <td>
                        <input type="text" name="sociosegundoapellido" id="sociosegundoapellido" onkeypress="return validarLetras(event)" required>
                    </td>

                    <td>
                        <input type="text" name="sociotelmovil" id="sociotelmovil" required="">
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
                      <input type="date"  required ="" name="fecha" id="fecha"></td>
                    </td>
                </tr>

                 </table>




                <div id="verDir" style="display: none;">

                    <table>
                        <tr><td><br><p>Dirección del Socio</p></td></tr>

                         <td>
                        Provincia : <input  type="text"  id = 'provE' name="provE" readonly >

                        </td>

                        <td>
                            Canton : <input  type="text"  id = 'canE' name="canE" readonly >

                        </td>

                        <td>
                            Distrito : <input  type="text"  id = 'disE' name="disE"  readonly >
                        </td>

                         <td>
                            Pueblo :<input  type="text"  id = 'puebE' name="pueE" readonly >
                        </td>
                        <td>
                            <button type="button" onclick="mostrarUbicacion()">Editar ubicacion</button>
                        </td>

                    </table>

                </div>

                <div id="editarUbic" style='display:none;'>

                    <table>
                     <tr><td><br><p>Dirección del Socio</p></td></tr>
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
                         <td>Pueblo:<input type="text" id="sociopueblo" name="sociopueblo" onkeypress="return validarLetras(event)"> </td>

                        </tr>
                    </table>
                </div>

            <br>
            <p>Tipo de Actividad</p>
<div style="overflow-x:auto;">
            <?php

             require_once '../business/actividadBusiness.php';
                    $actividadBusiness = new actividadBusiness();
                    $actividades = $actividadBusiness->obtenerTodosTBActividad();
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
</div>
<div style="overflow-x:auto;">
             <br><br>
             Estado del Socio:
             <?php
                $estados = $socioBusiness->obtenerSocioEstado();

                    echo '<table>';
                        foreach ($estados as $curren) {
                            echo '<tr>';


                            echo "<td> <input id='".$curren->getSocioEstadoId()."-estado'type='radio' name='socioestado' value='".$curren->getSocioEstadoId()."'></td>";

                            echo '<td>'.$curren->getSocioEstadoDetalle().'</td>';


                            echo '</tr>';
                        }
                    echo '</table>';
            ?>
</div>



            <p>Fierro</p>
            <input type='radio' name='radioFierro' onclick="verEspacios('cajaFierro','w')" checked='' value='1'> Si<br>
            <input type="radio" name="radioFierro" onclick="ocultarEspacios('cajaFierro','w')" value="2">No

            <br>
            <div id="cajaFierro">

            <label for="">Subir foto del Fierro</label>
            <input type="file" value="Seleccionar Fierro" name="imagen" id="imagen">
            </div>
            <input type="hidden" name="" id="w">

            <br>
							<p>Recomendacion 1</p>
							<?php
							echo '<select name ="recomendacion1">';
			        foreach ($socios as $current) {
			            echo '<option value= "'.$current->getNombre().' '.$current->getPrimerApellido() .' ' .$current->getSegundoApellido().'">'.$current->getNombre().' '.$current->getPrimerApellido() .' ' .$current->getSegundoApellido().' </option>';
			        }
			        echo '</select>';
			        ?>

							<br>
							<p>Recomendacion 2</p>
							<?php
							echo '<select name = "recomendacion2">';
			        foreach ($socios as $current) {
			            echo '<option value= "'.$current->getNombre().' '.$current->getPrimerApellido() .' ' .$current->getSegundoApellido().'">'.$current->getNombre().' '.$current->getPrimerApellido() .' ' .$current->getSegundoApellido().' </option>';
			        }
			        echo '</select>';
			        ?>

            <br><br>

            <div id="btnAgregar">
                <button type="submit" name="agregarsocio" id="agregarsocio"/>Guardar Datos</button>
								<a href="socioView.php"><input type="button" value="Cancelar" ></a>
            </div>
             <div id="btnModificar">
                <button type="submit" name="modificarsocio" id="agregarsocio"/>Actualizar Datos</button>
								<a href="socioView.php"><input type="button" value="Cancelar" ></a>
            </div>



    </form>

    </div>

    <!--- <div id="cajaVerSocio" >-->
		<div id="cajaVerSocio" style='display:none;' >

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


                    <td>
                        Telefono Movil
                    </td>

                    <td>
                        Correo
                    </td>
                </tr>


                <tr>
                    <td>
                        <input type="text"  id="cedula" readonly>
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

                    <td>
                        <input  type="text" id="telmovil" readonly>
                    </td>
                    <td>
                        <input  type="text"  id = 'correo' readonly >
                    </td>

                </tr>



                 <tr>
                    <td>
                        <br> Fecha Ingreso:
                    </td>
                </tr>
                <tr>
                    <td>
                        <input  type="text"  id = 'fechaS' readonly >
                    </td>
                </tr>

                <tr><td><br><p>Datos de Dirección</p></td></tr>
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

                    <td>
                        Pueblo :<input  type="text"  id = 'pueb' readonly >
                    </td>

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
            <tr>
                <td>
                    Estado Socio : <input  type="text"  id = 'esta' readonly >
                </td>
            </tr>
        </table>

    </div>

		<hr>
    <a href="../index.php">Regresar</a>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarSocio.js"></script>
</body>
</html>
