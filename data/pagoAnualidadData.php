<?php

//include 'data.php';
require_once 'data.php';


class pagoAnualidadData extends Data{

	 private $data;


    function pagoAnualidadData(){ 
        
        $this->data = new Data();
    }


     public function insertarPagoAnualidad($pagoanualidad){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpagoanualidad (socioid,pagoanualidadanterior,pagoanualidadactual,pagoanualidadproximo)
        VALUES ('".
                $pagoanualidad->getIdSocio()."','".
                $pagoanualidad->getFechaVencimientoAnterior()."','".
                $pagoanualidad->getFechaPago()."','".
                $pagoanualidad->getFechaVencimientoProximo(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }




}

?>