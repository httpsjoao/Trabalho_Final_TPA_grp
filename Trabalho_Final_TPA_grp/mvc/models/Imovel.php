<?php

class Imovel {
    private $conn;
    public $table_name = "imoveis";

    public $id;
    public $descricao;
    public $preco;
    public $endereco;
    public $cidade;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (descricao, preco, endereco, cidade) VALUES (:descricao, :preco, :endereco, :cidade)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));

        // Bind parameters
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':cidade', $this->cidade);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne() {
        $query = "SELECT descricao, preco, endereco, cidade FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->descricao = $row['descricao'];
        $this->preco = $row['preco'];
        $this->endereco = $row['endereco'];
        $this->cidade = $row['cidade'];
    }

    // Update - Atualizar os dados de um usuário
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET descricao = :descricao, preco = :preco, endereco = :endereco, cidade = :cidade WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));

        // Bind parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':cidade', $this->cidade);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>