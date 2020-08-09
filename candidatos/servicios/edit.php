<?php
require_once 'CandidatoServiceDatabase.php';
require_once 'candidato.php';
require_once '../../helpers/Utilities.php';

$candidatos = new CandidatoServiceDatabase();
$utilities = new Utilities();
$lista = $candidatos->GetList();
$entidad = new Candidato();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $candidato = $candidatos->GetById($id);

    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['partido']) && isset($_POST['puesto'])) {
        $activo = $utilities->getActive();

        $image = (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) ? null : $candidato->Foto;

        $entidad->InicializarDatos(0, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], $image, $activo);

        $candidatos->Update($id, $entidad);

        header('Location: ../vistas/addCandidato.php');

    }
}
