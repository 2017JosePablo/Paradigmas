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
    include '../data/herdData.php';

        $herd = new Herd("434","0","0","5","4","87","5","10");

        $herdD = new herdData();

        echo ($herdD -> insertTBHerd($herd));

        //$junt = new Junta("122","ADAN","JUANANANA","Juja","adam","v1","v2","DSDSD");


        //$juntaD = new JuntaData();

        //echo($juntaD->insertTBJunta($junt));
        //$juntaD->insertTBJunta($junt);
       // echo($juntaD->deleteTBJunta($junt->getIdTBJunta())." <"); 



        //$arr = $juntaD->getAllTBJunta();

        //foreach ($arr as &$value) {
           // echo ($value->getIdTBJunta()."<br>");
       // }



    ?>

      



</body>
