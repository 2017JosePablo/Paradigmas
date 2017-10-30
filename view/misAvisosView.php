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


    <?php

        include '../business/avisoBusiness.php';
        $avisos = new AvisosBusiness();
        $misnoticias = $avisos->mostrarMisAvisos($_SESSION["usuario"]);

    //    include '../domain/aviso.php';

        foreach ($misnoticias as $current) {
            echo '<table width = "80%" border =1 align=center class= "noticiaAviso">';
                echo '<tr class="cabeceraTabla">';
                  echo '<td> Noticia: ';
                  echo '</td>';
                echo '</tr>';
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
                    echo ' <img src="'.$current->getRutaFoto().'">';
                  echo '</td>';
                echo '</tr>';

                echo '<tr>';
                  echo '<td> Creador: ';
                  echo $current->getSocioId();
                  echo '<a href = "#?value='.$current->getSocioId().'" >Editar </a> ';
                  echo '</td>';
                echo '</tr>';

            echo '</table> ';
            echo '<br> ';
            echo '<hr> ';
          }

     ?>
     <hr>
     <a href="../">Regresar</a>

  </body>
</html>
