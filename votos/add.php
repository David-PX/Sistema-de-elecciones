<?php

require_once('votos.php');
require_once('VotoServiceDatabase.php');

var_dump($_GET);

if (isset($_GET['puesto']) && isset($_GET['partido']) && isset($_GET['voto']) && isset($_GET['fecha'])) {

    $service = new VotoServiceDatabase();
    $voto = new Votos();
    //$activo = $utilities->getActive();
    $voto->InicializarDatos(0, $_GET['puesto'], $_GET['partido'], $_GET['voto'], $_GET['fecha']);

    $service->Add($voto);
    //echo "entro aqui";
    header('Location: ../VistaElector/menuPrincipal.php');
}



/**
 * 
 * <?php
require_once 'CandidatoServiceDatabase.php';
require_once 'candidato.php';
require_once '../../helpers/Utilities.php';

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['partido']) && isset($_POST['puesto'])) {

    $service = new CandidatoServiceDatabase();
    $candidato = new Candidato();
    $activo = $utilities->getActive();
    $candidato->InicializarDatos(0, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], null, $activo);

    $service->Add($candidato);
    header('Location: ../vistas/addCandidato.php');
}

 */

?>



