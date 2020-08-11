<?php
require_once 'eleccion.php';
class EleccionServiceDatabase
{

    //Atributos
    private $context;

    //Constructores
    public function __construct()
    {
        $this->context = new Conexion();
    }

    //Funciones
    //Obtiene todos los eleccion en la bd
    public function GetList()
    {

        $elecciones = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM elecciones ORDER BY Fecha_realizacion DESC ");

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $eleccion = new Eleccion();

                $eleccion->InicializarDatos($row->idElecciones, $row->Nombre, $row->Fecha_realizacion, $row->Estado);

                array_push($elecciones, $eleccion);

            }

        }

        $stmt->close();

        return $elecciones;
    }

    //Devuelve el eleccion del $id proporcionado
    public function GetById($id)
    {
        $db = $this->context->conectar();

        $eleccion = new Eleccion();

        $stmt = $db->prepare('SELECT * FROM elecciones WHERE idElecciones = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $eleccion->InicializarDatos($row->idElecciones, $row->Nombre, $row->Fecha_realizacion, $row->Estado);

            }

        }

        $stmt->close();

        return $eleccion;

    }

    //Agrega un eleccion a la lista de eleccion
    public function Add($eleccion)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO elecciones (Nombre, Estado) VALUES (?,?)');

        $stmt->bind_param('ss', $eleccion->Nombre, $eleccion->Estado);

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el eleccion de la lista de candidato, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();

        $stmt = $db->prepare("UPDATE elecciones SET estado = 'Inactivo' WHERE idElecciones=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Actualizar eleccion
    public function Update($id, $eleccion)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE elecciones SET Nombre = ?,   Estado = ? WHERE idElecciones = ?');

        $stmt->bind_param('ssi', $eleccion->Nombre, $eleccion->Estado, $id);

        $stmt->execute();
        $stmt->close();

    }
    public function getLastId()
    {

    }

}
