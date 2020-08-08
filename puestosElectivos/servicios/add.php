<?php

require_once 'puestoElectivo.php';
require_once '../../helpers/Utilities.php';
require_once 'PuestoServiceDataBase.php';

if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['activo'])) {

    $service = new PuestoServiceDatabase();
    $puesto = new PuestoElectivo();
    $utilities = new Utilities();
    $activo = $utilities->getActive();
    $puesto->InicializarDatos(0, $_POST['nombre'], $_POST['descripcion'], $activo);

    $service->Add($puesto);
    header('Location: ../vistas/addPuestoElectivo.php');
}
