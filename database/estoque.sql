-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Out-2018 às 14:25
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL,
  `dataCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nome_categoria`, `dataCaptura`) VALUES
(3, 6, 'CalÃ§as', '2018-05-17'),
(4, 6, 'Bermudas', '2018-05-17'),
(5, 6, 'TÃªnis', '2018-05-17'),
(6, 6, 'Sapatos', '2018-05-17'),
(7, 6, 'Camisas', '2018-05-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nome`, `sobrenome`, `endereco`, `email`, `telefone`, `cpf`) VALUES
(8, 9, 'Marcos', 'Andre', 'rua bem ali', 'andre02@gmail.com', '(65) 34543-5734', '889.898.989-89'),
(10, 9, 'Joao', 'Godofredo', 'Rua bem ali', 'godofredo@mail.com', '(43) 56464-5654', '768.686.778-67'),
(11, 9, 'Teste', 'Teste', 'rua bem ali', 'teste@email.com', '(43) 54354-3543', '904.092.409-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `id_usuario`, `nome`, `sobrenome`, `endereco`, `email`, `telefone`, `cpf`) VALUES
(3, 6, 'FÃ¡bio', 'Juazeiro', 'Rua D', 'fabio@hotmail.com', '(66) 77768-7886', '843.284.982-39'),
(4, 9, 'Marcos', 'Andre', 'rua bem ali', 'andre@email.com', '(85) 98732-8322', '078.751.883-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `dataUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_imagem`, `id_categoria`, `nome`, `url`, `dataUpload`) VALUES
(9, 5, 'niketenis.jpg', '../../arquivos/niketenis.jpg', '2018-08-25'),
(10, 7, 'camisa.jpg', '../../arquivos/camisa.jpg', '2018-08-25'),
(12, 4, 'bermuda.jpg', '../../arquivos/bermuda.jpg', '2018-08-25'),
(13, 6, 'sapatosocial.jpg', '../../arquivos/sapatosocial.jpg', '2018-08-25'),
(14, 5, 'converse.jpg', '../../arquivos/converse.jpg', '2018-08-25'),
(15, 3, 'calca.jpg', '../../arquivos/calca.jpg', '2018-08-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_imagem` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `dataCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_categoria`, `id_imagem`, `id_usuario`, `nome`, `descricao`, `quantidade`, `preco`, `dataCaptura`) VALUES
(9, 5, 9, 9, 'Tenis Nike', 'Tamanho: 39 Cor: Preta', 27, 299, '2018-08-25'),
(10, 7, 10, 9, 'Camisa Social', 'Tamanho: M', 14, 129, '2018-08-25'),
(12, 4, 12, 9, 'Bermuda Nike', 'Tamanho M', 656, 49, '2018-08-25'),
(13, 6, 13, 9, 'Sapato Social', 'Tamanho: 39', 43, 79, '2018-08-25'),
(14, 5, 14, 9, 'TÃªnis Converse', 'Tamanho: 42, Cor: Preta', 397, 149, '2018-08-25'),
(15, 3, 15, 9, 'CalÃ§a Jeans', 'Tamanho: 40, Cor: Preta', 51, 149, '2018-08-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `email`, `senha`, `dataCaptura`) VALUES
(9, 'Marcos Andre', 'marcos_developer', 'marcos@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2018-08-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total_venda` float NOT NULL,
  `dataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_cliente`, `id_produto`, `id_usuario`, `preco`, `quantidade`, `total_venda`, `dataCompra`) VALUES
(18, 11, 15, 9, 149, 4, 596, '2018-08-26'),
(19, 8, 13, 9, 79, 4, 981, '2018-08-26'),
(19, 8, 12, 9, 49, 4, 981, '2018-08-26'),
(19, 8, 10, 9, 129, 4, 981, '2018-08-26'),
(19, 8, 14, 9, 149, 4, 981, '2018-08-26'),
(20, 8, 9, 9, 299, 5, 1740, '2018-08-26'),
(20, 8, 12, 9, 49, 5, 1740, '2018-08-26'),
(20, 8, 15, 9, 149, 5, 1740, '2018-08-26'),
(21, 8, 12, 9, 49, 0, 545, '2018-08-26'),
(21, 8, 14, 9, 149, 0, 545, '2018-08-26'),
(22, 9, 13, 9, 79, 13, 3966, '2018-08-26'),
(22, 9, 9, 9, 299, 13, 3966, '2018-08-26'),
(23, 8, 9, 9, 299, 1, 1025, '2018-08-26'),
(23, 8, 15, 9, 149, 1, 1025, '2018-08-26'),
(23, 8, 10, 9, 129, 1, 1025, '2018-08-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
