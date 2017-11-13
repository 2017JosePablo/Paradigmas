<?php


require_once 'data.php';

class pagoAnualidadData extends Data{

	 private $data;


    function pagoAnualidadData(){ 
        
        $this->data = new Data();
    }


     public function insertarPagoAnualidad($pagoanualidad){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
         $conn->set_charset("utf8");

  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbpagoanualidad (socioid,pagoanualidadanterior,pagoanualidadactual,pagoanualidadproximo,pagoanualidadidestado)
        VALUES ('".
                $pagoanualidad->getIdSocio()."','".
                $pagoanualidad->getFechaVencimientoAnterior()."','".
                $pagoanualidad->getFechaPago()."','".
                $pagoanualidad->getFechaVencimientoProximo()."','".
                $pagoanualidad->getEstado(). "')";

        $result = $conn->query($sql);

        $conn->close();
        return $result;

    }


    public function actualizarPagoAnualidad($pagoanualidad) {
        
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbpagoanualidad SET pagoanualidadanterior='".$pagoanualidad->getFechaVencimientoAnterior()."',  pagoanualidadactual = '".$pagoanualidad->getFechaPago()."', pagoanualidadproximo = '".$pagoanualidad->getFechaVencimientoProximo()."' WHERE socioid ='".$pagoanualidad->getIdSocio()."';";

        if ($result = $conn->query($sql) === TRUE) {
                 echo "Record updated successfully";
        } else {
                 echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $result;
    }
    



    public function  obtenerFechasSocio($socioid) {
        require '../domain/anualidad.php';
        $socioAnualidad="";
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
         $conn->set_charset("utf8");
        $sql = "SELECT * FROM tbpagoanualidad WHERE socioid='".$socioid."'  ORDER BY tbpagoanualidad.pagoanualidadanterior DESC ";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $socioAnualidad= ["pagoanualidadanterior"=>$row["pagoanualidadanterior"],
                "pagoanualidadactual"=>$row["pagoanualidadactual"] ,
                "pagoanualidadproximo"=>$row["pagoanualidadproximo"] ];
                break;
                
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return json_encode($socioAnualidad);

    }


    public function sacarMorosos(){
        include '../domain/socio.php';

        $socio = array();
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre()); 
         $conn->set_charset("utf8"); 
         $sql="SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre ,tbsocio.socioprimerapellido ,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo FROM tbsocio INNER JOIN tbpagoanualidad ON tbsocio.socioid = tbpagoanualidad.socioid AND tbpagoanualidad.pagoanualidadidestado = 'debe';";

         $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {


                  array_push($socio, new socio($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                        ,$row["sociocorreo"],"","" ,"" ,"","","","","" ));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $socio;

    }


    public function sacarMorososEnFechas($fecha1,$fecha2){
        include '../domain/socio.php';

            $socio = array();
             $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
              $conn->set_charset("utf8");

             $sql="SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre ,tbsocio.socioprimerapellido ,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo FROM tbsocio INNER JOIN tbpagoanualidad ON tbsocio.socioid = tbpagoanualidad.socioid AND tbpagoanualidad.pagoanualidadidestado = 'debe' AND tbpagoanualidad.pagoanualidadproximo BETWEEN '".$fecha1."' AND '".$fecha2."'";

             $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {


                    array_push($socio, new socio($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                        ,$row["sociocorreo"],"","" ,"" ,"","","","",""));
                }
            }else{
                echo "0 results";
            }
            $conn->close();
            
            return $socio;

        }



        public function calcularMorosos($fecha){
             $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  
              $conn->set_charset("utf8");
             $sql="SELECT * FROM tbpagoanualidad WHERE tbpagoanualidad.pagoanualidadproximo<'".$fecha."' AND tbpagoanualidad.pagoanualidadidestado !='debe'";
              $result = $conn->query($sql);
             
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql = "UPDATE tbpagoanualidad  SET   pagoanualidadidestado = 'debe'   WHERE socioid = '".$row["socioid"]."' ; ";  
                    $conn->query($sql);

                }
            }

            $conn->close();
        }


}

?>