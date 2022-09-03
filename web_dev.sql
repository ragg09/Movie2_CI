SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `web_dev`.`Actors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`Actors` (
  `ActorID` INT NOT NULL AUTO_INCREMENT ,
  `ActorFullName` VARCHAR(45) NOT NULL ,
  `ActorNotes` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ActorID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`RoleTypes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`RoleTypes` (
  `RoleTypeID` INT NOT NULL AUTO_INCREMENT ,
  `RoleType` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`RoleTypeID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmGenres`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmGenres` (
  `GenreID` INT NOT NULL AUTO_INCREMENT ,
  `Genre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`GenreID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmCertificates`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmCertificates` (
  `CertificateID` INT NOT NULL AUTO_INCREMENT ,
  `Certificate` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`CertificateID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmTitles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmTitles` (
  `FilmTitleID` INT NOT NULL AUTO_INCREMENT ,
  `GenreID` INT NOT NULL ,
  `CertificateID` INT NOT NULL ,
  `FilmTitle` VARCHAR(45) NOT NULL ,
  `FilmStory` VARCHAR(45) NOT NULL ,
  `FilmReleaseDate` DATE NOT NULL ,
  `FIlmDuration` INT NOT NULL ,
  `FilmAdditionalInfo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`FilmTitleID`, `GenreID`, `CertificateID`) ,
  INDEX `fk_FIlmTitles_FilmGenres1_idx` (`GenreID` ASC) ,
  INDEX `fk_FIlmTitles_FilmCertificates1_idx` (`CertificateID` ASC) ,
  CONSTRAINT `fk_FIlmTitles_FilmGenres1`
    FOREIGN KEY (`GenreID` )
    REFERENCES `web_dev`.`FilmGenres` (`GenreID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FIlmTitles_FilmCertificates1`
    FOREIGN KEY (`CertificateID` )
    REFERENCES `web_dev`.`FilmCertificates` (`CertificateID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmsActorRoles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmsActorRoles` (
  `FilmTitleID` INT NOT NULL ,
  `ActorID` INT NOT NULL ,
  `RoleTypeID` INT NOT NULL ,
  `CharacterName` VARCHAR(45) NOT NULL ,
  `CharacterDescriptiom` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`FilmTitleID`, `ActorID`, `RoleTypeID`) ,
  INDEX `fk_FilmsActorRoles_Actors1_idx` (`ActorID` ASC) ,
  INDEX `fk_FilmsActorRoles_RoleTypes1_idx` (`RoleTypeID` ASC) ,
  CONSTRAINT `fk_FilmsActorRoles_FIlmTitles`
    FOREIGN KEY (`FilmTitleID` )
    REFERENCES `web_dev`.`FilmTitles` (`FilmTitleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmsActorRoles_Actors1`
    FOREIGN KEY (`ActorID` )
    REFERENCES `web_dev`.`Actors` (`ActorID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmsActorRoles_RoleTypes1`
    FOREIGN KEY (`RoleTypeID` )
    REFERENCES `web_dev`.`RoleTypes` (`RoleTypeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`Producers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`Producers` (
  `ProducerID` INT NOT NULL AUTO_INCREMENT ,
  `ProducerName` VARCHAR(45) NOT NULL ,
  `ContactEmailAddress` VARCHAR(45) NOT NULL ,
  `Website` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ProducerID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmTitlesProducers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmTitlesProducers` (
  `ProducerID` INT NOT NULL ,
  `FilmTitleID` INT NOT NULL ,
  PRIMARY KEY (`ProducerID`, `FilmTitleID`) ,
  INDEX `fk_FIlmTitles_has_Producers_Producers1_idx` (`ProducerID` ASC) ,
  INDEX `fk_FIlmTitles_has_Producers_FIlmTitles1_idx` (`FilmTitleID` ASC) ,
  CONSTRAINT `fk_FIlmTitles_has_Producers_FIlmTitles1`
    FOREIGN KEY (`FilmTitleID` )
    REFERENCES `web_dev`.`FilmTitles` (`FilmTitleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FIlmTitles_has_Producers_Producers1`
    FOREIGN KEY (`ProducerID` )
    REFERENCES `web_dev`.`Producers` (`ProducerID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`Ratee`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`Ratee` (
  `RateeID` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`RateeID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`WebRating`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`WebRating` (
  `WebRatingID` INT NOT NULL AUTO_INCREMENT ,
  `RateeID` INT NOT NULL ,
  `Rate` INT NOT NULL ,
  PRIMARY KEY (`WebRatingID`, `RateeID`) ,
  INDEX `fk_WebRating_Ratee1_idx` (`RateeID` ASC) ,
  CONSTRAINT `fk_WebRating_Ratee1`
    FOREIGN KEY (`RateeID` )
    REFERENCES `web_dev`.`Ratee` (`RateeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web_dev`.`FilmRating`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `web_dev`.`FilmRating` (
  `FilmRatingID` INT NOT NULL AUTO_INCREMENT ,
  `RateeID` INT NOT NULL ,
  `Rating` INT NOT NULL ,
  `FilmTilteID` INT NOT NULL ,
  PRIMARY KEY (`FilmRatingID`, `RateeID`, `FilmTilteID`) ,
  INDEX `fk_FilmRating_FilmTitles1_idx` (`FilmTilteID` ASC) ,
  INDEX `fk_FilmRating_Users1_idx` (`RateeID` ASC) ,
  CONSTRAINT `fk_FilmRating_FilmTitles1`
    FOREIGN KEY (`FilmTilteID` )
    REFERENCES `web_dev`.`FilmTitles` (`FilmTitleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmRating_Users1`
    FOREIGN KEY (`RateeID` )
    REFERENCES `web_dev`.`Ratee` (`RateeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
