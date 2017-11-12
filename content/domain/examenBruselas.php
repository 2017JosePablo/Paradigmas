<?php
  /**
   *
   */
  class examenBruselas
  {
    private $examenid;
    private $examenvigente;
    private $examenfechavencimiento;
    private $idsocio;
    function __construct($examenid,$examenvigente,$examenfechavencimiento,$idsocio)
    {
      $this->examenid = $examenid;
      $this->examenvigente = $examenvigente;
      $this->examenfechavencimiento = $examenfechavencimiento;
      $this->idsocio  = $idsocio;
    }
    public function setExamenId($temp)
    {
      $this->examenid = $temp;
    }
    public function getExamenId()
    {
      return $this->examenid;
    }
    public function getExamenVigente()
    {
      return $this->examenvigente;
    }
    public function setExamenFechaVencimiento($temp)
    {
      $this->examenfechavencimiento = $temp;
    }
    public function getExamenFechaVencimiento()
    {
      return $this->examenfechavencimiento;
    }
    public function setIdSocio($temp)
    {
      $this->idsocio = $temp;
    }
    public function getIdSocio()
    {
      return $this->idsocio;
    }
  }


 ?>
