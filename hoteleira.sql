-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Mar-2023 às 20:43
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
  `status_quarto_historico` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hospedes`
--

INSERT INTO `tb_hospedes` (`id_hospede`, `nome_hospede`, `email_hospede`, `senha_hospede`, `foto_hospedes`, `genero_hospedes`, `endereco_hospede`, `cidade_hospede`, `bi_hospede`, `telefone_hospede`, `data_nascimento_hospede`, `data_criacao_hospede`, `data_atualizacao_hospede`) VALUES
(1, 'Manuel Vicente', 'manuelvicente@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '', '', '', '', '', '', '0000-00-00', '2023-03-30 21:23:43', '2023-03-30 21:23:43');

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
  `descricao_hotel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `classificacao_hotel` int NOT NULL,
  `num_quartos_hotel` int NOT NULL,
  `servicos_hotel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `telefone_hotel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `site_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_criacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao_hotel` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nome_hotel`, `email_hotel`, `senha_hotel`, `status_hotel`, `nif_hotel`, `endereco_hotel`, `foto_hotel`, `cidade_hotel`, `descricao_hotel`, `classificacao_hotel`, `num_quartos_hotel`, `servicos_hotel`, `telefone_hotel`, `site_hotel`, `data_criacao_hotel`, `data_atualizacao_hotel`) VALUES
(1, 'CasaDubai', 'casadubai@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda, Maianga', '', 'Luanda', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:24:20', '2023-03-30 21:25:48'),
(2, 'MakaHotel', 'makahotel@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:28:48', '2023-03-30 21:29:42'),
(3, 'MakaLuanda', 'makaluanda@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:31:12', '2023-03-30 21:31:16');

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
  `status_mesa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_comida` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_bebidas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao_mesa` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao__mesa` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mesa`),
  KEY `id_restaurante` (`id_restaurante`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesas`
--

INSERT INTO `tb_mesas` (`id_mesa`, `id_restaurante`, `nome_mesa`, `tipo_mesa`, `preco_mesa`, `status_mesa`, `descricao_comida`, `descricao_bebidas`, `data_criacao_mesa`, `data_atualizacao__mesa`) VALUES
(1, 1, 'Mesa 001', 'Vip', '4000.00', 'Reservado', 'Feijoada, Arroz, etc', 'Fanta', '2023-03-30 21:28:01', '2023-03-30 21:42:00'),
(2, 2, 'Mesa 011', 'Vip', '4000.00', 'Disponível', 'Feijoada, Arroz, etc', 'Fanta', '2023-03-30 21:30:28', '2023-03-30 21:30:28'),
(3, 3, 'Mesa 111', 'Normal', '4000.00', 'Disponível', 'Feijoada, Arroz, etc', 'Fanta', '2023-03-30 21:32:19', '2023-03-30 21:32:19');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesa_reservas`
--

INSERT INTO `tb_mesa_reservas` (`id_reserva_mesa`, `id_mesa`, `id_hospede`, `id_restaurante`, `data_checkin_mesa_reserva`, `status_mesa_reserva`, `comprovativo_mesa_reserva`, `data_criacao_mesa_reserva`, `data_atualizacao_mesa_reserva`) VALUES
(1, 1, 1, 1, '2023-04-01', 'Reservado', '1663962632242.jpg', '2023-03-30 21:42:00', '2023-03-30 21:42:00');

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
  PRIMARY KEY (`id_quarto`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  PRIMARY KEY (`id_reserva`),
  KEY `id_hospede` (`id_hospede`),
  KEY `id_quarto` (`id_quarto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_restaurante`
--

INSERT INTO `tb_restaurante` (`id_restaurante`, `id_hotel`, `nome_restaurante`, `foto`, `descricao_restaurante`, `classificacao_restaurante`, `num_mesas_restaurante`, `data_criacao_restaurante`, `data_atualizacao__restaurante`) VALUES
(1, 1, 'Comer Cuia', '1663962632242.jpg', 'Teste', 5, 33, '2023-03-30 21:26:14', '2023-03-30 21:27:46'),
(2, 2, 'MakaComidas', '1663962632242.jpg', 'Teste', 5, 33, '2023-03-30 21:30:12', '2023-03-30 21:30:12'),
(3, 3, 'FoodsMaka', '1663962632242.jpg', 'Teste', 5, 5, '2023-03-30 21:31:49', '2023-03-30 21:31:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
