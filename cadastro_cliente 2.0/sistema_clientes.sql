-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/10/2024 às 01:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `arquivo_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `arquivo_pdf`) VALUES
(1, 'lucas', 'lucas@gmail.com', '67085d647281e-Tutorial - Cadastro de Cliente com Upload-imagens-0-mesclado.pdf'),
(2, 'jair', 'jair@gmail.com', '67085dc23c545-Tutorial - Cadastro de Cliente com Upload-imagens-0-mesclado.pdf'),
(3, 'Nefi', 'Nefi@gmail.com', '67085de9654f3-Tutorial - Cadastro de Cliente com Upload-imagens-0-mesclado.pdf'),
(4, 'Forsen', '4sen@gmail.com', '67085f2b2a3be-Tutorial - Cadastro de Cliente com Upload-imagens-0-mesclado.pdf'),
(5, 'Friede', '123@gmail.com', '67085f61a4e4b-Tutorial - Cadastro de Cliente com Upload-imagens-0-mesclado.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_acesso`) VALUES
(1, 'João', 'joaosilverio@gmail.com', '$2y$10$5OI5yjdlZILG56PMn1BDl.FnaW0b7MCuOiPN/4H3Pwd7iI25lMDky', 'COMUM'),
(2, 'lucas', 'lucas@gmail.com', '$2y$10$fw3xBZsSkZR2ZYiQFjnbe..Bo05pSna0j5lK9d5nV5uYkIRKgiXOC', 'COMUM'),
(3, 'jair', 'jair@gmail.com', '$2y$10$/VW2AHRVwFcPQUiavcutqenfaDlFLxcA71lt1IH3hUXMAYM3z.b5C', 'COMUM'),
(4, 'Bruno', 'bruno@gmail.com', '$2y$10$k6UpwauFuRZ/f7DTdT7hSeJjcsLrmst1sviPu7/W18GbE3fIMB25i', 'COMUM'),
(5, 'Friede', '123@gmail.com', '$2y$10$XOe5FusqkZGTiNuqWzOsvOLm.xtU9Z0V/sfAYC1qsKwt5Mdblg2oS', 'COMUM');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
