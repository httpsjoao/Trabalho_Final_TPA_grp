<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imoveis</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Imoveis</h1>
    <a href="index.php?imovelAction=create">Criar nova Imoveis</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefaw</th>
                <th>Prazoa</th>
                <th>Prazos</th>
                <th>Prazod</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['descricao'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['preco'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['endereco'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['cidade'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="index.php?imovelAction=read&id=<?php echo $user['id']; ?>">Ver</a>
                        <a href="index.php?imovelAction=update&id=<?php echo $user['id']; ?>">Editar</a>
                        <a href="index.php?imovelAction=delete&id=<?php echo $user['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>