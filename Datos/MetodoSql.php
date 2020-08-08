<?php
require_once 'conexion.php';
class MetodoSql
{

    public $conexion = null;

    public function __construct()
    {

        $this->conexion = new Conexion();

    }

    public function buscarCedula($cedula)
    {

        $con = $this->conexion;
        $conexion = $con->conectar();
        $sql = "CALL buscar_por_cedula('$cedula')";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }

}
