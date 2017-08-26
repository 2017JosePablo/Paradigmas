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
        $sql = "INSERT INTO tbherdactivity (hatoactividadpersonaid,hatoactividadtipo)
        VALUES ('" .

                $personaId . "','" .
                $tipoActividad . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}	

}


?>