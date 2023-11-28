-- Adminer 4.8.1 MySQL 5.5.5-10.5.21-MariaDB-1:10.5.21+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `bd_cea` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `bd_cea`;

DROP TABLE IF EXISTS `tb_adm`;
CREATE TABLE `tb_adm` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(5) NOT NULL,
  `cpf_adm` varchar(11) NOT NULL,
  `nome_adm` varchar(45) NOT NULL,
  `dt_contrato` date NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`id_adm`),
  UNIQUE KEY `matricula_adm_UNIQUE` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_adm` (`id_adm`, `matricula`, `cpf_adm`, `nome_adm`, `dt_contrato`, `senha`) VALUES
(1,	20231,	'87921387945',	'Luís Carlos dos Santos',	'2023-06-27',	'lc123'),
(2,	20232,	'5479813245',	'Ana Carolini',	'2023-06-27',	'ac123'),
(3,	20233,	'2137854612',	'Wellison',	'2023-06-27',	'wl123');

DROP TABLE IF EXISTS `tb_aluno`;
CREATE TABLE `tb_aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(8) NOT NULL,
  `nome_aluno` varchar(45) NOT NULL,
  `nome_mae` varchar(45) NOT NULL,
  `nome_pai` varchar(45) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dt_matricula` date NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tb_adm_id_adm` int(11) NOT NULL,
  `tb_turma_id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `matricula_aluno_UNIQUE` (`matricula`),
  KEY `fk_tb_aluno_tb_adm_idx` (`tb_adm_id_adm`),
  KEY `tb_turma_id_turma` (`tb_turma_id_turma`),
  CONSTRAINT `fk_tb_aluno_tb_adm` FOREIGN KEY (`tb_adm_id_adm`) REFERENCES `tb_adm` (`id_adm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`tb_turma_id_turma`) REFERENCES `tb_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='					';

INSERT INTO `tb_aluno` (`id_aluno`, `matricula`, `nome_aluno`, `nome_mae`, `nome_pai`, `dt_nascimento`, `endereco`, `cpf`, `dt_matricula`, `senha`, `tb_adm_id_adm`, `tb_turma_id_turma`) VALUES
(1,	20231021,	'Ana Beatriz Oliveira Araujo',	'Maria Clara Oliveira Araujo',	'José Oliveira Araujo',	'2006-12-06',	'Ceres, Rua A N°5',	'130.091.561-89',	'2023-01-12',	'anaB123',	1,	1),
(2,	20231022,	'Ana Carolini Rodrigues Dias',	'Marcia Maria Rodrigues Dias',	'Tulio Rodrigues Dias',	'2006-05-11',	'Ceres, Rua 01 N°7',	'768.098.061.76',	'2023-01-13',	'anaC123',	2,	1),
(3,	20231023,	'Ana Julia Lacerda Fernandes',	'Bruna Lacerda Fernandes',	'Junior Lacerda Fernandes',	'2005-05-05',	'Ceres, Rua 12 N° 13 ',	'987.111.091-09',	'2023-01-14',	'anaJ123',	3,	1),
(4,	20231024,	'Bruno Golsaves Dias',	'Juliana Golsaves Dias',	'Rafael Golsaves Dias',	'2005-10-07',	'Ceres, Rua B N° 7',	'543.321.231-94',	'2023-01-15',	'brunoG123',	1,	1),
(5,	20231025,	'Brendo Oliveira Araujo',	'Maria Clara Oliveira Araujo',	'José Oliveira Araujo',	'2005-12-12',	'Ceres, Rua A N° 5',	'645.096.011-87',	'2023-01-12',	'brendoO123',	2,	1),
(6,	20231026,	'Camila Silva Cardoso',	'Joelma Silva Cardoso',	'Fabio Silva Cardoso',	'2005-12-28',	'Ceres, Rua D N° 13 ',	'444.768.021-08',	'2023-01-17',	'camilaS123',	3,	1),
(7,	20231027,	'Davi Apolinario de Oliveira',	'Fabiana Apolinario de Oliveira',	'Felipe Apolinario de Oliveira',	'2006-01-23',	'Ceres, Rua H N° 19 ',	'751.097.431-40',	'2023-01-18',	'daviA123',	1,	1),
(8,	20231028,	'Déborah Gomes Cabral',	'Fabíola Gomes Cabral',	'Jonatam Gomes Cabral',	'2006-01-19',	'Ceres, Rua 01 N° 13 ',	'875.988.871-31',	'2023-01-19',	'deborahG123',	2,	1),
(9,	20231029,	'Emilly Pereira de Sousa ',	'Manuele Pereira de Sousa ',	'Cássio Pereira de Sousa ',	'2006-09-09',	'Ceres, Rua 11 N° 19 ',	'154.096.651-98',	'2023-01-20',	'emillyP123',	3,	1),
(10,	20231030,	'Emilio Bezerra Cabral',	'Vanessa Bezerra Cabral',	'José Bezerra Cabral',	'2006-10-12',	'Ceres, Rua 10 N° 13 ',	'867.098.761-33',	'2023-01-21',	'emilioB123',	1,	1),
(11,	20231031,	'Edílsio Pereira Matos',	'Rafaela Pereira Matos',	'João Paulo Pereira Matos',	'2005-03-02',	'Ceres, Rua T N° 2',	'234.432.021-94',	'2023-01-22',	'edilsonP3',	2,	1),
(12,	20231032,	'Fabrício Lacerda Fernandes',	'Isís Lacerda Fernandes',	'Liam Lacerda Fernandes',	'2006-06-09',	'Ceres, Rua P N° 11',	'332.321.891-44',	'2023-01-23',	'fabricioL123',	3,	1),
(13,	20231033,	'Flavia da Cunha Rodrigues',	'Rosana Cunha Rodrigues',	'Heytor Cunha Rodrigues',	'2006-07-08',	'Ceres, Rua R N° 13 ',	'567.908.021-23',	'2023-01-24',	'flaviaC123',	1,	1),
(14,	20231034,	'Fernando Araujo da Silva',	'Rochele Araujo da Silva',	'Arthur Araujo da Silva',	'2006-05-13',	'Ceres, Rua U N° 26',	'971.213.871-11',	'2023-01-14',	'fernandoA123',	2,	1),
(15,	20231035,	'Felipe do Nascimento Matos',	'Ana Carolina Nascimento Matos',	'Fabiano Nascimento Matos',	'2006-01-11',	'Rubiataba, Rua 12 N° 20 ',	'876.098.021-88',	'2023-01-26',	'felipeN123',	3,	1),
(16,	20231036,	'Gabrielly Alencar Rossi',	'Clárice Alencar Rossi',	'Fernando Alencar Rossi',	'2005-05-01',	'São Patrício, Rua N N° 1 ',	'543.876.871-76',	'2023-01-27',	'gabiA123',	1,	1),
(17,	20231037,	'Gabriel de Oliveira Piloto',	'Valesca Oliveira Piloto',	'Jorge Oliveira Piloto',	'2005-09-12',	'São Patrício, Rua O  N° 17 ',	'766.871.631-98',	'2023-01-28',	'gabrielO123',	2,	1),
(18,	20231038,	'Geovana Tosta da Silva',	'Gabriela Tosta da Silva',	'Matheus Tosta da Silva',	'2005-10-29',	'Rubiataba, Rua F N° 16',	'676.990.191-56',	'2023-01-29',	'geoT123',	3,	1),
(19,	20231039,	'João Vitor Pereira da Silva',	'Maraisa Pereira da Silva',	'Henrique Pereira da Silva',	'2006-01-18',	'Ceres, Rua C N° 10',	'777.098.071-77',	'2023-01-30',	'joaoV123',	1,	1),
(20,	20231040,	'Juliana Andrade Amaral',	'Geovanna Andrade Amaral',	'Juliano Andrade Amaral',	'2006-07-07',	'Rialma, Rua G N° 5 ',	'579.876.741-87',	'2023-01-24',	'julianaA123',	2,	1);

DROP TABLE IF EXISTS `tb_disciplina`;
CREATE TABLE `tb_disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tb_professor_id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `tb_professor_id_professor` (`tb_professor_id_professor`),
  CONSTRAINT `tb_disciplina_ibfk_1` FOREIGN KEY (`tb_professor_id_professor`) REFERENCES `tb_professor` (`id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_disciplina` (`id_disciplina`, `nome`, `tb_professor_id_professor`) VALUES
(1,	'Portugês',	1),
(2,	'Matematica',	2),
(3,	'Historia',	3),
(4,	'Geografia',	4),
(5,	'Artes',	5),
(6,	'Ed. Fisica',	6),
(7,	'Quimica',	7),
(8,	'Fisica',	8),
(9,	'Biologia',	9);

DROP TABLE IF EXISTS `tb_notas`;
CREATE TABLE `tb_notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `valor_nota` varchar(5) NOT NULL,
  `tb_disciplina_id_disciplina` int(11) NOT NULL,
  `tb_aluno_id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `tb_aluno_id_aluno` (`tb_aluno_id_aluno`),
  KEY `tb_disciplina_id_disciplina` (`tb_disciplina_id_disciplina`),
  CONSTRAINT `tb_notas_ibfk_2` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  CONSTRAINT `tb_notas_ibfk_3` FOREIGN KEY (`tb_disciplina_id_disciplina`) REFERENCES `tb_disciplina` (`id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_notas` (`id_nota`, `valor_nota`, `tb_disciplina_id_disciplina`, `tb_aluno_id_aluno`) VALUES
(1,	'8',	1,	20),
(2,	'9',	1,	1),
(3,	'8',	1,	2),
(4,	'7',	1,	3),
(5,	'6',	1,	4),
(6,	'5',	1,	5),
(7,	'4',	1,	6),
(8,	'3',	1,	7),
(9,	'2',	1,	8),
(10,	'1',	1,	9),
(11,	'9',	1,	10),
(12,	'8',	1,	11),
(13,	'7',	1,	12),
(14,	'6',	1,	13),
(15,	'5',	1,	14),
(16,	'4',	1,	15),
(17,	'3',	1,	16),
(18,	'2',	1,	17),
(19,	'1',	1,	18),
(20,	'9',	1,	19),
(21,	'8',	1,	20);

DROP TABLE IF EXISTS `tb_professor`;
CREATE TABLE `tb_professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(4) NOT NULL,
  `nome_professor` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `endereco_professor` varchar(50) NOT NULL,
  `dt_contrato` date NOT NULL,
  `duracao_contrato` varchar(45) NOT NULL,
  `area_formacao` varchar(45) NOT NULL,
  `cg_horaria` varchar(45) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tb_adm_id_adm` int(11) NOT NULL,
  `tb_turma_id_tuma` int(11) NOT NULL,
  PRIMARY KEY (`id_professor`),
  UNIQUE KEY `matricula_professor_UNIQUE` (`matricula`),
  KEY `fk_tb_professor_tb_adm1_idx` (`tb_adm_id_adm`),
  KEY `tb_turma_id_tuma` (`tb_turma_id_tuma`),
  CONSTRAINT `fk_tb_professor_tb_adm1` FOREIGN KEY (`tb_adm_id_adm`) REFERENCES `tb_adm` (`id_adm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_professor_ibfk_1` FOREIGN KEY (`tb_turma_id_tuma`) REFERENCES `tb_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_professor` (`id_professor`, `matricula`, `nome_professor`, `cpf`, `dt_nascimento`, `endereco_professor`, `dt_contrato`, `duracao_contrato`, `area_formacao`, `cg_horaria`, `senha`, `tb_adm_id_adm`, `tb_turma_id_tuma`) VALUES
(1,	1000,	'Maria Aparecida de Jesus ',	'464.937.451-03',	'1980-08-15',	'Ceres, Rua T, N°1',	'2019-01-03',	'10 anos',	'Letras',	'76 horas',	'Maria123',	1,	1),
(2,	1001,	'João Figueiredo Marsola ',	'648.088.771-87',	'1975-08-25',	'Ceres, Centro, N°17',	'2017-03-22',	'10 anos ',	'Matematica e suas Tecnologias',	'77 horas',	'Joao123',	2,	1),
(3,	1002,	'Vanessa Rossi Rosa',	'654.781.541-65',	'1980-08-17',	'Ceres Rua P, N°10',	'2017-10-05',	'10 anos ',	'Historia',	'78 horas',	'Vanessa123',	3,	1),
(4,	1003,	'Marcela Ramos de Oliveira',	'738.087.431-54',	'1989-01-18',	'Ceres Rua R, N°7',	'2023-01-06',	'10 anos ',	'Geografia',	'79 horas',	'Marcela123',	3,	1),
(5,	1004,	'Vitor Lacerda de Souza',	'987.643.341-81',	'1980-08-19',	'Rubiataba, Rua P, N°11',	'2022-02-11',	'10 anos ',	'Artes Classicas',	'80 horas',	'Vitor123',	2,	1),
(6,	1005,	'Henrique Matis Rodrigues',	'025.896.091-62',	'1980-08-20',	'São Patrício, Rua T, N°1',	'2022-01-08',	'10 anos ',	'Educação Fisica',	'81 horas',	'Henrique123',	1,	1),
(7,	1006,	'Isabela de Oliveira',	'674.076.071-86',	'1980-08-21',	'Rubiataba, Rua U, N°20',	'2018-07-29',	'10 anos ',	'Quimica',	'82 horas',	'Isabela123',	1,	1),
(8,	1007,	'Hélio Rubins Costa',	'546.064.221-89',	'1980-08-22',	'Rubiataba, Rua A, N°1',	'2018-01-10',	'10 anos ',	'Física Pratica',	'83 horas',	'Helio123',	2,	1),
(9,	1008,	'Elisa Miranda Mello',	'433.087.671-75',	'1980-08-23',	'Ceres, Rua 7, N°17',	'2020-04-11',	'10 anos ',	'Ciências Biologicas',	'84 horas',	'Elisa123',	3,	1),
(11,	1155,	'Janja Maria Souza',	'87921354678',	'1972-07-30',	'Carmo, Rua J, Nº 5',	'2023-06-29',	'5anos',	'Ciencia da Natureza',	'14h',	'jan123',	1,	1);

DROP TABLE IF EXISTS `tb_turma`;
CREATE TABLE `tb_turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(8) NOT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_turma` (`id_turma`, `nome_turma`) VALUES
(1,	'2º \"B\"');

-- 2023-06-29 12:09:50
