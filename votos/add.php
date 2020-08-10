<?php

require_once 'votos.php';
require_once 'VotoServiceDatabase.php';

var_dump($_GET);

if (isset($_GET['puesto']) && isset($_GET['partido']) && isset($_GET['voto']) && isset($_GET['fecha'])) {

    $service = new VotoServiceDatabase();
    $voto = new Votos();
    //$activo = $utilities->getActive();
    $voto->InicializarDatos(0, $_GET['puesto'], $_GET['partido'], $_GET['voto'], $_GET['fecha']);

    $service->Add($voto);
    //echo "entro aqui";

    session_start();

    if (isset($_SESSION['desactivar'])) {
        $_SESSION['desactivar'] = $_SESSION['desactivar'];
    } else {
        $_SESSION['desactivar'] = array();
    }

    $desactivar = $_SESSION['desactivar'];
    array_push($desactivar, $_GET['puesto']);

    $_SESSION['desactivar'] = $desactivar;

    header('Location: ../VistaElector/menuPrincipal.php?voto=1');
}
