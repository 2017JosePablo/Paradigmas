<?php
  session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: loginView.php?error=needlogin");
    }
//    echo $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de avisos</title>

    <link rel="stylesheet" href="../css/diseno.css">
  </head>
  <body>

    <p>
          <h1>Listado de noticias publicadas en ASOTURGA</h1>
    </p>

<form class="" action="../business/agregarNoticiaAction.php" method="post">
  <input type="hidden" name="idAviso" id="idAviso" value="">

    <?php

        include '../business/avisoBusiness.php';
        $avisos = new AvisosBusiness();
        $misnoticias = $avisos->mostrarMisAvisos($_SESSION["usuario"]);

    //    include '../domain/aviso.php';

        foreach ($misnoticias as $current) {
          echo '<input type = "hidden" name = "ruta~'.$current->getIdAviso().'" value = "'.$current->getRutaFoto().'">';
            echo '<table width = "80%" border =1 align=center class= "noticiaAviso">';
                echo '<tr class="cabeceraTabla">';
                  echo '<td> Noticia: ';
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<td> ';
                  echo "<input name='temaAnuncio' type='text' id='tema~".$current->getIdAviso()."' value = '".$current->getTema()."' disabled>";

                  echo '</td>';
                echo '</tr>';

                echo '<tr>';
                  echo '<td>';
                    //echo "<textArea name='detalleAnuncio'  id='detalle~".$current->getDetalle()."' value = '".$current->getTema()."' disabled>";
                    echo "<textarea name='detalleAnuncio' id= 'detalle~".$current->getIdAviso()."' rows='7' cols='80' disabled> ".$current->getDetalle()."</textarea>";
                  echo '</td>';
                echo '</tr>';


                echo '<tr>';
                  echo '<td align ="center"> ';
                    echo ' <img src="'.$current->getRutaFoto().'">';

                  echo '</td>';
                echo '</tr>';

                echo '<tr>';
                  echo "<td>";
                  echo "<button name= 'editarAviso' type= 'button' value = '".$current->getIdAviso()."'>Editar Noticia</button>";
                  echo "<div id = 'guardar~".$current->getIdAviso()."' style='display:none;'>";
                    echo "<button name='editarAviso' type='submit'>Guardar Cambios</button>";
                  echo "</div>";

                  echo '</td>';
                echo '</tr>';

            echo '</table> ';
            echo '<br> ';
            echo '<hr> ';
          }

     ?>
     </form>
     <hr>
     <a href="../">Regresar</a>

  </body>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/editarAvisos.js"></script>
</html>
