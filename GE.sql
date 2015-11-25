CREATE SCHEMA IF NOT EXISTS `Escola` DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS `Escola`.`Alumno` (
  `ID` INT NOT NULL,
  `DNI` VARCHAR(9) NULL,
  `Nombre` VARCHAR(45) NULL,
  `Apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`)
);

CREATE TABLE IF NOT EXISTS `Escola`.`Asignatura` (
  `ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Asignatura` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`)
);

CREATE TABLE IF NOT EXISTS `Escola`.`Curso` (
  `ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`)
);


CREATE TABLE IF NOT EXISTS `Escola`.`Boletin` (
  `Curso_ID` INT NOT NULL,
  `Alumno_ID` INT NOT NULL,
  `Asignatura_ID` INT NOT NULL,
  `Nota` VARCHAR(45) NULL,
  PRIMARY KEY (`Curso_ID`, `Alumno_ID`, `Asignatura_ID`),
  INDEX `fk_Boletin_Alumno1_idx` (`Alumno_ID` ASC),
  INDEX `fk_Boletin_Asignatura1_idx` (`Asignatura_ID` ASC),
  CONSTRAINT `fk_Boletin_Curso`
    FOREIGN KEY (`Curso_ID`)
    REFERENCES `Escola`.`Curso` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Boletin_Alumno1`
    FOREIGN KEY (`Alumno_ID`)
    REFERENCES `Escola`.`Alumno` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Boletin_Asignatura1`
    FOREIGN KEY (`Asignatura_ID`)
    REFERENCES `Escola`.`Asignatura` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
