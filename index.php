

<!DOCTYPE html>
<html lang="en">
<head></head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Inicio de sesion.</title>
</head>
<body>
<a class="btn " href="admin/ingresarAdmin.php">Iniciar sesion como administrador</a>


<div class="container  fadeInDown">

<div class="row">

<div class="col-md-3"></div>
<div class="col-md-6">

<form class="form-container border border-success border-2" method="post" action="ciudadanos/validarCiudadano.php">
  <h3 class=" border-bottom border-success">Iniciar sesion</h3>
  <div class="form-group inputWithIcon">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control " id="cedula" name="cedula" placeholder="Ingresa tu cedula...">
    <i class="fas fa-user"></i>

  </div>

  <div class="form-group form-check mt-5">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
  </div>
  <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
</form>
</div>
<div class="col-md-3"></div>


</div>






</div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
