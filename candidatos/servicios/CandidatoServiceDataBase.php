<?php
require_once "../../Datos/conexion.php";
require_once "candidato.php";
class CandidatoServiceDatabase
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

        $candidatos = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM candidatos ORDER BY Estado");

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $candidato = new Candidato();

                $candidato->InicializarDatos($row->idCandidatos, $row->Nombre, $row->Apellido, $row->Partido, $row->Puesto, $row->Foto, $row->Estado);

                array_push($candidatos, $candidato);

            }

        }

        $stmt->close();

        return $candidatos;
    }

    //Devuelve el candidato del $id proporcionado
    public function GetById($id)
    {
        $db = $this->context->conectar();

        $candidato = new Candidato();

        $stmt = $db->prepare('SELECT * FROM candidatos WHERE idCandidatos = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $candidato->InicializarDatos($row->idCandidatos, $row->Nombre, $row->Apellido, $row->Partido, $row->Puesto, $row->Foto, $row->Estado);

            }

        }

        $stmt->close();

        return $candidato;

    }

    //Agrega un candidato a la lista de candidato
    public function Add($candidato)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO candidatos (Nombre, Apellido, Partido, Puesto, Foto, Estado) VALUES (?,?,?,?,?,?)');

        $stmt->bind_param('ssiibs', $candidato->Nombre, $candidato->Apellido, $candidato->Partido, $candidato->Puesto, $candidato->Foto, $candidato->Estado);

        //Insertar imagen

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

            $tmpName = $_FILES['foto']['tmp_name'];

            $photo = fopen($tmpName, 'rb');

            $contents = fread($photo, filesize($tmpName));

            $candidato->Foto = $contents;

            fclose($photo);

            //Enviar imagen
            $stmt->send_long_data(4, $candidato->Foto);

        }

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el candidato de la lista de candidato, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();
        $sql = "UPDATE candidatos SET Estado = 'Inactivo' WHERE idCandidatos =$id";
        return $result = mysqli_query($db, $sql);

    }

    //Actualizar candidato
    public function Update($id, $candidato)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE candidatos SET Nombre = ?, Apellido = ?, Partido = ?, Puesto = ?, Foto = ?, Estado = ? WHERE idCandidatos = ?');

        $stmt->bind_param('ssiibsi', $candidato->Nombre, $candidato->Apellido, $candidato->Partido, $candidato->Puesto, $candidato->Foto, $candidato->Estado, $id);

        //Insertar imagen

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

            $tmpName = $_FILES['foto']['tmp_name'];

            $photo = fopen($tmpName, 'rb');

            $contents = fread($photo, filesize($tmpName));

            $candidato->Foto = $contents;

            fclose($photo);

            //Enviar imagen
            $stmt->send_long_data(4, $candidato->Foto);

        } else {
            $stmt->send_long_data(4, $candidato->Foto);

        }

        $stmt->execute();
        $stmt->close();

    }

    public function GetListPorPuesto($buscar)
    {

        $candidatos = array();

        $db = $this->context->conectar();

        $stmt = "SELECT candidatos.Nombre,candidatos.Apellido,candidatos.Foto,partidos.Nombre as Partido, partidos.Logo_Partido  FROM candidatos INNER JOIN puesto_electivo ON candidatos.Puesto =
        puesto_electivo.idPuesto_Electivo INNER JOIN partidos ON candidatos.Partido = partidos.idPartidos WHERE candidatos.Estado<>'Inactivo' AND puesto_electivo.Nombre = '$buscar' ";

        $result = mysqli_query($db, $stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

        $stmt->close();

    }

    public function GetByPartido($id)
    {
        $db = $this->context->conectar();

        $candidato = new Candidato();

        $stmt = $db->prepare('SELECT * FROM candidatos WHERE partido = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $candidato->InicializarDatos($row->idCandidatos, $row->Nombre, $row->Apellido, $row->Partido, $row->Puesto, $row->Foto, $row->Estado);

            }

        }

        $stmt->close();

        return $candidato;

    }

}
