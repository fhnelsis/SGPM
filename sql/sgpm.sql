-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2015 às 22:27
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

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id_atendimento`, `id_tipo_atendimento`, `id_paciente`, `id_funcionario`, `data_atendimento`, `fumante`, `alcool`, `alergia_reac_div`, `sintomas`, `queixa_principal`, `hist_molestia`, `frequencia_cardiaca`, `ritmo_cardiaco`, `pressao_arterial`, `ritmo_respiratorio`, `observacoes`) VALUES
(1, 8, 42, 5, '2015-09-08', '0', '0', 'AAS', 'Nenhum', 'Nenhuma', 'Asma', '15/8', '18/3', '18/6', '20', 'Exame de rotina, clínico.                                                                    '),
(2, 12, 112, 10, '2015-09-08', '0', '0', 'AAS', 'Pés cianóticos.', 'Dores no peito.', 'Nenhum.', '18/5', '12/3', '17/5', '20', 'Verificado que blá blá blá blá blá blá .                                                                    '),
(3, 9, 111, 10, '2015-09-08', '0', '0', 'Picada de abelha', 'Nenhum', 'Dores nas costas.', 'Nenhum', '15/5', '17/6', '13/2', '20', 'Visita de rotina, pré natal. Receitado analgésico.                                                                    '),
(4, 8, 112, 5, '2015-09-08', '0', '1', 'AAS', 'Nenhum', 'Nenhum', 'Nenhum', '18/5', '41/3', '26/2', '20', 'Exame de rotina, clínico.                                                                    '),
(5, 9, 110, 5, '2015-09-08', '0', '0', 'Torsilax', 'Nenhum', 'Nenhuma', 'Nenhum', '15/5', '50/3', '20/4', '20', 'Pré-natal de rotina.                                                                    ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(19, 'PACIENTE_DETALHES', 'Paciente Detalhes');

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
  `id_tipo_funcionario` int(15) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `login` (`login`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `FK_funcionario_tipo_funcionario` (`id_tipo_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `login`, `senha`, `nome_funcionario`, `cpf`, `rg`, `org_exp`, `genero`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `pais_nacionalidade`, `cidade_natural`, `estado_natural`, `ubs_atendimento`, `nome_mae`, `nome_pai`, `estado_civil`, `escolaridade`, `tipo_sanguineo`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `id_tipo_funcionario`) VALUES
(2, 'admin', 'admin', 'Francisco Henrique de Paiva Nelsis', 2147483647, 2147483647, 'SSP/RS', 'M', '0000-00-00', 'Rua Silveiro, 597/401', 'Menino Deus', '90850-000', 'Porto Alegre', 'RS', 'Brasil', 'Porto Alegre', 'RS', 'UBS Menino Deus', 'Maria Cristina Paiva', 'Pedro Augosto Nelsis', 'Casado', 'Superior Completo', 'A+', 'fhnelsis@outlook.com', 'francisco.nelsis@ilegra.com', 2147483647, 2147483647, 1),
(5, 'elisa.solano', 'eliosa', 'Elisa Pereira Solano', 2147483647, 2147483647, 'SSP/RS', 'F', '1984-06-13', 'Travessa do Camarim, 480/201', 'Menino Deus', '90804-000', 'Porto Alegre', 'RS', 'Brasileira', 'Porto Aegre', 'RS', 'UBS Menino Deus', 'Luciana de Assis Pereira', 'Luiz de Almeida Solano', 'Casada', 'Superior Completo', 'A+', 'solanoelisa@hotmail.com', 'elisa.solano@ubs.com.br', 2147483647, 2147483647, 5),
(10, 'agente', 'agente', 'Luiz Carlos de Paiva Filho', 2147483647, 2147483647, 'SSP/RS', 'M', '1956-05-13', 'Travessa Almodovar, 50', 'Azenha', '90484-030', 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Azenha', 'Norma Cristina Paiva', 'Gilberto Paiva', 'Divorciado', 'Ensino Médio Incompleto', 'A+', 'luiz@gmail.com', 'luiz.paiva@ubsazenha.com', 2147483647, 2147483647, 8),
(12, 'tecnico', 'tecnico', 'João Augusto Pereira', 2147483647, 2147483647, 'SSP/RS', 'Feminino', '1983-02-13', 'Rua dos Imigrantes, 59', 'Azenha', '90484-030', 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Azenha', 'Norma Cristina Paiva', 'Gilberto Paiva', 'Divorciado', 'Ensino Médio Incompleto', 'A+', 'luiz@gmail.com', 'luiz.paiva@ubsazenha.com', 2147483647, 2147483647, 7),
(13, 'teste', 'teste', 'Teste', 2147483647, 1231231231, 'SSP/RS', 'M', '1999-10-28', 'Rua dos Imigrantes, 59', 'Azenha', '90484-030', 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Azenha', 'Norma Cristina Paiva', 'Gilberto Paiva', 'Divorciado', '', '', '', '', 2147483647, 516541995, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(3) NOT NULL AUTO_INCREMENT,
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

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf`, `rg`, `org_exp`, `genero`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `pais_nacionalidade`, `cidade_natural`, `estado_natural`, `ubs_atendimento`, `nome_mae`, `nome_pai`, `profissao`, `estado_civil`, `escolaridade`, `tipo_sanguineo`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `tel_contato`) VALUES
(32, 'Francisco Henrique Paiva Nelsis', '8330763000', 2147483647, 'SSP/RS', 'M', '1987-02-04', 'Rua Silveiro, 377', 'Menino Deus', 90850, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Menino Deus', 'Helenice Zani de Paiva', 'James Sidney Schiafino Nelsis', 'Analista de Sistemas', 'Solteiro', 'Superior Incompleto', 'A+', 'fhnelsis@outlook.com', 'fransico.nelsis@ilegra.com', '5191010061', '5130192991', '5130897744'),
(41, 'Fábio Tentardini Leite', '9631954877', 99548487, 'SSP/RS', 'M', '1986-03-12', 'Rua Espírito Santo, 483/412', 'Centro Histórico', 90900, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Centro Histórico', 'Vera Tentardini Leite', 'João Tentardini Leite', 'Personal Trainer', 'Solteiro', 'Superior Completo', 'AB+', 'fabio.leite@gmail.com', 'fleite@academia.com.br', '5192745444', '5130186211', ''),
(42, 'Adão de Oliveira Barcellos', '93654179966', 1998788481, 'SSP/RS', 'M', '1953-06-09', 'Rua Duque de Caxias, 321/203', 'Centro Histórico', 90960, 'Porto Alegre', 'RS', 'Brasileiro', 'Porto Alegre', 'RS', 'UBS Centro Histórico', 'Magali Santos Oliveira', 'Cláudio Barcellos', 'Administrador', 'Casado', 'Ensino Médio Completo', 'B+', 'abarcellos@outlook.com', 'adaobarcellos@empresa.com.br', '5197322544', '5130254877', '5130998877'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `tipo_atendimento`
--

INSERT INTO `tipo_atendimento` (`id_tipo_atendimento`, `nome_tipo_atendimento`, `descricao`, `data_insercao`, `data_desativacao`, `data_alteracao`) VALUES
(8, 'Clínico', 'Atendimento Clínico Geral.', '2015-09-07', NULL, '2015-09-07'),
(9, 'Gestante', 'Atendimento pré-natal a gestante.', '2015-09-07', NULL, NULL),
(10, 'Recèm-nascido', 'Atendimento a recém-nascidos.', '2015-09-07', NULL, NULL),
(11, 'Idoso', 'Atendimento a idoso.', '2015-09-07', NULL, NULL),
(12, 'Visita domiciliar', 'Atendimento feito em residência.', '2015-09-07', NULL, NULL),
(13, 'Criança', 'Atendimento a criança.', '2015-09-07', NULL, NULL);

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
(2, 'Secretaria de Saúde'),
(3, 'Gestor de Unidade'),
(4, 'Enfermeiro-Chefe'),
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
(7, 2),
(7, 5),
(7, 9),
(8, 2),
(8, 5),
(8, 9);

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
  ADD CONSTRAINT `FK_funcionario_tipo_funcionario` FOREIGN KEY (`id_tipo_funcionario`) REFERENCES `tipo_funcionario` (`id_tipo_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipo_funcionario_funcionalidade`
--
ALTER TABLE `tipo_funcionario_funcionalidade`
  ADD CONSTRAINT `FK_tipo_funcionario_funcionalidade_funcionalidades` FOREIGN KEY (`id_funcionalidade`) REFERENCES `funcionalidades` (`id_funcionalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tipo_funcionario_funcionalidade_tipo_funcionario` FOREIGN KEY (`id_tipo_funcionario`) REFERENCES `tipo_funcionario` (`id_tipo_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
