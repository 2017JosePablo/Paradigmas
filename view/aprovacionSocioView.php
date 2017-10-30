<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Aprovacion de Socio</title>

    <link rel="stylesheet" href="../css/diseno.css">
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
               $('#fechaAprovacion').datepicker();
               $('#fechaRechazo').datepicker();

           })
        }
     </script>

  </head>
  <body>
    <div style="overflow-x:auto;">
      <h1>Area administrativa Aprovacion de Socios</h1>
        <h2>Informacion de socios</h2>
        <?php
        include_once '../business/aprovacionBusiness.php';
        $socioBusiness = new AprovacionBusiness();
        $socios = $socioBusiness->sociosEnProgreso();

        echo '<table><tr class="cabeceraTabla" ><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td>Estado</td><td align = "center" colspan="2">Acciones</td> </tr>';

        foreach ($socios as $current) {
            echo '<tr id = "aprovado+'.$current->getCedula().'">';
            echo '<td> '.$current->getNombre().'</td>';
            echo '<td> '.$current->getPrimerApellido() .' </td>';
            echo '<td> '.$current->getSegundoApellido().' </td>';
            echo '<td> En proceso</td>';
            echo "<td> <button type='button'  value='".$current->getSocioId()."~aprovar'>Aprovar</button></td>";
            echo "<td> <button type='button'  value='".$current->getSocioId()."~rechazar'>Rechazar</button></td>";
            echo '</tr>';
        }
        echo '</table>';
        ?>
</div>
          <form class="" action="../business/aprovacionAction.php" method="post">
            <input type="text" id="socioid" name="socioid" readonly style="display:none" >

            <div id="cajaMotivo" name="cajaMotivo" style="display:none">
            <br><br>
            <p>Porque no se le aprovo la solicitud</p>
            <br>
            <textarea name="motivoRechazo" rows="8" cols="80"></textarea>
            <br>
            <p>Fecha de Rechazo de la aprovacion</p>
            <input type="date" name="fechaRechazo" id="fechaRechazo" value="">
            <br><br>
            <hr>
            <input type="submit" name="cancelarAprobacion" value="Guardar Cambios">
            <input type="reset" value="Limpiar campos">
            <a href="aprovacionSocioView.php"><input type="button" name="" value="Cancelar"></a>

        </div>

        <div id="cajaAprovacion" name="cajaAprovacion" style="display:none">
            <br><br>
            <p>Session</p>
            <input type="date" name="fechaAprovacion" id="fechaAprovacion" value="">
            <input type="submit" name="enviarAprobacion" value="Guardar Cambios">
            <input type="reset" value="Limpiar campos">
            <a href="aprovacionSocioView.php"><input type="button" name="" value="Cancelar"></a>
          </form>
        </div>



        <a href="../index.php">Regresar</a>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="../js/aprobarSocio.js"></script>

  </body>
</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
