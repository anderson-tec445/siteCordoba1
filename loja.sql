-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jan-2022 às 15:30
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alertas`
--

CREATE TABLE `alertas` (
  `id` int(11) NOT NULL,
  `titulo_alerta` varchar(20) NOT NULL,
  `titulo_mensagem` varchar(100) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `ativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alertas`
--

INSERT INTO `alertas` (`id`, `titulo_alerta`, `titulo_mensagem`, `mensagem`, `link`, `imagem`, `data`, `ativo`) VALUES
(1, 'Promoção Imperdível', 'Combo de 8 Camisetas', 'Combo com 8 camisetas de 260 reais por apenas 160 reais.', 'http://google.com', 'cat-2.jpg', '2020-09-02', 'Sim'),
(3, 'fdsafdsfa', 'fdfadf', 'dfasfdsafsad', 'http://google.com', 'sem-foto.jpg', '2020-09-01', 'Não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carac`
--

CREATE TABLE `carac` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carac`
--

INSERT INTO `carac` (`id`, `nome`) VALUES
(1, 'Tamanho'),
(2, 'Cor'),
(3, 'Numeração'),
(4, 'Voltagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carac_itens`
--

CREATE TABLE `carac_itens` (
  `id` int(11) NOT NULL,
  `id_carac_prod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor_item` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carac_itens`
--

INSERT INTO `carac_itens` (`id`, `id_carac_prod`, `nome`, `valor_item`) VALUES
(1, 11, 'Azul', '#80acf2'),
(2, 3, 'Azul', '#80acf2'),
(3, 3, 'Vermelho', '#cf4023'),
(4, 10, 'P', ''),
(5, 10, 'M', ''),
(6, 10, 'G', ''),
(7, 10, 'GG', ''),
(8, 3, 'Amarelo', ''),
(9, 3, 'Verde', ''),
(12, 11, 'Vermelho', ''),
(13, 15, '30 e 31', ''),
(14, 15, '32 e 33', ''),
(15, 16, 'Marron', ''),
(16, 16, 'Preto', ''),
(17, 17, '34/35', ''),
(18, 17, '36/37', ''),
(19, 18, 'Azul', ''),
(20, 20, 'P', ''),
(22, 21, 'Preta', '#000'),
(23, 21, 'Azul', '#939ced'),
(24, 22, 'P', ''),
(25, 22, 'M', ''),
(26, 22, 'G', ''),
(27, 22, 'GG', ''),
(29, 21, 'Verde Escuro', '#073817'),
(30, 21, 'Verde Claro', '#6fd691'),
(31, 21, 'Laranja', '#b5631b'),
(32, 19, 'Azul', '#2640bf'),
(33, 19, 'Preta', '#000'),
(34, 20, 'M', ''),
(35, 23, 'P M G', ''),
(36, 24, 'P M G', ''),
(37, 20, 'G', ''),
(38, 20, 'GG', ''),
(39, 25, 'P ', ''),
(40, 25, 'M', ''),
(41, 25, 'G', ''),
(42, 26, 'Branco', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carac_prod`
--

CREATE TABLE `carac_prod` (
  `id` int(11) NOT NULL,
  `id_carac` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carac_prod`
--

INSERT INTO `carac_prod` (`id`, `id_carac`, `id_prod`) VALUES
(3, 2, 1),
(10, 1, 1),
(11, 2, 3),
(12, 3, 3),
(13, 1, 3),
(14, 4, 3),
(15, 3, 1),
(16, 2, 23),
(17, 3, 23),
(18, 2, 31),
(19, 2, 30),
(20, 1, 30),
(21, 2, 25),
(22, 1, 25),
(23, 1, 33),
(24, 3, 32),
(25, 1, 32),
(26, 2, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `nome_url`, `imagem`) VALUES
(10, 'Cuecas Cordoba', 'cuecas-cordoba', 'item-1.png'),
(11, 'Cuecas Cordoba camu', 'cuecas-cordoba-camu', 'item-2.png'),
(12, 'Kit Cueca Cordoba', 'kit-cueca-cordoba', 'item-4.png'),
(13, 'Calcinhas', 'calcinhas', 'item-3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cartoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `cartoes`) VALUES
(1, 'Alice Santos', '000.000.000-40', 'alice@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Cliente Teste', '000.000.000-10', 'cliente@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Matheus Silva', '184.854.545-44', 'mateus@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Rozane da cruz salomao', '141.496.458-76', 'ro@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `combos`
--

CREATE TABLE `combos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `descricao_longa` text NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `tipo_envio` int(1) NOT NULL,
  `palavras` varchar(250) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `largura` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `comprimento` double(8,2) NOT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `vendas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `combos`
--

INSERT INTO `combos` (`id`, `nome`, `nome_url`, `descricao`, `descricao_longa`, `valor`, `imagem`, `tipo_envio`, `palavras`, `ativo`, `peso`, `largura`, `altura`, `comprimento`, `valor_frete`, `vendas`) VALUES
(1, 'Camisa e Bermuda', 'camisa-e-bermuda', 'fdsfd', 'fsdfdsf', '139.99', 'cat-1.jpg', 1, 'fdsaf', 'Sim', 1.00, 1.00, 1.00, 1.00, '0.00', NULL),
(3, 'Kit Cueca Cordoba', 'kit-cueca-cordoba', 'fsdfds', 'fsdf', '199.00', 'item-4.png', 1, 'afdsaf', 'Sim', 1.00, 1.00, 1.00, 1.00, '0.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`id`, `nome`, `email`, `ativo`) VALUES
(1, 'José Silva', 'hugovasconcelosf@hotmail.com', 'Sim'),
(2, 'João Silva', 'contato@hugocursos.com.br', 'Sim'),
(3, 'Alice Santos', 'alice@hotmail.com', 'Sim'),
(4, 'Cliente Teste', 'cliente@hotmail.com', 'Sim'),
(5, 'Matheus Silva', 'mateus@hotmail.com', 'Sim'),
(6, 'Rozane da cruz salomao', 'ro@gmail.com', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `id_produto`, `imagem`) VALUES
(11, 1, 'cat-4.jpg'),
(13, 3, 'cat-2.jpg'),
(14, 3, 'cat-4.jpg'),
(15, 3, 'cat-7.jpg'),
(16, 1, 'cat-6.jpg'),
(19, 31, 'cat-4.jpg'),
(21, 25, 'ca misa social.jpg'),
(22, 25, 'Blusa-azul.jpg'),
(23, 25, 'Blusa Ver.jpg'),
(24, 25, 'Polo Marinho.jpg'),
(25, 25, 'Blue.jpg'),
(26, 30, 'item-1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `sub_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_url` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `descricao_longa` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `tipo_envio` int(11) NOT NULL,
  `palavras` varchar(250) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `peso` double(8,2) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `valor_frete` decimal(8,2) DEFAULT NULL,
  `promocao` varchar(5) NOT NULL,
  `vendas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `categoria`, `sub_categoria`, `nome`, `nome_url`, `descricao`, `descricao_longa`, `valor`, `imagem`, `estoque`, `tipo_envio`, `palavras`, `ativo`, `peso`, `largura`, `altura`, `comprimento`, `modelo`, `valor_frete`, `promocao`, `vendas`) VALUES
(30, 10, 14, 'Cueca', 'cueca', 'Cueca |Box Cordoba', 'Cueca Box Cordoba', '139.99', 'item-1.png', 20, 1, 'ssfs', 'Sim', 0.00, 0, 0, 0, '', '0.00', 'Não', 2),
(32, 13, 16, 'Calcinha', 'calcinha', 'Calcinha ', 'Calcinha', '70.00', 'item-3.png', 30, 3, 'Calcinha', 'Sim', 0.00, 0, 0, 0, '', '0.00', 'Não', NULL),
(33, 10, 15, 'Cuecas Femeninas', 'cuecas-femeninas', '', '', '159.99', 'cuecas-f.jpg', 30, 3, '', 'Sim', 0.00, 0, 0, 0, '', '0.00', 'Não', NULL),
(34, 13, 16, 'Cueca Femeninas', 'cueca-femeninas', '', '', '159.99', 'cuecas-femininas.jpg', 30, 3, '', 'Sim', 0.00, 0, 0, 0, '', '0.00', 'Não', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_combos`
--

CREATE TABLE `prod_combos` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_combo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prod_combos`
--

INSERT INTO `prod_combos` (`id`, `id_produto`, `id_combo`) VALUES
(9, 24, 1),
(10, 25, 1),
(13, 30, 1),
(14, 23, 1),
(15, 30, 3),
(18, 24, 3),
(19, 22, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao_banner`
--

CREATE TABLE `promocao_banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `ativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `desconto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `promocoes`
--

INSERT INTO `promocoes` (`id`, `id_produto`, `valor`, `data_inicio`, `data_final`, `ativo`, `desconto`) VALUES
(2, 31, '30.00', '2020-08-30', '2020-09-01', 'Sim', ''),
(3, 30, '104.99', '2020-08-31', '2020-09-04', 'Sim', '25'),
(4, 29, '35.00', '2020-08-24', '2020-09-02', 'Não', ''),
(5, 28, '50.00', '2020-08-31', '2020-09-08', 'Sim', ''),
(6, 25, '45.00', '2020-09-02', '2020-09-02', 'Sim', '10'),
(7, 24, '42.50', '2020-09-02', '2020-09-04', 'Sim', '15'),
(8, 22, '89.91', '2020-09-02', '2020-09-04', 'Sim', '10'),
(9, 18, '170.99', '2020-09-02', '2020-09-02', 'Sim', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `nome`, `nome_url`, `imagem`, `id_categoria`) VALUES
(14, 'Cueca Masculina', 'cueca-masculina', 'item-1.png', 10),
(15, 'Cuecas Femeninas', 'cuecas-femeninas', 'item-2.png', 10),
(16, 'Calcinha', 'calcinha', 'item-3.png', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_envios`
--

CREATE TABLE `tipo_envios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_envios`
--

INSERT INTO `tipo_envios` (`id`, `nome`) VALUES
(1, 'Correios'),
(2, 'Valor Fixo'),
(3, 'Sem Frete'),
(4, 'Digital');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `senha_crip` varchar(150) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `senha_crip`, `nivel`) VALUES
(1, 'Administrador', '000.000.000-00', 'lojaportalhugo@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Admin'),
(5, 'Alice Santos', '000.000.000-40', 'alice@hotmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(6, 'Cliente Teste', '000.000.000-10', 'cliente@hotmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(7, 'Matheus Silva', '184.854.545-44', 'mateus@hotmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(8, 'Rozane da cruz salomao', '141.496.458-76', 'ro@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carac`
--
ALTER TABLE `carac`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carac_itens`
--
ALTER TABLE `carac_itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carac_prod`
--
ALTER TABLE `carac_prod`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prod_combos`
--
ALTER TABLE `prod_combos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `promocao_banner`
--
ALTER TABLE `promocao_banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_envios`
--
ALTER TABLE `tipo_envios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `carac`
--
ALTER TABLE `carac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `carac_itens`
--
ALTER TABLE `carac_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `carac_prod`
--
ALTER TABLE `carac_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `prod_combos`
--
ALTER TABLE `prod_combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `promocao_banner`
--
ALTER TABLE `promocao_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tipo_envios`
--
ALTER TABLE `tipo_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
