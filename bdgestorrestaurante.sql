-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Nov-2020 às 19:36
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdgestorrestaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('gerente', '1', 1604602718);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('AcederInterfaceAtendedorPedidos', 2, 'Acesso Interface AtendedorPedidos', NULL, NULL, 1604602718, 1604602718),
('AcederInterfaceCliente', 2, 'Acesso Interface Cliente', NULL, NULL, 1604602718, 1604602718),
('AcederInterfaceCozinheiro', 2, 'Acesso Interface Cozinheiro', NULL, NULL, 1604602718, 1604602718),
('AcederInterfaceEmpregadoMesa', 2, 'Acesso Interface EmpregadoMesa', NULL, NULL, 1604602718, 1604602718),
('AcederInterfaceGerente', 2, 'Acesso Interface Gerente', NULL, NULL, 1604602718, 1604602718),
('apagarCargos', 2, 'Apagar cargos', NULL, NULL, 1604602718, 1604602718),
('apagarCategoriaProdutos', 2, 'Apagar Categoria Produtos', NULL, NULL, 1604602718, 1604602718),
('apagarFaltas', 2, 'Apagar faltas', NULL, NULL, 1604602718, 1604602718),
('apagarFaturas', 2, 'Apagar faturas', NULL, NULL, 1604602718, 1604602718),
('apagarHorarios', 2, 'Apagar horarios', NULL, NULL, 1604602718, 1604602718),
('apagarMesas', 2, 'Apagar Mesas', NULL, NULL, 1604602718, 1604602718),
('apagarPedidoProduto', 2, 'Apagar Pedido Produto', NULL, NULL, 1604602718, 1604602718),
('apagarPedidos', 2, 'Apagar pedidos', NULL, NULL, 1604602718, 1604602718),
('apagarPerfis', 2, 'Apagar perfis', NULL, NULL, 1604602718, 1604602718),
('apagarProdutoCategoriaProduto', 2, 'Apagar Produto Categoria Produto', NULL, NULL, 1604602718, 1604602718),
('apagarProdutos', 2, 'Apagar Produtos', NULL, NULL, 1604602718, 1604602718),
('apagarReservas', 2, 'Apagar Reservas', NULL, NULL, 1604602718, 1604602718),
('apagarUtilizadores', 2, 'Apagar utilizadores', NULL, NULL, 1604602718, 1604602718),
('atendedorPedidos', 1, NULL, NULL, NULL, 1604602718, 1604602718),
('atualizarCargos', 2, 'Atualizar cargos', NULL, NULL, 1604602718, 1604602718),
('atualizarCategoriaProdutos', 2, 'Atualizar Categoria Produtos', NULL, NULL, 1604602718, 1604602718),
('atualizarFaltas', 2, 'Atualizar faltas', NULL, NULL, 1604602718, 1604602718),
('atualizarFaturas', 2, 'Atualizar faturas', NULL, NULL, 1604602718, 1604602718),
('atualizarHorarios', 2, 'Atualizar horarios', NULL, NULL, 1604602718, 1604602718),
('atualizarMesas', 2, 'Atualizar Mesas', NULL, NULL, 1604602718, 1604602718),
('atualizarPedidoProduto', 2, 'Atualizar Pedido Produto', NULL, NULL, 1604602718, 1604602718),
('atualizarPedidos', 2, 'Atualizar pedidos', NULL, NULL, 1604602718, 1604602718),
('atualizarPerfis', 2, 'Atualizar perfis', NULL, NULL, 1604602718, 1604602718),
('atualizarProdutoCategoriaProduto', 2, 'Atualizar Produto Categoria Produto', NULL, NULL, 1604602718, 1604602718),
('atualizarProdutos', 2, 'Atualizar Produtos', NULL, NULL, 1604602718, 1604602718),
('atualizarReservas', 2, 'Atualizar Reservas', NULL, NULL, 1604602718, 1604602718),
('atualizarUtilizadores', 2, 'Atualizar utilizadores', NULL, NULL, 1604602718, 1604602718),
('cliente', 1, NULL, NULL, NULL, 1604602718, 1604602718),
('consultarCargos', 2, 'Consultar cargos', NULL, NULL, 1604602718, 1604602718),
('consultarCategoriaProdutos', 2, 'Consultar Categoria Produtos', NULL, NULL, 1604602718, 1604602718),
('consultarFaltas', 2, 'Consultar faltas', NULL, NULL, 1604602718, 1604602718),
('consultarFaturas', 2, 'Consultar Faturas', NULL, NULL, 1604602718, 1604602718),
('consultarHorarios', 2, 'Consultar horarios', NULL, NULL, 1604602718, 1604602718),
('consultarMesas', 2, 'Consultar Mesas', NULL, NULL, 1604602718, 1604602718),
('consultarPedidoProduto', 2, 'Consultar Pedido Produto', NULL, NULL, 1604602718, 1604602718),
('consultarPedidos', 2, 'Consultar pedidos', NULL, NULL, 1604602718, 1604602718),
('consultarPerfis', 2, 'Consultar perfis', NULL, NULL, 1604602718, 1604602718),
('consultarProdutoCategoriaProduto', 2, 'Consultar Produto Categoria Produto', NULL, NULL, 1604602718, 1604602718),
('consultarProdutos', 2, 'Consultar Produtos', NULL, NULL, 1604602718, 1604602718),
('consultarReservas', 2, 'Consultar Reservas', NULL, NULL, 1604602718, 1604602718),
('consultarUtilizadores', 2, 'Consultar utilizadores', NULL, NULL, 1604602718, 1604602718),
('cozinheiro', 1, NULL, NULL, NULL, 1604602718, 1604602718),
('criarCargos', 2, 'Criar cargos', NULL, NULL, 1604602718, 1604602718),
('criarCategoriaProdutos', 2, 'Criar Categoria Produtos', NULL, NULL, 1604602718, 1604602718),
('criarFaltas', 2, 'Criar faltas', NULL, NULL, 1604602718, 1604602718),
('criarFaturas', 2, 'Criar faturas', NULL, NULL, 1604602718, 1604602718),
('criarHorarios', 2, 'Criar horarios', NULL, NULL, 1604602718, 1604602718),
('criarMesas', 2, 'Criar Mesas', NULL, NULL, 1604602718, 1604602718),
('criarPedidoProduto', 2, 'Criar Pedido Produto', NULL, NULL, 1604602718, 1604602718),
('criarPedidos', 2, 'Criar pedidos', NULL, NULL, 1604602718, 1604602718),
('criarPerfis', 2, 'Criar perfis', NULL, NULL, 1604602718, 1604602718),
('criarProdutoCategoriaProduto', 2, 'Criar Produto Categoria Produto', NULL, NULL, 1604602718, 1604602718),
('criarProdutos', 2, 'Criar Produtos', NULL, NULL, 1604602718, 1604602718),
('criarReservas', 2, 'Criar Reservas', NULL, NULL, 1604602718, 1604602718),
('criarUtilizadores', 2, 'Criar utilizadores', NULL, NULL, 1604602718, 1604602718),
('empregadoMesa', 1, NULL, NULL, NULL, 1604602718, 1604602718),
('gerente', 1, NULL, NULL, NULL, 1604602718, 1604602718);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('atendedorPedidos', 'AcederInterfaceAtendedorPedidos'),
('cliente', 'AcederInterfaceCliente'),
('cozinheiro', 'AcederInterfaceCozinheiro'),
('empregadoMesa', 'AcederInterfaceEmpregadoMesa'),
('gerente', 'AcederInterfaceGerente'),
('gerente', 'apagarCargos'),
('cozinheiro', 'apagarCategoriaProdutos'),
('gerente', 'apagarCategoriaProdutos'),
('gerente', 'apagarFaltas'),
('atendedorPedidos', 'apagarFaturas'),
('empregadoMesa', 'apagarFaturas'),
('gerente', 'apagarFaturas'),
('gerente', 'apagarHorarios'),
('gerente', 'apagarMesas'),
('atendedorPedidos', 'apagarPedidoProduto'),
('empregadoMesa', 'apagarPedidoProduto'),
('gerente', 'apagarPedidoProduto'),
('atendedorPedidos', 'apagarPedidos'),
('cliente', 'apagarPedidos'),
('empregadoMesa', 'apagarPedidos'),
('gerente', 'apagarPedidos'),
('gerente', 'apagarPerfis'),
('cozinheiro', 'apagarProdutoCategoriaProduto'),
('gerente', 'apagarProdutoCategoriaProduto'),
('cozinheiro', 'apagarProdutos'),
('gerente', 'apagarProdutos'),
('atendedorPedidos', 'apagarReservas'),
('empregadoMesa', 'apagarReservas'),
('gerente', 'apagarUtilizadores'),
('gerente', 'atualizarCargos'),
('cozinheiro', 'atualizarCategoriaProdutos'),
('gerente', 'atualizarCategoriaProdutos'),
('gerente', 'atualizarFaltas'),
('atendedorPedidos', 'atualizarFaturas'),
('empregadoMesa', 'atualizarFaturas'),
('gerente', 'atualizarFaturas'),
('gerente', 'atualizarHorarios'),
('gerente', 'atualizarMesas'),
('atendedorPedidos', 'atualizarPedidoProduto'),
('empregadoMesa', 'atualizarPedidoProduto'),
('gerente', 'atualizarPedidoProduto'),
('atendedorPedidos', 'atualizarPedidos'),
('cliente', 'atualizarPedidos'),
('empregadoMesa', 'atualizarPedidos'),
('gerente', 'atualizarPedidos'),
('atendedorPedidos', 'atualizarPerfis'),
('cliente', 'atualizarPerfis'),
('cozinheiro', 'atualizarPerfis'),
('empregadoMesa', 'atualizarPerfis'),
('gerente', 'atualizarPerfis'),
('cozinheiro', 'atualizarProdutoCategoriaProduto'),
('gerente', 'atualizarProdutoCategoriaProduto'),
('cozinheiro', 'atualizarProdutos'),
('gerente', 'atualizarProdutos'),
('atendedorPedidos', 'atualizarReservas'),
('empregadoMesa', 'atualizarReservas'),
('gerente', 'atualizarUtilizadores'),
('gerente', 'consultarCargos'),
('cozinheiro', 'consultarCategoriaProdutos'),
('gerente', 'consultarCategoriaProdutos'),
('atendedorPedidos', 'consultarFaltas'),
('cozinheiro', 'consultarFaltas'),
('empregadoMesa', 'consultarFaltas'),
('gerente', 'consultarFaltas'),
('atendedorPedidos', 'consultarFaturas'),
('empregadoMesa', 'consultarFaturas'),
('gerente', 'consultarFaturas'),
('atendedorPedidos', 'consultarHorarios'),
('cozinheiro', 'consultarHorarios'),
('empregadoMesa', 'consultarHorarios'),
('gerente', 'consultarHorarios'),
('atendedorPedidos', 'consultarMesas'),
('empregadoMesa', 'consultarMesas'),
('gerente', 'consultarMesas'),
('atendedorPedidos', 'consultarPedidoProduto'),
('empregadoMesa', 'consultarPedidoProduto'),
('gerente', 'consultarPedidoProduto'),
('atendedorPedidos', 'consultarPedidos'),
('cliente', 'consultarPedidos'),
('empregadoMesa', 'consultarPedidos'),
('gerente', 'consultarPedidos'),
('atendedorPedidos', 'consultarPerfis'),
('cliente', 'consultarPerfis'),
('cozinheiro', 'consultarPerfis'),
('empregadoMesa', 'consultarPerfis'),
('gerente', 'consultarPerfis'),
('cozinheiro', 'consultarProdutoCategoriaProduto'),
('gerente', 'consultarProdutoCategoriaProduto'),
('atendedorPedidos', 'consultarProdutos'),
('cliente', 'consultarProdutos'),
('cozinheiro', 'consultarProdutos'),
('empregadoMesa', 'consultarProdutos'),
('gerente', 'consultarProdutos'),
('atendedorPedidos', 'consultarReservas'),
('empregadoMesa', 'consultarReservas'),
('gerente', 'consultarUtilizadores'),
('gerente', 'criarCargos'),
('cozinheiro', 'criarCategoriaProdutos'),
('gerente', 'criarCategoriaProdutos'),
('gerente', 'criarFaltas'),
('atendedorPedidos', 'criarFaturas'),
('empregadoMesa', 'criarFaturas'),
('gerente', 'criarFaturas'),
('gerente', 'criarHorarios'),
('gerente', 'criarMesas'),
('atendedorPedidos', 'criarPedidoProduto'),
('empregadoMesa', 'criarPedidoProduto'),
('gerente', 'criarPedidoProduto'),
('atendedorPedidos', 'criarPedidos'),
('cliente', 'criarPedidos'),
('empregadoMesa', 'criarPedidos'),
('gerente', 'criarPedidos'),
('gerente', 'criarPerfis'),
('cozinheiro', 'criarProdutoCategoriaProduto'),
('gerente', 'criarProdutoCategoriaProduto'),
('cozinheiro', 'criarProdutos'),
('gerente', 'criarProdutos'),
('atendedorPedidos', 'criarReservas'),
('empregadoMesa', 'criarReservas'),
('gerente', 'criarUtilizadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

DROP TABLE IF EXISTS `categoria_produto`;
CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `falta`
--

DROP TABLE IF EXISTS `falta`;
CREATE TABLE IF NOT EXISTS `falta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `num_horas` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FaltaPerfil` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

DROP TABLE IF EXISTS `fatura`;
CREATE TABLE IF NOT EXISTS `fatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `nif` int(11) DEFAULT NULL,
  `valor` float(4,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkIdx_114` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PerfilHorario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL,
  `n_lugares` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1603735572),
('m130524_201442_init', 1603735575),
('m190124_110200_add_verification_token_column_to_user_table', 1603735575),
('m140506_102106_rbac_init', 1604180500),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1604180500),
('m180523_151638_rbac_updates_indexes_without_prefix', 1604180500),
('m200409_110543_rbac_update_mssql_trigger', 1604180500),
('m201016_160137_rbac', 1604602718);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `nome_pedido` varchar(255) DEFAULT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_mesa` (`id_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

DROP TABLE IF EXISTS `pedido_produto`;
CREATE TABLE IF NOT EXISTS `pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `nota` varchar(255) DEFAULT NULL,
  KEY `id_produto` (`id_produto`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `datanascimento` date NOT NULL,
  `codigopostal` varchar(255) NOT NULL,
  `nacionalidade` varchar(255) NOT NULL,
  `telemovel` varchar(255) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_user`, `nome`, `apelido`, `morada`, `datanascimento`, `codigopostal`, `nacionalidade`, `telemovel`, `genero`) VALUES
(1, 'Rui', 'Jorge', 'Rua do tasco nº2', '2000-07-02', '2340-560', 'Portuguesa', '917283909', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ingredientes` varchar(500) NOT NULL,
  `preco` float(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_categoria_produto`
--

DROP TABLE IF EXISTS `produto_categoria_produto`;
CREATE TABLE IF NOT EXISTS `produto_categoria_produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL,
  KEY `ProdutoCategoriaProduto` (`id_categoria_produto`),
  KEY `CategoriaProdutoProduto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL,
  `n_pessoas` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `nome_da_reserva` varchar(255) NOT NULL,
  `tempo_reserva` time NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PerfilReserva` (`id_funcionario`),
  KEY `ReservaMesa` (`id_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Rui', 'xNwm2bIjhg5feM_iNYyBV02SkqT5gW4u', '$2y$13$reB6hNSylfZQM62DorHTQeS0wkzrzt1u.fWtDJw1DeXrT4OyYgJAS', NULL, 'rui@gmail.com', 10, '1604603050', '1604603050', 'pq-LXXJhApZ1ibNqMXqebcf8ncF0gb7I_1604603050');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `FaltaPerfil` FOREIGN KEY (`id_funcionario`) REFERENCES `perfil` (`id_user`);

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `FK_114` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `PerfilHorario` FOREIGN KEY (`id_funcionario`) REFERENCES `perfil` (`id_user`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_user`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`);

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `pedido_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `pedido_produto_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `produto_categoria_produto`
--
ALTER TABLE `produto_categoria_produto`
  ADD CONSTRAINT `CategoriaProdutoProduto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `ProdutoCategoriaProduto` FOREIGN KEY (`id_categoria_produto`) REFERENCES `categoria_produto` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `PerfilReserva` FOREIGN KEY (`id_funcionario`) REFERENCES `perfil` (`id_user`),
  ADD CONSTRAINT `ReservaMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
