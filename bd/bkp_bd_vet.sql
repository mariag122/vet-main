-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_vet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_vet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_vet` DEFAULT CHARACTER SET utf8 ;
USE `bd_vet` ;

-- -----------------------------------------------------
-- Table `bd_vet`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(70) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_vet`.`especie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`especie` (
  `idespecie` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idespecie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_vet`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`animal` (
  `idanimal` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `peso` VARCHAR(45) NULL,
  `data_nascimento` DATE NULL,
  `idespecie` INT NOT NULL,
  `idcliente` INT NOT NULL,
  PRIMARY KEY (`idanimal`),
  INDEX `fk_animal_especie_idx` (`idespecie` ASC) VISIBLE,
  INDEX `fk_animal_cliente1_idx` (`idcliente` ASC) VISIBLE,
  CONSTRAINT `fk_animal_especie`
    FOREIGN KEY (`idespecie`)
    REFERENCES `bd_vet`.`especie` (`idespecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_cliente1`
    FOREIGN KEY (`idcliente`)
    REFERENCES `bd_vet`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_vet`.`atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`atendimento` (
  `idatendimento` INT NOT NULL AUTO_INCREMENT,
  `data_atendimento` TIMESTAMP NULL,
  `idanimal` INT NOT NULL,
  PRIMARY KEY (`idatendimento`),
  INDEX `fk_atendimento_animal1_idx` (`idanimal` ASC) VISIBLE,
  CONSTRAINT `fk_atendimento_animal1`
    FOREIGN KEY (`idanimal`)
    REFERENCES `bd_vet`.`animal` (`idanimal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_vet`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`servico` (
  `idservico` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `descricao` TEXT NULL,
  `valor` FLOAT NULL,
  PRIMARY KEY (`idservico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_vet`.`servico_has_atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_vet`.`servico_has_atendimento` (
  `idservico` INT NOT NULL,
  `idatendimento` INT NOT NULL,
  PRIMARY KEY (`idservico`, `idatendimento`),
  INDEX `fk_servico_has_atendimento_atendimento1_idx` (`idatendimento` ASC) VISIBLE,
  INDEX `fk_servico_has_atendimento_servico1_idx` (`idservico` ASC) VISIBLE,
  CONSTRAINT `fk_servico_has_atendimento_servico1`
    FOREIGN KEY (`idservico`)
    REFERENCES `bd_vet`.`servico` (`idservico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_has_atendimento_atendimento1`
    FOREIGN KEY (`idatendimento`)
    REFERENCES `bd_vet`.`atendimento` (`idatendimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
