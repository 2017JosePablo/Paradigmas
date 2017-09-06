<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto de Paradigmas de Programacion</title>
</head
<body>

    <?php

        //include '../data/juntaData.php';
    //include '../data/herdData.php';

//
       // $herd = new Herd("122222","100","0","5","4","80","50","0");

        //$herdD = new herdData();

       // echo ($herdD -> insertTBHerd($herd));
       // $herdD -> updateTBHerd($herd);

       // $herdD -> deleteTBHerd("504130763");

       /* $array = $herdD->getAllTBHerd();

        foreach ($array as $key) {

            echo $key->getOwerId().'</br>';
        }


        /*
        include '../data/personData.php';

        $person = new Person("100000000000","ASAS","carranza","alfaro","24650889","50088487");
        $personD = new personData();

        //echo($personD->insertTBPerson($person));

        //$personD->updateTBPerson($person);

       // $personD -> deleteTBPerson("504130763");


        /*
        $array = $personD->getAllTBPerson();

        foreach ($array as $key) {

            echo $key->getId().'</br>';
        }*/

       // $personD-> insertTBPerson($person);
        /*
        
        */
        /*
        include '../data/herdActivityData.php';

        $herdActivityD = new herdActivityData();

        echo($herdActivityD->insertTBHerdActivity("111111111","1,2,4"));
  */
        
/*
        include '../data/actividadData.php';;


        $actividad = new Actividad('',"Carne Carranza");
        echo $actividad->getNombreActividad();

        $inser = new actividadData();

        echo $inser->insertarTBActividad($actividad);


 
        include '../data/socioData.php';
         $inser = new socioData();

         $socio = $inser->obtenerUnTBSocio("503930363");

         $array = json_decode($socio, true);
         echo $array["socionombre"];
/*
        include '../data/razaData.php';
         $inser = new razaData();
         //$raza = new raza('7',"Negras");

//        $result = $inser->editarRaza($raza);

          $result =   $inser->eliminarRazaTBRaza('7');
        if ($result == 1) {
            echo "Modificado con exito";
        }else{
            echo "No se a podido modificar";
        }

//         $inser->insertarRaza($raza);

          /*$array = $inser->obtenerTodoTBRaza();

        foreach ($array as $key) {

            echo $key->getNombreRaza().'</br>';
        }


       include 'fincaData.php';

      $socioBusiness = new FincaData();

      $cedula = "<scrpit> pront ('Ingrese el valor')</scrpit>";

      $fincas = json_decode($socioBusiness->obtenerFinca("4"),true);
            
            echo $fincas["fincaid"]."</br>";
            echo $fincas["socioid"]."</br>";
            echo $fincas["fincaarea"]."</br>";
            echo $fincas["fincacantidadbobinos"]."</br>";
        
*/

        include 'fincaData.php';
        $socioBusiness = new fincaData();
        $fincas = json_decode($socioBusiness->obtenerDatosFincaVer("503930363"),true);

            
        echo $fincas["fincaprovincia"]."</br>";
        echo $fincas["fincacanton"]."</br>";
        echo $fincas["fincadistrito"]."</br>";
        echo $fincas["fincapueblo"]."</br>";
        echo $fincas["fincaexacta"]."</br>";






    ?>





</body>
