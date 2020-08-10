<?php

class Conexion
{

    public $con = null;
    private $server = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $nombreBD = 'elecciones';

    public function conectar()
    {

        $this->con = new mysqli($this->server, $this->user, $this->password, $this->nombreBD);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());

        } else {
            return $this->con;
        }

    }

    public function cerrarConexion()
    {

        if ($this->con !== null) {
            $this->con->close();
        }

    }

}
