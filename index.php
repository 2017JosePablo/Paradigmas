<?php
	include 'business/anualidadBusiness.php';
	$anualidad  = new AnualidadBusiness();

	echo $anualidad->actualizarEstado();
	//echo "<script>alert('esperando metodo');</script>";



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Proyecto de Paradigmas de Programacion</title>
	<link rel="stylesheet" href="">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>
			$(function(){
				var mylist = $('#myId');
				var listitems = mylist.children('li').get();
				listitems.sort(function(a, b) {
				   var compA = $(a).text().toUpperCase();
				   var compB = $(b).text().toUpperCase();
				   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
				})
				$.each(listitems, function(idx, itm) { mylist.append(itm); });
			});
		</script>


</head>
<body>

<?php
	if(isset($_GET['success'])){
			if($_GET['success'] == "insertedPago"){
				echo '<p style="color: green">Anualidad insetada con exito</p>';
			}else if($_GET['success'] == "insertedPagoPrimero"){
				echo '<p style="color: green">Se ha registrado la primer Anualidad con exito</p>';
			}else if($_GET['success'] == "insertedActividad"){
				echo '<p style="color: green">Se ha registrado correctamente la Actividad</p>';
			}else if($_GET['success'] == "updateActividad"){
				echo '<p style="color: green">La actividad se ha modificado con exito</p>';
			}else if($_GET['success'] == "updateFinca"){
				echo '<p style="color: green">La finca se ha modificado con exito</p>';
			}else if($_GET['success'] == "insertedTipoFinca"){
				echo '<p style="color: green">El tipo de tipo de actividad se a registrado con exito</p>';
			}else if($_GET['success'] == "updateTipoFinca"){
				echo '<p style="color: green">El tipo de finca se ha modificado con exito</p>';
			}else if($_GET['success'] == "insertedHato"){
				echo '<p style="color: green">El hato se ha insertado con exito</p>';
			}else if($_GET['success'] == "updateHato"){
				echo '<p style="color: green">El hato se a modificado con exito</p>';
			}else if($_GET['success'] == "insertedJunta"){
				echo '<p style="color: green">La junta se ha insertado exitosamente.</p>';
			}else if($_GET['success'] == "insertedRaza"){
				echo '<p style="color: green">La raza se ha insertado con exito</p>';
			}else if($_GET['success'] == "updatedRaza"){
				echo '<p style="color: green">La raza se ha modificado con exito</p>';
			}else if($_GET['success'] == "insertedSocio"){
				echo '<p style="color: green">El socio se ha insertado con exito</p>';
			}else if($_GET['success'] == "updatedSocio"){
				echo '<p style="color: green">El socio se ha modificado con exito</p>';
			}else if($_GET['success'] == "insertedAnualidad"){
				echo '<p style="color: green">La anualidad ha sido guardada con exito</p>';
			}



	}
 ?>
<p>ASOTURGA</p>
<ol id="myId">
		<li><a href="view/pagoPrimeroAnualidadView.php">Pago socio primera vez</a><br></li>
		<li><a href="view/fincaTipoView.php">Tipo Finca</a><br></li>
		<li><a href="view/fincaView.php">Finca</a><br></li>
		<li><a href="view/juntaView.php">Junta</a><br></li>
		<li><a href="view/razaView.php">Raza</a><br> </li>
		<li><a href="view/hatoView.php">Hato</a><br></li>
		<li><a href="view/socioView.php">Socio</a><br></li>
		<li><a href="view/renovarAnualidadView.php">Renovar Anualidad</a><br></li>
		<li><a href="view/reporteView.php">Reportes</a><br></li>
		<li><a href="view/actividadView.php">Actividad</a><br></li>
		<li><a href="view/anualidadView.php">Anualidad</a><br></li>
		<li><a href="view/aprovacionSocioView.php">Aprovacion de Socio</a><br></li>


</ol>



</body>
</html>
