<?php
require_once __DIR__ . '/../Database.php';

class Consultas {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // Buscar todas as consultas (com JOIN para mostrar nomes de paciente e médico)
    public function getAll() {
        $stmt = $this->conn->prepare("
            SELECT c.id, c.data, c.hora, 
                   p.nome AS nome_paciente, 
                   m.nome AS nome_medico
            FROM consultas c
            JOIN pacientes p ON c.paciente_id = p.id
            JOIN medicos m ON c.medico_id = m.id
            ORDER BY c.data, c.hora
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar uma consulta por ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM consultas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar nova consulta
    public function create($paciente_id, $medico_id, $data, $hora) {
        $stmt = $this->conn->prepare("
            INSERT INTO consultas (paciente_id, medico_id, data, hora)
            VALUES (:paciente_id, :medico_id, :data, :hora)
        ");
        $stmt->bindParam(':paciente_id', $paciente_id);
        $stmt->bindParam(':medico_id', $medico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':hora', $hora);
        return $stmt->execute();
    }

    // Atualizar consulta existente
    public function update($id, $paciente_id, $medico_id, $data, $hora) {
        $stmt = $this->conn->prepare("
            UPDATE consultas
            SET paciente_id = :paciente_id,
                medico_id = :medico_id,
                data = :data,
                hora = :hora
            WHERE id = :id
        ");
        $stmt->bindParam(':paciente_id', $paciente_id);
        $stmt->bindParam(':medico_id', $medico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Excluir consulta
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM consultas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
