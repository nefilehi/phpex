-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2024 às 01:25
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.12

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
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `arquivo_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `arquivo_pdf`) VALUES
(5, 'moraes', 'moraes@gmail.com', '67086f82182a4-Lista Fixação maio24.pdf'),
(6, 'nefi', 'nefi@gmail.com', '672d484a567a3-67086f82182a4-Lista Fixação maio24.pdf'),
(7, 'reginaldo', 'reginaldo@gmail.com', '672d568c37163-672d484a567a3-67086f82182a4-Lista Fixação maio24.pdf'),
(8, 'reginaldo2', 'reginaldo@gmail.com', '672d56e5136b6-672d484a567a3-67086f82182a4-Lista Fixação maio24.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `imagem`) VALUES
(7, 'computador razer', 'pc gamer', '10000.00', 5, '672d473bb52ea-pc.jpg'),
(8, 'caneta azul', 'caneta para escrever', '10.00', 2, '672d52b465763-caneta.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nivel_acesso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_acesso`) VALUES
(1, 'nefi1', 'nefi@gmail.com', '$2y$10$N9D/YK15D1DDEgv5sVPG1OtW6/hiTgyCxuBbZJDvMIys.D1ooGr2e', 'ADMINISTRADOR'),
(2, 'lehi', 'lehi@gmail.com', '$2y$10$G4lonfxzRxIkn3aEkEo6Te1oi1mB6f/qTWrqiYl4SwGSGyyQKtDKm', 'COMUM'),
(3, 'pablo', 'pablo@cadeirado.com', '$2y$10$5JQTNL3KrLenuB7pX4baOuJlibRH7Ta5i5sl8hCmj3PyjWtJ3yufa', 'COMUM'),
(4, 'datena', 'datena@cadeirando.com', '$2y$10$sJPp5ISJzaE0VjuN3i.UJO7iFEAN/Vi.pYwhJSEGYuzYO2vEw6nui', 'ADMINISTRADOR'),
(5, 'ze das couves 2', 'ze@couves.com', '$2y$10$HlVhMb90Mzv5YGDJPnj7xuo3aZ66zUiknxgd7xMvW5i1fJU.67H5S', 'COMUM'),
(7, 'lol', 'lol@lol.com', '$2y$10$4iKJLgMjw5BcZaa0t2Vf8O4GPGwDt/thsqBui.lynfYgfimGC9Nsa', 'COMUM'),
(8, 'reginaldo', 'reginaldo@gmail.com', '$2y$10$dM4.dZuXm60cn3wMPEJ6zeBYPTbw1/iZLseeUY57GkqVSFzZV2Aym', 'COMUM');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
