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

  function socioTipoCerca(){
    require '../data/fincaCercaData.php';
    $fincaData = new fincaCercaData();

    return $fincaData->socioTipoCerca();
  }
  function socioReporteExamen(){
    require '../data/socioData.php';
    $socioData = new 
  }
}
?>
