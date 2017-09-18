<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Hatos</title>
	<link rel="stylesheet" href="">

    <link rel="stylesheet" type="text/css" href="../css/diseno.css">
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <body>

    <p id="notificacionSocio" style="color: red" ></p>



<?php
    if (isset($_GET['error'])) {
        if (isset($_GET['error']) =='userexits') {
            echo "<p style='color:red'><strong> El Socio a ingresar ya esta registrado! </strong></p>";
        }
    }
    
?>




  <!-- <form method="post" enctype="multipart/form-data" action="../business/socioAction.php"> -->
    
    <?php
 
    require '../business/socioBusiness.php';


    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();


    echo '<table border ="1"><tr><td align = "center" colspan = "7">Informacion Socio</td></tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td align = "center" colspan="3">Acciones</td> </tr>';

    foreach ($socios as $current) {     
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
       

        //echo '<td> <a href="../business/socioAction.php?ideliminar='.$current->getCedula().'"> Eliminar</a> </td>';
        echo "<td> <button type='submit' id='modificar-submit' value='".$current->getCedula()."-Ver'>Registrar Hato</button></td>";
        //echo '<td> <a href=""> Eliminar</a> </td>';
        //echo '<td> <a href=""> Modificar</a> </td>';
        echo '</tr>';
    }
    echo '</table>';

             //name='.$current->getIdTBJunta().'

    ?>



    <table>
            <tr>
                <td>
                    Terneros
                </td>
        
                <td>
                    <input type="text" id="terneros" name="terneros" placeholder="0">
                </td>
            </tr>
            <tr>
                <td>
                    Terneras
                </td>
                <td>
                    <input type="text" id="terneras" name="terneras" placeholder="0" >
                </td>
        </tr>
            <tr>
                <td>
                    Novillos
                </td>
                <td>
                    <input type="text" id="novillos"  name="novillos" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas
                </td>
                <td>
                    <input type="text" id="novillas" name="novillas" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas Pregnadas
                </td>
                <td>
                    <input type="text" id="novillaspregnadas" name="novillaspregnadas" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Toros
                </td>
                <td>
                    <input type="text" id="toros"  name="toros" placeholder="0">
                </td>

        </tr>
            <tr>
                <td>
                    Vacas
                </td>
                <td>
                    <input type="text" id="vacas" name="vacas" placeholder="0">
                </td>


            </tr>

        </table>

  

     <?php
     
    
            include '../business/razaBusiness.php';
            $razaBusiness = new razaBusiness();
            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table border = "1"> <tr>  <td align = "center" >Listado de razas </td> </tr><tr><td >Nombre de la Raza</td></tr>';

            foreach ($todasRazas as $current) {     
                echo '<tr>';

               // echo '<td>  '.$current->getIdRaza() . ' </td>';
                //echo '<td> '.$current->getNombreRaza().'</td>';

                //echo '<td> <a href="../business/razaAction.php?ideliminar='.$current->getIdRaza().'"> Eliminar</a> </td>';

                 //echo "<td> <a href='' onclick=loadJunta('".$current->getIdRaza()."') > Modificar</a> </td>";


                echo '<td> <input type="checkbox" id="'.$current->getIdRaza().'" value="'.$current->getIdRaza().'">'.$current->getNombreRaza().'</td>';

                echo '</tr>';
            }
                echo '</table>';

                 
            


?>

            <input type="submit" name="registrarhato" id="registrarhato" value="Registrar Hato"> 
</form>







    <a href="../index.php">Regresar</a>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="../js/editarHato.js"></script>

</body>
</html>
