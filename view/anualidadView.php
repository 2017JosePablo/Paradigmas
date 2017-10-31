<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {

  include_once '../business/registroAnualidadBusiness.php';
  $anualidad  = new RegistroAnualidadBusiness();
  $fecha = gmdate('Y-m-d', time());
  $anualidad->calcularMorosos($fecha);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anualidad</title>
    <link rel="stylesheet" href="../css/diseno.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



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
                    $('#fechaAnualidad').datepicker();
                })
             }
          </script>

          <script type="text/javascript">
              function verificarSocio() {
                var cedulaResponsableAnualidad = document.getElementById('cedulaResponsableAnualidad').value;

                if (cedulaResponsableAnualidad.length == 0) {
                  alert("Debes seleccionar un responsable.");
                    return false;
                }else if (document.getElementById('fechaAnualidad').value.length == 0) {
                  alert("Debes seleccionar una fecha valida.");
                    return false;
                }else if (document.getElementById('montoAnualidad').value.length == 0) {
                  alert("Debes ingresar un monto valido.");
                    return false;
                }else {
                    return true;
                  }

                }

            function agregarNuevaAnualidad() {
                document.getElementById("agregarAnualidad").style="display:block;";
            }
            function cancelar() {
              location.href ="anualidadView.php";
            }
          </script>

  </head>
  <body>

    <div style="overflow-x:auto;">
      <h1>Gestíon de Anualidad</h1>
      <h2>Informacion de Socios </h2>

    <?php
    include_once '../business/anualidadBusiness.php';
    $anualidad  = new AnualidadBusiness();

    $listaanualidad = $anualidad->obtenerTodosTBAnualidad();

    echo '<table ><tr class="cabeceraTabla"><td>Responsable</td><td>Monto</td><td>Fecha de Creacion</td><td>Acciones</td> </tr>';
    foreach ($listaanualidad as $current) {
        echo '<tr>';
        echo '<td> '.$current->getResponsableId().'</td>';
        echo '<td> '.$current->getMonto() .' </td>';
        echo '<td> '.$current->getFechaActualizacion().' </td>';
        echo "<td> <button type='button' id='editar~anualidad' value='editar~".$current->getIdMontoAnualidad()."'>Editar</button></td>";
        echo '</tr>';
    }
    echo '</table>';

    ?>
  </div>
    <br><br>


<hr>
    <div class="" id = "agregarAnualidad" style="display:none">

      <form class="" action="../business/anualidadAction.php" method="post" onsubmit="return verificarSocio()">
        <h1>Area administrativa de Anualidad</h1>
        <h2>Informacion de Socios</h2>
      <?php
      require '../business/socioBusiness.php';
      $socioBusiness = new socioBusiness();
      $socios = $socioBusiness->obtenerTodosTBSocio();
      echo '<table ><tr class="cabeceraTabla"><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td>Acciones</td> </tr>';
      foreach ($socios as $current) {
          echo '<tr>';
          echo '<td> '.$current->getNombre().'</td>';
          echo '<td> '.$current->getPrimerApellido() .' </td>';
          echo '<td> '.$current->getSegundoApellido().' </td>';
          echo "<td> <button type='button' id='seleccion_socio' value='seleccionar~".$current->getCedula()."'>Seleccionar Socio</button></td>";
          echo '</tr>';
      }
      echo '<tr><td colspan = "7" > Colaboradores</td></tr>';
      require_once '../business/juntaBusiness.php';
      $colaboradorBusiness = new juntaBusiness();
      $colaborador = $colaboradorBusiness->obtenerTodosTBColaborador();


      foreach ($colaborador as $current) {
          echo '<tr>';
          echo '<td> '.$current->getNombreColaborador().'</td>';
          echo '<td> '.$current->getPrimerApellidoColaborador() .' </td>';
          echo '<td> '.$current->getSegundoApellidoColaborador().' </td>';
          echo "<td> <button type='button' id='seleccionar~' value='seleccionar~".$current->getCedulaColaborador()."'>Seleccionar Colaborador</button></td>";
          echo '</tr>';
      }
      echo '</table>';

      ?>

      <br><br>Cedula del Responsable<br>
      <input type="text" id="cedulaResponsableAnualidad" name="cedulaResponsableAnualidad" placeholder="Seleccione un responsable" readonly>

      <br><br>Fecha de creacion<br>
      <input type="date" id="fechaAnualidad" name="fechaAnualidad">

      <br><br>Monto a Cancelar<br>
      <input type="text" id="montoAnualidad" name="montoAnualidad" onkeypress="return soloNumeros(event)" placeholder="0">
      <br><br>

      <input type="submit" id="registrarAnualidad" name="registrarAnualidad" value="Guardar Datos">
      <button type="button" name="agregarAnualidad" onclick="cancelar()">Cancelar</button>
      </form>

      <hr>
    </div>
    <button type="button" name="agregarAnualidad" onclick="agregarNuevaAnualidad()">Agregar Nueva Anualidad</button>
    <a href="../index.php">Regresar</a>

  </body>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/anualidadJs.js"></script>

</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
