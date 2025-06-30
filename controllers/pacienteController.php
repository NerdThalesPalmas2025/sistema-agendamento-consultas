<?php
require_once '../models/Paciente.php';

class PacienteController {

    private $pacienteModel;

    public function __construct() {
        $this->pacienteModel = new Paciente();
    }

    // Listar todos os pacientes
    public function index() {
        $pacientes = $this->pacienteModel->getAll();
        include '../views/paciente/index.php';
    }

    // Mostrar formulário de criação
    public function create() {
        include '../views/paciente/create.php';
    }

    // Salvar novo paciente
    public function store() {
        if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'])) {
            $this->pacienteModel->create($_POST['nome'], $_POST['email'], $_POST['telefone']);
            header('Location: pacienteController.php?action=index');
        }
    }

    // Mostrar formulário de edição
    public function edit($id) {
        $paciente = $this->pacienteModel->getById($id);
        include '../views/paciente/edit.php';
    }

    // Atualizar paciente
    public function update($id) {
        if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'])) {
            $this->pacienteModel->update($id, $_POST['nome'], $_POST['email'], $_POST['telefone']);
            header('Location: pacienteController.php?action=index');
        }
    }

    // Excluir paciente
    public function delete($id) {
        $this->pacienteModel->delete($id);
        header('Location: pacienteController.php?action=index');
    }
}

// Roteamento simples
$controller = new PacienteController();
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
