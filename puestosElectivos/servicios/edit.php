<?php
require_once "../../helpers/Auth.php";

$auth = new Auth('admin', '../admin/ingresarAdmin.php');
require '../../Datos/conexion.php';
require_once '../servicios/PuestoServiceDatabase.php';
require_once 'puestoElectivo.php';
require_once '../../helpers/Utilities.php';

$Puesto = new PuestoServiceDatabase();
$utilities = new Utilities();
$lista = $Puesto->GetList();
$entidad = new puestoElectivo();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $Puestos = $Puesto->GetById($id);
    var_dump($_POST);
    if (isset($_POST['descripcion'])) {
        $activo = $utilities->getActive();

        $entidad->InicializarDatos(0, $_POST['nombre'], $_POST['descripcion'], $activo);

        $Puesto->Update($id, $entidad);

        header('Location: ../vistas/addPuestoElectivo.php');

    }
}
