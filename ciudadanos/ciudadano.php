<?php

class Ciudadano
{

    public $Cedula;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Estado;

    public function InicializarDatos($Cedula, $Nombre, $Apellido, $Email, $Estado)
    {

        $this->Cedula = $Cedula;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Email = $Email;
        $this->Estado = $Estado;

    }

}
