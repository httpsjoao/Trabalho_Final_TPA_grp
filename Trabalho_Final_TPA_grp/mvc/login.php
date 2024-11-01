<?php
session_start();

// Configurações do banco de dados
$servername = "localhost";
$username = "root"; // Altere se necessário
$password = "";     // Altere se necessário
$dbname = "sistema_imobiliaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$email = $senha = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos estão definidos
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['senha'])) {
        $senha = $_POST['senha'];
    }

    if (isset($_POST['acao']) && $_POST['acao'] == 'login') {
        // Lógica de login
        $sql = "SELECT id, senha FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $senha_hash);
            $stmt->fetch();
            if (password_verify($senha, $senha_hash)) {
                $_SESSION['email_id'] = $id;
                header("Location: pratica/index.php");
                exit();
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado.";
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] == 'registrar') {
        // Lógica de registro
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, senha) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $senha_hash);
            if ($stmt->execute()) {
                $_SESSION['email_id'] = $conn->insert_id;
                header("Location: pagina_protegida.php");
                exit();
            } else {
                $erro = "Erro ao registrar o usuário.";
            }
        } else {
            $erro = "Usuário já existe.";
        }
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
    <title>Login ou Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login ou Registro</h2>
        
        <form method="POST" action="">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="acao" value="login">Fazer Login</button>
            <button type="submit" name="acao" value="registrar">Registrar</button>
        </form>
        
        <?php if (!empty($erro)) echo "<p class='error'>$erro</p>"; ?>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>
</body>
</html>
