<?php

	include 'data.php';

	require_once '../domain/raza.php';
	class razaData extends data
	{

		private  $data ;
		
		function __construct()
		{
			$this->data = new Data();
		}

		public function insertarTBRaza($raza)
		{	
			$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

			$sql = "INSERT into tbraza(idraza, razanombre) values ('','".$raza->getNombreRaza()."');";
			$resultado = $conn->query($sql);
			return $resultado;

		}


		public function modificarTBRaza($raza){
			$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

	        $sql = "UPDATE  tbraza SET razanombre = '".$raza->getNombreRaza()."' WHERE idraza = '".$raza->getIdRaza()."'; ";

	        $resultado = $conn->query($sql);
			return $resultado;
		}

		public function obtenerTodoTBRaza(){
    		$raza = array();
	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

	        $sql = "SELECT * FROM tbraza";
	        $result = $conn->query($sql);
	        if($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	                array_push($raza, new raza($row["idraza"],$row["razanombre"]));
	            }

	        }else{
	            echo "0 results";
	        }
	        $conn->close();
	        return $raza;
		}

		public function obtenerUnTBRaza($idraza){
    		$raza = "";
	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

	        $sql = "SELECT razanombre FROM tbraza WHERE idraza = '$idraza'";
	        $result = $conn->query($sql);
	        if($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	                $raza = $row["razanombre"];
	            }

	        }else{
	            echo "0 results";
	        }
	        $conn->close();
	        return $raza;
		}


		public function eliminarTBRaza($idraza){
	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());  

	        $sql = "DELETE FROM tbraza  WHERE idraza = '".$idraza."' ;";
	        
	        $result = $conn->query($sql);
	        
	        $conn->close();
	        return $result;
		}






	}
?>