<?php

//include 'data.php';
require_once 'data.php';
include '../domain/finca.php';


class cercaData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }


    public function insertarTipoCerca($cercanombre){
  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset('utf8');

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfincacerca (fincacercatipo)
        VALUES ('$cercanombre')";
        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }



    public function  obtenerTipoCerca($fincacercaid){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				$conn->set_charset('utf8');
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $fincacerca = "";
        $sql = "SELECT fincacercatipo FROM tbfincacerca WHERE fincacercaid = '".$fincacercaid."'; ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $fincacerca =$row["fincacercatipo"];
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return ($fincacerca);
    }


    public function  obtenerTiposCerca(){

        include_once '../domain/tipoCerca.php';

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				$conn->set_charset('utf8');
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

         $fincatipo = array();
        $sql = "SELECT  * FROM tbfincacerca ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($fincatipo , new tipoCerca($row["fincacercaid"], $row["fincacercatipo"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $fincatipo;
    }
    //Metodo para actualizar un tipo de cerca existente..
    public function modificarTipoCerca($tipoCercaId)
    {
      include_once '../domain/tipoCerca.php';
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset('utf8');
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbfincacerca SET fincacercatipo = '".$tipoCerca->getNombreCerca()."' WHERE fincacercaid = '".$tipoCerca->getCercaId()."'";
      $result = $conn->query($sql);
      return $result;
    }
    //Metodo para eliminar una cerca
    public function eliminarTipoCerca($tipoCercaId)
    {
      include_once '../domain/tipoCerca.php';
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset('utf8');  
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbfincacerca  WHERE fincacercaid = '$tipoCercaId'";
      $result = $conn->query($sql);
      return $result;
    }

}//Fin de la clase.

?>
