-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Abr-2015 às 22:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sgpm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `login` (`login`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `login`, `senha`, `nome_funcionario`) VALUES
(1, 'fhnelsis', '12345', 'Francisco Henrique de Paiva Nelsis'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(4) NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf`) VALUES
(1, 'José Emiliano Gonçalves', '83691247511'),
(2, 'João Augusto Silveira Filho', '93125661571'),
(4, 'Paulo da Silva Santos', '9745632111'),
(5, 'Ana de Mesquita Nelsis', '93121548477'),
(6, 'Carlos Antônio Pinheiro Borba', '89651985195'),
(7, 'Vilson de Souza Camargo', '98487877484'),
(8, 'Francisco Henrique de Paiva Nelsis', '83330763000'),
(9, 'Rodrigo de Almeida Martins', '65951954878'),
(10, 'Diego de Oliveira Marinho', '98481195138'),
(11, 'Bruno Quintino Camões', '81658787398'),
(12, 'Helen de Azevedo Silva', '84718272646'),
(13, 'Viviane Gastão Vicentini', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(10) NOT NULL AUTO_INCREMENT,
  `id_paciente` varchar(4) NOT NULL,
  `id_funcionario` varchar(4) NOT NULL,
  PRIMARY KEY (`id_prontuario`),
  UNIQUE KEY `id_prontuario` (`id_prontuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
