<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto de Paradigmas de Programacion</title>
</head
<body>

    <?php

        include '../data/juntaData.php';

        $junt = new Junta("44","jose","ana","Juja","adam","v1","v2","v7");

        echo $junt->getIdTBJunta()." ".$junt->getPresidenteTBJunta()." ".$junt->getVocal3Junta();

        $juntaD = new JuntaData();

        echo($juntaD->insertTBJunta($junt));


    ?>

      



</body>
