<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aprovacion de Socio</title>
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
           })
        }
     </script>

  </head>
  <body>
    <h1>Listado de socios para aprovar</h1>
        <?php
        include '../business/socioBusiness.php';
        $socioBusiness = new socioBusiness();
        $socios = $socioBusiness->obtenerTodosTBSocio();


        echo '<table border ="1"><tr><td align = "center" colspan = "7">Area administrativa Aprovacion de Socios</td></tr><tr><td align = "left" colspan = "7">Informacion de socios</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td>Estado</td><td align = "center" colspan="2">Acciones</td> </tr>';

        foreach ($socios as $current) {
            echo '<tr id = "aprovado+'.$current->getCedula().'">';
            echo '<td> '.$current->getNombre().'</td>';
            echo '<td> '.$current->getPrimerApellido() .' </td>';
            echo '<td> '.$current->getSegundoApellido().' </td>';
            echo '<td> En proceso</td>';
            echo "<td> <button type='submit' id='modificar-submit' value='".$current->getCedula()."~aprovar'>Aprovar</button></td>";
            echo "<td> <button type='submit' id='modificar-submit' value='".$current->getCedula()."~rechazar'>Rechazar</button></td>";
            echo '</tr>';
        }
        echo '</table>';

                 //name='.$current->getIdTBJunta().'
        ?>

        <div id="cajaMotivo" name="cajaMotivo" style="display:none">
          <form class="" action="#" method="post">
            <br><br>
            <p>Porque no se le aprovo la solicitud</p>
            <br>
            <textarea name="motivoRechazo" rows="8" cols="80"></textarea>
            <br><br>
            <input type="submit" name="enviarAprobacion" value="Guardar Cambios">
            <input type="reset" value="Limpiar campos">
            <a href="aprovacionSocioView.php"><input type="button" name="" value="Cancelar"></a>
          </form>
        </div>

        <div id="cajaAprovacion" name="cajaAprovacion" style="display:none">
          <form class="" action="#" method="post">
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
