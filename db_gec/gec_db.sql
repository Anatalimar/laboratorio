-- MySQL Script generated by MySQL Workbench
-- Fri Jul 14 09:41:54 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema db_gesi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_gesi` DEFAULT CHARACTER SET utf8 ;
USE `db_gesi` ;


-- -----------------------------------------------------
-- Table `db_gesi`.`unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`unidade` (
  `und_codigo` INT NOT NULL AUTO_INCREMENT,
  `und_descricao` VARCHAR(70) NOT NULL,
  `und_sigla` VARCHAR(45) NULL,
  `und_municipio` VARCHAR(45) NULL,
  `und_coord` VARCHAR(70) NULL,
  `und_status` VARCHAR(20) NULL,
  PRIMARY KEY (`und_codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`servidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`servidor` (
  `ser_matricula` VARCHAR(7) NOT NULL,
  `ser_cpf` VARCHAR(14) NOT NULL,
  `ser_nome` VARCHAR(45) NOT NULL,
  `ser_funcao` VARCHAR(45) NOT NULL,
  `ser_unidade` INT NOT NULL,
  `ser_fone_cotato` VARCHAR(15) NOT NULL,
  `ser_fone_coorp` VARCHAR(15) NULL,
  PRIMARY KEY (`ser_matricula`),
    FOREIGN KEY (`ser_unidade`)
    REFERENCES `db_gesi`.`unidade` (`und_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`categoria` (
  `cat_codigo` INT NOT NULL AUTO_INCREMENT,
  `cat_descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`cat_codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`produto` (
  `pro_codigo` VARCHAR(20) NOT NULL,
  `pro_descricao` VARCHAR(45) NOT NULL,
  `pro_fabricante` VARCHAR(45) NOT NULL,
  `pro_modelo` VARCHAR(45) NOT NULL,
  `pro_numero` VARCHAR(20) NULL,
  `pro_tombo` INT NULL,
  `pro_categoria` INT NOT NULL,
  PRIMARY KEY (`pro_codigo`),
    FOREIGN KEY (`pro_categoria`)
    REFERENCES `db_gesi`.`categoria` (`cat_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`usuario` (
  `usu_codigo` INT NOT NULL AUTO_INCREMENT,
  `usu_nome` VARCHAR(30) NOT NULL,
  `usu_senha` VARCHAR(45) NOT NULL,
  `usu_email` VARCHAR(100) NOT NULL,
  `usu_nivel_acesso` VARCHAR(45) NULL,
  PRIMARY KEY (`usu_codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`registro` (
  `reg_codigo` INT NOT NULL AUTO_INCREMENT,
  `reg_data` DATE NULL,
  `reg_servidor` VARCHAR(7) NOT NULL,
  `reg_tipo` VARCHAR(45) NULL,
  `reg_doc` VARCHAR(150) NULL,
  `reg_obs` VARCHAR(200) NULL,
  `reg_usuario` INT NOT NULL,
  PRIMARY KEY (`reg_codigo`),
    FOREIGN KEY (`reg_servidor`)
    REFERENCES `db_gesi`.`servidor` (`ser_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registro_usuario1`
    FOREIGN KEY (`reg_usuario`)
    REFERENCES `db_gesi`.`usuario` (`usu_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesi`.`registro_tem_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesi`.`registro_tem_produto` (
  `rtp_codigo` INT NOT NULL,
  `rtp_registro` INT NOT NULL,
  `rtp_produto` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`rtp_codigo`),
    FOREIGN KEY (`rtp_registro`)
    REFERENCES `db_gesi`.`registro` (`reg_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registro_tem_produto_produto1`
    FOREIGN KEY (`rtp_produto`)
    REFERENCES `db_gesi`.`produto` (`pro_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
