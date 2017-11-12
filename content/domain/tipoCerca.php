<?php
  class tipoCerca
  {
    private $tipocercaid;
    private $tipocercanombre;
    function __construct($idcerca,$nombrecerca)
    {
      $this->tipocercaid = $idcerca;
      $this->tipocercanombre  = $nombrecerca;
    }
    public function setIdCerca($idcerca){
        $this->tipocercaid = $idcerca;
    }

    public function getCercaId()
    {
      return $this->tipocercaid;
    }

    public function setNombreCerca($nombrecerca)
    {
      $this->$tipocercanombre = $nombrecerca;
    }
    public function getNombreCerca()
    {
      return $this->tipocercanombre;
    }


  }


 ?>
