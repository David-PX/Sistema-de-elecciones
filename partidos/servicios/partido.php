
<?php

class Partido
{

    public $idPartidos;
    public $Nombre;
    public $Descripcion;
    public $Logo_Partido; //Imagen
    public $Estado;

    public function InicializarDatos($idPartidos, $Nombre, $Descripcion, $Logo_Partido, $Estado)
    {

        $this->idPartidos = $idPartidos;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Logo_Partido = $Logo_Partido;
        $this->Estado = $Estado;

    }

}
