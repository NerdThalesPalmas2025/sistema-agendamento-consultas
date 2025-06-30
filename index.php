<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Sistema de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Sistema de Agendamento de Consultas</h1>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="/../controllers/pacienteController.php?action=index" class="btn btn-primary btn-lg w-100">Pacientes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="/controllers/medicoController.php?action=index" class="btn btn-success btn-lg w-100">Médicos</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="/controllers/consultaController.php?action=index" class="btn btn-warning btn-lg w-100">Consultas</a>
            </div>
        </div>
    </div>
</body>
</html>
