<?php
require_once '../models/Medico.php';

class MedicoController {

    private $medicoModel;

    public function __construct() {
        $this->medicoModel = new Medico();
    }

    // Listar todos os médicos
    public function index() {
        $medicos = $this->medicoModel->getAll();
        include '../views/medico/index.php';
    }

    // Mostrar formulário para cadastrar médico
    public function create() {
        include '../views/medico/create.php';
    }

    // Armazenar novo médico
    public function store() {
        if (isset($_POST['nome'], $_POST['especialidade'], $_POST['email'])) {
            $this->medicoModel->create($_POST['nome'], $_POST['especialidade'], $_POST['email']);
            header('Location: medicoController.php?action=index');
        } else {
            echo "Dados incompletos.";
        }
    }

    // Mostrar formulário de edição
    public function edit($id) {
        $medico = $this->medicoModel->getById($id);
        include '../views/medico/edit.php';
    }

    // Atualizar dados do médico
    public function update($id) {
        if (isset($_POST['nome'], $_POST['especialidade'], $_POST['email'])) {
            $this->medicoModel->update($id, $_POST['nome'], $_POST['especialidade'], $_POST['email']);
            header('Location: medicoController.php?action=index');
        } else {
            echo "Dados incompletos.";
        }
    }

    // Excluir médico
    public function delete($id) {
        $this->medicoModel->delete($id);
        header('Location: medicoController.php?action=index');
    }
}

// Roteamento
$controller = new MedicoController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($controller, $action)) {
    if ($id) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    echo "Ação inválida!";
}
