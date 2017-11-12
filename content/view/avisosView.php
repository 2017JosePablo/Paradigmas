<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Avisos</title>
<link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1>Noticias de ASOTURGA</h1>
      <?php
            include '../business/avisoBusiness.php';

            $avisos = new AvisosBusiness();
            $misnoticias = $avisos->mostrarTodosAvisos();
            foreach ($misnoticias as $current) {
            echo '<table>';
                echo '<tr>';
                  echo '<td> ';
                  echo $current->getTema();
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<td>';
                  echo $current->getDetalle();
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<td align ="center"> ';
                    echo ' <img src="'.$current->getRutaFoto().'" width "500px" height="400px">';
                  echo '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<td class ="creadoPor"> Creador por: ';
                  echo $current->getSocioId();
                  echo '</td>';
                echo '</tr>';
            echo '</table> ';
            echo '<br> ';
            echo 'Comentarios:';

            $listacomentarios = $avisos->mostrarComentarioAviso($current->getIdAviso());
            if ($listacomentarios!=NULL) {

              echo '<table width = "60%" align=center>';
              foreach ($listacomentarios as $comentariosTemporal) {
                    echo '<tr>';
                      echo '<td width= "30%" align="right" class="comentarioAvisoCreador">';
                      echo $comentariosTemporal->getIdSocio();
                      echo '</td>';
                      echo '<td align="left" class="comentarioAviso">';
                      echo $comentariosTemporal->getMensaje();
                      echo '</td>';
                    echo '</tr>';
              }
                  echo '</table> ';
            }else{
               echo 'Aviso sin comentarios <br>';
            }
              echo '<br> ';

            if (isset($_SESSION["usuario"] )){
                echo '<form class="" action="../business/agregarNoticiaAction.php" method="post">';
                    echo '<input type="text" name="idaviso" value="'.$current->getIdAviso().'"  style="display:none">';
                    echo '<input type="text" name="mensaje" value="" placeholder="Ingrese su comentario" style="width:60%">';
                    echo '<input type="submit" name="enviarComentario" value="Publicar Comentario">';
                echo '</form>';
            }else {
                 echo 'Debes de iniciar seccion para crear un comentario<br>';
            }
                    echo '<br>';
            echo '<hr> ';
          }

     ?>



     <a href="../"><input type="button" name="" value="Regresar"></a>

   </div>
     <?php
      include_once "../../footer.php";
      ?>
  </body>
</html>
