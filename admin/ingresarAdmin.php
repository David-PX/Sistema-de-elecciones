
<?php
require_once "../Datos/conexion.php";
require_once "AdminService.php";
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {

    $service = new AdminService();
    if ($service->Login($_POST['usuario'], $_POST['contraseña'])) {
        header('Location: menuAdmin.php');
    } else {
        echo "<div class='alert alert-danger'> Usuario o contraseña incorrecto </div>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/login.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Iniciando sesion como administrador.</title>
</head>
<body>

<section class="container-fluid fadeInDown center">
      <div class="row justify-content-center">
       <div class="col-12 col-sm-6 col-md-3 center">



      <form class="form-container" method="post" action="ingresarAdmin.php ">
          <h3 class="text-center">Administradores.</h3>
  <div class="form-group inputWithIcon">

    <input type="text" class="form-control txt" id="usuario"  name="usuario" required placeholder="Ingresa tu usuario">
    <i class="fas fa-user"></i>
  </div>
  <div class="form-group inputWithIcon">

    <input type="password" class="form-control txt" id="contraseña"  name="contraseña" required placeholder="Ingresa tu contraseña">

  <i class="fas fa-lock"></i>
  </div>


  <button id="btnGreen" type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Iniciar sesion.</button>

</form>


      </div>

      </div>






</section>









    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
