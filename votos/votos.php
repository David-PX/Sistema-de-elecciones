<?php

/*
`idRegistro`  ,
`puestoElectivo`  ,
`partido`
, `votos`
, `fechaCelebracion`  ,
 */
class Votos
{

    public $idRegistro;
    public $cedulaVotante;
    public $nombreCandidato;
    public $puestoElectivo;

    public $partido;
    public $votos;
    public $fechaCelebracion;

    public function InicializarDatos($idRegistro, $cedulaVotante, $nombreCandidato, $puestoElectivo, $partido, $votos, $fechaCelebracion)
    {

        $this->idRegistro = $idRegistro;
        $this->cedulaVotante = $cedulaVotante;
        $this->nombreCandidato = $nombreCandidato;
        $this->puestoElectivo = $puestoElectivo;
        $this->partido = $partido;
        $this->votos = $votos;
        $this->fechaCelebracion = $fechaCelebracion;

    }

}
