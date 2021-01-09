
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('gerente', '1', 1609293110),
('empregadoMesa', '2', 1610022552);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('atendedorPedidos', 'AcederInterfaceAtendedorPedidos'),
('atendedorPedidos', 'apagarFaturas'),
('atendedorPedidos', 'apagarPedidoProduto'),
('atendedorPedidos', 'apagarPedidos'),
('atendedorPedidos', 'apagarReservas'),
('atendedorPedidos', 'atualizarFaturas'),
('atendedorPedidos', 'atualizarPedidoProduto'),
('atendedorPedidos', 'atualizarPedidos'),
('atendedorPedidos', 'atualizarPerfis'),
('atendedorPedidos', 'atualizarReservas'),
('atendedorPedidos', 'consultarFaltas'),
('atendedorPedidos', 'consultarFaturas'),
('atendedorPedidos', 'consultarHorarios'),
('atendedorPedidos', 'consultarMesas'),
('atendedorPedidos', 'consultarPedidoProduto'),
('atendedorPedidos', 'consultarPedidos'),
('atendedorPedidos', 'consultarPerfis'),
('atendedorPedidos', 'consultarProdutos'),
('atendedorPedidos', 'consultarReservas'),
('atendedorPedidos', 'criarFaturas'),
('atendedorPedidos', 'criarPedidoProduto'),
('atendedorPedidos', 'criarPedidos'),
('atendedorPedidos', 'criarReservas'),
('cliente', 'AcederInterfaceCliente'),
('cliente', 'apagarPedidos'),
('cliente', 'atualizarPedidos'),
('cliente', 'atualizarPerfis'),
('cliente', 'consultarPedidos'),
('cliente', 'consultarPerfis'),
('cliente', 'consultarProdutos'),
('cliente', 'criarPedidos'),
('cozinheiro', 'AcederInterfaceCozinheiro'),
('cozinheiro', 'apagarCategoriaProdutos'),
('cozinheiro', 'apagarProdutoCategoriaProduto'),
('cozinheiro', 'apagarProdutos'),
('cozinheiro', 'atualizarCategoriaProdutos'),
('cozinheiro', 'atualizarPerfis'),
('cozinheiro', 'atualizarProdutoCategoriaProduto'),
('cozinheiro', 'atualizarProdutos'),
('cozinheiro', 'consultarCategoriaProdutos'),
('cozinheiro', 'consultarFaltas'),
('cozinheiro', 'consultarHorarios'),
('cozinheiro', 'consultarPerfis'),
('cozinheiro', 'consultarProdutoCategoriaProduto'),
('cozinheiro', 'consultarProdutos'),
('cozinheiro', 'criarCategoriaProdutos'),
('cozinheiro', 'criarProdutoCategoriaProduto'),
('cozinheiro', 'criarProdutos'),
('empregadoMesa', 'AcederInterfaceEmpregadoMesa'),
('empregadoMesa', 'apagarFaturas'),
('empregadoMesa', 'apagarPedidoProduto'),
('empregadoMesa', 'apagarPedidos'),
('empregadoMesa', 'apagarReservas'),
('empregadoMesa', 'atualizarFaturas'),
('empregadoMesa', 'atualizarPedidoProduto'),
('empregadoMesa', 'atualizarPedidos'),
('empregadoMesa', 'atualizarPerfis'),
('empregadoMesa', 'atualizarReservas'),
('empregadoMesa', 'consultarFaltas'),
('empregadoMesa', 'consultarFaturas'),
('empregadoMesa', 'consultarHorarios'),
('empregadoMesa', 'consultarMesas'),
('empregadoMesa', 'consultarPedidoProduto'),
('empregadoMesa', 'consultarPedidos'),
('empregadoMesa', 'consultarPerfis'),
('empregadoMesa', 'consultarProdutos'),
('empregadoMesa', 'consultarReservas'),
('empregadoMesa', 'criarFaturas'),
('empregadoMesa', 'criarPedidoProduto'),
('empregadoMesa', 'criarPedidos'),
('empregadoMesa', 'criarReservas'),
('gerente', 'AcederInterfaceGerente'),
('gerente', 'apagarCargos'),
('gerente', 'apagarCategoriaProdutos'),
('gerente', 'apagarFaltas'),
('gerente', 'apagarFaturas'),
('gerente', 'apagarHorarios'),
('gerente', 'apagarMesas'),
('gerente', 'apagarPedidoProduto'),
('gerente', 'apagarPedidos'),
('gerente', 'apagarPerfis'),
('gerente', 'apagarProdutoCategoriaProduto'),
('gerente', 'apagarProdutos'),
('gerente', 'apagarUtilizadores'),
('gerente', 'atualizarCargos'),
('gerente', 'atualizarCategoriaProdutos'),
('gerente', 'atualizarFaltas'),
('gerente', 'atualizarFaturas'),
('gerente', 'atualizarHorarios'),
('gerente', 'atualizarMesas'),
('gerente', 'atualizarPedidoProduto'),
('gerente', 'atualizarPedidos'),
('gerente', 'atualizarPerfis'),
('gerente', 'atualizarProdutoCategoriaProduto'),
('gerente', 'atualizarProdutos'),
('gerente', 'atualizarUtilizadores'),
('gerente', 'consultarCargos'),
('gerente', 'consultarCategoriaProdutos'),
('gerente', 'consultarFaltas'),
('gerente', 'consultarFaturas'),
('gerente', 'consultarHorarios'),
('gerente', 'consultarMesas'),
('gerente', 'consultarPedidoProduto'),
('gerente', 'consultarPedidos'),
('gerente', 'consultarPerfis'),
('gerente', 'consultarProdutoCategoriaProduto'),
('gerente', 'consultarProdutos'),
('gerente', 'consultarUtilizadores'),
('gerente', 'criarCargos'),
('gerente', 'criarCategoriaProdutos'),
('gerente', 'criarFaltas'),
('gerente', 'criarFaturas'),
('gerente', 'criarHorarios'),
('gerente', 'criarMesas'),
('gerente', 'criarPedidoProduto'),
('gerente', 'criarPedidos'),
('gerente', 'criarPerfis'),
('gerente', 'criarProdutoCategoriaProduto'),
('gerente', 'criarProdutos'),
('gerente', 'criarUtilizadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `editavel` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id`, `nome`, `editavel`) VALUES
(1, 'Entrada', 0),
(2, 'Sopa', 0),
(3, 'Carne', 0),
(4, 'Peixe', 0),
(5, 'Sobremesa', 0),
(6, 'Bebida', 0),
(11, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `falta`
--

CREATE TABLE `falta` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `num_horas` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `falta`
--

INSERT INTO `falta` (`id`, `data`, `hora_inicio`, `hora_fim`, `num_horas`, `id_funcionario`) VALUES
(2, '2021-01-12', '03:35:00', '05:37:00', 0, 135),
(4, '2021-01-06', '07:10:00', '20:10:00', 0, 2),
(5, '2021-01-14', '15:08:00', '16:07:00', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `nif` int(11) DEFAULT NULL,
  `valor` float(4,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `ano`, `mes`, `dia_semana`, `hora_inicio`, `hora_fim`, `id_funcionario`) VALUES
(16, 2000, 'Janeiro', 'Segunda-Feira', '18:58:00', '18:58:00', 2),
(17, 2000, 'janeiro', 'Segunda-Feira', '00:00:00', '18:30:00', 2),
(18, 2000, 'Janeiro', 'Quinta-Feira', '00:00:00', '18:30:00', 2),
(19, 2000, 'Janeiro', 'Sabado', '00:00:00', '18:30:00', 2),
(20, 2021, 'Janeiro', 'segunda', '12:34:00', '23:25:00', 135),
(24, 2021, 'Fevereiro', 'terça', '05:11:00', '20:14:00', 2),
(25, 2021, 'Abril', 'terça', '08:18:00', '22:17:00', 2),
(26, 2021, 'Março', 'terça', '07:21:00', '08:21:00', 2),
(27, 2021, 'Setembro', 'terça', '07:21:00', '08:21:00', 2),
(28, 2021, 'Janeiro', 'segunda', '17:32:00', '19:36:00', 2),
(29, 2021, 'Abril', 'segunda', '19:41:00', '18:40:00', 2),
(30, 2021, 'Janeiro', 'segunda', '15:08:00', '16:09:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `id` int(11) NOT NULL,
  `n_lugares` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id`, `n_lugares`, `estado`) VALUES
(1, 5, 1),
(2, 3, 2),
(3, 20, 2),
(4, 40, 2),
(5, 4, 2),
(7, 5, 2),
(9, 6, 2),
(897, 90, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `nome_pedido` varchar(50) DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data`, `tipo`, `nome_pedido`, `nota`, `estado`, `id_mesa`, `id_perfil`) VALUES
(1, '2021-01-13 13:25:00', 0, NULL, NULL, 0, 1, 146);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `quant_Pedida` int(11) NOT NULL,
  `quant_Entregue` int(11) NOT NULL,
  `quant_Preparacao` int(11) NOT NULL,
  `preco` decimal(4,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `apelido` varchar(25) NOT NULL,
  `morada` varchar(150) NOT NULL,
  `datanascimento` date NOT NULL,
  `codigopostal` varchar(8) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `telemovel` varchar(13) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_user`, `nome`, `apelido`, `morada`, `datanascimento`, `codigopostal`, `nacionalidade`, `telemovel`, `genero`, `cargo`) VALUES
(1, 'joana', 'pedrosa', 'rua do tasco', '2021-01-12', '2430-230', 'Portuguesa', '999999999', 0, 'gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ingredientes` varchar(500) DEFAULT NULL,
  `preco` decimal(4,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `ingredientes`, `preco`, `id_categoria`, `estado`) VALUES
(1, 'Bitoque', 'bife,arroz', '3.78', 3, 0),
(2, 'Mousse de chocolate', 'bife,arroz', '6.50', 3, 0),
(3, 'Pão', 'aveia', '1.78', 1, 0),
(4, 'Arroz de Pato', '', '3.58', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `n_pessoas` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `nome_da_reserva` varchar(50) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `n_pessoas`, `data_hora`, `nome_da_reserva`, `id_mesa`, `id_funcionario`) VALUES
(1, 3, '2020-12-31 10:50:00', 'yhgouyf', 5, 137),
(2, 6, '2020-12-30 05:35:00', 'yhgouyf', 4, 137);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Joana', 'm4Lxe9LYJyanbDbFuVC9tBbGzfJ_DYAW', '$2y$13$hcmN1CmkqcGSt4FFNn/MFeCsOpozJ4cJ15RiQHd8ShwCUDBa2/A6.', NULL, 'Joana@gmail.com', 10, '', '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`nome`);

--
-- Índices para tabela `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FaltaPerfil` (`id_funcionario`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_114` (`id_pedido`);

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PerfilHorario` (`id_funcionario`);

--
-- Índices para tabela `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `telemovel` (`telemovel`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PerfilReserva` (`id_funcionario`),
  ADD KEY `ReservaMesa` (`id_mesa`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `falta`
--
ALTER TABLE `falta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
