<?php
    /**
     *
     */
    class Fierro 
    {
      private $fierroid;
      private $fierrotiene;
      private $fierrorutaimagen;
      private $idsocio;
      function __construct($fierroid,$fierrotiene,$fierrorutaimagen,$idsocio)
      {
          $this->fierroid = $fierroid;
          $this->fierrotiene = $fierrotiene;
          $this->fierrorutaimagen = $fierrorutaimagen;
          $this->idsocio = $idsocio;
      }
      public function setFierroId($temporal)
      {
        $this->fierroid = $temporal;
      }
      public function getFierroId()
      {
        return $this->fierroid;
      }

      public function setFierroTiene($temporal)
      {
        $this->fierrotiene = $temporal;
      }
      public function getFierroTiene()
      {
        return $this->fierrotiene;
      }

      public function setFierroRutaImagen($temporal)
      {
        $this->fierrorutaimagen = $temporal;
      }
      public function getFierroRutaImagen()
      {
        return $this->fierrorutaimagen;
      }
      public function setIdSocio($temporal)
      {
        $this->idsocio = $temporal;
      }
      public function getIdSocio()
      {
        return $this->idsocio;
      }

    }


 ?>
