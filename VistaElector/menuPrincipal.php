
<?php

require_once "../helpers/Auth.php";

$auth = new Auth('admin', '../admin/menuAdmin.php', true);

require_once '../Datos/MetodoSql.php';
require_once '../puestosElectivos/servicios/puestoElectivo.php';
require_once '../puestosElectivos/servicios/PuestoServiceDatabase.php';
require_once '../Datos/conexion.php';

$servicePuesto = new PuestoServiceDatabase();

$puestos = $servicePuesto->GetList();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index');
}

//var_dump($puestos);
$votaciones = array();

if (isset($_SESSION['votaciones'])) {

    $votaciones = $_SESSION['votaciones'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Menu de eleccion</title>
</head>
<body>
<!--Inicio Navbar-->
 <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-success">
        <div class="container-fluid pt-1 ">
          <img src="../assets/img/logo.png" class="">


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

              <li class="nav-item dropdown">
                <a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Inicio
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="../ciudadanos/servicios/logout.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!---->




  <div class="container pt-5">
<div class="row">


              <?php foreach ($puestos as $puesto): ?>

                  <?php if ($puesto->Nombre == "Presidente" && !in_array($puesto->Nombre, $votaciones)): ?>
          <div class="col-md-3 ">
                      <a id="Presidente"  class="btn btn-success btn-lg  " href="paginasVotaciones/votoPresidencial.php?id=<?=$puesto->idPuesto_Electivo;?>">Click aqui para votar por su <strong>  Presidente! </strong></a> <br/><br/>
          </div>
                  <?php elseif ($puesto->Nombre == "Alcalde" && !in_array($puesto->Nombre, $votaciones)): ?>
          <div class="col-md-3 Alcalde">
                      <a class="btn btn-warning btn-lg" href="paginasVotaciones/votoAlcalde.php?id=<?=$puesto->idPuesto_Electivo;?>">Click aqui para votar por su <strong> Alcade!</strong> </a> <br/><br/>
          </div>
                  <?php elseif ($puesto->Nombre == "Diputado" && !in_array($puesto->Nombre, $votaciones)): ?>
          <div class="col-md-3 Diputado">
                      <a class="btn btn-danger btn-lg" href="paginasVotaciones/votoDiputado.php?id=<?=$puesto->idPuesto_Electivo;?>">Click aqui para votar por su <strong> Diputado! </strong></a> <br/><br/>
          </div>
                  <?php elseif ($puesto->Nombre == "Senador" && !in_array($puesto->Nombre, $votaciones)): ?>
          <div class="col-md-3 Senador">
                      <a class="btn btn-primary btn-lg" href="paginasVotaciones/votoSenatorial.php?id=<?=$puesto->idPuesto_Electivo;?>">Click aqui para votar por <strong> su Senador! </strong></a> <br/><br/>
          </div>

                  <?php endif;?>

              <?php endforeach;?>


              <?php if (count($votaciones) == count($puestos) && count($puestos) > 0): ?>

              <h1>Usted Ya Ha Realizado Todos los Votos, Dele A Finalizar Palomo</h1>

              <?php endif;?>



    </div>
    <div class="text-center mt-5 ">
    <a href="../votos/procesarVoto.php" class="btn btn-info btn-lg">Finalizar Votacion! </a>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="../assets\js\funcionesVista.js"></script>
</body>

</html>