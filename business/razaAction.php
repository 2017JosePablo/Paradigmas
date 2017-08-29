<?php

require './razaBusiness.php';

//Optener valores de un URLLLL
if (isset($_GET['ideliminar'])){
 
    $idRaza = $_GET['ideliminar'];
    $razaBusiness = new razaBusiness();

    $resultado = $razaBusiness->eliminarTBRaza($idRaza);
        if ($resultado == 1) {

            header("location: ../index.php?sucess=deleted");
        } else {
            header("location: ../index.php?error=dbError");
        }
    } 
    
 if (isset($_POST['crearraza'])) {

    if (isset($_POST['razanombre'])) {
            
        $razanombre = $_POST['razanombre'];

        if (strlen($razanombre)) {

                $raza = new raza('', $razanombre);

                $razaBusiness = new razaBusiness();

                $result = $razaBusiness->insertarTBRaza($raza);
                if ($result == 1) {
                    header("location: ../index.php?success=inserted");
                //     header("location: ../business/juntaAction.php?success=inserted");
                  //  echo "Se inserto";
                } else {
                    header("location: ../index.php?error=inserted");
                    //header("location: ../business/juntaAction.php?error=ErrorBaseDatos");
                }        
        } else {
                header("location: ../index.php?error=inserted");
        //    header("location: ../business/juntaAction.php?error=Campos");
        }
    }
    // Escucha el boton de Buscar una junta
}   

?>