<?php

require_once 'data.php';


class actaAprobacionData extends Data{

	 private $data;


    function actaAprobacionData(){ 
        
        $this->data = new Data();
    }


     public function insertarActaAprobacionData($actaAprobacion){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbactaaprobacion(socioid,actaaprobacionsecion,actaaprobacionfecha,actaaprobacioncondicion,actaaprobacionmotivo)
        VALUES ('".
                $actaAprobacion->getIdSocio()."','".
                $actaAprobacion->getSecion()."','".
                $actaAprobacion->getFecha()."','".
                $actaAprobacion->getCondicion()."','".
                $actaAprobacion->getMotivo(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }






}

?>