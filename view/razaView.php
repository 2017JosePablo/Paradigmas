<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Raza</title>
	<link rel="stylesheet" href="">

</head>
<body>   
   <form method="post" enctype="multipart/form-data" action="../business/razaAction.php">
	 <?php
 
	 include '../business/razaBusiness.php';
            $razaBusiness = new razaBusiness();

            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table border = "1"> <tr>  <td align = "center" colspan = "4">Listado de razas </td> </tr><tr><td>Id</td>  <td>Nombre de la Raza</td><td colspan="2">Acciones</td> </tr>';

            foreach ($todasRazas as $current) {     
                echo '<tr>';
                echo '<td>  '.$current->getIdRaza() . ' </td>';
                echo '<td> '.$current->getNombreRaza().'</td>';

                echo '<td> <a href="../business/razaAction.php?ideliminar='.$current->getIdRaza().'"> Eliminar</a> </td>';

                 echo "<td> <a href='' onclick=loadJunta('".$current->getIdRaza()."') > Modificar</a> </td>";

                echo '</tr>';
            }
                echo '</table>';

                 
            ?>
            
        </form>

        <p>Modificando o agregando una raza</p>
            <form method="post" enctype="multipart/form-data" action="../business/razaAction.php">

                     <label>Nombre de la Raza </label><input required type="text" name="razanombre" id="razanombre"/><p>
                     <input type="submit" value="Agregar nueva Raza" name="crearraza" id="crearraza"/><p>

                    
            </form>
            
          

	
	<a href="../index.php">Regresar</a>
</body>
</html>