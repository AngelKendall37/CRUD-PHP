<?php
// Controlador para gestionar personas y departamentos
class PersonDepartController
{
    private $model;

    public function __construct()
    {
        require_once __DIR__ . '/../models/PersonDepartModel.php';
        $this->model = new PersonDepartModel();
    }

    public function showAll()
    {
        $data = $this->model->getAllPersonsWithDepartments();
        $departamentos = $this->model->getAllDepartments();
        require_once __DIR__ . '/../views/PersonDepart.php'; // Mostrar vista
    }

    public function addPerson()
    {
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $departamento_id = (int)$_POST['departamento_id'];

            $this->model->addPerson($nombre, $apellido, $departamento_id);
            header('Location: index.php?controller=persondepart&action=showAll');
            exit();
        }
    }

    public function deletePerson()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->model->deletePerson($id);
            header('Location: index.php?controller=persondepart&action=showAll');
            exit();
        }
    }

    public function updatePerson()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $departamento_id = (int)$_POST['departamento_id'];

            $success = $this->model->updatePerson($id, $nombre, $apellido, $departamento_id);

            // Respuesta en formato JSON
            echo json_encode(['status' => $success ? 'success' : 'error']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        }
    }
}
?>





