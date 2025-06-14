<?php
// Este arquivo PHP vai receber os dados do formulário de agendamento

echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Confirmação de Agendamento</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados foram enviados via método POST
    if (empty($_POST['medico']) || empty($_POST['data_consulta']) || empty($_POST['hora_consulta'])) {
        echo "<div class='message error'>Erro: Todos os campos são obrigatórios para agendar.</div>";
    } else {
        $medico = htmlspecialchars($_POST['medico']);
        $data_consulta = htmlspecialchars($_POST['data_consulta']);
        $hora_consulta = htmlspecialchars($_POST['hora_consulta']);

        echo "<div class='message'><h2>Consulta Agendada com Sucesso!</h2>";
        echo "<p><strong>Médico:</strong> " . $medico . "</p>";
        echo "<p><strong>Data:</strong> " . date('d/m/Y', strtotime($data_consulta)) . "</p>"; // Formata a data para BR
        echo "<p><strong>Hora:</strong> " . $hora_consulta . "</p>";
        echo "<p><em>(Em um sistema real, o agendamento seria salvo em um banco de dados e verificaria disponibilidade.)</em></p>";
        echo "</div>";
    }
} else {
    echo "<div class='message error'>Método de requisição inválido. Por favor, acesse via formulário.</div>";
}

echo "<a href='agendar_consulta.html' class='back-link'>Agendar outra consulta</a>";
echo "</body>
</html>";
?>