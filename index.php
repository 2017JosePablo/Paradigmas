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

<a href="view/juntaView.php">Junta</a><br>
<a href="view/censoView.php">Censo</a><br>
<a href="view/actividadView.php">Actividad</a><br>
<a href="view/socioView.php">Socio</a><br>
<a href="view/fincaTipoView.php">Tipo Finca</a><br>
<a href="view/fincaView.php">Finca</a><br>
<a href="view/razaView.php">Raza</a><br>


<form class="" action="data/uploadFileData.php" method="post" enctype="multipart/form-data">
	<label for="">Subir foto</label>
		<input type="file" value="Seleccionar Foto" name="foto" id="foto">
		<input type="submit" value="Enviar Foto">
</form>

</body>
</html>
