<?php

//include 'data.php';
require_once 'data.php';
include '../domain/finca.php';


class FincaData extends Data{

	 private $data;

    function __construct(){ 

        $this->data = new Data();
    }


    public function insertarFinca($finca){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfinca (socioid,fincaarea,fincacantidadbobinos)
        VALUES ('".
                $finca->getSocioId()."','".
                $finca->getArea()."','".
                $finca->getCantidadBovinos() . "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }



    public function  obtenerDatosFinca($cedulasocio){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $socioinformacion = "";
        $sql = "SELECT tbsocio.socionombre, tbsocio.socioprimerapellido,tbsocio.sociosegundoapellido, tbfincadireccion.fincaprovincia, tbfincadireccion.fincacanton, tbfincadireccion.fincadistrito, tbfincadireccion.fincapueblo,
            tbfincadireccion.fincaexacta , tbfinca.fincaarea, tbfinca.fincacantidadbobinos,
            tbfincatipo.fincatiponombre , tbtipoactividad.tipoactividadnombre
            FROM tbsocio INNER JOIN tbfinca ON tbsocio.socioid = tbfinca.socioid  INNER JOIN tbfincadireccion ON tbfinca.fincaid = tbfincadireccion.fincaid 
            INNER JOIN  tbfincatipo 
            ON  tbfincatipo.fincatipoid = tbsocio.fincatipoid INNER JOIN tbtipoactividad   ON tbsocio.tipoactividadid = tbtipoactividad.tipoactividadid
 
            AND tbsocio.sociocedula = '".$cedulasocio."' ; ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socioinformacion = ["socionombre"=>$row["socionombre"], "socioprimerapellido"=> $row["socioprimerapellido"],"sociosegundoapellido"=>$row["sociosegundoapellido"], 

                "fincaprovincia"=>$row["fincaprovincia"], "fincacanton"=>$row["fincacanton"],"fincadistrito"=>$row["fincadistrito"]
                    ,"fincapueblo"=>$row["fincapueblo"],"fincaexacta"=>$row["fincaexacta"] , "fincaarea"=>$row["fincaarea"] ,"fincacantidadbobinos"=>$row["fincacantidadbobinos"],"fincatiponombre"=>$row["fincatiponombre"],"tipoactividadnombre"=>$row["tipoactividadnombre"]];
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($socioinformacion);
    }

    public function verificarFinca($cedula){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "SELECT tbfinca.fincaarea FROM tbfinca
        INNER JOIN tbsocio ON tbfinca.socioid = tbsocio.socioid
        AND tbsocio.sociocedula = '".$cedula."' ;" ;

       $result = $conn->query($sql);
        if($result->num_rows > 0) {
            return 1;
        }else{
            return 0;
        }        

    }

    public function  obtenerDatosFincaModificar($cedulasocio){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $socioinformacion = "";
        $sql = "SELECT  tbfincadireccion.fincaprovincia, tbfincadireccion.fincacanton, tbfincadireccion.fincadistrito, tbfincadireccion.fincapueblo,
            tbfincadireccion.fincaexacta , tbfinca.fincaarea, tbfinca.fincacantidadbobinos,
            tbfincatipo.fincatipoid , tbtipoactividad.tipoactividadid
            FROM tbsocio INNER JOIN tbfinca ON tbsocio.socioid = tbfinca.socioid  INNER JOIN tbfincadireccion ON tbfinca.fincaid = tbfincadireccion.fincaid 
            INNER JOIN  tbfincatipo 
            ON  tbfincatipo.fincatipoid = tbsocio.fincatipoid INNER JOIN tbtipoactividad   ON tbsocio.tipoactividadid = tbtipoactividad.tipoactividadid
 
            AND tbsocio.sociocedula = '".$cedulasocio."' ; ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socioinformacion = ["fincaprovincia"=>$row["fincaprovincia"], "fincacanton"=>$row["fincacanton"],"fincadistrito"=>$row["fincadistrito"]
                    ,"fincapueblo"=>$row["fincapueblo"],"fincaexacta"=>$row["fincaexacta"] , "fincaarea"=>$row["fincaarea"] ,"fincacantidadbobinos"=>$row["fincacantidadbobinos"],"fincatipoid"=>$row["fincatipoid"],"tipoactividadid"=>$row["tipoactividadid"]];
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($socioinformacion);
    }


      public function insertarTBFincaDireccion($fincaDireccion){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbfincadireccion (fincaprovincia,fincacanton, fincadistrito,fincapueblo,fincaexacta)
        VALUES ('".$fincaDireccion->getProvincia()."','".$fincaDireccion->getCanton()."','".$fincaDireccion->getDistrito()."','".$fincaDireccion->getPueblo()."','".$fincaDireccion->getDireccionExacta()."');";


        


         if ( ( $result = $conn->query($sql)) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record FINCADIFREDDION: " . $conn->error;
        }

        $conn->close();
        return $result;

    }



 	public function actualizarTBfinca($finca) {

	    $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }
 
	    $sql = "UPDATE tbfinca SET fincaarea='".$finca-> getArea()."', fincacantidadbobinos = '".
                $finca->getCantidadBovinos()."'  WHERE socioid ='". $finca-> getSocioId()."' ;";

	    if ($result = $conn->query($sql) === TRUE) {
				 echo "Record updated successfully";
		} else {
				 echo "Error updating record: " . $conn->error;
		}
	    $conn->close();
	    return $result;
 	}

    public function actualizarTBFincaDireccion($fincaDireccion) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        $sql = "UPDATE tbsociodireccion SET socioprovincia= '".$fincaDireccion->getProvincia()."',sociocanton='".$fincaDireccion->getCanton()."',sociodistrito='".$fincaDireccion->getDistrito()."',sociopueblo='".$fincaDireccion->getDireccionExacta()."' WHERE socioid= '".$fincaDireccion->getSocioId()."'";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }


	public function eliminarTBfinca($idfinca) {

		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE from tbfinca where socioid='".$idfinca."';";
		$result = $conn->query($sql);
		$conn->close();

		return $result;
	}
    public function obtenerFinca($idsocio){
    //     require '../domain/finca.php';
         $finca;
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
            $sql = "SELECT * FROM tbfinca WHERE  socioid = $idsocio";

            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   $finca= [ "fincaid"=>$row['fincaid'], 
                    "socioid"=>$row['socioid'], 
                    "fincaarea"=>$row['fincaarea'],
                    "fincacantidadbobinos"=>$row['fincacantidadbobinos']]; 
                }   
            }else{
                echo "0 results";
            }
            $conn->close();

        return json_encode($finca);

    }

    public function obtenerTodosTBfinca() {
        $fincas  = array();
        require '../domain/todoFinca.php';
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
            $sql = "
            SELECT tbsocio.sociocedula, tbsocio.socionombre, tbsocio.socioprimerapellido,
            tbsocio.sociosegundoapellido, 
            tbfinca.fincaarea, tbfinca.fincacantidadbobinos,  tbfincatipo.fincatiponombre, 
            tbtipoactividad.tipoactividadnombre  FROM tbsocio 
            INNER JOIN tbfinca ON  tbsocio.socioid = tbfinca.fincaid 
            INNER JOIN tbfincatipo ON tbsocio.fincatipoid = tbfincatipo.fincatipoid
            INNER JOIN tbtipoactividad ON tbtipoactividad.tipoactividadid = tbsocio.tipoactividadid;";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               array_push($fincas,new TodoFinca($row['sociocedula'], $row['socionombre'], 
                $row['socioprimerapellido'],$row['sociosegundoapellido'], $row['fincaarea'],
                $row['fincacantidadbobinos'],$row['fincatiponombre'],$row['tipoactividadnombre'])); 
          //     echo $row['tipoactividadnombre'];
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $fincas;
    }
}

?>