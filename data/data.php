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
        $this->isActive = false;
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "dbcamaraganadera";

    }

}
