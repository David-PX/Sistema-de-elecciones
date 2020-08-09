<?php
require_once "../../helpers/Auth.php";

$auth = new Auth('admin', '../admin/ingresarAdmin.php');
require_once "PuestoServiceDatabase.php";
require_once '../../Datos/conexion.php';

$id = $_GET['id'];
var_dump($id);
$obj = new PuestoServiceDatabase();
$obj->Delete($id);
header('Location: ../vistas/addPuestoElectivo.php');
