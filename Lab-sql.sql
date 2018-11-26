
CREATE DATABASE game_society;

USE game_society;

GRANT ALL PRIVILEGES ON game_society.*
TO 'admin'@'localhost'
IDENTIFIED BY 'admin';

CREATE TABLE Game (
  id     	INT(50) 	AUTO_INCREMENT,
  image VARCHAR(500),
  review VARCHAR(500),
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
  userID     INT(50) 		AUTO_INCREMENT,
  firstName  VARCHAR(50)        NOT NULL,
  secondName VARCHAR(50)        NOT NULL,
  password   VARCHAR(255)        NOT NULL,
  email      VARCHAR(50)        NOT NULL,
  user_name  VARCHAR(50)        NOT NULL UNIQUE,
  fees        FLOAT(10, 2),
  admin      SMALLINT(1)        NOT NULL,
  administration SMALLINT(1)    NOT NULL,
  banned     SMALLINT(1)        NOT NULL,
  PRIMARY KEY (userID)
);

CREATE TABLE Renting (
  id       VARCHAR(50) UNIQUE NOT NULL,
  rentDate DATETIME           NOT NULL,
  dueDate  DATETIME           NOT NULL,
  duration DATETIME           NOT NULL,
  userid   INT(50)   NOT NULL,
  gameid   INT(50)  NOT NULL,
  extentions INT(2) DEFAULT '0.00',
  FOREIGN KEY (gameid) REFERENCES Game(id),
  FOREIGN KEY (userid) REFERENCES User(userID),
  PRIMARY KEY (id)
);

Insert Into User(firstName, secondName, password, email, user_name, admin, administration, banned)
Values ('Admin','Admin','$2y$10$xkEed2jTNfDQOTZ5qm7W9uPIyL9xZsNCv6oFeIxqXcLkpyUJiY/V6','admin@gmail.com','admin','1', '1', '0');
