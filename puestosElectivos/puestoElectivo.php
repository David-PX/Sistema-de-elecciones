
<?php

class PuestoElectivo
{

    private $id;
    private $nombre;
    private $descripcion;
    private $estado;

    public function InicializarDatos($id, $nombre, $descripcion, $estado)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;

    }

}
