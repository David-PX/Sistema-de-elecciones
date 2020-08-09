
<?php

class Partido
{

    private $id;
    private $nombre;
    private $descripcion;
    private $logo; //Imagen
    private $estado;

    public function __construct()
    {
        $this->logo = null;
    }

    public function InicializarDatos($id, $nombre, $description, $logo, $estado)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $fechaRealizacion;
        $this->logo = $logo;
        $this->estado = $estado;

    }

}
