<?php

//include 'data.php';
require_once 'data.php';
include '../domain/finca.php';


class fincaData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


    public function insertarTBfinca($finca){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfinca (socioid,fincaarea,fincacantidadbobinos)
        VALUES ('" .
                $finca->getSocioId()."','".
                $finca->getCantidadBovinos(),"','".
                $finca->getNombrefinca() . "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }
 	public function actualizarTBfinca($finca) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $sql = "UPDATE tbfinca SET 
	    	fincaid ='".$finca-> getId(). "',
	        fincatipo='" . $finca-> getNombrefinca()."'

	        WHERE fincaid ='" . $finca-> getId(). "';";

	    $result = $conn->query($sql);
	    if ($conn->query($sql) === TRUE) {
				 echo "Record updated successfully";
		} else {
				 echo "Error updating record: " . $conn->error;
		}
	    $conn->close();
	    return $result;
 	}
	public function eliminarTBfinca($idfinca) {

		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE from tbfinca where fincaid='".$idfinca."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}


    public function obtenerTodosTBfinca() {
        $finca = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbtipofinca";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($finca,new finca($row['tipofincaid'],$row['tipofincanombre']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $hato;
    }


}

?>