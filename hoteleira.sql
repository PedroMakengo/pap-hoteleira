-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Maio-2023 às 15:04
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hoteleira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'Beny João', 'beny@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg'),
(2, 'Afonso Kiala', 'afonsokiala@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cardapios`
--

DROP TABLE IF EXISTS `tb_cardapios`;
CREATE TABLE IF NOT EXISTS `tb_cardapios` (
  `id_cardapio` int NOT NULL AUTO_INCREMENT,
  `id_restaurante` int DEFAULT NULL,
  `foto_um` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_dois` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_tres` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_registro_cardapio` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cardapio`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

DROP TABLE IF EXISTS `tb_comentarios`;
CREATE TABLE IF NOT EXISTS `tb_comentarios` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_hotel` int DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_general_ci,
  `data_registro_comentario` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id_comentario`, `id_hotel`, `nome`, `comentario`, `data_registro_comentario`) VALUES
(2, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur.', '2023-05-20 16:02:34'),
(3, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur', '2023-05-20 16:21:21'),
(4, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur', '2023-05-20 16:28:08'),
(5, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur', '2023-05-20 16:28:15'),
(6, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur', '2023-05-20 16:28:22'),
(7, 1, 'Manuel dos Santos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptas, odio ipsam est similique commodi iusto. Sequi, libero nam, enim reiciendis eaque obcaecati deleniti earum deserunt dicta quibusdam delectus consectetur', '2023-05-20 16:28:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_reserva`
--

DROP TABLE IF EXISTS `tb_historico_reserva`;
CREATE TABLE IF NOT EXISTS `tb_historico_reserva` (
  `id_historico` int NOT NULL AUTO_INCREMENT,
  `id_hotel` int DEFAULT NULL,
  `usuario_historico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action_historico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `historico` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_historico` datetime DEFAULT NULL,
  PRIMARY KEY (`id_historico`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_historico_reserva`
--

INSERT INTO `tb_historico_reserva` (`id_historico`, `id_hotel`, `usuario_historico`, `action_historico`, `historico`, `data_historico`) VALUES
(1, 1, 'Manuel dos Santos', 'prazo terminado', 'Manuel dos Santos Opps o teu prazo terminado ', '2023-05-01 12:08:58'),
(5, 1, 'Manuel dos Santos', 'reservou', 'Manuel dos Santos reservou um quarto referência 503-A', '2023-05-01 13:19:38'),
(4, 1, 'Manuel dos Santos', 'reservou', 'Manuel dos Santos reservou um quarto 1', '2023-05-01 13:08:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hospedes`
--

DROP TABLE IF EXISTS `tb_hospedes`;
CREATE TABLE IF NOT EXISTS `tb_hospedes` (
  `id_hospede` int NOT NULL AUTO_INCREMENT,
  `nome_hospede` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_hospede` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha_hospede` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_hospedes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero_hospedes` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco_hospede` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cidade_hospede` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bi_hospede` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone_hospede` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento_hospede` date NOT NULL,
  `data_criacao_hospede` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_hospede` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hospede`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hospedes`
--

INSERT INTO `tb_hospedes` (`id_hospede`, `nome_hospede`, `email_hospede`, `senha_hospede`, `foto_hospedes`, `genero_hospedes`, `endereco_hospede`, `cidade_hospede`, `bi_hospede`, `telefone_hospede`, `data_nascimento_hospede`, `data_criacao_hospede`, `data_atualizacao_hospede`) VALUES
(3, 'Manuel dos Santos', 'manueldossantos@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'M', 'Luanda, Maianga', 'Luanda, São Paulo', '0111111111111', '930018123732', '1999-01-02', '2023-04-13 14:36:24', '2023-05-20 16:40:21'),
(2, 'Flavio António', 'flavioantonio@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'M', 'Luanda, Maianga', 'Luanda, São Paulo', '0111111111111', '+244921538972', '1999-01-01', '2023-04-13 12:48:07', '2023-04-13 12:48:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hotel`
--

DROP TABLE IF EXISTS `tb_hotel`;
CREATE TABLE IF NOT EXISTS `tb_hotel` (
  `id_hotel` int NOT NULL AUTO_INCREMENT,
  `nome_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_hotel` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nif_hotel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_hotel` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cidade_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iban` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_hotel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `classificacao_hotel` int NOT NULL,
  `num_quartos_hotel` int NOT NULL,
  `servicos_hotel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `telefone_hotel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `site_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_criacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nome_hotel`, `email_hotel`, `senha_hotel`, `status_hotel`, `nif_hotel`, `endereco_hotel`, `foto_hotel`, `cidade_hotel`, `iban`, `descricao_hotel`, `classificacao_hotel`, `num_quartos_hotel`, `servicos_hotel`, `telefone_hotel`, `site_hotel`, `data_criacao_hotel`, `data_atualizacao_hotel`) VALUES
(1, 'CasaDubai', 'casadubai@gmail.com', '74be16979710d4c4e7c6647856088456', 'Ativo', '0012102000', 'Luanda, Maianga', '1681858299433.jpg', 'Luanda', '', 'Testando333', 5, 5, 'Hotelaria, Restaurante', '90000', 'https://epicsana.gov', '2023-03-30 21:24:20', '2023-05-20 16:37:42'),
(2, 'MakaHotel', 'makahotel@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:28:48', '2023-03-30 21:29:42'),
(3, 'MakaLuanda', 'makaluanda@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:31:12', '2023-03-30 21:31:16'),
(4, 'Hotel SNIR', 'hotelsnir@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '0012102000', 'Luanda, Maianga', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-04-13 10:42:01', '2023-04-13 10:43:03'),
(5, 'Hotel Luanda', 'hotelluanda@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '0012102000', 'Luanda, Maianga', '', 'Luanda, São Paulo', '', NULL, 0, 0, NULL, '', NULL, '2023-04-13 10:42:18', '2023-04-13 10:43:09'),
(13, 'Vance Garcia', 'tuqekyzaze@mailinator.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Inativo', 'Troy Lara', 'Rerum accusamus omni', '', 'Aspen Hinton', '0000000000000000', NULL, 0, 0, NULL, '', NULL, '2023-05-20 13:53:21', '2023-05-20 13:53:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_logs`
--

DROP TABLE IF EXISTS `tb_logs`;
CREATE TABLE IF NOT EXISTS `tb_logs` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `user_log` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action_log` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text_log` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_log` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_logs`
--

INSERT INTO `tb_logs` (`id_log`, `user_log`, `action_log`, `text_log`, `data_log`) VALUES
(1, 'Manuel dos Santos', 'registrou', 'O usuário Manuel dos Santos registrou fez um comentário ', '2023-05-20 00:00:00'),
(2, 'Manuel dos Santos', 'registrou', 'O usuário Manuel dos Santos registrou fez um comentário ', '2023-05-20 00:00:00'),
(3, 'Manuel dos Santos', 'registrou', 'O usuário Manuel dos Santos registrou fez um comentário ', '2023-05-20 00:00:00'),
(4, 'Manuel dos Santos', 'registrou', 'O usuário Manuel dos Santos registrou fez um comentário ', '2023-05-20 00:00:00'),
(5, 'Manuel dos Santos', 'registrou', 'O usuário Manuel dos Santos registrou fez um comentário ', '2023-05-20 00:00:00'),
(6, 'CasaDubai', 'registrou', 'O usuário CasaDubai registrou um quarto cujo o nome é A03828', '2023-05-20 00:00:00'),
(7, 'CasaDubai', 'atualizou', 'O usuário CasaDubai atualizou o seu perfil', '2023-05-20 15:37:42'),
(8, 'Manuel dos Santos', 'atualizou', 'O usuário Manuel dos Santos atualizou o seu perfil', '2023-05-20 15:39:52'),
(9, 'Manuel dos Santos', 'atualizou', 'O usuário Manuel dos Santos atualizou o seu perfil', '2023-05-20 15:40:21'),
(10, 'Beny João', 'atualizou', 'O usuário Beny João atualizou o seu perfil', '2023-05-20 15:40:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesas`
--

DROP TABLE IF EXISTS `tb_mesas`;
CREATE TABLE IF NOT EXISTS `tb_mesas` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `id_restaurante` int NOT NULL,
  `nome_mesa` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_mesa` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preco_mesa` decimal(10,2) NOT NULL,
  `status_mesa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_mesa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_mesa` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao__mesa` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mesa`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesas`
--

INSERT INTO `tb_mesas` (`id_mesa`, `id_restaurante`, `nome_mesa`, `tipo_mesa`, `preco_mesa`, `status_mesa`, `descricao_mesa`, `data_criacao_mesa`, `data_atualizacao__mesa`) VALUES
(1, 1, '0001', 'Vip', '4000.00', 'Disponível', '', '2023-04-13 10:45:26', '2023-04-13 10:45:26'),
(2, 6, '0005', 'Vip', '4000.00', 'Disponível', '', '2023-04-13 10:48:11', '2023-04-13 10:48:11'),
(3, 8, '00001', 'Normal', '3000.00', 'Ocupado', '', '2023-04-13 17:50:40', '2023-04-24 21:55:31'),
(4, 8, 'Et deserunt consequa', 'Vip', '400.00', 'Disponível', 'Aut esse et vitae i', '2023-05-20 14:16:54', '2023-05-20 14:16:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesa_reservas`
--

DROP TABLE IF EXISTS `tb_mesa_reservas`;
CREATE TABLE IF NOT EXISTS `tb_mesa_reservas` (
  `id_reserva_mesa` int NOT NULL AUTO_INCREMENT,
  `id_mesa` int NOT NULL,
  `id_hospede` int NOT NULL,
  `id_restaurante` int NOT NULL,
  `data_checkin_mesa_reserva` date NOT NULL,
  `status_mesa_reserva` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comprovativo_mesa_reserva` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_mesa_reserva` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_mesa_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva_mesa`),
  KEY `id_mesa` (`id_mesa`),
  KEY `id_hospede` (`id_hospede`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_quartos`
--

DROP TABLE IF EXISTS `tb_quartos`;
CREATE TABLE IF NOT EXISTS `tb_quartos` (
  `id_quarto` int NOT NULL AUTO_INCREMENT,
  `quarto` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_quarto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `capacidade_quarto` int NOT NULL,
  `preco_quarto` decimal(10,2) NOT NULL,
  `descricao_quarto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `foto_primeira_quarto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_segunda_quarto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_quarto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_quarto` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_quarto` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_hotel` int NOT NULL,
  `categoria_quarto` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_quarto`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_quartos`
--

INSERT INTO `tb_quartos` (`id_quarto`, `quarto`, `tipo_quarto`, `capacidade_quarto`, `preco_quarto`, `descricao_quarto`, `foto_primeira_quarto`, `foto_segunda_quarto`, `status_quarto`, `data_criacao_quarto`, `data_atualizacao_quarto`, `id_hotel`, `categoria_quarto`) VALUES
(1, '31', 'Normal', 30, '200.00', 'Testando', 'avatar.jpg', 'avatar.jpg', 'Reservado', '2023-04-13 14:35:33', '2023-04-13 14:49:02', 1, ''),
(2, '503-A', 'Vip', 4, '300.00', 'Terminando a parte do quarto para ....', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', '1663962632242.jpg', 'Reservado', '2023-05-01 12:34:39', '2023-05-01 13:19:38', 1, ''),
(3, '480-A', 'Normal', 4, '600.00', 'Testando o quarto', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', '28d11523-9921-4354-acbb-a4f5b2df2c7b.jpg', 'Reservado', '2023-05-01 12:35:21', '2023-05-01 12:57:18', 1, ''),
(4, 'A948', 'Medio', 4, '38.00', 'Labore dignissimos e', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'vlcsnap-2023-02-28-14h30m44s831.png', 'Disponível', '2023-05-20 14:12:41', '2023-05-20 14:12:41', 1, 'Casal'),
(5, 'A03828', 'Normal', 2, '340.00', 'FAFAFA', '', '', 'Disponível', '2023-05-20 16:36:30', '2023-05-20 16:36:30', 1, 'Casal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reservas`
--

DROP TABLE IF EXISTS `tb_reservas`;
CREATE TABLE IF NOT EXISTS `tb_reservas` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `id_hospede` int NOT NULL,
  `id_quarto` int NOT NULL,
  `data_checkin_reserva` date NOT NULL,
  `data_checkout_reserva` date NOT NULL,
  `num_hospedes_reserva` int NOT NULL,
  `preco_total_reserva` decimal(10,2) NOT NULL,
  `status_quarto_reserva` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comprovativo_reserva` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_reserva` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_noites` int NOT NULL,
  `hora_checkin` time NOT NULL,
  `hora_checkout` time NOT NULL,
  `total_horas` int NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_hospede` (`id_hospede`),
  KEY `id_quarto` (`id_quarto`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_reservas`
--

INSERT INTO `tb_reservas` (`id_reserva`, `id_hospede`, `id_quarto`, `data_checkin_reserva`, `data_checkout_reserva`, `num_hospedes_reserva`, `preco_total_reserva`, `status_quarto_reserva`, `comprovativo_reserva`, `data_criacao_reserva`, `data_atualizacao_reserva`, `total_noites`, `hora_checkin`, `hora_checkout`, `total_horas`) VALUES
(1, 3, 1, '2023-04-13', '2023-04-15', 3, '200.00', 'Disponível', 'avatar.jpg', '2023-04-13 14:49:02', '2023-04-25 12:12:22', 0, '00:00:00', '00:00:00', 0),
(5, 3, 3, '2023-05-02', '2023-05-03', 2, '600.00', 'Disponível', '1663962632242.jpg', '2023-05-01 13:08:53', '2023-05-01 13:08:55', 0, '00:00:00', '00:00:00', 0),
(6, 3, 2, '2023-05-02', '2023-05-03', 2, '300.00', 'Disponível', '1663962632242.jpg', '2023-05-01 13:19:38', '2023-05-01 13:19:41', 0, '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_restaurante`
--

DROP TABLE IF EXISTS `tb_restaurante`;
CREATE TABLE IF NOT EXISTS `tb_restaurante` (
  `id_restaurante` int NOT NULL AUTO_INCREMENT,
  `id_hotel` int NOT NULL,
  `nome_restaurante` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_restaurante` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `classificacao_restaurante` int NOT NULL,
  `num_mesas_restaurante` int NOT NULL,
  `data_criacao_restaurante` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao__restaurante` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_restaurante`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_restaurante`
--

INSERT INTO `tb_restaurante` (`id_restaurante`, `id_hotel`, `nome_restaurante`, `foto`, `descricao_restaurante`, `classificacao_restaurante`, `num_mesas_restaurante`, `data_criacao_restaurante`, `data_atualizacao__restaurante`) VALUES
(1, 4, 'FoodsSNIR', 'avatar.jpg', 'Teste', 5, 33, '2023-04-13 10:45:13', '2023-04-13 10:45:13'),
(4, 4, 'FoodsRestaurante', 'avatar.jpg', 'Testa', 5, 5, '2023-04-13 10:47:00', '2023-04-13 10:47:00'),
(8, 1, 'CasaFoods', '1681858299433.jpg', 'Testando Nova', 5, 5, '2023-04-13 17:19:05', '2023-04-25 09:44:28'),
(9, 1, 'fronteira-api', 'avatar.jpg', 'fafafa', 5, 5, '2023-04-15 12:04:28', '2023-04-15 12:04:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
