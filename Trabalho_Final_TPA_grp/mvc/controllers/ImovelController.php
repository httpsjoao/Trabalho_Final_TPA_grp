<?php

include_once 'models/Imovel.php';

class ImovelController {
    private $db;
    private $Imovel;

    public function __construct($db) {
        $this->db = $db;
        $this->Imovel = new Imovel($db);
    }

    // Método para criar um novo usuário
    public function create($descricao, $preco, $endereco, $cidade) {
        $this->Imovel->descricao = $descricao;
        $this->Imovel->preco = $preco;
        $this->Imovel->endereco = $endereco;
        $this->Imovel->cidade = $cidade;

        if($this->Imovel->create()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id) {
        $this->Imovel->id = $id;
        $this->Imovel->readOne();

        if($this->Imovel->tarefa != null) {
            // Cria um array associativo com os detalhes do usuário
            $task_arr = array(
                "id" => $this->Imovel->id,
                "descricao" => $this->Imovel->descricao,
                "preco" => $this->Imovel->preco,
                "endereco" => $this->Imovel->endereco,
                "cidade" => $this->Imovel->cidade
            );
            return $task_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $descricao, $preco, $endereco, $cidade) {
        $this->Imovel->id = $id;
        $this->Imovel->descricao = $descricao;
        $this->Imovel->preco = $preco;
        $this->Imovel->endereco = $endereco;
        $this->Imovel->cidade = $cidade;

        if($this->Imovel->update()) {
            return "Imovel atualizado.";
        } else {
            return "Não foi possível atualizar o Imovel.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id) {
        $this->Imovel->id = $id;

        if($this->Imovel->delete()) {
            return "Imovel foi excluído.";
        } else {
            return "Nao foi possível excluir Imovel.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT id, descricao, preco, endereco, cidade FROM " . $this->Imovel->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $Imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $Imoveis;
    }
}
?>
