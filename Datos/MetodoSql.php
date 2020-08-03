<?php
require_once "conexion.php";
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
        $con->conectar();
        $statement = $con->prepare("CALL buscar_por_cedula(?)");
        $statement->bind_param("s",$cedula);
        $statement->execute();
        
        
        

        $con->cerrarConexion();
        


    }

}


