<?php
class Junta {
    private $idTBJunta;
    private $presidenteTBJunta;
    private $vicepresidenteTBJunta;
    private $tesoreroTBJunta;
    private $secretarioTBJunta;
    private $vocal1TBJunta;
    private $vocal2TBJunta;
    private $vocal3TBJunta;


    function Junta($idTBJunta, $presidenteTBJunta,$vicepresidenteTBJunta,$tesoreroTBJunta,$secretarioTBJunta,$vocal1TBJunta,$vocal2TBJunta,$vocal3TBJunta) {
        $this->idTBJunta = $idTBJunta;
        $this->presidenteTBJunta = $presidenteTBJunta;
        $this->vicepresidenteTBJunta = $vicepresidenteTBJunta;
        $this->tesoreroTBJunta = $tesoreroTBJunta;
        $this->secretarioTBJunta = $secretarioTBJunta;
        $this->vocal1TBJunta = $vocal1TBJunta;
        $this->vocal2TBJunta = $vocal2TBJunta;
        $this->vocal3TBJunta = $vocal3TBJunta;
    }

    function getIdTBJunta() {
        return $this->idTBJunta;
    }
    
    public function getPresidenteTBJunta() {
        return $this->presidenteTBJunta;
    }

    public function setPresidenteJunta($presidente) {
        $this->getPresidenteTBJunta = $presidente;
    }

    function getVicepresidenteJunta() {
        return $this->vicepresidenteTBJunta;
    }

    function getTesoreroJunta() {
        return $this->tesoreroTBJunta;
    }
    function getSecretarioJunta() {
        return $this->secretarioTBJunta;
    }
    function getVocal1Junta() {
        return $this->vocal1TBJunta;
    }
    function getVocal2Junta() {
        return $this->vocal2TBJunta;
    }
    function getVocal3Junta() {
        return $this->vocal3TBJunta;
    }
}
?>