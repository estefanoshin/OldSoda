CREATE TABLE `tela` (
	`telaID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nombTela` VARCHAR(80) NOT NULL ,
	`proveedTela` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`telaID`)
);

CREATE TABLE `taller` (
	`tallerID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nombTaller` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`tallerID`)
);

CREATE TABLE `talle` (
	`talleID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nombTalle` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`talleID`)
);

CREATE TABLE `cliente` (
	`clientID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nombClient` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`clientID`)
);

CREATE TABLE `movimiento` (
	`movID` INT(10) NOT NULL AUTO_INCREMENT ,
	`fechaMov` DATE NOT NULL ,
	`tipoMov` VARCHAR(80) NOT NULL ,
	`cantMov` INT(15) NOT NULL ,
	`tallesMov` VARCHAR(80) NOT NULL ,
	`nombColor` VARCHAR(80) NOT NULL ,
	
	`tallerID` INT(10) NOT NULL ,
	`clientID` INT(10) NOT NULL ,
	PRIMARY KEY (`movID`)
);

CREATE TABLE `articulo` (
	`artID` INT(10) NOT NULL AUTO_INCREMENT ,
	`art` VARCHAR(80) NOT NULL ,
	`cant` INT(15) NOT NULL ,
	`descrip` VARCHAR(80) NOT NULL ,
	`img` VARCHAR(80) NOT NULL ,
	`nombColor` VARCHAR(80) NOT NULL ,

	`nombTalle` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`artID`)
);

CREATE TABLE `corte` (
	`corteID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nc` VARCHAR(10) NOT NULL ,
	`fechaCorte` DATE NOT NULL ,
	`temporada` VARCHAR(15) NOT NULL ,

	`artID` INT(10) NOT NULL ,
	`telaID` INT(10) NOT NULL ,
	PRIMARY KEY (`corteID`)
);