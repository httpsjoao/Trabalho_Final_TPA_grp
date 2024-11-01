-- Criar o banco de dados
CREATE DATABASE sistema_imobiliaria;
USE sistema_imobiliaria;

-- Tabela de usuários (Para autenticação e controle de acesso dos corretores e administradores)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    /*tipo ENUM('corretor', 'administrador') DEFAULT 'corretor',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP*/
);

-- Tabela de imóveis (Cadastro dos imóveis para venda ou aluguel)
CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    -- tipo ENUM('venda', 'aluguel') NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    -- estado CHAR(2) NOT NULL,
    -- status ENUM('disponivel', 'indisponivel') DEFAULT 'disponivel',
    -- corretor_id INT,
    -- criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- FOREIGN KEY (corretor_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Inserir alguns dados iniciais para testes
INSERT INTO users (nome, email, senha/*, tipo*/) VALUES 
('Ana Corretora', 'ana.corretora@email.com', 'senha_criptografada_1'/*, 'corretor'*/),
('Carlos Administrador', 'carlos.admin@email.com', 'senha_criptografada_2'/*, 'administrador'*/);

INSERT INTO imoveis (titulo, descricao, tipo, preco, endereco, cidade, estado, status, corretor_id) VALUES 
('Apartamento no Centro', 'Apartamento de 3 quartos no centro da cidade', 'venda', 350000.00, 'Rua das Flores, 123', 'Cidade Exemplo', 'CE', 'disponivel', 1),
('Casa com Jardim', 'Casa de 4 quartos com grande jardim', 'aluguel', 2500.00, 'Av. Brasil, 456', 'Cidade Exemplo', 'CE', 'disponivel', 1);

-- Estruturas CRUD para os dados
-- Exemplo de inserção (CREATE)
INSERT INTO imoveis (titulo, descricao, tipo, preco, endereco, cidade, estado, status, corretor_id) 
VALUES ('Casa na Praia', 'Casa de 2 quartos com vista para o mar', 'venda', 450000.00, 'Rua das Ondas, 789', 'Praia Exemplo', 'PE', 'disponivel', 1);

-- Exemplo de leitura (READ)
SELECT * FROM imoveis;

-- Exemplo de atualização (UPDATE)
UPDATE imoveis 
SET preco = 3000.00 
WHERE id = 2;

-- Exemplo de exclusão (DELETE)
DELETE FROM imoveis 
WHERE id = 1;