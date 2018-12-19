-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2018 às 18:38
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softlog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razaoSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `razaoSocial`, `email`, `bairro`, `telefone`, `cp`, `fax`, `cidade`, `site`) VALUES
(1, 'AngoReal', '', '', '', '', '', '', '', 'www.angoreal.ao'),
(2, 'AngoReal1', 'n/a', 'n@hotmail.com', '', '92188990', 'AO 0000', '00000', 'Luanda', 'www.angoreal.ao1'),
(3, 'AngoReal11', '', '', '', '', '', '', '', 'www.angoreal.ao1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedorreq`
--

CREATE TABLE `fornecedorreq` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `sessao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedorreq`
--

INSERT INTO `fornecedorreq` (`id`, `idProduto`, `idFornecedor`, `sessao`) VALUES
(1, 3, 0, '5c0fa00bf2c7c'),
(2, 3, 0, '5c0fa00bf2c7c'),
(3, 3, 0, '5c0fa00bf2c7c'),
(4, 3, 0, '5c0fa00bf2c7c'),
(5, 3, 2, '5c0fa00bf2c7c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cargo`, `departamento`) VALUES
(2, 'JoÃ£o', 'TÃ©cnico Informatico', 'DIR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensrequisicao`
--

CREATE TABLE `itensrequisicao` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `sessao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `especificacoes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itensrequisicao`
--

INSERT INTO `itensrequisicao` (`id`, `idProduto`, `qtd`, `sessao`, `especificacoes`) VALUES
(1, 1, 2, '5c0651a8c76c6', ''),
(2, 3, 3, '5c0651a8c76c6', ''),
(3, 4, 0, '5c069baf1a1a9', ''),
(4, 4, 1, '5c0fa00bf2c7c', 'rapido'),
(5, 3, 3, '5c0fa00bf2c7c', 'rapido'),
(6, 1, 44, '5c0fa00bf2c7c', 'rapido'),
(7, 4, 1, '5c1a39709c5b4', 'n/a'),
(8, 4, 3, '5c1a39bb806b9', 'nÃ£o hÃ¡');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `hora_Log` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `data_Log` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `idUser`, `tipo`, `hora_Log`, `data_Log`) VALUES
(1, 3, 1, '14:42:12', '04-12-2018'),
(2, 3, 1, '14:42:26', '04-12-2018'),
(3, 3, 1, '16:12:23', '04-12-2018'),
(4, 3, 1, '12:35:53', '10-12-2018'),
(5, 3, 1, '12:16:02', '11-12-2018'),
(6, 3, 1, '22:53:27', '17-12-2018'),
(7, 3, 1, '23:01:24', '17-12-2018'),
(8, 4, 1, '23:03:27', '17-12-2018'),
(9, 3, 1, '11:23:52', '18-12-2018'),
(10, 4, 1, '14:00:55', '18-12-2018'),
(11, 3, 1, '14:06:44', '18-12-2018'),
(12, 5, 1, '14:09:29', '18-12-2018'),
(13, 5, 1, '14:12:56', '18-12-2018'),
(14, 4, 1, '14:15:16', '18-12-2018'),
(15, 5, 1, '14:18:15', '18-12-2018'),
(16, 5, 1, '14:19:16', '18-12-2018'),
(17, 4, 1, '14:28:40', '18-12-2018'),
(18, 3, 1, '14:29:17', '18-12-2018'),
(19, 3, 1, '15:58:28', '18-12-2018'),
(20, 4, 1, '15:58:37', '18-12-2018'),
(21, 5, 1, '16:04:02', '18-12-2018'),
(22, 5, 1, '16:25:35', '18-12-2018'),
(23, 5, 1, '00:48:31', '19-12-2018'),
(24, 3, 1, '12:48:05', '19-12-2018'),
(25, 4, 1, '12:48:30', '19-12-2018'),
(26, 5, 1, '12:48:48', '19-12-2018'),
(27, 4, 1, '13:28:04', '19-12-2018'),
(28, 3, 1, '13:31:42', '19-12-2018'),
(29, 5, 1, '13:38:16', '19-12-2018'),
(30, 4, 1, '15:01:14', '19-12-2018'),
(31, 5, 1, '15:02:57', '19-12-2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `especificacoes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria`, `nome`, `especificacoes`) VALUES
(1, 'Produto', 'Samsung', ''),
(3, 'ServiÃ§o', 'Lapiseira', 'Lapiseira Azul'),
(4, 'ServiÃ§o', 'ServiÃ§os de Contabilidade', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `representante`
--

CREATE TABLE `representante` (
  `id` int(11) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `representante`
--

INSERT INTO `representante` (`id`, `idFornecedor`, `nome`, `bairro`, `email`, `cidade`) VALUES
(1, 0, 'NÃ¡ldio', '', '', ''),
(2, 2, 'NÃ¡ldio1', 'S.paulo', 'n/a', 'Luanda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao`
--

CREATE TABLE `requisicao` (
  `id` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `urgencia` int(11) NOT NULL,
  `obs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sessao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `requisicao`
--

INSERT INTO `requisicao` (`id`, `idFuncionario`, `data`, `status`, `urgencia`, `obs`, `sessao`, `idFornecedor`) VALUES
(1, 2, '3', 1, 0, '0', '5c053c4e8440e', 0),
(2, 2, '04-12-2018', 2, 0, '', '5c0651a8c76c6', 0),
(3, 2, '04-12-2018', 2, 0, '', '5c069baf1a1a9', 0),
(4, 2, '11-12-2018', 1, 0, '', '5c0fa00bf2c7c', 0),
(5, 2, '19-12-2018', 1, 0, '', '5c1a39709c5b4', 0),
(6, 2, '19-12-2018', 1, 0, '', '5c1a39bb806b9', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `dataEntrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaEntrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataExpiracao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id`, `idProduto`, `qtd`, `dataEntrada`, `horaEntrada`, `dataExpiracao`) VALUES
(1, 1, 10, '', '', '2018-12-18'),
(2, 1, 10, '', '', '2018-12-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `idFuncionario`, `tipo`, `userName`, `senha`) VALUES
(3, 0, 1, 'iva', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(4, 2, 3, 'joao', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(5, 0, 2, 'compras', 'e8d95a51f3af4a3b134bf6bb680a213a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedorreq`
--
ALTER TABLE `fornecedorreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itensrequisicao`
--
ALTER TABLE `itensrequisicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisicao`
--
ALTER TABLE `requisicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fornecedorreq`
--
ALTER TABLE `fornecedorreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `itensrequisicao`
--
ALTER TABLE `itensrequisicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `representante`
--
ALTER TABLE `representante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requisicao`
--
ALTER TABLE `requisicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
