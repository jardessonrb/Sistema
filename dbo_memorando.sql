-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2019 às 16:44
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
(5, 'Administrador', '12564589500', '(00) 00000-0000', '86885474592', 'Administrador 01'),
(6, 'Járdesson Ribeiro', '000.000.000-00', '(86) 96666-6666', '(86) 99999-9999', 'Funcionário'),
(8, 'Járdesson funcionário', '122.200.000-00', '(86) 99999-9999', '(68) 95555-5555', 'Funcionário'),
(9, 'João Administrador', '000.000.000-22', '(86) 59999-9999', '(86) 59999-9999', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_local`
--

CREATE TABLE `tab_local` (
  `id_local` int(11) NOT NULL,
  `nome_predio` varchar(100) CHARACTER SET utf8 NOT NULL,
  `setor_local` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_local`
--

INSERT INTO `tab_local` (`id_local`, `nome_predio`, `setor_local`) VALUES
(5, 'Anexo', 'RecepÃ§Ã£o 02');

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

--
-- Extraindo dados da tabela `tab_memorando`
--

INSERT INTO `tab_memorando` (`id_memorando`, `id_funcionario`, `id_usuario`, `id_local`, `emissor_memorando`, `data_memorando`, `destino_memorando`, `assunto_memorando`, `corpo_memorando`) VALUES
(24, 6, 4, 5, 'Administrador', '2019-07-29', 'R.H', 'Testando pelo metodo post do proprio PHP', '<h4 style=\"text-align: center;\">Testando formata&ccedil;&atilde;o</h4>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testando Formata&ccedil;&atilde;o de Memorando</p>\r\n<p>Testando fonte</p>\r\n<p>Testando cadastro</p>'),
(25, 6, 4, 5, 'Administrador', '2019-07-30', 'ADM', 'Testando no caminho certo', '<h2 style=\"text-align: center;\"><strong>Testando Formata&ccedil;&atilde;o de Memorando</strong></h2>\r\n<h5>testando paragrafo</h5>\r\n<h5>testando outras fontes</h5>\r\n<h5>(utf8 formata&ccedil;&atilde;o, inscri&ccedil;&atilde;o, terminadas em &atilde;o...)</h5>\r\n<h5 style=\"text-align: center;\">&nbsp;</h5>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\"><strong>Testando Atualiza&ccedil;&atilde;o de Modal...</strong></p>'),
(27, 6, 4, 5, 'Administrador', '2019-07-29', 'R.H', 'Testando Tamanho do EspaÃ§o', '<h5><strong>Testando tamanho de espa&ccedil;amento... bora testar agora a parte de largura <br /></strong></h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5>&nbsp;</h5>\r\n<h5><strong>Teste ...</strong></h5>'),
(28, 6, 4, 5, 'Administrador', '2019-07-29', 'R.H', 'Teste na rede', '<p style=\"text-align: center;\"><strong>Testando memorando na rede</strong></p>\r\n<p style=\"text-align: left;\">Testando memorando de teste deddddddd</p>\r\n<p style=\"text-align: left;\">sdsddsdsd</p>\r\n<p style=\"text-align: left;\">sdsdsdsds</p>\r\n<p style=\"text-align: left;\">sdsdsddsds</p>\r\n<p style=\"text-align: left;\">dsdsdds</p>\r\n<p style=\"text-align: left;\">sdsdsd</p>\r\n<p style=\"text-align: left;\">sdsdsdsd</p>\r\n<p style=\"text-align: left;\">sdsdsdsd</p>\r\n<p style=\"text-align: left;\">Ass. J&aacute;rdesson.</p>'),
(30, 5, 6, 5, 'JÃ¡rdesson Ribeiro', '2019-07-30', 'R.H', 'Teste de id do usuario', '<h6 style=\"text-align: center;\">Testando o id do usuario no memorando</h6>\r\n<p>fechamento de teste de impress&atilde;o.</p>\r\n<p>asdasdasd</p>\r\n<p>&nbsp;</p>\r\n<p>asdasdasdasd</p>\r\n<p><strong>asdasdasd</strong></p>'),
(31, 6, 4, 5, 'Administrador', '2019-08-02', 'R.H', 'Testando a impressora na sala', '<h2 style=\"text-align: center;\"><strong>Testando Impressora</strong></h2>\r\n<p>testando a formata&ccedil;&atilde;o do memorando e da impressora na sala do T.I, teste</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Ass. J&aacute;rdesson Ribeiro</p>');

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
(4, 5, 'admin', '123', 3, '2019-07-29'),
(6, 6, 'jardesson', '117', 3, '2019-07-29');

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
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tab_local`
--
ALTER TABLE `tab_local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_memorando`
--
ALTER TABLE `tab_memorando`
  MODIFY `id_memorando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
