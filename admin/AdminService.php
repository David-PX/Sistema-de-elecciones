<?php

class AdminService
{

    //Atributos
    private $context;

    //Constructores
    public function __construct()
    {
        $this->context = new Conexion();
    }

    //Funciones
    public function Login($username, $password)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('SELECT * FROM administradores WHERE usuario=? AND contraseña=?');
        $stmt->bind_param('ss', $username, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            $admin = $result->fetch_object();

            return $admin;
        }

        $stmt->close();
    }

}
