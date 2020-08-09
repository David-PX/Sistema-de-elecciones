<?php

require_once "../../Datos/MetodoSql.php";

$m = new MetodoSql();

if ($m->buscarCedula($_POST['cedula'])) {

    header('Location: ../../vistaElector/menuPrincipal.php');

} else {
    echo "Cedula no existe";
}
