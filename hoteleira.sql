-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2023 às 13:53
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

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

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `tb_cardapios` (
  `id_cardapio` int(11) NOT NULL,
  `id_restaurante` int(11) DEFAULT NULL,
  `foto_um` varchar(500) DEFAULT NULL,
  `foto_dois` varchar(500) DEFAULT NULL,
  `foto_tres` varchar(500) DEFAULT NULL,
  `data_registro_cardapio` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_cardapios`
--

INSERT INTO `tb_cardapios` (`id_cardapio`, `id_restaurante`, `foto_um`, `foto_dois`, `foto_tres`, `data_registro_cardapio`) VALUES
(2, 8, 'WhatsApp Image 2023-05-24 at 10.25.29.jpeg', 'WhatsApp Image 2023-05-24 at 10.25.29.jpeg', 'WhatsApp Image 2023-05-24 at 10.25.29.jpeg', '2023-05-24 23:22:54'),
(3, 9, '1681858299433.jpg', '1663962632242.jpg', 'Captura da Web_24-11-2022_181641_meet.google.com.jpeg', '2023-05-25 14:27:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `data_registro_comentario` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_reserva`
--

CREATE TABLE `tb_historico_reserva` (
  `id_historico` int(11) NOT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `usuario_historico` varchar(50) DEFAULT NULL,
  `action_historico` varchar(50) DEFAULT NULL,
  `historico` varchar(500) DEFAULT NULL,
  `data_historico` datetime DEFAULT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_historico_reserva`
--

INSERT INTO `tb_historico_reserva` (`id_historico`, `id_hotel`, `usuario_historico`, `action_historico`, `historico`, `data_historico`, `id_reserva`, `id_quarto`) VALUES
(1, 1, 'Paulo Manuel', 'reservou', 'Paulo Manuel reservou um quarto referência A03938', '2023-05-25 17:02:00', 1, 6),
(2, 1, 'Paulo Manuel', 'reservou', 'Paulo Manuel reservou um quarto referência A03938', '2023-05-25 17:02:35', 2, 6),
(3, 1, 'Manuel dos Santos', 'reservou', 'Manuel dos Santos reservou um quarto referência 480-A', '2023-05-25 17:45:44', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hospedes`
--

CREATE TABLE `tb_hospedes` (
  `id_hospede` int(11) NOT NULL,
  `nome_hospede` varchar(255) NOT NULL,
  `email_hospede` varchar(255) NOT NULL,
  `senha_hospede` varchar(255) NOT NULL,
  `foto_hospedes` varchar(255) NOT NULL,
  `genero_hospedes` varchar(25) NOT NULL,
  `endereco_hospede` varchar(255) NOT NULL,
  `cidade_hospede` varchar(255) NOT NULL,
  `bi_hospede` varchar(15) NOT NULL,
  `telefone_hospede` varchar(20) NOT NULL,
  `data_nascimento_hospede` date NOT NULL,
  `data_criacao_hospede` datetime DEFAULT current_timestamp(),
  `data_atualizacao_hospede` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hospedes`
--

INSERT INTO `tb_hospedes` (`id_hospede`, `nome_hospede`, `email_hospede`, `senha_hospede`, `foto_hospedes`, `genero_hospedes`, `endereco_hospede`, `cidade_hospede`, `bi_hospede`, `telefone_hospede`, `data_nascimento_hospede`, `data_criacao_hospede`, `data_atualizacao_hospede`) VALUES
(3, 'Manuel dos Santos', 'manueldossantos@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'M', 'Luanda, Maianga', 'Luanda, São Paulo', '0111111111111', '930018123732', '1999-01-02', '2023-04-13 14:36:24', '2023-05-20 16:40:21'),
(2, 'Flavio António', 'flavioantonio@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar.jpg', 'M', 'Luanda, Maianga', 'Luanda, São Paulo', '0111111111111', '+244921538972', '1999-01-01', '2023-04-13 12:48:07', '2023-04-13 12:48:07'),
(4, 'Eduardo Domingos', 'eduardodomingos@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', '', '', '', '', '', '', '0000-00-00', '2023-05-25 11:54:31', '2023-05-25 11:54:31'),
(5, 'Paulo Manuel', 'paulomanuel@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', '1af5d65e-b8cc-474e-b497-296be2aff42f.jpg', 'M', 'Cazenga', 'Luanda', '111111111111111', '92520039', '0000-00-00', '2023-05-25 13:28:35', '2023-05-25 17:05:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id_hotel` int(11) NOT NULL,
  `nome_hotel` varchar(255) NOT NULL,
  `email_hotel` varchar(255) NOT NULL,
  `senha_hotel` varchar(255) NOT NULL,
  `status_hotel` varchar(25) NOT NULL,
  `nif_hotel` varchar(20) NOT NULL,
  `endereco_hotel` varchar(255) NOT NULL,
  `foto_hotel` varchar(225) NOT NULL,
  `cidade_hotel` varchar(255) NOT NULL,
  `iban` varchar(20) NOT NULL,
  `descricao_hotel` text DEFAULT NULL,
  `classificacao_hotel` int(11) NOT NULL,
  `num_quartos_hotel` int(11) NOT NULL,
  `servicos_hotel` text DEFAULT NULL,
  `telefone_hotel` varchar(20) NOT NULL,
  `site_hotel` varchar(255) DEFAULT NULL,
  `data_criacao_hotel` datetime DEFAULT current_timestamp(),
  `data_atualizacao_hotel` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nome_hotel`, `email_hotel`, `senha_hotel`, `status_hotel`, `nif_hotel`, `endereco_hotel`, `foto_hotel`, `cidade_hotel`, `iban`, `descricao_hotel`, `classificacao_hotel`, `num_quartos_hotel`, `servicos_hotel`, `telefone_hotel`, `site_hotel`, `data_criacao_hotel`, `data_atualizacao_hotel`, `id_admin`) VALUES
(1, 'CasaDubai', 'casadubai@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda, Maianga', '1681858299433.jpg', 'Luanda', '', 'Testando333', 5, 5, 'Hotelaria, Restaurante', '90000', 'https://epicsana.gov', '2023-03-30 21:24:20', '2023-05-25 14:38:26', 1),
(2, 'MakaHotel', 'makahotel@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:28:48', '2023-05-25 14:38:29', 1),
(3, 'MakaLuanda', 'makaluanda@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Ativo', '0012102000', 'Luanda', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-03-30 21:31:12', '2023-05-25 14:38:32', 1),
(4, 'Hotel SNIR', 'hotelsnir@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '0012102000', 'Luanda, Maianga', '', 'Luanda', '', NULL, 0, 0, NULL, '', NULL, '2023-04-13 10:42:01', '2023-05-25 14:38:34', 1),
(5, 'Hotel Luanda', 'hotelluanda@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Ativo', '0012102000', 'Luanda, Maianga', '', 'Luanda, São Paulo', '', NULL, 0, 0, NULL, '', NULL, '2023-04-13 10:42:18', '2023-05-25 14:38:37', 1),
(13, 'Vance Garcia', 'tuqekyzaze@mailinator.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Inativo', 'Troy Lara', 'Rerum accusamus omni', '', 'Aspen Hinton', '0000000000000000', NULL, 0, 0, NULL, '', NULL, '2023-05-20 13:53:21', '2023-05-25 14:38:39', 1),
(14, 'AngoHotel', 'angohotel@gmail.com', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Inativo', '1111111111111111', 'Luanda, Cazenga', '', 'Luanda', '11111111111111111111', NULL, 0, 0, NULL, '', NULL, '2023-05-25 14:53:48', '2023-05-25 14:53:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id_log` int(11) NOT NULL,
  `user_log` varchar(100) DEFAULT NULL,
  `action_log` varchar(100) DEFAULT NULL,
  `text_log` text DEFAULT NULL,
  `data_log` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 'Beny João', 'atualizou', 'O usuário Beny João atualizou o seu perfil', '2023-05-20 15:40:44'),
(11, 'CasaDubai', 'registrou', 'O usuário CasaDubai registrou um cardapio', '2023-05-25 00:22:54'),
(12, 'Paulo Manuel', 'registrou', 'O usuário Paulo Manuel registrou fez um comentário ', '2023-05-25 00:00:00'),
(13, 'Paulo Manuel', 'editou', 'O usuário Paulo Manuel editou comentário ', '2023-05-25 00:00:00'),
(14, 'Paulo Manuel', 'editou', 'O usuário Paulo Manuel editou comentário ', '2023-05-25 00:00:00'),
(15, 'Paulo Manuel', 'editou', 'O usuário Paulo Manuel editou comentário ', '2023-05-25 00:00:00'),
(16, 'Paulo Manuel', 'editou', 'O usuário Paulo Manuel editou comentário ', '2023-05-25 00:00:00'),
(17, 'Paulo Manuel', 'editou', 'O usuário Paulo Manuel editou comentário ', '2023-05-25 00:00:00'),
(18, 'CasaDubai', 'registrou', 'O usuário CasaDubai registrou um cardapio', '2023-05-25 15:27:15'),
(19, 'CasaDubai', 'registrou', 'O usuário CasaDubai registrou um quarto cujo o nome é A03938', '2023-05-25 00:00:00'),
(20, 'Paulo Manuel', 'atualizou', 'O usuário Paulo Manuel atualizou o seu perfil', '2023-05-25 18:05:52'),
(21, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:19', '2023-05-25 18:38:19'),
(22, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:28', '2023-05-25 18:38:28'),
(23, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:29', '2023-05-25 18:38:29'),
(24, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:31', '2023-05-25 18:38:31'),
(25, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:36', '2023-05-25 18:38:36'),
(26, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:41', '2023-05-25 18:38:41'),
(27, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:45', '2023-05-25 18:38:45'),
(28, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:51', '2023-05-25 18:38:51'),
(29, 'CasaDubai', 'eliminou', 'O usuário CasaDubai eliminou um log em2023-05-25 18:38:55', '2023-05-25 18:38:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesas`
--

CREATE TABLE `tb_mesas` (
  `id_mesa` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `nome_mesa` varchar(25) NOT NULL,
  `tipo_mesa` varchar(25) NOT NULL,
  `preco_mesa` decimal(10,2) NOT NULL,
  `status_mesa` varchar(50) NOT NULL,
  `descricao_mesa` varchar(255) NOT NULL,
  `data_criacao_mesa` datetime DEFAULT current_timestamp(),
  `data_atualizacao__mesa` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesas`
--

INSERT INTO `tb_mesas` (`id_mesa`, `id_restaurante`, `nome_mesa`, `tipo_mesa`, `preco_mesa`, `status_mesa`, `descricao_mesa`, `data_criacao_mesa`, `data_atualizacao__mesa`) VALUES
(1, 1, '0001', 'Vip', '4000.00', 'Reservado', '', '2023-04-13 10:45:26', '2023-05-25 15:04:16'),
(2, 6, '0005', 'Vip', '4000.00', 'Disponível', '', '2023-04-13 10:48:11', '2023-04-13 10:48:11'),
(3, 8, '00001', 'Normal', '3000.00', 'Ocupado', '', '2023-04-13 17:50:40', '2023-04-24 21:55:31'),
(4, 8, 'Et deserunt consequa', 'Vip', '400.00', 'Disponível', 'Aut esse et vitae i', '2023-05-20 14:16:54', '2023-05-20 14:16:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesa_reservas`
--

CREATE TABLE `tb_mesa_reservas` (
  `id_reserva_mesa` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_hospede` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `data_checkin_mesa_reserva` date NOT NULL,
  `status_mesa_reserva` varchar(20) NOT NULL,
  `comprovativo_mesa_reserva` varchar(255) NOT NULL,
  `data_criacao_mesa_reserva` datetime DEFAULT current_timestamp(),
  `data_atualizacao_mesa_reserva` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mesa_reservas`
--

INSERT INTO `tb_mesa_reservas` (`id_reserva_mesa`, `id_mesa`, `id_hospede`, `id_restaurante`, `data_checkin_mesa_reserva`, `status_mesa_reserva`, `comprovativo_mesa_reserva`, `data_criacao_mesa_reserva`, `data_atualizacao_mesa_reserva`) VALUES
(1, 1, 5, 1, '2023-05-30', 'Reservado', '1af5d65e-b8cc-474e-b497-296be2aff42f.jpg', '2023-05-25 15:04:16', '2023-05-25 15:04:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_quartos`
--

CREATE TABLE `tb_quartos` (
  `id_quarto` int(11) NOT NULL,
  `quarto` varchar(25) NOT NULL,
  `tipo_quarto` varchar(50) NOT NULL,
  `capacidade_quarto` int(11) NOT NULL,
  `preco_quarto` decimal(10,2) NOT NULL,
  `descricao_quarto` text DEFAULT NULL,
  `foto_primeira_quarto` varchar(255) NOT NULL,
  `foto_segunda_quarto` varchar(255) NOT NULL,
  `status_quarto` varchar(20) NOT NULL,
  `data_criacao_quarto` datetime DEFAULT current_timestamp(),
  `data_atualizacao_quarto` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_hotel` int(11) NOT NULL,
  `categoria_quarto` varchar(25) NOT NULL,
  `preco_hora` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_quartos`
--

INSERT INTO `tb_quartos` (`id_quarto`, `quarto`, `tipo_quarto`, `capacidade_quarto`, `preco_quarto`, `descricao_quarto`, `foto_primeira_quarto`, `foto_segunda_quarto`, `status_quarto`, `data_criacao_quarto`, `data_atualizacao_quarto`, `id_hotel`, `categoria_quarto`, `preco_hora`) VALUES
(1, '31', 'Normal', 30, '200.00', 'Testando', 'avatar.jpg', 'avatar.jpg', 'Reservado', '2023-04-13 14:35:33', '2023-05-25 15:39:11', 1, 'Casal', 0),
(2, '503-A', 'Vip', 4, '300.00', 'Terminando a parte do quarto para ....', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', '1663962632242.jpg', 'Reservado', '2023-05-01 12:34:39', '2023-05-25 15:39:14', 1, 'Casal', 0),
(3, '480-A', 'Normal', 4, '600.00', 'Testando o quarto', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', '28d11523-9921-4354-acbb-a4f5b2df2c7b.jpg', 'Reservado', '2023-05-01 12:35:21', '2023-05-25 15:39:17', 1, 'Casal', 0),
(4, 'A948', 'Medio', 4, '38.00', 'Labore dignissimos e', '63437fda-4abc-4d2b-be1d-8378476b5bd9.jpg', 'vlcsnap-2023-02-28-14h30m44s831.png', 'Reservado', '2023-05-20 14:12:41', '2023-05-21 23:42:58', 1, 'Casal', 0),
(5, 'A03828', 'Normal', 2, '340.00', 'FAFAFA', '', '', 'Reservado', '2023-05-20 16:36:30', '2023-05-21 23:45:45', 1, 'Casal', 0),
(6, 'A03938', '', 3, '16000.00', 'Teste fafa', '1af5d65e-b8cc-474e-b497-296be2aff42f.jpg', 'insignia.png', 'Reservado', '2023-05-25 16:44:05', '2023-05-25 17:02:00', 1, 'Solteiro', 3000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reservas`
--

CREATE TABLE `tb_reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_hospede` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `data_checkin_reserva` date NOT NULL,
  `data_checkout_reserva` date NOT NULL,
  `num_hospedes_reserva` int(11) NOT NULL,
  `preco_total_reserva` decimal(10,2) NOT NULL,
  `status_quarto_reserva` varchar(20) NOT NULL,
  `comprovativo_reserva` varchar(255) NOT NULL,
  `data_criacao_reserva` datetime DEFAULT current_timestamp(),
  `data_atualizacao_reserva` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_noites` int(11) NOT NULL,
  `hora_checkin` time NOT NULL,
  `hora_checkout` time NOT NULL,
  `total_horas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_reservas`
--

INSERT INTO `tb_reservas` (`id_reserva`, `id_hospede`, `id_quarto`, `data_checkin_reserva`, `data_checkout_reserva`, `num_hospedes_reserva`, `preco_total_reserva`, `status_quarto_reserva`, `comprovativo_reserva`, `data_criacao_reserva`, `data_atualizacao_reserva`, `total_noites`, `hora_checkin`, `hora_checkout`, `total_horas`) VALUES
(1, 5, 6, '2023-05-25', '2023-05-28', 3, '16000.00', 'Reservado', 'insignia.png', '2023-05-25 17:02:00', '2023-05-27 12:45:43', 3, '00:00:00', '00:00:00', 0),
(2, 5, 6, '0000-00-00', '0000-00-00', 2, '16000.00', 'Por verificar', 'insignia.png', '2023-05-25 17:02:35', '2023-05-25 17:51:54', 0, '15:20:00', '18:20:00', 3),
(3, 3, 3, '2023-06-20', '2023-06-25', 2, '600.00', 'Por verificar', 'da9e7fa8-3097-4df3-af6e-c0efc9799ed8.jpg', '2023-05-25 17:45:44', '2023-05-25 17:45:44', 5, '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_restaurante`
--

CREATE TABLE `tb_restaurante` (
  `id_restaurante` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `nome_restaurante` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `descricao_restaurante` text DEFAULT NULL,
  `classificacao_restaurante` int(11) NOT NULL,
  `num_mesas_restaurante` int(11) NOT NULL,
  `data_criacao_restaurante` datetime DEFAULT current_timestamp(),
  `data_atualizacao__restaurante` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_restaurante`
--

INSERT INTO `tb_restaurante` (`id_restaurante`, `id_hotel`, `nome_restaurante`, `foto`, `descricao_restaurante`, `classificacao_restaurante`, `num_mesas_restaurante`, `data_criacao_restaurante`, `data_atualizacao__restaurante`) VALUES
(1, 4, 'FoodsSNIR', 'avatar.jpg', 'Teste', 5, 33, '2023-04-13 10:45:13', '2023-04-13 10:45:13'),
(4, 4, 'FoodsRestaurante', 'avatar.jpg', 'Testa', 5, 5, '2023-04-13 10:47:00', '2023-04-13 10:47:00'),
(8, 1, 'CasaFoods', '1681858299433.jpg', 'Testando Nova', 5, 5, '2023-04-13 17:19:05', '2023-04-25 09:44:28'),
(9, 1, 'fronteira-api', 'avatar.jpg', 'fafafa', 5, 5, '2023-04-15 12:04:28', '2023-04-15 12:04:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `tb_cardapios`
--
ALTER TABLE `tb_cardapios`
  ADD PRIMARY KEY (`id_cardapio`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Índices para tabela `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Índices para tabela `tb_historico_reserva`
--
ALTER TABLE `tb_historico_reserva`
  ADD PRIMARY KEY (`id_historico`);

--
-- Índices para tabela `tb_hospedes`
--
ALTER TABLE `tb_hospedes`
  ADD PRIMARY KEY (`id_hospede`);

--
-- Índices para tabela `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- Índices para tabela `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices para tabela `tb_mesas`
--
ALTER TABLE `tb_mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Índices para tabela `tb_mesa_reservas`
--
ALTER TABLE `tb_mesa_reservas`
  ADD PRIMARY KEY (`id_reserva_mesa`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_hospede` (`id_hospede`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Índices para tabela `tb_quartos`
--
ALTER TABLE `tb_quartos`
  ADD PRIMARY KEY (`id_quarto`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Índices para tabela `tb_reservas`
--
ALTER TABLE `tb_reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_hospede` (`id_hospede`),
  ADD KEY `id_quarto` (`id_quarto`);

--
-- Índices para tabela `tb_restaurante`
--
ALTER TABLE `tb_restaurante`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_cardapios`
--
ALTER TABLE `tb_cardapios`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_historico_reserva`
--
ALTER TABLE `tb_historico_reserva`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_hospedes`
--
ALTER TABLE `tb_hospedes`
  MODIFY `id_hospede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_mesas`
--
ALTER TABLE `tb_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_mesa_reservas`
--
ALTER TABLE `tb_mesa_reservas`
  MODIFY `id_reserva_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_quartos`
--
ALTER TABLE `tb_quartos`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_reservas`
--
ALTER TABLE `tb_reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_restaurante`
--
ALTER TABLE `tb_restaurante`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
