<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Socios</title>
    <link rel="stylesheet" type="text/css" href="../css/diseno.css">

		    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>

		<script type="text/javascript">
			var datefield=document.createElement("input")
			datefield.setAttribute("type", "date")
			if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
				 document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
				document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
				document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
			}
		 </script>

		 <script>
				if(datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
					 jQuery(function($){ //on document.ready
						 $('#fechaMenor').datepicker();
							 $('#fechaMayor').datepicker();
					 })
				}
		 </script>

		 <script type="text/javascript">
		 		function validarFecha(){
					if (document.getElementById('fechaMayor').value <document.getElementById('fechaMenor').value ) {
						alert("Debe de introducir primero la fecha menor y luego la fecha mayor");
						return false;
					}else{
						return true;
					}
				}
		 </script>

  </head>
    <body>
			<h1>Listado de  socios morosos</h1>
			<?php
				if(isset($_GET['error']) && $_GET['error']== "notFound"){
					echo '<p style="color: blue">No se han encontrado morosos entre las dos fechas</p>';
				}
 			?>
			<form class="" action="reportePagoView.php" method="post">
    <?php
      include_once '../business/registroAnualidadBusiness.php';

      $registroAnualidadBusiness = new RegistroAnualidadBusiness();
      $listaMorosos = $registroAnualidadBusiness->sacarMorosos();

    echo '<table border ="1"><tr><td align = "left" colspan = "4">Informacion Socio</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td >Reportes</td> </tr>';
    foreach ($listaMorosos as $current) {
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

		<p>Calcular por medio de dos fechas</p>
		<form class="" action="verMorososView.php" method="post" onsubmit="return validarFecha()">
			<label for="">Fecha Menor</label><br><br>
			<input type="date" name="fechaMenor" id="fechaMenor"  value="" placeholder="01/01/1990">
			<br><br>
			<label for="">Fecha Mayor</label><br>
			<input type="date" name="fechaMayor" id="fechaMayor" value="" placeholder="01/01/2018">

			<input type="submit" name="anualidadFecha" id="anualidadFecha" value="Enviar Datos">
		</form>


    <a href="../index.php">Regresar</a>

		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="../js/generarReporte.js"></script>

</body>
</html>
