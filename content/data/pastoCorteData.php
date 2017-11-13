<?php

//include 'data.php';
require_once 'data.php';

class PastoCorteData extends Data{

	private $data;

	public function PastoCorteData(){
		$this->data= new Data();
	}

	public function insertarTBPastoCorte($pastoCorte){
		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     $conn->set_charset("utf8");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpastocorte (pastocortenombre)
        VALUES ('".$pastoCorte->getNombre()."');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

    public function mostrarPastosCorte(){

       $pastoCorte= array();
       include_once '../domain/pastoCorte.php';

			 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
		 	$conn->set_charset("utf8");



        $sql = "SELECT  * FROM tbpastocorte";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($pastoCorte , new pastoCorte($row["idpastocorte"], $row["pastocortenombre"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
				      return $pastoCorte;

    }

  public function modificarPastoCorte($pastoCorte){
      include_once '../domain/pastoCorte.php';
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
       $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbpastocorte SET pastocortenombre = '".$pastoCorte->getNombre()."' WHERE idpastocorte = '".$pastoCorte->getId()."'";
      $result = $conn->query($sql);
      return $result;
    }



    public function eliminarPastoCorte($pastoCorteId){
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
       $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbpastocorte  WHERE idpastocorte = '$pastoCorteId'";
      $result = $conn->query($sql);
      return $result;
    }


}

?>
