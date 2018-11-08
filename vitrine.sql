-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05/11/2018 às 18:11
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- Versão do PHP: 7.1.23-4+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vitrine`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos_clientes`
--

CREATE TABLE `acessos_clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `acoes_recentes`
--

CREATE TABLE `acoes_recentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `acao` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `acoes_recentes`
--

INSERT INTO `acoes_recentes` (`id`, `id_usuario`, `acao`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Inclusão de Usuário', 'usuarios/perfilusuario/2', '2018-10-29 17:37:18', '2018-10-29 17:37:18'),
(2, 1, 'Atualização de Dados de Usuário', 'usuarios/perfilusuario/2', '2018-10-29 17:37:31', '2018-10-29 17:37:31'),
(3, 1, 'Inclusão de Usuário', 'usuarios/perfilusuario/3', '2018-10-29 18:04:42', '2018-10-29 18:04:42'),
(4, 1, 'Atualização de Dados de Usuário', 'usuarios/perfilusuario/1', '2018-11-01 14:38:10', '2018-11-01 14:38:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `afazeres`
--

CREATE TABLE `afazeres` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `texto` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias_publicacoes`
--

CREATE TABLE `categorias_publicacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categorias_publicacoes`
--

INSERT INTO `categorias_publicacoes` (`id`, `id_usuario`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 1, 'Acessórios e Bijuterias', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(2, 1, 'Agência de Turismo e Câmbio', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(3, 1, 'Alimentação', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(4, 1, 'Artigos Esportivos', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(5, 1, 'Artigos para o Lar', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(6, 1, 'Bolsas e Artigos de Viagens', '2018-10-23 20:08:26', '2018-10-23 20:08:26'),
(7, 1, 'Brinquedos, Games e Hobbies', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(8, 1, 'Calçados e Sapatos', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(9, 1, 'Cama, Mesa e Banho', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(10, 1, 'Celulares e Tablets', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(11, 1, 'Cinema', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(12, 1, 'Eletrônicos e Eletrodomésticos', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(13, 1, 'Farmácia', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(14, 1, 'Flores', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(15, 1, 'Joalheria e Relojoaria', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(16, 1, 'Livraria e Papelaria', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(17, 1, 'Moda Feminina', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(18, 1, 'Moda Jovem', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(19, 1, 'Moda Masculina', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(20, 1, 'Moda Infantil', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(21, 1, 'Moda Íntima', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(22, 1, 'Moda Praia', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(23, 1, 'Naturais', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(24, 1, 'Outros Serviços', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(25, 1, 'Ótica', '2018-10-23 20:08:27', '2018-10-23 20:08:27'),
(26, 1, 'Perfumaria e Cosméticos', '2018-10-23 20:08:28', '2018-10-23 20:08:28'),
(27, 1, 'Pet Shop', '2018-10-23 20:08:28', '2018-10-23 20:08:28'),
(28, 1, 'Supermercado', '2018-10-23 20:08:28', '2018-10-23 20:08:28'),
(29, 1, 'Suplementos, Vitaminas e Produtos', '2018-10-23 20:08:28', '2018-10-23 20:08:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `classificacao_publicacao`
--

CREATE TABLE `classificacao_publicacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `curtiu` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `nome_razao_social` varchar(255) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT NULL,
  `device_id` varchar(200) DEFAULT NULL,
  `mac_address` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `cliente_online` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cnpj_block`
--

CREATE TABLE `cnpj_block` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razao_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_block` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compartilhamentos_publicacao`
--

CREATE TABLE `compartilhamentos_publicacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras_cliente`
--

CREATE TABLE `compras_cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `ativar_notificacoes` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liberacao_sup_99_spins` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liberacao_cupom_100` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liberacao_cupom_200` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liberacao_cupom_500` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edicoes_usuarios` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentativa_resgate_cupom_utilizado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentativa_cadastro_cnpj_block` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf_cnpj_mais_500_cupons` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf_cnpj_mais_2_premiacoes_dia` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom`
--

CREATE TABLE `cupom` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_participante` int(10) UNSIGNED DEFAULT NULL,
  `nota_fiscal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status_cupom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_liberacao` datetime DEFAULT NULL,
  `data_expiracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT NULL,
  `dataInicial` timestamp NULL DEFAULT NULL,
  `dataFinal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `downloads_publicacao`
--

CREATE TABLE `downloads_publicacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_destaque`
--

CREATE TABLE `imagens_destaque` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `id_destaque` int(10) UNSIGNED DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `texto` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_participantes`
--

CREATE TABLE `login_participantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_participante` int(10) UNSIGNED DEFAULT NULL,
  `cpf_cnpj` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habilitado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_loja` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `site` text,
  `piso` varchar(255) DEFAULT NULL,
  `mapa` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `lojas`
--

INSERT INTO `lojas` (`id`, `nome_loja`, `email`, `telefone`, `foto`, `site`, `piso`, `mapa`, `excluido`, `created_at`, `updated_at`) VALUES
(1, 'Morumbi Shopping', NULL, '01151894800', 'foto_perfil.png', 'http://www.morumbishopping.com.br/', 'Todos', 'foto_perfil.png', 0, NULL, NULL),
(2, 'Loja 1', NULL, '01199995555', 'foto_perfil.png', 'http://www.loja1.com.br/', 'Térreo', 'foto_perfil.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_06_000000_create_usuarios_table', 1),
(4, '2017_10_06_000001_create_participantes_table', 1),
(5, '2017_10_06_000002_create_cnpj_block_table', 1),
(6, '2017_10_06_000003_create_configuracoes_table', 1),
(7, '2017_10_06_000004_create_participantes_block_table', 1),
(8, '2017_10_06_000005_create_cupom_table', 1),
(9, '2017_10_06_000006_create_notificacoes_table', 1),
(10, '2017_10_06_000007_create_login_participantes_table', 1),
(11, '2017_10_06_000008_create_spin_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `minha_lista`
--

CREATE TABLE `minha_lista` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `ocorrencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_ocorrencia` timestamp NULL DEFAULT NULL,
  `data_visualizacao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoesapp`
--

CREATE TABLE `notificacoesapp` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_razao_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf_cnpj` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes_block`
--

CREATE TABLE `participantes_block` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `id_participante` int(10) UNSIGNED DEFAULT NULL,
  `habilitado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_bloqueio` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_planos`
--

CREATE TABLE `pedidos_planos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `id_plano` int(10) UNSIGNED DEFAULT NULL,
  `nome_plano` varchar(255) DEFAULT NULL,
  `preco_plano` varchar(255) DEFAULT NULL,
  `email_fatura` varchar(255) DEFAULT NULL,
  `forma_pgto` varchar(255) DEFAULT NULL,
  `bandeira_cartao` varchar(255) DEFAULT NULL,
  `nome_cartao` varchar(255) DEFAULT NULL,
  `numero_cartao` varchar(255) DEFAULT NULL,
  `mes_cartao` int(10) DEFAULT NULL,
  `ano_cartao` int(10) DEFAULT NULL,
  `cvv_cartao` int(10) DEFAULT NULL,
  `renovacao_auto` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pedidos_planos`
--

INSERT INTO `pedidos_planos` (`id`, `id_usuario`, `id_plano`, `nome_plano`, `preco_plano`, `email_fatura`, `forma_pgto`, `bandeira_cartao`, `nome_cartao`, `numero_cartao`, `mes_cartao`, `ano_cartao`, `cvv_cartao`, `renovacao_auto`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Lite', '200', 'unixlira@gmail.com', 'Cartao de Credito', NULL, 'Jose Roberto Lira', '4589 2254 4777 3256', 10, 25, 577, 1, '2018-10-31 14:11:03', '2018-11-01 19:58:35'),
(2, 2, 2, 'Premium', '500', 'unixlira@gmail.com', 'Boleto Bancario', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-10-31 14:15:51', '2018-11-01 19:58:35'),
(6, 2, 3, 'Pro', '1000', 'unixlira@gmail.com', 'Cartao de Credito', NULL, 'Jose Roberto Lira', '4458 5569 2525 6589', 7, 21, 757, 1, '2018-10-31 14:21:09', '2018-11-01 19:58:35'),
(7, 2, 3, 'Pro', '1000', 'unixlira@gmail.com', 'Boleto Bancario', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-10-31 14:48:57', '2018-11-01 19:58:35'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:57:59', '2018-11-01 13:57:59'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:58:01', '2018-11-01 13:58:01'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:58:05', '2018-11-01 13:58:05'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:58:14', '2018-11-01 13:58:14'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:58:21', '2018-11-01 13:58:21'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:58:35', '2018-11-01 13:58:35'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 13:59:41', '2018-11-01 13:59:41'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 14:20:26', '2018-11-01 14:20:26'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-01 14:20:40', '2018-11-01 14:20:40'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, 1, 'Lite', '200', NULL, 'Cartao de Credito', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-11-05 12:39:54', '2018-11-05 16:30:37'),
(54, 1, 3, 'Pro', '1000', NULL, 'Boleto Bancario', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-11-05 13:21:13', '2018-11-05 16:30:37'),
(55, 1, 3, 'Pro', '1000', NULL, 'Boleto Bancario', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-11-05 14:03:43', '2018-11-05 16:30:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `preco` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `planos`
--

INSERT INTO `planos` (`id`, `id_usuario`, `nome`, `preco`, `imagem`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Lite', '200', 'assets/img/pagamentos/lite.png', '2018-10-29 13:11:20', '2018-10-29 13:11:20'),
(2, NULL, 'Premium', '500', 'assets/img/pagamentos/premium.png', '2018-10-29 13:11:20', '2018-10-29 13:11:20'),
(3, NULL, 'Pro', '1000', 'assets/img/pagamentos/pro.png', '2018-10-29 13:11:20', '2018-10-29 13:11:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED DEFAULT NULL,
  `imagem1` varchar(200) DEFAULT NULL,
  `imagem2` varchar(200) DEFAULT NULL,
  `imagem3` varchar(200) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text,
  `referencias` varchar(255) DEFAULT NULL,
  `preco` varchar(255) DEFAULT NULL,
  `disponibilidade` int(10) UNSIGNED DEFAULT NULL,
  `link` text,
  `excluido` tinyint(1) DEFAULT NULL,
  `ordenacao` int(10) UNSIGNED DEFAULT NULL,
  `dataInicial` timestamp NULL DEFAULT NULL,
  `dataFinal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas_cliente`
--

CREATE TABLE `reservas_cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `spin`
--

CREATE TABLE `spin` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_participante` int(10) UNSIGNED DEFAULT NULL,
  `nota_fiscal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtde_spins` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `status_spin` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spins_utilizados` int(11) DEFAULT NULL,
  `saldo_spins` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_loja` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `permissao` tinyint(1) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `notas` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_loja`, `nome`, `email`, `senha`, `telefone`, `endereco`, `cidade`, `permissao`, `ativo`, `foto`, `notas`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrador', 'admin@grafite.com.br', 'MTIz', '01199994444', 'Rua X, 10', 'São Paulo', 0, '1', 'foto_perfil.png', 'Nada consta.', '2018-10-23 20:08:24', '2018-11-01 14:38:10'),
(2, 1, 'José Roberto Lira', 'joseroberto@grafite.com.br', 'MTIz', '(11)99642-6210', 'Rua Mogi Mirim, 20', 'São Paulo', 0, '1', 'foto_perfil.png', 'Suas anotações aqui...', '2018-10-29 17:37:17', '2018-10-29 17:37:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `visualizacao_publicacao`
--

CREATE TABLE `visualizacao_publicacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL,
  `id_publicacao` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `acessos_clientes`
--
ALTER TABLE `acessos_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acessos_clientes` (`id_cliente`);

--
-- Índices de tabela `acoes_recentes`
--
ALTER TABLE `acoes_recentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acao_usuario` (`id_usuario`);

--
-- Índices de tabela `afazeres`
--
ALTER TABLE `afazeres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_afazeres_usuario` (`id_usuario`);

--
-- Índices de tabela `categorias_publicacoes`
--
ALTER TABLE `categorias_publicacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias_ofertas_usuario` (`id_usuario`);

--
-- Índices de tabela `classificacao_publicacao`
--
ALTER TABLE `classificacao_publicacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_classificacao_clientes` (`id_cliente`),
  ADD KEY `fk_classificacao_publicacao` (`id_publicacao`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_clientes` (`id_usuario`);

--
-- Índices de tabela `cnpj_block`
--
ALTER TABLE `cnpj_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cnpj_usuario` (`id_usuario`);

--
-- Índices de tabela `compartilhamentos_publicacao`
--
ALTER TABLE `compartilhamentos_publicacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compartilhamentos_clientes` (`id_cliente`),
  ADD KEY `fk_compartilhamentos_publicacao` (`id_publicacao`);

--
-- Índices de tabela `compras_cliente`
--
ALTER TABLE `compras_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_cliente` (`id_cliente`),
  ADD KEY `fk_compras_publicacao` (`id_publicacao`);

--
-- Índices de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_configuracoes_usuario` (`id_usuario`);

--
-- Índices de tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cupom_participante` (`id_participante`);

--
-- Índices de tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_destaques_usuario` (`id_usuario`);

--
-- Índices de tabela `downloads_publicacao`
--
ALTER TABLE `downloads_publicacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_downloads_publicacao_cliente` (`id_cliente`),
  ADD KEY `fk_downloads_publicacao` (`id_publicacao`);

--
-- Índices de tabela `imagens_destaque`
--
ALTER TABLE `imagens_destaque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imagem_destaque` (`id_destaque`),
  ADD KEY `fk_imagem_usuario` (`id_usuario`);

--
-- Índices de tabela `login_participantes`
--
ALTER TABLE `login_participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_login_participante` (`id_participante`);

--
-- Índices de tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `minha_lista`
--
ALTER TABLE `minha_lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lista_clientes` (`id_cliente`),
  ADD KEY `fk_lista_publicacao` (`id_publicacao`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notificacoes_usuario` (`id_usuario`);

--
-- Índices de tabela `notificacoesapp`
--
ALTER TABLE `notificacoesapp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notificacoesapp_usuario` (`id_usuario`);

--
-- Índices de tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participantes_block`
--
ALTER TABLE `participantes_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_block` (`id_usuario`),
  ADD KEY `fk_participantes_block` (`id_participante`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Índices de tabela `pedidos_planos`
--
ALTER TABLE `pedidos_planos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plano` (`id_plano`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

--
-- Índices de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicacoes_usuario` (`id_usuario`),
  ADD KEY `fk_publicacoes_categoria` (`id_categoria`);

--
-- Índices de tabela `reservas_cliente`
--
ALTER TABLE `reservas_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_cliente` (`id_cliente`),
  ADD KEY `fk_reservas_publicacao` (`id_publicacao`);

--
-- Índices de tabela `spin`
--
ALTER TABLE `spin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_spin_participante` (`id_participante`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_loja` (`id_loja`);

--
-- Índices de tabela `visualizacao_publicacao`
--
ALTER TABLE `visualizacao_publicacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visualizacao_clientes` (`id_cliente`),
  ADD KEY `fk_visualizacao_publicacao` (`id_publicacao`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `acessos_clientes`
--
ALTER TABLE `acessos_clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `acoes_recentes`
--
ALTER TABLE `acoes_recentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `afazeres`
--
ALTER TABLE `afazeres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `categorias_publicacoes`
--
ALTER TABLE `categorias_publicacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de tabela `classificacao_publicacao`
--
ALTER TABLE `classificacao_publicacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cnpj_block`
--
ALTER TABLE `cnpj_block`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `compartilhamentos_publicacao`
--
ALTER TABLE `compartilhamentos_publicacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `compras_cliente`
--
ALTER TABLE `compras_cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `downloads_publicacao`
--
ALTER TABLE `downloads_publicacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `imagens_destaque`
--
ALTER TABLE `imagens_destaque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `login_participantes`
--
ALTER TABLE `login_participantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `minha_lista`
--
ALTER TABLE `minha_lista`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notificacoesapp`
--
ALTER TABLE `notificacoesapp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `participantes_block`
--
ALTER TABLE `participantes_block`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pedidos_planos`
--
ALTER TABLE `pedidos_planos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `reservas_cliente`
--
ALTER TABLE `reservas_cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `spin`
--
ALTER TABLE `spin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `visualizacao_publicacao`
--
ALTER TABLE `visualizacao_publicacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `acessos_clientes`
--
ALTER TABLE `acessos_clientes`
  ADD CONSTRAINT `fk_acessos_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `acoes_recentes`
--
ALTER TABLE `acoes_recentes`
  ADD CONSTRAINT `fk_acao_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `afazeres`
--
ALTER TABLE `afazeres`
  ADD CONSTRAINT `fk_afazeres_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `categorias_publicacoes`
--
ALTER TABLE `categorias_publicacoes`
  ADD CONSTRAINT `fk_categorias_ofertas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `classificacao_publicacao`
--
ALTER TABLE `classificacao_publicacao`
  ADD CONSTRAINT `fk_classificacao_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_classificacao_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_usuarios_clientes` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `cnpj_block`
--
ALTER TABLE `cnpj_block`
  ADD CONSTRAINT `fk_cnpj_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `compartilhamentos_publicacao`
--
ALTER TABLE `compartilhamentos_publicacao`
  ADD CONSTRAINT `fk_compartilhamentos_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_compartilhamentos_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

--
-- Restrições para tabelas `compras_cliente`
--
ALTER TABLE `compras_cliente`
  ADD CONSTRAINT `fk_compras_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_compras_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

--
-- Restrições para tabelas `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD CONSTRAINT `fk_configuracoes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `cupom`
--
ALTER TABLE `cupom`
  ADD CONSTRAINT `fk_cupom_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`);

--
-- Restrições para tabelas `destaques`
--
ALTER TABLE `destaques`
  ADD CONSTRAINT `fk_destaques_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `downloads_publicacao`
--
ALTER TABLE `downloads_publicacao`
  ADD CONSTRAINT `fk_downloads_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`),
  ADD CONSTRAINT `fk_downloads_publicacao_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `imagens_destaque`
--
ALTER TABLE `imagens_destaque`
  ADD CONSTRAINT `fk_imagem_destaque` FOREIGN KEY (`id_destaque`) REFERENCES `destaques` (`id`),
  ADD CONSTRAINT `fk_imagem_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `login_participantes`
--
ALTER TABLE `login_participantes`
  ADD CONSTRAINT `fk_login_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`);

--
-- Restrições para tabelas `minha_lista`
--
ALTER TABLE `minha_lista`
  ADD CONSTRAINT `fk_lista_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_lista_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

--
-- Restrições para tabelas `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `fk_notificacoes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `notificacoesapp`
--
ALTER TABLE `notificacoesapp`
  ADD CONSTRAINT `fk_notificacoesapp_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `participantes_block`
--
ALTER TABLE `participantes_block`
  ADD CONSTRAINT `fk_participantes_block` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`),
  ADD CONSTRAINT `fk_usuarios_block` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `pedidos_planos`
--
ALTER TABLE `pedidos_planos`
  ADD CONSTRAINT `fk_pedidos_planos` FOREIGN KEY (`id_plano`) REFERENCES `planos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `fk_planos_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `fk_publicacoes_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_publicacoes` (`id`),
  ADD CONSTRAINT `fk_publicacoes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `reservas_cliente`
--
ALTER TABLE `reservas_cliente`
  ADD CONSTRAINT `fk_reservas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reservas_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

--
-- Restrições para tabelas `spin`
--
ALTER TABLE `spin`
  ADD CONSTRAINT `fk_spin_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_loja` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id`);

--
-- Restrições para tabelas `visualizacao_publicacao`
--
ALTER TABLE `visualizacao_publicacao`
  ADD CONSTRAINT `fk_visualizacao_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_visualizacao_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
