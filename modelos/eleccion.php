<?php

class Eleccion
{

    public $id;
    public $nombre;
    public $fechaRealizacion;
    public $estado;

    public function InicializarDatos($id, $nombre, $fechaRealizacion, $estado)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->fechaRealizacion = $fechaRealizacion;
        $this->estado = $estado;

    }

}
