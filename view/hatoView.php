
<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Hatos</title>
	<link rel="stylesheet" href="">

    <link rel="stylesheet" type="text/css" href="../css/diseno.css">
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <script type="text/javascript">
        function soloNumeros(e){
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8){
                  return true;
              }
              patron =/[0-9]/;
              tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }


    </script>


    <body>

    <p id="notificacionSocio" style="color: red" ></p>

<?php
    if (isset($_GET['error'])) {
        if (isset($_GET['error']) =='userexits') {
            echo "<p style='color:red'><strong> El Socio a ingresar ya esta registrado! </strong></p>";
        }
    }
    
?>   
    
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
   
    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Reg'>Registrar Hato</button></td>";
    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Ver'>Ver hato</button></td>";
    echo "<td> <button type='button' id='modificar-submit' value='".$current->getSocioId()."-Mod'>Editar Hato</button></td>";
  
    echo '</tr>';
    
}
echo '</table>';

         //name='.$current->getIdTBJunta().'

?>
<br><br>
<form id="frm" method="post" enctype="multipart/form-data" action="../business/hatoAction.php"> 

<div id="cajaHato" style="display: none;">
    

    <table>
            <tr>
                <td>
                    Terneros
                </td>
        
                <td>
                    <input type="text" id="terneros" name="terneros" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>
                <td>
                    Terneras
                </td>
                <td>
                    <input type="text" id="terneras" name="terneras" onkeypress="return soloNumeros(event)" placeholder="0" >
                </td>
        </tr>
            <tr>
                <td>
                    Novillos
                </td>
                <td>
                    <input type="text" id="novillos"  name="novillos" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas
                </td>
                <td>
                    <input type="text" id="novillas" name="novillas" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Novillas Pregnadas
                </td>
                <td>
                    <input type="text" id="novillaspregnadas" name="novillaspregnadas" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                <td>
                    Toros en servicio
                </td>
                <td>
                    <input type="text" id="torosServicio"  name="torosServicio" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
        </tr>
            <tr>
                  <td>
                    Toros engorde
                </td>
                <td>
                    <input type="text" id="torosEngorde"  name="torosEngorde" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>
                <td>
                    Vacas Cria
                </td>
                <td>
                    <input type="text" id="vacasCria" name="vacasCria" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>
            <tr>
                
                <td>
                    Vacas Engorde
                </td>
                <td>
                    <input type="text" id="vacasEngorde" name="vacasEngorde" onkeypress="return soloNumeros(event)" placeholder="0">
                </td>
            </tr>

        </table>
    </div>
<br><br>
  
    <div id = 'cajaRazas' style="display: none;">
        
    
     <?php
            include '../business/razaBusiness.php';
            $razaBusiness = new razaBusiness();
            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table > <tr>  <td align = "center" >Listado de razas </td> ';

            foreach ($todasRazas as $current) {     
                echo '<tr>';
                echo '<td> <input type="checkbox" name="checkbox" id="'.$current->getIdRaza().'" value="'.$current->getIdRaza().'">'.$current->getNombreRaza().'</td>';

                echo '</tr>';
            }
                echo '</table>';
    ?>

    </div>
    <div id="btnSubmit" style="display: none;">
        <input type="submit" name="registrarhato" id="registrarhato" value="Registrar Hato"> 
    </div>
    
</form>






    <a href="../index.php">Regresar</a>

     <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarHato.js"></script>


</body>
</html>
