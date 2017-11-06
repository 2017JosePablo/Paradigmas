<?php
  session_start();
    if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
        if ($_SESSION['rol'] == "admi") {
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
      <h1>Gestion de reportes</h1>
        <select>
            <option value="0">
              ---------REPORETES DE MOROSIDAD-------------
            </option>
            <option onclick="reporteMorosidad()" value="morosidad">
              Reporte por morosidad
            </option>

            <option onclick="reporteMorosidadFechas()" value="morosidadfecha">
              Reporte por rango de fechas
            </option>

            <option value="0">
              ---------REPORTES DE SOCIOS-------------
            </option>
            <option onclick="reporteCanton()" value="canton">
                Socios por Canton-Distrito
            </option>

            <option onclick="reporteRaza()" value="raza">
              Socios por Raza
            </option>
            <option onclick="reporteFinca()" value="finca" >
            Socios por Tipo de Finca
            </option>
            <option onclick="reporteCerca()"value="cerca">
            Socios por tipo de cerca
            </option>

            <option value="0">
            -------REPORTES DE FINCA Y HATO----------
            </option>
            <option onclick="reporteHato()" value="hato">
            Hato consolidado
            </option>
            <option onclick="reporteExamen()"value="examen">
            Examenes CVO Tubuerculosis Brucelas
            </option>
            <option onclick="reporteBovinosDistrito()"value="distrito">
              Cantidad de bovinos por distrito
            </option>
        </select>

  <div class="" id="reporteMorosidad" style="display:none">
    			<h1>Listado de  socios morosos</h1>
    			<?php
    				if(isset($_GET['error']) && $_GET['error']== "notFound"){
    					echo '<p style="color: blue">No se han encontrado morosos entre las dos fechas</p>';
    				}
     			?>
    			<form class="" action="reportePagoView.php" method="post">
    <div style="overflow-x:auto;">
    					<h2>Informacion Socio</h2>
        <?php
          include_once '../business/registroAnualidadBusiness.php';
          $registroAnualidadBusiness = new RegistroAnualidadBusiness();
          $listaMorosos = $registroAnualidadBusiness->sacarMorosos();
        echo '<table ><tr class="cabeceraTabla"><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td >Reportes</td> </tr>';
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
      	</div>
      	</form>
  	</div>

  <div class="" id="reporteMorosidadFechas" style="display:none">
		<h1>Calcular por medio de dos fechas</h1>
		<form class="" action="verMorososView.php" method="post" onsubmit="return validarFecha()">
			<label for="">Fecha Menor     <h3 class="informacionUsuario">(m/d/A)</h3><br></label>
			<input type="date" name="fechaMenor" id="fechaMenor"  value="" placeholder="01/01/1990">
			<br><br>
			<label for="">Fecha Mayor  <h3 class="informacionUsuario">(m/d/A)</h3></label>
			<input type="date" name="fechaMayor" id="fechaMayor" value="" placeholder="01/01/2018">
			<input type="submit" name="anualidadFecha" id="anualidadFecha" value="Enviar Datos">
		</form>
</div>

  <div class="" id="reporteCanton"style="display:none" >
    <h1>Reporte de socio por Canton y distrito</h1>
    
  </div>

    <div class="" id="reporteRaza" style="display:none">
      <h1>Reporte de socio por razas</h1>
    </div>

  <div class="" id="reporteFinca" style="display:none">
    <h1>Reporte de fincas</h1>
  </div>

  <div class="" id="reporteCerca" style="display:none">
    <h1>Reporte por tipos de cerca</h1>
  </div>

  <div class="" id="reporteHato"style="display:none">
    <h1>Reporte por hato consolidado</h1>
  </div>

  <div class="" id="reporteExamen"style="display:none">
    <h1>Reporte de examenes de bucelas , cvo, tuberculosis</h1>
  </div>

  <div class="" id="reporteBovinosDistrito"style="display:none">
    <h1>Reporte por bobinos por distrito</h1>
  </div>


		<hr>
    <a href="../index.php">Regresar</a>

		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="../js/generarReporte.js"></script>

</body>
</html>
<?php

    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
