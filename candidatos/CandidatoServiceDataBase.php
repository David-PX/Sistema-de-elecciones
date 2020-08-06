<?php

class CandidatoServiceDatabase
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
    //Obtiene todos los Candidato en la bd
    public function GetList()
    {

        $candidatos = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare('SELECT * FROM candidatos');
        $stmt->bind_param('i', $user->id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $candidato = new Candidato();

                $candidato->InicializarDatos($row->id, $row->nombre, $row->apellido, $row->partidoPerteneciente, $row->puesto, $row->foto, $row->estado);

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

        $stmt = $db->prepare('SELECT * FROM candidatos WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $candidato->InitializeData($row->id, $row->nombre, $row->apellido, $row->partidoPerteneciente, $row->puesto, $row->foto, $row->estado);

            }

        }

        $stmt->close();

        return $candidato;

    }

    //Agrega un candidato a la lista de candidato
    public function Add($candidato)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO candidatos (nombre, apellido, partidoPerteneciente, puesto, foto, estado) VALUES (?,?,?,?,?,?)');

        $stmt->bind_param('ssisbs', $candidato->nombre, $candidato->apellido, $candidato->partidoPerteneciente, $candidato->puesto, $candidato->foto, $candidato->estado);

        //Insertar imagen

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

            $tmpName = $_FILES['foto']['tmp_name'];

            $photo = fopen($tmpName, 'rb');

            $contents = fread($photo, filesize($tmpName));

            $user->profilePhoto = $contents;

            fclose($photo);

            //Enviar imagen
            $stmt->send_long_data(4, $user->profilePhoto);

        }

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el candidato de la lista de candidato, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();

        $stmt = $db->prepare('DELETE FROM candidatos WHERE id=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Actualizar candidato
    public function Update($id, $candidato)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE candidatos SET nombre = ?, apellido = ?, partidoPerteneciente = ?, puesto = ?, foto = ?, estado = ? WHERE id = ?');

        $stmt->bind_param('ssisbsi', $candidato->nombre, $candidato->apellido, $candidato->partidoPerteneciente, $candidato->puesto, $candidato->foto, $candidato->estado, $id);

        $stmt->execute();
        $stmt->close();

    }

}
