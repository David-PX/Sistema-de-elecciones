<?php 


/*
`idRegistro`  ,
 `puestoElectivo`  ,
  `partido` 
   , `votos` 
    , `fechaCelebracion`  , 
*/
class Votos{

 public $idRegistro;
 public $puestoElectivo;
 public $partido;
 public $votos;
 public $fechaCelebracion;

 public function InicializarDatos($idRegistro, $puestoElectivo, $partido, $votos, $fechaCelebracion)
 {

     $this->idRegistro = $idRegistro;
     $this->puestoElectivo = $puestoElectivo;
     $this->partido = $partido;
     $this->votos = $votos;
     $this->fechaCelebracion = $fechaCelebracion;

 }




}
?>