<?php
require_once "CiudadanoServiceDatabase.php";

$id = $_GET['id'];
var_dump($id);
$obj = new CiudadanoServiceDatabase();
$obj->Delete($id);
header('Location: ../vistas/addCiudadano.php');
