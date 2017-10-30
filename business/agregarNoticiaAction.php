<?php
include 'avisoBusiness.php';
require_once '../domain/aviso.php';

if(isset($_POST['registrarAviso'])){

    $avisoBusiness = new AvisosBusiness();

    $titulo = $_POST['temaAnuncio'];
    $detalle = $_POST['detalleAnuncio'];
    $nombre_img = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];

    session_start();
    $directorio ='../uploads/avisos/';
    $tipo = explode('/',$_FILES['imagen']['type']);
    if(isset($titulo) && !empty($titulo) && isset($detalle) && !empty($detalle) && isset($nombre_img) && !empty($nombre_img)){
      //function Aviso($idAviso,$socioId, $tema,$detalle,$rutaFoto){
      $indice = $avisoBusiness->getIndiceImagen($_SESSION['usuario'])+1;
      $aviso = new Aviso('',$_SESSION['usuario'],$titulo,$detalle,$directorio.$_SESSION['usuario'].'-'.$indice.'.'.$tipo[1]);
      $avisoBusiness = new AvisosBusiness();
      $result = $avisoBusiness->insertarTBAvisos($aviso);
      if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 300000)){
         //indicamos los formatos que permitimos subir a nuestro servidor
         if (($_FILES["imagen"]["type"] == "image/gif")
         || ($_FILES["imagen"]["type"] == "image/jpeg")
         || ($_FILES["imagen"]["type"] == "image/jpg")
         || ($_FILES["imagen"]["type"] == "image/png"))
         {
           $directorio ='../uploads/avisos/';
            move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$_SESSION['usuario'].'-'.$indice.'.'.$tipo[1]);
          }else{
             //si no cumple con el formato
             echo "No se puede subir una imagen con ese formato ";
          }
      }else{
         if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
      }

      if($result == 1){
        header('location: ../index.php?success=insertedAviso');
      }else{
          header('location: ../view/agregarNoticia.php?error=insertedAviso');
      }
    }else{
      header("location: ../view/agregarNoticia.php?error=emptyInput");
    }
}

if(isset($_POST['editarAviso'])){
  $avisoBusiness = new AvisosBusiness();
  $titulo = $_POST['temaAnuncio'];
  $detalle = $_POST['detalleAnuncio'];
  $nombre_img = $_FILES['imagen']['name'];
  $tipo = $_FILES['fotoNoticia']['type'];

}
 ?>
