<?php
require_once '../servicios/PartidoServiceDatabase.php';
require_once 'partido.php';
require_once '../../helpers/Utilities.php';

$partidoService = new PartidoServiceDatabase();
$utilities = new Utilities();
$lista = $partidoService->GetList();
$entidad = new Partido();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $partido = $partidoService->GetById($id);

    if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
        $activo = $utilities->getActive();

        $image = (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) ? null : $partido->Logo_Partido;

        $entidad->InicializarDatos(0, $_POST['nombre'], $_POST['descripcion'], $image, $activo);

        $partidoService->Update($id, $entidad);

        header('Location: ../vistas/addPartido.php');

    }
}
