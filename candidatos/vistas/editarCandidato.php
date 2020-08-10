<?php

require_once "../../helpers/Auth.php";

$auth = new Auth('admin', '../admin/ingresarAdmin.php');

require_once '../servicios/CandidatoServiceDataBase.php';
require_once '../servicios/candidato.php';
require_once '../../helpers/Utilities.php';
require_once '../../puestosElectivos/servicios/PuestoServiceDataBase.php';
require_once '../../partidos/servicios/PartidoServiceDataBase.php';

$candidato = new CandidatoServiceDatabase();
$partido = new PartidoServiceDataBase();
$puesto = new PuestoServiceDatabase();
$utilities = new Utilities();

$id = $_GET['id'];

$lista = $candidato->GetById($id);
$lista1 = $partido->GetList();
$lista2 = $puesto->GetList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">




<title>Inicio de sesion.</title>
</head>
<body>



<div class="d-flex" id="content-wrapper">

    <!-- Sidebar -->
    <div id="sidebar-container" class="bg-white border-right border-success">
      <div class="logo">
        <h4 class="font-weight-bold mb-0 text-dark border-bottom border-success">Administracion Elecciones</h4>
      </div>
      <div class="menu list-group-flush">
       <a href="../../admin/menuAdmin.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-cog"></i> Administracion</a>
        <a href="../../elecciones/vistas/addElecciones.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-check-circle"></i> Elecciones</a>
        <a href="../../puestosElectivos/vistas/addPuestoElectivo.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-chair"></i> Puestos Electivos</a>

        <a href="../../partidos/vistas/addPartido.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-caravan"></i> Partidos</a>
         <a href="../../candidatos/vistas/addCandidato.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-user"></i> Candidatos</a>

        <a href="../../ciudadanos/vistas/addCiudadano.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"> <i class="fas fa-users"></i> Ciudadanos</a>
      </div>
    </div>
    <!-- Fin sidebar -->

    <!-- Page Content -->


    <div id="page-content-wrapper" class="w-100 bg-light-blue">


      <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-success">
        <div class="container">
          <button class="btn btn-success text-white" id="menu-toggle">Mostrar / esconder menu</button>

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
                  <a class="dropdown-item" href="../../admin/logout.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

       <!---->
      <div class="container-fluid pl-5 pt-4 pr-5">
                    <div class="">
                    <div class="card card-elec">

  <div class="card-body">
<form method="POST" action="../servicios/edit.php?id=<?=$lista->idCandidatos;?>" enctype="multipart/form-data">

  <div class="form-row">
      <div class="form-group col-md-2 ">
        <div id="preview" class="img-thumbnail border border-success rounded float-left fotoFixed" >
            <img src=" <?=$utilities->getSrcImage64($lista->Foto);?>" alt="" srcset="" width="100px" >
        </div>

      </div>

       <div class="form-group col-md-2 mt-4 mr-4">


    <input type="file" class="form-control custom-file-input" id="file" name="foto" value="<?php $lista->Foto;?>">

    <label for="file" class="custom-file-label">foto</label>
  </div>

    <div class="form-group col-md-3">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $lista->Nombre; ?> ">
    </div>
    <div class="form-group col-md-4">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php echo $lista->Apellido; ?>">
    </div>

  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Seleccione su partido</label>
    <select class="form-control" id="exampleFormControlSelect1" name="partido">

      <?php foreach ($lista1 as $lt1): ?>



        <option value="<?php echo $lt1->idPartidos; ?>"> <?php echo $lt1->Nombre; ?> </option>




        <?php endforeach;?>

    </select>
    </div>
    <div class="form-group col-md-6">
    <label for="puesto">Seleccione su Puesto electivo</label>
    <select class="form-control" id="puesto" name="puesto">

      <?php foreach ($lista2 as $lt2): ?>

        <option value="<?php echo $lt2->idPuesto_Electivo; ?>"> <?php echo $lt2->Nombre; ?> </option>


 <?php endforeach;?>
</select>
    </div>

  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" checked name="activo">
      <label class="form-check-label" for="gridCheck" >
        Activo
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>
  </div>
</div>
                  </div>
</div>
<!---->




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="../../assets/js/app.js"></script>
<script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#content-wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
