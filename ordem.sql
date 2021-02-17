-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2021 às 18:05
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ordem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
(1, 'Games 1-2', 1, '2021-01-26 19:49:39'),
(3, 'Joias', 1, '2021-01-27 05:04:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `cliente_tipo` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_sobrenome` varchar(150) NOT NULL,
  `cliente_data_nascimento` date NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_rg_ie` varchar(20) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` varchar(20) NOT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_numero_endereco` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext DEFAULT NULL,
  `cliente_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_tipo`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
(5, '2021-02-02 07:14:28', 1, 'luquinhas', 'mama eu', '1995-02-23', '082.378.059-76', '798.16982-36', 'leogames850@gmail.com', '(43) 3333-3333', '(43) 3333-3333', '86280-000', 'rua do nerso', '59', 'sussumo assanuma', 'casa', 'urai', 'PR', 1, 'fvvfvfd', '2021-02-06 11:03:42'),
(6, '2021-02-06 04:18:48', 1, 'jose', 'joao', '1995-07-08', '276.638.140-61', '89', 'jose@gmail.com', '(43) 55555-5555', '(43) 55555-5555', '50000-000', 'rua ali na esquina', '60', 'itajai', 'casa', 'panamena', 'PR', 1, '', '2021-02-06 04:45:14'),
(7, '2021-02-06 04:19:48', 1, 'Josifino', 'josin', '1991-08-09', '841.925.610-26', '55555555555555555555', 'jose1@gmail.com', '(55) 66666-6666', '(55) 66666-6666', '86280-000', 'rua do nerso', '80', 'perto daqui', 'casa', 'urai', 'PR', 1, '', '2021-02-06 04:45:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(3, 3, '2021-07-08', '2021-02-05 08:41:23', '200.00', 1, '', '2021-02-05 23:41:23'),
(5, 3, '2021-05-08', NULL, '500.00', 0, '', '2021-02-05 23:46:06'),
(6, 3, '2021-02-06', NULL, '500.00', 0, '', '2021-02-07 00:37:57'),
(7, 3, '2021-02-10', '2021-02-10 09:32:54', '200.00', 1, 'pagar hoje', '2021-02-11 00:32:54'),
(8, 3, '2021-02-16', NULL, '1,000.00', 0, 'pagar mais tarde', '2021-02-16 15:55:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int(11) NOT NULL,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext DEFAULT NULL,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(1, 5, '2020-02-28', '2021-02-06 08:22:15', '150,226.22', 1, '', '2021-02-06 11:22:15'),
(2, 6, '2020-02-21', '2020-02-28 18:33:19', '350.00', 1, NULL, '2021-02-06 04:45:28'),
(5, 5, '2021-02-06', '2021-02-16 12:55:49', '500.00', 1, '', '2021-02-16 15:55:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
(1, 'Cartão de crédito', 0, 0, '2021-02-16 22:30:33'),
(2, 'Dinheiro', 0, 1, '2020-01-29 21:43:54'),
(3, 'Boleto bancário', 1, 1, '2021-02-13 14:12:06'),
(4, 'Conta Bancaria', 1, 1, '2021-02-11 00:31:27'),
(6, 'Pix', 0, 1, '2021-02-16 22:32:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `fornecedor_razao` varchar(200) DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) DEFAULT NULL,
  `fornecedor_cnpj` varchar(20) DEFAULT NULL,
  `fornecedor_ie` varchar(20) DEFAULT NULL,
  `fornecedor_telefone` varchar(20) DEFAULT NULL,
  `fornecedor_celular` varchar(20) DEFAULT NULL,
  `fornecedor_email` varchar(100) DEFAULT NULL,
  `fornecedor_contato` varchar(45) DEFAULT NULL,
  `fornecedor_cep` varchar(10) DEFAULT NULL,
  `fornecedor_endereco` varchar(145) DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(45) DEFAULT NULL,
  `fornecedor_complemento` varchar(45) DEFAULT NULL,
  `fornecedor_cidade` varchar(45) DEFAULT NULL,
  `fornecedor_estado` varchar(2) DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext DEFAULT NULL,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(3, '2021-01-26 19:48:15', 'Leonardo tecnologiass', 'Nerso Silva', '18.372.524/0001-79', '727.43663-40', '(43) 99999-9999', '(43) 99999-9999', 'leogames850@gmail.com', NULL, '86280-000', 'rua do nerso', '24', 'centro', 'casa', 'urai', 'PR', 0, '', '2021-01-28 17:32:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'vendedor', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `marca_nome` varchar(45) NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
(1, 'Nvidia12', 1, '2021-01-28 17:11:55'),
(4, 'Samsumg', 1, '2021-01-28 17:42:19'),
(5, 'Pc', 1, '2021-01-28 17:42:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

CREATE TABLE `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL,
  `ordem_ts_id_servico` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(1, 1, 1, 1, '80.00', '0', '80.00'),
(2, 2, 2, 4, '80.00', '0', '320.00'),
(3, 3, 3, 1, '120.00', '0', '120.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

CREATE TABLE `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_cliente_id` int(11) DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `ordem_servico_data_conclusao` varchar(100) DEFAULT NULL,
  `ordem_servico_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_marca_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_modelo_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_acessorios` tinytext DEFAULT NULL,
  `ordem_servico_defeito` tinytext DEFAULT NULL,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext DEFAULT NULL,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_cliente_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_equipamento`, `ordem_servico_marca_equipamento`, `ordem_servico_modelo_equipamento`, `ordem_servico_acessorios`, `ordem_servico_defeito`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(1, 1, 5, '2020-02-14 20:30:35', NULL, 'Fone de ouvido', 'Awell', 'AV1801', 'Mouse e carregador', 'Não sai aúdio no lado esquerdo', 'R$ 0.00', '490.00', 0, '', '2021-02-14 11:29:45'),
(2, 1, 6, '2020-02-14 20:48:53', NULL, 'Notebook gamer', 'Awell', 'FONE01', 'Mouse e carregador', 'Não carrega', 'R$ 0.00', '80.00', 0, '', '2021-02-14 11:29:48'),
(3, 1, 7, '2020-02-17 23:53:26', NULL, 'Notebook Sony', 'Sony', 'FONE01', 'Mouse e carregador', 'Tela trincada', 'R$ 0.00', '120.00', 0, 'Vem buscar pela manhã', '2021-02-14 11:29:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(11) NOT NULL,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` datetime DEFAULT NULL,
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_fornecedor_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) DEFAULT NULL,
  `produto_unidade` varchar(25) DEFAULT NULL,
  `produto_codigo_barras` varchar(45) DEFAULT NULL,
  `produto_ncm` varchar(15) DEFAULT NULL,
  `produto_preco_custo` varchar(45) DEFAULT NULL,
  `produto_preco_venda` varchar(45) DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext DEFAULT NULL,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_ativo`, `produto_obs`, `produto_data_alteracao`) VALUES
(7, '15628934', NULL, 1, 1, 3, 'Celular a4', 'UN', NULL, NULL, '50,00', '100,00', '1', '10', 1, 'Chegou em novo', '2021-02-04 09:33:48'),
(8, '95871243', NULL, 1, 1, 3, 'teste1', 'PCT', NULL, NULL, '2.560,00', '2.570,00', '1', '5', 1, '', '2021-02-04 09:35:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int(11) NOT NULL,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
(1, 'Limpeza geral G - att', '60,00', 'GGGG Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.', 1, '2021-02-14 16:56:46'),
(2, 'Solda elétrica', '80,00', 'Solda elétrica', 1, '2020-02-13 22:10:21'),
(3, 'Restauração de componentes', '120,00', 'Restauração de componentes', 1, '2020-02-13 22:11:29'),
(4, 'Formataçao de Pc', '65,00', 'formatamos pc em geral', 1, '2021-01-20 19:24:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
(1, 'System ordem inc', 'Sistema ordem Now', '01.919.871/0001-76', '299.27993-69', '(43) - 3333-3333', '(43) - 3333-3333', 'OrdemNow@gmail.com', 'http://localhost/ordem/', '86280-000', 'Rua das aulas ', '59', 'curitiba', NULL, '', '2021-01-07 18:24:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$MpRUw86seo9NhAfU/29xxeMenrrryCc3T4mdSq0gbXJWfGnBRKFyG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1613580432, 1, 'Admin-3lkk', 'istrator-llkk', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(7, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vendedor_id` int(11) NOT NULL,
  `vendedor_codigo` varchar(10) NOT NULL,
  `vendedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `vendedor_nome_completo` varchar(145) NOT NULL,
  `vendedor_cpf` varchar(25) NOT NULL,
  `vendedor_rg` varchar(25) NOT NULL,
  `vendedor_telefone` varchar(15) DEFAULT NULL,
  `vendedor_celular` varchar(15) DEFAULT NULL,
  `vendedor_email` varchar(45) DEFAULT NULL,
  `vendedor_cep` varchar(15) DEFAULT NULL,
  `vendedor_endereco` varchar(45) DEFAULT NULL,
  `vendedor_numero_endereco` varchar(25) DEFAULT NULL,
  `vendedor_complemento` varchar(45) DEFAULT NULL,
  `vendedor_bairro` varchar(45) DEFAULT NULL,
  `vendedor_cidade` varchar(45) DEFAULT NULL,
  `vendedor_estado` varchar(2) DEFAULT NULL,
  `vendedor_ativo` tinyint(1) DEFAULT NULL,
  `vendedor_obs` tinytext DEFAULT NULL,
  `vendedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`, `vendedor_data_alteracao`) VALUES
(2, '03841956', '2020-01-29 22:22:27', 'Sara Betina', '582.071.790-23', '25.287.429-8', '(41) 88884-4444', '(41) 88884-4444', 'sara@gmail.com', '80540-120', 'Rua das vendas', '45', '', 'Centro', 'Joinville', 'SC', 1, '', '2021-01-19 19:21:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`);

--
-- Índices para tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Índices para tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD PRIMARY KEY (`ordem_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`);

--
-- Índices para tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD PRIMARY KEY (`ordem_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`ordem_servico_cliente_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`,`produto_fornecedor_id`),
  ADD KEY `fk_produto_marca_id` (`produto_marca_id`),
  ADD KEY `fk_produto_forncedor_id` (`produto_fornecedor_id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`vendedor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  MODIFY `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vendedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Limitadores para a tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD CONSTRAINT `fk_ordem_ts_id_ordem_servico` FOREIGN KEY (`ordem_ts_id_ordem_servico`) REFERENCES `ordens_servicos` (`ordem_servico_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ordem_ts_id_servico` FOREIGN KEY (`ordem_ts_id_servico`) REFERENCES `servicos` (`servico_id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
