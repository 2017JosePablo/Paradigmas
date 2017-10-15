<?php

//include 'data.php';
require_once 'data.php';
include '../domain/cvo.php';


class cvoData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }

    public function insertarCvo($cvo){
			include_once '../domain/cvo.php';
  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbcvo (cvotiene, cvofechavigencia,idsocio)VALUES ('".$cvo->getCvoTiene()."','".$cvo->getCvoFechaVigencia()."' ,'".$cvo->getCvoSocioId()."' ); ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    public function  obtenerCvoSocio($idsocio){

        include_once '../domain/cvo.php';

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbcvo ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $cvoSocio = new Cvo($row["cvoid"], $row["cvotiene"], $row["cvofechavigencia"], $row["idsocio"]);
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $cvoSocio;
    }
    //Metodo para actualizar un tipo de cerca existente..
    public function modificarCvoSocio($cvo)
    {
      include_once '../domain/cvo.php';
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbcvo SET cvotiene = '".$cvo->getCvoTiene()."',cvofechavigencia = '".$cvo->getCvoFechaVigencia()."'  WHERE idsocio = '".$cvo->getCvoSocioId()."'";
      $result = $conn->query($sql);
      return $result;
    }
    //Metodo para eliminar una cerca
    public function eliminarCvoSocio($idSocio)
    {

      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbcvo  WHERE idsocio = '$idsocio'";
      $result = $conn->query($sql);
      return $result;
    }
}//Fin de la clase.

?>
