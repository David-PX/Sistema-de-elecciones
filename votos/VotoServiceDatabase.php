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
    public function GetList($puesto, $partido, $fecha)
    {

        $Votos = array();

        $db = $this->context->conectar();

        foreach ($partido as $valor) {
            # code...
            $stmt = $db->prepare("SELECT SUM(votos),partido FROM registrovotos WHERE puestoElectivo = ? and partido = ? and fechaCelebracion = ?  ");
            $stmt->bind_param('sss', $puesto, $valor, $fecha);
            $stmt->execute();

            $result = $stmt->get_result();

            array_push($Votos, $result);
            /*if ($result->num_rows !== 0) {

        while ($row = $result->fetch_object()) {

        $Voto = new Votos();

        $Voto->InicializarDatos($row->idPartidos, $row->Nombre, $row->Descripcion, $row->Logo_Partido,$row->Estado);

        array_push($Votos, $Voto);

        }

        }
        } */

        }

        $stmt->close();

        return $result;
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

}
