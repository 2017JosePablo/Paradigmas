<?php

include 'data.php';
include '../domain/person.php';

class personData extends Data{

	public $data;

    function __construct(){ 
        $this->data = new Data();
    }
     public function insertTBPerson($person) {

       $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO tbperson (personidentification,personname,personfirstname,personlastname,personphonehome,personphone)
        VALUES ('" .

                $person->getId() . "','" .
                $person->getName() . "','" .
                $person->getFirstname() . "','" .
                $person->getLastName() . "','" .
                $person->getPhonehome() . "','" . 
                $person->getPhone() . "');";

        $result = $conn->query($sql);
        $conn->close();
        return $result;

	}
	 public function updateTBPerson($person) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE tbperson SET personidentification ='".$person-> getId(). "',
            personname='" . $person-> getName()."',
            personfirstname='" . $person-> getFirstname()."',
            personlastname='" . $person-> getLastName()."',
            personphonehome='" . $person-> getPhonehome()."',
            personphone='" . $person-> getPhone()."'
            WHERE personidentification 	 ='" . $person-> getId(). "';";

        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
   			 echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}
        $conn->close();
        return $result;
     }
      public function deleteTBPerson($idperson) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
     
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
        $sql = "DELETE from tbperson where personidentification='".$idperson."';";
        $result = $conn->query($sql);
        $conn->close();
     
        return $result;
     }

      public function getAllTBPerson() {
        $person = array();

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());  
        $sql = "SELECT * FROM tbperson";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($person, new Person($row["personidentification"],$row["personname"],$row["personfirstname"],$row["personlastname"],$row["personphonehome"],$row["personphone"]));
            }
        }else{
            echo "0 results";
        }
        $conn->close();
        
        return $person;
    }


	

}




?>