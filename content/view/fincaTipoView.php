<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Tipos de Finca</title>
  <link rel="stylesheet" href="../../css/style.css">

   <script type="text/javascript">
       function ocultarCajas(){
        document.getElementById("cajaInsert").style="display:block";
        document.getElementById("cajaUpdate").style="display:none";


       }
   </script>

   <script type="text/javascript">
    function validarLetras(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        patron =/[A-Za-z\s]/;
        te = String.fromCharCode(tecla);
    return patron.test(te);
    }
 </script>
</head>
<body>
  <div id="cuerpo">


  <form method="post" action="../business/fincaTipoAction.php">

<div style="overflow-x:auto;">
	<h1>Gestíon de tipos de fincas</h1>
 <?php

//<tr class="cabeceraTabla"><td colspan = "3" align = "center"><p>Tipos de Fincas</p></td></tr>
require '../data/tipoFincaData.php';
$temp = new tipoFincaData();
$tipoFinca = $temp->getAllTBTiposFincas();

        echo '<table border = "1"> ';
        echo '<tr class="cabeceraTabla"> <td>Actividad </td> <td>Modificar</td></tr>   ';
        foreach ($tipoFinca as $curren) {
            echo '<tr>';
            echo '<td>'.$curren->getFincaTipoActividad().'</td>';
            echo '<td><button type="button" id = "'.$curren->getId().'" value ="'.$curren->getId().'-'.$curren->getFincaTipoActividad().'-Mod">Modificar</button></td>';

            echo '</tr>';
        }
        echo '</table>';
?>
</dib>

<input  type="button" onclick="ocultarCajas()" value="Agregar Tipo Finca">
        <input type="hidden" id="idTipoFinca" name="idTipoFinca" value="">

            <div id="cajaInsert" style="display: none;">

                <label>Nombre: </label> <input type="text" name="tipofinca"  onkeypress="return validarLetras(event)" ><br>

                <input type="submit" name="crearTipoFinca" id="fincaTipoInser" value="Guardar Datos">
								<a href="fincaTipoView.php"><input type="button" value="Cancelar" ></a>
            </div>
            <div id="cajaUpdate" style="display: none;">

                <label>Nombre: </label> <input type="text" name="tipofincaUpdate"  onkeypress="return validarLetras(event)" id="tipofincaUp" ><br>

                <input type="submit" name="modificarTipoFinca" id="fincaTipoUpd" value="Guardar datos">
								<a href="fincaTipoView.php"><input type="button" value="Cancelar" ></a>
            </div>



    <a href="../index.php"><input type="button" value="Regresar" ></a>

  </form>
</div>
    <?php
    	include_once "../../footer.php";
     ?>
</body>
</html>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="../js/editarTipoFinca.js"></script>

<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
