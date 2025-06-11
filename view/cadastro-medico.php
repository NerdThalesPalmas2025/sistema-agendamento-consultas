<?php
    include "../database.php";
    include "../DAO/MedicoDAO.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $medicoNome = $_POST["nome"];    
        $especialidade = $_POST["especialidade"];
        $tel = $_POST["telefone"];

        $db = Database::getInstance();
        $medicos = new MedicoDAO($db);
        
        $medicos->create($especialidade, $tel, $medicoNome);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Médicos</title>
</head>
<body>
<h1>Cadastro de Médicos</h1>

<!-- Formulário para cadastrar médicos -->
<form action="" method="POST">
    <label for="nome">Nome do Médico:</label>
    <input type="text" id="nome" name="nome" required>
    <br><br>

    <label for="especialidade">Especialidade:</label>
    <input type="text" id="especialidade" name="especialidade" required>
    <br><br>

    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" required>
    <br><br>

    <button type="submit">Cadastrar Médico</button>
</form>
</body>
</html>