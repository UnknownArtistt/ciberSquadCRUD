-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ciberSquadDB;
USE ciberSquadDB;

-- Crear tabla "kurtsoak"
CREATE TABLE kurtsoak (
    identifikatzailea VARCHAR(10) NOT NULL,
    izena VARCHAR(40) NOT NULL,
    ikasturtea VARCHAR(15) NOT NULL,
    iraupena VARCHAR(15) NOT NULL,
    ikasle_kopurua INT(3),
    PRIMARY KEY (identifikatzailea)
) ENGINE=InnoDB;

-- Crear tabla "ikasleak"
CREATE TABLE ikasleak (
    id INT(3) AUTO_INCREMENT NOT NULL,
    izena VARCHAR(25) NOT NULL,
    abizena VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    adina INT(3),
    kurtso_id VARCHAR(10),
    PRIMARY KEY (id),
    CONSTRAINT fk_kurtsoak FOREIGN KEY (kurtso_id) REFERENCES kurtsoak(identifikatzailea)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Crear tabla "erabiltzaileak"
CREATE TABLE erabiltzaileak (
    id INT(3) AUTO_INCREMENT NOT NULL,
    erabiltzaile_izena VARCHAR(40) NOT NULL,
    ikasle_id INT(3),
    ikasle_izena VARCHAR(25),
    ikasle_abizena VARCHAR(30),
    email VARCHAR(50),
    administraria INT(1),
    PRIMARY KEY (id),
    CONSTRAINT fk_ikasleak FOREIGN KEY (ikasle_id) REFERENCES ikasleak(id)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

`pasahitza` varchar(25) DEFAULT NULL  -- Campo de contraseña añadido
