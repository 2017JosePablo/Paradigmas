<?php

require_once 'data.php';
class tipoFincaData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


 public function obtenerTodosTB() {
        $socio = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbfincatipo";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($socio, new socio($row["fincatipoid"],$row["fincatiponombre"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socio;
    }
}



?>