<!DOCTYPE html>
<html>
<head>
	<title>
		Censo de ASOTURGA
	</title>

    <?php
    //include '../business/heardAction.php';
    ?>

</head>
<script type='text/javascript'>

function validar(){
var todo_correcto = true;

/*Para comprobar la edad, utilizaremos la función isNaN(), que nos dirá si el valor 
ingresado NO es un número (NaN son las siglas de Not a Number). Si la edad no es un 
número, todo_correcto será false.*/
if(isNaN(document.getElementById('terneros').value) && document.getElementById('terneros').value.length < 1 ){
    todo_correcto = false;
}
if(isNaN(document.getElementById('terneras').value) && document.getElementById('terneras').value.length < 1 ){
    todo_correcto = false;
}
if(isNaN(document.getElementById('novillos').value) && document.getElementById('novillos').value.length < 1 ){
    todo_correcto = false;
}
if(isNaN(document.getElementById('novillas').value)  && document.getElementById('novillas').value.length < 1 ){
    todo_correcto = false;
}
if(isNaN(document.getElementById('novillospregnadas').value) && document.getElementById('Novillaspregnadas').value.length < 1 ){
    todo_correcto = false;
}
if(isNaN(document.getElementById('toros').value) && document.getElementById('toros').value.length < 1 ){
    todo_correcto = false;
}

if(isNaN(document.getElementById('vacas').value) && document.getElementById('vacas').value.length < 1 ){
    todo_correcto = false;
}

if(!todo_correcto){
alert('Algunos campos no están correctos, vuelva a revisarlos');
}

return todo_correcto;
}

</script>






<body>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyField") {
            echo '<p style="color: red">Campo(s) vacio(s) debe ingresar almenos un bobino</p>';
        } else if ($_GET['error'] == "numberFormat") {
            echo '<p style="color: red">Error, formato de numero al ingresar la cantidad de bobinos</p>';
        } else if ($_GET['error'] == "dbError") {
            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
        }else if($_GET['error'] == "emptyActivity"){
			echo '<center><p style="color: red">No se selecciono una Actividad</p></center>';
        }
    } else if (isset($_GET['success'])) {
        echo '<p style="color: green">Transacción realizada</p>';
    }
    ?>
  
<p>Advertencia: Al ingresar un daro "Erroneo" se perderan los datos temporales.</p>
<p>Registro de hato para socios de ASOTURGA</p>

<p>Datos personales:</p>

<form method="post" onsubmit='return validar()' action="../business/hatoAction.php">

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
					<input type="text" name="socioid" id="socioid"  required>
				</td>
				<td>
					<input type="text" name="socionombre" id="socionombre"  required>
				</td>
				<td>
					<input type="text" name="socioprimerapellido" id="socioprimerapellido"  required>
				</td>		
				<td>
					<input type="text" name="sociosegundoapellido" id="sociosegundoapellido"  required>
				</td>
				
				<td>
					<input type="text" name="sociotelcasa" id="sociotelcasa">
				</td>
				
				<td>

			
					<input type="text" name="sociotelmovil" id="sociotelmovil">

				</td>
			</tr>

		</table>		
	
	<p>Tipo de Actividad</p>

	<table>
		<tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Leche<br>	
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Carne Cría<br>
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Carne Engorde<br>
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Doble Proposito<br>
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
				<input type="text" id="terneros" name="terneros" placeholder="0">
			</td>
		</tr>
		<tr>
			<td>
				Terneras
			</td>
			<td>
				<input type="text" id="terneras" name="terneras" placeholder="0" >
			</td>
	</tr>
		<tr>
			<td>
				Novillos
			</td>
			<td>
				<input type="text" id="novillos"  name="novillos" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas
			</td>
			<td>
				<input type="text" id="novillas" name="novillas" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas Pregnadas
			</td>
			<td>
				<input type="text" id="Novillaspregnadas" name="Novillaspregnadas" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Toros
			</td>
			<td>
				<input type="text" id="toros"  name="toros" placeholder="0">
			</td>

	</tr>
		<tr>
			<td>
				Vacas
			</td>
			<td>
				<input type="text" id="vacas" name="vacas" placeholder="0">
			</td>


		</tr>

	</table>



		<input type="submit" name="registrarhato" id="registrarhato" value="Registrar Hato"> 


		



</form>
<br> <br>
<a href="../index.php">Regresar</a>
</body>
</html>