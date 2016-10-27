-- MySQL Workbench Synchronization
-- Generated: 2016-08-30 21:47
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: jose

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `portalmediopir`;
CREATE SCHEMA IF NOT EXISTS `portalmediopir` DEFAULT CHARACTER SET utf8;

/*DROP USER IF EXISTS `sisPortalMedio`@`localhost`;
CREATE USER `sisPortalMedio`@`localhost` IDENTIFIED BY `portalMedio123`;
GRANT ALL PRIVILEGES ON `portalmediopir`.* TO `sisPortalMedio`@`localhost`;
FLUSH PRIVILEGES;*/

USE `portalmediopir`; 

CREATE TABLE IF NOT EXISTS `portalmediopir`.`admins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `admins` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');


CREATE TABLE IF NOT EXISTS `portalmediopir`.`atrativo_turisticos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_atrativosturisticos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_atrativosturisticos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`cidades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`bairros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_bairros_cidade_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_bairros_cidades`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`mapas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `link` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_mapas_cidade_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_mapas_cidades`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`cursos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `periodos` INT(11) NULL DEFAULT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `area` VARCHAR(45) NULL DEFAULT NULL,
  `escola_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `escola_id`),
  INDEX `fk_cursos_escolas1_idx` (`escola_id` ASC),
  CONSTRAINT `fk_cursos_escolas1`
    FOREIGN KEY (`escola_id`)
    REFERENCES `portalmediopir`.`escolas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`denominacaos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `denominacao` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_denominacoes_cidade_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_denominacoes_cidades`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`distritos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_distritos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_distritos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`documentos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` VARCHAR(45) NULL DEFAULT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `localizacao` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(80) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_documentos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_documentos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`economias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `subtitulo` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_economias_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_economias_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`empresa_onibuses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_empresasonibuses_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_empresasonibuses_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`enderecos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NULL DEFAULT NULL,
  `cep` VARCHAR(45) NULL DEFAULT NULL,
  `bairro` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_enderecos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_enderecos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`escolas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `localizacao` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_escolas_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_escolas_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`espaco_eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `localizacao` VARCHAR(255) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(255) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_espacoseventos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_espacoseventos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`estatisticas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `area_territorial` INT NULL DEFAULT NULL,
  `micro_regiao` VARCHAR(45) NULL DEFAULT NULL,
  `eleitores` INT(11) NULL DEFAULT NULL,
  `secoes` INT(11) NULL DEFAULT NULL,
  `indice_pluviometrico` INT(11) NULL DEFAULT NULL,
  `altitude_max` INT(11) NULL DEFAULT NULL,
  `altitude_min` INT(11) NULL DEFAULT NULL,
  `altitude_centro` INT(11) NULL DEFAULT NULL,
  `relevo_plano` DOUBLE NULL DEFAULT NULL,
  `relevo_ondulado` DOUBLE NULL DEFAULT NULL,
  `relevo_montanhoso` DOUBLE NULL DEFAULT NULL,
  `clima` VARCHAR(45) NULL DEFAULT NULL,
  `temp_anual` DOUBLE NULL DEFAULT NULL,
  `temp_max` DOUBLE NULL DEFAULT NULL,
  `temp_min` DOUBLE NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_estatisticas_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_estatisticas_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `local` VARCHAR(100) NULL DEFAULT NULL,
  `horario` VARCHAR(5) NULL DEFAULT NULL,
  `data` VARCHAR(13) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_eventos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_eventos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`camaras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_camaras_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_camras_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_camaras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `camara_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `camara_id`),
  INDEX `fk_fotocamaras_camaras1_idx` (`camara_id` ASC),
  CONSTRAINT `fk_foto_camaras_camara1`
    FOREIGN KEY (`camara_id`)
    REFERENCES `portalmediopir`.`camaras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`frequencias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `horario` VARCHAR(5) NULL DEFAULT NULL,
  `frequencia` VARCHAR(45) NULL DEFAULT NULL,
  `onibus_rota_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `onibus_rota_id`),
  INDEX `fk_frequencias_onibus_rotas1_idx` (`onibus_rota_id` ASC),
  CONSTRAINT `fk_frequencias_onibus_rotas1`
    FOREIGN KEY (`onibus_rota_id`)
    REFERENCES `portalmediopir`.`onibus_rotas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`fundadors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `biografia` TEXT NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_fundadors_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_fundadors_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`historias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `historia` LONGTEXT NOT NULL,
  `adocao_nome` LONGTEXT NULL DEFAULT NULL,
  `emancipacao` LONGTEXT NULL DEFAULT NULL,
  `adjetivo_patrio` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_historias_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_historias_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`leis` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` LONGTEXT NULL DEFAULT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `referencia` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_leis_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_leis_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`mandatos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ano_inicio` VARCHAR(45) NULL DEFAULT NULL,
  `ano_termino` VARCHAR(45) NULL DEFAULT NULL,
  `politico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `politico_id`),
  INDEX `fk_mandatos_prefeitos1_idx` (`politico_id` ASC),
  CONSTRAINT `fk_mandatos_prefeitos1`
    FOREIGN KEY (`politico_id`)
    REFERENCES `portalmediopir`.`politicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`medicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `especialidade` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_medicos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_medicos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`onibus_rotas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rota` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `empresa_onibus_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `empresa_onibus_id`),
  INDEX `fk_onibus_rotas_empresa_onibuses1_idx` (`empresa_onibus_id` ASC),
  CONSTRAINT `fk_onibus_rotas_empresa_onibuses1`
    FOREIGN KEY (`empresa_onibus_id`)
    REFERENCES `portalmediopir`.`empresa_onibuses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`orgao_publicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `localizacao` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_orgaospublicos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_orgaospublicos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`parceiros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `site` VARCHAR(255) NULL DEFAULT NULL,
  `tipo` INT(1) NOT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`patrimonios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `ano` INT(4) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_patrimonios_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_patrimonios_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`populacaos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `quantidade` INT(11) NULL DEFAULT NULL,
  `ano` INT(4) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_populacaos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_populacaos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`politicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `partido` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  `comissao_id` INT(11) NOT NULL,
  `mesadiretora_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `cidade_id`, `comissao_id`, `mesadiretora_id`),
  INDEX `fk_prefeitos_cidades1_idx` (`cidade_id` ASC),
  INDEX `fk_politicos_comissaos1_idx` (`comissao_id` ASC),
  INDEX `fk_politicos_mesadiretora1_idx` (`mesadiretora_id` ASC),
  CONSTRAINT `fk_prefeitos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_politicos_comissaos1`
    FOREIGN KEY (`comissao_id`)
    REFERENCES `portalmediopir`.`comissaos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_politicos_mesadiretora1`
    FOREIGN KEY (`mesadiretora_id`)
    REFERENCES `portalmediopir`.`mesadiretoras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`prestadors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `especialidade` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `apelido` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_prestadors_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_prestadors_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`receitas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ano` INT(4) NULL DEFAULT NULL,
  `icms` DOUBLE NULL DEFAULT NULL,
  `outras` DOUBLE NULL DEFAULT NULL,
  `total` DOUBLE NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_receitas_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_receitas_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`rios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_rios_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_rios_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`orgao_saudes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `localizacao` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_saudes_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_saudes_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`simbolos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `imagem` VARCHAR(255) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_simbolos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_simbolos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`comissaos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_comissaos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_comissaos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`mesadiretoras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `ano_inicio` INT(11) NULL DEFAULT NULL,
  `ano_termino` INT(11) NULL DEFAULT NULL,
  `camara_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `camara_id`),
  INDEX `fk_mesadiretora_camaras1_idx` (`camara_id` ASC),
  CONSTRAINT `fk_mesadiretora_camaras1`
    FOREIGN KEY (`camara_id`)
    REFERENCES `portalmediopir`.`camaras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`juizs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `vara` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_justica` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_juizs_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_juizs_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`forums` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_foruns_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_foruns_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`promotors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `vara` VARCHAR(45) NULL DEFAULT NULL,
  `ano_inicio` INT(11) NULL DEFAULT NULL,
  `ano_termino` INT(11) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_promotors_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_promotors_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`socials` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_socials_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_socials_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`assistentes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `telefone1` VARCHAR(45) NULL DEFAULT NULL,
  `telefone2` VARCHAR(45) NULL DEFAULT NULL,
  `social_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `social_id`),
  INDEX `fk_assistentes_socials1_idx` (`social_id` ASC),
  CONSTRAINT `fk_assistentes_socials1`
    FOREIGN KEY (`social_id`)
    REFERENCES `portalmediopir`.`socials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`anuncios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`noticias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `link` VARCHAR(255) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`fotos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  `descricao` VARCHAR(100) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_fotosaereas_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_fotosaereas_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_atrativos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `atrativo_turistico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `atrativo_turistico_id`),
  INDEX `fk_foto_atrativos_atrativo_turisticos1_idx` (`atrativo_turistico_id` ASC),
  CONSTRAINT `fk_foto_atrativos_atrativo_turisticos1`
    FOREIGN KEY (`atrativo_turistico_id`)
    REFERENCES `portalmediopir`.`atrativo_turisticos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_distritos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `distrito_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `distrito_id`),
  INDEX `fk_foto_distritos_distritos1_idx` (`distrito_id` ASC),
  CONSTRAINT `fk_foto_distritos_distritos1`
    FOREIGN KEY (`distrito_id`)
    REFERENCES `portalmediopir`.`distritos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_escolas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `escola_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `escola_id`),
  INDEX `fk_foto_escolas_escolas1_idx` (`escola_id` ASC),
  CONSTRAINT `fk_foto_escolas_escolas1`
    FOREIGN KEY (`escola_id`)
    REFERENCES `portalmediopir`.`escolas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_espacos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `espaco_evento_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `espaco_evento_id`),
  INDEX `fk_foto_espacos_espaco_eventos1_idx` (`espaco_evento_id` ASC),
  CONSTRAINT `fk_foto_espacos_espaco_eventos1`
    FOREIGN KEY (`espaco_evento_id`)
    REFERENCES `portalmediopir`.`espaco_eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `evento_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `evento_id`),
  INDEX `fk_foto_eventos_eventos1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_foto_eventos_eventos1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `portalmediopir`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_orgaos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `orgao_publico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `orgao_publico_id`),
  INDEX `fk_foto_orgaos_orgao_publicos1_idx` (`orgao_publico_id` ASC),
  CONSTRAINT `fk_foto_orgaos_orgao_publicos1`
    FOREIGN KEY (`orgao_publico_id`)
    REFERENCES `portalmediopir`.`orgao_publicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_politicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `politico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `politico_id`),
  INDEX `fk_fotosprefeitos_prefeitos1_idx` (`politico_id` ASC),
  CONSTRAINT `fk_fotosprefeitos_prefeitos1`
    FOREIGN KEY (`politico_id`)
    REFERENCES `portalmediopir`.`politicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_rios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `rio_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `rio_id`),
  INDEX `fk_foto_rios_rios1_idx` (`rio_id` ASC),
  CONSTRAINT `fk_foto_rios_rios1`
    FOREIGN KEY (`rio_id`)
    REFERENCES `portalmediopir`.`rios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_saudes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `orgao_saude_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `orgao_saude_id`),
  INDEX `fk_foto_saudes_saudes1_idx` (`orgao_saude_id` ASC),
  CONSTRAINT `fk_foto_saudes_saudes1`
    FOREIGN KEY (`orgao_saude_id`)
    REFERENCES `portalmediopir`.`orgao_saudes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `cidades` (`id`, `nome`, `descricao`) VALUES
(3, 'BarÃ£o de Cocais', ''),
(4, 'Bela Vista de Minas', ''),
(5, 'Bom Jesus do Amparo', ''),
(6, 'Catas Altas', ''),
(7, 'DionÃ­sio', ''),
(8, 'Dom SilvÃ©rio', ''),
(9, 'Itabira', ''),
(10, 'JoÃ£o Monlevade', ''),
(11, 'Nova Era', ''),
(12, 'Rio Piracicaba', ''),
(13, 'Santa BÃ¡rbara', ''),
(14, 'Santa Maria de Itabira', ''),
(15, 'SÃ£o Domingos do Prata', ''),
(16, 'SÃ£o GonÃ§alo do Rio Abaixo', ''),
(17, 'SÃ£o JosÃ© do Goiabal', ''),
(18, 'Sem Peixe', ''),
(19, 'AlvinÃ³polis', '');

INSERT INTO `eventos` (`id`, `descricao`, `local`, `horario`, `data`, `foto_anuncio`, `cidade_id`) VALUES
(1, 'evento', 'Itabira', '12:00', '12/12/2016', 'banner-barramares-2015-3.jpg', 9),
(2, 'Evento teste', 'Itabira', '13:00', '12/12/2016', 'img-20150812-wa0104-3.jpg', 9);

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `foto`, `link`, `tipo`) VALUES
(2, 'PF liga codinome \'amigo\' em planilhas da Lava Jato a Lula', '', 'untitled-2.jpg', 'http://g1.globo.com/pr/parana/noticia/2016/10/pf-liga-codinome-amigo-em-planilhas-da-lava-jato-lula.html', 1),
(3, 'Revista divulga Ã¡udio em que Crivella diz que foi preso em \'cela lotada\'', '', 'veja-crivella.jpg', 'http://g1.globo.com/rio-de-janeiro/eleicoes/2016/noticia/2016/10/revista-divulga-audio-em-que-crivella-diz-que-foi-preso-em-cela-lotada.html', 1),
(4, 'Maia oferece coquetel a Temer e Ã  base para articular votaÃ§Ã£o de PEC', '', 'foto-coquetel-maia-e-temer.jpg', 'http://g1.globo.com/politica/noticia/2016/10/rodrigo-maia-reune-deputados-para-articular-votacao-da-pec-241.html', 1),
(5, 'Embraer admite propina e faz acordo de US$ 206 milhÃµes no Brasil e EUA', '', 'img-combat-supertucano-origin-zoom-nuqknub.jpg', 'http://g1.globo.com/economia/negocios/noticia/2016/10/embraer-admite-que-pagou-propina-e-faz-acordo-de-r-64-mi-com-cvm.html', 1),
(6, 'Dicas prÃ¡ticas para o uso de repelentes', '', 'exposis.jpg', 'http://g1.globo.com/bemestar/blog/doutora-ana-responde/post/dicas-praticas-para-o-uso-de-repelentes.html', 1),
(8, 'Uemg abre inscriÃ§Ãµes para vestibular tradicional; 160 vagas sÃ£o ofertadas em Monlevade ', '', 'diminuator.jpg', '', 2),
(10, 'Corrida rÃºstica marca semana de prevenÃ§Ã£o de acidentes no HNSD', '', 'aa.jpg', '', 2),
(11, 'Itabiranos sÃ£o convocados para disputa da Copa do Brasil de Taekwondo', '', 'diminuato.jpg', '', 2),
(13, 'Menina de 4 anos lÃª e fala 7 lÃ­nguas: gÃªnio?', '', 'menina-poliglota-close.jpg', '', 3),
(14, 'PaÃ­s vai ensinar alunos a desconstruir estereÃ³tipos de gÃªnero', '', 'escolas-genero-close.jpg', '', 3),
(15, 'Grande chuva de estrelas cadentes iluminou a madrugada', '', 'estrelas-cadentes-close.jpg', '', 3),
(16, 'Morre Carlos Alberto Torres, o capitÃ£o do tri', '', 'carlos-alberto-torres.jpg', 'http://veja.abril.com.br/esporte/morre-carlos-alberto-torres-o-capitao-do-tri/', 1),
(17, 'MÃ£e desconfia de filho e descobre o que fazia escondido: caridade', '', 'menino-lanche-mae-close-0.jpg', 'http://www.sonoticiaboa.com.br/2016/10/24/mae-desconfia-de-filho-e-descobre-o-que-ele-fazia-escondido-caridade/', 3),
(18, 'Acimon promove CafÃ© Empresarial em sua sede', '', 'not-g-5181-5281.jpg', 'http://www.anoticiaregional.com.br/noticia.asp?id=5181', 2),
(19, 'AlvinÃ³polis recebe 36Âª ediÃ§Ã£o do Festival da CanÃ§Ã£o', '', 'not-g-5179-5279.jpg', 'http://www.anoticiaregional.com.br/noticia.asp?id=5179', 2);

INSERT INTO `parceiros` (`id`, `site`, `tipo`, `foto`) VALUES
(1, 'www', 1, 'bmw-2-2.jpeg'),
(2, 'eee', 1, 'bk-2-2.png'),
(3, 'ddd', 1, 'ge-2.jpg'),
(4, 'fdsfs', 2, 'banner-anuncie-sou-noticia-2.gif'),
(5, 'gfd', 3, 'banner-anuncie-aqui-large-3.jpg');




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
