<?php
require_once 'data.php';
include '../domain/actividad.php';


class actividadData extends Data{

	 private $data;

    function __construct(){

        $this->data = new Data();
    }


    public function insertarTBActividad($tipoactividadnombre){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbtipoactividad (tipoactividadnombre)
        VALUES ('" .
                $tipoactividadnombre->getNombreActividad() . "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }
 	public function actualizarTBActividad($actividad) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $sql = "UPDATE tbtipoactividad SET  tipoactividadnombre='". $actividad-> getNombreActividad()."'

	        WHERE tipoactividadid ='" . $actividad-> getId(). "';";

	    $result = $conn->query($sql);
	    if ($conn->query($sql) === TRUE) {
				 echo "Record updated successfully";
		} else {
				 echo "Error updating record: " . $conn->error;
		}
	    $conn->close();
	    return $result;
 	}
	public function eliminarTBActividad($idActividad) {

		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
		$conn->set_charset("utf8");
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE from tbtipoactividad where tipoactividadid='".$idActividad."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}


    public function obtenerTodosTBActividad() {
        $actividad = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				$conn->set_charset("utf8");
        $sql = "SELECT * FROM tbtipoactividad";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($actividad,new actividad($row['tipoactividadid'],$row['tipoactividadnombre']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $actividad;
    }


}

?>
