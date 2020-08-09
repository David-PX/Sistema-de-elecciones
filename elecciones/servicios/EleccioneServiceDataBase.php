<?php

class EleccionServiceDatabase
{

    //Atributos
    private $context;
    private $utilities;

    //Constructores
    public function __construct()
    {
        $this->utilities = new Utilities();
        $this->context = new Conexion();
    }

    //Funciones
    //Obtiene todos los eleccion en la bd
    public function GetList()
    {

        $elecciones = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM elecciones WHERE estado <> 'inactivo' ");
        $stmt->bind_param('i', $user->id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $eleccion = new Eleccion();

                $eleccion->InicializarDatos($row->id, $row->nombre, $row->fechaRealizacion, $row->estado);

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

                $eleccion->InitializeData($row->id, $row->nombre, $row->fechaRealizacion, $row->estado);

            }

        }

        $stmt->close();

        return $eleccion;

    }

    //Agrega un eleccion a la lista de eleccion
    public function Add($eleccion)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO elecciones (nombre, Fecha_realizacion, estado) VALUES (?,?,?)');

        $stmt->bind_param('sss', $eleccion->nombre, $eleccion->fechaRealizacion, $candidato->estado);

        //Insertar imagen
        /*
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

        $tmpName = $_FILES['foto']['tmp_name'];

        $photo = fopen($tmpName, 'rb');

        $contents = fread($photo, filesize($tmpName));

        $user->profilePhoto = $contents;

        fclose($photo);

        //Enviar imagen
        $stmt->send_long_data(4, $user->profilePhoto);

        }*/

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el eleccion de la lista de candidato, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();

        $stmt = $db->prepare("UPDATE elecciones SET estado = 'inactivo' WHERE idElecciones=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Actualizar eleccion
    public function Update($id, $eleccion)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE candidatos SET nombre = ?, Fecha_realizacion = ?,  estado = ? WHERE id = ?');

        $stmt->bind_param('sssi', $eleccion->nombre, $eleccion->fechaRealizacion, $eleccion->estado, $id);

        $stmt->execute();
        $stmt->close();

    }

}
