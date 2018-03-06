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

CREATE TABLE `cliente` (
	`clientID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nombClient` VARCHAR(80) NOT NULL ,
	PRIMARY KEY (`clientID`)
);

CREATE TABLE `entrada` (
	`entradaID` INT(10) NOT NULL AUTO_INCREMENT ,
	`fechaEntrada` DATE NOT NULL ,
	`cantEntrada` INT(15) NOT NULL ,
	`tallesEntrada` VARCHAR(80) NOT NULL ,
	`colorEntrada` VARCHAR(80) NOT NULL ,
	`origen` VARCHAR(80) NOT NULL ,
	`origenID` INT(15) NOT NULL ,
	`corteID` INT(15) NOT NULL ,
	`articuloID` INT(15) NOT NULL ,
	PRIMARY KEY (`entradaID`)
);

CREATE TABLE `salida` (
	`salidaID` INT(10) NOT NULL AUTO_INCREMENT ,
	`fechaSalida` DATE NOT NULL ,
	`cantSalida` INT(15) NOT NULL ,
	`tallesSalida` VARCHAR(80) NOT NULL ,
	`colorSalida` VARCHAR(80) NOT NULL ,
	`destino` VARCHAR(80) NOT NULL ,
	`destinoID` INT(15) NOT NULL ,
	`corteID` INT(15) NOT NULL ,
	`articuloID` INT(15) NOT NULL ,
	PRIMARY KEY (`salidaID`)
);

CREATE TABLE `articulo` (
	`artID` INT(10) NOT NULL AUTO_INCREMENT ,
	`art` VARCHAR(80) NOT NULL ,
	`descrip` VARCHAR(80) NOT NULL ,
	`img` VARCHAR(80) NOT NULL ,
	`nombColor` VARCHAR(80) NOT NULL ,
	`nombTalle` VARCHAR(80) NOT NULL ,
	`telaID` INT(10) NOT NULL ,
	PRIMARY KEY (`artID`)
);

CREATE TABLE `corte` (
	`corteID` INT(10) NOT NULL AUTO_INCREMENT ,
	`nc` VARCHAR(10) NOT NULL ,
	`fechaCorte` DATE NOT NULL ,
	`temporada` VARCHAR(20) NOT NULL ,
	`cantidad` INT(15) NOT NULL ,

	`artID` INT(10) NOT NULL ,
	PRIMARY KEY (`corteID`)
);