<?php

    require_once 'data.php';

class hatoActividadData extends Data{

	public $data;

	function __construct(){

		$this->data =new Data();
	}

	public function insertarTBHatoActividad($personaId,$tipoActividad) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbhatoactividad (hatoactividadpersonaid,hatoactividadtipo)
        VALUES ('" .

                $personaId . "','" .
                $tipoActividad . "');";

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

                array_push($actividad,new actividad($row['tipoactividadid'],$row['tipoactividadnombre ']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $hato;
    }


    }	

}


?>