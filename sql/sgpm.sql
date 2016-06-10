-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.0.67-community-nt - MySQL Community Edition (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para sgpm
CREATE DATABASE IF NOT EXISTS `sgpm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sgpm`;

-- Copiando dados para a tabela sgpm.agenda: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id_agenda`, `data_hora_inicio`, `data_hora_fim`, `id_ubs`, `id_tipo_atendimento`, `id_funcionario`, `nome_paciente`, `cpf_paciente`) VALUES
	(1, '2016-06-07 10:20:30', '2016-06-07 11:20:30', 1, 8, 57, 'Eduardo Praxedes', '01683601017'),
	(2, '2016-06-07 11:20:30', '2016-06-07 12:20:30', 1, 11, 57, 'Teste', '87979878978'),
	(4, '2016-06-08 15:50:00', '2016-06-08 16:50:00', 1, 9, 34, 'efwefwefwef', '016.836.010-17'),
	(7, '2016-06-09 15:30:00', '2016-06-09 18:00:00', 1, 11, 34, 'qefwefwe', '987.897.897-89'),
	(8, '2016-06-10 15:30:00', '2016-06-10 16:30:00', 1, 10, 34, 'wewefwefwef', '545.456.456-45'),
	(9, '2016-06-08 15:20:00', '2016-06-08 16:20:00', 1, 9, 34, 'wefwwef', '564.545.456-45'),
	(10, '2016-06-15 15:30:00', '2016-06-15 16:30:00', 1, 11, 34, 'eee', '545.456.465-45');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.atendimento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` (`id_atendimento`, `id_tipo_atendimento`, `id_paciente`, `id_funcionario`, `data_atendimento`, `fumante`, `alcool`, `alergia_reac_div`, `sintomas`, `queixa_principal`, `hist_molestia`, `frequencia_cardiaca`, `ritmo_cardiaco`, `pressao_arterial`, `ritmo_respiratorio`, `observacoes`) VALUES
	(1, 8, 115, 38, '2015-09-30', '1', '0', '123123', '12312312', '3123123', '12312312', '1321322', '123', '12312', '312312', '112323                                                               '),
	(2, 9, 121, 39, '2016-06-08', '1', '1', 'wef', 'wef', 'wef', 'wef', '12', '21', '22', '65', 'wef                                                                    ');
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.escolaridade: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `escolaridade` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `escolaridade` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.estado: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.estado_civil: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` (`id_estado_civil`, `estado_civil`) VALUES
	(1, 'Solteiro(a)'),
	(2, 'Casado(a)'),
	(3, 'Divorciado(a)'),
	(4, 'Viúvo(a)'),
	(5, 'Separado(a)'),
	(6, 'Companheiro(a)');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.funcionalidades: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionalidades` DISABLE KEYS */;
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
	(17, 'RELATORIOS_ADMINISTRATIVOS', 'Relatórios Administrativos'),
	(18, 'ATENDIMENTO_DETALHES', 'Atendimento Detalhes'),
	(19, 'PACIENTE_DETALHES', 'Paciente Detalhes'),
	(20, 'UBS_LISTAR', 'Buscar UBS'),
	(21, 'UBS_INSERIR', 'Inserir UBS'),
	(22, 'UBS_ALTERAR', 'Alterar UBS'),
	(23, 'UBS_EXCLUIR', 'Excluir UBS'),
	(24, 'TIPO_ATENDIMENTO_DETALHES', 'Tipo de Atendimento Detalhes'),
	(25, 'FUNCIONARIO_DETALHES', 'Funcionário Detalhes'),
	(26, 'RELATORIOS_MEDICOS', 'Relatórios Médicos');
/*!40000 ALTER TABLE `funcionalidades` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.funcionario: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_funcionario`, `login`, `senha`, `nome_funcionario`, `cpf`, `rg`, `org_exp`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `nome_mae`, `nome_pai`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `id_tipo_funcionario`, `id_genero`, `id_ubs`, `id_estado_civil`, `id_escolaridade`, `id_tipo_sanguineo`, `id_estado`) VALUES
	(34, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Francisco Henrique de Paiva Nelsis', '833.307.630-00', '6078831697', 'SSP/RS', '1987-02-04', 'Rua Silveiro, 412', 'Menino Deus', '90160-030', 'Porto Alegre', 'Helenice Paiva', 'James Nelsis', 'fhnelsis@outlook.com', 'francisco.nelsis@ilegra.com', '(51) 9101-0061', '(51) 3084-1409', 1, 1, 1, 2, 52, 1, 22),
	(38, 'diego_oliveira', '5715265375410baa2a63a814f451a75b', 'Diego Santos Oliveira', '598.748.498-19', '9581951957', 'SSP/RS', '1981-08-25', 'Avenida Cavalhada, 2045', 'Cavalhada', '90160-030', 'Porto Alegre', 'Joana Maria de Assis Pereira', 'Carlos dos Santos', 'ana.almeida@outlook.com', 'luiz.paiva@ubsazenha.com', '(51) 6301-9819', '(51) 6518-9195', 5, 1, 8, 2, 53, 6, 22),
	(39, 'joana_pereira', '6226a8a1578072c3008313a3cd781942', 'Joana Martins Pereira', '934.165.487-47', '2195249846', 'SSP/RS', '1973-06-21', 'Rua Lininho, 205', 'Centro', '96014-848', 'Porto Alegre', 'Maria Augusta', 'Calor Guimarães', 'medico@ubs.com', 'medico@ubs.com', '(51) 9101-0000', '(51) 3015-4877', 6, 1, 17, 3, 54, 6, 22),
	(40, 'rodrigo_benedito', 'd24cc9ac627c61c0a35aa9e2e43e5b34', 'Rodrigo Costa Benedito', '995.195.195-49', '8198136816', 'SSP/RS', '2006-03-23', 'Avenida Getúlio Vargas, 205', 'Menino Deus', '90498-198', 'Porto Alegre', 'Maria Augusta', 'Calor Guimarães', 'medico@ubs.com', 'medico@ubs.com', '(51) 9519-5195', '(51) 3201-5187', 6, 1, 1, 1, 47, 4, 22),
	(41, 'medico_cavalhada', 'fe434af67c391e1ab5876713f7dbc6cb', 'Vinícius Bonfim Papali', '951.951.951-95', '1951951951', 'SSP/RS', '2001-06-22', 'Avenida Cavalhada, 1504', 'Cavalhada', '90198-168', 'Porto Alegre', 'Maria Augusta', 'Calor Guimarães', 'medico@ubs.com', 'medico@ubs.com', '(51) 9115-1515', '(51) 3015-4549', 6, 1, 8, 2, 55, 3, 22),
	(42, 'robson_rosas', '376fff3471a0317f8a0db9eb5b6c97b9', 'Robson dos Anjos Rosas', '936.548.769-65', '1819546548', 'SSP/RS', '1981-06-13', 'Rua Lima e Silva, 104/50', 'Centro', '90481-985', 'Porto Alegre', 'Maria Augusta', 'Caio Guimarães', 'enfermeiro@centro.com', 'roro@gmail.com', '(51) 9104-5165', '(51) 3015-4844', 5, 1, 17, 2, 54, 6, 22),
	(43, 'juliano_mariano', 'e08ef726789b2b3883cd40fb99d3dd0d', 'Juliano Teixeira Mariano', '961.889.165-15', '1896884681', 'SSP/RS', '1980-06-20', 'Rua Acosta, 200/602', 'Menino Deus', '91321-985', 'Porto Alegre', 'Joana Machado de Assis', 'João de Assis Teixeira', 'juliano.teixeira@ubs.com', 'ju@gmail.com', '(51) 9101-0096', '(51) 3015-4984', 5, 1, 1, 1, 54, 5, 22),
	(44, 'cristiane_pereira', '180725c78e6e14f10e6480ed9b2993be', 'Cristiane de Assis Pereira', '891.951.954-84', '9818649813', 'SSP/RS', '1990-12-14', 'Rua Barão do Triunfo, 200', 'Menino Deus', '90162-816', 'Porto Alegre', 'Cristiane de Assis', 'Carlos Pereira', 'cris@gmail.com', 'cristiane@ubs.com', '(51) 9454-6816', '(51) 3018-6168', 8, 2, 1, 2, 52, 4, 22),
	(57, 'ana_guimaraes', '24f8ac6f15b74b33578e37bb29a098e6', 'Ana Cláudia Guimarães', '923.198.169-51', '1984981351', 'SSP/RS', '1985-12-15', 'Travessa Dona Cristina, 200/20', 'Menino Deus', '90164-654', 'Porto Alegre', 'Júlia Augusta Guimarães', 'Carlos Alberto Guimarães', 'anaclaudia@gmail.com', 'ana.claudia@ubs.com.br', '(51) 9104-8755', '(51) 3015-4877', 3, 1, 1, 2, 55, 7, 22),
	(58, 'joao_pirote', '262368f7c12b6a51571a71427355f9e8', 'João Alberto Pirote', '498.441.181-86', '6814835158', 'SSP/RS', '2003-11-18', 'Avenida Cavalhada, 2500', 'Cavalhada', '91961-651', 'Porto Alegre', 'Amanda de Jesus Pirote', 'Carlos Pirote', 'carlos@gmail.com', 'carlospirote@ubs.com.br', '(51) 9101-2198', '(51) 3015-4984', 3, 1, 8, 1, 53, 7, 22),
	(59, 'paulo_oliveira', '6fb988d8c6fe959469a96177cc1eebfc', 'Paulo Fernandes Oliveira', '497.667.884-99', '8781951921', 'Polícia Federa', '1982-07-28', 'Rua Deputado Elizeu Teixeira, ', 'Centro', '57035-240', 'Porto Alegre', 'Carla Correia Melo', 'Fernando Rodrigues Pereira', 'paulo.fernandes@gmail.com', 'PauloFernandesOliveira@rhyta.c', '(51) 9448-4811', '(51) 3018-8196', 3, 1, 17, 2, 53, 3, 22),
	(60, 'luiza_ferreira', '5c80be9e4cf909e996b2434722df2e7d', 'Luiza Melo Ferreira', '963.187.845-55', '1818984168', 'Cartório Civil', '1975-01-08', 'Rua Lino da Silva, 408/12', 'Cavalhada', '90849-810', 'Porto Alegre', 'Maria Ferreira', 'João Ferreira', 'luiza.ferreira@gmail.com', 'lferreira@ubs.com', '(51) 9101-8165', '(51) 3015-4985', 6, 2, 8, 1, 53, 3, 22),
	(61, 'tiago_carvalho', '23f26513c67dde864077a6cc92a0d092', 'Tiago Ribeiro Carvalho', '949.819.518-18', '1898135198', 'SSP/RS', '1983-12-26', 'Avenida Cavalhada, 400/201', 'Cavalhada', '48198-165', 'Porto Alegre', 'Fernanda Cavalho de Assis', 'Carlos de Assis Carvalho', 'tiago_carvalho@outlook.com', 'tcarvalho@ubs.com.br', '(51) 9160-8406', '(51) 3205-1681', 8, 1, 8, 4, 52, 5, 22),
	(62, 'fernando_borges', '388c7f32cd591a9b0056a7af6e6024ed', 'Fernando Batista Borges', '981.985.651-35', '1651638135', 'SSP/RS', '1985-09-15', 'Rua dos Andradas, 200/1001', 'Centro', '89965-810', 'Porto Alegre', 'Fátima Terezinha Lemes', 'Jailton Alves Dos Santos', 'fernando.borges@gmail.com', 'fborges@ubs.com.br', '(51) 8185-1351', '(51) 3215-8168', 8, 1, 17, 2, 52, 7, 22),
	(63, 'jose_santos', '6736c24e90624c1c4f71c34c7e89b1d2', 'José Valmir Azevedo Dos Santos', '158.135.181-86', '1516384684', 'SSP/RS', '1983-10-20', 'Avenida Tronco, 800/402', 'Cavalhada', '90468-435', 'Porto Alegre', 'Valnira dos Santos', 'Cláudio Altair dos Santos', 'jose_santos@gmail.com', 'jsantos@ubs.com.br', '(51) 7081-8063', '(51) 2015-0684', 7, 1, 8, 2, 52, 8, 22),
	(64, 'alex_arantes', 'c68aedaeb05c256363bd11c6df089418', 'Alex Carlos Arantes', '163.513.549-84', '1681353515', 'SSP/RS', '1989-11-20', 'Travessa Ananias, 200/801', 'Centro', '81681-068', 'Porto Alegre', 'Adenisa Arantes', 'João Carlos Arantes', 'alexarantes@outlook.com', 'aarantes@ubs.com.br', '(51) 8168-1313', '(51) 2020-3185', 7, 1, 17, 1, 53, 6, 22),
	(65, 'romulo_lima', '9844833cb07abfc5357c17eb6d9cdec5', 'Rômulo do Carmo Aparecido de Lima', '734.126.818-13', '1351681681', 'SSP/RS', '1984-11-19', 'Rua Barão do Triunfo, 204', 'Menino Deus', '81681-063', 'Porto Alegre', 'Aparecida Lima', 'Paulo Lima', 'romulo_lima@outlook.com', 'rlima@ubs.com.br', '(51) 8186-1638', '(51) 3003-4305', 7, 1, 1, 1, 52, 6, 22);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.genero: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`id_genero`, `nome_genero`) VALUES
	(1, 'Masculino'),
	(2, 'Feminino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.paciente: ~67 rows (aproximadamente)
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf`, `rg`, `org_exp`, `data_nasc`, `endereco`, `bairro`, `cep`, `cidade`, `nome_mae`, `nome_pai`, `profissao`, `email_pessoal`, `email_prof`, `tel_cel`, `tel_fixo`, `tel_contato`, `id_genero`, `id_estado`, `id_ubs`, `id_estado_civil`, `id_escolaridade`, `id_tipo_sanguineo`) VALUES
	(115, 'Adão de Souza Augusto', '833.014.587-44', '6078896578', 'SSP/RS', '1996-10-31', 'Rua dos Imigrantes, 59', 'Menino Deus', '90160030', 'Porto Alegre', 'Adão de Souza Augusto', 'Adão de Souza Augusto', 'Marceneiro', 'adao.augusto@gmail.com', 'aaugusto@marcenaria.com', '(51) 9141-1965', '(51) 3325-4878', '(51) 3089-4588', 1, 22, 1, 2, 51, 1),
	(121, 'Ana Beatriz Quincas de Almeida', '904.165.844-87', '9648236548', 'SSP/RS', '2000-03-28', 'Avenida Cavalhada, 2045', 'Cavalhada', '90458-965', 'Porto Alegre', 'Ana Beatriz Quincas de Almeida', 'Ana Beatriz Quincas de Almeida', 'Professor(a)', 'ana.almeida@outlook.com', 'almeidaana@terra.com.br', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 2, 22, 8, 2, 51, 4),
	(128, 'Thaísa de Oliveira Rocha Silva', '062.820.684-44', '3424324342', 'SSP/RS', '2003-11-04', 'Travessa do Guaíba, 200/140', 'Cavalhada', '90487-000', 'Porto Alegre', 'Thaísa de Oliveira Rocha Silva', 'Thaísa de Oliveira Rocha Silva', 'Contabilista', 'norma.almeida@gmail.com', 'nalmenda@escola.com', '(51) 9147-8962', '(51) 3835-4876', '(51) 2015-4868', 2, 22, 1, 1, 54, 2),
	(129, 'Itael José Camargo', '079.880.478-50', '0001989562', 'SSP/RS', '1974-10-11', 'Rua Alameda Goiás, 200/420', 'Cavalhada', '90786-515', 'Porto Alegre', 'Itael José Camargo', 'Itael José Camargo', 'Designer', 'itaelcamargo@gmail.com', 'icamargo@empresa.com', '(51) 9127-4155', '(51) 3014-9816', '(51) 3018-1981', 1, 22, 8, 2, 51, 7),
	(132, 'Gerson Monteiro De Araujo Filho', '643.023.698-68', '4653264', 'SSP/RS', '2002-12-03', 'Travessa Passarinho, 204/70', 'Cavalhada', '84711-581', 'Porto Alegre', 'Gerson Monteiro De Araujo Filho', 'Gerson Monteiro De Araujo Filho', 'Estudante', 'YasminCostaCorreia@teleworm.us', 'ThiagoGomesMartins@dayrep.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(133, 'Jefferson Vieira De Jesus', '113.003.927-70', '00002011046', 'SSP/RS', '1972-11-09', 'Avenida Lininho, 500', 'Cavalhada', '52115-220', 'Porto Alegre', 'Jefferson Vieira De Jesus', 'Jefferson Vieira De Jesus', 'Professor(a)', 'JuliaRodriguesAraujo@armyspy.com', 'MarcosPereiraOliveira@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(134, 'Carlos Antonio Scaldaferro', '887.972.797-49', '761063', 'SSP/RS', '1996-02-04', 'Rua Pao de Açúcar, 829', 'Cavalhada', '54440-220', 'Porto Alegre', 'Carlos Antonio Scaldaferro', 'Carlos Antonio Scaldaferro', 'Soldador(a)', 'MateusSouzaAlves@dayrep.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(135, 'Carlos Augusto Alves Da Rosa', '670.039.079-68', '40915427', 'SSP/RS', '1981-04-30', 'Rua Nossa Senhora de Guadalupe, 1175', 'Cavalhada', '99020-480', 'Porto Alegre', 'Carlos Augusto Alves Da Rosa', 'Carlos Augusto Alves Da Rosa', 'Estudante', 'KauanMeloAzevedo@teleworm.us', 'RyanCardosoMelo@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(136, 'Ednaldo Gomes De Souza', '745.232.013-15', '9602801155', 'SSP/RS', '1985-03-20', 'Travessa João Meira Júnior, 366', 'Cavalhada', '89224-361', 'Porto Alegre', 'Ednaldo Gomes De Souza', 'Ednaldo Gomes De Souza', 'Policial Militar', 'BeatriceAzevedoLima@jourrapide.com', 'LeilaAlmeidaPinto@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(137, 'Enivaldo Alves Da Costa', '485.965.071-91', '2712235', 'SSP/RS', '1975-03-28', 'Rua Conselheiro Hipólito Teixeira, 752', 'Cavalhada', '29175-010', 'Porto Alegre', 'Enivaldo Alves Da Costa', 'Enivaldo Alves Da Costa', 'Professor(a)', 'LauraSantosMelo@rhyta.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(138, 'Edson Alves De Arruda', '040.759.942-87', '59339', 'SSP/RS', '1987-05-24', 'Rua Santo Antônio, 1953', 'Cavalhada', '26163-540', 'Porto Alegre', 'Edson Alves De Arruda', 'Edson Alves De Arruda', 'Soldador(a)', 'AnnaCostaBarbosa@armyspy.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(139, 'Eduardo Carlos Ribeiro Baptista', '349.992.584-20', '12985928', 'SSP/RS', '2004-05-24', 'Rua das CamElías, 1788', 'Cavalhada', '95173-511', 'Porto Alegre', 'Eduardo Carlos Ribeiro Baptista', 'Eduardo Carlos Ribeiro Baptista', 'Estudante', 'MarcosPereiraOliveira@armyspy.com', 'AlexAraujoOliveira@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(140, 'Elia Conrado De Araujo', '146.552.502-59', '33956', 'SSP/RS', '1979-03-26', 'Alameda Três, 46', 'Cavalhada', '84318-894', 'Porto Alegre', 'Elia Conrado De Araujo', 'Elia Conrado De Araujo', 'Policial Militar', 'RyanCardosoMelo@teleworm.us', 'DanielCastroBarros@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(141, 'Elis Nonato De Oliveira', '203.280.872-20', '232407', 'SSP/RS', '1986-09-05', 'Rua Carlos B. Max, 430', 'Cavalhada', '18784-854', 'Porto Alegre', 'Elis Nonato De Oliveira', 'Elis Nonato De Oliveira', 'Programador(a)', 'ThiagoGomesMartins@dayrep.com', 'Daniel Goncalves Castro', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(142, 'Alexsandro Dos Santos', '054.678.499-21', '5028502-5', 'SSP/RS', '1988-11-03', 'Rua Visconde de Taunay, 508', 'Cavalhada', '87113-530', 'Porto Alegre', 'Alexsandro Dos Santos', 'Alexsandro Dos Santos', 'Engenheiro(a)', 'EstevanAzevedoCastro@rhyta.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(143, 'Ronaldo Tome Dos Santos', '409.373.641-34', '1674590', 'SSP/RS', '1977-04-27', 'Rua Coração de Jesus, 318', 'Cavalhada', '37903-032', 'Porto Alegre', 'Ronaldo Tome Dos Santos', 'Ronaldo Tome Dos Santos', 'Professor(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(144, 'Ronivon Correia Da Silva', '516.926.351-15', '2097746', 'SSP/RS', '1986-12-07', 'Rua QR 0017, 619', 'Cavalhada', '27515-000', 'Porto Alegre', 'Ronivon Correia Da Silva', 'Ronivon Correia Da Silva', 'Engenheiro(a)', 'AlexAraujoOliveira@teleworm.us', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(145, 'Rosildo Merotti', '205.074.298-34', '28779927', 'SSP/RS', '1995-11-04', 'Rodovia Anel Viário, 989', 'Cavalhada', '64079-590', 'Porto Alegre', 'Rosildo Merotti', 'Rosildo Merotti', 'Estudante', 'LeilaAlmeidaPinto@jourrapide.com', 'DanielGoncalvesCastro@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(146, 'Rutomblaine Da Cruz', '632.090.982-04', '569807', 'SSP/RS', '1974-09-12', 'Rua Iraci Carvalho dos Santos, 1933', 'Cavalhada', '78045-075', 'Porto Alegre', 'Rutomblaine Da Cruz', 'Rutomblaine Da Cruz', 'Programador(a)', 'DanielCastroBarros@rhyta.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(147, 'Cristian Robert Koetter', '821.283.089-68', '00002846329', 'SSP/RS', '1989-09-06', 'Rua Lauro Queiroz, 406', 'Cavalhada', '96830-150', 'Porto Alegre', 'Cristian Robert Koetter', 'Cristian Robert Koetter', 'Soldador(a)', 'DanielGoncalvesCastro@armyspy.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(148, 'Olavo Santos De Freitas', '376.437.030-00', '8036689969', 'SSP/RS', '1980-08-07', 'Rua Bogota, 1822', 'Cavalhada', '12209-820', 'Porto Alegre', 'Olavo Santos De Freitas', 'Olavo Santos De Freitas', 'Estudante', 'BeatriceAzevedoLima@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(149, 'Marcos Sebastiao Rosa', '615.501.401-91', '8998892', 'SSP/RS', '2000-10-21', 'Rua da Lembrança, 545', 'Cavalhada', '04363-050', 'Porto Alegre', 'Marcos Sebastiao Rosa', 'Marcos Sebastiao Rosa', 'Professor(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(150, 'Rederson Marcasso', '295.815.318-58', '426694296', 'SSP/RS', '1981-08-31', 'Rua Índio Amanari, 478', 'Cavalhada', '28060-060', 'Porto Alegre', 'Rederson Marcasso', 'Rederson Marcasso', 'Programador(a)', 'icamargo@empresa.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(151, 'Reginaldo Carvalho Da Silva', '411.013.401-34', '836748', 'SSP/RS', '1972-10-07', 'Rua Capitão Leonídio Soares, 1552', 'Cavalhada', '29705-730', 'Porto Alegre', 'Reginaldo Carvalho Da Silva', 'Reginaldo Carvalho Da Silva', 'Estudante', 'AnnaCostaBarbosa@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(152, 'Valdenir Pereira Terto', '565.115.741-72', '1211770', 'SSP/RS', '1985-09-09', 'Rua Osório, 1049', 'Cavalhada', '55295-130', 'Porto Alegre', 'Valdenir Pereira Terto', 'Valdenir Pereira Terto', 'Policial Militar', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(153, 'Antonio Souza De Oliveira', '826.826.238-91', '6228689', 'SSP/RS', '2003-04-20', 'Quadra QR 312 Conjunto H, 476', 'Cavalhada', '08140-143', 'Porto Alegre', 'Antonio Souza De Oliveira', 'Antonio Souza De Oliveira', 'Engenheiro(a)', 'JuliaRodriguesAraujo@armyspy.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(154, 'Valdir Soares', '850.991.807-44', '66743519', 'SSP/RS', '1978-11-10', 'Rua Carlos Gomes, 1518', 'Cavalhada', '53570-710', 'Porto Alegre', 'Valdir Soares', 'Valdir Soares', 'Estudante', 'AnnaCostaBarbosa@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(155, 'Valdivino Teotonio Bezerra (uruacu)', '689.859.401-04', '3576996', 'SSP/RS', '1988-02-09', 'Rua Leão XIII, 1111', 'Cavalhada', '07230-451', 'Porto Alegre', 'Valdivino Teotonio Bezerra (uruacu)', 'Valdivino Teotonio Bezerra (uruacu)', 'Professor(a)', 'JuliaRodriguesAraujo@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(156, 'Valentin Luiz Catoia', '973.668.038-04', '8776327', 'SSP/RS', '1997-02-05', 'Vila Liberalina, 921', 'Cavalhada', '14802-060', 'Porto Alegre', 'Valentin Luiz Catoia', 'Valentin Luiz Catoia', 'Soldador(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(157, 'Darlan Lima De Matos', '526.474.121-20', '64101', 'SSP/RS', '1977-06-17', 'Rua Tanimbu, 675', 'Cavalhada', '70670-602', 'Porto Alegre', 'Darlan Lima De Matos', 'Darlan Lima De Matos', 'Programador(a)', 'icamargo@empresa.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(158, 'Antonio Carlos Ferreira Da Silva', '443.288.001-59', '1045106', 'SSP/RS', '1999-09-19', 'Rua José Francisco Cajueiro, 285', 'Cavalhada', '53630-055', 'Porto Alegre', 'Antonio Carlos Ferreira Da Silva', 'Antonio Carlos Ferreira Da Silva', 'Engenheiro(a)', 'BeatriceAzevedoLima@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(159, 'Wilton Cordeiro Costa', '398.494.222-20', '2229255', 'SSP/RS', '1985-08-21', 'Rua Eugênio Guimarães, 1362', 'Cavalhada', '12248-048', 'Porto Alegre', 'Wilton Cordeiro Costa', 'Wilton Cordeiro Costa', 'Arquiteto(a)', 'JuliaRodriguesAraujo@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(160, 'Luiz Renato Bueno', '773.306.171-72', '1651651616', 'SSP/RS', '1995-11-23', 'Rua Antônio Saporito Bico, 1710', 'Cavalhada', '75114-400', 'Porto Alegre', 'Luiz Renato Bueno', 'Luiz Renato Bueno', 'Policial Militar', 'EstevanAzevedoCastro@rhyta.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(161, 'Antonio Donizete Bonatelli', '130.799.148-30', '24488554', 'SSP/RS', '1978-11-06', 'Rua das Pitangueiras, 1416', 'Cavalhada', '66811-060', 'Porto Alegre', 'Antonio Donizete Bonatelli', 'Antonio Donizete Bonatelli', 'Professor(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(162, 'Thiago Farias Martins', '010.329.271-35', '2218307', 'SSP/RS', '1973-05-28', 'Rua São Raimundo, 741', 'Cavalhada', '65042-070', 'Porto Alegre', 'Thiago Farias Martins', 'Thiago Farias Martins', 'Soldador(a)', 'BeatriceAzevedoLima@jourrapide.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(163, 'Durval Leocadio Dourado', '363.189.149-00', '153644394', 'SSP/RS', '1997-05-06', 'Rua Doutor York Ferreira Jorge, 798', 'Cavalhada', '13970-060', 'Porto Alegre', 'Durval Leocadio Dourado', 'Durval Leocadio Dourado', 'Estudante', 'icamargo@empresa.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(164, 'Afreu Alves Pereira', '194.199.881-04', '81323194', 'SSP/RS', '1985-12-10', 'Rua Um, 1602', 'Cavalhada', '38066-050', 'Porto Alegre', 'Afreu Alves Pereira', 'Afreu Alves Pereira', 'Programador(a)', 'AnnaCostaBarbosa@armyspy.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(165, 'Edemilson Da Silva Naitzke', '027.160.279-19', '68775051', 'SSP/RS', '2004-07-11', 'Rua Júlio Cruz, 388', 'Cavalhada', '41345-125', 'Porto Alegre', 'Edemilson Da Silva Naitzke', 'Edemilson Da Silva Naitzke', 'Engenheiro(a)', 'AnnaCostaBarbosa@armyspy.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(166, 'Eder Aparecido Freitas Leme', '915.364.211-20', '1015221', 'SSP/RS', '1984-03-30', 'Rua Tarcísio Correia, 710', 'Cavalhada', '68377-110', 'Porto Alegre', 'Eder Aparecido Freitas Leme', 'Eder Aparecido Freitas Leme', 'Estudante', 'VitoriaRochaBarbosa@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(167, 'Eder Donizete Da Silva', '317.240.098-00', '239049585', 'SSP/RS', '1974-07-01', 'Praça Padre Betendorff, 1037', 'Cavalhada', '11486-954', 'Porto Alegre', 'Eder Donizete Da Silva', 'Eder Donizete Da Silva', 'Arquiteto(a)', 'icamargo@empresa.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(168, 'Alailson Fonseca Trindade', '523.768.851-91', '2457810', 'SSP/RS', '1986-08-11', 'Travessa Primeira, 1978', 'Cavalhada', '81618-584', 'Porto Alegre', 'Alailson Fonseca Trindade', 'Alailson Fonseca Trindade', 'Programador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(169, 'Eder Marcelo De Souza', '239.157.397-90', '3637663', 'SSP/RS', '2002-09-13', 'Rua Gonçalves Dias, 304', 'Cavalhada', '84659-482', 'Porto Alegre', 'Eder Marcelo De Souza', 'Eder Marcelo De Souza', 'Engenheiro(a)', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(170, 'Carlos Aparecido Cavallari', '375.024.689-00', '12622468', 'SSP/RS', '1973-02-07', 'Rua Jaqueira, 1549', 'Cavalhada', '89653-487', 'Porto Alegre', 'Carlos Aparecido Cavallari', 'Carlos Aparecido Cavallari', 'Professor(a)', 'AnnaCostaBarbosa@armyspy.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(171, 'Jose Antonio Ribeiro Silva', '568.447.351-20', '895640', 'SSP/RS', '1997-12-27', 'Rua Terceiro-Sargento João Lopes Filho, 644', 'Cavalhada', '86037-776', 'Porto Alegre', 'Jose Antonio Ribeiro Silva', 'Jose Antonio Ribeiro Silva', 'Soldador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(172, 'Carlos Roberto Da Conceicao Sousa', '007.958.991-06', '2363883', 'SSP/RS', '1990-01-24', 'Rua Paulo Burle, 416', 'Cavalhada', '05523-080', 'Porto Alegre', 'Carlos Roberto Da Conceicao Sousa', 'Carlos Roberto Da Conceicao Sousa', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(173, 'Emerson Jordan Morais Costa', '806.627.652-49', '447624 Ssp', 'SSP/RS', '1986-05-10', 'Rua Minas Gerais, 1993', 'Cavalhada', '89031-655', 'Porto Alegre', 'Emerson Jordan Morais Costa', 'Emerson Jordan Morais Costa', 'Professor(a)', 'BeatriceAzevedoLima@jourrapide.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(174, 'Dierson Camargo', '746.001.920-87', '09025718934', 'SSP/RS', '1991-08-03', 'Praça São Jorge, 192', 'Cavalhada', '81730-100', 'Porto Alegre', 'Dierson Camargo', 'Dierson Camargo', 'Programador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(175, 'Antonio Wolni Da Silva Cruz', '518.013.029-87', '1398437', 'SSP/RS', '1992-01-03', 'Quadra SHIS QI 21, 995', 'Cavalhada', '50865-090', 'Porto Alegre', 'Antonio Wolni Da Silva Cruz', 'Antonio Wolni Da Silva Cruz', 'Policial Militar', 'icamargo@empresa.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(176, 'Roberto De Souza', '515.320.509-68', '4077560', 'SSP/RS', '1978-06-03', 'Rua Recife, 961', 'Cavalhada', '24467-150', 'Porto Alegre', 'Roberto De Souza', 'Roberto De Souza', 'Arquiteto(a)', 'JuliaRodriguesAraujo@armyspy.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(177, 'Jose Pedro Da Rosa Macedo', '808.650.110-87', '1069657847', 'SSP/RS', '1982-12-07', 'Rua Luiz Peicher de Carvalho, 87', 'Cavalhada', '23835-650', 'Porto Alegre', 'Jose Pedro Da Rosa Macedo', 'Jose Pedro Da Rosa Macedo', 'Soldador(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(178, 'Robson Barboza', '105.955.167-50', '00001545764', 'SSP/RS', '1972-07-19', 'Rua Rio Duarte, 489', 'Cavalhada', '35501-607', 'Porto Alegre', 'Robson Barboza', 'Robson Barboza', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(179, 'Sani Virgili Dornelles', '001.914.920-43', '6069020177', 'SSP/RS', '1980-10-19', 'Rua Lelio de Souza, 1738', 'Cavalhada', '13801-337', 'Porto Alegre', 'Sani Virgili Dornelles', 'Sani Virgili Dornelles', 'Professor(a)', 'EstevanAzevedoCastro@rhyta.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(180, 'Anderson Luis Regis', '106.805.417-48', '128208667', 'SSP/RS', '1979-07-03', 'Travessa Ariosto, 147', 'Cavalhada', '12924-710', 'Porto Alegre', 'Anderson Luis Regis', 'Anderson Luis Regis', 'Engenheiro(a)', 'BeatriceAzevedoLima@jourrapide.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(181, 'Carlos Alexandre De Souza', '087.234.657-94', '117479816', 'SSP/RS', '1985-02-07', 'Rua Agostinho Marasca, 1814', 'Cavalhada', '35660-298', 'Porto Alegre', 'Carlos Alexandre De Souza', 'Carlos Alexandre De Souza', 'Estudante', 'icamargo@empresa.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(182, 'Paulo Miranda De Souza', '105.680.057-75', '127302420', 'SSP/RS', '1980-03-01', 'Rua João Fortunatto, 329', 'Cavalhada', '60732-040', 'Porto Alegre', 'Paulo Miranda De Souza', 'Paulo Miranda De Souza', 'Policial Militar', 'AnnaCostaBarbosa@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(183, 'Juliano Henrique De Mello', '046.301.359-01', '00004585430', 'SSP/RS', '1975-07-04', 'Rua General Gastão Goulart, 353', 'Cavalhada', '20941-550', 'Porto Alegre', 'Juliano Henrique De Mello', 'Juliano Henrique De Mello', 'Soldador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(184, 'Mauricio De Souza Nardi', '021.665.750-48', '9106553994', 'SSP/RS', '2003-11-20', 'Rua São Pedro, 316', 'Cavalhada', '63020-190', 'Porto Alegre', 'Mauricio De Souza Nardi', 'Mauricio De Souza Nardi', 'Programador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(185, 'Samuel Luiz Dallacort', '055.409.009-01', '00004739492', 'SSP/RS', '1975-07-01', 'Rua Plewna, 1668', 'Cavalhada', '68508-120', 'Porto Alegre', 'Samuel Luiz Dallacort', 'Samuel Luiz Dallacort', 'Arquiteto(a)', 'icamargo@empresa.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(186, 'Dimas De Jesus Araujo', '358.099.088-88', '00042441867', 'SSP/RS', '2006-05-23', 'Estrada Um, 364', 'Cavalhada', '60832-270', 'Porto Alegre', 'Dimas De Jesus Araujo', 'Dimas De Jesus Araujo', 'Eletricista', 'EstevanAzevedoCastro@rhyta.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(187, 'Gilberto Schroeder', '460.137.509-63', '00000926617', 'SSP/RS', '1988-01-17', 'Rua Doutor Oscar Guimarães, 468', 'Cavalhada', '18056-080', 'Porto Alegre', 'Gilberto Schroeder', 'Gilberto Schroeder', 'Estudante', 'VitoriaRochaBarbosa@jourrapide.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(188, 'Miguel Ramos De Almeira', '035.741.106-42', 'mg11027233', 'SSP/RS', '1987-11-25', 'Rua dos Corretores, 547', 'Cavalhada', '64078-275', 'Porto Alegre', 'Miguel Ramos De Almeira', 'Miguel Ramos De Almeira', 'Engenheiro(a)', 'JuliaRodriguesAraujo@armyspy.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(189, 'Frabricio Silva Santos', '006.472.835-81', '00000045252', 'SSP/RS', '2005-05-12', 'Travessa Vicente Teles, 1264', 'Cavalhada', '60020-410', 'Porto Alegre', 'Frabricio Silva Santos', 'Frabricio Silva Santos', 'Eletricista', 'VitoriaRochaBarbosa@jourrapide.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(190, 'Clinica Pediatrica Baby Helpa', '099.135.747-73', '1213513513', 'SSP/RS', '1982-07-18', 'Rua Isabel Cristina Xavier Franco, 364', 'Cavalhada', '97505-560', 'Porto Alegre', 'Clinica Pediatrica Baby Helpa', 'Clinica Pediatrica Baby Helpa', 'Arquiteto(a)', 'EstevanAzevedoCastro@rhyta.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(191, 'Joao Esteves De Barros', '392.516.169-49', '00000940682', 'SSP/RS', '2000-05-07', 'Rua São Vicente, 409', 'Cavalhada', '13255-800', 'Porto Alegre', 'Joao Esteves De Barros', 'Joao Esteves De Barros', 'Policial Militar', 'AnnaCostaBarbosa@armyspy.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(192, 'Cristiano De Almeida Mota', '274.278.878-67', '27717735', 'SSP/RS', '1973-07-16', 'Rua Ibitu, 1780', 'Cavalhada', '26013-440', 'Porto Alegre', 'Cristiano De Almeida Mota', 'Cristiano De Almeida Mota', 'Soldador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(193, 'Agmar Batista Borges', '654.113.156-20', '00002619597', 'SSP/RS', '1970-05-13', 'Rua Ricardo Rodrigues, 722', 'Cavalhada', '05641-021', 'Porto Alegre', 'Agmar Batista Borges', 'Agmar Batista Borges', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(194, 'Maciel Barbosa De Azevedo', '001.551.141-31', '1651651611', 'SSP/RS', '1998-01-20', 'Rua Rio de Janeiro, 288', 'Cavalhada', '19068-245', 'Porto Alegre', 'Maciel Barbosa De Azevedo', 'Maciel Barbosa De Azevedo', 'Programador(a)', 'icamargo@empresa.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(195, 'Vander Francisco Lourenco De Lima', '524.071.011-20', '1266792', 'SSP/RS', '1998-08-10', 'Rua Paschoal Pellini, 1236', 'Cavalhada', '29161-651', 'Porto Alegre', 'Vander Francisco Lourenco De Lima', 'Vander Francisco Lourenco De Lima', 'Arquiteto(a)', 'JuliaRodriguesAraujo@armyspy.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(196, 'Antonio Da Silva', '367.884.652-15', '104529', 'SSP/RS', '1992-01-10', '2ª Travessa Júlio Bernardo, 1365', 'Cavalhada', '13044-540', 'Porto Alegre', 'Antonio Da Silva', 'Antonio Da Silva', 'Estudante', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(197, 'Vandir Rodrigues Lopes', '780.191.928-91', '9321936', 'SSP/RS', '1994-04-21', 'Rua Palmeiras do Norte, 1887', 'Cavalhada', '12212-400', 'Porto Alegre', 'Vandir Rodrigues Lopes', 'Vandir Rodrigues Lopes', 'Professor(a)', 'BeatriceAzevedoLima@jourrapide.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(198, 'Manoel Aloisio Silva Filho', '043.958.588-05', '11712350', 'SSP/RS', '1988-08-02', 'Rua Leticia Soares, 464', 'Cavalhada', '69036-640', 'Porto Alegre', 'Manoel Aloisio Silva Filho', 'Manoel Aloisio Silva Filho', 'Soldador(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(199, 'Manoel Luiz Rodrigues Soares', '142.230.152-49', '2168055', 'SSP/RS', '1990-01-09', 'Quadra EQNM 17/19 Bloco B, 1533', 'Cavalhada', '37701-146', 'Porto Alegre', 'Manoel Luiz Rodrigues Soares', 'Manoel Luiz Rodrigues Soares', 'Estudante', 'EstevanAzevedoCastro@rhyta.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(200, 'Jose Wilson Sousa Lima', '203.436.043-53', '00002278851', 'SSP/RS', '1977-07-03', 'Rua Nossa Senhora das Graças, 1743', 'Cavalhada', '29107-400', 'Porto Alegre', 'Jose Wilson Sousa Lima', 'Jose Wilson Sousa Lima', 'Arquiteto(a)', 'EstevanAzevedoCastro@rhyta.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(201, 'Vicente Lazaro Santana Ferreira', '020.530.758-21', '5061405', 'SSP/RS', '1984-04-18', 'Beco Guapirama, 192', 'Cavalhada', '13051-400', 'Porto Alegre', 'Vicente Lazaro Santana Ferreira', 'Vicente Lazaro Santana Ferreira', 'Policial Militar', 'icamargo@empresa.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(202, 'Ary Rodrigues De Moraes', '241.332.801-72', '2685221', 'SSP/RS', '1982-02-14', 'Rua Bento José de Moraes, 9', 'Cavalhada', '69075-426', 'Porto Alegre', 'Ary Rodrigues De Moraes', 'Ary Rodrigues De Moraes', 'Eletricista', 'AnnaCostaBarbosa@armyspy.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(203, 'Augustinho Catturani', '560.638.149-49', '14617650', 'SSP/RS', '1987-09-20', 'Rua Paula Maris, 995', 'Cavalhada', '60541-640', 'Porto Alegre', 'Augustinho Catturani', 'Augustinho Catturani', 'Engenheiro(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(204, 'Ageu Alves De Moura', '383.302.292-20', '68633000', 'SSP/RS', '1985-05-14', 'Avenida Deputado Esteves Rodrigues, 971', 'Cavalhada', '77001-284', 'Porto Alegre', 'Ageu Alves De Moura', 'Ageu Alves De Moura', 'Arquiteto(a)', 'icamargo@empresa.com', 'AnnaCostaBarbosa@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(205, 'Alairto Caetano De Oliveira', '598.802.281-20', '3169740', 'SSP/RS', '1993-09-06', 'Rua Benedito Glicério Teixeira, 1599', 'Cavalhada', '02212-040', 'Porto Alegre', 'Alairto Caetano De Oliveira', 'Alairto Caetano De Oliveira', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(206, 'Eluizio Nascimento Dos Santos', '599.098.039-68', '42423963', 'SSP/RS', '2005-06-16', 'Rua Cabo Norberto Henrique Weber, 416', 'Cavalhada', '74405-090', 'Porto Alegre', 'Eluizio Nascimento Dos Santos', 'Eluizio Nascimento Dos Santos', 'Professor(a)', 'BeatriceAzevedoLima@jourrapide.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(207, 'Edio Elo Parckert', '637.267.779-20', '05086440442', 'SSP/RS', '2002-07-09', 'Rua Iemanjá, 37', 'Cavalhada', '60356-570', 'Porto Alegre', 'Edio Elo Parckert', 'Edio Elo Parckert', 'Soldador(a)', 'EstevanAzevedoCastro@rhyta.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(208, 'Carlos Roberto Noveletto', '029.285.778-07', '14287880', 'SSP/RS', '1989-05-19', 'Rua Santos Moreira, 1550', 'Cavalhada', '19800-340', 'Porto Alegre', 'Carlos Roberto Noveletto', 'Carlos Roberto Noveletto', 'Estudante', 'VitoriaRochaBarbosa@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(209, 'Roberto Manoel Alvares Inacio', '284.043.918-23', '29835363', 'SSP/RS', '2006-03-11', 'Rua Boqueirão, 1881', 'Cavalhada', '42801-360', 'Porto Alegre', 'Roberto Manoel Alvares Inacio', 'Roberto Manoel Alvares Inacio', 'Programador(a)', 'EstevanAzevedoCastro@rhyta.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(210, 'Clovis Leanddro Santin', '341.472.33-015', '2020239626', 'SSP/RS', '1982-03-31', 'Rua G, 372', 'Cavalhada', '13060-617', 'Porto Alegre', 'Clovis Leanddro Santin', 'Clovis Leanddro Santin', 'Policial Militar', 'icamargo@empresa.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(211, 'Ademir Carlos Da Silva', '804.516.910-91', '8065769501', 'SSP/RS', '1996-05-15', 'Rua Quintino, 400/201', 'Cavalhada', '90481-981', 'Porto Alegre', 'Ademir Carlos Da Silva', 'Ademir Carlos Da Silva', 'Advogado', 'ademir.silva@gmail.com', 'ademirsilva@advogado.com.br', '(51) 9147-8965', '(51) 3018-1610', '(51) 2165-1605', 1, 22, 8, 1, 51, 2),
	(212, 'Jesse Costa Da Silva', '280.546.458-30', '6148875962', 'SSP/RS', '1991-05-29', 'Viela Lupianópolis, 995', 'Cavalhada', '06220-250', 'Porto Alegre', 'Jesse Costa Da Silva', 'Jesse Costa Da Silva', 'Professor(a)', 'AnnaCostaBarbosa@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(213, 'Jose Inaldo De Oliveira', '127.538.664-49', '00000961476', 'SSP/RS', '1997-12-01', 'Rua Professor Duque, 411', 'Cavalhada', '17211-240', 'Porto Alegre', 'Jose Inaldo De Oliveira', 'Jose Inaldo De Oliveira', 'Motorista', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(214, 'Diego Teixeira Da Silva', '012.397.880-70', '01077914741', 'SSP/RS', '1971-08-29', 'Rua das Violetas, 565', 'Cavalhada', '87075-620', 'Porto Alegre', 'Diego Teixeira Da Silva', 'Diego Teixeira Da Silva', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(215, 'Carlos Augusto Radinz', '024.533.077-11', '00001209019', 'SSP/RS', '2005-02-09', 'Travessa Santa Durvalina, 37', 'Cavalhada', '79106-161', 'Porto Alegre', 'Carlos Augusto Radinz', 'Carlos Augusto Radinz', 'Motorista', 'AnnaCostaBarbosa@armyspy.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(216, 'Jose Pedro Ferreira', '699.746.249-91', '00004889537', 'SSP/RS', '1993-02-23', 'Rua Joaçaba, 995', 'Cavalhada', '07040-170', 'Porto Alegre', 'Jose Pedro Ferreira', 'Jose Pedro Ferreira', 'Soldador(a)', 'VitoriaRochaBarbosa@jourrapide.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(217, 'Joanilson Rodrigo De Almeida', '042.120.816-36', 'm-9.019.221', 'SSP/RS', '1980-05-30', 'Rua Archibano Marangoni, 746', 'Cavalhada', '55036-200', 'Porto Alegre', 'Joanilson Rodrigo De Almeida', 'Joanilson Rodrigo De Almeida', 'Estudante', 'BeatriceAzevedoLima@jourrapide.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(218, 'Osmar Cândido', '923.616.508-78', '8980571', 'SSP/RS', '1989-06-18', 'Praça Mário Vicente Pedro Piccoli, 50', 'Cavalhada', '16203-116', 'Porto Alegre', 'Osmar Cândido', 'Osmar Cândido', 'Programador(a)', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(219, 'Daniel De Lima Da Silva', '215.586.358-66', '35.573.787-5', 'SSP/RS', '1999-03-22', 'Rua Manuel Haiser, 725', 'Cavalhada', '04510-030', 'Porto Alegre', 'Daniel De Lima Da Silva', 'Daniel De Lima Da Silva', 'Policial Militar', 'JuliaRodriguesAraujo@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(220, 'Airton Mendonça Ferreira', '011.450.577-21', '087160495', 'SSP/RS', '1984-01-05', 'Avenida São Pedro, 1172', 'Cavalhada', '77015-216', 'Porto Alegre', 'Airton Mendonça Ferreira', 'Airton Mendonça Ferreira', 'Estudante', 'JuliaRodriguesAraujo@armyspy.com', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(221, 'Samuel Cesar Lopes', '337.503.968-92', '00041252310', 'SSP/RS', '1989-04-03', 'Rua das Dálias, 88', 'Cavalhada', '74369-140', 'Porto Alegre', 'Samuel Cesar Lopes', 'Samuel Cesar Lopes', 'Professor(a)', 'icamargo@empresa.com', 'VitoriaRochaBarbosa@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(222, 'Vilmar Ribeiro', '674.358.319-72', '2.137.478', 'SSP/RS', '1987-05-17', 'Quadra QS 111 Bloco 02, 1393', 'Cavalhada', '29121-060', 'Porto Alegre', 'Vilmar Ribeiro', 'Vilmar Ribeiro', 'Soldador(a)', 'BeatriceAzevedoLima@jourrapide.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(223, 'Luiz De Carli Sobrinho', '433.561.680-53', '03029946294', 'SSP/RS', '1999-02-07', 'Praça Joaquim Monteiro de Araújo, 888', 'Cavalhada', '69905-801', 'Porto Alegre', 'Luiz De Carli Sobrinho', 'Luiz De Carli Sobrinho', 'Estudante', 'VitoriaRochaBarbosa@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(224, 'Daian Daroz Claus', '906.928.610-68', '4066015531', 'SSP/RS', '1989-09-08', 'Rua Catende, 1713', 'Cavalhada', '74350-040', 'Porto Alegre', 'Daian Daroz Claus', 'Daian Daroz Claus', 'Policial Militar', 'EstevanAzevedoCastro@rhyta.com', 'YasminCostaCorreia@teleworm.us', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(225, 'Kleber Augusto Fernandes Sampaio', '305.401.178-03', '35276742', 'SSP/RS', '1981-02-17', 'Estrada Mediterrâneo, 660', 'Cavalhada', '05143-100', 'Porto Alegre', 'Kleber Augusto Fernandes Sampaio', 'Kleber Augusto Fernandes Sampaio', 'Professor(a)', 'BeatriceAzevedoLima@jourrapide.com', 'icamargo@empresa.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(226, 'Jevilson Neri Da Silva', '252.709.821-53', '1135492996', 'SSP/RS', '2003-06-11', 'Rua José Anselmi, 1740', 'Cavalhada', '90820-330', 'Porto Alegre', 'Jevilson Neri Da Silva', 'Jevilson Neri Da Silva', 'Estudante', 'YasminCostaCorreia@teleworm.us', 'BeatriceAzevedoLima@jourrapide.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(228, 'Silfarney Rios Silveira', '397.216.552-87', '143592588', 'SSP/RS', '1993-04-01', 'Rua Gávea, 848', 'Cavalhada', '21210-390', 'Porto Alegre', 'Silfarney Rios Silveira', 'Silfarney Rios Silveira', 'Soldador(a)', 'JuliaRodriguesAraujo@armyspy.com', 'EstevanAzevedoCastro@rhyta.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2),
	(229, 'Verno Luis Herrmann', '578.626.050-04', '2047891763', 'SSP/RS', '1985-12-03', 'Rua Pontão, 304', 'Cavalhada', '72746-005', 'Porto Alegre', 'Verno Luis Herrmann', 'Verno Luis Herrmann', 'Professor(a)', 'EstevanAzevedoCastro@rhyta.com', 'JuliaRodriguesAraujo@armyspy.com', '(51) 9147-8965', '(51) 3015-4588', '(51) 3058-9632', 1, 22, 8, 1, 51, 2);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.tipo_atendimento: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_atendimento` DISABLE KEYS */;
INSERT INTO `tipo_atendimento` (`id_tipo_atendimento`, `nome_tipo_atendimento`, `descricao`, `data_insercao`, `data_desativacao`, `data_alteracao`) VALUES
	(8, 'Clínico', 'Atendimento Clínico Geral', '2015-09-07', NULL, '2015-09-29'),
	(9, 'Gestante', 'Atendimento pré-natal a gestante.', '2015-09-07', NULL, NULL),
	(10, 'Recèm-nascido', 'Atendimento a recém-nascidos.', '2015-09-07', NULL, NULL),
	(11, 'Idoso', 'Atendimento a idoso.', '2015-09-07', NULL, NULL),
	(12, 'Visita domiciliar', 'Atendimento feito em residência.', '2015-09-07', NULL, NULL),
	(13, 'Criança', 'Atendimento a criança.', '2015-09-07', NULL, NULL),
	(15, 'Pré-natal I', 'Pré-natal I', '2015-10-02', NULL, NULL),
	(16, 'Pré-natal II', 'Pré-natal II', '2015-10-02', NULL, NULL),
	(17, 'Pré-natal III', 'Pré-natal III', '2015-10-02', NULL, NULL),
	(18, 'Pré-natal IV', 'Pré-natal IV', '2015-10-02', NULL, NULL);
/*!40000 ALTER TABLE `tipo_atendimento` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.tipo_funcionario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_funcionario` DISABLE KEYS */;
INSERT INTO `tipo_funcionario` (`id_tipo_funcionario`, `nome_tipo`) VALUES
	(1, 'Administrador(a)'),
	(3, 'Gestor(a) de Unidade'),
	(5, 'Enfermeiro(a)'),
	(6, 'Médico(a)'),
	(7, 'Técnico(a) de Enfermagem'),
	(8, 'Agente de Saúde');
/*!40000 ALTER TABLE `tipo_funcionario` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.tipo_funcionario_funcionalidade: ~76 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_funcionario_funcionalidade` DISABLE KEYS */;
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
	(1, 24),
	(1, 25),
	(1, 26),
	(3, 1),
	(3, 3),
	(3, 4),
	(3, 5),
	(3, 6),
	(3, 7),
	(3, 8),
	(3, 9),
	(3, 10),
	(3, 11),
	(3, 12),
	(3, 13),
	(3, 14),
	(3, 15),
	(3, 16),
	(3, 17),
	(3, 18),
	(3, 19),
	(3, 20),
	(3, 24),
	(3, 25),
	(6, 1),
	(6, 2),
	(6, 3),
	(6, 5),
	(6, 9),
	(6, 13),
	(6, 18),
	(6, 19),
	(6, 24),
	(6, 25),
	(6, 26),
	(7, 1),
	(7, 2),
	(7, 5),
	(7, 9),
	(7, 13),
	(7, 18),
	(7, 19),
	(7, 24),
	(7, 25),
	(8, 1),
	(8, 2),
	(8, 5),
	(8, 9),
	(8, 13),
	(8, 18),
	(8, 19),
	(8, 24),
	(8, 25);
/*!40000 ALTER TABLE `tipo_funcionario_funcionalidade` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.tipo_sanguineo: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_sanguineo` DISABLE KEYS */;
INSERT INTO `tipo_sanguineo` (`id_tipo_sanguineo`, `tipo_sanguineo`) VALUES
	(1, 'A+'),
	(2, 'A-'),
	(3, 'B+'),
	(4, 'B-'),
	(5, 'AB+'),
	(6, 'AB-'),
	(7, 'O+'),
	(8, 'O-');
/*!40000 ALTER TABLE `tipo_sanguineo` ENABLE KEYS */;

-- Copiando dados para a tabela sgpm.ubs: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `ubs` DISABLE KEYS */;
INSERT INTO `ubs` (`id_ubs`, `ubs_atendimento`, `endereco`, `telefone`, `data_insercao`, `data_alteracao`, `data_desativacao`) VALUES
	(1, 'UBS Menino Deus', 'Av. Getúlio Vargas, 250', 1111, '2015-09-22', '2015-09-28', NULL),
	(4, 'UBS Azenha', 'Avenida Azenha, 50', 2147483647, '2015-09-28', '2015-09-29', NULL),
	(8, 'UBS Cavalhada', 'Avenida Cavalhada, 2045', 2147483647, '2015-09-28', NULL, NULL),
	(17, 'UBS Centro', 'Rua dos Andradas, 500', 1111111111, '2015-09-28', '2015-09-28', NULL),
	(18, 'UBS Vila Cruzeiro', 'Rua do Algodão, 820', 0, '2015-10-02', NULL, NULL),
	(19, 'UBS Tristeza', 'Avenida Lininha, 820', 0, '2015-10-02', NULL, NULL),
	(20, 'UBS Belém Novo', 'Avenida do Linhão, 710', 0, '2015-10-02', NULL, NULL),
	(21, 'UBS Porto Seco', 'Avenida Beira Rio, , 954', 0, '2015-10-02', NULL, NULL);
/*!40000 ALTER TABLE `ubs` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
