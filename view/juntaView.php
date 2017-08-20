<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de las Juntas</title>
	<link rel="stylesheet" href="">
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">
	 <?php

	 include '../business/juntaBusiness.php';
            $juntaBusiness = new JuntaBusiness();
            $allJuntas = $juntaBusiness->getAllTBJunta();
            echo '<table> <tr><td>Id</td>  <td>Presidiente</td><td>Vicepresidente</td><td>Tesorero</td><td>Secretario</td><td>Vocal 1</td><td>Vocal 2</td> <td>Vocal 3</td> <td colspan="2">Acciones</td> </tr>';
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
                  echo '<td> <input type="submit" value="Actualizar" name="update" id="update"/></td>';
                  echo '<td>  <input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
                echo '</tr>';
            }
                echo '</table>';
            ?>
</form>

            <form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">
                
                    
                   <p>Id Junta: </p> <input required type="text" name="idjunta" id="idjunta"/><p>

                   <p>Presidente</p> <input required type="text" name="presidentejunta" id="presidentejunta"/><p>

                    <p>VicePresidente</p> <input required type="text" name="vicepresidentejunta" id="vicepresidentejunta"/><p>

                     <p>Tesorero</p><input required type="text" name="tesorerojunta" id="tesorerojunta"/><p>
                    <p>Secretario</p><input required type="text" name="secretariojunta" id="secretariojunta"/><p>

                     <p>Vocal1</p><input required type="text" name="vocal1junta" id="vocal1junta"/><p>

                     <p>Vocal3</p><input required type="text" name="vocal2junta" id="vocal2junta"/><p>

                     <p>Vocal3</p><input required type="text" name="vocal3junta" id="vocal3junta"/><p>
                     <input type="submit" value="Crear Junta" name="create" id="create"/><p>

                    
            </form>
            
          



	
	<a href="../index.php">Regresar</a>
</body>
</html>