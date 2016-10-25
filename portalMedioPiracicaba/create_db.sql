-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13-Jul-2016 às 20:14
-- Versão do servidor: 5.7.12-0ubuntu1.1
-- PHP Version: 5.6.23-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalMedio`
--

-- DROP USER IF EXISTS 'sisPortalMedio';
-- CREATE USER IF NOT EXISTS 'sisPortalMedio'@'localhost' IDENTIFIED BY 'sisPortalMedio';
-- GRANT ALL PRIVILEGES ON * . * TO 'sisPortalMedio'@'localhost';
-- FLUSH PRIVILEGES; 

DROP DATABASE IF EXISTS `portalMedio`;
CREATE DATABASE `portalMedio`;

USE `portalMedio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atrativo_turisticos`
--

CREATE TABLE `atrativo_turisticos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `descricao`) VALUES
(1, 'JoÃ£o Monlevade', 'Aqui Ã© Body Builder Ipsum PORRA! Sabe o que Ã© isso daÃ­? TrapÃ©zio descendente Ã© o nome disso aÃ­. Bora caralho, vocÃª quer ver essa porra velho. Vamo monstro! Birl! Ajuda o maluco que tÃ¡ doente. Negativa Bambam negativa.\r\n\r\nVem porra! Ã‰ esse que a gente quer, Ã© ele que nÃ³is vamo buscar. Ã‰ 37 anos caralho! Sabe o que Ã© isso daÃ­? TrapÃ©zio descendente Ã© o nome disso aÃ­. Bora caralho, vocÃª quer ver essa porra velho. Vo derrubar tudo essas Ã¡rvore do parque ibirapuera.\r\n\r\nAHHHHHHHHHHHHHHHHHHHHHH..., porra! Bora caralho, vocÃª quer ver essa porra velho. Ajuda o maluco que tÃ¡ doente. Sai de casa comi pra caralho porra. Ã‰ verÃ£o o ano todo vem cumpadi. Aqui Ã© bodybuilder porra!\r\n\r\nÃ‰ 37 anos caralho! Boraaa, Hora do Show Porra. Aqui Ã© bodybuilder porra! Sai de casa comi pra caralho porra. Aqui nÃ³is constrÃ³i fibra, nÃ£o Ã© Ã¡gua com mÃºsculo. Vamo monstro!\r\n\r\nBirl! Negativa Bambam negativa. Vo derrubar tudo essas Ã¡rvore do parque ibirapuera. Vamo monstro! Ele tÃ¡ olhando pra gente. Ã‰ 37 anos caralho!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `periodos` int(11) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `escola_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denominacaos`
--

CREATE TABLE `denominacaos` (
  `id` int(11) NOT NULL,
  `denominacao` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `economias`
--

CREATE TABLE `economias` (
  `id` int(11) NOT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_onibuses`
--

CREATE TABLE `empresa_onibuses` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `foto_anuncio` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `espaco_eventos`
--

CREATE TABLE `espaco_eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `foto_anuncio` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatisticas`
--

CREATE TABLE `estatisticas` (
  `id` int(11) NOT NULL,
  `area_territorial` varchar(45) DEFAULT NULL,
  `micro_regiao` varchar(45) DEFAULT NULL,
  `eleitores` int(11) DEFAULT NULL,
  `secoes` int(11) DEFAULT NULL,
  `indice_pluviometrico` int(11) DEFAULT NULL,
  `altitude_max` int(11) DEFAULT NULL,
  `altitude_min` int(11) DEFAULT NULL,
  `altitude_centro` int(11) DEFAULT NULL,
  `relevo_plano` double DEFAULT NULL,
  `relevo_ondulado` double DEFAULT NULL,
  `relevo_montanhoso` double DEFAULT NULL,
  `clima` varchar(45) DEFAULT NULL,
  `temp_anual` double DEFAULT NULL,
  `temp_max` double DEFAULT NULL,
  `temp_min` double DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `foto_anuncio` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotosprefeitos`
--

CREATE TABLE `fotosprefeitos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `prefeito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_atrativos`
--

CREATE TABLE `foto_atrativos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `atrativo_turistico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_distritos`
--

CREATE TABLE `foto_distritos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `distrito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_escolas`
--

CREATE TABLE `foto_escolas` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `escola_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_espacos`
--

CREATE TABLE `foto_espacos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `espaco_evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_eventos`
--

CREATE TABLE `foto_eventos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_orgaos`
--

CREATE TABLE `foto_orgaos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `orgao_publico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_rios`
--

CREATE TABLE `foto_rios` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `rio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_saudes`
--

CREATE TABLE `foto_saudes` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `saude_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencias`
--

CREATE TABLE `frequencias` (
  `id` int(11) NOT NULL,
  `horario` time DEFAULT NULL,
  `frequencia` varchar(45) DEFAULT NULL,
  `onibus_rota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fundadors`
--

CREATE TABLE `fundadors` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `biografia` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historias`
--

CREATE TABLE `historias` (
  `id` int(11) NOT NULL,
  `historia` longtext NOT NULL,
  `adocao_nome` longtext,
  `emancipacao` longtext,
  `adjetivo_patrio` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leis`
--

CREATE TABLE `leis` (
  `id` int(11) NOT NULL,
  `descricao` longtext,
  `nome` varchar(45) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mandatos`
--

CREATE TABLE `mandatos` (
  `id` int(11) NOT NULL,
  `ano_inicio` varchar(45) DEFAULT NULL,
  `ano_termino` varchar(45) DEFAULT NULL,
  `prefeito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `especialidade` varchar(45) DEFAULT NULL,
  `cidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `onibus_rotas`
--

CREATE TABLE `onibus_rotas` (
  `id` int(11) NOT NULL,
  `rota` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `empresa_onibus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgao_publicos`
--

CREATE TABLE `orgao_publicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `foto_anuncio` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `site` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimonios`
--

CREATE TABLE `patrimonios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `populacaos`
--

CREATE TABLE `populacaos` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefeitos`
--

CREATE TABLE `prefeitos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `partido` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadors`
--

CREATE TABLE `prestadors` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `especialidade` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `icms` double DEFAULT NULL,
  `outras` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rios`
--

CREATE TABLE `rios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saudes`
--

CREATE TABLE `saudes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `localização` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `foto_anuncio` varchar(255) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `simbolos`
--

CREATE TABLE `simbolos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atrativo_turisticos`
--
ALTER TABLE `atrativo_turisticos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_atrativosturisticos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`,`escola_id`),
  ADD KEY `fk_cursos_escolas1_idx` (`escola_id`);

--
-- Indexes for table `denominacaos`
--
ALTER TABLE `denominacaos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_denominacoes_cidades_idx` (`cidade_id`);

--
-- Indexes for table `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_distritos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`,`cidades_id`),
  ADD KEY `fk_documentos_cidades1_idx` (`cidades_id`);

--
-- Indexes for table `economias`
--
ALTER TABLE `economias`
  ADD PRIMARY KEY (`id`,`cidades_id`),
  ADD KEY `fk_economias_cidades1_idx` (`cidades_id`);

--
-- Indexes for table `empresa_onibuses`
--
ALTER TABLE `empresa_onibuses`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_empresasonibuses_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`,`cidades_id`),
  ADD KEY `fk_enderecos_cidades1_idx` (`cidades_id`);

--
-- Indexes for table `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_escolas_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `espaco_eventos`
--
ALTER TABLE `espaco_eventos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_espacoseventos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `estatisticas`
--
ALTER TABLE `estatisticas`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_estatisticas_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_eventos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_fotosaereas_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `fotosprefeitos`
--
ALTER TABLE `fotosprefeitos`
  ADD PRIMARY KEY (`id`,`prefeito_id`),
  ADD KEY `fk_fotosprefeitos_prefeitos1_idx` (`prefeito_id`);

--
-- Indexes for table `foto_atrativos`
--
ALTER TABLE `foto_atrativos`
  ADD PRIMARY KEY (`id`,`atrativo_turistico_id`),
  ADD KEY `fk_foto_atrativos_atrativo_turisticos1_idx` (`atrativo_turistico_id`);

--
-- Indexes for table `foto_distritos`
--
ALTER TABLE `foto_distritos`
  ADD PRIMARY KEY (`id`,`distrito_id`),
  ADD KEY `fk_foto_distritos_distritos1_idx` (`distrito_id`);

--
-- Indexes for table `foto_escolas`
--
ALTER TABLE `foto_escolas`
  ADD PRIMARY KEY (`id`,`escola_id`),
  ADD KEY `fk_foto_escolas_escolas1_idx` (`escola_id`);

--
-- Indexes for table `foto_espacos`
--
ALTER TABLE `foto_espacos`
  ADD PRIMARY KEY (`id`,`espaco_evento_id`),
  ADD KEY `fk_foto_espacos_espaco_eventos1_idx` (`espaco_evento_id`);

--
-- Indexes for table `foto_eventos`
--
ALTER TABLE `foto_eventos`
  ADD PRIMARY KEY (`id`,`evento_id`),
  ADD KEY `fk_foto_eventos_eventos1_idx` (`evento_id`);

--
-- Indexes for table `foto_orgaos`
--
ALTER TABLE `foto_orgaos`
  ADD PRIMARY KEY (`id`,`orgao_publico_id`),
  ADD KEY `fk_foto_orgaos_orgao_publicos1_idx` (`orgao_publico_id`);

--
-- Indexes for table `foto_rios`
--
ALTER TABLE `foto_rios`
  ADD PRIMARY KEY (`id`,`rio_id`),
  ADD KEY `fk_foto_rios_rios1_idx` (`rio_id`);

--
-- Indexes for table `foto_saudes`
--
ALTER TABLE `foto_saudes`
  ADD PRIMARY KEY (`id`,`saude_id`),
  ADD KEY `fk_foto_saudes_saudes1_idx` (`saude_id`);

--
-- Indexes for table `frequencias`
--
ALTER TABLE `frequencias`
  ADD PRIMARY KEY (`id`,`onibus_rota_id`),
  ADD KEY `fk_frequencias_onibus_rotas1_idx` (`onibus_rota_id`);

--
-- Indexes for table `fundadors`
--
ALTER TABLE `fundadors`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_fundadors_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_historias_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `leis`
--
ALTER TABLE `leis`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_leis_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `mandatos`
--
ALTER TABLE `mandatos`
  ADD PRIMARY KEY (`id`,`prefeito_id`),
  ADD KEY `fk_mandatos_prefeitos1_idx` (`prefeito_id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`,`cidades_id`),
  ADD KEY `fk_medicos_cidades1_idx` (`cidades_id`);

--
-- Indexes for table `onibus_rotas`
--
ALTER TABLE `onibus_rotas`
  ADD PRIMARY KEY (`id`,`empresa_onibus_id`),
  ADD KEY `fk_onibus_rotas_empresa_onibuses1_idx` (`empresa_onibus_id`);

--
-- Indexes for table `orgao_publicos`
--
ALTER TABLE `orgao_publicos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_orgaospublicos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonios`
--
ALTER TABLE `patrimonios`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_patrimonios_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `populacaos`
--
ALTER TABLE `populacaos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_populacaos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `prefeitos`
--
ALTER TABLE `prefeitos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_prefeitos_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `prestadors`
--
ALTER TABLE `prestadors`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_prestadors_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_receitas_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `rios`
--
ALTER TABLE `rios`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_rios_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `saudes`
--
ALTER TABLE `saudes`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_saudes_cidades1_idx` (`cidade_id`);

--
-- Indexes for table `simbolos`
--
ALTER TABLE `simbolos`
  ADD PRIMARY KEY (`id`,`cidade_id`),
  ADD KEY `fk_simbolos_cidades1_idx` (`cidade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atrativo_turisticos`
--
ALTER TABLE `atrativo_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `denominacaos`
--
ALTER TABLE `denominacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `economias`
--
ALTER TABLE `economias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa_onibuses`
--
ALTER TABLE `empresa_onibuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `espaco_eventos`
--
ALTER TABLE `espaco_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estatisticas`
--
ALTER TABLE `estatisticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotosprefeitos`
--
ALTER TABLE `fotosprefeitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_atrativos`
--
ALTER TABLE `foto_atrativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_distritos`
--
ALTER TABLE `foto_distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_escolas`
--
ALTER TABLE `foto_escolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_espacos`
--
ALTER TABLE `foto_espacos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_eventos`
--
ALTER TABLE `foto_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_orgaos`
--
ALTER TABLE `foto_orgaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_rios`
--
ALTER TABLE `foto_rios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_saudes`
--
ALTER TABLE `foto_saudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frequencias`
--
ALTER TABLE `frequencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fundadors`
--
ALTER TABLE `fundadors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historias`
--
ALTER TABLE `historias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leis`
--
ALTER TABLE `leis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mandatos`
--
ALTER TABLE `mandatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `onibus_rotas`
--
ALTER TABLE `onibus_rotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orgao_publicos`
--
ALTER TABLE `orgao_publicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patrimonios`
--
ALTER TABLE `patrimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `populacaos`
--
ALTER TABLE `populacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefeitos`
--
ALTER TABLE `prefeitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prestadors`
--
ALTER TABLE `prestadors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rios`
--
ALTER TABLE `rios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saudes`
--
ALTER TABLE `saudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `simbolos`
--
ALTER TABLE `simbolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atrativo_turisticos`
--
ALTER TABLE `atrativo_turisticos`
  ADD CONSTRAINT `fk_atrativosturisticos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_escolas1` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `denominacaos`
--
ALTER TABLE `denominacaos`
  ADD CONSTRAINT `fk_denominacoes_cidades` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `fk_distritos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_documentos_cidades1` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `economias`
--
ALTER TABLE `economias`
  ADD CONSTRAINT `fk_economias_cidades1` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresa_onibuses`
--
ALTER TABLE `empresa_onibuses`
  ADD CONSTRAINT `fk_empresasonibuses_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_enderecos_cidades1` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `escolas`
--
ALTER TABLE `escolas`
  ADD CONSTRAINT `fk_escolas_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `espaco_eventos`
--
ALTER TABLE `espaco_eventos`
  ADD CONSTRAINT `fk_espacoseventos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `estatisticas`
--
ALTER TABLE `estatisticas`
  ADD CONSTRAINT `fk_estatisticas_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotosaereas_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotosprefeitos`
--
ALTER TABLE `fotosprefeitos`
  ADD CONSTRAINT `fk_fotosprefeitos_prefeitos1` FOREIGN KEY (`prefeito_id`) REFERENCES `prefeitos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_atrativos`
--
ALTER TABLE `foto_atrativos`
  ADD CONSTRAINT `fk_foto_atrativos_atrativo_turisticos1` FOREIGN KEY (`atrativo_turistico_id`) REFERENCES `atrativo_turisticos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_distritos`
--
ALTER TABLE `foto_distritos`
  ADD CONSTRAINT `fk_foto_distritos_distritos1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_escolas`
--
ALTER TABLE `foto_escolas`
  ADD CONSTRAINT `fk_foto_escolas_escolas1` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_espacos`
--
ALTER TABLE `foto_espacos`
  ADD CONSTRAINT `fk_foto_espacos_espaco_eventos1` FOREIGN KEY (`espaco_evento_id`) REFERENCES `espaco_eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_eventos`
--
ALTER TABLE `foto_eventos`
  ADD CONSTRAINT `fk_foto_eventos_eventos1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_orgaos`
--
ALTER TABLE `foto_orgaos`
  ADD CONSTRAINT `fk_foto_orgaos_orgao_publicos1` FOREIGN KEY (`orgao_publico_id`) REFERENCES `orgao_publicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_rios`
--
ALTER TABLE `foto_rios`
  ADD CONSTRAINT `fk_foto_rios_rios1` FOREIGN KEY (`rio_id`) REFERENCES `rios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `foto_saudes`
--
ALTER TABLE `foto_saudes`
  ADD CONSTRAINT `fk_foto_saudes_saudes1` FOREIGN KEY (`saude_id`) REFERENCES `saudes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencias`
--
ALTER TABLE `frequencias`
  ADD CONSTRAINT `fk_frequencias_onibus_rotas1` FOREIGN KEY (`onibus_rota_id`) REFERENCES `onibus_rotas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fundadors`
--
ALTER TABLE `fundadors`
  ADD CONSTRAINT `fk_fundadors_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `fk_historias_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `leis`
--
ALTER TABLE `leis`
  ADD CONSTRAINT `fk_leis_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mandatos`
--
ALTER TABLE `mandatos`
  ADD CONSTRAINT `fk_mandatos_prefeitos1` FOREIGN KEY (`prefeito_id`) REFERENCES `prefeitos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_medicos_cidades1` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `onibus_rotas`
--
ALTER TABLE `onibus_rotas`
  ADD CONSTRAINT `fk_onibus_rotas_empresa_onibuses1` FOREIGN KEY (`empresa_onibus_id`) REFERENCES `empresa_onibuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `orgao_publicos`
--
ALTER TABLE `orgao_publicos`
  ADD CONSTRAINT `fk_orgaospublicos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `patrimonios`
--
ALTER TABLE `patrimonios`
  ADD CONSTRAINT `fk_patrimonios_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `populacaos`
--
ALTER TABLE `populacaos`
  ADD CONSTRAINT `fk_populacaos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prefeitos`
--
ALTER TABLE `prefeitos`
  ADD CONSTRAINT `fk_prefeitos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prestadors`
--
ALTER TABLE `prestadors`
  ADD CONSTRAINT `fk_prestadors_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_receitas_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rios`
--
ALTER TABLE `rios`
  ADD CONSTRAINT `fk_rios_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `saudes`
--
ALTER TABLE `saudes`
  ADD CONSTRAINT `fk_saudes_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `simbolos`
--
ALTER TABLE `simbolos`
  ADD CONSTRAINT `fk_simbolos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
