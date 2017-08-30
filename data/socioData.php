<?php

require_once 'data.php';
include '../domain/socio.php';

class socioData extends Data{

	public $data;

    function __construct(){ 
        $this->data = new Data();
    }
     public function insertarTBSocio($socio) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO tbsocio (sociocedula,socionombre,socioprimerapellido,sociosegundoapellido,sociotelefono,sociocorreo,tipoactividadid,fincatipoid,sociofechaingreso,estadosociodetalle)
        VALUES ('" .
                $socio->getCedula() ."','".
                $socio->getNombre() ."','" .
                $socio->getPrimerApellido()."','".
                $socio->getSegundoApellido()."','".
                $socio->getTelMovil() ."','" . 
                $socio->getCorreo() . "','" . 
                $socio->getTipoActividadId() . "','" . 
                $socio->getFincaTipo() . "','" . 
                $socio->getFechaIngreso() . "','".
                $socio->getEstadoSocioDetalle(). "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
     
      public function insertarTBSocioDireccion($socioDireccion){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbsociodireccion (socioprovincia,sociocanton, sociodistrito,sociopueblo)
        VALUES ('".$socioDireccion->getProvincia()."','".$socioDireccion->getCanton()."','".$socioDireccion->getDistrito()."','".$socioDireccion->getPueblo()."');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

    }

   
	 public function actualizarTBSocio($socio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbsocio SET socioidentificacion ='".$socio-> getCedula(). "',
            socionombre='" . $socio-> getNombre()."',
            socioprimerapellido='" . $socio-> getPrimerApellido()."',
            sociosegundoapellido='" . $socio-> getSegundoApellido()."',
            sociotelefonofjo='" . $socio-> getTelCasa()."',
            sociocelular='" . $socio-> getTelMovil()."'
            WHERE socioidentificacion 	 ='" . $socio-> getCedula(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }
      public function eliminarTBSocio($idsocio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbsocio where socioidentificacion='".$idsocio."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
     }

    public function obtenerUnTBSocio($cedula) {
        $socio;

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "
        SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre ,tbsocio.socioprimerapellido ,
        tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo, tbtipoactividad.tipoactividadnombre,
        tbfincatipo.fincatiponombre ,tbsocio.sociofechaingreso ,tbsocioestado.socioestadodetalle ,
        tbsociodireccion.socioprovincia, tbsociodireccion.sociocanton, tbsociodireccion.sociodistrito,
        tbsociodireccion.sociopueblo

        FROM tbsocio 
        INNER JOIN tbtipoactividad ON
        tbsocio.tipoactividadid = tbtipoactividad.tipoactividadid  
        INNER JOIN tbfincatipo ON tbfincatipo.fincatipoid  = tbsocio.fincatipoid 
        INNER JOIN tbsocioestado ON tbsocioestado.socioestadoid = tbsocio.estadosociodetalle 
        INNER JOIN  tbsociodireccion ON tbsociodireccion.socioid = tbsocio.socioid AND
        tbsocio.sociocedula =  '$cedula';";


        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socio = ["idsocio"=>$row["socioid"], "sociocedula"=> $row["sociocedula"],"socionombre"=>$row["socionombre"], "socioprimerapellido"=>$row["socioprimerapellido"], "sociosegundoapellido"=>$row["sociosegundoapellido"],"sociotelefono"=>$row["sociotelefono"]
                    ,"sociocorreo"=>$row["sociocorreo"],"tipoactividadnombre"=>$row["tipoactividadnombre"] , "fincatiponombre"=>$row["fincatiponombre"] ,"sociofechaingreso"=>$row["sociofechaingreso"] ,"socioestadodetalle"=>$row["socioestadodetalle"],"socioprovincia"=>$row["socioprovincia"] ,"sociocanton"=>$row["sociocanton"],"sociodistrito"=>$row["sociodistrito"],"sociopueblo"=>$row["sociopueblo"] ];


            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($socio);
    }


    public function obtenerUnSoloTBSocio($cedula) {
        $socio;

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "
        SELECT * FROM tbsocio WHERE sociocedula =  '$cedula';";


        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socio = ["idsocio"=>$row["socioid"], "sociocedula"=> $row["sociocedula"],"socionombre"=>$row["socionombre"], "socioprimerapellido"=>$row["socioprimerapellido"], "sociosegundoapellido"=>$row["sociosegundoapellido"],"sociotelefono"=>$row["sociotelefono"]
                    ,"sociocorreo"=>$row["sociocorreo"],"tipoactividadid"=>$row["tipoactividadid"] , "fincatipoid"=>$row["fincatiponid"] ,"sociofechaingreso"=>$row["sociofechaingreso"] ,"estadosociodetalle"=>$row["estadosociodetalle"],"socioprovincia"=>$row["socioprovincia"] ,"sociocanton"=>$row["sociocanton"],"sociodistrito"=>$row["sociodistrito"],"sociopueblo"=>$row["sociopueblo"] ];


            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($socio);
    }



      public function obtenerTodosTBSocio() {
        $socio = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre ,tbsocio.socioprimerapellido ,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo, tbtipoactividad.tipoactividadnombre, tbfincatipo.fincatiponombre ,tbsocio.sociofechaingreso ,tbsocioestado.socioestadodetalle FROM tbsocio INNER JOIN tbtipoactividad ON
            tbsocio.tipoactividadid = tbtipoactividad.tipoactividadid  
            INNER JOIN tbfincatipo ON tbfincatipo.fincatipoid  = tbsocio.fincatipoid 
            INNER JOIN tbsocioestado ON tbsocioestado.socioestadoid = tbsocio.estadosociodetalle;";

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


     public function obtenerSocioEstado() {
        $socio = array();
        require '../domain/socioEstado.php';
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT * FROM tbsocioestado";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($socio, new socioEstado($row["socioestadoid"],$row["socioestadodetalle"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socio;
    }

    public function verificarCedula($cedula){
        $booleano = false;
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        $consulta = "SELECT  * FROM tbsocio WHERE sociocedula = '$cedula'";
        $result = $conn->query($consulta);
//mysqli_num_rows()
    if(mysqli_num_rows($result) > 0){
        $booleano = true;
         
    }
        mysqli_close($conn);
        return $booleano;
    }

    public function getSocioId($cedula) {
        $idsocio = 0;
        
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $consulta = "SELECT * FROM tbsocio ";
        $sql = "SELECT * FROM tbsocio";
        $result = $conn->query($sql);
       
        while($row = $result->fetch_assoc()) {
            if($row['sociocedula'] == $cedula){
                $idsocio = $row['socioid'];
            }
        }
        
        $conn->close();
        
        return $idsocio;
    }
}
?>