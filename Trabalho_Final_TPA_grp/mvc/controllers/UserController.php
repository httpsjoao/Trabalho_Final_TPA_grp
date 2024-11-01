<?php

include_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create($name, $email, $senha) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if ($this->user->create()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id) {
        $this->user->id = $id;
        $this->user->readOne();

        if ($this->user->name != null) {
            // Cria um array associativo com os detalhes do usuário
            return array(
                "id" => $this->user->id,
                "nome" => $this->user->name,
                "email" => $this->user->email,
                "senha" => $this->user->senha
            );
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $name, $email, $senha) {
        $this->user->id = $id;
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if ($this->user->update()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id) {
        $this->user->id = $id;

        if ($this->user->delete()) {
            return "Usuário foi excluído.";
        } else {
            return "Não foi possível excluir usuário.";
        }
    }

    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários
    public function readAll() {
        // Verifica se a conexão com o banco de dados está válida
        if ($this->db === null) {
            return "Conexão com o banco de dados não estabelecida.";
        }

        $query = "SELECT id, nome, email, senha FROM " . $this->user->table_name;
        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            return "Erro ao preparar a consulta.";
        }

        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $users;
    }
}
?>
