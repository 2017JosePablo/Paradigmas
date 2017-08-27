<?php
class fincaTipo{
private $id;
private $fincaTipoActividad;

function Actividad($id,$fincaTipoActividad){
	$this->id=$id;
	$this->fincaTipoActividad=$fincaTipoActividad;
}
public function setId($id){
	$this->id=$id;
}
public function getId(){
	return $this->id;
}
public function setFincaTipoActividad($fincaTipoActividad){
	$this->fincaTipoActividad = $fincaTipoActividad;
}

public function getFincaTipoActividad(){
	return $this->fincaTipoActividad;
}

}


?>
