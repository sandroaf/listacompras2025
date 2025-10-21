-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/10/2025 às 18:57
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
-- Banco de dados: `listacompras`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `codigo` int(11) NOT NULL COMMENT 'Código de Indentificação do Item',
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data e hora da inclusão do Item',
  `descricao` varchar(200) NOT NULL COMMENT 'Descrição do Item',
  `quantidade` decimal(12,2) NOT NULL DEFAULT 1.00 COMMENT 'Quantidade do Itens',
  `codigo_lista` int(11) NOT NULL COMMENT 'Código de relacionamento com a Lista de Compras'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item`
--

INSERT INTO `item` (`codigo`, `datahora`, `descricao`, `quantidade`, `codigo_lista`) VALUES
(1, '2025-10-14 17:25:35', 'Água', 12.00, 1),
(2, '2025-10-14 17:26:09', 'Pão', 6.00, 1),
(3, '2025-10-14 17:26:41', 'Ração Galinha', 10.00, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista`
--

CREATE TABLE `lista` (
  `codigo` int(11) NOT NULL COMMENT 'Código de identificação da Lista de Compras',
  `nome` varchar(100) NOT NULL COMMENT 'Nome da Lista de Compras'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lista`
--

INSERT INTO `lista` (`codigo`, `nome`) VALUES
(6, 'Acampamento'),
(1, 'Casa'),
(3, 'Escola'),
(8, 'Passeio'),
(7, 'Presentes'),
(2, 'Sítio'),
(5, 'Viagem');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `descricao_index` (`descricao`);

--
-- Índices de tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `nome_index` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de Indentificação do Item', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificação da Lista de Compras', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
