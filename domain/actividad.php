<?php
class Actividad{
private $id;
private $nombreActividad;
function Actividad($id,$nombreActividad){
	$this->id=$id;
	$this->nombreActividad=$nombreActividad;
}
public function setId($id){
	$this->id=$id;
}
public function getId(){
	return $this->id;
}
public function setNombreActividad($nombreActividad){
	$this->nombreActividad = $nombreActividad;
}

public function getNombreActividad(){
	return $this->nombreActividad;
}

}


?>

