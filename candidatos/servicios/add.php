<?php
require_once 'CandidatoServiceDatabase.php';
require_once 'candidato.php';
require_once '../../helpers/Utilities.php';

$utilities = new Utilities();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['partido']) && isset($_POST['puesto'])) {

    $service = new CandidatoServiceDatabase();
    $candidato = new Candidato();
    $activo = $utilities->getActive();
    $candidato->InicializarDatos(0, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], null, $activo);

    $service->Add($candidato);
    header('Location: ../vistas/addCandidato.php');
}
