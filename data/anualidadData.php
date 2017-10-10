<?php

//include 'data.php';
require_once 'data.php';


class anualidadData extends Data{

	 private $data;

    function anualidadData(){ 

        $this->data = new Data();
    }


    public function insertarAnualidad($anualidad){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbanualidad (responsableid,anualidadmonto,anualidadfechaactualizacion)
        VALUES ('".
                $anualidad->getResponsableId()."','".
                $anualidad->getMonto()."','".
                $anualidad->getFechaActualizacion(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }




}

?>