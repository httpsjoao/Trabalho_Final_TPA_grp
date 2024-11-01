<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta tarefa="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de tarefas</title>
</head>
<body>
    <h1>Detalhes de tarefas</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Tarefaw:</strong> <?php echo htmlspecialchars($user['descricao'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Prazoa:</strong> <?php echo htmlspecialchars($user['preco'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Prazos:</strong> <?php echo htmlspecialchars($user['endereco'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Prazod:</strong> <?php echo htmlspecialchars($user['cidade'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="index.php">Voltar para lista de usuários</a>
</body>
</html>
