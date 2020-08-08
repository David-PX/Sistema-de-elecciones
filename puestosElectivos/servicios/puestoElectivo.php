
<?php

class PuestoElectivo
{

    public $idPuesto_Electivo;
    public $Nombre;
    public $Descripcion;
    public $Estado;

    public function InicializarDatos($idPuesto_Electivo, $Nombre, $Descripcion, $Estado)
    {

        $this->idPuesto_Electivo = $idPuesto_Electivo;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Estado = $Estado;

    }

}
