<?php

require_once 'data.php';
//include '../domain/socio.php';

class tipoFincaData extends Data{

    public $data;

    function __construct(){ 
        $this->data = new Data();
    }

 public function getAllTBTiposFincas() {
        $fincas = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbfincatipo";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $fincas[] = $row["fincatiponombre"];
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $fincas;
    }
}



?>