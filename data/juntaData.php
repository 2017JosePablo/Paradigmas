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

<<<<<<< HEAD
        $result = $conn->query($sql);
        $conn->close();
        return  $result;
    }

    public function updateTBJunta($junta) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "UPDATE tbjunta SET idjunta='".$junta->getIdTBJunta() . "',
            juntapresidente='" . $junta->getPresidenteTBJunta() ."',
            juntavicepresidente='" . $junta->getVicepresidenteJunta() ."',
            juntatesorero='" . $junta->getTesoreroJunta() ."',
            juntasecretario='" . $junta->getSecretarioJunta() ."',
            juntavocal1='" . $junta->getVocal1Junta() ."',
            juntavocal2='" . $junta->getVocal2Junta() ."',
            juntavocal3='".$junta->getVocal3Junta()."' 
            WHERE idjunta=" . $junta->getIdTBJunta() . ";";

        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function deleteTBJunta($idjunta) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "DELETE from tbjunta where idjunta='".$idjunta."';";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    //(idjunta, juntapresidente, juntavicepresidente,juntatesorero,juntasecretario,juntavocal1,juntavocal2,juntavocal3)
    public function getAllTBJunta() {
        //dos  parametros
        $junta = array();

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());  
        $sql = "SELECT * FROM tbjunta";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($junta, new Junta($row["idjunta"],$row["juntapresidente"],$row["juntavicepresidente"],$row["juntatesorero"],$row["juntasecretario"],$row["juntavocal1"],$row["juntavocal2"],$row["juntavocal3"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        return $junta;
    }
    public function getBullsInventary() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "select tbbull.idtbbull as 'idtbbull', CONCAT(tbbull.namebull, "
                . "' - ', tbbull.codebull) as 'bull', tbbull.strawsquantity as "
                . "'strawsquantity' from tbbull group by tbbull.idtbbull; ";
        $result = mysqli_query($conn, $querySelect);
        
        $bulls = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentBull = array('idtbbull' => $row['idtbbull'], 
                'bull' => $row['bull'], 
                'strawsquantity' => $row['strawsquantity']);
            array_push($bulls, $currentBull);
        }
        
        $newBulls = [];
        foreach ($bulls as $currentBull) {
            $querySelect = "select sum(tbinsemination.strawsquantity) as 'strawsquantity' " .
            "from tbinsemination where bull =" . $currentBull['idtbbull'] . " group by tbinsemination.bull;";
            $result = mysqli_query($conn, $querySelect);
            $row = mysqli_fetch_array($result);
            $quantityStrawsUse = $row[0];
            $currentBull['strawsquantity'] = $currentBull['strawsquantity'] - $quantityStrawsUse;
            array_push($newBulls, $currentBull);
        }
        
        mysqli_close($conn);
        return $newBulls;
        
    }

=======
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }
>>>>>>> 91c1509513c951041cad0f8cd569b3347321e39f
}

?>
