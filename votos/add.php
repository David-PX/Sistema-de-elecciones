<?php
require_once "../helpers/Auth.php";

$auth = new Auth('admin', '../admin/menuAdmin.php', true);

require_once 'votos.php';
require_once 'VotoServiceDatabase.php';
require_once "../Datos/conexion.php";

session_start();
var_dump($_GET);
var_dump($_SESSION);

if (isset($_GET['puesto'])) {

    if (isset($_SESSION['votaciones']) && !empty($_SESSION['votaciones'])) {

        $votaciones = $_SESSION['votaciones'];

        array_push($votaciones, $_GET['puesto']);

        $_SESSION['votaciones'] = $votaciones;

    } else {

        $_SESSION['votaciones'] = array();

        $votaciones = $_SESSION['votaciones'];

        array_push($votaciones, $_GET['puesto']);

        $_SESSION['votaciones'] = $votaciones;

    }
}

if (isset($_GET['puesto']) && isset($_GET['partido']) && isset($_GET['fecha'])) {

    $service = new VotoServiceDatabase();
    $voto = new Votos();
    //$activo = $utilities->getActive();
    $voto->InicializarDatos(0, $_SESSION['usuario']['Cedula'], $_GET['nombre'], $_GET['puesto'], $_GET['partido'], $_GET['voto'], $_GET['fecha']);

    $service->Add($voto);

    session_start();

    if (isset($_SESSION['desactivar'])) {
        $_SESSION['desactivar'] = $_SESSION['desactivar'];
    } else {
        $_SESSION['desactivar'] = array();
    }

    $desactivar = $_SESSION['desactivar'];
    array_push($desactivar, $_GET['puesto']);

    $_SESSION['desactivar'] = $desactivar;

    header('Location: ../VistaElector/menuPrincipal.php');
}
