<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Lista de Pacientes</h2>

    <a href="../../controllers/pacienteController.php?action=create" class="btn btn-success mb-3">Novo Paciente</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th class="text-center" style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pacientes)): ?>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['id'] ?></td>
                        <td><?= htmlspecialchars($paciente['nome']) ?></td>
                        <td><?= htmlspecialchars($paciente['email']) ?></td>
                        <td><?= htmlspecialchars($paciente['telefone']) ?></td>
                        <td class="text-center">
                            <a href="../../controllers/pacienteController.php?action=edit&id=<?= $paciente['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="../../controllers/pacienteController.php?action=delete&id=<?= $paciente['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum paciente encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../../index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>
