<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto de Paradigmas de Programacion</title>
</head
<body>

    <?php
    /*
     include 'cercaData.php';
            $temp = new razaData();

            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table border = "1"> <tr>  <td align = "center" colspan = "4">Listado de razas </td> </tr><tr><td>Id</td>  <td>Nombre de la Raza</td><td colspan="2">Acciones</td> </tr>';

            foreach ($todasRazas as $current) {
                echo '<tr>';
                echo '<td>  '.$current->getIdRaza() . ' </td>';
                echo '<td> '.$current->getNombreRaza().'</td>';

                echo '<td> <a href="../business/razaAction.php?ideliminar='.$current->getIdRaza().'"> Eliminar</a> </td>';

                 echo "<td> <a href='' onclick=loadJunta('".$current->getIdRaza()."') > Modificar</a> </td>";

                echo '</tr>';
            }
                echo '</table>';


          include 'cercaData.php';
          $temp = new cercaData();
          $test = $temp->obtenerTiposCerca();

          foreach ($test as $current) {

              echo $current->getNombreCerca().'</br>';
          }

          include 'cvoData.php';
          $temp = new cvoData();
          include_once '../domain/cvo.php';
          $cvo = new Cvo('','1','2018-02-12','2');
          //echo $temp->insertarCvo($cvo);

          echo $temp->obtenerCvoSocio("2")->getCvoFechaVigencia();

          include 'examenBruselasData.php';
          $temp = new examenBruselasData();
          include_once '../domain/examenBruselas.php';
          $examen = new examenBruselas('','1','2018-02-12','1');
          //echo $temp->insertarExamen($examen);

//          echo $temp->obtenerExamenSocio("1")->getExamenFechaVencimiento();
          echo $temp->modificarExamenSocio($examen);
*/





        include 'fierroData.php';
        $temp = new fierroData();
        include_once '../domain/fierro.php';
        $examen = new fierro('','1','/home/carranza/Escritorio/fierro1.jpg','1');
    //    echo $temp->insertarFierroSocio($examen);

//        echo $temp->obtenerFierroSocio("1")->getFierroRutaImagen();
        echo $temp->modificarFierroSocio($examen);


        ?>


</body>
