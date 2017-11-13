<?php
  require_once 'data.php';
class PastoForrajeData extends Data{

	private $data;

	function PastoForrajeData(){
		$this->data= new Data();
	}

	public function insertarTBPastoForraje($pastoForraje){
		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     $conn->set_charset("utf8");
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
         $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "SELECT  * FROM tbpastoforraje";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($pastoForraje , new PastoForraje($row["idpastoforraje"], $row["pastoforrajenombre"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

    return $pastoForraje;
  }

  public function modificarPastoForraje($pastoForraje){
    include_once '../domain/pastoForraje.php';
    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     $conn->set_charset("utf8");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $sql = "UPDATE tbpastoforraje SET pastoforrajenombre = '".$pastoForraje->getNombre()."' WHERE idpastoforraje = '".$pastoForraje->getId()."'";
    $result = $conn->query($sql);
    return $result;
  }


    //Metodo para eliminar una cerca
  public function eliminarPastoForraje($pastoForrajeId){
    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     $conn->set_charset("utf8");
      if (!$conn) {
          die("Connection failed: ".mysqli_connect_error());
      }
    $sql = "DELETE FROM tbpastoforraje  WHERE idpastoforraje = '$pastoForrajeId'";
    $result = $conn->query($sql);
    return $result;
  }

}

?>
