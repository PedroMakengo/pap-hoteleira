-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Mar-2023 às 11:55
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
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'Beny João', 'beny@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'beny.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historicos`
--

DROP TABLE IF EXISTS `tb_historicos`;
CREATE TABLE IF NOT EXISTS `tb_historicos` (
  `id_historico_quarto` int NOT NULL AUTO_INCREMENT,
  `id_quarto` int NOT NULL,
  `status_quarto_historico` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_criacao_quarto_historico` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_quarto_historico` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_historico_quarto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hospedes`
--

DROP TABLE IF EXISTS `tb_hospedes`;
CREATE TABLE IF NOT EXISTS `tb_hospedes` (
  `id_hospede` int NOT NULL AUTO_INCREMENT,
  `nome_hospede` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_hospede` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_hospede` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_hospedes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genero_hospedes` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco_hospede` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade_hospede` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bi_hospede` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone_hospede` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento_hospede` date NOT NULL,
  `data_criacao_hospede` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_hospede` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hospede`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hospedes`
--

INSERT INTO `tb_hospedes` (`id_hospede`, `nome_hospede`, `email_hospede`, `senha_hospede`, `foto_hospedes`, `genero_hospedes`, `endereco_hospede`, `cidade_hospede`, `bi_hospede`, `telefone_hospede`, `data_nascimento_hospede`, `data_criacao_hospede`, `data_atualizacao_hospede`) VALUES
(1, 'Isabel Pereira', 'isabelpereirea@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'F', 'Cazenga - Hoje-ya-henda', 'Luanda', '00000', '921537021', '0000-00-00', '2023-02-08 08:32:09', '2023-03-14 11:48:33'),
(2, 'Joaquina Afonso', 'joaquinaafonso@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'F', 'Cazenga - Hoje-ya-henda', 'Luanda', '00000', '921537021', '0000-00-00', '2023-03-08 08:32:41', '2023-03-09 13:43:54'),
(3, 'Vitor Miguel', 'vitormiguel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'M', 'Cazenga - Hoje-ya-henda', 'Luanda', '00000', '921537021', '0000-00-00', '2023-03-08 08:33:02', '2023-03-09 13:43:57'),
(4, 'Afonso Kiala', 'kiala@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'M', 'Cazenga - Hoje-ya-henda', 'Luanda', '00000', '921537021', '0000-00-00', '2023-02-08 08:33:23', '2023-03-14 11:48:15'),
(9, 'António Eduardo', 'eduardo@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '', '', '', '', '', '', '0000-00-00', '2023-03-14 09:08:17', '2023-03-14 09:08:17'),
(10, 'Horacio Manuel', 'horaciomanuel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '', '', '', '', '', '', '0000-00-00', '2023-03-14 11:49:14', '2023-03-14 11:49:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hotel`
--

DROP TABLE IF EXISTS `tb_hotel`;
CREATE TABLE IF NOT EXISTS `tb_hotel` (
  `id_hotel` int NOT NULL AUTO_INCREMENT,
  `nome_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_hotel` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `nif_hotel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_hotel` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_hotel` text COLLATE utf8mb4_general_ci,
  `classificacao_hotel` int NOT NULL,
  `num_quartos_hotel` int NOT NULL,
  `servicos_hotel` text COLLATE utf8mb4_general_ci,
  `telefone_hotel` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `site_hotel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_criacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nome_hotel`, `email_hotel`, `senha_hotel`, `status_hotel`, `nif_hotel`, `endereco_hotel`, `foto_hotel`, `cidade_hotel`, `descricao_hotel`, `classificacao_hotel`, `num_quartos_hotel`, `servicos_hotel`, `telefone_hotel`, `site_hotel`, `data_criacao_hotel`, `data_atualizacao_hotel`) VALUES
(1, 'Epic Sana', 'epicsana@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '', '', '', '', '', 0, 0, '', '', '', '2023-03-08 09:05:20', '2023-03-08 17:25:08'),
(2, 'Hotel Continental', 'hotelcontinental@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '', '', '', '', '', 0, 0, '', '', '', '2023-03-08 09:05:50', '2023-03-09 13:07:11'),
(3, 'Hotel 5 Estrelas', 'hotel5estrelas@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '', '', '', '', '', 0, 0, '', '', '', '2023-02-08 09:06:14', '2023-03-14 11:47:43'),
(4, 'Hotel Alvalade', 'alvalade@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Inativo', '', '', '', '', '', 0, 0, '', '', '', '2023-03-08 09:06:45', '2023-03-09 12:59:12'),
(5, 'Continental African', 'continentalafrican@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Inativo', '00000', 'Maianga', '', 'Luanda', NULL, 0, 0, NULL, '', NULL, '2023-03-14 10:10:36', '2023-03-14 10:10:36'),
(6, 'Hotel 5', 'hotel5@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '00000', 'São Paulo', '', 'Luanda', NULL, 0, 0, NULL, '', NULL, '2023-03-14 11:55:39', '2023-03-14 11:56:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesas`
--

DROP TABLE IF EXISTS `tb_mesas`;
CREATE TABLE IF NOT EXISTS `tb_mesas` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `id_restaurante` int NOT NULL,
  `nome_mesa` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_mesa` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `preco_mesa` decimal(10,2) NOT NULL,
  `data_criacao_mesa` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao__mesa` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mesa`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesas`
--

INSERT INTO `tb_mesas` (`id_mesa`, `id_restaurante`, `nome_mesa`, `tipo_mesa`, `preco_mesa`, `data_criacao_mesa`, `data_atualizacao__mesa`) VALUES
(1, 1, 'Mesa 01', 'Vip', '10.00', '2023-03-08 11:22:22', '2023-03-08 11:22:22'),
(2, 1, 'Mesa 02', 'Vip', '10.00', '2023-03-08 11:22:42', '2023-03-08 11:22:42');

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
  `status_mesa_reserva` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `comprovativo_mesa_reserva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_mesa_reserva` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_mesa_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva_mesa`),
  KEY `id_mesa` (`id_mesa`),
  KEY `id_hospede` (`id_hospede`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesa_reservas`
--

INSERT INTO `tb_mesa_reservas` (`id_reserva_mesa`, `id_mesa`, `id_hospede`, `id_restaurante`, `data_checkin_mesa_reserva`, `status_mesa_reserva`, `comprovativo_mesa_reserva`, `data_criacao_mesa_reserva`, `data_atualizacao_mesa_reserva`) VALUES
(1, 1, 1, 1, '2023-03-08', 'Por verificar', 'comprovativo.jpg', '2023-03-08 17:47:31', '2023-03-08 17:47:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_quartos`
--

DROP TABLE IF EXISTS `tb_quartos`;
CREATE TABLE IF NOT EXISTS `tb_quartos` (
  `id_quarto` int NOT NULL AUTO_INCREMENT,
  `quarto` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_quarto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `capacidade_quarto` int NOT NULL,
  `preco_quarto` decimal(10,2) NOT NULL,
  `descricao_quarto` text COLLATE utf8mb4_general_ci,
  `foto_primeira_quarto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_segunda_quarto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_quarto` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_quarto` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_quarto` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_hotel` int NOT NULL,
  PRIMARY KEY (`id_quarto`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_quartos`
--

INSERT INTO `tb_quartos` (`id_quarto`, `quarto`, `tipo_quarto`, `capacidade_quarto`, `preco_quarto`, `descricao_quarto`, `foto_primeira_quarto`, `foto_segunda_quarto`, `status_quarto`, `data_criacao_quarto`, `data_atualizacao_quarto`, `id_hotel`) VALUES
(10, 'A11', 'Vip', 2, '140.00', 'Testando', '1663962632242.jpg', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'Disponível', '2023-03-09 13:13:34', '2023-03-09 13:13:34', 3),
(3, '03', '30x20', 40, '320.00', 'foto1.jpg', 'foto2.jpg', 'foto1.jpg', 'Reservado', '2023-03-08 10:20:39', '2023-03-09 14:00:53', 2),
(11, 'A10', 'Normal', 5, '300.00', 'Testando', '1663962632242.jpg', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'Disponível', '2023-03-09 13:14:01', '2023-03-09 13:14:01', 3),
(7, '5', 'Normal', 2, '150.00', 'Testando', '1663962632242.jpg', '1663962632242.jpg', 'Disponível', '2023-03-09 11:33:36', '2023-03-09 11:33:36', 1),
(8, '2', 'Normal', 4, '134.00', 'fafa', '1663962632242.jpg', '1663962632242.jpg', 'Disponível', '2023-03-09 11:49:39', '2023-03-09 11:49:39', 1),
(9, '4', 'Vip', 3, '555.00', 'gsgsgs', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', '1663962632242.jpg', 'Disponível', '2023-03-09 11:50:03', '2023-03-09 11:50:03', 1);

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
  `comprovativo_reserva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_reserva` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva`),
  KEY `id_hospede` (`id_hospede`),
  KEY `id_quarto` (`id_quarto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_reservas`
--

INSERT INTO `tb_reservas` (`id_reserva`, `id_hospede`, `id_quarto`, `data_checkin_reserva`, `data_checkout_reserva`, `num_hospedes_reserva`, `preco_total_reserva`, `status_quarto_reserva`, `comprovativo_reserva`, `data_criacao_reserva`, `data_atualizacao_reserva`) VALUES
(1, 1, 1, '2023-03-08', '2023-03-08', 3, '10.40', 'Inativo', 'comprovativo.jpg', '2023-03-08 17:27:41', '2023-03-08 17:27:41'),
(2, 1, 2, '2023-03-08', '2023-03-08', 3, '10.40', 'Inativo', 'comprovativo.jpg', '2023-03-08 17:28:15', '2023-03-08 17:28:15'),
(3, 1, 3, '2023-03-08', '2023-03-08', 2, '10.50', 'Por verificar', 'comprovativo.jpg', '2023-03-08 17:37:04', '2023-03-08 17:37:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_restaurante`
--

DROP TABLE IF EXISTS `tb_restaurante`;
CREATE TABLE IF NOT EXISTS `tb_restaurante` (
  `id_restaurante` int NOT NULL AUTO_INCREMENT,
  `id_hotel` int NOT NULL,
  `nome_restaurante` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_restaurante` text COLLATE utf8mb4_general_ci,
  `classificacao_restaurante` int NOT NULL,
  `num_mesas_restaurante` int NOT NULL,
  `data_criacao_restaurante` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao__restaurante` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_restaurante`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_restaurante`
--

INSERT INTO `tb_restaurante` (`id_restaurante`, `id_hotel`, `nome_restaurante`, `foto`, `descricao_restaurante`, `classificacao_restaurante`, `num_mesas_restaurante`, `data_criacao_restaurante`, `data_atualizacao__restaurante`) VALUES
(1, 1, 'Restaurante 1', '', 'Muito bom restaurante para todos que precisam de um bom espaço', 5, 10, '2023-03-08 09:23:33', '2023-03-08 09:23:33'),
(2, 1, 'Restaurante 2', '', 'Muito bom restaurante para todos que precisam de um bom espaço', 5, 10, '2023-03-08 09:24:37', '2023-03-08 09:24:37'),
(3, 2, 'Restaurante 1', '', 'Muito bom restaurante para todos que precisam de um bom espaço', 5, 10, '2023-03-08 09:24:50', '2023-03-08 09:24:50'),
(5, 3, 'Restaurante 12', '1663962632242.jpg', 'Testa', 0, 33, '2023-03-09 13:14:26', '2023-03-09 13:14:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
