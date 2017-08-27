<?php

require_once 'data.php';
include '../domain/socio.php';

class socioData extends Data{

	public $data;

    function __construct(){ 
        $this->data = new Data();
    }
     public function insertarTBSocio($socio) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbsocio (sociocedula,socionombre,socioprimerapellido,sociosegundoapellido,sociotelefono,sociocorreo,sociotipoactividad,fincatipoid,sociofechaingreso,estadosociodetalle)
        VALUES ('" .

                $socio->getCedula() . "','" .
                $socio->getNombre() . "','" .
                $socio->getPrimerApellido() . "','" .
                $socio->getSegundoApellido() . "','" .
                $socio->getTelCasa() . "','" . 
                $socio->getTelMovil() . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

	 public function actualizarTBSocio($socio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbsocio SET socioidentificacion ='".$socio-> getCedula(). "',
            socionombre='" . $socio-> getNombre()."',
            socioprimerapellido='" . $socio-> getPrimerApellido()."',
            sociosegundoapellido='" . $socio-> getSegundoApellido()."',
            sociotelefonofjo='" . $socio-> getTelCasa()."',
            sociocelular='" . $socio-> getTelMovil()."'
            WHERE socioidentificacion 	 ='" . $socio-> getCedula(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }
      public function eliminarTBSocio($idsocio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbsocio where socioidentificacion='".$idsocio."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
     }

      public function obtenerTodosTBSocio() {
        $socio = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbsocio";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($socio, new socio($row["socioidentificacion"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefonofjo"],$row["sociocelular"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socio;
    }
}
?>