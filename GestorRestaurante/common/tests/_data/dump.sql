
--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
                                   `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                                   `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
                                   `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('atendedorPedidos', '3', 1610166407),
('cliente', '5', 1610166599),
('cozinheiro', '4', 1610166497),
('empregadoMesa', '2', 1610166295),
('gerente', '1', 1610173353);

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
('apagarCargos', 2, 'Apagar cargos', NULL, NULL, 1610215839, 1610215839),
('apagarCategoriaProdutos', 2, 'Apagar Categoria Produtos', NULL, NULL, 1610215839, 1610215839),
('apagarFaltas', 2, 'Apagar faltas', NULL, NULL, 1610215839, 1610215839),
('apagarFaturas', 2, 'Apagar faturas', NULL, NULL, 1610215839, 1610215839),
('apagarHorarios', 2, 'Apagar horarios', NULL, NULL, 1610215839, 1610215839),
('apagarMesas', 2, 'Apagar Mesas', NULL, NULL, 1610215839, 1610215839),
('apagarPedidoProduto', 2, 'Apagar Pedido Produto', NULL, NULL, 1610215839, 1610215839),
('apagarPedidos', 2, 'Apagar pedidos', NULL, NULL, 1610215839, 1610215839),
('apagarPerfis', 2, 'Apagar perfis', NULL, NULL, 1610215839, 1610215839),
('apagarProdutos', 2, 'Apagar Produtos', NULL, NULL, 1610215839, 1610215839),
('apagarReservas', 2, 'Apagar Reservas', NULL, NULL, 1610215839, 1610215839),
('apagarTakeaway', 2, 'Apagar Takeaway', NULL, NULL, 1610215839, 1610215839),
('apagarUtilizadores', 2, 'Apagar utilizadores', NULL, NULL, 1610215839, 1610215839),
('atendedorPedidos', 1, NULL, NULL, NULL, 1610215839, 1610215839),
('atualizarCargos', 2, 'Atualizar cargos', NULL, NULL, 1610215839, 1610215839),
('atualizarCategoriaProdutos', 2, 'Atualizar Categoria Produtos', NULL, NULL, 1610215839, 1610215839),
('atualizarFaltas', 2, 'Atualizar faltas', NULL, NULL, 1610215839, 1610215839),
('atualizarFaturas', 2, 'Atualizar faturas', NULL, NULL, 1610215839, 1610215839),
('atualizarHorarios', 2, 'Atualizar horarios', NULL, NULL, 1610215839, 1610215839),
('atualizarMesas', 2, 'Atualizar Mesas', NULL, NULL, 1610215839, 1610215839),
('atualizarPedidoProduto', 2, 'Atualizar Pedido Produto', NULL, NULL, 1610215839, 1610215839),
('atualizarPedidos', 2, 'Atualizar pedidos', NULL, NULL, 1610215839, 1610215839),
('atualizarPerfis', 2, 'Atualizar perfis', NULL, NULL, 1610215839, 1610215839),
('atualizarProdutos', 2, 'Atualizar Produtos', NULL, NULL, 1610215839, 1610215839),
('atualizarReservas', 2, 'Atualizar Reservas', NULL, NULL, 1610215839, 1610215839),
('atualizarTakeaway', 2, 'Atualizar Takeaway', NULL, NULL, 1610215839, 1610215839),
('atualizarUtilizadores', 2, 'Atualizar utilizadores', NULL, NULL, 1610215839, 1610215839),
('cliente', 1, NULL, NULL, NULL, 1610215839, 1610215839),
('consultarCargos', 2, 'Consultar cargos', NULL, NULL, 1610215839, 1610215839),
('consultarCategoriaProdutos', 2, 'Consultar Categoria Produtos', NULL, NULL, 1610215839, 1610215839),
('consultarFaltas', 2, 'Consultar faltas', NULL, NULL, 1610215839, 1610215839),
('consultarFaturas', 2, 'Consultar Faturas', NULL, NULL, 1610215839, 1610215839),
('consultarHorarios', 2, 'Consultar horarios', NULL, NULL, 1610215839, 1610215839),
('consultarMesas', 2, 'Consultar Mesas', NULL, NULL, 1610215839, 1610215839),
('consultarPedidoProduto', 2, 'Consultar Pedido Produto', NULL, NULL, 1610215839, 1610215839),
('consultarPedidos', 2, 'Consultar pedidos', NULL, NULL, 1610215839, 1610215839),
('consultarPerfis', 2, 'Consultar perfis', NULL, NULL, 1610215839, 1610215839),
('consultarProdutos', 2, 'Consultar Produtos', NULL, NULL, 1610215839, 1610215839),
('consultarReservas', 2, 'Consultar Reservas', NULL, NULL, 1610215839, 1610215839),
('consultarTakeaway', 2, 'Consultar Takeaway', NULL, NULL, 1610215839, 1610215839),
('consultarUtilizadores', 2, 'Consultar utilizadores', NULL, NULL, 1610215839, 1610215839),
('cozinheiro', 1, NULL, NULL, NULL, 1610215839, 1610215839),
('criarCargos', 2, 'Criar cargos', NULL, NULL, 1610215839, 1610215839),
('criarCategoriaProdutos', 2, 'Criar Categoria Produtos', NULL, NULL, 1610215839, 1610215839),
('criarFaltas', 2, 'Criar faltas', NULL, NULL, 1610215839, 1610215839),
('criarFaturas', 2, 'Criar faturas', NULL, NULL, 1610215839, 1610215839),
('criarHorarios', 2, 'Criar horarios', NULL, NULL, 1610215839, 1610215839),
('criarMesas', 2, 'Criar Mesas', NULL, NULL, 1610215839, 1610215839),
('criarPedidoProduto', 2, 'Criar Pedido Produto', NULL, NULL, 1610215839, 1610215839),
('criarPedidos', 2, 'Criar pedidos', NULL, NULL, 1610215839, 1610215839),
('criarPerfis', 2, 'Criar perfis', NULL, NULL, 1610215839, 1610215839),
('criarProdutos', 2, 'Criar Produtos', NULL, NULL, 1610215839, 1610215839),
('criarReservas', 2, 'Criar Reservas', NULL, NULL, 1610215839, 1610215839),
('criarTakeaway', 2, 'Criar Takeaway', NULL, NULL, 1610215839, 1610215839),
('criarUtilizadores', 2, 'Criar utilizadores', NULL, NULL, 1610215839, 1610215839),
('empregadoMesa', 1, NULL, NULL, NULL, 1610215839, 1610215839),
('gerente', 1, NULL, NULL, NULL, 1610215839, 1610215839);

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
('atendedorPedidos', 'apagarFaturas'),
('atendedorPedidos', 'apagarPedidoProduto'),
('atendedorPedidos', 'apagarPedidos'),
('atendedorPedidos', 'apagarReservas'),
('atendedorPedidos', 'atualizarFaturas'),
('atendedorPedidos', 'atualizarPedidoProduto'),
('atendedorPedidos', 'atualizarPedidos'),
('atendedorPedidos', 'atualizarPerfis'),
('atendedorPedidos', 'atualizarReservas'),
('atendedorPedidos', 'atualizarUtilizadores'),
('atendedorPedidos', 'consultarCategoriaProdutos'),
('atendedorPedidos', 'consultarFaltas'),
('atendedorPedidos', 'consultarFaturas'),
('atendedorPedidos', 'consultarHorarios'),
('atendedorPedidos', 'consultarMesas'),
('atendedorPedidos', 'consultarPedidoProduto'),
('atendedorPedidos', 'consultarPedidos'),
('atendedorPedidos', 'consultarProdutos'),
('atendedorPedidos', 'consultarReservas'),
('atendedorPedidos', 'criarFaturas'),
('atendedorPedidos', 'criarPedidoProduto'),
('atendedorPedidos', 'criarPedidos'),
('atendedorPedidos', 'criarReservas'),
('cliente', 'apagarPedidoProduto'),
('cliente', 'apagarTakeaway'),
('cliente', 'atualizarFaturas'),
('cliente', 'atualizarPedidoProduto'),
('cliente', 'atualizarPerfis'),
('cliente', 'atualizarTakeaway'),
('cliente', 'atualizarUtilizadores'),
('cliente', 'consultarCategoriaProdutos'),
('cliente', 'consultarFaturas'),
('cliente', 'consultarPedidoProduto'),
('cliente', 'consultarProdutos'),
('cliente', 'consultarTakeaway'),
('cliente', 'criarFaturas'),
('cliente', 'criarPedidoProduto'),
('cliente', 'criarTakeaway'),
('cozinheiro', 'apagarProdutos'),
('cozinheiro', 'atualizarPedidoProduto'),
('cozinheiro', 'atualizarPerfis'),
('cozinheiro', 'atualizarProdutos'),
('cozinheiro', 'atualizarUtilizadores'),
('cozinheiro', 'consultarCategoriaProdutos'),
('cozinheiro', 'consultarFaltas'),
('cozinheiro', 'consultarHorarios'),
('cozinheiro', 'consultarPedidoProduto'),
('cozinheiro', 'consultarPedidos'),
('cozinheiro', 'consultarProdutos'),
('cozinheiro', 'criarProdutos'),
('empregadoMesa', 'apagarFaturas'),
('empregadoMesa', 'apagarPedidoProduto'),
('empregadoMesa', 'apagarPedidos'),
('empregadoMesa', 'atualizarFaturas'),
('empregadoMesa', 'atualizarPedidoProduto'),
('empregadoMesa', 'atualizarPedidos'),
('empregadoMesa', 'atualizarPerfis'),
('empregadoMesa', 'atualizarUtilizadores'),
('empregadoMesa', 'consultarCategoriaProdutos'),
('empregadoMesa', 'consultarFaltas'),
('empregadoMesa', 'consultarFaturas'),
('empregadoMesa', 'consultarHorarios'),
('empregadoMesa', 'consultarMesas'),
('empregadoMesa', 'consultarPedidoProduto'),
('empregadoMesa', 'consultarPedidos'),
('empregadoMesa', 'consultarProdutos'),
('empregadoMesa', 'consultarReservas'),
('empregadoMesa', 'criarFaturas'),
('empregadoMesa', 'criarPedidoProduto'),
('empregadoMesa', 'criarPedidos'),
('gerente', 'apagarCargos'),
('gerente', 'apagarCategoriaProdutos'),
('gerente', 'apagarFaltas'),
('gerente', 'apagarFaturas'),
('gerente', 'apagarHorarios'),
('gerente', 'apagarMesas'),
('gerente', 'apagarPedidoProduto'),
('gerente', 'apagarPedidos'),
('gerente', 'apagarPerfis'),
('gerente', 'apagarProdutos'),
('gerente', 'apagarReservas'),
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
('gerente', 'atualizarProdutos'),
('gerente', 'atualizarReservas'),
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
('gerente', 'consultarProdutos'),
('gerente', 'consultarReservas'),
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
('gerente', 'criarProdutos'),
('gerente', 'criarReservas'),
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
(6, 'Bebida', 0);

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
(1, '2021-01-09', '08:12:00', '20:10:00', 0, 2),
(2, '2021-01-13', '08:28:00', '12:30:00', 0, 3),
(3, '2021-01-22', '10:38:00', '10:38:00', 0, 2),
(4, '2021-01-11', '09:50:00', '09:51:00', 0, 4);

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
(1, 2021, 'Janeiro', 'segunda', '07:21:00', '18:18:00', 1);

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
(2, 8, 2),
(3, 6, 2),
(4, 3, 2),
(5, 8, 2);

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
('m201016_160137_rbac', 1610215839);

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
(1, '2021-01-13 13:05:00', 0, NULL, NULL, 0, 1, 2);

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

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`id`, `id_pedido`, `id_produto`, `estado`, `quant_Pedida`, `quant_Entregue`, `quant_Preparacao`, `preco`) VALUES
(1, 1, 1, 0, 2, 0, 0, '2.00');

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
(1, 'Joana', 'Pedrosa', 'Rua do tasco nº2', '2021-01-11', '2470-230', 'Portugues', '9182938493', 0, 'gerente'),
(2, 'Carlos', 'Ferreira', 'Rua do marreco nº2', '2021-01-12', '2470-230', 'Portugues', '91829384', 1, 'empregadoMesa'),
(3, 'Silvio', 'Mendes', 'Rua do outeiro nº4', '2021-01-20', '2770-230', 'Portugues', '9111111111', 1, 'atendedorPedidos'),
(4, 'Maria', 'Paula', 'Rua do termeco nº20', '2021-01-20', '2870-630', 'Portugues', '912394850', 0, 'cozinheiro'),
(5, 'Paulo', 'Cesar', 'Rua da laparda nº6', '2021-01-13', '2470-930', 'Portugues', '923748592', 1, 'cliente');

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
(1, 'Pão', '', '1.00', 1, 0),
(2, 'Paté de atum', '', '1.00', 1, 0),
(3, 'Bitoque', '', '4.50', 3, 0),
(4, 'Bacalhau com natas', '', '5.50', 4, 0),
(5, 'Mousse de chocolate', '', '2.50', 5, 0),
(6, 'Coca-cola', '', '1.20', 6, 0),
(7, 'Sopa da pedra', '', '2.50', 2, 0);

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
(1, 'joana', 'Y8DQTQWyZ2euhwRysit5OaVBs0ITBsdu', '$2y$13$SlIf1py93UMN/9f2/9qxuOP9Sp5IH7KR2DX2SS1jPgjD2PS5CCa2W', NULL, 'joana@gmail.com', 10, '1610165794', '1610173353', '28mfU7GuZJe_YICjqXinApbVCzN8GdyX_1610165794'),
(2, 'carlos', 'B-mD9zgHo17eq4s1u1MRVz-V5hNGMaHi', '$2y$13$FEY6CHLBmwS3AbDEo5fllOcrFPcI.Lmk3Ql7FCnymJXLhwB0NAPgy', NULL, 'carlos@gmail.com', 10, '1610166295', '1610166295', 'jvqP77RWZ_0tF3wVV1zpI3C4AtuOgirC_1610166295'),
(3, 'silvio', 'dl3Ibd5jMhzfUJPhr5w8rjKzf-XWqUXa', '$2y$13$4xfqY9Idqaf8lTd1.x5sh.7kV5BFHNw4Lr7J.5z/LaubSaqFBgH2G', NULL, 'silvio@hotmail.com', 10, '1610166407', '1610166407', 'dX-Zc7TSBPqUgnRLoykAIjX0Ursl3Ic-_1610166407'),
(4, 'maria', 'm2L-ZZropOIxR9RzFvnaWZuJGkEb8aYS', '$2y$13$9H92s1d.rgW1TWkw.sfQuujCg/eZAviM/zAVA4K0CISewD7C8SAjC', NULL, 'maria@outlook.pt', 10, '1610166497', '1610166497', 'p1RjiRn_U1eBPIrcqTfiaHDJTtJggaZP_1610166497'),
(5, 'paulo', 'E2d3_V5s2JGI-dtCSbh0R2PV1i2hB2yw', '$2y$13$gZ32C2U01jbWdcUcdHPnuOWWWE/l2x2CzrkErrWmrVkiS.6X8ESJG', NULL, 'paulo@sapo.pt', 10, '1610166599', '1610166599', 'SvqURRizb5XvtRn8eRUn43V0KWOiQzaS_1610166599');

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `falta`
--
ALTER TABLE `falta`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;