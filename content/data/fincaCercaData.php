<?php

require_once 'data.php';


class fincaCercaData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }

    function socioTipoCerca(){

			$arrayReporteCerca = array();
			include_once "../domain/datosSocioReportes.php";
		for ($contador=1; $contador <= $this->getTotalFinca(); $contador++) {

				$tipocerca = $this->getTipoCercaNombre($contador);

	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
	        if (!$conn) {
	            die("Connection failed: ".mysqli_connect_error());
	        }

	        $sql = "SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre,  tbsocio.socioprimerapellido,  tbsocio.sociosegundoapellido,
					tbsocio.sociotelefono , tbsocio.sociocorreo, tbfinca.fincacerca FROM tbsocio INNER JOIN tbfinca ON tbfinca.socioid = tbsocio.socioid;";

	        $result = $conn->query($sql);
	        if($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
								$tipoListaCerca =$row["fincacerca"];
								for ($i=0; $i < strlen($tipoListaCerca); $i++) {
									if($tipoListaCerca[$i] == $contador && $tipoListaCerca[$i] != "-"){
											array_push($arrayReporteCerca,new DatosSocioReportes($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"],$row["sociocorreo"],$tipocerca,"", ""));
										///echo $row["socionombre"]." ".$row["socioprimerapellido"]." ".$row["sociosegundoapellido"]."<br>";
									}
								}
						}
	        }else{
	            echo "0 results";
	        }
					}

						return $arrayReporteCerca;
		    }




    function getTipoCerca(){

    	$tipoCerca = array();


        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbfincacerca ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                array_push($tipoCerca, $row["fincacercatipo"]);


            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $tipoCerca;
    }



			 function getTotalFinca(){

	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
	        if (!$conn) {
	            die("Connection failed: ".mysqli_connect_error());
	        }
	        $sql = "SELECT  * FROM tbfincacerca";
					$contador = 0;
	        $result = $conn->query($sql);
						 while($row = $result->fetch_assoc()) {
	            	$contador++;
							}
	         return  $contador;
	        $conn->close();
	    }


		    function getTipoCercaNombre($id){
		        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
		        if (!$conn) {
		            die("Connection failed: ".mysqli_connect_error());
		        }
		        $sql = "SELECT  * FROM tbfincacerca WHERE fincacercaid = $id";
		        $result = $conn->query($sql);
		        if($result->num_rows > 0) {
							  while($row = $result->fetch_assoc()) {
		            	return $row["fincacercatipo"];
								}
		        }else{
		            return  "0 results";
		        }
		        $conn->close();
		    }

}

?>
