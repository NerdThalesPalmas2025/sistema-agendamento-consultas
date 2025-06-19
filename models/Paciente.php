<?php
require_once __DIR__ . '/../config/Database.php';

class Paciente {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Buscar todos os pacientes
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM pacientes ORDER BY nome");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um paciente por ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pacientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar novo paciente
    public function create($nome, $email, $telefone) {
        $stmt = $this->conn->prepare("INSERT INTO pacientes (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        return $stmt->execute();
    }

    // Atualizar paciente existente
    public function update($id, $nome, $email, $telefone) {
        $stmt = $this->conn->prepare("UPDATE pacientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Excluir paciente
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pacientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
