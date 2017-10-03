<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Tipos de Finca</title>
	<link rel="stylesheet" href="">


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

 <?php


require '../data/tipoFincaData.php';
$temp = new tipoFincaData();
$tipoFinca = $temp->getAllTBTiposFincas();

        echo '<table border = "1"> <tr><td colspan = "3" align = "center"><p>Tipos de Fincas</p></td></tr> ';
        echo '<tr> <td>Numero </td> <td>Actividad </td> <td>Modificar</td></tr>   ';
        foreach ($tipoFinca as $curren) {     
            echo '<tr>';
            echo '<td> '.$curren->getId().'</td>'; 
            echo '<td>'.$curren->getFincaTipoActividad().'</td>'; 
            echo '<td><button type="button" id = "'.$curren->getId().'" value ="'.$curren->getId().'-'.$curren->getFincaTipoActividad().'-Mod">Modificar</button></td>'; 
                      
            echo '</tr>';
        }
        echo '</table>';
?>
<br>
<button onclick="ocultarCajas()">Agregar Tipo Finca</button>
<br><br>
    <div>
        
        <form method="post" action="../business/fincaTipoAction.php">
        <input type="hidden" id="idTipoFinca" name="idTipoFinca" value="">

            <div id="cajaInsert" style="display: none;">
                <p>Insertar Actividad</p>
                <label>Nombre: </label> <input type="text" name="tipofinca"  onkeypress="return validarLetras(event)" ><br>
                <br>
                <button type="submit" name="crearTipoFinca" id="fincaTipoInser">Crear Tipo</button>
            </div>
            <div id="cajaUpdate" style="display: none;">
                <p>Actualizar Actividad</p>
                <label>Nombre: </label> <input type="text" name="tipofincaUpdate"  onkeypress="return validarLetras(event)" id="tipofincaUp" ><br>
                <br>
                <button type="submit" name="modificarTipoFinca" id="fincaTipoUpd">Actualizar Tipo</button> 
            </div>
        </form>
    </div>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarTipoFinca.js"></script>
    <a href="../index.php">Regresar</a>
</body>
</html>
