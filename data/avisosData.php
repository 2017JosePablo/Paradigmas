<?php
require_once 'data.php';

class avisosData {

	public $data;

    function avisosData(){

        $this->data = new Data();
    }

    public function insertarTBAvisos($aviso) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO tbaviso (socioid,temaaviso,detalleaviso,rutafotoaviso)
        VALUES ('" .
                $login->getSocioId() ."','".
                $login->getTema() ."','" .
                $login->getDetalle()."','".
                $login->getRutaFoto(). "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

	public function actualizarAviso($aviso){

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="UPDATE tbaviso SET temaaviso ='".$aviso->getTema()."', detalleaviso='".$aviso->getDetalle()."',rutafotoaviso='".$aviso->getRutaFoto()."' WHERE socioid='".$aviso->getSocioId()."';";
        $result = $conn->query($sql);
        $conn->close();
        return $result;



	}

	public function mostrarTodosAvisos(){
		 $avisos = array();
        require '../domain/aviso.php';
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT *FROM tbaviso";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($avisos, new Aviso($row["idaviso"],$row["socioid"],$row["temaaviso"],$row["detalleaviso"],$row["rutafotoaviso"]));
			}
        }else{
            echo "0 results";
        }
        $conn->close();
         return $avisos;
	}
	public function getIndiceImagen($idsocio){
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
				}
				$cont = 0;
				$sql = "SELECT * FROM tbaviso WHERE socioid= '".$idsocio."';";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
								$cont++;
							}
				}
				$conn->close();
				return $cont;
	}
}
 ?>
