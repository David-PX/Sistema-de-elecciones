<?php

class Eleccion
{

    private $id;
    private $nombre;
    private $fechaRealizacion;
    private $estado;

    public function InicializarDatos($id, $nombre, $fechaRealizacion, $estado)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->fechaRealizacion = $fechaRealizacion;
        $this->estado = $estado;

    }

}
