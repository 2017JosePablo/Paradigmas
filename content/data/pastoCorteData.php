<?php
require_once 'data.php';
class PastoCorteData extends Data{
	
	private $data;

	function PastoCorteData(){
		$data= new Data();
	}

	public function insertarTBPastoCorte($pastoCorte){
		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpastoCorte (pastocortenombre)
        VALUES ('" .$pastoCorte->getNombre . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

    public function mostrarPastosCorte(){
       $pastoCorte= array();
       include_once '../domain/pastoCorte.php';

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

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
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbpastocorte SET pastocortenombre = '".$pastoCorte->getNombre()."' WHERE idpastocorte = '".$pastoCorte->getId()."'";
      $result = $conn->query($sql);
      return $result;
    }
    

    //Metodo para eliminar una cerca
    public function eliminarPastoCorte($pastoCorteId){
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbpastocorte  WHERE idpastocorte = '$pastoCorteId'";
      $result = $conn->query($sql);
      return $result;
    }


}

?>