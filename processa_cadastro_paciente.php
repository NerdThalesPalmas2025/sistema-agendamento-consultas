<?php
// Este arquivo PHP vai "receber" (processar) os dados que o usuário digitou no formulário HTML de cadastro de paciente.

// A primeira parte é similar ao HTML: estamos criando uma página para mostrar o resultado do processamento.
echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Processamento de Cadastro de Paciente</title>
    <style>
        /* Estilos básicos para a página de resultado do processamento */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        /* Estilo para mensagens de sucesso (fundo verde claro, texto verde escuro) */
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; }
        /* Estilo para mensagens de erro (fundo vermelho claro, texto vermelho escuro) */
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        /* Estilo para o link de voltar */
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>";

// Esta é a parte principal do PHP:
// $_SERVER["REQUEST_METHOD"] == "POST" verifica se a página foi acessada porque um formulário FOI ENVIADO (usando o método POST).
// Se a pessoa tentar abrir este arquivo PHP diretamente no navegador (sem vir de um formulário), esta condição não será verdadeira.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Agora, vamos verificar se TODOS os campos obrigatórios do formulário (Nome, E-mail, Telefone, Senha)
    // foram preenchidos.
    // empty() é uma função PHP que verifica se uma variável está vazia.
    // $_POST['nome_paciente'] é como o PHP "pega" o valor que o usuário digitou no campo do HTML que tinha o atributo 'name'="nome_paciente".
    if (empty($_POST['nome_paciente']) || empty($_POST['email_paciente']) || empty($_POST['telefone_paciente']) || empty($_POST['senha_paciente'])) {
        // Se algum campo estiver vazio, mostramos uma mensagem de erro.
        echo "<div class='message error'>Erro: Todos os campos são obrigatórios.</div>";
    // Em seguida, verificamos a regra de negócio da senha: mínimo de 6 caracteres.
    // strlen() é uma função PHP que conta quantos caracteres (letras, números, símbolos) tem um texto (string).
    } elseif (strlen($_POST['senha_paciente']) < 6) {
        echo "<div class='message error'>Erro: A senha deve ter no mínimo 6 caracteres.</div>";
    } else {
        // Se todas as verificações acima (campos obrigatórios e senha mínima) passaram, então podemos "processar" os dados.

        // As linhas abaixo pegam os dados do formulário e guardam em variáveis PHP (que começam com $).
        // htmlspecialchars() é MUITO IMPORTANTE para segurança. Ela converte caracteres especiais em entidades HTML,
        // evitando que alguém insira código malicioso (como scripts) no seu formulário, que poderia ser executado no navegador.
        $nome_paciente = htmlspecialchars($_POST['nome_paciente']);
        $email_paciente = htmlspecialchars($_POST['email_paciente']);
        $telefone_paciente = htmlspecialchars($_POST['telefone_paciente']);
        $senha_paciente = htmlspecialchars($_POST['senha_paciente']);

        //  IMPORTANTE PARA ESTA ATIVIDADE 
        // POR ENQUANTO: Neste ponto do código, em um sistema real (que se conectaria a um banco de dados),
        // nós SALVARÍAMOS esses dados (nome, email, telefone, senha) em um BANCO DE DADOS.
        // Também verificaríamos se o e-mail já existe (para a regra de "e-mail único").
        // Para esta atividade simplificada, estamos APENAS EXIBINDO os dados que recebemos do formulário.
        // Isso já demonstra que a funcionalidade "processou" o cadastro.

echo "<div class='message'><h2>Cadastro de Paciente Realizado com Sucesso!</h2>";
        echo "<p><strong>Nome:</strong> " . $nome_paciente . "</p>"; // Exibe o nome que foi digitado
        echo "<p><strong>E-mail:</strong> " . $email_paciente . "</p>"; // Exibe o e-mail
        echo "<p><strong>Telefone:</strong> " . $telefone_paciente . "</p>"; // Exibe o telefone
        echo "<p><em>(Senha não exibida por segurança)</em></p>"; // Informa que a senha não é mostrada por ser sensível
        echo "</div>"; // Fecha a caixa de mensagem de sucesso
    }
} else {
    // Se a página for acessada diretamente (sem um formulário POST), mostramos esta mensagem de erro.
    echo "<div class='message error'>Método de requisição inválido. Por favor, acesse via formulário.</div>";
}

// Link para o usuário voltar ao formulário de cadastro de paciente.
echo "<a href='cadastro_paciente.html' class='back-link'>Voltar para o formulário de cadastro de paciente</a>";
echo "</body>
</html>";
?>