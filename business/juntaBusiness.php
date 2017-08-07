<?php

include '../data/juntaData.php';

class JuntaBusiness {

    private $juntaData;

function __construct(){
    $juntaData =new JuntaData();
}
    public function insertTBJunta($junta) {
        return $this->juntaData->insertTBJunta($junta);
    }


}

?>