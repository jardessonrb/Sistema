-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2019 às 16:23
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbo_memorando`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_funcionario`
--

CREATE TABLE `tab_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(200) NOT NULL,
  `cpf_funcionario` varchar(16) NOT NULL,
  `telefone1_funcionario` varchar(15) NOT NULL,
  `telefone2_funcionario` varchar(15) NOT NULL,
  `cargo_funcionario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_funcionario`
--

INSERT INTO `tab_funcionario` (`id_funcionario`, `nome_funcionario`, `cpf_funcionario`, `telefone1_funcionario`, `telefone2_funcionario`, `cargo_funcionario`) VALUES
(10, 'Administrador do Sistema', '000.000.000-00', '(00) 00000-0000', '(00) 00000-0000', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_local`
--

CREATE TABLE `tab_local` (
  `id_local` int(11) NOT NULL,
  `nome_predio` varchar(100) CHARACTER SET utf8 NOT NULL,
  `setor_local` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_memorando`
--

CREATE TABLE `tab_memorando` (
  `id_memorando` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `emissor_memorando` varchar(200) NOT NULL,
  `data_memorando` date NOT NULL,
  `destino_memorando` varchar(200) NOT NULL,
  `assunto_memorando` varchar(100) NOT NULL,
  `corpo_memorando` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nome_usuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `senha_usuario` varchar(150) CHARACTER SET utf8 NOT NULL,
  `nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `captura_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id_usuario`, `id_funcionario`, `nome_usuario`, `senha_usuario`, `nivel_acesso`, `captura_usuario`) VALUES
(9, 10, 'Administrador', 'admin117', 3, '2019-08-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `tab_local`
--
ALTER TABLE `tab_local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indexes for table `tab_memorando`
--
ALTER TABLE `tab_memorando`
  ADD PRIMARY KEY (`id_memorando`),
  ADD KEY `fk_users` (`id_usuario`),
  ADD KEY `fk_loc` (`id_local`),
  ADD KEY `fk_idfun` (`id_funcionario`);

--
-- Indexes for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_user` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tab_local`
--
ALTER TABLE `tab_local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_memorando`
--
ALTER TABLE `tab_memorando`
  MODIFY `id_memorando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_memorando`
--
ALTER TABLE `tab_memorando`
  ADD CONSTRAINT `fk_idfun` FOREIGN KEY (`id_funcionario`) REFERENCES `tab_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `fk_loc` FOREIGN KEY (`id_local`) REFERENCES `tab_local` (`id_local`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id_usuario`) REFERENCES `tab_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_funcionario`) REFERENCES `tab_funcionario` (`id_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
