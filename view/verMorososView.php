<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Morosos</title>
  </head>
  <body>
     <form class="" action="reportePagoView.php" method="post">
    <?php

        $date = new DateTime($_POST['fechaMenor']);
  			$fechaMenor= $date->format('Y-m-d');

        $date = new DateTime($_POST['fechaMayor']);

        $fechaMayor= $date->format('Y-m-d');




        include_once '../business/registroAnualidadBusiness.php';

        $registroAnualidadBusiness = new RegistroAnualidadBusiness();
        $listaMorosos = $registroAnualidadBusiness->calcularMorososRango($fechaMenor,$fechaMayor);

        if (empty($listaMorosos) ) {
              header("location: ../view/reporteView.php?error=notFound");
        }else{
          echo '<table border ="1"><tr><td align = "center" colspan = "4">Reportes de pagos</td></tr><tr><td align = "left" colspan = "4">Informacion Socio</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td >Reportes</td> </tr>';
          foreach ($listaMorosos as $current) {
              echo '<tr>';
              echo '<td> '.$current->getNombre().'</td>';
              echo '<td> '.$current->getPrimerApellido() .' </td>';
              echo '<td> '.$current->getSegundoApellido().' </td>';
              echo "<td><button type='submit' name='reporte'  value='".$current->getCedula()."'>Generar Reporte</button></td>";
              echo '</tr>';
          }
          echo '</table>';
        }

     ?>

</form>

  </body>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/generarReporte.js"></script>

</html>
