<?php
session_start();

// Inclui as configurações do banco de dados e os controladores
include_once 'config/database.php';
include_once 'controllers/UserController.php';
include_once 'controllers/ImovelController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$imovelController = new ImovelController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$imovelAction = isset($_GET['imovelAction']) ? $_GET['imovelAction'] : '';
$imovelId = isset($_GET['imovelId']) ? $_GET['imovelId'] : null;

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

// Determinar a ação do usuário
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $message = $userController->create($name, $email, $senha);
            echo $message;
            echo '<a href="index.php">Voltar para a lista de usuários</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

    case 'read':
        if ($id) {
            $user = $userController->readOne($id);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'ID do usuário é necessário.';
        }
        break;

    case 'update':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $message = $userController->update($id, $name, $email, $senha);
                echo $message;
                echo '<a href="index.php">Voltar para a lista de usuários</a>';
            } else {
                $user = $userController->readOne($id);
                include 'views/user/update.php';
            }
        } else {
            echo 'ID do usuário é necessário.';
        }
        break;

    case 'delete':
        if ($id) {
            $message = $userController->delete($id);
            echo $message;
            echo '<a href="index.php">Voltar para a lista de usuários</a>';
        } else {
            echo 'ID do usuário é necessário.';
        }
        break;

    default:
        $users = $userController->index();
        include 'views/user/index.php';
        break;
}

// Controlador de Imóveis
switch ($imovelAction) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $message = $imovelController->create($descricao, $preco, $endereco, $cidade);
            echo $message;
            echo '<a href="index.php">Voltar para a lista de imóveis</a>';
        } else {
            include 'views/imovel/create.php';
        }
        break;

    case 'read':
        if ($imovelId) {
            $imovel = $imovelController->readOne($imovelId);
            if (is_array($imovel)) {
                include 'views/imovel/show.php';
            } else {
                echo $imovel; // Exibir mensagem de erro
            }
        } else {
            echo 'ID do imóvel é necessário.';
        }
        break;

    case 'update':
        if ($imovelId) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $endereco = $_POST['endereco'];
                $cidade = $_POST['cidade'];
                $message = $imovelController->update($imovelId, $descricao, $preco, $endereco, $cidade);
                echo $message;
                echo '<a href="index.php">Voltar para a lista de imóveis</a>';
            } else {
                $imovel = $imovelController->readOne($imovelId);
                include 'views/imovel/update.php';
            }
        } else {
            echo 'ID do imóvel é necessário.';
        }
        break;

    case 'delete':
        if ($imovelId) {
            $message = $imovelController->delete($imovelId);
            echo $message;
            echo '<a href="index.php">Voltar para a lista de imóveis</a>';
        } else {
            echo 'ID do imóvel é necessário.';
        }
        break;

    default:
        $imoveis = $imovelController->index();
        include 'views/imovel/index.php';
        break;
}
?>
