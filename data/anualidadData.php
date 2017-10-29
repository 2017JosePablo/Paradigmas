<?php


require_once 'data.php';


class anualidadData extends Data{

	 private $data;

    function anualidadData(){

        $this->data = new Data();
    }


    public function insertarAnualidad($anualidad){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbanualidad (responsableid,anualidadmonto,anualidadfechaactualizacion)
        VALUES ('".
                $anualidad->getResponsableId()."','".
                $anualidad->getMonto()."','".
                $anualidad->getFechaActualizacion(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }

    public function actualizarPagoAnualidad($anualidad) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbanualidad SET responsableid='".$anualidad->getResponsableId()."',anualidadmonto = '".$anualidad->getMonto()."', 	anualidadfechaactualizacion = '".$anualidad->getFechaActualizacion()."' WHERE socioid ='".$anualidad->getResponsableId()."' and anualidadid='".$anualidad->getAnualidadId()."';";

        if ($result = $conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }

    
	public function obtenerTodosTBAnualidad() {
        include '../domain/montoAnualidad.php';
        $anualidad = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        $sql = "SELECT * FROM tbanualidad";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($anualidad,new MontoAnualidad($row['anualidadid'],$row['anualidadmonto'],$row['responsableid'],$row['anualidadfechaactualizacion']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $anualidad;
    }


    public function calcularMonto($socioId){
        include '../domain/montoAnualidad.php';
         $anualidad = array();

         $sql = "SELECT tbanualidad.anualidadmonto, tbanualidad.anualidadfechaactualizacion  FROM tbanualidad INNER JOIN tbpagoanualidad ON tbanualidad.anualidadfechaactualizacion >= tbpagoanualidad.pagoanualidadanterior AND tbanualidad.anualidadfechaactualizacion <= tbpagoanualidad.pagoanualidadproximo AND tbpagoanualidad.socioid = '".$socioId."'";

          $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($anualidad,new MontoAnualidad("",$row['anualidadmonto'],"",$row['anualidadfechaactualizacion']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $anualidad;

    }


}

?>
