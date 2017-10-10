<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Renovar Anualidad</title>
  </head>
  <script type="text/javascript" src="../js/mostrarAnualidad.js"></script>
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
             $('#fechaPago').datepicker();
        })
      }
   </script>

  <body>

    <p>Area administrativa de  Renovacion de Socio</p>

    <form class="" action="../business/registroAnualidadAction.php" method="post">

        <span> Seleccione el Socio a realizar el pago.</span>
          <?php

          include '../business/socioBusiness.php';
          $socioBusiness = new socioBusiness();
          $socios = $socioBusiness->obtenerTodosTBSocio();

          echo '<select>';
          foreach ($socios as $current) {
              echo '<option value = "'.$current->getSocioId().'"> '.$current->getNombre().' '.$current->getPrimerApellido() .' '.$current->getSegundoApellido().'</option>';
          }
          echo '</select>';
          ?>
          <br>
          <br>
          <?php
/*
          include '../business/registroAnualidadBusiness.php';
            $socioAnualidad = new registroAnualidadBusiness();
            $socios = $socioAnualidad->obtenerFechaAnterior();

              echo '<select>';
                foreach ($socios as $current) {

          }*/
          ?>


          <span> Seleccione la fecha que se realiza el pago.</span>
          <input type="date" name="fechaPago" id="fechaPago">
          <br>
          <br>
       <input name="renovarAnualidad" value="Registrar Anualidad" type="submit">
    </form>


  </body>
</html>
