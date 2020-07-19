<?php

class Conexion
{

    public  $con = null;

    public  function conectar()
    {

        $this->con = new mysqli('localhost', 'root', '', 'elecciones');

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }else{

            printf("Conexion establecida");
        }

    }

    public function getConection()
    {
        return $this->con;
    }

    public function cerrarConexion()
    {

        if ($this->con !== null) {
            $this->con->close();
        }

    }

}


