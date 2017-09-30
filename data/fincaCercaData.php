<?php

require_once 'data.php';


class fincaCercaData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }


    function getTipoCerca(){

    	$tipoCerca = array();


        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbtipocerca ";

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

}

?>