<?php
require_once "PartidoServiceDatabase.php";

$id = $_GET['id'];
var_dump($id);
$obj = new PartidoServiceDatabase();
$obj->Delete($id);
header('Location: ../vistas/addPartido.php');
