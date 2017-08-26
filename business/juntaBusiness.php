<?php

require '../data/juntaData.php';

class JuntaBusiness {

    private $juntaData;

    public function JuntaBusiness() {
        $this->juntaData = new JuntaData();
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
}
?>