<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Proyecto de Paradigmas de Programacion</title>
	<link rel="stylesheet" href="">
</head>
<body>

<?php
	if(isset($_GET['success'])){
		 echo '<p style="color: green">Dato insertado con Exito</p>';
	}
 ?>
<p>ASOTURGA</p>
<a href="view/juntaView.php">Junta</a><br>
<a href="view/hatoView.php">Hato</a><br>
<a href="view/actividadView.php">Actividad</a><br>
<a href="view/socioView.php">Socio</a><br>
<a href="view/fincaTipoView.php">Tipo Finca</a><br>
<a href="view/fincaView.php">Finca</a><br>
<a href="view/razaView.php">Raza</a><br>
<a href="view/renovarAnualidadView.php">Renovar Anualidad</a><br>
<a href="view/pagoPrimeroAnualidadView.php">Pago socio primera vez</a><br>
</body>
</html>
