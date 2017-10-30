<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Avisos</title>

    <link rel="stylesheet" href="../css/diseno.css">
  </head>
  <body>

    <p>
          <h1>Noticias de ASOTURGA</h1>
    </p>




        <?php

            include '../business/avisoBusiness.php';
            $avisos = new AvisosBusiness();
            $misnoticias = $avisos->mostrarTodosAvisos();


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
                  echo '<td> Creador por: ';

                  echo $current->getSocioId();
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
