-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/09/2016 às 16:07
-- Versão do servidor: 5.7.11
-- Versão do PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `endereco` varchar(520) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `endereco`
--

INSERT INTO `endereco` (`id`, `endereco`, `numero`, `usuario_id`) VALUES
(1, 'Rua Sem Nome', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `cpf` varchar(220) NOT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `email` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `usuario`, `senha` , `email`) VALUES
(1, 'Diogo', '123', 'Diogo', '202cb962ac59075b964b07152d234b70','diogo@foze.com.br');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Table structure for table `mensagens_contatos`
--

CREATE TABLE IF NOT EXISTS `mensagens_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `assunto` varchar(220) NOT NULL,
  `mensagem` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mensagens_contatos`
--

INSERT INTO `mensagens_contatos` (`id`, `nome`, `email`, `assunto`, `mensagem`, `created`, `modified`) VALUES
(1, 'Diogo', 'diogo@foze.com.br', 'teste1', 'teste1', '2016-07-24 21:03:00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

