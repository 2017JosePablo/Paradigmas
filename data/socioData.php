<?php


include '../domain/socio.php';

class socioData {

	public $data;

    function socioData(){ 
        require 'data.php';
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
    
    public function actualizarDatoActividad($idsocio , $tipofincaTemporal, $tipoactividad){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "UPDATE tbsocio  SET   fincatipoid = '$tipofincaTemporal', tipoactividadid = '$tipoactividad'   WHERE socioid = '$idsocio' ; ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;        


    }
    
    
    public function editarEstado($cedula){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "UPDATE tbsocio  SET  estadosociodetalle = '3' WHERE sociocedula = '".$cedula."' ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function devolverDatosSocio($tipoactividadid,$tipofinca,$estadosociodetalle){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT tbtipoactividad.tipoactividadnombre ,tbfincatipo.fincatiponombre,  tbsocioestado.socioestadodetalle FROM tbtipoactividad INNER JOIN tbfincatipo ON fincatipoid= '".$tipoactividadid."' INNER JOIN tbsocioestado ON socioestadoid = '".$tipofinca."' 
            AND tbtipoactividad.tipoactividadid = '".$tipoactividadid."' ;";

        $result = $conn->query($sql);

        $informacionsocio ="";

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $informacionsocio = ["tipoactividadnombre"=>$row["tipoactividadnombre"],
                "fincatiponombre"=>$row["fincatiponombre"] ,
                "socioestadodetalle"=>$row["socioestadodetalle"] ];
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($informacionsocio);


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
        $sql = " SELECT tbsocio.socioid,tbsocio.sociocedula,tbsocio.socionombre,
tbsocio.socioprimerapellido,tbsocio.sociosegundoapellido ,
tbsocio.sociotelefono, tbsocio.sociocorreo,tbsocio.tipoactividadid,
tbsocio.fincatipoid, tbsocio.sociofechaingreso,tbsocio.estadosociodetalle,
tbsociodireccion.socioprovincia  ,  tbsociodireccion.sociocanton 
,  tbsociodireccion.sociodistrito ,  tbsociodireccion.sociopueblo   
FROM tbsocio INNER JOIN tbsociodireccion ON  tbsocio.socioid = tbsociodireccion.socioid 
AND  tbsocio.sociocedula = '".$cedula."' ;";


        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socio = [
                    "idsocio"=>$row["socioid"], 
                    "sociocedula"=> $row["sociocedula"],
                    "socionombre"=>$row["socionombre"], 
                    "socioprimerapellido"=>$row["socioprimerapellido"], 
                    "sociosegundoapellido"=>$row["sociosegundoapellido"],
                    "sociotelefono"=>$row["sociotelefono"],
                    "sociocorreo"=>$row["sociocorreo"],
                    "tipoactividadid"=>$row["tipoactividadid"] , 
                    "fincatipoid"=>$row["fincatipoid"] ,
                    "sociofechaingreso"=>$row["sociofechaingreso"] ,
                    "estadosociodetalle"=>$row["estadosociodetalle"],
                    "socioprovincia"=>$row["socioprovincia"] ,
                    "sociocanton"=>$row["sociocanton"],
                    "sociodistrito"=>$row["sociodistrito"],
                    "sociopueblo"=>$row["sociopueblo"]
                 ];


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
        $booleano = 0;
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        $consulta = "SELECT  * FROM tbsocio WHERE sociocedula = '$cedula'";
        $result = $conn->query($consulta);
//mysqli_num_rows()
    if(mysqli_num_rows($result) > 0){
        $booleano = 1;
         
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

    public function insertarTBSocioDireccion($socioDireccion){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbsociodireccion (socioprovincia,sociocanton,sociodistrito,sociopueblo)
        VALUES ('" .
                $socioDireccion->getProvincia()."','".
                $socioDireccion->getCanton()."','".
                $socioDireccion->getDistrito()."','".
                $socioDireccion->getPueblo() . "');";


        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }
  
    public function actualizarTBSocioDireccion($temp) {
        echo "Id de socio: ".$temp->getIdSocioDir()."</br>";
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbsociodireccion SET socioprovincia='".$temp->getProvincia()."',sociocanton = '".$temp->getCanton()."', sociodistrito = '".$temp->getDistrito()."',sociopueblo = '".$temp->getPueblo()."' WHERE socioid ='".$temp->getIdSocioDir()."';";

        if ($result = $conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }

    


    public function actualizarTBsocio($socio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        echo "Id de usuario : ".$socio->getSocioId()."</br>";
        $sql = "UPDATE tbsocio SET sociocedula= '".$socio->getCedula()."',socionombre='".$socio->getNombre()."'  ,socioprimerapellido= '".$socio->getPrimerApellido()."' ,sociosegundoapellido='".$socio->getSegundoApellido()."',sociotelefono='".$socio->getTelMovil()."',sociocorreo='".$socio->getCorreo()."',tipoactividadid='".$socio->getTipoActividadId()."',fincatipoid  ='".$socio->getFincaTipo()."', sociofechaingreso= '".$socio->getFechaIngreso()."',estadosociodetalle='".$socio->getEstadoSocioDetalle()."'  WHERE socioid= '".$socio->getSocioId()."';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }

    public function eliminartbsociodireccion($idsocioDireccion) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE from tbsociodireccion where socioid='".$idsocioDireccion."';";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    public function obtenerTodostbsociodireccion() {
        $socioDireccion = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
        $sql = "SELECT  * FROM tbsociodireccion";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($socioDireccion,new SocioDireccion($row['socioid'],$row['socioprovincia'],$row['sociocanton'],$row['sociodistrito'],['sociopueblo']));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socioDireccion;
    }

}
?>