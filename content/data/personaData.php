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
        $conn->set_charset("utf8");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpersona (personaidentificacion,personanombre,personaprimerapellido,personasegundoapellido,personatelefonofjo,personacelular)
        VALUES ('" .

                $persona->getCedula() . "','" .
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
         $conn->set_charset("utf8");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbpersona SET personaidentificacion ='".$persona-> getCedula(). "',
            personanombre='" . $persona-> getNombre()."',
            personaprimerapellido='" . $persona-> getPrimerApellido()."',
            personasegundoapellido='" . $persona-> getSegundoApellido()."',
            personatelefonofjo='" . $persona-> getTelCasa()."',
            personacelular='" . $persona-> getTelMovil()."'
            WHERE personaidentificacion 	 ='" . $persona-> getCedula(). "';";

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
         $conn->set_charset("utf8");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE from tbpersona where personaidentificacion='".$idpersona."';";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
     }

      public function obtenerTodosTBpersona() {
        $persona = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        $sql = "SELECT * FROM tbpersona";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($persona, new persona($row["personaidentificacion"],$row["personanombre"],$row["personaprimerapellido"],$row["personasegundoapellido"],$row["personatelefonofjo"],$row["personacelular"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $persona;
    }
}
?>
