<?php
class Person{
	private $id;
	private $name;
	private $firstname;
	private $lastname;
	private $phonehome;
	private $phone;

}

	function Person($id,$name,$firstname,$lastname,$phonehome,$phone){
		$this->id = $id;
		$this->name = $name;
		$this->firstname =  $firstname;
		$this->lastname = $lastname;
		$this->phonehome = $phonehome;
		$this->phone = $phone;
		
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setFirstname($firstname){
		$this->firstname = $firstname;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setLastname($lastname){
		$this->lastname = $lastname;
	}

	public function getLastName(){
		return $this->lastname;
	}

	public function setPhonehome($phonehome){
		$this->phonehome = $phonehome;
	}

	public function getPhonehome(){
		return $this->phonehome;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getPhone(){
		return $this->phone;
	}

?>
