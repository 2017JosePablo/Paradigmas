<?php


	include_once 'data.php';
	include '../domain/raza.php';
	class razaData
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


		function socioTipoRaza(){

			$arrayReporteRaza = array();
			include_once "../domain/datosSocioReportes.php";

		for ($contador=1; $contador <= $this->cantidadTodoTBRaza(); $contador++) {

				$tipoRaza = $this->getTipoRazaNombre($contador);

					$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
					if (!$conn) {
							die("Connection failed: ".mysqli_connect_error());
					}

					$sql = "SELECT tbsocio.socioid, tbsocio.sociocedula, tbsocio.socionombre, tbsocio.socioprimerapellido, tbsocio.sociosegundoapellido, tbsocio.sociotelefono , tbsocio.sociocorreo, tbhato.hatoraza FROM tbsocio INNER JOIN tbhato ON tbhato.socioid = tbsocio.socioid  ORDER BY tbsocio.socionombre ASC,tbhato.hatoraza ASC";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$tipoListaRaza =$row["hatoraza"];
								for ($i=0; $i < strlen($tipoListaRaza); $i++) {
									if($tipoListaRaza[$i] == $contador && $tipoListaRaza[$i] != ","){
											array_push($arrayReporteRaza,new DatosSocioReportes($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"],$row["sociocorreo"],$tipoRaza,"", ""));
									}
								}
						}
					}else{
							echo "0 results";
					}
					}

						return $arrayReporteRaza;
				}



		public function getTipoRazaNombre($id){
    		$raza = "";
	        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
	        $sql = "SELECT * FROM tbraza WHERE idraza = $id";
	        $result = $conn->query($sql);
	        if($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	                $raza = $row["razanombre"];
	            }
	        }
	        $conn->close();
	        return $raza;
		}


				public function obtenerTodoTBRaza(){
		    		$raza = array();
			        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

			        $sql = "SELECT * FROM tbraza ORDER BY tbraza.razanombre ASC ";
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

		public function cantidadTodoTBRaza(){
				$raza = 0;
					$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());

					$sql = "SELECT * FROM tbraza ";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
									$raza++;
							}

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
