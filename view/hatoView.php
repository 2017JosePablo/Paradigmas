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
	<title>Area Administrativa de Hatos</title>
	<link rel="stylesheet" href="../css/diseno.css">

    <link rel="stylesheet" type="text/css" href="../css/diseno.css">




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <script type="text/javascript">
        function soloNumeros(e){
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8){
                  return true;
              }
              patron =/[0-9]/;
              tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }


				function ocultarEspacios(id,id2){
				    document.getElementById(id).style="display:none";
				    document.getElementById(id2).style="display:none";
				}
				function verEspacios(id1,id2){
				    document.getElementById(id1).style="display:block";
				    document.getElementById(id2).style="display:block";
				}




    </script>

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
							 $('#fechaTuberculosis').datepicker();
							 $('#fechaBrusela').datepicker();

					 })
				}
		 </script>



    <body>

    <p id="notificacionSocio" style="color: red" ></p>

<?php
    if (isset($_GET['error'])) {
        if (isset($_GET['error']) =='userexits') {
            echo "<p style='color:red'><strong>No se ha podido registrar el Hato </strong></p>";
        }
    }

?>
<h1>Gestíon de Hato</h1>
<h2>Informacion Socio</h2>
<h3 class="informacionUsuario">Si desconoce algun valor o cantidad, ingrese 0</h3></p>
<?php
require '../business/socioBusiness.php';


$socioBusiness = new socioBusiness();
$socios = $socioBusiness->obtenerTodosTBSocio();


echo '<table><tr class="cabeceraTabla"><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td align = "center" colspan="3">Acciones</td> </tr>';

foreach ($socios as $current) {

    echo '<tr>';
    echo '<td> '.$current->getNombre().'</td>';
    echo '<td> '.$current->getPrimerApellido() .' </td>';
    echo '<td> '.$current->getSegundoApellido().' </td>';

    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Reg'>Registrar Hato</button></td>";
    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Ver'>Ver hato</button></td>";
    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Mod'>Editar Hato</button></td>";

    echo '</tr>';

}
echo '</table>';

         //name='.$current->getIdTBJunta().'

?>
<br><br>
<form id="frm" method="post" enctype="multipart/form-data" action="../business/hatoAction.php">

<input type="hidden" name="socioId" value="" id="socioId">

<input type="hidden" name="razas" value="" id="razas">

<div id="cajaHato" style="display: none;">


    <table>
      <tr  class="cabeceraTabla">
        <td>
          Animal
        </td>
        <td>
          Promedio de edad
        </td>
        <td>
          Cantidad
        </td>
      </tr>

            <tr>
                <td>
                    Terneros
                </td>

                <td>
                    0-6 meses.
                </td>

                <td>
                    <input type="text" id="terneros" name="terneros" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>
                <td>
                    Terneras
                </td>
                <td>
                    0-6 meses.
                </td>
                <td>
                    <input type="text" id="terneras" name="terneras" onkeypress="return soloNumeros(event)" placeholder="0" >
                </td>
        </tr>
            <tr>
                <td>
                    Novillos
                </td>
                <td>
                    6-18 meses.
                </td>
                <td>
                    <input type="text" id="novillos"  name="novillos" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas
                </td>
                <td>
                    6-Preñez.
                </td>
                <td>
                    <input type="text" id="novillas" name="novillas" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas Pregnadas
                </td>
                <td>

                </td>
                <td>
                    <input type="text" id="novillaspregnadas" name="novillaspregnadas" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Toros en servicio
                </td>
                <td>

                </td>
                <td>
                    <input type="text" id="torosServicio"  name="torosServicio" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                  <td>
                    Toros engorde
                </td>
                <td>
                    18 meses -venta.
                </td>
                <td>
                    <input type="text" id="torosEngorde"  name="torosEngorde" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>
                <td>
                    Vacas Cria
                </td>
                <td>

                </td>
                <td>
                    <input type="text" id="vacasCria" name="vacasCria" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>

                <td>
                    Vacas Engorde
                </td>
                <td>

                </td>
                <td>
                    <input type="text" id="vacasEngorde" name="vacasEngorde" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>

        </table>
    </div>




    <div id="cajaListaRazas" style="display: none;">
        <p>Razas</p>

        <div id='listadoRazas'>
        </div>
    </div>
<br><br>
    <div id = 'cajaRazas' style="display: none;">


     <?php
            include '../business/razaBusiness.php';
            $razaBusiness = new razaBusiness();
            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table > <tr>  <td align = "center" >Listado de razas </td> ';

            foreach ($todasRazas as $current) {
                echo '<tr>';
                echo '<td> <input type="checkbox" name="checkbox" id="'.$current->getIdRaza().'" value="'.$current->getIdRaza().'">'.$current->getNombreRaza().'</td>';

                echo '</tr>';
            }
                echo '</table>';
    ?>

		<br><br>
		<p>Examen de brucelas</p>
		<p>Esta Vigente?</p>
		<input type="radio" name='radioBrusela' onclick="verEspacios('fechaBruc','labelBru')" value="1" checked > Si<br>
		<input type="radio" name="radioBrusela"  onclick="ocultarEspacios('fechaBruc','labelBru')" value="2">No
		<p id="labelBru">Fecha de Aplicacion del Examen de Brucelas  <h3 class="informacionUsuario">(m/d/A)</h3></p>
		<input type="date" name="fechaBrusela" id="fechaBrusela">
		<br><br>
		<p>Examen tuberculosis</p>
		<p>Esta Vigente?</p>
		<input type='radio' name='radioTuberculosis' onclick="verEspacios('fechaTuber','labelTuber')" value='1' checked="checked" /> Si<br>
		<input type="radio" name="radioTuberculosis" onclick="ocultarEspacios('fechaTuber','labelTuber')"  value="2">No
		<p id="labelTuber">Fecha de Aplicacion de Examen de Tuberculosis <h3 class="informacionUsuario">(m/d/A)</h3></p>
		<input type="date" name="fechaTuberculosis" id="fechaTuberculosis">

    </div>

    <div  id="btnSubmit" style="display: none;">
			<hr>
        <button type="submit" name="registrarhato" id="registrarhato" value="registrar" >Registrar Datos</button>
				<a href="hatoView.php"><input type="button" value="Cancelar" ></a>
    </div>
    <div id="btnSubmitMod" style="display: none;">
			<hr>
        <button type="submit" name="hatoMod" id="hatoMod" value="hatoMod" >Actualizar Datos</button>
				<a href="hatoView.php"><input type="button" value="Cancelar" ></a>
    </div>
</form>
<hr>
    <a href="../index.php">Regresar</a>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarHato.js"></script>
    <?php
    	include_once "piePaginaView.php";
     ?>
</body>
</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
