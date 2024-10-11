-- Active: 1724718463162@@127.0.0.1@3306@sistema_clientes

CREATE DATABASE sistema_clientes;

DROP DATABASE sistema_clientes;

USE sistema_clientes;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    arquivo_pdf VARCHAR(255) NOT NULL
);

SELECT * FROM clientes;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nivel_acesso VARCHAR(255) NOT NULL
);