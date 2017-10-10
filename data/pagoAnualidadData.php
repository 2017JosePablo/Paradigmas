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


    public function actualizarPagoAnualidad($pagoanualidad) {
        
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbpagoanualidad SET pagoanualidadanterior='".$pagoanualidad->getFechaVencimientoAnterior()."',  pagoanualidadactual = '".$pagoanualidad->getFechaPago()."', pagoanualidadproximo = '".$pagoanualidad->getFechaVencimientoProximo()."' WHERE socioid ='".$pagoanualidad->getIdSocio()."';";

        if ($result = $conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }
    



    public function  obtenerFechasSocio($socioid) {
        require '../domain/anualidad.php';
        $socioAnualidad;
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbpagoanualidad WHERE socioid='".$socioid."'  ORDER BY tbpagoanualidad.pagoanualidadanterior DESC ";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $socioAnualidad = new Anualidad($row["pagoanualidadid"],$row["socioid"], $row["pagoanualidadanterior"],$row["pagoanualidadactual"], $row["pagoanualidadproximo"]);
                break;
                
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socioAnualidad;
    }



}

?>