<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>

    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>

    <style>

    div span {

        display:inline-block;

        width:250px;

    }

    h2 {

        font-size:1em;

    }




    .ok {

        border-color:blue;

    }

    </style>

 

    <script type="text/javascript">
        jQuery(function($){

            $("#date").mask("99/99/9999");

            $("#movil").mask("999 99 99 99");

            $("#letras").mask("aaa");

            $("#comodines").mask("?");
            $("#pablo").mask("9999 99 99 99");

        });

    </script>

</head>

 

<body>
 
<!--
<div><span>numero con dos decimales</span><input type="text" id="numero1"> 9,99 (generamos un evento al rellenarlo)</div>

<div><span>fecha</span><input type="text" id="date"> 99/99/9999</div>

<div><span>movil</span><input type="text" id="movil"> 999 99 99 99</div>

<div><span>Solo tres letras</span><input type="text" id="letras"> aaa</div>

<div><span>fecha</span><input type="text" id="pablo"> 99/99/9999</div>

-->

<?php 
require './data/pagoAnualidadData.php';
require './domain/anualidad.php';
$anualidadData= new pagoAnualidadData(); 
$anualidad= new Anualidad("","","2001-06-12","2001-06-12","2001-06-12");   
$result=$anualidadData->insertarpagoanualidad($anualidad);
echo "resultado= ".$result;
?>

</body>

</html>