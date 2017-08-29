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


         include '../data/fincaData.php';;
         $finca = new Finca("25","546546546","256");
         $inser = new fincaData();
         echo $inser->insertarTBfinca($finca);
*/
        include '../data/socioData.php';
         $inser = new socioData();

         $socio = $inser->obtenerUnTBSocio("503930363");

         $array = json_decode($socio, true);
         echo $array["sociocedula"];


    ?>

      



</body>
