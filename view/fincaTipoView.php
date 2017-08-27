<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Tipos de Finca</title>
	<link rel="stylesheet" href="">


   
</head>
<body>

<p>Tipos de Fincas</p>

 <form method="post" enctype="multipart/form-data" >
             <?php
         
         
            require '../data/tipoFincaData.php';
            $temp = new tipoFincaData();
            $tipoFinca = $temp->getAllTBTiposFincas();

     
                    echo '<table>';
                    foreach ($tipoFinca as $curren) {     
                        echo '<tr>';
                         echo '<td> <input type="radio" name="tipofinca" value='.$curren->getId().'</td>'; 

                        echo '<td>'.$curren->getFincaTipoActividad().'</td>'; 
                                  
                        echo '</tr>';
                    }
                        echo '</table>';

                        

            ?>
            <br><br><br>
       </form>

<form method="post" action="../business/fincaTipoAction.php">
    Tipo de Finca: <input type="text" name="tipofinca" required=""><br>

<input type="submit" value="Agregar Tipo" name="fincatipo" id="fincatipo"/><p>

</form>
 

    <a href="../index.php">Regresar</a>
</body>
</html>
