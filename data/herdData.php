<?php

include 'data.php';
include '../domain/herd.php';

class herdData extends Data{

	 private $data;

    function __construct(){ 
        $this->data = new Data();
    }
     public function insertTBHerd($herd) {

       $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbherd (herdpersonid,herdcalfs,calfveals,herdsteers,herdheifers,herdpregnantheifers,herdbulls,herdcows)
        VALUES ('" .

                $herd->getOwerId() . "','" .
                $herd->getCalfs() . "','" .
                $herd->getVeals() . "','" .
                $herd->getSteers() . "','" .
                $herd->getHeifers() . "','" .
                $herd->getPregnantHeifers() . "','" .
                $herd->getBulls() . "','" .
                $herd->getCows() . "');";


        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
}

?>