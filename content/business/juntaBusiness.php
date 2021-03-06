<?php

require '../data/juntaData.php';
require '../data/colaboradorData.php';

class JuntaBusiness {

    private $juntaData;
    private $colaborador;

    public function JuntaBusiness() {
        $this->juntaData = new JuntaData();
        $this->colaborador = new colaboradorData();
    }

    public function insertarTBJunta($junta) {
        return $this->juntaData->insertarTBJunta($junta);
    }

    public function actualizarTBJunta($junta) {
        return $this->juntaData->actualizarTBJunta($junta);
    }

    public function eliminarTBJunta($idJunta) {
        return $this->juntaData->eliminarTBJunta($idJunta);
    }
    public function obtenerTodosTBJunta() {
        return $this->juntaData->obtenerTodosTBJunta();
    }

    public function obtenerTodosTBColaborador() {
        return $this->colaborador->obtenerTodosTBColaborador();
    }


    public function insertarColaborador($colaborador)
    {
        return $this->colaborador->insertarColaborador($colaborador);
    }


}
?>
