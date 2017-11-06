<?php

require_once 'data.php';


class reportesData extends Data{

	 private $data;


    function reportesData(){

        $this->data = new Data();
    }

    public function socioCantonDistrito(){
        require '../domain/datosSocioReportes.php';
        $socioCantonDistrito= array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql="SELECT tbsocio.socioid,tbsocio.sociocedula,tbsocio.socionombre,tbsocio.socioprimerapellido,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo,tbsociodireccion.socioprovincia,tbsociodireccion.sociocanton,tbsociodireccion.sociodistrito FROM tbsocio INNER JOIN tbsociodireccion ON tbsocio.socioid=tbsociodireccion.socioid AND tbsociodireccion.socioprovincia=3 AND tbsociodireccion.sociocanton=4 OR tbsocio.socioid=tbsociodireccion.socioid AND tbsociodireccion.socioprovincia=3 AND tbsociodireccion.sociocanton=5 OR tbsocio.socioid=tbsociodireccion.socioid AND tbsociodireccion.socioprovincia=3 AND tbsociodireccion.sociocanton=6 ORDER BY tbsociodireccion.sociocanton ASC, tbsociodireccion.sociodistrito ASC,tbsocio.socionombre ASC";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($socioCantonDistrito, new DatosSocioLogin($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                    ,$row["sociocorreo"],$row["socioprovincia"],$row["sociocanton"],$row["sociodistrito"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $socioCantonDistrito;
    }


    public function socioTipoFinca(){
        require '../domain/datosSocioReportes.php';
        $socioCantonDistrito= array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql="SELECT tbsocio.socioid,tbsocio.sociocedula,tbsocio.socionombre,tbsocio.socioprimerapellido,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo,tbfincatipo.fincatiponombre FROM tbsocio INNER JOIN tbfincatipo ON tbsocio.fincatipoid=tbfincatipo.fincatipoid ORDER BY tbfincatipo.fincatiponombre ASC,tbsocio.socionombre ASC";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($socioCantonDistrito, new DatosSocioLogin($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                    ,$row["sociocorreo"],$row["fincatiponombre"],"",""));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $socioCantonDistrito;
    }


<<<<<<< HEAD
=======

    public function hatoConsolidado(){
        $datos= "<table border = '1'><tr><td align = 'center'>Bovino</td>  <td>Cantidad</td></tr>";
        $cantTotal=0;
        $columna= array("hatoternero","hatoternera","hatonovillo","hatonovilla","hatonovillaprenada","hatotoroservicio","hatotoroengorde","hatovacacria","hatovacaengorde");

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection 
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

         for ($i=0; $i <sizeof($columna) ; $i++) {
            $sql="SELECT SUM($columna[$i]) AS $columna[$i] FROM tbhato";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $datos=$datos."<tr><td>".$columna[$i]."</td><td>".$row[$columna[$i]]."</td></tr> ";
                $cantTotal+=$row[$columna[$i]];
            }

        }else{
            echo "0 results";
        }
            
        }
        $datos=$datos."<tr><td>Cantidad Total</td><td>".$cantTotal."</td></tr></table> ";
        $conn->close();

        return $datos;
    } 

      public function cantBovinosxDistrito(){
        $datos= "<table border = '1'><tr><td align = 'center'>Bovino</td>  <td>Cantidad</td></tr>";
        $cantTotal=0;
        $columna= array("hatoternero","hatoternera","hatonovillo","hatonovilla","hatonovillaprenada","hatotoroservicio","hatotoroengorde","hatovacacria","hatovacaengorde");
        $cantones= array(4,5,6); 
         


        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection 
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $x=4;
        for ($r=0; $r <sizeof($cantones) ; $r++) { //corre cantones

            if($cantones[$x]==4){//si es distrito 4
                $distrito=1;
                for ($k=0; $k <3 ; $k++) { //corre distritos de canton 4
                    for ($i=0; $i <sizeof($columna) ; $i++) {
                        $sql="SELECT SUM(hatoternero) AS hatoternero FROM tbhato INNER JOIN tbfincadireccion ON tbhato.socioid=tbfincadireccion.fincaid AND tbfincadireccion.fincaprovincia=3 AND tbfincadireccion.fincacanton=4 AND tbfincadireccion.fincadistrito= 1 ORDER BY tbfincadireccion.fincacanton ASC, tbfincadireccion.fincadistrito ASC";
                        $sql="SELECT SUM($columna[$i]) AS $columna[$i] FROM tbhato";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               $datos=$datos."<tr><td>".$columna[$i]."</td><td>".$row[$columna[$i]]."</td></tr> ";
                                $cantTotal+=$row[$columna[$i]];
                            }

                        }else{
                            echo "0 results";
                        }
                        
                    }                   
                }
                $x=5;


            }else if($cantones[$x]==5){

                $x=6;
            }else if($cantones[$x]==6){


            }

            
        }



        $datos=$datos."<tr><td>Cantidad Total</td><td>".$cantTotal."</td></tr></table> ";



        $conn->close();

        return $datos;
    } 

>>>>>>> e71ecbfbf4b153d01fcdbf86fb11603d1e8af3ea



}
?>
