<?php
require_once "PuestoServiceDatabase.php";

$id = $_GET['id'];
var_dump($id);
$obj = new PuestoServiceDatabase();
$obj->Delete($id);
header('Location: ../vistas/addPuestoElectivo.php');
