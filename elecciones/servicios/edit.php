<?php
require_once '../../Datos/conexion.php';

require_once '../servicios/EleccioneServiceDatabase.php';
require_once 'eleccion.php';
require_once '../../helpers/Utilities.php';

$Puesto = new EleccionServiceDataBase();
$utilities = new Utilities();
$lista = $Puesto->GetList();
$entidad = new Eleccion();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $Puestos = $Puesto->GetById($id);

    if (isset($_POST['nombre']) && isset($_POST['activo'])) {
        $activo = $utilities->getActive();

        $entidad->InicializarDatos(0, $_POST['nombre'], null, $activo);

        $Puesto->Update($id, $entidad);

        header('Location: ../vistas/addElecciones.php');

    }
}
