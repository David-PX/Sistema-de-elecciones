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
        $sql = "SELECT * FROM ciudadanos WHERE Cedula = '$cedula'";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }
    public function buscarEleccion()
    {
        $con = $this->conexion;
        $conexion = $con->conectar();
        $sql = "SELECT * FROM elecciones WHERE Fecha_realizacion = ( SELECT MAX(Fecha_realizacion) FROM elecciones )  ";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }
    public function GetAll($tabla)
    {

        $partidos = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM $tabla ORDER BY Estado ASC ");
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $partido = new Partido();

                $partido->InicializarDatos($row->idPartidos, $row->Nombre, $row->Descripcion, $row->Logo_Partido, $row->Estado);

                array_push($partidos, $partido);

            }

        }

        $stmt->close();

        return $partidos;

    }
    public function getWinners()
    {

        $con = $this->conexion;
        $conexion = $con->conectar();
        $sql = "SELECT puesto,nombreCandidato,MAX(totalVotos) as votos from resultados INNER JOIN elecciones ON resultados.idElecciones = elecciones.idElecciones GROUP BY resultados.puesto ";

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }

}
