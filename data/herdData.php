<?php

//include 'data.php';
require_once 'data.php';
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
	 public function updateTBHerd($herd) {

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbherd SET herdpersonid ='".$herd-> getOwerId(). "',
            herdcalfs='" . $herd-> getCalfs()."',
            calfveals='" . $herd-> getVeals()."',
            herdsteers='" . $herd-> getSteers()."',
            herdheifers='" . $herd-> getHeifers()."',
            herdpregnantheifers='" . $herd-> getPregnantHeifers()."',
            herdbulls='".$herd-> getBulls()."',
            herdcows='" . $herd-> getCows()."' 
            WHERE herdpersonid ='" . $herd-> getOwerId(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }

     public function deleteTBHerd($idOwner) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbherd where herdpersonid='".$idOwner."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
    }
    public function getAllTBHerd() {
        $herd = array();

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());  
        $sql = "SELECT * FROM tbherd";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($herd, new Herd($row["herdpersonid"],$row["herdcalfs"],$row["calfveals"],$row["herdsteers"],$row["herdheifers"],$row["herdpregnantheifers"],$row["herdbulls"],$row["herdcows"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $herd;
    }




}

?>