<?php

require_once 'data.php';
include '../domain/socio.php';

class actaAprobacionData extends Data{

	 private $data;


    function actaAprobacionData(){ 
        
        $this->data = new Data();
    }


     public function insertarActaAprobacionData($actaAprobacion){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbactaaprobacion(socioid,actaaprobacionsecion,actaaprobacionfecha,actaaprobacioncondicion,actaaprobacionmotivo)
        VALUES ('".
                $actaAprobacion->getIdSocio()."','".
                $actaAprobacion->getSecion()."','".
                $actaAprobacion->getFecha()."','".
                $actaAprobacion->getCondicion()."','".
                $actaAprobacion->getMotivo(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }




    public function sociosEnProgreso(){
         $socio = array();
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre()); 
        $sql="SELECT * FROM tbsocio INNER JOIN tbactaaprobacion ON tbsocio.socioid=tbactaaprobacion.socioid AND tbactaaprobacion.actaaprobacioncondicion='progreso'";

            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {


                    array_push($socio, new socio($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                        ,$row["sociocorreo"],$row["sociofechaingreso"] ,$row["tipoactividadnombre"] ,$row["fincatiponombre"] ,$row["socioestadodetalle"] ));
                }
            }else{
                echo "0 results";
            }
            $conn->close();
            
            return $socio;

    } 


    public function actualizarActaAprobacionCondicion($sicioId,$condicion,$mottivo){
         $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre()); 

           if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "UPDATE tbactaaprobacion SET   actaaprobacioncondicion = '".$condicion."', actaaprobacionmotivo = '".$motivo."'   WHERE socioid = '".$sicioId."' ; ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;        

    }        


}

?>