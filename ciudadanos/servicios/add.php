<?php

?>
<?php

require_once 'ciudadano.php';
require_once '../../helpers/Utilities.php';
require_once 'CiudadanoServiceDataBase.php';

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['activo'])) {

    $service = new CiudadanoServiceDatabase();
    $ciudadano = new Ciudadano();
    $utilities = new Utilities();
    $activo = $utilities->getActive();
    $ciudadano->InicializarDatos($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $activo);

    $service->Add($ciudadano);
    header('Location: ../vistas/addCiudadano.php');
}
