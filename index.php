<?php 

require_once "Datos/conexion.php";
require_once "Datos/MetodoSql.php";


if(isset($_POST['cedula'])){
 

$me = new MetodoSql();

$me->buscarCedula($_POST['cedula']);



}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="vendor/css/bulma.min.css"media="screen" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css%22%3E">
     <link rel="stylesheet" href="assets/css/style.css" media="screen" type="text/css">
     <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    
    <title>Inicio de sesion.</title>
</head>



<body>
    
<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container"> 
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-4-widescreen" id="Form">
         <form action="index.php" method="POST">
            <p class="label has-text-centered is-size-5">
            Iniciar Sesion.
            </p>
            <p class="has-text-centered is-size-6 has-text-danger">
              
            </p>
            <br/>

            <div class="field">
              
              <div class="control has-icons-left">
                <input type="text" placeholder="Ingresa tu cedula" class="input" required name='cedula'>
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
            </div>
           
            <br/>          
            <div class="field">
              <button class="button is-success is-fullwidth" type="submit"> 
                Iniciar
              </button>
            </div>
                                           
            <p class="has-text-centered">
               <a class="label has-text-weight-light">
                   Registrarse
              </a>
                                   
            </p>
                              
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
</body>
</html>