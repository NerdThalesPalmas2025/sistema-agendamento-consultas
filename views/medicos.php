<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Lista de Médicos</h2>

    <a href="../../controllers/medicoController.php?action=create" class="btn btn-success mb-3">Novo Médico</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Email</th>
                <th class="text-center" style="width: 150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($medicos)): ?>
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <td><?= $medico['id'] ?></td>
                        <td><?= htmlspecialchars($medico['nome']) ?></td>
                        <td><?= htmlspecialchars($medico['especialidade']) ?></td>
                        <td><?= htmlspecialchars($medico['email']) ?></td>
                        <td class="text-center">
                            <a href="../../controllers/medicoController.php?action=edit&id=<?= $medico['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="../../controllers/medicoController.php?action=delete&id=<?= $medico['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este médico?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum médico encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../../index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>
