<?php

class Data {

    public $servidor;
    public $usuario;
    public $contrasena;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->contrasena = "";
        $this->db = "dbasoturga";

    }
    public function getServidor(){
        return $this->servidor;
    }
     public function getUsuario(){
        return $this->usuario;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function getDbNombre(){
        return $this->db;
    }
    


}
