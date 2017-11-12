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
                    header("location: ../index.php?success=updatedJunta");
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

    //require 'socioBusiness.php';
    require_once '../domain/socioDireccion.php';
    //$socioBusiness = new socioBusiness();
    $juntaBusiness = new JuntaBusiness();

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

         
         $presidente= new Colaborador("",$presidenteColaborardoCedula,$presidenteColaborardorNombre,$presidenteColaborardorPrimerApellido,$presidenteColaborardorSegundoApellido,$presidenteColaborardorCorreo,$presidenteColaborardorTelMovil);

            $resultadoP = $juntaBusiness->insertarColaborador($presidente);
            
            if ($resultadoP ==1) {
                $presidentejunta=$presidenteColaborardoCedula;
                 header("location: ../index.php?success=insertedJunta");

            }else{

                echo "Error al insertar un colaboradorP: ".@$resultadoP;
                //header("location: ../view/socioView.php?error=errorinserted");
            }

    }else{
       $presidentejunta = $_POST['listadoSocios'];
    }

    if(isset($vicepresidenteColaborardoCedula)==true && empty($vicepresidenteColaborardoCedula)==false && isset($vicepresidenteColaborardorNombre)==true && empty($vicepresidenteColaborardorNombre)==false && isset($vicepresidenteColaborardorPrimerApellido)==true && empty($vicepresidenteColaborardorPrimerApellido)==false && isset($vicepresidenteColaborardorSegundoApellido)==true && empty($vicepresidenteColaborardorSegundoApellido)==false && isset($vicepresidenteColaborardorTelMovil)==true && empty($vicepresidenteColaborardorTelMovil)==false && isset($vicepresidenteColaborardorCorreo)==true && empty($vicepresidenteColaborardorCorreo)==false){

        $vicepresidente= new Colaborador("",$vicepresidenteColaborardoCedula,$vicepresidenteColaborardorNombre,$vicepresidenteColaborardorPrimerApellido,$vicepresidenteColaborardorSegundoApellido,$vicepresidenteColaborardorCorreo,$vicepresidenteColaborardorTelMovil);

            $resultadoV = $juntaBusiness->insertarColaborador($presidente);

            if ($resultadoV ==1) { 
                $vicepresidentejunta=$vicepresidenteColaborardoCedula;
                echo "ColaboradorV insertardo"; 
            }else{

                echo "Error al insertar un ColaboradorV: ".@$resultadoV;
               // header("location: ../view/socioView.php?error=errorinserted");
            }

    }else{
        $vicepresidentejunta = $_POST['listadoVicepresidente'];
    }



    if(isset($tesoreroColaborardoCedula)==true && empty($tesoreroColaborardoCedula)==false && isset($tesoreroColaborardorNombre)==true && empty($tesoreroColaborardorNombre)==false && isset($tesoreroColaborardorPrimerApellido)==true && empty($tesoreroColaborardorPrimerApellido)==false && isset($tesoreroColaborardorSegundoApellido)==true && empty($tesoreroColaborardorSegundoApellido)==false && isset($tesoreroColaborardorTelMovil)==true && empty($tesoreroColaborardorTelMovil)==false && isset($tesoreroColaborardorCorreo)==true && empty($tesoreroColaborardorCorreo)==false){
            
             $tesorero= new Colaborador("",$tesoreroColaborardoCedula,$tesoreroColaborardorNombre,$tesoreroColaborardorPrimerApellido,$tesoreroColaborardorSegundoApellido,$tesoreroColaborardorCorreo,$tesoreroColaborardorTelMovil);

            $resultadoT = $juntaBusiness->insertarColaborador($tesorero);
    

            if ($resultadoT ==1) {
                $tesorerojunta =$tesoreroColaborardoCedula;
                echo "ColaboradorT insertardo";
            }else{
                echo "Error al insertar un ColaboradorT: ".@$resultadoT;
               // header("location: ../view/socioView.php?error=errorinserted");
            }


    }else{
         $tesorerojunta = $_POST['listadoTesorero'];
    }

     if(isset($secretarioColaborardoCedula)==true && empty($secretarioColaborardoCedula)==false && isset($secretarioColaborardorNombre)==true && empty($secretarioColaborardorNombre)==false && isset($secretarioColaborardorPrimerApellido)==true && empty($secretarioColaborardorPrimerApellido)==false && isset($secretarioColaborardorSegundoApellido)==true && empty($ecretarioColaborardorSegundoApellido)==false && isset($secretarioColaborardorTelMovil)==true && empty($secretarioColaborardorTelMovil)==false && isset($secretarioColaborardorCorreo)==true && empty($secretarioColaborardorCorreo)==false){




           $secretario= new Colaborador("",$secretarioColaborardoCedula,$secretarioColaborardorNombre,$secretarioColaborardorPrimerApellido,$secretarioColaborardorSegundoApellido,$secretarioColaborardorCorreo,$secretarioColaborardorTelMovil);

            $resultadoS = $juntaBusiness->insertarColaborador($secretario);
    
            if ($resultadoS ==1) {
                $secretariojunta =$secretarioColaborardoCedula;
                echo " ColaboradorS insertardo";
            }else{

                echo "Error al insertar un ColaboradorS: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }

     
     }else{
       $secretariojunta = $_POST['listadoSecretario']; 
     }


     if(isset($v1ColaborardoCedula)==true && empty($v1ColaborardoCedula)==false && isset($v1ColaborardorNombre)==true && empty($v1ColaborardorNombre)==false && isset($v1ColaborardorPrimerApellido)==true && empty($v1ColaborardorPrimerApellido)==false && isset($v1ColaborardorSegundoApellido)==true && empty($v1ColaborardorSegundoApellido)==false && isset($v1ColaborardorTelMovil)==true && empty($v1ColaborardorTelMovil)==false && isset($v1ColaborardorCorreo)==true && empty($v1ColaborardorCorreo)==false){


    
            $vocal1= new Colaborador("",$vocal1ColaborardoCedula,$vocal1ColaborardorNombre,$vocal1ColaborardorPrimerApellido,$vocal1ColaborardorSegundoApellido,$vocal1ColaborardorCorreo,$vocal1ColaborardorTelMovil);

            $resultadoV1 = $juntaBusiness->insertarColaborador($vocal1);

            if ($resultadoV1 ==1) {
                $vocal1junta = $v1ColaborardoCedula;
              echo "ColaboradorV1 insertado"; 
            }else{

                echo "Error al insertar un ColaboradorV1: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }


         
     }else{
         $vocal1junta = $_POST['listadoV1'];

     }



     if(isset($v2ColaborardoCedula)==true && empty($v2ColaborardoCedula)==false && isset($v2ColaborardorNombre)==true && empty($v2ColaborardorNombre)==false && isset($v2ColaborardorPrimerApellido)==true && empty($v2ColaborardorPrimerApellido)==false && isset($v2ColaborardorSegundoApellido)==true && empty($v2ColaborardorSegundoApellido)==false && isset($v2ColaborardorTelMovil)==true && empty($v1ColaborardorTelMovil)==false && isset($v2ColaborardorCorreo)==true && empty($v2ColaborardorCorreo)==false){


            $vocal2= new Colaborador("",$vocal2ColaborardoCedula,$vocal2ColaborardorNombre,$vocal2ColaborardorPrimerApellido,$vocal2ColaborardorSegundoApellido,$vocal2ColaborardorCorreo,$vocal2ColaborardorTelMovil);

            $resultadoV2 = $juntaBusiness->insertarColaborador($vocal2);
    


            if ($resultadoV2 ==1) {
                $vocal2junta = $v2ColaborardoCedula;
             echo "ColaboradorV2 insertardo";  
            }else{

                echo "Error al insertar un ColaboradorV2: ";
                //header("location: ../view/socioView.php?error=errorinserted");
            }
        

     }else{
         $vocal2junta = $_POST['listadoV2'];

     }


     if(isset($v3ColaborardoCedula)==true && empty($v3ColaborardoCedula)==false && isset($v3ColaborardorNombre)==true && empty($v3ColaborardorNombre)==false && isset($v3ColaborardorPrimerApellido)==true && empty($v3ColaborardorPrimerApellido)==false && isset($v3ColaborardorSegundoApellido)==true && empty($v3ColaborardorSegundoApellido)==false && isset($v3ColaborardorTelMovil)==true && empty($v3ColaborardorTelMovil)==false && isset($v3ColaborardorCorreo)==true && empty($v3ColaborardorCorreo)==false){


        
            $vocal3= new Colaborador("",$vocal3ColaborardoCedula,$vocal3ColaborardorNombre,$vocal3ColaborardorPrimerApellido,$vocal3ColaborardorSegundoApellido,$vocal3ColaborardorCorreo,$vocal3ColaborardorTelMovil);

            $resultadoV3 = $juntaBusiness->insertarColaborador($vocal3);
    

            if ($resultadoV3 ==1) {
                $vocal3junta = $v3ColaborardoCedula;
              echo "ColaboradorV3 insertado";
            }else{

                echo "Error al insertar un ColaboradorV3: ";
                //header("location: ../view/socioView.php?error=errorinserted");
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