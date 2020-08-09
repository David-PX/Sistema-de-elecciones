<?php
require_once "CandidatoServiceDatabase.php";

$id = $_GET['id'];
var_dump($id);
$obj = new CandidatoServiceDatabase();
if ($obj->Delete($id) == 1) {
    header('Location: ../vistas/addCandidato.php');

} else {
    echo "<div class='alert alert-danger'>Fallo al eliminar</div>";
}
