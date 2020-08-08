<?php

require_once "../Datos/MetodoSql.php";

$m = new MetodoSql();

if ($m->buscarCedula($_POST['cedula'])) {

    header('Location: ../vistas/menu.php');

} else {
    echo "Cedula no existe";
}
