<?php

class Candidato
{

    public $id;
    public $nombre;
    public $apellido;
    public $partidoPerteneciente;
    public $puesto;
    public $foto;
    public $estado;

    public function InicializarDatos($id, $nombre, $apellido, $partidoPerteneciente, $puesto, $foto, $estado)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->partidoPerteneciente = $partidoPerteneciente;
        $this->puesto = $puesto;
        $this->foto = $foto;
        $this->estado = $estado;

    }

}
