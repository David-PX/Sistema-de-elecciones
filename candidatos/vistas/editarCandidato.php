<?php
require_once '../servicios/CandidatoServiceDatabase.php';
require_once 'candidato.php';
require_once '../../helpers/Utilities.php';

$candidatos = new CandidatoServiceDatabase();
$utilities = new Utilities();
$lista = $candidatos->GetList();
$entidad = new Candidato();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $candidato = $candidatos->GetById($id);

    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['partido']) && isset($_POST['puesto'])) {
        $activo = $utilities->getActive();

        $image = (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) ? null : $candidato->Foto;

        $entidad->InicializarDatos(0, $_POST['nombre'], $_POST['apellido'], $_POST['partido'], $_POST['puesto'], $image, $activo);

        $candidatos->Update($id, $entidad);

        header('Location: addCandidato.php');

    }
}

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
        <a href="../admin/menuAdmin.php" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-cog"></i> Administracion</a>
        <a href="#" class="list-group-item list-group-item-action text-success bg-white p-3 border-0 active"><i class="fas fa-user"></i> Candidatos</a>
        <a href="#" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-chair"></i> Puestos electivos</a>
        <a href="#" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-caravan"></i> Partidos</a>
        <a href="#" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"><i class="fas fa-check-circle"></i> Elecciones</a>
        <a href="#" class="list-group-item list-group-item-action text-success bg-white p-3 border-0"> <i class="fas fa-users"></i> Ciudadanos</a>
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
                  <a class="dropdown-item" href="#">Mi perfil</a>
                  <a class="dropdown-item" href="#">Suscripciones</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Cerrar sesión</a>
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
<form method="POST" action="editarCandidato.php?id=<?=$candidato->idCandidatos;?>" enctype="multipart/form-data">
<input type="text" hidden="" value="<?php echo $id ?>" name="id">
  <div class="form-row">
      <div class="form-group col-md-2 ">
        <div id="preview" class="img-thumbnail border border-success rounded float-left fotoFixed" >
            <img src=" <?=$utilities->getSrcImage64($candidato->Foto);?>" alt="" srcset="" width="100px" >
        </div>

      </div>

       <div class="form-group col-md-2 mt-4 mr-4">


    <input type="file" class="form-control custom-file-input" id="file" name="foto" value="<?php $candidato->Foto;?>">

    <label for="file" class="custom-file-label">foto</label>
  </div>

    <div class="form-group col-md-3">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $candidato->Nombre; ?> ">
    </div>
    <div class="form-group col-md-4">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php echo $candidato->Apellido; ?>">
    </div>

  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
    <label for="inputAddress1">Partido</label>
    <input type="text" class="form-control" id="inputAddress1" placeholder="Partido al que pertenece" name="partido" required value="<?php echo $candidato->Partido; ?>">
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress2">Puesto</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Puesto al que aspira" name="puesto" required value="<?php echo $candidato->Puesto; ?>">
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
<script src="../assets/js/app.js"></script>
<script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#content-wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
