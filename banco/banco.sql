CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8 ;
USE `banco` ;


CREATE TABLE IF NOT EXISTS `banco`.`contas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titular` VARCHAR(45) NULL,
  `agencia` INT NULL,
  `conta` INT NULL,
  `senha` VARCHAR(32) NULL,
  `saldo` DECIMAL(10,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `banco`.`historico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idConta` INT NULL,
  `tipo` TINYINT(1) NULL,
  `valor` DECIMAL(10,2) NULL,
  `dataOperacao` VARCHAR(45) NULL,
  `historicocol` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '		';