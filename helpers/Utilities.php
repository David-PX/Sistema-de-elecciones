<?php

class Utilities
{

    //Obtiene base 64 de una imagen, para mostrar en pantalla
    public function getSrcImage64($photo)
    {
        if (!empty($photo)) {

            return 'data:image/jpeg;base64,' . base64_encode($photo);

        }

        return null;
    }

    //Obtiene la fecha actual fecha y hora
    public function getCurrentDateTime($format = 'Y-m-d H:i:s')
    {

        $currentDateTime = new DateTime('now', new DateTimeZone('America/Santo_Domingo'));

        return $currentDateTime->format($format);

    }

    public function getActive()
    {

        if (isset($_POST["activo"])) {
            return "Activo";
        } else {
            return "Inactivo";
        }

    }
}
