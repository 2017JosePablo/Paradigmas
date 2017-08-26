<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de las Juntas</title>
	<link rel="stylesheet" href="">


    <script type="text/javascript">
        function loadJunta(idjunta) {

     //   if (str.length == 0) {
        //document.getElementById("txtHint").innerHTML = "";
       // return;
    //} else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Aqui estoy");
                document.getElementById("txtHint").innerHTML = this.responseText;


            }
        };
        xmlhttp.open("post", "../business/juntaAction.php?idUpdate="+idjunta, true);
        xmlhttp.send();
    }

     
        }

    </script>
</head>
<body>

<input type="text" id="txtHint">

   
   <form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">
	 <?php
 
	 include '../business/juntaBusiness.php';
            $juntaBusiness = new JuntaBusiness();
            $allJuntas = $juntaBusiness->obtenerTodosTBHato();
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
                echo '<td> <a href="../business/juntaAction.php?ideliminar='.$current->getIdTBJunta().'"> Eliminar</a> </td>';
                 echo "<td> <a href='' onclick=loadJunta('".$current->getIdTBJunta()."') > Modificar</a> </td>";
              //  echo '<td> <a href="" onclick=loadJunta(123) "> Modificar</a> </td>';
              //  echo '<td> <a href="" onclick="> Modificar</a> </td>';
                echo '</tr>';
            }
                echo '</table>';

                 //name='.$current->getIdTBJunta().'
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
                     <input type="submit" value="Crear Junta" name="crear" id="crear"/><p>

                    
            </form>
            
          



	
	<a href="../index.php">Regresar</a>
</body>
</html>