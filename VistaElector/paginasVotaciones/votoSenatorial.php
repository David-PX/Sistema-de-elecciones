<?php

include_once("../../candidatos/servicios/candidato.php");
include_once("../../candidatos/servicios/CandidatoServiceDataBase.php");

$serviceCandidato = new CandidatoServiceDatabase();

$Candidatos = $serviceCandidato->GetListPorPuesto('Senatorial');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voto Senatorial</title>
    <link rel="stylesheet" href="../../assets/css/paginaVotar.css" type="text/css">
    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
</head>
<body>

    <?php foreach($Candidatos as $Candidato ):?>

        <button class="btn candidato  " id="<?php echo $Candidato->Partido ; ?>" >
                <div class="card" style="width: 18rem; ">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $Candidato->Partido ;?></h5>
            <img src="<?php echo $Candidato->foto  ;?>" class="card-img-top" alt="...">
            <p class="card-text"> <?php echo $Candidato->Nombre . " ". $Candidato->Apellido ;?> </p>
        </div>
        </div>

        </button>
    <?php endforeach;?>
        
    <button class="btn candidato  " id="ninguno" >
                <div class="card" style="width: 18rem; ">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Ninguno</h5>
            <img src="" class="card-img-top" alt="...">
            <p class="card-text"> Ningun candidato </p>
        </div>
        </div>

        </button>



        <a href="#" class=" btn btn-primary disabled  " id="voto"  >Votar</a>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../../assets/js/funcionesVista.js"></script>
</body>
</html>