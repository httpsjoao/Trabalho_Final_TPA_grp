<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando novo Usuário</title>
</head>
<body>
    <h1>Criando novo Usuário</h1>
    <form action="index.php?action=create" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="senha" id="senha" name="senha" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Voltar para lista de usuários</a>
</body>
</html>
