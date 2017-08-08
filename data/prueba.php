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

        $junt = new Junta("ee","parra","xxxxx","Juja","adam","v1","v2","xxxx");


        $juntaD = new JuntaData();

        //echo($juntaD->insertTBJunta($junt));
        //$juntaD->updateTBJunta($junt);
       // echo($juntaD->deleteTBJunta($junt->getIdTBJunta())." <"); 



        $arr = $juntaD->getAllTBJunta();

        foreach ($arr as &$value) {
            echo ($value->getIdTBJunta()."<br>");
        }



    ?>

      



</body>
