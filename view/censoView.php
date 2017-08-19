<!DOCTYPE html>
<html>
<head>
	<title>
		Censo de ASOTURGA
	</title>

    <?php
    include '../business/heardAction.php';
    ?>

</head>

<body>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyField") {
            echo '<p style="color: red">Campo(s) vacio(s)</p>';
        } else if ($_GET['error'] == "numberFormat") {
            echo '<p style="color: red">Error, formato de numero</p>';
        } else if ($_GET['error'] == "dbError") {
            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
        }
    } else if (isset($_GET['success'])) {
        echo '<p style="color: green">Transacción realizada</p>';
    }
    ?>
  

<p>Registro de hato para socios de ASOTURGA</p>

<p>Datos personales:</p>

<form method="post" action="../business/herdAction.php">

		<table>
			<tr>
				<td>
					Cedula
				</td>


				<td>
					Nombre
				</td>

				<td>
					Primer Apellido
				</td>

				<td>
					Segundo Apellido
				</td>

				<td>
					Telefono Fijo
				</td>


				<td>
					Telefono Movil
				</td>

			</tr>
			<tr>

				<td>
					<input type="text" name="socioid" id="socioid">
				</td>
				<td>
					<input type="text" name="socioname" id="socioname">
				</td>
				<td>
					<input type="text" name="sociofirstname" id="sociofirstname">
				</td>		
				<td>
					<input type="text" name="sociolastname" id="sociolastname">
				</td>
				
				<td>
					<input type="text" name="sociophonehome" id="sociophonehome">
				</td>
				
				<td>
					<input type="text" name="sociophone" id="sociophonehome">
				</td>
			</tr>

		</table>		
	
	<p>Tipo de Actividad</p>

	<table>
		<tr>
			<td>
			Leche:<input type="checkbox" name="milk" value="milk">
			</td>
			<td>
			Carne Cria:<input type="checkbox" name="breedingMeat" value="breedingMeat">
			</td>

			<td>
			Carne Engorde:<input type="checkbox" name="fatteningMeat" value="fatteningMeat">
			</td>

			<td>
			Doble proposito:<input type="checkbox" name="doublePurpose" value="doublePurpose">
			</td>
		</tr>

	</table>

		<p>Cantidad de animales</p>

	<table>
		<tr>
			<td>
				Terneros
			</td>
	
			<td>
				<input type="text" name="calf" placeholder="0">
			</td>
		</tr>
		<tr>
			<td>
				Terneras
			</td>
			<td>
				<input type="text" name="beal" placeholder="0" >
			</td>
	</tr>
		<tr>
			<td>
				Novillos
			</td>
			<td>
				<input type="text" name="steer" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas
			</td>
			<td>
				<input type="text" name="heifer" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas Pregnadas
			</td>
			<td>
				<input type="text" name="impregnatedHeifer" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Toros
			</td>
			<td>
				<input type="text" name="bull" placeholder="0">
			</td>

	</tr>
		<tr>
			<td>
				Vacas
			</td>
			<td>
				<input type="text" name="cow" placeholder="0">
			</td>


		</tr>

	</table>



		<input type="submit" name="registerHerd" id="registerHerd" value="Registrar Hato">



</form>


</body>
</html>