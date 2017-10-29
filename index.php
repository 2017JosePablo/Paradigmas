<?php
	//echo dirname("business/anualidadBusiness.php");
	//include "business/anualidadBusiness.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Proyecto de Paradigmas de Programacion</title>
	<link rel="stylesheet" href="css/diseno.css">

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

      function setAlerta(mensaje) {
        document.getElementById('contenedorMesaje').style="display:block";
        document.getElementById('contenedorMesaje').innerHTML=mensaje;
        setTimeout ("cerrarAlerta();", 5000);
      }
      function cerrarAlerta() {
          document.getElementById('contenedorMesaje').style="display:none";
      }
		</script>
</head>
<body>
<div id="contenedorMesaje" class="contenedorMensaje" style="display:none;">
</div>

<?php
	if(isset($_GET['success'])){
			if($_GET['success'] == "insertedPago"){
        echo'<script>setAlerta("Anualidad insetada con exito");</script>';
			}else if($_GET['success'] == "insertedPagoPrimero"){
        echo'<script>setAlerta("Se ha registrado la primer Anualidad con exito");</script>';
			}else if($_GET['success'] == "insertedActividad"){
        echo'<script>setAlerta("Se ha registrado correctamente la Actividad");</script>';
			}else if($_GET['success'] == "updateActividad"){
        echo'<script>setAlerta("La actividad se ha modificado con exito");</script>';
			}else if($_GET['success'] == "updateFinca"){
        echo'<script>setAlerta("La finca se ha modificado con exito");</script>';
			}else if($_GET['success'] == "insertedTipoFinca"){
        echo'<script>setAlerta("El tipo de tipo de actividad se a registrado con exito");</script>';
			}else if($_GET['success'] == "updateTipoFinca"){
        echo'<script>setAlerta("El tipo de finca se ha modificado con exito");</script>';
			}else if($_GET['success'] == "insertedHato"){
        echo'<script>setAlerta("El hato se ha insertado con exito");</script>';
			}else if($_GET['success'] == "updateHato"){
        echo'<script>setAlerta("El hato se a modificado con exito");</script>';
			}else if($_GET['success'] == "insertedJunta"){
        echo'<script>setAlerta("La junta se ha insertado exitosamente.");</script>';
			}else if($_GET['success'] == "insertedRaza"){
        echo'<script>setAlerta("La raza se ha insertado con exito");</script>';
			}else if($_GET['success'] == "updatedRaza"){
        echo'<script>setAlerta("La raza se ha modificado con exito");</script>  ';
			}else if($_GET['success'] == "insertedSocio"){
        echo'<script>setAlerta("El socio se ha insertado con exito");</script>';
			}else if($_GET['success'] == "updatedSocio"){
        echo'<script>setAlerta("El socio se ha modificado con exito");</script>';
			}else if($_GET['success'] == "insertedAnualidad"){
        echo'<script>setAlerta("La anualidad ha sido guardada con exito");</script>';
			}else if($_GET['success'] == "insertedAprovation"){
        echo'<script> setAlerta("Se ha aprovado la Solicitud con exito");    </script>  ';
			}




	}
 ?>
<h1>ASOSIACION TURIALBEÑA DE GANADEROS</h1>
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
    <li><a href="view/loginView.php">Login</a><br></li>
    <li><a href="view/recuperarPassView.php">Ver Claves</a><br></li>
    <li><a href="view/avisosView.php">Avisos </a><br></li>
    <li><a href="view/agregarNoticia.php">Agregar un Aviso </a><br></li>


</ol>












</body>
</html>
