<?php

require_once 'data.php';
include '../domain/persona.php';

class personaData extends Data{

	public $data;

    function __construct(){ 
        $this->data = new Data();
    }
     public function insertarTBpersona($persona) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpersona (personaaidentificacion,personaanombre,personaaprimerapellido,personaasegundoapellido,personaatelefonofjo,personaacelular)
        VALUES ('" .

                $persona->getId() . "','" .
                $persona->getNombre() . "','" .
                $persona->getPrimerApellido() . "','" .
                $persona->getSegundoApellido() . "','" .
                $persona->getTelCasa() . "','" . 
                $persona->getTelMovil() . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
	 public function actualizarTBpersona($persona) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbpersona SET personaaidentificacion ='".$persona-> getId(). "',
            personaanombre='" . $persona-> getNombre()."',
            personaaprimerapellido='" . $persona-> getPrimerApellido()."',
            personaasegundoapellido='" . $persona-> getSegundoApellido()."',
            personaatelefonofjo='" . $persona-> getTelCasa()."',
            personaacelular='" . $persona-> getTelMovil()."'
            WHERE personaaidentificacion 	 ='" . $persona-> getId(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }
      public function eliminarTBpersona($idpersona) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbpersona where personaaidentificacion='".$idpersona."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
     }

      public function obtenerTodosTBpersona() {
        $persona = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbpersona";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($persona, new persona($row["personaaidentificacion"],$row["personaanombre"],$row["personaaprimerapellido"],$row["personaasegundoapellido"],$row["personaatelefonofjo"],$row["personaacelular"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $persona;
    }
}
?>