<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Morosos</title>
    <link rel="stylesheet" href="../css/diseno.css">
  </head>
  <body>

    <h1>Reportes de pagos</h1>
    <h2>Informacion Socio</h2>

     <form class="" action="reportePagoView.php" method="post">

       <div style="overflow-x:auto;">
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
          echo '<table><tr class="cabeceraTabla" > <td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td align = "center">Reporte</td> </tr>';
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
</div>
</form>
  <hr>
  <a href="../">Regresar</a>
  <?php
    include_once "piePaginaView.php";
   ?>

  </body>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/generarReporte.js"></script>

</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
