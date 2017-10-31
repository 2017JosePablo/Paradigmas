<?php
require_once 'data.php';

class avisosData {

	public $data;

    function avisosData(){

        $this->data = new Data();
    }



    public function insertarTBAvisos($aviso) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO tbaviso (socioid,temaaviso,detalleaviso,rutafotoaviso)
        VALUES ('" .
                $aviso->getSocioId() ."','".
                $aviso->getTema() ."','" .
                $aviso->getDetalle()."','".
                $aviso->getRutaFoto(). "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}

	public function actualizarAviso($aviso){
       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="UPDATE tbaviso SET temaaviso ='".$aviso->getTema()."', detalleaviso='".$aviso->getDetalle()."',rutafotoaviso='".$aviso->getRutaFoto()."' WHERE socioid='".$aviso->getSocioId()."' AND idaviso = '".$aviso->getIdAviso()."';";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
	}

	public function mostrarTodosAvisos(){
		 $avisos = array();
        require '../domain/aviso.php';
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT tbaviso.idaviso, tbsocio.socionombre ,  tbsocio.socioprimerapellido , tbsocio.sociosegundoapellido,   tbaviso.temaaviso, tbaviso.detalleaviso , tbaviso.rutafotoaviso FROM tbaviso  INNER JOIN  tbsocio ON tbaviso.socioid = tbsocio.socioid";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
							$nombreCompleto = $row['socionombre']." ".$row['socioprimerapellido']."".$row['sociosegundoapellido'];
                array_push($avisos, new Aviso($row["idaviso"], $nombreCompleto,$row["temaaviso"],$row["detalleaviso"],$row["rutafotoaviso"]));
			}
        }else{
            echo "0 results";
        }
        $conn->close();
         return $avisos;
	}
	public function mostrarMisAvisos($idsocio){
		 $avisos = array();
				require '../domain/aviso.php';
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				// Check connection
				if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
				}
				$sql="SELECT * FROM tbaviso WHERE socioid= '".$idsocio."';";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
								array_push($avisos, new Aviso($row["idaviso"],$row["socioid"],$row["temaaviso"],$row["detalleaviso"],$row["rutafotoaviso"]));
			}
				}else{
						echo "0 results";
				}
				$conn->close();
				 return $avisos;
	}



	    public function insertarComentario($comentario) {

	       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
	        // Check connection
	        if (!$conn) {
	            die("Connection failed: " . mysqli_connect_error());
	        }


	        $sql = "INSERT INTO tbcomentarioaviso(idcomentario,idaviso,idresponsable,comentariomensaje)

	        VALUES ('" .
	                $comentario->getIdComentario() ."','".
	                $comentario->getIdAviso() ."','" .
	                $comentario->getIdSocio()."','".
	                $comentario->getMensaje(). "');";

	        $result = $conn->query($sql);
	        $conn->close();
	        return $result;
		}

	public function mostrarComentarioAviso($idaviso){
		require_once '../domain/comentario.php';
		 $comentario = array();
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				// Check connection
				if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
				}
				$sql="SELECT tbcomentarioaviso.idcomentario, tbcomentarioaviso.idaviso , tbcomentarioaviso.idresponsable,tbcomentarioaviso.comentariomensaje , tbsocio.socionombre, tbsocio.socioprimerapellido, tbsocio.sociosegundoapellido FROM tbcomentarioaviso  INNER JOIN
tbsocio ON tbsocio.socioid = tbcomentarioaviso.idresponsable AND tbcomentarioaviso.idaviso = ".$idaviso.";";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
								$creador = $row["socionombre"]." ".$row["socioprimerapellido"]." ".$row["sociosegundoapellido"];
								array_push($comentario, new comentarioAviso($row["idcomentario"],$row["idaviso"],$creador,$row["comentariomensaje"]));
			}
				}else{
					//	$comentario=  "Anuncio sin comentarios.";
				}
				$conn->close();
				 return $comentario;
	}

	public function getIndiceImagen($idsocio){
		 $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
				}
				$cont = 0;
				$sql = "SELECT * FROM tbaviso WHERE socioid= '".$idsocio."';";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
								$cont++;
							}
				}
				$conn->close();
				return $cont;
	}
}
 ?>
