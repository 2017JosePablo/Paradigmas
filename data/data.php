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
