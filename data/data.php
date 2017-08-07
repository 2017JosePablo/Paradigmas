<<<<<<< HEAD
<?php
    
    class data{

        private $user;
        private $pass;
        private $server;
        private $db;
        private $conexion;
        function __construct(){
            $this->user="root";
            $this->pass="";
            $this->server="localhost";
            $this->db="dbparadigma";          
        }
        //Metodo que crea la conexion a base de datos con los datos del servidor e usuario
        function crearConexion(){
            $this->conexion =mysqli_connect($this->server,$this->user,$this->pass,$this->db);           
            return $this->conexion;     
        }
        //Cierra la conexion de la base de datos;
        function cerrarConexion(){
            mysqli_close ($this->conexion);
        }
    
    }

?>
=======
<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "dbparadigma";

    }
    public function getServer(){
        return $this->server;
    }
     public function getUser(){
        return $this->user;
    }

    public function getPass(){
        return $this->password;
    }

    public function getDbName(){
        return $this->db;
    }


}
>>>>>>> 412cecbe9483896030f2a21a76a65695bf55f1b3
