<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Usuário</title>
</head>
<body>
    <h1>Atualizando Usuário</h1>
    <form action="index.php?imovelAction=update&id=<?php echo $user['id']; ?>" method="post">
        <label for="descricao">descricao:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($user['descricao'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="preco">Prazoa:</label>
        <input type="text" id="preco" name="preco" value="<?php echo htmlspecialchars($user['preco'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="endereco">Prazos:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($user['endereco'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="cidade">Prazod:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($user['cidade'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form> 
    <a href="index.php">Voltar para lista de tarefas</a>
</body>
</html>
