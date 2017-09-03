<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Tipos de Finca</title>
	<link rel="stylesheet" href="">


   
</head>
<body>










 <form method="post" enctype="multipart/form-data" >
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

                        echo '<td><input type="submit" id = "'.$curren->getId().'" value ="Modificar"></td>'; 
                                  
                        echo '</tr>';
                    }
                        echo '</table>';
            ?>
            <br><br><br>
       </form>

    <div>
        <p>Insertar o modificar una actividad</p>
        <form method="post" action="../business/fincaTipoAction.php">
            <label>Nombre: </label> <input type="text" name="tipofinca" required=""><br>
            <br>
        <input type="submit" value="Agregar el tipo de actividad" name="fincatipo" id="fincatipo"/><p>

        </form>
    </div>

    <a href="../index.php">Regresar</a>
</body>
</html>
