<?php
require 'data.php';
$foto = $_FILES["foto"]["name"];
$ruta = $_FILES["foto"]["tmp_name"];
$destino = "../uploads/".$foto;
copy($ruta,$destino);

header ('location: ../index.php');


?>
