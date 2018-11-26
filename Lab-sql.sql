
CREATE DATABASE game_society;

USE game_society;

GRANT ALL PRIVILEGES ON game_society.*
TO 'admin'@'localhost'
IDENTIFIED BY 'admin';

CREATE TABLE Game (
  id     	INT(50)		NOT NULL AUTO_INCREMENT,
  name       	VARCHAR(50)	NOT NULL,
  platform     	VARCHAR(50)	NOT NULL,
  format        VARCHAR(50)	NOT NULL,
  developer     VARCHAR(20)	NOT NULL,
  PEGI          INT        	NOT NULL,
  price         FLOAT(10, 2)	NOT NULL,
  year          Date        	NOT NULL,
  rented 	SMALLINT(1) 	NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE User (
  userID     VARCHAR(50) UNIQUE NOT NULL,
  firstName  VARCHAR(50)        NOT NULL,
  secondName VARCHAR(50)        NOT NULL,
  password   VARCHAR(50)        NOT NULL,
  email      VARCHAR(50)        NOT NULL,
  admin      SMALLINT(1)        NOT NULL,
  banned     SMALLINT(1)        NOT NULL,
  PRIMARY KEY (userID)
);

CREATE TABLE Renting (
  id       INT(50) UNIQUE NOT NULL AUTO_INCREMENT,
  rentDate DATETIME           NOT NULL,
  dueDate  DATETIME           NOT NULL,
  userid   INT(50),
  gameid   VARCHAR(50),
  returnedYet SAMLLINT(1)     NOT NULL,
  FOREIGN KEY (gameid) REFERENCES Game (id),
  FOREIGN KEY (userid) REFERENCES User (userID),
  PRIMARY KEY (id)
);
