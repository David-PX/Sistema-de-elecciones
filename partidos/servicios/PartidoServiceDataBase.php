<?php
require_once '../../Datos/conexion.php';
require_once 'partido.php';
class PartidoServiceDataBase
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

        $partidos = array();

        $db = $this->context->conectar();

        $stmt = $db->prepare("SELECT * FROM partidos ORDER BY Estado ");
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

    //Devuelve el puestoElectivo del $id proporcionado
    public function GetById($id)
    {
        $db = $this->context->conectar();

        $partido = new Partido();

        $stmt = $db->prepare('SELECT * FROM partidos WHERE idPartidos = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {

            while ($row = $result->fetch_object()) {

                $partido->InicializarDatos($row->idPartidos, $row->Nombre, $row->Descripcion, $row->Logo_Partido, $row->Estado);

            }

        }

        $stmt->close();

        return $partido;

    }

    //Agrega un puestoElectivo a la lista de puestoElectivo
    public function Add($partido)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('INSERT INTO partidos (Nombre, Descripcion, Logo_Partido, Estado) VALUES (?,?,?,?)');

        $stmt->bind_param('ssbs', $partido->Nombre, $partido->Descripcion, $partido->Logo_Partido, $partido->Estado);

        //Insertar imagen

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

            $tmpName = $_FILES['foto']['tmp_name'];

            $photo = fopen($tmpName, 'rb');

            $contents = fread($photo, filesize($tmpName));

            $partido->Logo_Partido = $contents;

            fclose($photo);

            //Enviar imagen
            $stmt->send_long_data(2, $partido->Logo_Partido);

        }

        $stmt->execute();
        $stmt->close();

    }

    //Borrar el puestoElectivo de la lista de puestoElectivo, con el $id proporcionado
    public function Delete($id)
    {
        $db = $this->context->conectar();

        $stmt = $db->prepare("UPDATE candidatos INNER JOIN partidos ON candidatos.Partido = partidos.idPartidos SET candidatos.Estado = 'Inactivo' , partidos.Estado = 'Inactivo' WHERE partidos.idPartidos =  $id");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Actualizar puesto
    public function Update($id, $partido)
    {

        $db = $this->context->conectar();

        $stmt = $db->prepare('UPDATE partidos SET Nombre = ?, Descripcion = ?, Logo_Partido =?, Estado = ? WHERE idPartidos = ?');

        $stmt->bind_param('ssbsi', $partido->Nombre, $partido->Descripcion, $partido->Logo_Partido, $partido->Estado, $id);

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

            $tmpName = $_FILES['foto']['tmp_name'];

            $photo = fopen($tmpName, 'rb');

            $contents = fread($photo, filesize($tmpName));

            $partido->Logo_Partido = $contents;

            fclose($photo);

            //Enviar imagen
            $stmt->send_long_data(2, $partido->Logo_Partido);

        } else {

            //Enviar imagen
            $stmt->send_long_data(2, $partido->Logo_Partido);

        }

        $stmt->execute();
        $stmt->close();

    }

}
