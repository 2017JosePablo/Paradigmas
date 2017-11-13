<?php

//include 'data.php';
require_once 'data.php';
include '../domain/colaborador.php';


class colaboradorData extends Data{

	 private $data;

    function __construct(){
        $this->data = new Data();
    }

    public function insertarColaborador($colaborador){


  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO tbcolaborador (colaboradorid, colaboradorcedula,colaboradornombre, colaboradorprimerapellido, colaboradorsegundoapellido, colaboradorcorreo, colaboradortelefono)VALUES ('".$colaborador->getIdColaborador()."','".$colaborador->getCedulaColaborador()."' ,'".$colaborador->getNombreColaborador()."','".$colaborador->getPrimerApellidoColaborador()."','".$colaborador->getSegundoApellidoColaborador()."','".$colaborador->getCorreoColaborador()."' ,'".$colaborador->getTelefonoColaborador()."'); ";

          echo "SQL: ".$sql;


        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    public function  obtenerColaborador($idcolaborador){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbcolaborador WHERE colaboradorid = $idcolaborador ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $colaborador = new Colaborador($row["colaboradorid"], $row["colaboradorcedula"], $row["colaboradornombre"], $row["colaboradorprimerapellido"], $row["colaboradorsegundoapellido"], $row["colaboradorcorreo"], $row["colaboradortelefono"]);
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $colaborador;
    }
		      public function obtenerTodosTBColaborador() {
		        $colaborador = array();

		        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
						$conn->set_charset("utf8");
		        $sql = "SELECT * FROM tbcolaborador";

		        $result = $conn->query($sql);
		        if($result->num_rows > 0) {
		            while($row = $result->fetch_assoc()) {

		                array_push($colaborador, new colaborador($row["colaboradorid"],$row["colaboradorcedula"],$row["colaboradornombre"],$row["colaboradorprimerapellido"],$row["colaboradorsegundoapellido"],$row["colaboradorcorreo"]
		                    ,$row["colaboradortelefono"]));
		            }
		        }else{
		            echo "0 results";
		        }
		        $conn->close();
		        return $colaborador;
		    }

    //Metodo para actualizar un tipo de cerca existente..
    public function modificarColaborador($colaborador)
    {

      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "UPDATE tbcolaborador SET  colaboradorcedula = '".$colaborador->getCedulaColaborador()."',colaboradornombre = '".$colaborador->getNombreColaborador()."' , colaboradorprimerapellido = '".$colaborador->getPrimerApellidoColaborador()."', colaboradorsegundoapellido = '".$colaborador->getSegundoApellidoColaborador()."', colaboradorcorreo = '".$colaborador->getCorreoColaborador()."', colaboradortelefono = '".$colaborador->getTelefonoColaborador()."'  WHERE colaboradorid = '".$colaborador->getIdColaborador()."'; ";

      echo $sql;

      $result = $conn->query($sql);
      return $result;
    }
    //Metodo para eliminar una cerca
    public function eliminarColaborador($idcolaborador)
    {

      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
			$conn->set_charset("utf8");
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbcolaborador  WHERE colaboradorid = '$idcolaborador'";
      $result = $conn->query($sql);
      return $result;
    }
}//Fin de la clase.

?>
