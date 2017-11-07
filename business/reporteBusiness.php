<?php

include '../data/reportesData.php';

class ReporteBusiness{

  private $reporteData;

  function ReporteBusiness(){
    $this->reporteData = new reportesData();
  }
  function socioCantonDistrito(){
    return $this->reporteData->socioCantonDistrito();
  }
  function socioTipoFinca(){
    return $this->reporteData->socioTipoFinca();
  }
  function hatoConsolidado(){
    return $this->reporteData->hatoConsolidado();
  }
  function cantBovinosxDistrito(){
    return $this->reporteData->cantBovinosxDistrito();
  }
  cantBovinosxDistrito

}
?>
