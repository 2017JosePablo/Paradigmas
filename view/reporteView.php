<?php
// Start the session
session_start();
?>

<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Socios</title>
    <link rel="stylesheet" type="text/css" href="../css/diseno.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
  </head>
    <body>

			<form class="" action="reportePagoView.php" method="post">
    <?php
    include '../business/socioBusiness.php';
    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();
    echo '<table border ="1"><tr><td align = "center" colspan = "4">Reportes de pagos</td></tr><tr><td align = "left" colspan = "4">Informacion Socio</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td >Reportes</td> </tr>';
    foreach ($socios as $current) {
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
        echo "<td><button type='submit' name='reporte'  value='".$current->getCedula()."'>Generar Reporte</button></td>";
        echo '</tr>';
    }
    echo '</table>';
    ?>
	</form>

    <a href="../index.php">Regresar</a>

		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="../js/generarReporte.js"></script>

</body>
</html>
