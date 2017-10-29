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
                  echo '<td> Tema: ';
                  echo $current->getTemaAviso();
                  echo '</td>';
                echo '</tr>';

                echo '<tr>';
                  echo '<td> Detalle: ';
                  echo $current->getDetalleAviso();
                  echo '</td>';
                echo '</tr>';


                echo '<tr>';
                  echo '<td> Foto: ';
                    echo ' <img src="'.$current->getFotoAviso().'">';
                  echo '</td>';
                echo '</tr>';

                echo '<tr>';
                  echo '<td> Responsable: ';
                  echo $current->getIdSocio();
                  echo '</td>';
                  echo '<td> Responsable: ';
                  echo '<input type="button" value='.$current->getIdSocio().'> ';
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
