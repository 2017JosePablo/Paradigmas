<?php

require './juntaBusiness.php';

//Optener valores de un URLLLL
if (isset($_GET['idDelete'])){
 
    $idJunta = $_GET['idDelete'];
    $juntaBusiness = new JuntaBusiness();
    $result = $juntaBusiness->deleteTBJunta($idJunta);
        if ($result == 1) {

            header("location: ../view/juntaView.php?success=deleted");
        } else {
            header("location: ../view/juntaView.php?error=dbError");
        }
    } else if (isset($_GET['idUpdate'])){
        
            return "DAN";

        }
    

    


//include './juntaBusiness.php';
//Si se preciona el boton de Actualizar
if (isset($_POST['update'])) {
//Validar si los campos existe
    if (isset($_POST['idjunta']) && isset($_POST['presidentejunta']) && isset($_POST['vicepresidentejunta']) && isset($_POST['tesorerojunta']) && isset($_POST['secretariojunta'])
            && isset($_POST['vocal1junta']) && isset($_POST['vocal2junta']) && isset($_POST['vocal3junta'])) {
        //capturar los datos que vienen de la interfaz
        $idjunta = $_POST['idjunta'];
        $presidentejunta = $_POST['presidentejunta'];
        $vicepresidentejunta = $_POST['vicepresidentejunta'];
        $tesorerojunta = $_POST['tesorerojunta'];
        $secretariojunta = $_POST['secretariojunta'];
        $vocal1junta = $_POST['vocal1junta'];
        $vocal2junta = $_POST['vocal2junta'];
        $vocal3junta = $_POST['vocal3junta'];
     
            //funcion para saber la longitud del atributo
        if (strlen($idjunta) > 0 && strlen($presidentejunta) > 0 && strlen($vicepresidentejunta) > 0 && strlen($tesorerojunta) > 0  && strlen($secretariojunta) > 0 && strlen($vocal1junta) > 0 
                && strlen($vocal2junta) > 0 && strlen($vocal3junta) > 0) {
            // funcion para saber si es un numero o no
            if (!is_numeric($idjunta)) {
                //creo el objeto
                $junta = new junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta, $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);
                //creo una instancia
                $juntaBusiness = new JuntaBusiness();
                //igualo al valor que devolvio el sql
                $result = $juntaBusiness->updateTBJunta($junta);
                if ($result == 1) {
                    header("location: ../view/juntaView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../view/juntaView.php?error=dbError");
                }
            } else {
                header("location: ../view/juntaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/juntaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/juntaView.php?error=error");
    }


    ///////////////////////METODO PARA ELIMINAR
    ////Parte para insertar a la base de datos un nueva Junta ....
} else if (isset($_POST['create'])) {

    if (isset($_POST['idjunta']) && isset($_POST['presidentejunta']) && isset($_POST['vicepresidentejunta']) && isset($_POST['tesorerojunta'])
            && isset($_POST['secretariojunta']) && isset($_POST['vocal1junta']) && isset($_POST['vocal2junta'])  && isset($_POST['vocal3junta'])) {
            
        $idjunta = $_POST['idjunta'];
        $presidentejunta = $_POST['presidentejunta'];
        $vicepresidentejunta = $_POST['vicepresidentejunta'];
        $tesorerojunta = $_POST['tesorerojunta'];
        $secretariojunta = $_POST['secretariojunta'];
        $vocal1junta = $_POST['vocal1junta'];
        $vocal2junta = $_POST['vocal2junta'];
        $vocal3junta = $_POST['vocal3junta'];

        if (strlen($idjunta) > 0 && strlen($presidentejunta) > 0 && strlen($vicepresidentejunta) > 0 
                && strlen($tesorerojunta) > 0 && strlen($secretariojunta) > 0 
                && strlen($vocal1junta) > 0  && strlen($vocal2junta) > 0 && strlen($vocal3junta) > 0) {
                $junta = new Junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta,
                $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);
                $junta = new junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta, $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);
                $juntaBusiness = new JuntaBusiness();
                $result = $juntaBusiness->insertTBJunta($junta);
                if ($result == 1) {
                    header("location: ../view/juntaView.php?success=inserted");
                //     header("location: ../business/juntaAction.php?success=inserted");
                  //  echo "Se inserto";
                } else {
                    header("location: ../view/juntaView.php?error=dbError: ");
                    //header("location: ../business/juntaAction.php?error=ErrorBaseDatos");
                }        
        } else {
            header("location: ../view/juntaView.php?error=emptyField");
        //    header("location: ../business/juntaAction.php?error=Campos");
        }
    }
    // Escucha el boton de Buscar una junta
} else if (isset($_POST['consult'])) {
        $juntaBusiness = new JuntaBusiness();
        $result = $juntaBusiness->getAllTBJunta();
        if ($result == 1) {
             header("location: ../view/juntaView.php?success=inserted");
        } else {
                   header("location: ../view/juntaView.php?success=inserted");
            }
        } 
    

?>