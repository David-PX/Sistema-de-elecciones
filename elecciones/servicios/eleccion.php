<?php

class Eleccion
{

    public $idElecciones;
    public $Nombre;
    public $Fecha_realizacion;
    public $Estado;

    public function InicializarDatos($id, $nombre, $Fecha_realizacion, $Estado)
    {

        $this->idElecciones = $id;
        $this->Nombre = $nombre;
        $this->Fecha_realizacion = $Fecha_realizacion;
        $this->Estado = $Estado;

    }

}
