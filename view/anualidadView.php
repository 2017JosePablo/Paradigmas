<?php
//	include_once dirname(__FILE__).'/business/anualidadBusiness.php';
//	$path = "/business/anualidadBusiness.php";
//	echo "Path : $path";
//	require "$path";

	include_once '../business/anualidadBusiness.php';
	$anualidad  = new AnualidadBusiness();
	echo $anualidad->actualizarEstado("2017/10/22");

	//echo "<script>alert('esperando metodo');</script>";



 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anualidad</title>

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
          </script>

  </head>
  <body>
    <?php
    require '../business/socioBusiness.php';
    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();
    echo '<table border ="1"><tr><td align = "center" colspan = "7">Area administrativa de Anualidad</td></tr><tr><td align = "left" colspan = "7">Informacion de Socios</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td align = "center" colspan="3">Acciones</td> </tr>';
    foreach ($socios as $current) {
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
        echo "<td> <button type='button' id='seleccion_socio' value='".$current->getCedula()."'>Seleccionar Socio</button></td>";
        echo '</tr>';
    }
    echo '<tr><td colspan = "7" > Colaboradores</td></tr>';

    ?>

    <br><br>

    <button type="button" name="agregarAnualidad" onclick="agregarNuevaAnualidad()">Agregar Nueva Anualidad</button>

    <div class="" id = "agregarAnualidad" style="display:none">

      <form class="" action="../business/anualidadAction.php" method="post" onsubmit="return verificarSocio()">
      <?php
      require '../business/socioBusiness.php';
      $socioBusiness = new socioBusiness();
      $socios = $socioBusiness->obtenerTodosTBSocio();
      echo '<table border ="1"><tr><td align = "center" colspan = "7">Area administrativa de Anualidad</td></tr><tr><td align = "left" colspan = "7">Informacion de Socios</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td align = "center" colspan="3">Acciones</td> </tr>';
      foreach ($socios as $current) {
          echo '<tr>';
          echo '<td> '.$current->getNombre().'</td>';
          echo '<td> '.$current->getPrimerApellido() .' </td>';
          echo '<td> '.$current->getSegundoApellido().' </td>';
          echo "<td> <button type='button' id='seleccion_socio' value='".$current->getCedula()."'>Seleccionar Socio</button></td>";
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
          echo "<td> <button type='button' id='seleccion_colaborador' value='".$current->getCedulaColaborador()."'>Seleccionar Colaborador</button></td>";
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

      </form>

    </div>

    <a href="../index.php">Regresar</a>
  </body>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/anualidadJs.js"></script>

</html>
