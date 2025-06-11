<?php
require_once 'config/db.php';

class Paciente {
    public static function listar() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM pacientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function salvar($nome) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO pacientes (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }
}
