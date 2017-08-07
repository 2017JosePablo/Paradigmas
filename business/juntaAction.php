<?php
include './juntaBusiness.php';
include '../domain/junta.php';

//if (isset($_POST['create'])) {
  /*     if (isset($_POST['idjunta']) && isset($_POST['presidentejunta']) && isset($_POST['vicepresidentejunta']) &&
     isset($_POST['tesorerojunta']) && isset($_POST['secretariojunta'])
            && isset($_POST['vocal1junta']) && isset($_POST['vocal2junta']) && 
            isset($_POST['vocal3junta'])) {
            
        $idjunta = $_POST['idjunta'];
        $presidentejunta = $_POST['presidentejunta'];
        $vicepresidentejunta = $_POST['vicepresidentejunta'];
        $tesorerojunta = $_POST['tesorerojunta'];
        $secretariojunta = $_POST['secretariojunta'];
        $vocal1junta = $_POST['vocal1junta'];
        $vocal2junta = $_POST['vocal2junta'];
        $vocal3junta = $_POST['vocal3junta'];
*/
        $idjunta = "Junta01";
        $presidentejunta = "Luis GUI";
        $vicepresidentejunta = "Laura";
        $tesorerojunta = "Carlos";
        $secretariojunta = "Pablo";
        $vocal1junta = "Adan";
        $vocal2junta = "Cristian";
        $vocal3junta = "Marcos";


        if (strlen($idjunta) > 0 && strlen($presidentejunta) > 0 && strlen($vicepresidentejunta) > 0 
                && strlen($tesorerojunta) > 0 && strlen($secretariojunta) > 0 
                && strlen($vocal1junta) > 0  && strlen($vocal2junta) > 0 && strlen($vocal3junta) > 0) {

                $junta = new Junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta,
                 $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);


                $juntaBusiness = new JuntaBusiness();

                $result = $juntaBusiness->insertTBJunta($junta);

                if ($result == 1) {
                   // header("location: ../view/juntaView.php?success=inserted");
                    echo "Se inserto";
                } else {
                    //header("location: ../view/juntaView.php?error=dbError: ");
                    echo "Error en la Base datos:  ".$result;
                }
           
        } else {
           // header("location: ../view/juntaView.php?error=emptyField");
            echo "Campos repetidos";
        }
    
//}


?>