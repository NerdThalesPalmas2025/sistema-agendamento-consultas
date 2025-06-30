<?php
require_once __DIR__ . '/../Database.php';

class Medicos {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // Buscar todos os médicos
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM medicos ORDER BY nome");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar médico por ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM medicos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar novo médico
    public function create($nome, $especialidade, $email) {
        $stmt = $this->conn->prepare("INSERT INTO medicos (nome, especialidade, email) VALUES (:nome, :especialidade, :email)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Atualizar médico existente
    public function update($id, $nome, $especialidade, $email) {
        $stmt = $this->conn->prepare("UPDATE medicos SET nome = :nome, especialidade = :especialidade, email = :email WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Excluir médico
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM medicos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
