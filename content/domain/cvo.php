<?php
  /**
   *
   */
  class Cvo
  {
    private $cvoid;
    private $cvotiene;
    private $cvofechavigencia;
    private $cvoidsocio;

    function __construct($cvoid,$cvotiene,$cvofechavigencia,$cvoidsocio)
    {
      $this->cvoid = $cvoid;
      $this->cvotiene = $cvotiene;
      $this->cvofechavigencia = $cvofechavigencia;
      $this->cvoidsocio = $cvoidsocio;
    }
    public function setCvoId($temp)
    {
      $this->cvoid = $temp;
    }
    public function getCvoId()
    {
      return $this->cvoid;
    }

    public function setCvoTiene($temp)
    {
      $this->cvotiene = $temp;
    }
    public function getCvoTiene()
    {
      return $this->cvotiene;
    }

    public function setCvoFechaVigencia($temp)
    {
      $this->cvofechavigencia = $temp;
    }
    public function getCvoFechaVigencia()
    {
      return $this->cvofechavigencia;
    }

    public function setCvoSocioId($temp)
    {
      $this->cvoidsocio = $temp;
    }
    public function getCvoSocioId()
    {
      return $this->cvoidsocio;
    }
  }


 ?>
