<?php
session_start();

// joao linka aqui o banco de dados

$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "sistema_imobiliaria";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$usuario = $senha = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];


    $sql = "SELECT nome_atributo_id, nome_atributo_senha FROM nome_da_tabela WHERE nome_atributo_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();


    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();


        if (password_verify($senha, $senha_hash)) {

            $_SESSION['usuario_id'] = $id;
            header("Location: pagina_protegida.php");
            exit();
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="id Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <?php if (!empty($erro)) echo "<p class='error'>$erro</p>"; ?>
        <p>Não tem uma conta? <a href="registro.php">Registre-se</a></p>
    </div>
</body>
</html>