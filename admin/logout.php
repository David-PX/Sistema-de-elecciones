<?php

session_start();

if (!empty($_SESSION['admin']) || isset($_SESSION['admin'])) {

    unset($_SESSION['admin']);
    header('Location: ingresarAdmin.php');

}
