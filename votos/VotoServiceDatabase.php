<?php

class VotoServiceDatabase
{
    //Atributos
    private $context;

    //Constructores
    public function __construct()
    {
        $this->context = new Conexion();
    }

    //Funciones
    //Obtiene todos los Candidato en la bd
    public function GetList()
    {

        $con = $this->context;
        $context = $con->conectar();
        $sql = "SELECT * FROM registrovotos";
        $result = mysqli_query($context, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }

    //Agrega un puestoElectivo a la lista de puestoElectivo
    public function Add($Votos)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO registrovotos (cedulaVotante , nombreCandidato,puestoElectivo ,partido, votos, fechaCelebracion) VALUES (?,?,?,?,?,?)');

        $stmt->bind_param('ssssis', $Votos->cedulaVotante, $Votos->nombreCandidato, $Votos->puestoElectivo, $Votos->partido, $Votos->votos, $Votos->fechaCelebracion);

        $stmt->execute();
        $stmt->close();

    }

    public function getVotos($cedula)
    {

        $con = $this->context;
        $context = $con->conectar();
        $sql = "SELECT * FROM registrovotos WHERE cedulaVotante = '$cedula'";
        $result = mysqli_query($context, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }
    public function getCountVotos()
    {

        $con = $this->context;
        $context = $con->conectar();
        $sql = "SELECT nombreCandidato,puestoElectivo,partido,SUM(votos) AS votos FROM registrovotos GROUP BY puestoElectivo, partido";
        $result = mysqli_query($context, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }

    public function addResult($datos)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO resultados (idElecciones , nombreCandidato,puesto ,partido,totalVotos) VALUES (?,?,?,?,?)');

        $stmt->bind_param('isssi', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4]);

        $stmt->execute();
        $stmt->close();

    }
    public function getReport($id)
    {

        $con = $this->context;
        $context = $con->conectar();
        $sql = "SELECT * FROM resultados INNER JOIN elecciones ON resultados.idElecciones = elecciones.idElecciones WHERE elecciones.idElecciones = $id";
        $result = mysqli_query($context, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $con->cerrarConexion();

    }
    public function Truncate()
    {

        $con = $this->context;
        $context = $con->conectar();
        $sql = "TRUNCATE TABLE registrovotos";
        mysqli_query($context, $sql);

        $con->cerrarConexion();

    }

}
