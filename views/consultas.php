<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Consultas Agendadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Consultas Agendadas</h2>

    <a href="../../controllers/consultaController.php?action=create" class="btn btn-success mb-3">Agendar Nova Consulta</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th class="text-center" style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($consultas)): ?>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id'] ?></td>
                        <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                        <td><?= date('H:i', strtotime($consulta['hora'])) ?></td>
                        <td><?= htmlspecialchars($consulta['nome_paciente']) ?></td>
                        <td><?= htmlspecialchars($consulta['nome_medico']) ?></td>
                        <td class="text-center">
                            <a href="../../controllers/consultaController.php?action=edit&id=<?= $consulta['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="../../controllers/consultaController.php?action=delete&id=<?= $consulta['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta consulta?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhuma consulta agendada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../../index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>
