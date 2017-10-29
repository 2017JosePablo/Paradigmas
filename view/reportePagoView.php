<?php
  if (!isset($_POST['reporte'])) {
    header("location: ../view/reporteView.php?error=accessDeneid");
  }
 ?>
<html>
<head>
  <link rel="stylesheet" href="../css/diseno.css">
</head>
<body >
  <?php
  include '../business/socioBusiness.php';

  $socioBusiness = new socioBusiness();
  $socios = json_decode($socioBusiness->obtenerUnTBSocio($_POST['reporte']), true);
  $socioId = $socioBusiness ->getSocioId($_POST['reporte']);
  ?>

<h1 align = "center"><?php echo $socios["socionombre"].' '.$socios["socioprimerapellido"].' '.$socios["sociosegundoapellido"]; ?> </h1>
<div style="overflow-x:auto;">
 <table>
      <tr class="cabeceraTabla">
         <td>Cedula</td>
         <td colspan="2">Nombre</td>
         <td>Correo</td>
       </tr>
       <tr>
         <td><?php echo $socios["sociocedula"]; ?></td>
         <td colspan="2"><?php echo $socios["socionombre"].' '.$socios["socioprimerapellido"].' '.$socios["sociosegundoapellido"]; ?></td>
         <td><?php echo $socios["sociocorreo"]; ?></td>
     </tr>
  </table>
   <hr>
  <table>
     <tr class="cabeceraTabla">
       <td>Telefono</td>
       <td>Estado</td>
       <td>Fecha Ingreso</td>
       <td>Actividad</td>
      </tr>

      <tr>
         <td><?php echo $socios["sociotelefono"]; ?></td>
         <td><?php echo $socios["socioestadodetalle"]; ?></td>
         <td><?php echo $socios["sociofechaingreso"]; ?></td>
         <td><?php echo $socios["tipoactividadnombre"]; ?></td>
      </tr>
    </table>
     <hr>
</div>
 <?php
 include '../business/registroAnualidadBusiness.php';
 $registroAnualidadBusiness = new RegistroAnualidadBusiness();
 $pago = json_decode($registroAnualidadBusiness->getInformacionPago("1"),true);
 ?>

 <div style="overflow-x:auto;">
<table  width="100%">
    <tr class="cabeceraTabla">
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
</div>

<h1>Recibos pendientes</h1>
<br>
<?php
  include_once '../business/anualidadBusiness.php';
  $registroAnualidadBusiness = new AnualidadBusiness();
  $historial = $registroAnualidadBusiness->calcularMonto($socioId);
  $total= 0;
echo '<table width= "100%"><tr><td>Historial</td></tr><td>Monto</td><td>Fecha que se debia realizar el pago</td> </tr>';
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
<br>
<div id="llamado">
  <hr>
  <a href="" onclick="myFunction()" style="color:red;font-size:50px;">Imprimir reporte</a>
</div>
 <script>
 function myFunction() {
   document.getElementById('llamado').style="display:none";
   window.print();
 }
 </script>

</html>
