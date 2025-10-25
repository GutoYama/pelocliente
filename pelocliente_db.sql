-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2025 às 19:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pelocliente_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nome`, `cpf`, `endereco`, `telefone`, `email`) VALUES
(1, 'João da Silva', '12345678901', 'Rua das Laranjeiras, 120 - Centro', '(11) 3456-7890', 'joao.silva@email.com'),
(2, 'Maria Oliveira', '98765432100', 'Av. Brasil, 980 - Jardim América', '(21) 99876-5432', 'maria.oliveira@email.com'),
(3, 'Carlos Souza', '45678912344', 'Rua da Tecnologia, 50 - Pinheiros', '(31) 3456-1122', 'carlos.souza@email.com'),
(4, 'Ana Pereira', '78912345611', 'Rua dos Coqueiros, 220 - Bela Vista', '(41) 3344-5566', 'ana.pereira@email.com'),
(5, 'Paulo Lima', '32165498722', 'Av. das Nações, 500 - Centro', '(51) 2222-8888', 'paulo.lima@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `composicao`
--

CREATE TABLE `composicao` (
  `cod_prato` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL,
  `quantidade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `composicao`
--

INSERT INTO `composicao` (`cod_prato`, `cod_ingrediente`, `quantidade`) VALUES
(1, 1, 0.5),
(1, 2, 3),
(2, 1, 0.3),
(2, 2, 2),
(3, 1, 0.4),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `cod_compra` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL,
  `cod_fornecedor` int(11) NOT NULL,
  `quantidade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compra`
--

INSERT INTO `compra` (`cod_compra`, `cod_ingrediente`, `cod_fornecedor`, `quantidade`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 20),
(3, 1, 3, 15),
(4, 2, 1, 30),
(5, 2, 2, 50),
(6, 2, 4, 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cod_fornecedor` int(11) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cod_fornecedor`, `nome_fantasia`, `endereco`, `cnpj`, `telefone`) VALUES
(1, 'Comercial São José', 'Rua das Flores, 120 - Centro', '12345678000199', '(11) 3456-7890'),
(2, 'Distribuidora Oliveira', 'Av. Brasil, 980 - Jardim América', '98765432000155', '(21) 99876-5432'),
(3, 'Tech Importadora', 'Rua da Tecnologia, 50 - Pinheiros', '45678912000144', '(31) 3456-1122'),
(4, 'Alimentos Vitória', 'Rua dos Coqueiros, 220 - Bela Vista', '78912345000133', '(41) 3344-5566'),
(5, 'Papelaria Central', 'Av. das Nações, 500 - Centro', '32165487000122', '(51) 2222-8888');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `cod_ingrediente` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `cod_unidade` int(11) NOT NULL,
  `valor_unit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingrediente`
--

INSERT INTO `ingrediente` (`cod_ingrediente`, `descricao`, `quantidade`, `cod_unidade`, `valor_unit`) VALUES
(1, 'Farinha de Trigo', 5, 1, 4.5),
(2, 'Ovos', 12, 2, 0.8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `cod_prato` int(11) NOT NULL,
  `cod_pedido` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prato`
--

CREATE TABLE `prato` (
  `cod_prato` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prato`
--

INSERT INTO `prato` (`cod_prato`, `descricao`, `valor`) VALUES
(1, 'Arroz com Frango', 18.5),
(2, 'Feijoada Completa', 25),
(3, 'Lasanha de Carne', 22.75),
(4, 'Salada Caesar', 15),
(5, 'Bife à Parmegiana', 27.5),
(6, 'Bolo Simples', 15),
(7, 'Panqueca', 12),
(8, 'Massa de Pastel', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `cod_unidade` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `sigla` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`cod_unidade`, `descricao`, `sigla`) VALUES
(1, 'Quilograma', 'Kg'),
(2, 'Unidade', 'Un'),
(3, 'Gramas', 'g');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices de tabela `composicao`
--
ALTER TABLE `composicao`
  ADD KEY `fk_composicao_prato` (`cod_prato`),
  ADD KEY `fk_composicao_ingrediente` (`cod_ingrediente`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `fk_compra_ingrediente` (`cod_ingrediente`),
  ADD KEY `fk_compra_fornecedor` (`cod_fornecedor`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cod_fornecedor`);

--
-- Índices de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`cod_ingrediente`),
  ADD KEY `fk_ingrediente_unidade` (`cod_unidade`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD KEY `fk_itens_pedido_pedido` (`cod_pedido`),
  ADD KEY `fk_itens_pedido_prato` (`cod_prato`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `fk_pedido_cliente` (`cod_cliente`);

--
-- Índices de tabela `prato`
--
ALTER TABLE `prato`
  ADD PRIMARY KEY (`cod_prato`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`cod_unidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `cod_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prato`
--
ALTER TABLE `prato`
  MODIFY `cod_prato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `cod_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `composicao`
--
ALTER TABLE `composicao`
  ADD CONSTRAINT `fk_composicao_ingrediente` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingrediente` (`cod_ingrediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_composicao_prato` FOREIGN KEY (`cod_prato`) REFERENCES `prato` (`cod_prato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_fornecedor` FOREIGN KEY (`cod_fornecedor`) REFERENCES `fornecedor` (`cod_fornecedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_ingrediente` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingrediente` (`cod_ingrediente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `fk_ingrediente_unidade` FOREIGN KEY (`cod_unidade`) REFERENCES `unidade` (`cod_unidade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `fk_itens_pedido_pedido` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`cod_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itens_pedido_prato` FOREIGN KEY (`cod_prato`) REFERENCES `prato` (`cod_prato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
