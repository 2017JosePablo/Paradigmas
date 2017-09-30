<?php
  /**
   *
   */
  class Colaborador
  {
      private $idcolaborador;
      private $colaboradorcedula;
      private $colaboradornombre;
      private $colaboradorprimerapellido;
      private $colaboradorsegundoapellido;
      private $colaboradorcorreo;
      private $colaboradortelefono;

    function Colaborador($idcolaborador,$colaboradorcedula,$colaboradornombre,$colaboradorprimerapellido,$colaboradorsegundoapellido,$colaboradorcorreo,$colaboradortelefono)
    {
      $this->idcolaborador = $idcolaborador;
      $this->colaboradorcedula = $colaboradorcedula;
      $this->colaboradornombre = $colaboradornombre;
      $this->colaboradorprimerapellido = $colaboradorprimerapellido;
      $this->colaboradorsegundoapellido = $colaboradorsegundoapellido;
      $this->colaboradorcorreo = $colaboradorcorreo;
      $this->colaboradortelefono = $colaboradortelefono;
    }
    //Metodos set
      public function setIdColaborador($temporal)
      {
        $this->idcolaborador  = $temporal;
      }

      public function setCedulaColaborador($temporal)
      {
        $this->colaboradorcedula  = $temporal;
      }
      public function setNombreColaborador($temporal)
      {
        $this->colaboradornombre  = $temporal;
      }
      public function setPrimerApellidoColaborador($temporal)
      {
        $this->colaboradorprimerapellido  = $temporal;
      }
      public function setSegundoApellidoColaborador($temporal)
      {
        $this->colaboradorsegundoapellido  = $temporal;
      }
      public function setCorreoColaborador($temporal)
      {
        $this->colaboradorcorreo  = $temporal;
      }
      public function setTelefonoColaborador($temporal)
      {
        $this->colaboradortelefono  = $temporal;
      }

      //////////////////////////////////METODOS GET


      public function getIdColaborador()
      {
        return $this->idcolaborador;
      }

      public function getCedulaColaborador()
      {
        return $this->colaboradorcedula;
      }
      public function getNombreColaborador()
      {
        return $this->colaboradornombre ;
      }
      public function getPrimerApellidoColaborador()
      {
       return  $this->colaboradorprimerapellido;
      }
      public function getSegundoApellidoColaborador()
      {
        return $this->colaboradorsegundoapellido;
      }
      public function getCorreoColaborador()
      {
        return $this->colaboradorcorreo  ;
      }
      public function getTelefonoColaborador()
      {
        return $this->colaboradortelefono ;
      }




  }

 ?>
