<?php


include 'data.php';
include '../domain/hato.php';

class hatoData extends Data{

	 private $data;

    function __construct(){ 
       
        $this->data = new Data();
    }
     public function insertarTBHato($hato) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbhato (socioid,hatoraza,hatoterneros,hatoterneras,hatonovillos,hatonovillas,hatonovillasprenadas,hatotoros,hatovacas)
        VALUES ('" .

                $hato->getPropietario() . "','" .
                $hato->getListadoRazas() . "','" .
                $hato->getTerneros() . "','" .
                $hato->getTerneras() . "','" .
                $hato->getNovillos() . "','" .
                $hato->getNovillas() . "','" .
                $hato->getNovillasPrenadas() . "','" .
                $hato->getToros() . "','" .
                $hato->getVacas() . "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
	 public function actualizarTBHato($hato) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbhato SET hatopersonid ='".$hato-> getPropietario(). "',
            hatoraza='" . $hato-> getListadoRazas()."',
            hatoterneros='" . $hato-> getTerneros()."',
            hatoterneras='" . $hato-> getTerneras()."',
            hatonovillos='" . $hato-> getNovillos()."',
            hatonovillas='" . $hato-> getNovillas()."',
            hatonovillasprenadas='" . $hato-> getNovillasPrenadas()."',
            hatotoros='".$hato-> getToros()."',
            hatovacas='" . $hato-> getVacas()."' 
            WHERE hatopersonid ='" . $hato-> getPropietario(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }

     public function eliminarTBHato($socioid) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbhato where socioid='".$socioid."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
    }
    public function obtenerTodosTBHato() {
        $hato = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbhato";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($hato, new hato($row["socioid"],$row["hatoraza"],$row["hatoterneros"],$row["hatoterneras"],$row["hatonovillos"],$row["hatonovillas"],$row["hatonovillasprenadas"],$row["hatotoros"],$row["hatovacas"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $hato;
    }

}

?>