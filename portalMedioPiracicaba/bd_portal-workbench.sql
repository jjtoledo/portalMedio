-- MySQL Workbench Synchronization
-- Generated: 2016-08-30 21:47
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: jose

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

/*DROP SCHEMA IF EXISTS `portalmediopir`;
CREATE SCHEMA IF NOT EXISTS `portalmediopir` DEFAULT CHARACTER SET utf8;

DROP USER IF EXISTS `sisPortalMedio`@`localhost`;
CREATE USER `sisPortalMedio`@`localhost` IDENTIFIED BY `portalMedio123`;
GRANT ALL PRIVILEGES ON `portalmediopir`.* TO `sisPortalMedio`@`localhost`;
FLUSH PRIVILEGES;*/

USE `portalmediopir`; 

CREATE TABLE IF NOT EXISTS `portalmediopir`.`admins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `admins` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');


CREATE TABLE IF NOT EXISTS `portalmediopir`.`atrativo_turisticos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `descricao` text NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`camaras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `descricao` text NULL DEFAULT NULL,
  `endereco` varchar(200) NULL DEFAULT NULL,
  `telefone1` varchar(20) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_camaras_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_camaras_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`presidente_camaras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `descricao` text NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_presidente_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_presidente_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`exvereadors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ano_inicio` int(4) not NULL,
  `ano_fim` int(4) not NULL,
  `nomes` Text NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_vereadors_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_vereadors_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`videos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) not NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_videos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_videos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`bairros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
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
  `link` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `periodos` INT(11) NULL DEFAULT NULL,
  `descricao` VARCHAR(120) NULL DEFAULT NULL,
  `area` VARCHAR(120) NULL DEFAULT NULL,
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
  `denominacao` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NOT NULL,
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
  `tipo_documento` VARCHAR(120) NULL DEFAULT NULL,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
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
  `subtitulo` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
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
  `rua` VARCHAR(120) NULL DEFAULT NULL,
  `cep` VARCHAR(120) NULL DEFAULT NULL,
  `bairro` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `descricao` VARCHAR(120) NULL DEFAULT NULL,
  `localizacao` VARCHAR(120) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `localizacao` VARCHAR(255) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
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
  `micro_regiao` VARCHAR(120) NULL DEFAULT NULL,
  `eleitores` INT(11) NULL DEFAULT NULL,
  `secoes` INT(11) NULL DEFAULT NULL,
  `indice_pluviometrico` INT(11) NULL DEFAULT NULL,
  `altitude_max` INT(11) NULL DEFAULT NULL,
  `altitude_min` INT(11) NULL DEFAULT NULL,
  `altitude_centro` INT(11) NULL DEFAULT NULL,
  `relevo_plano` DOUBLE NULL DEFAULT NULL,
  `relevo_ondulado` DOUBLE NULL DEFAULT NULL,
  `relevo_montanhoso` DOUBLE NULL DEFAULT NULL,
  `clima` VARCHAR(120) NULL DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS `portalmediopir`.`foto_camaras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `camara_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `camara_id`),
  INDEX `fk_foto_cidade_distritos1_idx` (`camara_id` ASC),
  CONSTRAINT `fk_foto_cidade_distritos1`
    FOREIGN KEY (`camara_id`)
    REFERENCES `portalmediopir`.`camaras` (`id`)
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
  PRIMARY KEY (`id`, `saude_id`),
  INDEX `fk_foto_saudes_saudes1_idx` (`saude_id` ASC),
  CONSTRAINT `fk_foto_saudes_saudes1`
    FOREIGN KEY (`saude_id`)
    REFERENCES `portalmediopir`.`saudes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`fundadors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
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
  `adjetivo_patrio` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `referencia` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
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
  `ano_inicio` VARCHAR(120) NULL DEFAULT NULL,
  `ano_termino` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `endereco` VARCHAR(120) NULL DEFAULT NULL,
  `especialidade` VARCHAR(120) NULL DEFAULT NULL,
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
  `rota` VARCHAR(120) NULL DEFAULT NULL,
  `tipo` VARCHAR(120) NULL DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS `portalmediopir`.`horarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `texto` text NULL DEFAULT NULL,
  `empresa_onibus_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `empresa_onibus_id`),
  INDEX `fk_horarios_empresa_onibuses1_idx` (`empresa_onibus_id` ASC),
  CONSTRAINT `fk_horarios_empresa_onibuses1`
    FOREIGN KEY (`empresa_onibus_id`)
    REFERENCES `portalmediopir`.`empresa_onibuses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`orgao_publicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `localizacao` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
  `tipo` VARCHAR(120) NULL DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS `portalmediopir`.`empresas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `localizacao` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
  `foto_anuncio` VARCHAR(255) NULL DEFAULT NULL,
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_empresas_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_empresas_cidades1`
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
  `tipo` VARCHAR(120) NULL DEFAULT NULL,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `partido` VARCHAR(120) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT NULL,
  `mesa_diretora` int(11) NOT NULL DEFAULT '0',
  `presidente` int(11) NOT NULL DEFAULT '0',
  `cidade_id` INT(11) NOT NULL,
  `comissao_id` INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `cidade_id`, `comissao_id`),
  INDEX `fk_prefeitos_cidades1_idx` (`cidade_id` ASC),
  INDEX `fk_politicos_comissaos1_idx` (`comissao_id` ASC),
  CONSTRAINT `fk_prefeitos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_politicos_comissaos1`
    FOREIGN KEY (`comissao_id`)
    REFERENCES `portalmediopir`.`comissaos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`prefeituras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NULL DEFAULT NULL,
  `enredeco` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` INT(20) NULL DEFAULT NULL,
  `telefone2` int(20) NOT NULL DEFAULT '0',
  `cidade_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cidade_id`),
  INDEX `fk_prefeituras_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_prefeituras_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `portalmediopir`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `portalmediopir`.`prestadors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `especialidade` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `apelido` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
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
  `tipo` VARCHAR(120) NULL DEFAULT NULL,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `localizacao` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
  `site` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS `portalmediopir`.`juizs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `vara` VARCHAR(120) NULL DEFAULT NULL,
  `tipo_justica` VARCHAR(120) NULL DEFAULT NULL,
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
  `endereco` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `vara` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
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
  `nome` VARCHAR(120) NULL DEFAULT NULL,
  `endereco` VARCHAR(120) NULL DEFAULT NULL,
  `telefone1` VARCHAR(120) NULL DEFAULT NULL,
  `telefone2` VARCHAR(120) NULL DEFAULT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
