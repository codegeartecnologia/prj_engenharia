-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2015 às 03:14
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acadbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
`id` bigint(20) unsigned NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `apresentacao` char(1) NOT NULL DEFAULT 'n',
  `nome_imagem` varchar(255) NOT NULL,
  `tipo_servico` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `titulo`, `descricao`, `apresentacao`, `nome_imagem`, `tipo_servico`, `texto`, `datacad`) VALUES
(1, 'Edição do Teste 2', 'Edição do Teste 2', 'n', '5553ae3e4817e.png', 'Saneamento', 'Edição do Teste 2', '2015-05-11 20:08:09'),
(2, 'Edição do Teste 2', 'Edição do Teste 2', 'n', '55510c9936fe2.png', 'Obras', 'Edição do  Teste 2.', '2015-05-11 20:10:01'),
(3, 'Teste 3', 'Teste3', 'n', '55510ecdb1a45.png', 'Obras', 'Test3', '2015-05-11 20:19:25'),
(4, 'Projeto Arquitetônico', 'Ao iniciar um projeto de arquitetura o arquiteto deve-se atentar para os procedimentos que o sistema exige.', 'n', '5551216be4949.png', 'Engenharia', 'Ao iniciar um projeto de arquitetura em alvenaria estrutural, o arquiteto deve atentar para os procedimentos que o sistema exige. O projeto arquitetônico deve ser desenvolvido desde o estudo de viabilidade levando-se em consideração o princípio dos "painéis" e a modulação da família de blocos previamente escolhida. Desta forma, o arquiteto desenvolve suas ideias e o programa de projeto definido com o cliente, já oferecendo soluções beneficiadas pelo potencial do sistema construtivo e não avançando além de suas limitações.', '2015-05-11 21:38:52'),
(5, 'Obras de Urbanização', 'Pavimentação, Urbanização e Revitalização', 'n', '5551342bf158b.png', 'Obras', 'Ttetste \r\nPavimentação, Urbanização e Revitalização\r\nPavimentação, Urbanização e Revitalização', '2015-05-11 22:58:52'),
(6, 'Saneamento', 'Revitalização do sistema de afluente da cidade de Ponta Grossa - PR', 'n', '555134bb2087b.png', 'Saneamento', 'Toda a extensão da orla da Praia da Tereza, no bairro Balneário em São Pedro da Aldeia, na Região dos Lagos do Rio, está passando por obras de drenagem, urbanização e revitalização. Nesta terça-feira (3), cerca de 50 metros de manilhas foram instaladas no local para a construção da rede de drenagem de águas pluviais. A obra é realizada por meio da Secretaria de Serviços Públicos.', '2015-05-11 23:01:15'),
(7, 'Obras de Urbanização', 'Obras em Jaguariaíva - PR', 'n', '55513569e220d.png', 'Obras', 'Obras em todas as ruas e avenidas de jaguariaíva - PR.', '2015-05-11 23:04:09'),
(8, 'Engenharia', 'Construção do posto Hospitalar em Arapoti - PR.', 'n', '5551366874f2e.png', 'Engenharia', 'Em Arapoti - PR foi construído um novo posto no centro da cidade para melhores atendimento ao povo aropotenses.', '2015-05-11 23:08:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE IF NOT EXISTS `suporte` (
`id` int(11) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `solucao` text NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` bigint(20) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `administrador` char(1) NOT NULL DEFAULT 'n',
  `ativo` char(1) NOT NULL DEFAULT 's',
  `datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `administrador`, `ativo`, `datacad`) VALUES
(1, 'Djalma Manfrin', 'djalma@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', 's', 's', '2015-03-17 23:28:17'),
(2, 'Teste', 'teste@hotmail.com', '698dc19d489c4e4db73e28a713eab07b', 'n', 's', '2015-03-18 00:15:05'),
(5, 'Julia Manfrin', 'julia.manfrin@site.com', '827ccb0eea8a706c4c34a16891f84e7b', 'n', 's', '2015-05-11 12:44:21'),
(6, 'Ana Caroline Manfrin', 'anac.manfrin@site.com', '827ccb0eea8a706c4c34a16891f84e7b', 'n', 's', '2015-05-11 12:47:06'),
(7, 'Gabriela Rodrigues', 'gabi@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'n', 's', '2015-05-11 12:54:45'),
(21, 'Loudes Manfrin', 'lourdes.manfrin@site.com', '827ccb0eea8a706c4c34a16891f84e7b', 'n', 's', '2015-05-12 18:23:46'),
(22, 'Lucia Rodrigues', 'lucia.rodrigues@site.com', '81dc9bdb52d04dc20036dbd8313ed055', 'n', 's', '2015-05-12 18:25:48'),
(23, 'Tiago Manfrin', 'tiago@site.com', '827ccb0eea8a706c4c34a16891f84e7b', 'n', 's', '2015-05-12 18:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `suporte`
--
ALTER TABLE `suporte`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `suporte`
--
ALTER TABLE `suporte`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
