<?php
include 'avisoBusiness.php';

if(isset($_POST['registrarAviso'])){

    $avisoBusiness = new AvisosBusiness();

    $titulo = $_POST['temaAnuncio'];
    $detalle = $_POST['detalleAnuncio'];

    $nombre_img = $_FILES['fotoNoticia']['name'];
    $tipo = $_FILES['fotoNoticia']['type'];
    $tamano = $_FILES['fotoNoticia']['size'];

    session_start();
    if(isset($_SESSION['usuario'])){
    }else{
      echo 'No existe';
    }
    echo "saas->".$avisoBusiness->getIndiceImagen($_SESSION['usuario']);

    //Si existe fotoNoticia y tiene un tamaño correcto
    if (($nombre_img == !NULL) && ($_FILES['fotoNoticia']['size'] <= 200000)){
       //indicamos los formatos que permitimos subir a nuestro servidor
       if (($_FILES["fotoNoticia"]["type"] == "image/gif")
       || ($_FILES["fotoNoticia"]["type"] == "image/jpeg")
       || ($_FILES["fotoNoticia"]["type"] == "image/jpg")
       || ($_FILES["fotoNoticia"]["type"] == "image/png"))
       {
          // Ruta donde se guardarán las imágenes que subamos
         $directorio ='../uploads/avisos/';
          // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
          $tipo = explode('/',$_FILES['fotoNoticia']['type']);
          move_uploaded_file($_FILES['fotoNoticia']['tmp_name'],$directorio.$tipo[1]);
          echo "NOmbre de ruta->".$directorio;
        }else{
           //si no cumple con el formato
           echo "No se puede subir una imagen con ese formato ";
        }
    }else{
       //si existe la variable pero se pasa del tamaño permitido
       if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
    }


}


 ?>
