<?php
// Simples roteador para MVC básico

// Define controller e action padrões
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'paciente';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Mapeia controller para arquivo e classe
$controllersMap = [
    'paciente' => 'controllers/pacienteController.php',
    'medico'   => 'controllers/medicoController.php',
    'consulta' => 'controllers/consultaController.php',
];

// Verifica se o controller existe
if (!array_key_exists($controller, $controllersMap)) {
    die("Controller '$controller' não encontrado.");
}

// Inclui o arquivo do controller
require_once $controllersMap[$controller];

// Nome da classe do controller (convenção)
$controllerClass = ucfirst($controller) . 'Controller';

// Verifica se a classe existe
if (!class_exists($controllerClass)) {
    die("Classe do controller '$controllerClass' não encontrada.");
}

// Instancia o controller
$controllerObj = new $controllerClass();

// Verifica se o método (action) existe
if (!method_exists($controllerObj, $action)) {
    die("Ação '$action' não encontrada no controller '$controllerClass'.");
}

// Executa a ação
$controllerObj->$action();
