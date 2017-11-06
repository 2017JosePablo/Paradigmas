<?php

//include 'data.php';
require_once 'data.php';
require_once '../domain/fierro.php';


class fierroData extends Data{

	 private $data;

    function fierroData(){
        $this->data = new Data();
    }

    public function insertarFierroSocio($fierro){

  		$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
  		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
				$rutaServidor=$this->cargarImagen($fierro->getFierroRutaImagen());
        $sql = "INSERT INTO tbfierro (fierrotiene, fierroruta,idsocio)VALUES ('".$fierro->getFierroTiene()."','".$rutaServidor."' ,'".$fierro->getIdSocio()."' ); ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    public function  obtenerFierroSocio($idsocio){

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }


        $sql = "SELECT  * FROM tbfierro ";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $fierroSocio = new Fierro($row["fierroid"], $row["fierrotiene"], $row["fierroruta"], $row["idsocio"]);
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $fierroSocio;
    }
    //Metodo para actualizar un tipo de cerca existente..
    public function modificarFierroSocio($fierro)
    {

      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

				$rutaServidor=$this->cargarImagen($fierro->getFierroRutaImagen());

      $sql = "UPDATE tbfierro SET fierroruta = '".$rutaServidor."'  WHERE idsocio = '".$fierro->getIdSocio()."'";
      $result = $conn->query($sql);
      return $result;
    }
    //Metodo para eliminar una cerca
    public function eliminarFierroSocio($idSocio)
    {
      $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
      $sql = "DELETE FROM tbfierro  WHERE idsocio = '$idsocio'";
      $result = $conn->query($sql);
      return $result;
    }


		private function cargarImagen($ruta)
		{
			return $ruta;
		}

}//Fin de la clase.

?>
