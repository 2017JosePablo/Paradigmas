<?php

include_once 'data.php';
//include '../domain/junta.php';

class JuntaData  {
private $conexion;
        function __construct(){
            $this->conexion = new conexion_data();
        }

    public function insertTBJunta($junta) {
    
        $conn = $this->conexion->crearConexion();

        $conn->set_charset('utf8');

    $queryInsert = "INSERT INTO tbjunta ('idjunta', 'juntapresidente', 'juntavicepresidente', 'juntatesorero', 'juntasecretario', 'juntavocal1', 'juntavocal2', 'juntavocal3') VALUES ('" .
                $junta->getIdTBJunta() . "','" .
                $junta->getPresidenteTBJunta() . "','" .
                $junta->getVicepresidenteJunta() . "','" .
                $junta->getTesoreroJunta() . "','" .
                $junta->getVocal1Junta() . "','" .
                $junta->getVocal2Junta() . "','" .
                $junta->getVocal3Junta() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }
}

?>