-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2020 às 12:18
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `to-do`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registo`
--

CREATE TABLE `registo` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sobrenome` varchar(255) NOT NULL,
  `Cidade` varchar(255) DEFAULT NULL,
  `Telefone` int(9) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `verificado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`id`, `Nome`, `Sobrenome`, `Cidade`, `Telefone`, `Email`, `PASSWORD`, `verificado`) VALUES
(20, 'dsa', 'asd', '', 0, 'asdasd@dsfsdf.sdf', '123', 1),
(21, 'asd', 'sad', '', 0, 'asd@gmail.com', '123', 1),
(22, 'asd', 'asd', '', 0, 'dd@sdf.sdf', 'asd', NULL),
(24, 'Ricardo', 'Nogueira', 'Ermesinde', 0, 'ricardito@gmail.com', '123', 1),
(25, 'Jorge', 'Amaral', 'Ermesinde', 0, 'jorge@gmail.com', '123', 1),
(26, 'Rui', 'Duraes', 'Maia', 0, 'rui@gmail.com', '123', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registo`
--
ALTER TABLE `registo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registo`
--
ALTER TABLE `registo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
