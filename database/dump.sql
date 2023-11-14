-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2023 às 17:36
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sgc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_chamado`
--

CREATE TABLE `tab_chamado` (
  `id_chamado` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `gravidade` int(11) NOT NULL,
  `id_usuario_solicitante` int(11) NOT NULL,
  `id_usuario_atendente` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_chamado`
--

INSERT INTO `tab_chamado` (`id_chamado`, `titulo`, `assunto`, `data_cadastro`, `gravidade`, `id_usuario_solicitante`, `id_usuario_atendente`, `id_status`) VALUES
(1, 'Formatar Maquina', 'Formatar Maquina do setor A.', '2023-11-14 16:33:02', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_status_chamado`
--

CREATE TABLE `tab_status_chamado` (
  `id_status` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_status_chamado`
--

INSERT INTO `tab_status_chamado` (`id_status`, `descricao`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baixa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id_usuario`, `nome`, `cargo`, `email`, `senha`) VALUES
(1, 'julio cesar', 'DTI', 'juliocesar@gmail.com', 'teste123'),
(2, 'Nome Teste', 'DTI', 'nometeste@gmail.com', 'teste123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_chamado`
--
ALTER TABLE `tab_chamado`
  ADD PRIMARY KEY (`id_chamado`);

--
-- Índices de tabela `tab_status_chamado`
--
ALTER TABLE `tab_status_chamado`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_chamado`
--
ALTER TABLE `tab_chamado`
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tab_status_chamado`
--
ALTER TABLE `tab_status_chamado`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
