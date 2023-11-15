-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/11/2023 às 03:35
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
  `fk_usuario_solicitante` int(11) NOT NULL,
  `fk_usuario_atendente` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_chamado`
--

INSERT INTO `tab_chamado` (`id_chamado`, `titulo`, `assunto`, `data_cadastro`, `gravidade`, `fk_usuario_solicitante`, `fk_usuario_atendente`, `fk_status`) VALUES
(1, 'Formatar Maquina', 'Formatar Maquina do setor A.', '0000-00-00 00:00:00', 1, 1, 2, 1),
(4, 'Chamado Teste', 'Chamado Teste', '0000-00-00 00:00:00', 1, 1, 2, 1),
(6, 'Chamado Teste 2', 'Chamado Teste 2', '2023-11-14 00:00:00', 1, 1, 1, 1),
(7, 'Chamado teste 3', 'Chamado teste 3', '2023-11-14 00:00:00', 1, 2, 1, 1);

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
(1, 'Criado'),
(2, 'Aguardando atribuição'),
(3, 'Atribuido'),
(4, 'Aguardando iniciar'),
(5, 'Em andamento'),
(6, 'Pausado'),
(7, 'Com impedimento'),
(8, 'Fechado'),
(9, 'Concluido');

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
(2, 'Nome Teste', 'DTI', 'nometeste@gmail.com', 'teste123'),
(5, 'Ivonete', 'Diretora', 'ivonete@gmail.com', 'teste123'),
(6, 'Nome Teste 2', 'DTI', 'nometeste@gmail.com', 'teste123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_chamado`
--
ALTER TABLE `tab_chamado`
  ADD PRIMARY KEY (`id_chamado`),
  ADD KEY `fk_usuario_solicitante` (`fk_usuario_solicitante`),
  ADD KEY `fk_usuario_atendente` (`fk_usuario_atendente`),
  ADD KEY `fk_status` (`fk_status`);

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
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tab_status_chamado`
--
ALTER TABLE `tab_status_chamado`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tab_chamado`
--
ALTER TABLE `tab_chamado`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`fk_status`) REFERENCES `tab_status_chamado` (`id_status`),
  ADD CONSTRAINT `fk_usuario_atendente` FOREIGN KEY (`fk_usuario_atendente`) REFERENCES `tab_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_usuario_solicitante` FOREIGN KEY (`fk_usuario_solicitante`) REFERENCES `tab_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
