

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Inicio de sesion.</title>
</head>
<body>
<a class="btn btn-success" href="admin/ingresarAdmin.php">Iniciar sesion como administrador</a>
<section class="container-fluid fadeInDown center">
      <div class="row justify-content-center">
       <div class="col-12 col-sm-6 col-md-3 center">



      <form class="form-container" method="post" action="modelos/validarCiudadano.php ">
          <h3 class="text-center">Inicio de sesión.</h3>
  <div class="form-group inputWithIcon">

    <input type="text" class="form-control txt" id="usuario"  name="cedula" required placeholder="Ingresa tu cedula...">
    <i class="fas fa-user"></i>
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
