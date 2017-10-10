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
		 echo '<p style="color: green">Dato insertado con Exito</p>';
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


</ol>



</body>
</html>
