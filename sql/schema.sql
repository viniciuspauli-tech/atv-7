CREATE DATABASE IF NOT EXISTS sistema_pratos;
USE sistema_pratos;


CREATE TABLE IF NOT EXISTS pratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL
);