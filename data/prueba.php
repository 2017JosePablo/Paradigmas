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





        include 'colaboradorData.php';
        $temp = new colaboradorData();
        include_once '../domain/colaborador.php';
        $colaborador = new colaborador('3','103450353','Adan','Rojas','Hernadez','rc@gmai.com','7503-2525');

        //echo "Aqui estot: ". $temp->insertarColaborador($colaborador);

      //    echo $temp->obtenerColaborador("1")->getNombreColaborador();
        echo $temp->modificarColaborador($colaborador);
        //echo $temp->eliminarColaborador('2');


        ?>


</body>
