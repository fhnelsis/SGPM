-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Set-2015 às 21:15
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
  `id_tipo_atendimento` int(12) NOT NULL,
  `id_paciente` int(12) NOT NULL,
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
  PRIMARY KEY (`id_atendimento`),
  KEY `id_atendimento` (`id_atendimento`),
  KEY `FK_tipo_atendimento` (`id_tipo_atendimento`),
  KEY `FK_funcionario_atendimento` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id_escolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `escolaridade` varchar(50) DEFAULT '0',
  KEY `id_escolaridade` (`id_escolaridade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id_escolaridade`, `escolaridade`) VALUES
(45, 'Analfabeto'),
(46, 'Até 4ª série incompleta do 1º grau'),
(47, '4ª série completa do 1º grau'),
(48, '5ª a 8ª série incompleta do 1º grau '),
(49, '1º grau completo'),
(50, '2º grau incompleto'),
(51, '2º grau completo'),
(52, 'Superior Incompleto'),
(53, 'Superior Completo'),
(54, 'Pós-Graduação/Especialização'),
(55, 'Mestrado'),
(56, 'Doutorado'),
(57, 'Pós-Doutorado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(15) NOT NULL AUTO_INCREMENT,
  `sigla_estado` varchar(50) NOT NULL DEFAULT '0',
  `estado` varchar(50) DEFAULT NULL,
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `sigla_estado`, `estado`) VALUES
(2, 'AC', 'Acre'),
(3, 'AL', 'Alagoas'),
(4, 'AP', 'Amapá'),
(5, 'AM', 'Amazonas'),
(6, 'BA', 'Bahia'),
(7, 'CE', 'Ceará'),
(8, 'DF', 'Distrito Federal'),
(9, 'ES', 'Espírito Santo'),
(10, 'GO', 'Goiás'),
(11, 'MA', 'Maranhão'),
(12, 'MT', 'Mato Grosso'),
(13, 'MS', 'Mato Grosso do Sul'),
(14, 'MG', 'Minas Gerais'),
(15, 'PA', 'Pará'),
(16, 'PB', 'Paraíba'),
(17, 'PR', 'Paraná'),
(18, 'PE', 'Pernambuco'),
(19, 'PI', 'Piauí'),
(20, 'RJ', 'Rio de Janeiro'),
(21, 'RN', 'Rio Grande do Norte'),
(22, 'RS', 'Rio Grande do Sul'),
(23, 'RO', 'Rondônia'),
(24, 'RR', 'Roraima'),
(25, 'SC', 'Santa Catarina'),
(26, 'SP', 'São Paulo'),
(27, 'SE', 'Sergipe'),
(28, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_civil`
--

CREATE TABLE IF NOT EXISTS `estado_civil` (
  `id_estado_civil` int(15) NOT NULL AUTO_INCREMENT,
  `estado_civil` varchar(50) NOT NULL,
  KEY `id_estado_civil` (`id_estado_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado_civil`, `estado_civil`) VALUES
(1, 'Solteiro(a)'),
(2, 'Casado(a)'),
(3, 'Divorciado(a)'),
(4, 'Viúvo(a)'),
(5, 'Separado(a)'),
(6, 'Companheiro(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionalidades`
--

CREATE TABLE IF NOT EXISTS `funcionalidades` (
  `id_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_funcionalidade` varchar(50) NOT NULL,
  `nome_funcionalidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_funcionalidade`),
  UNIQUE KEY `UQ_funcionalidades_id_funcionalidade` (`id_funcionalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `funcionalidades`
--

INSERT INTO `funcionalidades` (`id_funcionalidade`, `sigla_funcionalidade`, `nome_funcionalidade`) VALUES
(1, 'ATENDIMENTO_LISTAR', 'Buscar Atendimento'),
(2, 'ATENDIMENTO_INSERIR', 'Inserir Atendimento'),
(3, 'ATENDIMENTO_ALTERAR', 'Alterar Atendimento'),
(4, 'ATENDIMENTO_EXCLUIR', 'Excluir Atendimento'),
(5, 'TIPO_ATENDIMENTO_LISTAR', 'Buscar Tipo de Atendimenti'),
(6, 'TIPO_ATENDIMENTO_INSERIR', 'Inserir Tipo de Atendimento'),
(7, 'TIPO_ATENDIMENTO_ALTERAR', 'Alterar Tipo de Atendimento'),
(8, 'TIPO_ATENDIMENTO_EXCLUIR', 'Excluir Tipo de Atendimento'),
(9, 'PACIENTE_LISTAR', 'Buscar Paciente'),
(10, 'PACIENTE_INSERIR', 'Inserir Paciente'),
(11, 'PACIENTE_ALTERAR', 'Alterar Paciente'),
(12, 'PACIENTE_EXCLUIR', 'Excluir Paciente'),
(13, 'FUNCIONARIO_LISTAR', 'Listar Funcionário'),
(14, 'FUNCIONARIO_INSERIR', 'Inserir Funcionário'),
(15, 'FUNCIONARIO_ALTERAR', 'Alterar Funcionário'),
(16, 'FUNCIONARIO_EXCLUIR', 'Excluir Funcionário'),
(17, 'RELATORIO', 'Relatórios'),
(18, 'ATENDIMENTO_DETALHES', 'Atendimento Detalhes'),
(19, 'PACIENTE_DETALHES', 'Paciente Detalhes'),
(20, 'UBS_LISTAR', 'Buscar UBS'),
(21, 'UBS_INSERIR', 'Inserir UBS'),
(22, 'UBS_ALTERAR', 'Alterar UBS'),
(23, 'UBS_EXCLUIR', 'Excluir UBS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  `cpf` int(14) NOT NULL,
  `rg` int(13) NOT NULL,
  `org_exp` varchar(10) NOT NULL,
  `data_nasc` date NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `nome_mae` varchar(30) NOT NULL,
  `nome_pai` varchar(30) NOT NULL,
  `email_pessoal` varchar(50) NOT NULL,
  `email_prof` varchar(30) NOT NULL,
  `tel_cel` int(15) NOT NULL,
  `tel_fixo` int(15) NOT NULL,
  `id_tipo_funcionario` int(15) NOT NULL,
  `id_genero` int(15) NOT NULL,
  `id_ubs` int(11) NOT NULL,
  `id_estado_civil` int(15) NOT NULL,
  `id_escolaridade` int(15) NOT NULL,
  `id_tipo_sanguineo` int(15) NOT NULL,
  `id_estado` int(15) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `login` (`login`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `FK_funcionario_tipo_funcionario` (`id_tipo_funcionario`),
  KEY `FK_funcionario_genero` (`id_genero`),
  KEY `FK_funcionario_ubs` (`id_ubs`),
  KEY `FK_funcionario_estado_civil` (`id_estado_civil`),
  KEY `FK_funcionario_escolaridade` (`id_escolaridade`),
  KEY `FK_funcionario_tipo_sanguineo` (`id_tipo_sanguineo`),
  KEY `FK_funcionario_estado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `login`, `senha`, `nome_funcionario`, `cpf`, `rg`, `org_exp`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `nome_mae`, `nome_pai`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `id_tipo_funcionario`, `id_genero`, `id_ubs`, `id_estado_civil`, `id_escolaridade`, `id_tipo_sanguineo`, `id_estado`) VALUES
(24, 'admin', 'admin', 'Francisco Nelsis', 2147483647, 2147483647, 'SSP/RS', '1987-02-04', 'Rua Silveiro, 412', 'Menino Deus', '90160030', 'Porto Alegre', 'Helenice Paiva', 'James Nelsis', 'fhnelsis@outlook.com', 'francisco.nelsis@ilegra.com', 2147483647, 2147483647, 1, 1, 1, 2, 52, 1, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(15) NOT NULL AUTO_INCREMENT,
  `nome_genero` varchar(10) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_genero`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `tipo_atendimento`
--

INSERT INTO `tipo_atendimento` (`id_tipo_atendimento`, `nome_tipo_atendimento`, `descricao`, `data_insercao`, `data_desativacao`, `data_alteracao`) VALUES
(8, 'Clínico', 'Atendimento Clínico Geral.', '2015-09-07', NULL, '2015-09-07'),
(9, 'Gestante', 'Atendimento pré-natal a gestante.', '2015-09-07', NULL, NULL),
(10, 'Recèm-nascido', 'Atendimento a recém-nascidos.', '2015-09-07', NULL, NULL),
(11, 'Idoso', 'Atendimento a idoso.', '2015-09-07', NULL, NULL),
(12, 'Visita domiciliar', 'Atendimento feito em residência.', '2015-09-07', NULL, NULL),
(13, 'Criança', 'Atendimento a criança.', '2015-09-07', NULL, NULL),
(14, 'Teste', 'Teste', '2015-09-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_funcionario`
--

CREATE TABLE IF NOT EXISTS `tipo_funcionario` (
  `id_tipo_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_funcionario`),
  UNIQUE KEY `UQ_tipo_funcionario_id_tipo_funcionario` (`id_tipo_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tipo_funcionario`
--

INSERT INTO `tipo_funcionario` (`id_tipo_funcionario`, `nome_tipo`) VALUES
(1, 'Administrador'),
(3, 'Gestor de Unidade'),
(5, 'Enfermeiro'),
(6, 'Médico'),
(7, 'Técnico de Enfermagem'),
(8, 'Agente de Saúde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_funcionario_funcionalidade`
--

CREATE TABLE IF NOT EXISTS `tipo_funcionario_funcionalidade` (
  `id_tipo_funcionario` int(11) NOT NULL,
  `id_funcionalidade` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_funcionario`,`id_funcionalidade`),
  KEY `IXFK_tipo_funcionario_funcionalidade_tipo_funcionario` (`id_tipo_funcionario`),
  KEY `IXFK_tipo_funcionario_funcionalidade_funcionalidades` (`id_funcionalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_funcionario_funcionalidade`
--

INSERT INTO `tipo_funcionario_funcionalidade` (`id_tipo_funcionario`, `id_funcionalidade`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(3, 1),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(5, 1),
(5, 5),
(5, 9),
(5, 13),
(5, 18),
(6, 13),
(7, 2),
(7, 5),
(7, 9),
(7, 13),
(8, 2),
(8, 5),
(8, 9),
(8, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sanguineo`
--

CREATE TABLE IF NOT EXISTS `tipo_sanguineo` (
  `id_tipo_sanguineo` int(15) NOT NULL AUTO_INCREMENT,
  `tipo_sanguineo` varchar(50) DEFAULT NULL,
  KEY `id_tipo_sanguineo` (`id_tipo_sanguineo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tipo_sanguineo`
--

INSERT INTO `tipo_sanguineo` (`id_tipo_sanguineo`, `tipo_sanguineo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ubs`
--

CREATE TABLE IF NOT EXISTS `ubs` (
  `id_ubs` int(5) NOT NULL AUTO_INCREMENT,
  `ubs_atendimento` varchar(50) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `telefone` int(10) DEFAULT NULL,
  `data_insercao` date DEFAULT NULL,
  `data_alteracao` date DEFAULT NULL,
  `data_desativacao` date DEFAULT NULL,
  PRIMARY KEY (`id_ubs`),
  UNIQUE KEY `id_ubs` (`id_ubs`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `ubs`
--

INSERT INTO `ubs` (`id_ubs`, `ubs_atendimento`, `endereco`, `telefone`, `data_insercao`, `data_alteracao`, `data_desativacao`) VALUES
(1, 'UBS Menino Deus', 'Av. Getúlio Vargas, 250', 1111, '2015-09-22', '2015-09-28', NULL),
(4, 'UBS Azenha', 'Avenida Azenha, 50', 111, '2015-09-28', '2015-09-28', NULL),
(8, 'UBS Cavalhada', 'Avenida Cavalhada, 2045', 2147483647, '2015-09-28', NULL, NULL),
(17, 'UBS Centro', 'Rua dos Andradas, 500', 1111111111, '2015-09-28', '2015-09-28', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `FK_funcionario_atendimento` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tipo_atendimento` FOREIGN KEY (`id_tipo_atendimento`) REFERENCES `tipo_atendimento` (`id_tipo_atendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_funcionario_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_escolaridade` FOREIGN KEY (`id_escolaridade`) REFERENCES `escolaridade` (`id_escolaridade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_estado_civil` FOREIGN KEY (`id_estado_civil`) REFERENCES `estado_civil` (`id_estado_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_tipo_funcionario` FOREIGN KEY (`id_tipo_funcionario`) REFERENCES `tipo_funcionario` (`id_tipo_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_tipo_sanguineo` FOREIGN KEY (`id_tipo_sanguineo`) REFERENCES `tipo_sanguineo` (`id_tipo_sanguineo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_funcionario_ubs` FOREIGN KEY (`id_ubs`) REFERENCES `ubs` (`id_ubs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipo_funcionario_funcionalidade`
--
ALTER TABLE `tipo_funcionario_funcionalidade`
  ADD CONSTRAINT `FK_tipo_funcionario_funcionalidade_funcionalidades` FOREIGN KEY (`id_funcionalidade`) REFERENCES `funcionalidades` (`id_funcionalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tipo_funcionario_funcionalidade_tipo_funcionario` FOREIGN KEY (`id_tipo_funcionario`) REFERENCES `tipo_funcionario` (`id_tipo_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
