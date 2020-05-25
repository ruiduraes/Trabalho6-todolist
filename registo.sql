-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2020 às 18:11
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
  `Nome` varchar(30) NOT NULL,
  `Sobrenome` varchar(30) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Telefone` int(9) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`Nome`, `Sobrenome`, `Cidade`, `Telefone`, `Email`, `Password`) VALUES
('asd', 'asd', '', 0, 'asd@dsf.sdf', 's'),
('asd', 'asd', '', 0, 'asdasdad@dsdfsdfdssd.dsf', 's'),
('rerreerreer', 'aaaaaaa', '', 0, 'naaaaaaaaaaaaaaaaaaaao@gmasil.com', 'aaa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registo`
--
ALTER TABLE `registo`
  ADD UNIQUE KEY `Email` (`Email`);
ALTER TABLE `registo` ADD FULLTEXT KEY `Email_2` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
