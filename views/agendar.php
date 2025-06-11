<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Agendar Consulta</h2>
        <form action="../../controllers/consultaController.php?action=store" method="POST" class="card p-4 shadow-sm bg-white rounded">
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($pacientes as $paciente): ?>
                        <option value="<?= $paciente['id'] ?>"><?= htmlspecialchars($paciente['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="medico_id" class="form-label">Médico</label>
                <select name="medico_id" id="medico_id" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($medicos as $medico): ?>
                        <option value="<?= $medico['id'] ?>"><?= htmlspecialchars($medico['nome']) ?> - <?= htmlspecialchars($medico['especialidade']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" id="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="../../controllers/consultaController.php?action=index" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Agendar</button>
            </div>
        </form>
    </div>
</body>
</html>
