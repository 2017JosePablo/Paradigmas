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
                    header("location: ../index.php?success=insertedRaza");
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
}else    if (isset($_POST['modificarRaza'])) {

    if (isset($_POST['razanombreMod'])) {

        $idraza = $_POST['idRaza'];    
        $razanombre = $_POST['razanombreMod'];


        if (strlen($razanombre)) {

                $raza = new raza($idraza, $razanombre);

                $razaBusiness = new razaBusiness();

                $result = $razaBusiness->modificarTBRaza($raza);
                if ($result == 1) {
                    header("location: ../index.php?success=updatedRaza");
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