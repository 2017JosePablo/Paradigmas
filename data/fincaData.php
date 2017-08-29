<?php

//include 'data.php';
require_once 'data.php';
include '../domain/finca.php';


class FincaData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


    public function insertarFinca($finca){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfinca (socioid,fincaarea,fincacantidadbobinos)
        VALUES ('".
                $finca->getSocioId()."','".
                $finca->getArea()."','".
                $finca->getCantidadBovinos() . "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }


      public function insertarTBFincaDireccion($fincaDireccion){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfincadireccion (fincaprovincia,fincacanton, fincadistrito,fincapueblo,fincaexacta)
        VALUES ('".$fincaDireccion->getProvincia()."','".$fincaDireccion->getCanton()."','".$fincaDireccion->getDistrito()."','".$fincaDireccion->getPueblo()."','".$fincaDireccion->getDireccionExacta()."');";


        


         if ( ( $result = $conn->query($sql)) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record FINCADIFREDDION: " . $conn->error;
        }

        $conn->close();
        return $result;

    }



 	public function actualizarTBfinca($finca) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $sql = "UPDATE tbfinca SET 
	        fincaarea='" 
                .$finca-> getArea()."','".
                $finca->getCantidadBovinos()."'

	        WHERE socioid ='" . $finca-> getSocioId(). "';";

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

		$sql = "DELETE from tbfinca where socioid='".$idfinca."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}


    public function obtenerTodosTBfinca() {
        $finca = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbfinca";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($finca,new Finca($row['socioid'],$row['fincaarea'],$row['fincacantidadbobinos']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $finca;
    }
}

?>