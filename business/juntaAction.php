<?php

require './juntaBusiness.php';

//Optener valores de un URLLLL
if (isset($_GET['ideliminar'])){
 
    $idJunta = $_GET['ideliminar'];
    $juntaBusiness = new JuntaBusiness();
    $resultado = $juntaBusiness->eliminarTBJunta($idJunta);
        if ($resultado == 1) {

            header("location: ../view/juntaView.php?success=deleted");
        } else {
            header("location: ../view/juntaView.php?error=dbError");
        }
    } else if (isset($_GET['idactualizar'])){
        
            return "DAN";

        }
    


//include './juntaBusiness.php';
//Si se preciona el boton de Actualizar
if (isset($_POST['actualizar'])) {
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
                $result = $juntaBusiness->actualizarTBJunta($junta);
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
} else if (isset($_POST['crear'])) {

    require 'socioBusiness.php';
    require_once '../domain/socioDireccion.php';
    $socioBusiness = new socioBusiness();

    if (isset($_POST['idjunta']) && isset($_POST['listadoSocios']) && isset($_POST['listadoVicepresidente']) && isset($_POST['listadoTesorero'])
            && isset($_POST['listadoSecretario']) && isset($_POST['listadoV1']) && isset($_POST['listadoV2'])  && isset($_POST['listadoV3'])) {
            
        $idjunta = $_POST['idjunta'];
        $presidentejunta = "";
        $vicepresidentejunta = "";
        $tesorerojunta = "";
        $secretariojunta = "";
        $vocal1junta = "";
        $vocal2junta = "";
        $vocal3junta = "";  

         if(isset($_POST['sociocedulaP'])){
            $presidenteColaborardoCedula=$_POST['sociocedulaP'];
            $presidenteColaborardorNombre=$_POST['socionombreP'];
            $presidenteColaborardorPrimerApellido=$_POST['socioprimerapellidoP'];
            $presidenteColaborardorSegundoApellido=$_POST['sociosegundoapellidoP'];
            $presidenteColaborardorTelMovil=$_POST['sociotelmovilP'];
            $presidenteColaborardorCorreo=$_POST['sociocorreoP'];
         }     




        if(isset($_POST['sociocedulaVi'])){
            $vicepresidenteColaborardoCedula=$_POST['sociocedulaVi'];
            $vicepresidenteColaborardorNombre=$_POST['socionombreVi'];
            $vicepresidenteColaborardorPrimerApellido=$_POST['socioprimerapellidoVi'];
            $vicepresidenteColaborardorSegundoApellido=$_POST['sociosegundoapellidoVi'];
            $vicepresidenteColaborardorTelMovil=$_POST['sociotelmovilVi'];
            $vicepresidenteColaborardorCorreo=$_POST['sociocorreoVi'];
        }

        if(isset($_POST['sociocedulaT'])){
            $tesoreroColaborardoCedula=$_POST['sociocedulaT'];
            $tesoreroColaborardorNombre=$_POST['socionombreT'];
            $tesoreroColaborardorPrimerApellido=$_POST['socioprimerapellidoT'];
            $tesoreroColaborardorSegundoApellido=$_POST['sociosegundoapellidoT'];
            $tesoreroColaborardorTelMovil=$_POST['sociotelmovilT'];
            $tesoreroColaborardorCorreo=$_POST['sociocorreoT'];
        }


        if(isset($_POST['sociocedulaS'])){
            $secretarioColaborardoCedula=$_POST['sociocedulaS'];
            $secretarioColaborardorNombre=$_POST['socionombreS'];
            $secretarioColaborardorPrimerApellido=$_POST['socioprimerapellidoS'];
            $secretarioColaborardorSegundoApellido=$_POST['sociosegundoapellidoS'];
            $secretarioColaborardorTelMovil=$_POST['sociotelmovilS'];
            $secretarioColaborardorCorreo=$_POST['sociocorreoS'];
        }

        if(isset($_POST['sociocedulaV1'])){
            $v1ColaborardoCedula=$_POST['sociocedulaV1'];
            $v1ColaborardorNombre=$_POST['socionombreV1'];
            $v1ColaborardorPrimerApellido=$_POST['socioprimerapellidoV1'];
            $v1ColaborardorSegundoApellido=$_POST['sociosegundoapellidoV1'];
            $v1ColaborardorTelMovil=$_POST['sociotelmovilV1'];
            $v1ColaborardorCorreo=$_POST['sociocorreoV1'];
        }


        if(isset($_POST['sociocedulav2'])){
            $v2ColaborardoCedula=$_POST['sociocedulaV2'];
            $v2ColaborardorNombre=$_POST['socionombreV2'];
            $v2ColaborardorPrimerApellido=$_POST['socioprimerapellidoV2'];
            $v2ColaborardorSegundoApellido=$_POST['sociosegundoapellidoV2'];
            $v2ColaborardorTelMovil=$_POST['sociotelmovilV2'];
            $v2ColaborardorCorreo=$_POST['sociocorreoV2'];
        }


        if(isset($_POST['sociocedulav3'])){
            $v3ColaborardoCedula=$_POST['sociocedulaV3'];
            $v3ColaborardorNombre=$_POST['socionombreV3'];
            $v3ColaborardorPrimerApellido=$_POST['socioprimerapellidoV3'];
            $v3ColaborardorSegundoApellido=$_POST['sociosegundoapellidoV3'];
            $v3ColaborardorTelMovil=$_POST['sociotelmovilV3'];
            $v3ColaborardorCorreo=$_POST['sociocorreoV3'];
        }


    if(isset($presidenteColaborardoCedula)==true && empty($presidenteColaborardoCedula)==false && isset($presidenteColaborardorNombre)==true && empty($presidenteColaborardorNombre)==false && isset($presidenteColaborardorPrimerApellido)==true && empty($presidenteColaborardorPrimerApellido)==false && isset($presidenteColaborardorSegundoApellido)==true && empty($presidenteColaborardorSegundoApellido)==false && isset($presidenteColaborardorTelMovil)==true && empty($presidenteColaborardorTelMovil)==false && isset($presidenteColaborardorCorreo)==true && empty($presidenteColaborardorCorreo)==false){

         
        if($socioBusiness->verificarCedula($presidenteColaborardoCedula)==0){

            $socioP = new Socio('',$presidenteColaborardoCedula,$presidenteColaborardorNombre,$presidenteColaborardorPrimerApellido,$presidenteColaborardorSegundoApellido,$presidenteColaborardorTelMovil,$presidenteColaborardorCorreo,"",
                "", "" , "");

            $resultadoP = $socioBusiness->insertarTBSocio($socioP);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);

            if ($resultadoP ==1) {
                $presidentejunta=$presidenteColaborardorNombre;
                echo "ColaboradorP insertardo"; 

            }else{

                echo "Error al insertar un colaboradorP: ".@$resultadoP;
                //header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
            echo "El colaboradorP ya existe"; 
        }

        


    }else{
       $presidentejunta = $_POST['listadoSocios'];
    }

    if(isset($vicepresidenteColaborardoCedula)==true && empty($vicepresidenteColaborardoCedula)==false && isset($vicepresidenteColaborardorNombre)==true && empty($vicepresidenteColaborardorNombre)==false && isset($vicepresidenteColaborardorPrimerApellido)==true && empty($vicepresidenteColaborardorPrimerApellido)==false && isset($vicepresidenteColaborardorSegundoApellido)==true && empty($vicepresidenteColaborardorSegundoApellido)==false && isset($vicepresidenteColaborardorTelMovil)==true && empty($vicepresidenteColaborardorTelMovil)==false && isset($vicepresidenteColaborardorCorreo)==true && empty($vicepresidenteColaborardorCorreo)==false){

         
        if($socioBusiness->verificarCedula($vicepresidenteColaborardoCedula)==0){

            $socioV = new Socio('',$vicepresidenteColaborardoCedula,$vicepresidenteColaborardorNombre,$vicepresidenteColaborardorPrimerApellido,$vicepresidenteColaborardorSegundoApellido,$vicepresidenteColaborardorTelMovil,$vicepresidenteColaborardorCorreo,"",
                "", "" , "");

            $resultadoV = $socioBusiness->insertarTBSocio($socioV);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoV ==1) { 
                $vicepresidentejunta=$vicepresidenteColaborardorNombre;
                echo "ColaboradorV insertardo"; 
            }else{

                echo "Error al insertar un ColaboradorV: ".@$resultadoV;
               // header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
               echo "El colaboradorV ya existe"; 
        }

       

    }else{
        $vicepresidentejunta = $_POST['listadoVicepresidente'];
    }



    if(isset($tesoreroColaborardoCedula)==true && empty($tesoreroColaborardoCedula)==false && isset($tesoreroColaborardorNombre)==true && empty($tesoreroColaborardorNombre)==false && isset($tesoreroColaborardorPrimerApellido)==true && empty($tesoreroColaborardorPrimerApellido)==false && isset($tesoreroColaborardorSegundoApellido)==true && empty($tesoreroColaborardorSegundoApellido)==false && isset($tesoreroColaborardorTelMovil)==true && empty($tesoreroColaborardorTelMovil)==false && isset($tesoreroColaborardorCorreo)==true && empty($tesoreroColaborardorCorreo)==false){
         
        if($socioBusiness->verificarCedula($tesoreroColaborardoCedula)==0){

            $socioT = new Socio('',$tesoreroColaborardoCedula,$tesoreroColaborardorNombre,$tesoreroColaborardorPrimerApellido,$tesoreroColaborardorSegundoApellido,$tesoreroColaborardorTelMovil,$tesoreroColaborardorCorreo,"",
                "", "" , "");

            $resultadoT = $socioBusiness->insertarTBSocio($socioT);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoT ==1) {
                $tesorerojunta =$tesoreroColaborardorNombre;
                echo "ColaboradorT insertardo";
            }else{
                echo "Error al insertar un ColaboradorT: ".@$resultadoT;
               // header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{

            echo " El ColaboradorT ya existe";
           // header("location: ../view/socioView.php?error=userexits");
        }


    }else{
         $tesorerojunta = $_POST['listadoTesorero'];
    }

     if(isset($secretarioColaborardoCedula)==true && empty($secretarioColaborardoCedula)==false && isset($secretarioColaborardorNombre)==true && empty($secretarioColaborardorNombre)==false && isset($secretarioColaborardorPrimerApellido)==true && empty($secretarioColaborardorPrimerApellido)==false && isset($secretarioColaborardorSegundoApellido)==true && empty($ecretarioColaborardorSegundoApellido)==false && isset($secretarioColaborardorTelMovil)==true && empty($secretarioColaborardorTelMovil)==false && isset($secretarioColaborardorCorreo)==true && empty($secretarioColaborardorCorreo)==false){


        if($socioBusiness->verificarCedula($secretarioColaborardoCedula)==0){

            $socioS = new Socio('',$secretarioColaborardoCedula,$secretarioColaborardorNombre,$secretarioColaborardorPrimerApellido,$secretarioColaborardorSegundoApellido,$secretarioColaborardorTelMovil,$secretarioColaborardorCorreo,"",
                "", "" , "");

            $resultadoS = $socioBusiness->insertarTBSocio($socioS);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoS ==1) {
                $secretariojunta =$secretarioColaborardorNombre;
                echo " ColaboradorS insertardo";
            }else{

                echo "Error al insertar un ColaboradorS: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
            echo "El ColaboradorS ya existe";
            //header("location: ../view/socioView.php?error=userexits");
        }

     
     }else{
       $secretariojunta = $_POST['listadoSecretario']; 
     }


     if(isset($v1ColaborardoCedula)==true && empty($v1ColaborardoCedula)==false && isset($v1ColaborardorNombre)==true && empty($v1ColaborardorNombre)==false && isset($v1ColaborardorPrimerApellido)==true && empty($v1ColaborardorPrimerApellido)==false && isset($v1ColaborardorSegundoApellido)==true && empty($v1ColaborardorSegundoApellido)==false && isset($v1ColaborardorTelMovil)==true && empty($v1ColaborardorTelMovil)==false && isset($v1ColaborardorCorreo)==true && empty($v1ColaborardorCorreo)==false){


        if($socioBusiness->verificarCedula($v1ColaborardoCedula)==0){

            $socioV1 = new Socio('',$v1ColaborardoCedula,$v1ColaborardorNombre,$v1ColaborardorPrimerApellido,$v1ColaborardorSegundoApellido,$v1ColaborardorTelMovil,$v1ColaborardorCorreo,"",
                "", "" , "");

            $resultadoV1 = $socioBusiness->insertarTBSocio($socioV1);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoV1 ==1) {
                $vocal1junta = $v1ColaborardorNombre;
              echo "ColaboradorV1 insertado"; 
            }else{

                echo "Error al insertar un ColaboradorV1: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
            echo "El ColaboradorV1 ya existe";
            //header("location: ../view/socioView.php?error=userexits");
        }

         
     }else{
         $vocal1junta = $_POST['listadoV1'];

     }



     if(isset($v2ColaborardoCedula)==true && empty($v2ColaborardoCedula)==false && isset($v2ColaborardorNombre)==true && empty($v2ColaborardorNombre)==false && isset($v2ColaborardorPrimerApellido)==true && empty($v2ColaborardorPrimerApellido)==false && isset($v2ColaborardorSegundoApellido)==true && empty($v2ColaborardorSegundoApellido)==false && isset($v2ColaborardorTelMovil)==true && empty($v1ColaborardorTelMovil)==false && isset($v2ColaborardorCorreo)==true && empty($v2ColaborardorCorreo)==false){

        if($socioBusiness->verificarCedula($v2ColaborardoCedula)==0){

            $socioV2 = new Socio('',$v2ColaborardoCedula,$v2ColaborardorNombre,$v2ColaborardorPrimerApellido,$v2ColaborardorSegundoApellido,$v2ColaborardorTelMovil,$v2ColaborardorCorreo,"",
                "", "" , "");

            $resultadoV2 = $socioBusiness->insertarTBSocio($socioV2);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoV2 ==1) {
                $vocal2junta = $v2ColaborardorNombre;
             echo "ColaboradorV2 insertardo";  
            }else{

                echo "Error al insertar un ColaboradorV2: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
             echo "El ColaboradorV2 ya existe";
            //header("location: ../view/socioView.php?error=userexits");
        }

        

     }else{
         $vocal2junta = $_POST['listadoV2'];

     }


     if(isset($v3ColaborardoCedula)==true && empty($v3ColaborardoCedula)==false && isset($v3ColaborardorNombre)==true && empty($v3ColaborardorNombre)==false && isset($v3ColaborardorPrimerApellido)==true && empty($v3ColaborardorPrimerApellido)==false && isset($v3ColaborardorSegundoApellido)==true && empty($v3ColaborardorSegundoApellido)==false && isset($v3ColaborardorTelMovil)==true && empty($v3ColaborardorTelMovil)==false && isset($v3ColaborardorCorreo)==true && empty($v3ColaborardorCorreo)==false){


        if($socioBusiness->verificarCedula($v3ColaborardoCedula)==0){

            $socio = new Socio('',$v3ColaborardoCedula,$v3ColaborardorNombre,$v3ColaborardorPrimerApellido,$v3ColaborardorSegundoApellido,$v3ColaborardorTelMovil,$v3ColaborardorCorreo,"",
                "", "" , "");

            $resultadoV3 = $socioBusiness->insertarTBSocio($socioV3);

          //  $socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
            //$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);


            if ($resultadoV3 ==1) {
                $vocal3junta = $v3ColaborardorNombre;
              echo "ColaboradorV3 insertado";
            }else{

                echo "Error al insertar un ColaboradorV3: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }

        }else{
             echo "El ColaboradorV3 ya existe";
            //header("location: ../view/socioView.php?error=userexits");
        }

        


     }else{
          $vocal3junta = $_POST['listadoV3'];
     }
        
    




        if (strlen($idjunta) > 0 && strlen($presidentejunta) > 0 && strlen($vicepresidentejunta) > 0 
                && strlen($tesorerojunta) > 0 && strlen($secretariojunta) > 0 
                && strlen($vocal1junta) > 0  && strlen($vocal2junta) > 0 && strlen($vocal3junta) > 0) {
                $junta = new Junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta,
                $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);
                $junta = new junta($idjunta, $presidentejunta, $vicepresidentejunta, $tesorerojunta, $secretariojunta, $vocal1junta, $vocal2junta, $vocal3junta);
                $juntaBusiness = new JuntaBusiness();
                $result = $juntaBusiness->insertarTBJunta($junta);
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
}   

?>