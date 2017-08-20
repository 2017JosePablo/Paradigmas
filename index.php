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
		 echo '<p style="color: green">Censo insertado con Exito</p>';
	}
 ?>

<a href="view/juntaView.php">Junta</a><br>
<a href="view/censoView.php">Censo</a>
</body>
</html>