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
	<title>Area Administrativa de las Juntas</title>
  <link rel="stylesheet" href="../../css/style.css">
    <meta charset="utf-8">

    <script type="text/javascript">

        function setCamposRegistro(id_caja){
            var campos = "<table> <tr>";
            campos+="<td><input type='text' name='sociocedula' id='sociocedula'  required></td>";
            campos+="<td><input type='text' name='socionombre' id='socionombre'  required></td>";
            campos+="<td><input type='text' name='socioprimerapellido' id='socioprimerapellido'  required> </td>";
            campos+="<td><input type='text' name='sociosegundoapellido' id='sociosegundoapellido'  required>";
            campos+="</td><td><input type='text' name='sociotelmovil' id='sociotelmovil'></td>";
            campos+="<td><input type='email'  required name='sociocorreo' id='sociocorreo'></td></tr>";
            campos+="<table>"

            return campos;
        }

				function anadirJunta() {
						document.getElementById('anadirJunta').style="display:block";
				}
</script>
</head>
<body>

  <div id="cuerpo">
  <form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">

	<h1>Junta Administrativa de ASOTURGA</h1>

	 <?php
	 include '../business/juntaBusiness.php';
            $juntaBusiness = new JuntaBusiness();
            $allJuntas = $juntaBusiness->obtenerTodosTBJunta();
            echo '<table> <tr class="cabeceraTabla"><td>Codigo de Junta</td>  <td>Presidiente</td><td>Vicepresidente</td><td>Tesorero</td><td>Secretario</td><td>Vocal 1</td><td>Vocal 2</td> <td>Vocal 3</td> <td colspan="2">Acciones</td> </tr>';
            foreach ($allJuntas as $current) {
                echo '<tr>';
                echo '<td>  '.$current->getIdTBJunta() . ' </td>';
                echo '<td> '.$current->getPresidenteTBJunta().'</td>';
                echo '<td> '.$current->getVicepresidenteJunta().' </td>';
                echo '<td> '.$current->getTesoreroJunta() .
                ' </td>';
                echo '<td> '.$current->getSecretarioJunta().' </td>';
                echo '<td> '.$current->getVocal1Junta().'</td>';
                echo '<td> '.$current->getVocal2Junta().'</td>';
                echo '<td> '.$current->getVocal3Junta().'</td>';
                echo '<td> <a href="../business/juntaAction.php?ideliminar='.$current->getIdTBJunta().'"> Eliminar</a> </td>';
                 //echo "<td> <a href='' onclick=loadJunta('".$current->getIdTBJunta()."') > Modificar</a> </td>";
              //  echo '<td> <a href="" onclick=loadJunta(123) "> Modificar</a> </td>';
              //  echo '<td> <a href="" onclick="> Modificar</a> </td>';
                echo '</tr>';
            }
                echo '</table>';

                 //name='.$current->getIdTBJunta().'
            ?>

  
				<input onclick="anadirJunta()" type="button" value="Agragar Junta">
				<div id= "anadirJunta" style="display:none">

            <?php

                include '../business/socioBusiness.php';
                $socioBusiness = new socioBusiness();

                $socios = $socioBusiness->obtenerTodosTBSocio();


                echo "<p>Id Junta: </p> <input required type='text' name='idjunta' id='idjunta'/><p>";

                echo "<p>Presidente:</p>";
                echo "<select class='form-control' id='listadoPresidente' name = 'listadoSocios'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()." ".$current->getPrimerApellido()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaPresidente-P' >Agregar Colaborador</button>";

                echo "<div id= 'cajaPresidente'> </div>";

                echo "<p>Vicepresidente:</p>";

                echo "<select class='form-control' id='listadoVicepresidente' name = 'listadoVicepresidente'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaViveprecidente-Vi' >Agregar Colaborador</button>";

                echo "<div id= 'cajaViveprecidente'> </div>";

                echo "<p>Tesorero:</p>";

                 echo "<select class='form-control' id='listadoTesorero' name = 'listadoTesorero'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaTesorero-T' >Agregar Colaborador</button>";

                echo "<div id= 'cajaTesorero'> </div>";

                echo "<p>Secretaria/o:</p>";

                 echo "<select class='form-control' id='listadoSecretario' name = 'listadoSecretario'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaSecre-S' >Agregar Colaborador</button>";

                echo "<div id= 'cajaSecre'> </div>";




                echo "<p>Vocal 1:</p>";

                 echo "<select class='form-control' id='listadoV1' name = 'listadoV1'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaV1-V1' >Agregar Colaborador</button>";

                echo "<div id= 'cajaV1'> </div>";

                echo "<p>Vocal 2:</p>";

                 echo "<select class='form-control' id='listadoV2' name = 'listadoV2'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaV2-V2' >Agregar Colaborador</button>";

                echo "<div id= 'cajaV2'> </div>";

                 echo "<p>Vocal 3:</p>";


                 echo "<select class='form-control' id='listadoV3' name = 'listadoV3'  >";

                foreach ($socios as $current) {

                    echo "<option>".$current->getNombre()."</option>";
                }

                echo '</select>';

                echo "<button type = 'button' value = 'cajaV3-V3' >Agregar Colaborador</button>";

                echo "<div id= 'cajaV3'> </div>";


            ?>

            <input type="submit" name="crear" value="Registrar Datos">
						<a href="juntaView.php"><input type="button" value="cancelar"></a>
            </br>


			</div>
	      <a href="../index.php"><input type="button" name="" value="Regresar"></a>
    </form>

  </div>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarJunta.js"></script>

    <?php
    	  include_once "../../footer.php";
     ?>
</body>

</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
