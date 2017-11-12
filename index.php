<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Proyecto de Paradigmas de Programacion</title>
	<link rel="stylesheet" href="css/diseno.css">

  <script type="text/javascript">

      function setAlerta(mensaje) {
        document.getElementById('contenedorMesaje').style="display:block";
        document.getElementById('contenedorMesaje').innerHTML=mensaje;
        setTimeout ("cerrarAlerta('contenedorMesaje');", 5000);
      }

      function setAlertaError(mensaje) {
        document.getElementById('contenedorMesajeError').style="display:block";
        document.getElementById('contenedorMesajeError').innerHTML=mensaje;
        setTimeout ("cerrarAlerta('contenedorMesajeError');", 5000);
      }

      function cerrarAlerta(ventana) {
          document.getElementById(ventana).style="display:none";
      }



		</script>
</head>
<body>
<div id="contenedorMesaje" class="contenedorMensaje" style="display:none;">
</div>

<div id="contenedorMesajeError" class="contenedorMensajeError" style="display:none;">
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
			}else if($_GET['success'] == "updatedNoticia"){
        echo'<script> setAlerta("La noticia se ha actualizado con exito");    </script>  ';
			}else if($_GET['success'] == "insertedAviso"){
        echo'<script> setAlerta("La noticia se ha guardado con exito");    </script>  ';
			}


	}else {
    if(isset($_GET['error'])){
      if($_GET['error'] == "dontPermisse"){
        echo'<script> setAlertaError("No cuenta con los privilegios para esta accion");    </script>  ';
			}
    }
  }
 ?>
<h1>ASOSIACION TURIALBEÑA DE GANADEROS</h1>



<li><a href="view/loginView.php">Login</a></li>
<li><a href="view/salirView.php">Salir </a><br></li>

<h2>Vista administrativa</h2>
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
    <li><a href="view/recuperarPassView.php">Ver Claves</a><br></li>
    <li><a href="view/avisosView.php">Avisos </a><br></li>
    <li><a href="view/misAvisosView.php">Mis Avisos </a><br></li>
    <li><a href="view/agregarNoticia.php">Agregar un Aviso </a><br></li>

<h2>Area de un Usuario</h2>
    <li><a href="view/avisosView.php">Avisos </a><br></li>
    <li><a href="view/misAvisosView.php">Mis Avisos </a><br></li>
    <li><a href="view/agregarNoticia.php">Agregar un Aviso </a><br></li>


<?php
	include_once "view/piePaginaView.php";
 ?>
</body>
</html>
