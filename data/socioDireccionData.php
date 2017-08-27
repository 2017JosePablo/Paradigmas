<?php

require_once 'data.php';
include '../domain/SocioDireccion.php';


class SocioDireccionData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


    public function insertartbsociodireccion($socioDireccion){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbsociodireccion (socioprovincia,sociocanton,sociodistrito,sociopueblo)
        VALUES ('" .
                $socioDireccion->getProvincia()."','".
                $socioDireccion->getCanton()."','".
                $socioDireccion->getDistrito()."','".
                $socioDireccion->getPueblo() . "');";


        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }
 	public function actualizartbsociodireccion($socioDireccion) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $sql = "UPDATE tbsociodireccion SET 
	        socioprovincia='" 
                $socioDireccion->getProvincia()."','".
                $socioDireccion->getCanton()."','".
                $socioDireccion->getDistrito()."','".
                $socioDireccion->getPueblo()."'
	        WHERE socioid ='" . $socioDireccion-> getIdSocioDir(). "';";

	    $result = $conn->query($sql);
	    if ($conn->query($sql) === TRUE) {
				 echo "Record updated successfully";
		} else {
				 echo "Error updating record: " . $conn->error;
		}
	    $conn->close();
	    return $result;
 	}
	public function eliminartbsociodireccion($idsocioDireccion) {

		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE from tbsociodireccion where socioid='".$idsocioDireccion."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}

    public function obtenerTodostbsociodireccion() {
        $socioDireccion = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbsociodireccion";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($socioDireccion,new SocioDireccion($row['socioid'],$row['socioprovincia'],$row['sociocanton'],$row['sociodistrito'],['sociopueblo']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socioDireccion;
    }
}

?>