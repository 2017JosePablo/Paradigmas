<<<<<<< HEAD
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
=======
<?php

include '../data/juntaData.php';

class JuntaBusiness {

    private $juntaData;

    public function JuntaBusiness() {
        $this->juntaData = new JuntaData();
    }

    public function insertTBJunta($junta) {
        return $this->juntaData->insertTBJunta($junta);
    }

    public function updateTBJunta($junta) {
        return $this->juntaData->updateTBJunta($junta);
    }

    public function deleteTBBull($idJunta) {
        return $this->juntaData->deleteTBJunta($idJunta);
    }

    public function getAllTBJunta() {
        return $this->juntaData->getAllTBJunta();
    }
    
    
}
>>>>>>> 412cecbe9483896030f2a21a76a65695bf55f1b3
