<?php
class MedicoDAO {
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }

    public function create($nome, $especialidade, $tel) {
        $sql = "INSERT INTO medicos (especialidade, tel, nome) VALUES (:especialidade, :tel, :nome)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':especialidade' => $especialidade,
            ':tel' => $tel,
            ':nome' => $nome
        ]);
    }
}
