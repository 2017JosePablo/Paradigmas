<?php
class Herd{
	private $ownerId;
	private $calf;
	private $veal;
	private $steers;
	private $heifers;
	private $pregnantheifers;
	private $bulls;
	private $cows;

	function Herd($ownerId,$calf,$veal,$steers,$heifers,$pregnantheifers,$bulls,$cows){
		$this->ownerId = $ownerId;
		$this->calf = $calf;
		$this->veal =  $veal;
		$this->steers = $steers;
		$this->heifers = $heifers;
		$this->pregnantheifers = $pregnantheifers;
		$this->bulls =  $bulls;
		$this->cows =$cows;
	}

	public function setOwerId($id){
		$this->ownerId = $id;
	}

	public function getOwerId(){
		return $this->ownerId;
	}
	public function setCalf($calf){
		$this->calf = $calf;
	}
	public function getCalfs(){
		return $this->calf;
	}
	public function setVeal($veal){
		$this->veal = $veal;
	}
	public function getVeals(){
		return $this->veal;
	}
	public function setSteers($steers){
		$this->steers = $steers;
	}
	public function getSteers(){
		return $this->steers;
	}
	public function setHeifers($heifers){
		$this->heifers = $heifers;
	}
	public function getHeifers(){
		return $this->heifers;
	}
	public function setPregnantHeifers($pregnantheifers){
		$this->pregnantheifers = $pregnantheifers;
	}
	public function getPregnantHeifers(){
		return $this->setPregnantHeifers;
	}
	public function setBulls($bulls){
		$this->bulls = $bulls;
	}
	public function getBulls(){
		return $this->bulls;
	}
	public function setCows($cows){
		$this->cows = $cows;
	}
	public function getCows(){
		return $this->cows;
	}
}

?>