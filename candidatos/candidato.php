<?php

class Candidato
{

    public $idCandidatos;
    public $Nombre;
    public $Apellido;
    public $Partido;
    public $Puesto;
    public $Foto;
    public $Estado;

    public function InicializarDatos($id, $nombre, $apellido, $partidoPerteneciente, $puesto, $foto, $estado)
    {

        $this->idCandidatos = $id;
        $this->Nombre = $nombre;
        $this->Apellido = $apellido;
        $this->Partido = $partidoPerteneciente;
        $this->Puesto = $puesto;
        $this->Foto = $foto;
        $this->Estado = $estado;

    }

}
