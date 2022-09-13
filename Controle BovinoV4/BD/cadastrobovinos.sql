-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Set-2022 às 23:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastrobovinos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bovinos`
--

CREATE TABLE `bovinos` (
  `identificacao` int(7) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `data_nascimento` date  DEFAULT NULL,
  `sexo` enum('macho','fêmea') DEFAULT NULL,
  `descricao` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `identificacao_compra` int(7) NOT NULL,
  `data_compra` date   DEFAULT NULL,
  `vendedor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `natalidades`
--

CREATE TABLE `natalidades` (
  `identificacao_natalidade` int(7) NOT NULL,
  `filho_da_vaca` varchar(30) DEFAULT NULL,
  `filho_do_boi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacinados`
--

CREATE TABLE `vacinados` (
  `identificacao_vacinado` int(7) NOT NULL,
  `febre_aftosa1` date  DEFAULT NULL,
  `febre_aftosa2` date  DEFAULT NULL,
  `febre_aftosa3` date  DEFAULT NULL,
  `febre_aftosa4` date  DEFAULT NULL,
  `febre_aftosa5` date  DEFAULT NULL,
  `brucelose` date  DEFAULT NULL,
  `raiva1` date DEFAULT NULL,
  `raiva2` date DEFAULT NULL,
  `raiva3` date  DEFAULT NULL,
  `raiva4` date  DEFAULT NULL,
  `raiva5` date  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bovinos`
--
ALTER TABLE `bovinos`
  ADD PRIMARY KEY (`identificacao`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD KEY `fk_compBovinos` (`identificacao_compra`);

--
-- Índices para tabela `natalidades`
--
ALTER TABLE `natalidades`
  ADD KEY `fk_natBovinos` (`identificacao_natalidade`);

--
-- Índices para tabela `vacinados`
--
ALTER TABLE `vacinados`
  ADD KEY `fk_vaciBovinos` (`identificacao_vacinado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bovinos`
--
ALTER TABLE `bovinos`
  MODIFY `identificacao` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compBovinos` FOREIGN KEY (`identificacao_compra`) REFERENCES `bovinos` (`identificacao`);

--
-- Limitadores para a tabela `natalidades`
--
ALTER TABLE `natalidades`
  ADD CONSTRAINT `fk_natBovinos` FOREIGN KEY (`identificacao_natalidade`) REFERENCES `bovinos` (`identificacao`);

--
-- Limitadores para a tabela `vacinados`
--
ALTER TABLE `vacinados`
  ADD CONSTRAINT `fk_vaciBovinos` FOREIGN KEY (`identificacao_vacinado`) REFERENCES `bovinos` (`identificacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
