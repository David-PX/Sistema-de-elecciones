 <?php
require_once 'VotoServiceDatabase.php';
require_once '../helpers/FileHandler/IFileHandler.php';
require_once '../helpers/FileHandler/JsonFileHandler.php';
require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';
require_once '../helpers/EmailHandler/EmailHandler.php';

session_start();
$email = new EmailHandler('../helpers/EmailHandler');
$voto = new VotoServiceDatabase();
$lista = $voto->getVotos($_SESSION['usuario']['Cedula']);

$votaciones = "Querido palomo <b>" . $_SESSION['usuario']['Nombre'] . "</b> Ya ha finalizado su proceso de votacion" . "\n"
    . 'Aqui su listado de votaciones' . "\n" .
    "";

$email->sendEmail($_SESSION['usuario']['Email'], 'Votaciones', $votaciones);
var_dump($lista);

?>