<?php
// Este é um exemplo SIMPLES para fins da atividade.
// Em um sistema real, aqui você faria:
// 1. Conexão com um banco de dados (ex: MySQL).
// 2. Validação mais robusta dos dados.
// 3. Salvaria os dados no banco de dados.
// 4. Encriptaria a senha (MUITO IMPORTANTE para segurança).

// Verificar se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $especialidade = $_POST['especialidade'];

    // Exibir os dados (APENAS PARA TESTE E DEMONSTRAÇÃO)
    echo "<!DOCTYPE html>";
    echo "<html lang='pt-BR'>";
    echo "<head>";
    echo "    <meta charset='UTF-8'>";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "    <title>Processando Cadastro</title>";
    echo "    <link rel='stylesheet' href='css/estilo.css'>";
    echo "</head>";
    echo "<body>";
    echo "    <div class='container'>";
    echo "        <h1>Dados do Médico Cadastrado (Apenas para Teste)</h1>";
    echo "        <p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
    echo "        <p><strong>E-mail:</strong> " . htmlspecialchars($email) . "</p>";
    // NUNCA exiba senhas em um sistema real. Aqui é apenas para fins didáticos.
    echo "        <p><strong>Senha (exibida apenas para demonstração):</strong> " . htmlspecialchars($senha) . "</p>";
    echo "        <p><strong>Especialidade:</strong> " . htmlspecialchars($especialidade) . "</p>";
    echo "        <p>Médico cadastrado com sucesso (simulação)!</p>";
    echo "        <a href='cadastro_medico.html' class='button'>Voltar ao Cadastro</a>";
    echo "    </div>";
    echo "</body>";
    echo "</html>";

} else {
    // Se a página for acessada diretamente sem POST, redirecionar
    header("Location: cadastro_medico.html");
    exit();
}
?>