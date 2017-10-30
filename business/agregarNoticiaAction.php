<?php
include 'avisoBusiness.php';
require_once '../domain/aviso.php';

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
     $directorio ='../uploads/avisos/';

    if(isset($titulo) && !empty($titulo) && isset($detalle) && !empty($detalle) && isset($nombre_img) && !empty($nombre_img)){
      //function Aviso($idAviso,$socioId, $tema,$detalle,$rutaFoto){
      $indice = $avisoBusiness->getIndiceImagen($_SESSION['usuario'])+1;
      $aviso = new Aviso('',$_SESSION['usuario'],$titulo,$detalle,$directorio.$_SESSION['usuario'].'-'.$indice.'.'.$tipo[1]);

      $avisoBusiness = new AvisosBusiness();

      $result = $avisoBusiness->insertarTBAvisos($aviso);

      if($result == 1){
        echo "inserted";
      }else{
        echo "NOT";
      }

    }else{
      header("location: ../view/agregarNoticia.php?error=emptyInput");
    }


    if (($nombre_img == !NULL) && ($_FILES['fotoNoticia']['size'] <= 200000)){
       //indicamos los formatos que permitimos subir a nuestro servidor
       if (($_FILES["fotoNoticia"]["type"] == "image/gif")
       || ($_FILES["fotoNoticia"]["type"] == "image/jpeg")
       || ($_FILES["fotoNoticia"]["type"] == "image/jpg")
       || ($_FILES["fotoNoticia"]["type"] == "image/png"))
       {
         $directorio ='../uploads/avisos/';
          $tipo = explode('/',$_FILES['fotoNoticia']['type']);
          move_uploaded_file($_FILES['fotoNoticia']['tmp_name'],$directorio.$_SESSION['usuario'].'-'.$indice.'.'.$tipo[1]);
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
