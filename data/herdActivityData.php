<?php

    require_once 'data.php';

class herdActivityData extends Data{

	public $data;

	function __construct(){

		$this->data =new Data();
	}

	public function insertTBHerdActivity($personid,$typeActivity) {

       $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbherdactivity (herdactivitypersonid,herdactivitytype)
        VALUES ('" .

                $personid . "','" .
                $typeActivity . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}	

}


?>