<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Primer pago de Anualidad</title>
<link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/diseno.css">
  </head>


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

    <p><h1>Gestíon de  pago por primera vez de  Anualidad </h1></p>

    <div id="cuerpo">

    <form class="" action="../business/registroAnualidadAction.php" method="post">

        <span> Seleccione el Socio a realizar el pago.</span>
          <?php

          include '../business/socioBusiness.php';
          $socioBusiness = new socioBusiness();
          $socios = $socioBusiness->obtenerTodosTBSocio();

          echo '<select name= "socioAnualidad" id= "socioAnualidad">';
                echo '<option value = "-1"> Seleccione un socio </option>';
          foreach ($socios as $current) {
              echo '<option value = "'.$current->getSocioId().'"> '.$current->getNombre().' '.$current->getPrimerApellido() .' '.$current->getSegundoApellido().'</option>';
          }
          echo '</select>';

          ?>
          <input type="text" name="socioId" id="socioId" style="display:none">

          <br>
          <br>
          <?php

          ?>


          <span> Seleccione la fecha que se realiza el pago.</span>
          <input type="date" name="fechaPago" id="fechaPago" placeholder="<?php echo date("m/d/Y") ?>">
          <br>
          <br>
          <hr>
       <input name="primerAnualidad" value="Guardar Datos" type="submit">
       <a href="pagoPrimeroAnualidadView.php"><input type="button" value="Cancelar" ></a>


    <a href="../"><input type="button" value="Regresar" ></a>

    </form>

  </div>


  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/mostrarPrimerAnualidad.js"></script>
  <?php
    include_once "../../footer.php";
   ?>
  </body>
</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
