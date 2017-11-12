<?php

    require_once 'data.php';
    include_once '../domain/fincaTipo.php';
class fincaTipoData extends Data{

	public $data;

	function __construct(){

		$this->data =new Data();
	}

	public function insertarTBfincaTipo($fincaTipo) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfincatipo (fincatiponombre)
        VALUES ('" . $fincaTipo ->getFincaTipoActividad()."');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

    public function actualizarTBfincaTipo($fincaTipo) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "UPDATE tbfincatipo SET fincatiponombre = '".$fincaTipo->getFincaTipoActividad()."' WHERE fincatipoid =  '".$fincaTipo->getId()."' ;";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }
}

?>