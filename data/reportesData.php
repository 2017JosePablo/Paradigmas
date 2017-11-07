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
        $datos= "<table border = '1'><tr><td align = 'center'>Canton - Distrito</td>  <td>Cantidad de Bovinos</td></tr>";
        $cantTotal=0;
        $columna= array("hatoternero","hatoternera","hatonovillo","hatonovilla","hatonovillaprenada","hatotoroservicio","hatotoroengorde","hatovacacria","hatovacaengorde");
        $cantones= array(4,5,6); 
        $dis4=array("Juan Viñas","Tucurrique","Pejibaye");
        $dis5=array("Turrialba","La Suiza","Peralta","Santa Cruz","Santa Teresita","Pavones","Tuis","Tayutic","Santa Rosa","Tres Equis","La Isabel","Chirripó");
         $dis6=array("Pacayas","Cervantes","Capellades");


        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection 
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $x=4;
        for ($cant=0; $cant <3 ; $cant++) { //corre cantones

            if($cantones[$cant]==4){//si es distrito 4
                $cantTotal=0;
                for ($dis=0; $dis <3 ; $dis++) { //corre distritos de canton 4
                    for ($i=0; $i <sizeof($columna) ; $i++) {
                        $sql="SELECT SUM($columna[$i]) AS totalDistrito  FROM tbhato INNER JOIN tbfincadireccion ON tbhato.socioid=tbfincadireccion.fincaid AND tbfincadireccion.fincaprovincia=3 AND tbfincadireccion.fincacanton=4 AND tbfincadireccion.fincadistrito=$dis+1 ORDER BY tbfincadireccion.fincacanton ASC, tbfincadireccion.fincadistrito ASC";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cantTotal+=$row["totalDistrito"];
                            }

                        }else{
                            echo "0 results";
                        }
                        
                    } 
                 //  if($cantTotal>0){
                    $datos=$datos."<tr><td>Jimenez - ".$dis4[$dis]." </td><td>".$cantTotal."</td></tr> ";
                    $cantTotal=0; 
                   //} 
                                     
                }
                
                $x=5;
            }else if($cantones[$cant]==5){
                $cantTotal=0;
                for ($dist=0; $dist <12 ; $dist++) { //corre distritos de canton 4
                    for ($i=0; $i <sizeof($columna) ; $i++) {
                        $sql="SELECT SUM($columna[$i]) AS totalDistrito  FROM tbhato INNER JOIN tbfincadireccion ON tbhato.socioid=tbfincadireccion.fincaid AND tbfincadireccion.fincaprovincia=3 AND tbfincadireccion.fincacanton=5 AND tbfincadireccion.fincadistrito=$dist+1 ORDER BY tbfincadireccion.fincacanton ASC, tbfincadireccion.fincadistrito ASC";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cantTotal+=$row["totalDistrito"];
                            }

                        }else{
                            echo "0 results";
                        }
                        
                    } 
                   // if($cantTotal>0){
                        $datos=$datos."<tr><td>Turrialba - ".$dis5[$dist]." </td><td>".$cantTotal."</td></tr> ";
                        $cantTotal=0; 
                    //}                   
                }

                $x=6;
            }else if($cantones[$cant]==6){
                $cantTotal=0;
                for ($distrito=0; $distrito <3 ; $distrito++) { //corre distritos de canton 4
                    for ($i=0; $i <sizeof($columna) ; $i++) {
                        $sql="SELECT SUM($columna[$i]) AS totalDistrito  FROM tbhato INNER JOIN tbfincadireccion ON tbhato.socioid=tbfincadireccion.fincaid AND tbfincadireccion.fincaprovincia=3 AND tbfincadireccion.fincacanton=6 AND tbfincadireccion.fincadistrito=$distrito+1 ORDER BY tbfincadireccion.fincacanton ASC, tbfincadireccion.fincadistrito ASC";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cantTotal+=$row["totalDistrito"];
                            }

                        }else{
                            echo "0 results";
                        }
                        
                    } 
                    //if($cantTotal>0){
                        $datos=$datos."<tr><td>Alvarado - ".$dis6[$distrito]." </td><td>".$cantTotal."</td></tr> ";
                        $cantTotal=0; 
                    //}                   
                }


            }

            
        }
        $datos=$datos."</table> ";
        $conn->close();
        return $datos;
    }

}
?>
