-- Active: 1726534552337@@127.0.0.1@3306@sistema_clientes
CREATE TABLE sistema_clientes;

USE sistema_clientes;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    arquivo_pdf VARCHAR(255) NOT NULL
);

SELECT * FROM clientes;
