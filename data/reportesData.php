<?php

require_once 'data.php';


class reportesData extends Data{

	 private $data;


    function reportesData(){
        $this->data = new Data();

    }
		public function hola()
		{
			return "hola jajaja";
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
                array_push($socioCantonDistrito, new DatosSocioReportes($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
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



}
?>
