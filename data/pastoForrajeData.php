<?php
class PastoForrajeData extends Data{
	require_once 'data.php';
	private $data;

	function PastoForrajeData(){
		$data= new Data();
	}

	public function insertarTBPastoForraje($pastoForraje){
		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpastoforraje (pastoforrajenombre)
        VALUES ('" .$pastoForraje->getNombre . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
    public function mostrarPastosForraje(){
       $pastoForraje= array();
       include_once '../domain/pastoForraje.php';

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "SELECT  * FROM tbpastoforraje";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($pastoForraje , new pastoCorte($row["idpastoforraje"], $row["pastoforrajenombre"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $pastoForraje;         
    }


	 

}

?>