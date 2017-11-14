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
	<title>Area Administrativa de Pasto</title>
	<link rel="stylesheet" href="../../css/style.css">


    <script type="text/javascript">
        function ocultarDatos(){
            document.getElementById('cajaEdi').style="display:none";

            document.getElementById('cajaReg').style="display:block";

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


  <form method="post" enctype="multipart/form-data" action="../business/pastoCorteAction.php">

	<div style="overflow-x:auto;">

		<h1>Gestíon de Pasto Corte </h1>
	 <?php

	  include '../business/pastoCorteBusiness.php';
    $pastoBusiness = new PastoCorteBusiness();

    $pastos = $pastoBusiness->mostrarPastosCorte();
    echo '<table ><tr class="cabeceraTabla">  <td>Nombre de Pasto</td><td colspan="2">Acciones</td> </tr>';

    foreach ($pastos as $current) {
        echo '<tr>';

        echo '<td> '.$current->getNombre().'</td>';

        echo "<td> <button type='button' value='".$current->getId().'-'.$current->getNombre()."-Mod'> Modificar</button> </td>";
        echo '</tr>';
    }
        echo '</table>';

  ?>
</div>
            <br>

            <input onclick="ocultarDatos()" value="Nuevo Pasto Corte" type="button">



            <input type="hidden" name="idCorte" id="idCorte" value="">
            <div id="cajaReg" style="display: none;">
                <p>Agregar </p>
                <label>Pasto Corte: </label><input type="text"  name="corteNombre" id="corteNombre"/><br><br>
                <input type="submit" name="crearCorte" id="crearCorte" value="Guardar">
            </div>

            <div id="cajaEdi" style="display: none;">
                <p>Editar</p>
                <label>Pasto Corte: </label><input type="text"  name="nombreCorte" id="nombreCorte"/><br><br>
                <input name='editarCorte' value="Guardar" type="submit">


            </div>



						<hr>
						<a href="../index.php">Regresar</a>


          </form>
          </div>


    			<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    			<script src="../js/editarPastoCorte.js"></script>
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
