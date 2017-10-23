<?php
  if (!isset($_POST['reporte'])) {
    header("location: ../view/reporteView.php?error=accessDeneid");
  }
 ?>
<html>
<head>

</head>
<body >
  <?php
  include '../business/socioBusiness.php';

  $socioBusiness = new socioBusiness();
  $socios = json_decode($socioBusiness->obtenerUnTBSocio($_POST['reporte']), true);
  $socioId = $socioBusiness ->getSocioId($_POST['reporte']);
  ?>



<br>
<br>

<br><br>
<h1 align = "center">Reporte de Pago:<strong> <?php echo $socios["sociocedula"]; ?> </strong></h1>
<br><br><br>

 <table width="100%">
   <tr>
         <td>Cedula</td>
         <td>Nombre</td>
         <td>Correo</td>
         <td>Telefono</td>
       </tr>
    <tr>
       <td><?php echo $socios["sociocedula"]; ?></td>
       <td><?php echo $socios["socionombre"].' '.$socios["socioprimerapellido"].' '.$socios["sociosegundoapellido"]; ?></td>
       <td><?php echo $socios["sociocorreo"]; ?></td>
       <td><?php echo $socios["sociotelefono"]; ?></td>
     </tr>
 </table>
<br><br><hr><br><br>
 <table width="100%">
   <tr>
        <td>Estado</td>
         <td>Fecha Ingreso</td>
         <td>Actividad</td>

       </tr>
    <tr>
      <td><?php echo $socios["socioestadodetalle"]; ?></td>
       <td><?php echo $socios["sociofechaingreso"]; ?></td>
       <td><?php echo $socios["tipoactividadnombre"]; ?></td>


     </tr>
 </table>
 <hr>
 <?php
 include '../business/registroAnualidadBusiness.php';
 $registroAnualidadBusiness = new RegistroAnualidadBusiness();
 $pago = json_decode($registroAnualidadBusiness->getInformacionPago("1"),true);
 ?>
<table  width="100%">
    <tr>
        <td>Fecha de Vencimiento</td>
        <td>Fecha del Pago Actual</td>
        <td>Fecha Proximo Pago</td>
      </tr>

    <tr>
      <td><?php echo $pago["pagoanualidadanterior"]; ?></td>
      <td><?php echo $pago["pagoanualidadactual"]; ?></td>
      <td><?php echo $pago["pagoanualidadproximo"]; ?></td>
    </tr>

</table>
<br>
<hr>
<h1>Recibos pendientes</h1>
<br>
<br>

<?php
  include_once '../business/anualidadBusiness.php';

  $registroAnualidadBusiness = new AnualidadBusiness();
  $historial = $registroAnualidadBusiness->calcularMonto($socioId);
  $total= 0;
echo '<table width= "100%"><tr><td align = "left" colspan = "2">Historial</td></tr><td>Monto</td><td>Mes</td> </tr>';
foreach ($historial as $current) {
    echo '<tr>';
    echo '<td> '.$current->getMonto().'</td>';
    echo '<td> '.$current->getFechaActualizacion().'</td>';
    echo '</tr>';
    $total +=$current->getMonto();
}
echo '</table>';
?>
<h1>Total a Cancelar: <?php echo $total; ?></h1>

<br><br>
<div id="llamado">
  <a href="" onclick="myFunction()" style="color:red;font-size:50px;">Imprimir reporte</a>
</div>
 <script>
 function myFunction() {
   document.getElementById('llamado').style="display:none";
   window.print();
 }
 </script>

</html>
