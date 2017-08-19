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

        $herd = new Herd("434","100","0","5","4","80","50","0");

        $herdD = new herdData();

       // echo ($herdD -> insertTBHerd($herd));
       // $herdD -> updateTBHerd($herd);

       // $herdD -> deleteTBHerd("504130763");

        $array = $herdD->getAllTBHerd();

        foreach ($array as $key) {

            echo $key->getOwerId().'</br>';
        }





    ?>

      



</body>
