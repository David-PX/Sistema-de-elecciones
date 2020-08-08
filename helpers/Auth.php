<?php

class Auth
{

    public $redireccion;
    public $sessionName;
    public $mensaje;

    public function __construct($sessionName, $redireccion = '../index.php', $mensaje = 'Debe iniciar sesion, ve que ute es palomo')
    {

        session_start();

        if (isset($_SESSION[$sessionName])) {

            if ($_SESSION[$sessionName] == null) {

                $_SESSION['messageAuth'] = $mensaje;
                header('Location: ' . $redireccion);
                exit();

            }

        } else {

            $_SESSION['messageAuth'] = $mensaje;
            header('Location: ' . $mensaje);
            exit();

        }

    }
}
