<?php
class Actividad{
private $id;
private $nombreActividad;
funtion Actividad($id,$nombreActividad){
	$this->id=$id;
	$this->nombreActividad=$nombreActividad;
}
public funtion setId($id){
	$this->id=$id;
}
public funtion getId(){
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

