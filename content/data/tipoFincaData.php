<?php

require_once 'data.php';

class tipoFincaData extends  Data {
    public $data;

    function __construct(){
        $this->data= new Data();
    }

    public function getAllTBTiposFincas() {
        $fincas = array();
        include '../domain/fincaTipo.php';
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        $conn->set_charset('utf8');  
        $sql = "SELECT * FROM tbfincatipo";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($fincas, new fincaTipo($row['fincatipoid'] , $row['fincatiponombre'] ));

            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $fincas;
    }
}



?>
