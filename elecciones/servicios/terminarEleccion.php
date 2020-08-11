<?php
require_once '../../Datos/conexion.php';
require_once 'EleccioneServiceDataBase.php';
require_once '../../votos/VotoServiceDatabase.php';

$eleccion = new EleccionServiceDatabase();
$obj = new VotoServiceDatabase();

$lista = $obj->GetList();

$lista1 = $eleccion->GetList();

$cantidad = $obj->getCountVotos();

foreach ($cantidad as $item) {
    $datos = [$lista1[0]->idElecciones, $item['nombreCandidato'], $item['puestoElectivo'], $item['partido'], $item['votos']];
    $obj->addResult($datos);

}

$eleccion->Delete($lista1[0]->idElecciones);
$obj->Truncate();

header('Location: ../../admin/menuAdmin.php');
