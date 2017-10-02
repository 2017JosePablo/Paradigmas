<?php
require_once 'data.php';
include_once '../domain/hato.php';

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
        $sql = "INSERT INTO tbhato (socioid,hatoraza,hatoternero,hatoternera,hatonovillo,hatonovilla,hatonovillaprenada,hatotoroservicio,hatotoroengorde,hatovacacria,hatovacaengorde)
        VALUES ('" .

                $hato->getPropietario() . "','" .
                $hato->getListadoRazas() . "','" .
                $hato->getTerneros() . "','" .
                $hato->getTerneras() . "','" .
                $hato->getNovillos() . "','" .
                $hato->getNovillas() . "','" .
                $hato->getNovillasPrenadas() . "','" .
                $hato->getTorosEngorde() . "','" .
                $hato->getTorosServicio() . "','" .
                $hato->getvacasCria() . "','" .
                $hato->getvacasEngorde() . "');";



        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
	 public function actualizarTBHato($hato) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbhato SET
            hatoraza='" . $hato-> getListadoRazas()."',
            hatoternero='" . $hato-> getTerneros()."',
            hatoternera='" . $hato-> getTerneras()."',
            hatonovillo='" . $hato-> getNovillos()."',
            hatonovilla='" . $hato-> getNovillas()."',
            hatonovillaprenada='" . $hato-> getNovillasPrenadas()."',
            hatotoroengorde='".$hato-> getTorosEngorde()."',
            hatotoroservicio='".$hato-> getTorosServicio()."',
            hatovacacria='".$hato-> getvacasCria()."',

            hatovacaengorde='" . $hato-> getvacasEngorde()."'
            WHERE socioid ='" . $hato-> getPropietario(). "';";

        //    echo $sql;

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
                array_push($hato, new hato($row["socioid"],$row["hatoraza"],$row["hatoternero"],$row["hatoternera"],$row["hatonovillo"],$row["hatonovilla"],$row["hatonovillaprenada"],$row["hatotoroengorde"],$row["hatotoroservicio"],$row["hatovacacria"],$row["hatovacaengorde"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $hato;
    }
    public function obtenerSocioHato($idsocio) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        $sql = "SELECT * FROM tbhato WHERE socioid = $idsocio";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $hato = ["socioid"=>$row["socioid"],"hatoraza"=>$row["hatoraza"],"hatoternero"=>$row["hatoternero"],"hatoternera"=>$row["hatoternera"],"hatono"=>$row["hatonovillo"],"hatonovilla"=>$row["hatonovilla"],"hatonovillaprenada"=>$row["hatonovillaprenada"],"hatotoroengorde"=>$row["hatotoroengorde"],"hatotoroservicio"=>$row["hatotoroservicio"],"hatovacacria"=>$row["hatovacacria"],"hatovacaengorde"=>$row["hatovacaengorde"]];
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return json_encode($hato);
    }

}

?>
