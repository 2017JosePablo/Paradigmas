<?php

include './juntaBusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['idjunta']) && isset($_POST['presidentejunta']) && isset($_POST['vicepresidentejunta']) && isset($_POST['tesorerojunta']) && isset($_POST['secretariojunta'])
            && isset($_POST['vocal1junta']) && isset($_POST['vocal2junta']) && isset($_POST['vocal3junta'])) {
            
        $idjunta = $_POST['idjunta'];
        $presidentejunta = $_POST['presidentejunta'];
        $vicepresidentejunta = $_POST['vicepresidentejunta'];
        $tesorerojunta = $_POST['tesorerojunta'];
        $secretariojunta = $_POST['secretariojunta'];
        $vocal1junta = $_POST['vocal1junta'];
        $vocal2junta = $_POST['vocal2junta'];
        $vocal3junta = $_POST['vocal3junta'];
        

        if (strlen($idjunta) > 0 && strlen($presidentejunta) > 0 && strlen($vicepresidentejunta) > 0 && strlen($tesorerojunta) > 0  && strlen($secretariojunta) > 0 && strlen($vocal1junta) > 0 
                && strlen($vocal2junta) > 0 && strlen($vocal3junta) > 0) {
            if (!is_numeric($idjunta)) {
                $junta = new junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta, $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);

                $juntaBusiness = new JuntaBusiness();

                $result = $bullBusiness->updateTBJunta($junta);
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
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idJunta'])) {

        $idJunta = $_POST['idJunta'];

        $juntaBusiness = new JuntaBusiness();
        $result = $juntaBusiness->deleteTBJunta($idJunta);

        if ($result == 1) {
            header("location: ../view/juntaView.php?success=deleted");
        } else {
            header("location: ../view/juntaView.php?error=dbError");
        }
    } else {
        header("location: ../view/juntaView.php?error=error");
    }

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


                $junta = new junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta, $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);

                $juntaBusiness = new JuntaBusiness();

                $result = $juntaBusiness->insertTBJunta($junta);

                if ($result == 1) {
                    header("location: ../view/juntaView.php?success=inserted");
                } else {
                    header("location: ../view/juntaView.php?error=dbError");
                }
           
        } else {
            header("location: ../view/juntaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/juntaView.php?error=errorCamposNoConocidos");
    }
}