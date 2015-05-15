-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2015 às 23:10
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
-- Estrutura da tabela `atendimento`
--

CREATE TABLE IF NOT EXISTS `atendimento` (
  `id_atendimento` int(12) NOT NULL AUTO_INCREMENT,
  `tipo_atendimento` int(3) NOT NULL,
  `id_funcionario` int(5) NOT NULL,
  `data_atendimento` date NOT NULL,
  `fumante` varchar(1) NOT NULL,
  `alcool` varchar(1) NOT NULL,
  `alergia_reac_div` varchar(50) NOT NULL,
  `sintomas` varchar(30) NOT NULL,
  `queixa_principal` varchar(30) NOT NULL,
  `hist_molestia` varchar(100) NOT NULL,
  `frequencia_cardiaca` varchar(10) NOT NULL,
  `ritmo_cardiaco` varchar(10) NOT NULL,
  `pressao_arterial` varchar(10) NOT NULL,
  `ritmo_respiratorio` varchar(10) NOT NULL,
  `observacoes` varchar(300) NOT NULL,
  KEY `id_atendimento` (`id_atendimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(10) NOT NULL,
  `org_exp` varchar(10) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `data_nasc` date NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais_nacionalidade` varchar(30) NOT NULL,
  `cidade_natural` varchar(30) NOT NULL,
  `estado_natural` varchar(2) NOT NULL,
  `ubs_atendimento` varchar(30) NOT NULL,
  `nome_mae` varchar(30) NOT NULL,
  `nome_pai` varchar(30) NOT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `escolaridade` varchar(30) NOT NULL,
  `tipo_sanguineo` varchar(3) NOT NULL,
  `email_pessoal` varchar(50) NOT NULL,
  `email_prof` varchar(30) NOT NULL,
  `tel_cel` int(15) NOT NULL,
  `tel_fixo` int(15) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `login` (`login`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `login`, `senha`, `nome_funcionario`, `cargo`, `cpf`, `rg`, `org_exp`, `genero`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `pais_nacionalidade`, `cidade_natural`, `estado_natural`, `ubs_atendimento`, `nome_mae`, `nome_pai`, `estado_civil`, `escolaridade`, `tipo_sanguineo`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`) VALUES
(2, 'admin', 'admin', 'Francisco Henrique de Paiva Nelsis', 'Administrador', 2147483647, 2147483647, 'SSP/RS', 'M', '0000-00-00', 'Rua Silveiro, 597/401', 'Menino Deus', '90850-000', 'Porto Alegre', 'RS', 'Brasil', 'Porto Alegre', 'RS', 'UBS Menino Deus', 'Maria Cristina Paiva', 'Pedro Augosto Nelsis', 'Casado', 'Superior Completo', 'A+', 'fhnelsis@outlook.com', 'francisco.nelsis@ilegra.com', 2147483647, 2147483647),
(5, 'elisa.solano', 'eliosa', 'Elisa Pereira Solano', 'Enfermeira', 2147483647, 2147483647, 'SSP/RS', 'F', '1984-06-13', 'Travessa do Camarim, 480/201', 'Menino Deus', '90804-000', 'Porto Alegre', 'RS', 'Brasileira', 'Porto Aegre', 'RS', 'UBS Menino Deus', 'Luciana de Assis Pereira', 'Luiz de Almeida Solano', 'Casada', 'Superior Completo', 'A+', 'solanoelisa@hotmail.com', 'elisa.solano@ubs.com.br', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(4) NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `org_exp` varchar(10) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais_nacionalidade` varchar(30) NOT NULL,
  `cidade_natural` varchar(30) NOT NULL,
  `estado_natural` varchar(2) NOT NULL,
  `ubs_atendimento` varchar(50) NOT NULL,
  `nome_mae` varchar(50) NOT NULL,
  `nome_pai` varchar(50) NOT NULL,
  `profissao` varchar(30) NOT NULL,
  `estado_civil` varchar(30) NOT NULL,
  `escolaridade` varchar(30) NOT NULL,
  `tipo_sanguineo` varchar(5) NOT NULL,
  `email_pessoal` varchar(50) NOT NULL,
  `email_prof` varchar(50) NOT NULL,
  `tel_cel` varchar(30) NOT NULL,
  `tel_fixo` varchar(30) NOT NULL,
  `tel_contato` varchar(30) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf`, `rg`, `org_exp`, `genero`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `pais_nacionalidade`, `cidade_natural`, `estado_natural`, `ubs_atendimento`, `nome_mae`, `nome_pai`, `profissao`, `estado_civil`, `escolaridade`, `tipo_sanguineo`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `tel_contato`) VALUES
(32, 'Francisco Henrique Paiva Nelsis', '8330763000', 2147483647, 'SSP/RS', 'M', '1987-02-04', 'Rua Silveiro, 377', 'Menino Deus', 90850, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Menino Deus', 'Helenice Zani de Paiva', 'James Sidney Schiafino Nelsis', 'Analista de Sistemas', 'Solteiro', 'Superior Incompleto', 'A+', 'fhnelsis@outlook.com', 'fransico.nelsis@ilegra.com', '5191010061', '5130192991', '5130897744'),
(41, 'Fábio Tentardini Leite', '9631954877', 99548487, 'SSP/RS', 'M', '1986-03-12', 'Rua Espírito Santo, 483/412', 'Centro Histórico', 90900, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Centro Histórico', 'Vera Tentardini Leite', 'João Tentardini Leite', 'Personal Trainer', 'Solteiro', 'Superior Completo', 'AB+', 'fabio.leite@gmail.com', 'fleite@academia.com.br', '5192745444', '5130186211', ''),
(42, 'Adão de Oliveira Barcellos', '93654179966', 1998788481, 'SSP/RS', 'M', '1953-06-09', 'Rua Duque de Caxias, 321/203', 'Centro Histórico', 90960, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Centro Histórico', 'Magali Santos Oliveira', 'Cláudio Barcellos', 'Administrador', 'Casado', 'Ensino Médio Completo', 'B+', 'abarcellos@outlook.com', 'adaobarcellos@empresa.com.br', '5197322544', '5130254877', '5130998877'),
(43, 'Suelen Garcia Venerozo', '89665412111', 2147483647, 'SSPRS', 'F', '1989-10-04', 'Avenida Sertório, 1600/802', 'Sarandi', 90640, 'Porto Alegre', 'RS', 'Brasil', 'Três Coroas', 'RS', 'UBS Sarandi', 'Maria dos Santos Garcia', 'João Antônio Venerozo', 'Designer', 'Solteira', 'Superior Completo', 'A+', 'suvenerozo@gmail.com', 'suelen.venerozo@idb.com.br', '5192749987', '5130287444', '5487123658'),
(44, 'Ana Terra de Almeida Silva', '93154111151', 2147483647, 'SSPRS', 'F', '1989-12-18', 'Rua Andradas, 120/610', 'Centro Histórico', 90860, 'Porto Alegre', 'RS', 'Brasileira', 'Porto Alegre', 'RS', 'UBS Centro Histórico', 'Júlia de Almeira Santos', 'Paulo Oliveira Silva', 'Analista de Turismo', 'Solteira', 'Superior Incompleto', 'A+', 'atgarcia@yahoo.com', 'ana.garcia@carlsonwagonlit.com', '5192658444', '5130458777', '5140019874'),
(107, 'Jéferson Machado de Assis', '97622215151', 1981981651, 'SSP/RS', '', '1986-02-19', 'Rua da República, 488/901', 'Cidade Baixa', 90874, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Cidade Baixa', 'Joana de Machado', 'Joaquim Pereira de Assis', 'Estudante', 'Solteiro', 'Superior Incompleto', 'A+', 'jeff@outlook.com', '', '5192454444', '5130244877', ''),
(108, 'Lucas Poletti Garcia', '932154877', 1819873159, 'SSP/RS', 'M', '1991-03-21', 'Rua do Samba, 820/41', 'Agronomia', 90874, 'Porto Alegre', 'RS', 'Brasileiro', 'Cachoeirinha', 'RS', 'UBS Agronomia', 'Cristina de Oliveira Poletti', 'Pedro de Assis Garcia', 'Engenheiro de Software', 'Solteiro', 'Superior Completo', 'AB+', 'lucaspolettig@gmail.com', 'lucas.garcia@und.com.br', '519254766', '5120141158', ''),
(109, 'Cristiane Bastos Einhonfen', '98225845132', 2147483647, 'SSP/RS', 'F', '1988-04-22', 'Avenida Getúlio Vargas, 1600/802', 'Menino Deus', 90850, 'Porto Alegre', 'RS', 'Brasileira', 'Porto Alegre', 'RS', 'UBS Menino Deus', 'Maria das Graças Bastos', 'Henrique dos Santos Einhonfen', 'Vendedora', 'Solteira', 'Ensino Médio Incompleto', 'O-', 'crisein@gmail.com', '', '5192179865', '5130286555', '5130584849'),
(110, 'Paula Hering Batista', '89981981959', 1891686176, 'SSP/RS', 'F', '1984-01-22', 'Rua Lima e Silva, 640/1200', 'Cidade Baixa', 90856, 'Porto Alegre', 'RS', 'Brasileira', 'Porto Alegre', 'RS', 'UBS Cidade Baixa', 'Luana Batista dos Santos', 'Paulo Hering Batista', 'Publicitária', 'Solteira', 'Superior Completo', 'A-', 'paulah@hotmail.com', 'paula.hering@oisf.com.br', '5192001111', '5130251544', '5190458877'),
(111, 'Zenilde Soneca de Assis', '87484844324', 2147483647, 'SSP/RS', 'F', '1954-08-12', 'Rua João Pessoa, 1643/201', 'Cidade Baixa', 90874, 'Porto Alegre', 'RS', 'Brasileira', 'Porto Alegre', 'RS', 'UBS Cidade Baixa', 'Suzana Soneca de Assis', 'João Pedro de Assis Pereira', 'Enfermeira', 'Casada', 'Superior Completo', 'A+', 'zenildeassis@hotmail.com', 'zenilde.assis@hpv.com', '5190555000', '5130284577', '5180545888'),
(112, 'Nilmar Júnior de Assis Schiafino', '59197179179', 2147483647, 'SSP/RS', 'M', '2000-05-12', 'Rua do Busão, 580', 'Morada dos Ventos', 74099, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Morada dos Ventos', 'Nilmar Pereira de Assis', 'Joana Pereira Schiafino', 'Estudante', 'Solteiro', 'Ensino Médio Incompleto', 'A-', 'nilmaravilha@hotmail.com', '', '5192147555', '5130259887', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_atendimento`
--

CREATE TABLE IF NOT EXISTS `tipo_atendimento` (
  `id_tipo_atendimento` int(3) NOT NULL AUTO_INCREMENT,
  `nome_tipo_atendimento` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `data_insercao` date NOT NULL,
  `data_desativacao` date DEFAULT NULL,
  `data_alteracao` date DEFAULT NULL,
  PRIMARY KEY (`id_tipo_atendimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tipo_atendimento`
--

INSERT INTO `tipo_atendimento` (`id_tipo_atendimento`, `nome_tipo_atendimento`, `descricao`, `data_insercao`, `data_desativacao`, `data_alteracao`) VALUES
(6, 'Check-up Geral', 'Procedimento para verificar condições de saúde gerais do paciente.', '2015-05-15', NULL, '2015-05-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
