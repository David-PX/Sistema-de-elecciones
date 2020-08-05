<?php

class Ciudadanos
{

    private $cedula;
    private $nombre;
    private $apellido;
    private $email;
    private $estado;

    public function InicializarDatos($cedula, $nombre, $apellido, $email, $estado)
    {

        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->estado = $estado;

    }

}
