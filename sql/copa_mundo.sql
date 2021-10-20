-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Out-2021 às 19:48
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `copa_mundo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

DROP TABLE IF EXISTS `cartao`;
CREATE TABLE IF NOT EXISTS `cartao` (
  `jogos_idrodada` int(11) NOT NULL,
  `jogador_idjogador` int(11) NOT NULL,
  `amarelo` tinyint(1) NOT NULL,
  `vermelho` tinyint(1) NOT NULL,
  `tempo` varchar(20) NOT NULL,
  KEY `jogador_idjogador` (`jogador_idjogador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadio`
--

DROP TABLE IF EXISTS `estadio`;
CREATE TABLE IF NOT EXISTS `estadio` (
  `idestadio` int(11) NOT NULL,
  `descrição` varchar(20) DEFAULT NULL,
  `localização` varchar(20) DEFAULT NULL,
  `capacidade` int(11) NOT NULL,
  PRIMARY KEY (`idestadio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gols`
--

DROP TABLE IF EXISTS `gols`;
CREATE TABLE IF NOT EXISTS `gols` (
  `jogo_idrodada` int(11) NOT NULL,
  `jogador_idjogador` int(11) DEFAULT NULL,
  `tempo` varchar(50) DEFAULT NULL,
  KEY `jogador_idjogador` (`jogador_idjogador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` char(3) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

DROP TABLE IF EXISTS `jogador`;
CREATE TABLE IF NOT EXISTS `jogador` (
  `idjogador` smallint(6) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `camisa` int(11) NOT NULL,
  `posicao` varchar(20) DEFAULT NULL,
  `pais_idpais` smallint(6) NOT NULL,
  `situacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idjogador`),
  KEY `pais_idpais` (`pais_idpais`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `idrodada` int(11) NOT NULL,
  `data` date NOT NULL,
  `estadio_idestadio` int(11) NOT NULL,
  `pais_idpais_1` int(11) NOT NULL,
  `pais_idpais_2` int(11) NOT NULL,
  `gols_idpais_1` int(11) NOT NULL,
  `gols_idpais_2` int(11) NOT NULL,
  `publico` int(11) NOT NULL,
  PRIMARY KEY (`idrodada`),
  KEY `estadio_idestadio` (`estadio_idestadio`),
  KEY `pais_idpais_1` (`pais_idpais_1`),
  KEY `pais_idpais_2` (`pais_idpais_2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` int(11) NOT NULL,
  `selecao` varchar(20) DEFAULT NULL,
  `continente` varchar(20) DEFAULT NULL,
  `tecnico` varchar(20) DEFAULT NULL,
  `pontos` int(11) NOT NULL,
  `vitorias` int(11) NOT NULL,
  `empates` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL,
  `golspro` int(11) NOT NULL,
  `golscontra` int(11) NOT NULL,
  `grupo_idgrupo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idpais`),
  KEY `grupo_idgrupo` (`grupo_idgrupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `substituicao`
--

DROP TABLE IF EXISTS `substituicao`;
CREATE TABLE IF NOT EXISTS `substituicao` (
  `jogos_idrodada` int(11) NOT NULL,
  `jogador_idjogador_sai` int(11) DEFAULT NULL,
  `jogador_idjogador_entra` int(11) DEFAULT NULL,
  `tempo` varchar(50) DEFAULT NULL,
  KEY `jogador_idjogador_sai` (`jogador_idjogador_sai`),
  KEY `jogador_idjogador_entra` (`jogador_idjogador_entra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
