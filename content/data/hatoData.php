<?php
require_once 'data.php';
require_once '../domain/hato.php';

class hatoData extends Data{

	 private $data;

    function __construct(){

        $this->data = new Data();
    }
     public function insertarTBHato($hato) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
       $conn->set_charset("utf8");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbhato (socioid,hatoraza,hatoternero,hatoternera,hatonovillo,hatonovilla,hatonovillaprenada,hatotoroservicio,hatotoroengorde,hatovacacria,hatovacaengorde)
        VALUES ('" .

                $hato->getPropietario() . "','" .
                $hato->getListadoRazas() . "','" .
                $hato->getTerneros() . "','" .
                $hato->getTerneras() . "','" .
                $hato->getNovillos() . "','" .
                $hato->getNovillas() . "','" .
                $hato->getNovillasPrenadas() . "','" .
                $hato->getTorosEngorde() . "','" .
                $hato->getTorosServicio() . "','" .
                $hato->getvacasCria() . "','" .
                $hato->getvacasEngorde() . "');";



        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
	 public function actualizarTBHato($hato) {

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbhato SET
            hatoraza='" . $hato-> getListadoRazas()."',
            hatoternero=    '" . $hato-> getTerneros()."',
            hatoternera='" . $hato-> getTerneras()."',
            hatonovillo='" . $hato-> getNovillos()."',
            hatonovilla='" . $hato-> getNovillas()."',
            hatonovillaprenada='" . $hato-> getNovillasPrenadas()."',
            hatotoroengorde='".$hato-> getTorosEngorde()."',
            hatotoroservicio='".$hato-> getTorosServicio()."',
            hatovacacria='".$hato-> getvacasCria()."',
            hatovacaengorde='" . $hato-> getvacasEngorde()."'
            
            WHERE socioid ='" . $hato-> getPropietario(). "';";

        //    echo $sql;

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }

     public function eliminarTBHato($socioid) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE from tbhato where socioid='".$socioid."';";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
    public function obtenerTodosTBHato() {
        $hato = array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        $sql = "SELECT * FROM tbhato";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($hato, new hato($row["socioid"],$row["hatoraza"],$row["hatoternero"],$row["hatoternera"],$row["hatonovillo"],$row["hatonovilla"],$row["hatonovillaprenada"],$row["hatotoroengorde"],$row["hatotoroservicio"],$row["hatovacacria"],$row["hatovacaengorde"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $hato;
    }

public function obtenerSocioHatoModificar($idsocio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        $hato="0 results";
        $sql = "SELECT * FROM tbhato WHERE socioid = $idsocio";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $hato = ["socioid"=>$row["socioid"],"hatoraza"=>$row["hatoraza"],"hatoternero"=>$row["hatoternero"],"hatoternera"=>$row["hatoternera"],"hatono"=>$row["hatonovillo"],"hatonovilla"=>$row["hatonovilla"],"hatonovillaprenada"=>$row["hatonovillaprenada"],"hatotoroengorde"=>$row["hatotoroengorde"],"hatotoroservicio"=>$row["hatotoroservicio"],"hatovacacria"=>$row["hatovacacria"],"hatovacaengorde"=>$row["hatovacaengorde"]];
            }
        }

        $conn->close();

        return json_encode($hato);
    }


  public function verificarSocioHato($idsocio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        $hato=FALSE;
        $sql = "SELECT * FROM tbhato WHERE socioid = $idsocio";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                if ($row["hatoternero"]>0||$row["hatoternera"]>0||$row["hatonovillo"]>0||$row["hatonovilla"]>0||$row["hatonovillaprenada"]>0||$row["hatotoroengorde"]>0||$row["hatotoroservicio"]>0||$row["hatovacacria"]>0||$row["hatovacaengorde"]){
                    $hato = TRUE;
                }
            }
        }

        $conn->close();

        return $hato;
    }


    public function obtenerSocioHato($idsocio) {
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");
        $hato="0 results";
        $sql = "SELECT * FROM tbhato WHERE socioid = $idsocio";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $hato = ["socioid"=>$row["socioid"],"hatoraza"=>$this->desomponerLinea($row["hatoraza"]),"hatoternero"=>$row["hatoternero"],"hatoternera"=>$row["hatoternera"],"hatono"=>$row["hatonovillo"],"hatonovilla"=>$row["hatonovilla"],"hatonovillaprenada"=>$row["hatonovillaprenada"],"hatotoroengorde"=>$row["hatotoroengorde"],"hatotoroservicio"=>$row["hatotoroservicio"],"hatovacacria"=>$row["hatovacacria"],"hatovacaengorde"=>$row["hatovacaengorde"]];
            }
        }

        $conn->close();

        return json_encode($hato);
    }
    public function desomponerLinea($listaRazas)
    {
        
        $lista = explode(",",$listaRazas);

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
         $conn->set_charset("utf8");

        $raza="";

        $sql = "SELECT * FROM tbraza ";
        $result = $conn->query($sql);
     

            while($row = $result->fetch_assoc()) {

                for ($i=0; $i < count($lista); $i++) { 

                    if ($row["idraza"] == $lista[$i]) {
                        $raza = $raza .$row["razanombre"].",";
                    }
                        
                }   
            }

        $conn->close();
        return $raza;
    }
}

?>
