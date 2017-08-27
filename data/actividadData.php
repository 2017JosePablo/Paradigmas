<?php

//include 'data.php';
require_once 'data.php';
include '../domain/actividad.php';


class actividadData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


    public function insertarTBActividad($actividad){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbactividad (actividadtipo)
        VALUES ('" .
                $actividad->getNombreActividad() . "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }
 	public function actualizarTBActividad($actividad) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $sql = "UPDATE tbactividad SET 
	    	actividadid ='".$actividad-> getId(). "',
	        actividadtipo='" . $actividad-> getNombreActividad()."'

	        WHERE actividadid ='" . $actividad-> getId(). "';";

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

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE from tbactividad where actividadid='".$idActividad."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}


    public function obtenerTodosTBActividad() {
        $actividad = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
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
        
        return $hato;
    }


}

?>