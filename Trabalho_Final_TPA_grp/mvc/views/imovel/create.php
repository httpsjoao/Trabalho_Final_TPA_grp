<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando nova imovel</title>
</head>

<body>
    <h1>Criando nova imovel</h1>
    <form action="index.php?imovelAction=create" method="post">
        <label for="descricao">descricao:</label>
        <input type="text" id="name" name="descricao" required>
        <br>
        <label for="preco">preco:</label>
        <input type="text" id="preco" name="preco" required>
        <br>
        <label for="endereco">endereco:</label>
        <input type="text" id="endereco" name="endereco" required>
        <br>
        <label for="cidade">cidade:</label>
        <input type="text" id="cidade" name="cidade" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Voltar para lista de taredas</a>
</body>
</html>
