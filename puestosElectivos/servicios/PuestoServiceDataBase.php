<?php

require_once 'puestoElectivo.php';
class PuestoServiceDatabase
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

        $puestosElectivos = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM puesto_electivo ORDER BY Estado");
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {

            while ($row = $result->fetch_object()) {

                $puestoElectivo = new puestoElectivo();

                $puestoElectivo->InicializarDatos($row->idPuesto_Electivo, $row->Nombre, $row->Descripcion, $row->Estado);

                array_push($puestosElectivos, $puestoElectivo);

            }

        }

        $stmt->close();

        return $puestosElectivos;
    }

    //Devuelve el puestoElectivo del $id proporcionado
    public function GetById($id)
    {
        $db = $this->context->conectar();

        $puestoElectivo = new PuestoElectivo();

        $stmt = $db->prepare('SELECT * FROM puesto_electivo WHERE idPuesto_Electivo = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $puestoElectivo->InicializarDatos($row->idPuesto_Electivo, $row->Nombre, $row->Descripcion, $row->Estado);

            }

        }

        $stmt->close();

        return $puestoElectivo;

    }

    //Agrega un puestoElectivo a la lista de puestoElectivo
    public function Add($puestoElectivo)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO puesto_electivo (Nombre, Descripcion, Estado) VALUES (?,?,?)');

        $stmt->bind_param('sss', $puestoElectivo->Nombre, $puestoElectivo->Descripcion, $puestoElectivo->Estado);

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el puestoElectivo de la lista de puestoElectivo, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();

        $stmt = $db->prepare("UPDATE puesto_electivo SET Estado = 'Inactivo' WHERE idPuesto_Electivo=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Actualizar puesto
    public function Update($id, $puestoElectivo)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE puesto_electivo SET Nombre = ?, Descripcion = ?, Estado = ? WHERE idPuesto_Electivo = ?');

        $stmt->bind_param('sssi', $puestoElectivo->Nombre, $puestoElectivo->Descripcion, $puestoElectivo->Estado, $id);

        $stmt->execute();
        $stmt->close();

    }
}
