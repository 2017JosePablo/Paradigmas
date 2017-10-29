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

        include '../domain/aviso.php';
        $aviso = array();
        $cont = 0;

        while($cont < 10) {
            array_push($aviso, new Aviso($cont,"Adan Carranza Alfaro","Sexo en la ciudad ","Sen detala la fecja","../uploads/avisos/foto1.png"));
            $cont++;
        }

          $cont =1;
            foreach ($aviso as $current) {

            echo '<table width = "80%" border =1 align=center class= "noticiaAviso">';
                echo '<tr class="cabeceraTabla">';
                  echo '<td> Noticia: ';
                  echo $cont ++;
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
