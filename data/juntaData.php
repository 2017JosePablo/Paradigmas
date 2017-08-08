<?php
include 'data.php';
include '../domain/junta.php';

class JuntaData extends Data {

    private $data;

    function __construct(){ 
        $this->data = new Data();
    }

    public function insertTBJunta($junta) {
       $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbjunta (idjunta, juntapresidente, juntavicepresidente,juntatesorero,juntasecretario,juntavocal1,juntavocal2,juntavocal3)
        VALUES ('" .
                $junta->getIdTBJunta() . "','" .
                $junta->getPresidenteTBJunta() . "','" .
                $junta->getVicepresidenteJunta() . "','" .
                $junta->getTesoreroJunta() . "','" .
                $junta->getSecretarioJunta() . "','" .
                $junta->getVocal1Junta() . "','" .
                $junta->getVocal2Junta() . "','" .
                $junta->getVocal3Junta() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }
}

?>
