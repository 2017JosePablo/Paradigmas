<?php

require_once 'data.php';

class loginData {

	public $data;

    function loginData(){

        $this->data = new Data();
    }

    public function insertarTBLogin($login) {

       $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO tblogin (socioid,userlogin,passwordlogin,rollogin)
        VALUES ('" .
                $login->getSocioId() ."','".
                $login->getUsuario() ."','" .
                $login->getContrasena()."','".
                $login->getRol(). "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}


//Devuelve un mensaje
    public function validarLogin($user,$contraseña){
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT * FROM tblogin WHERE tblogin.userlogin='".$user."' AND tblogin.passwordlogin='".$contraseña."'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
             return 'true';

        }else{
              return 'false';
        }
				$conn->close();
    }



//Devuelve los datos del login(idLogin,socioId,userLogin,passworLogn,rolLogin)
    public function verificarLogin($usuario,$contraseña){
        $login;
        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql="SELECT * FROM tblogin WHERE tblogin.userlogin='".$usuario."' AND tblogin.passwordlogin='".$contraseña."'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $login = ["idLogin"=>$row["idlogin"], "socioId"=> $row["socioid"],"usuario"=>$row["userlogin"], "contrasena"=>$row["passwordlogin"], "rol"=>$row["rollogin"]];
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return json_encode($login);

    }

//Actualiza la contraseña validando el correo y la contraseña vieja
    public function actualizarContrasena($usuario,$contrasenaVieja,$contrasenaNueva){

         $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql="UPDATE tblogin SET passwordlogin ='".$contrasenaNueva."' WHERE userlogin='".$usuario."' AND passwordlogin='".$contrasenaVieja."'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


//devuelve los datos de l socio y la contraseña
    public function optenerTodasContrasenas(){
        require '../domain/datosSocioLogin.php';
        $contrasenaSocios= array();

        $conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql="SELECT tbsocio.socioid,tbsocio.sociocedula,tbsocio.socionombre,tbsocio.socioprimerapellido,tbsocio.sociosegundoapellido,tbsocio.sociotelefono,tbsocio.sociocorreo, tblogin.passwordlogin FROM tbsocio INNER JOIN tblogin ON tbsocio.socioid= tblogin.socioid  ORDER BY tbsocio.socionombre ASC";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($contrasenaSocios, new DatosSocioLogin($row["socioid"],$row["sociocedula"],$row["socionombre"],$row["socioprimerapellido"],$row["sociosegundoapellido"],$row["sociotelefono"]
                    ,$row["sociocorreo"],$row["passwordlogin"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();

        return $contrasenaSocios;
    }

}

?>
