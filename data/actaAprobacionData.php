<?php

require_once 'data.php';


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
                $actaAprobacion->getSocioID()."','".
                $actaAprobacion->getSecion()."','".
                $actaAprobacion->getFecha()."','".
                $actaAprobacion->getCondicion()."','".
                $actaAprobacion->getMotivo(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }




    public function sociosEnProgreso(){
        include '../domain/socio.php';
         $socio = array();
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre()); 
        $sql="SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre ,tbsocio.socioprimerapellido ,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo FROM tbsocio INNER JOIN tbactaaprobacion ON tbsocio.socioid=tbactaaprobacion.socioid AND tbactaaprobacion.actaaprobacioncondicion='progreso'";

            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

         array_push($socio, new socio($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"],$row["sociocorreo"],"","" ,"" ,"","","" ));
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