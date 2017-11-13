<?php

//include 'data.php';
require_once 'data.php';
include '../domain/examenTuberculosis.php';


class examenTuberculosisData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }

    public function insertarExamen($examen){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbexamentuberculosis (examentuberculosisvigente, examentuberculosisfechavencimiento,idsocio)VALUES ('".$examen->getExamenVigente()."','".$examen->getExamenFechaVencimiento()."' ,'".$examen->getIdSocio()."' ); ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    public function  obtenerExamenSocio($idsocio){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbexamentuberculosis ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $examenSocio = new examenTuberculosis($row["examentuberculosisid"], $row["examentuberculosisvigente"], $row["examentuberculosisfechavencimiento"], $row["idsocio"]);
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $examenSocio;
    }
    //Metodo para actualizar un tipo de cerca existente..
    public function modificarExamenSocio($examen)
    {

      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbexamentuberculosis SET examentuberculosisvigente = '".$examen->getExamenVigente()."', examentuberculosisfechavencimiento = '".$examen->getExamenFechaVencimiento()."'  WHERE idsocio = '".$examen->getIdSocio()."'";
      $result = $conn->query($sql);
      return $result;
    }
    //Metodo para eliminar una cerca
    public function eliminarExamenSocio($idSocio)
    {
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbexamentuberculosis  WHERE idsocio = '$idsocio'";
      $result = $conn->query($sql);
      return $result;
    }
}//Fin de la clase.

?>
