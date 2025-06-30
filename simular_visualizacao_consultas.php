echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Visualizar Consultas - Agendamento Fácil</title>
    <style>
        /* Estilos CSS idênticos ao visualizar_consultas.html para manter a aparência */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding-top: 30px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .consulta-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .consulta-item div {
            flex: 1 1 45%;
        }
        .consulta-item strong {
            color: #007bff;
        }
        .no-consultas {
            text-align: center;
            color: #888;
            font-style: italic;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <h2>Minhas Consultas Agendadas (Simulado)</h2>
        <?php
        // Este é um ARRAY de consultas simuladas (dados fixos, não vêm de um banco de dados de verdade).
        // Em um sistema real, estes dados seriam buscados de um banco de dados.
        $consultas_simuladas = [
            [
                'paciente' => 'Kauan',
                'medico' => 'Dr. Silva',
                'data' => '20/07/2025',
                'hora' => '10:00',
                'especialidade' => 'Clínico Geral'
            ],
            [
                'paciente' => 'Talhes', // Exemplo de consulta de outro paciente
                'medico' => 'Dra. Maria Aires',
                'data' => '21/07/2025',
                'hora' => '14:30',
                'especialidade' => 'Psicóloga'
            ],
            [
                'paciente' => 'Kauan',
                'medico' => 'Dr. Luiz Carlos',
                'data' => '25/07/2025',
                'hora' => '09:00',
                'especialidade' => 'Psiquiatra'
            ]
        ];

        // Verifica se o array de consultas não está vazio para exibir a lista
        if (empty($consultas_simuladas)) {
            echo "<p class='no-consultas'>Nenhuma consulta agendada para exibição (simulada).</p>";
        } else {
            // Loop que percorre cada consulta no array e a exibe
            foreach ($consultas_simuladas as $consulta) {
                echo "<div class='consulta-item'>"; // Inicia uma "caixa" para cada consulta
                echo "<div><strong>Paciente:</strong> " . htmlspecialchars($consulta['paciente']) . "</div>";
                echo "<div><strong>Médico:</strong> " . htmlspecialchars($consulta['medico']) . "</div>";
                echo "<div><strong>Data:</strong> " . htmlspecialchars($consulta['data']) . "</div>";
                echo "<div><strong>Hora:</strong> " . htmlspecialchars($consulta['hora']) . "</div>";
                echo "<div><strong>Especialidade:</strong> " . htmlspecialchars($consulta['especialidade']) . "</div>";
                echo "</div>"; // Fecha a "caixa" da consulta
            }
        }
        ?>
        <a href="visualizar_consultas.html" class="back-link">Voltar para a página de visualização</a>
    </div>
</body>
</html>