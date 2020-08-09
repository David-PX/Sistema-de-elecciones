<?php
require_once 'PartidoServiceDataBase.php';
require_once 'partido.php';
require_once '../../helpers/Utilities.php';

if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['activo'])) {

    $service = new PartidoServiceDataBase();
    $candidato = new Partido();
    $utilities = new Utilities();
    $activo = $utilities->getActive();
    $candidato->InicializarDatos(0, $_POST['nombre'], $_POST['descripcion'], null, $activo);

    $service->Add($candidato);
    header('Location: ../vistas/addPartido.php');
}
