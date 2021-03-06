
<?php
require_once  'data.php';
require_once'../domain/junta.php';

class JuntaData extends Data {

    private $data;

    function __construct(){ 
        $this->data = new Data();
    }

    public function insertarTBJunta($junta) {
       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        $conn->set_charset("utf8");
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


        $result = $conn->query($sql);
        $conn->close();
        return  $result;
    }

    public function actualizarTBJunta($junta) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
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
            WHERE idjunta='" . $junta->getIdTBJunta() . "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

        $conn->close();
        return $result;
    }

    public function eliminarTBJunta($idjunta) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "DELETE from tbjunta where idjunta='".$idjunta."';";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    //(idjunta, juntapresidente, juntavicepresidente,juntatesorero,juntasecretario,juntavocal1,juntavocal2,juntavocal3)
    public function obtenerTodosTBJunta() {
        //dos  parametros
        $junta = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre()); 
         $conn->set_charset("utf8"); 
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
    
}

?>
