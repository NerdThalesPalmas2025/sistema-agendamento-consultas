<?php
require_once '../models/Consulta.php';
require_once '../models/Paciente.php';
require_once '../models/Medico.php';

class ConsultaController {

    private $consultaModel;
    private $pacienteModel;
    private $medicoModel;

    public function __construct() {
        $this->consultaModel = new Consulta();
        $this->pacienteModel = new Paciente();
        $this->medicoModel = new Medico();
    }

    // Listar todas as consultas
    public function index() {
        $consultas = $this->consultaModel->getAll();
        include '../views/consulta/index.php';
    }

    // Mostrar formulário de criação
    public function create() {
        $pacientes = $this->pacienteModel->getAll();
        $medicos = $this->medicoModel->getAll();
        include '../views/consulta/create.php';
    }

    // Armazenar nova consulta
    public function store() {
        if (isset($_POST['paciente_id'], $_POST['medico_id'], $_POST['data'], $_POST['hora'])) {
            $this->consultaModel->create($_POST['paciente_id'], $_POST['medico_id'], $_POST['data'], $_POST['hora']);
            header('Location: consultaController.php?action=index');
        } else {
            echo "Dados incompletos.";
        }
    }

    // Mostrar formulário de edição
    public function edit($id) {
        $consulta = $this->consultaModel->getById($id);
        $pacientes = $this->pacienteModel->getAll();
        $medicos = $this->medicoModel->getAll();
        include '../views/consulta/edit.php';
    }

    // Atualizar consulta
    public function update($id) {
        if (isset($_POST['paciente_id'], $_POST['medico_id'], $_POST['data'], $_POST['hora'])) {
            $this->consultaModel->update($id, $_POST['paciente_id'], $_POST['medico_id'], $_POST['data'], $_POST['hora']);
            header('Location: consultaController.php?action=index');
        } else {
            echo "Dados incompletos.";
        }
    }

    // Excluir consulta
    public function delete($id) {
        $this->consultaModel->delete($id);
        header('Location: consultaController.php?action=index');
    }
}

// Roteamento
$controller = new ConsultaController();
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
