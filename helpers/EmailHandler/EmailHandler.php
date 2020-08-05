<?php

use PHPMailer\PHPMailer\PHPMailer;

class EmailHandler
{

    public $mail;
    private $fileHandler;

    public function __construct($directory)
    {

        $this->mail = new PHPMailer(true);

        $this->fileHandler = new JsonFileHandler('configuration', $directory);

    }

    public function sendEmail($to, $subject, $body)
    {

        try {

            $config = $this->fileHandler->ReadConfiguration();

            //Configuracion
            $this->mail->SMTPDebug = 2;
            $this->mail->isSMTP();
            $this->mail->Host = $config->Host;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $config->Username;
            $this->mail->Password = $config->Password;
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = $config->Port;
            $this->mail->setFrom($config->Username, $config->From);

            //Destinatario
            $this->mail->addAddress($to);

            //Contenido
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();

        } catch (Exception $e) {

            echo "El mensaje no pudo enviarse por el error: {$this->mail->ErrorInfo}";
            exit();

        }

    }
}
