-- MySQL Workbench Synchronization
-- Generated: 2014-12-03 19:34
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: cta

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `timeline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `timeline`.`users` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`events` (
  `idevent` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date` VARCHAR(45) NULL DEFAULT NULL,
  `end_date` VARCHAR(45) NULL DEFAULT NULL,
  `headline` VARCHAR(45) NULL DEFAULT NULL,
  `text` VARCHAR(45) NULL DEFAULT NULL,
  `medias_idmedia` INT(11) NOT NULL,
  `types_idtype` INT(11) NOT NULL,
  `users_iduser` INT(11) NOT NULL,
  PRIMARY KEY (`idevent`),
  INDEX `fk_events_medias_idx` (`medias_idmedia` ASC),
  INDEX `fk_events_types1_idx` (`types_idtype` ASC),
  INDEX `fk_events_users1_idx` (`users_iduser` ASC),
  CONSTRAINT `fk_events_medias`
    FOREIGN KEY (`medias_idmedia`)
    REFERENCES `timeline`.`medias` (`idmedia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_types1`
    FOREIGN KEY (`types_idtype`)
    REFERENCES `timeline`.`types` (`idtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_users1`
    FOREIGN KEY (`users_iduser`)
    REFERENCES `timeline`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`medias` (
  `idmedia` INT(11) NOT NULL AUTO_INCREMENT,
  `media` VARCHAR(45) NULL DEFAULT NULL,
  `caption` VARCHAR(45) NULL DEFAULT NULL,
  `thumbnail` VARCHAR(45) NULL DEFAULT NULL,
  `credits` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idmedia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`types` (
  `idtype` INT(11) NOT NULL,
  `type` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtype`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`tags` (
  `idtag` INT(11) NOT NULL,
  `tag` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtag`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`events_has_tags` (
  `events_idevent` INT(11) NOT NULL,
  `tags_idtag` INT(11) NOT NULL,
  PRIMARY KEY (`events_idevent`, `tags_idtag`),
  INDEX `fk_events_has_tags_tags1_idx` (`tags_idtag` ASC),
  INDEX `fk_events_has_tags_events1_idx` (`events_idevent` ASC),
  CONSTRAINT `fk_events_has_tags_events1`
    FOREIGN KEY (`events_idevent`)
    REFERENCES `timeline`.`events` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_tags_tags1`
    FOREIGN KEY (`tags_idtag`)
    REFERENCES `timeline`.`tags` (`idtag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
