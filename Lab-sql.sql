
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
  developer     VARCHAR(50)	NOT NULL,
  PEGI          INT        	NOT NULL,
  price         FLOAT(10, 2)	NOT NULL,
  year          Date        	NOT NULL,
  rented 	SMALLINT(1) 	NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO Game(name,platform,format,developer,PEGI,price,year,rented) Values
  ('overwatch','PS4','cd','Blizzard',12,10,2016,0),
  ('overwatch','Xbox','cd','Blizzard',12,10,2016,0),
  ('overwatch','PC','cd','Blizzard',12,10,2016,0),
  ('Heroes of the Storm','PC','cd','Blizzard',12,10,2015,0),
  ('Destiny','PS3','cd','Bungie',16,10,2014,0),
  ('Destiny','PS4','cd','Bungie',16,10,2014,0),
  ('Destiny','Xbox','cd','Bungie',16,10,2014,0),
  ('Destiny 2','PS4','cd','Bungie',13,10,2014,0),
  ('Destiny 2','Xbox','cd','Bungie',13,10,2016,0),
  ('Destiny 2','PC','cd','Bungie',13,10,2016,0),
  ('FIFA 18','PS3','cd','EA',3,10,2017,0),
  ('FIFA 18','PS4','cd','EA',3,10,2017,0),
  ('FIFA 18','Xbox','cd','EA',3,10,2017,0),
  ('FIFA 18','PC','cd','EA',3,10,2017,0),
  ('FIFA 18','Nintendo Switch','cd','EA',3,10,2017,0),
  ('FIFA 17','PS3','cd','EA',3,10,2016,0),
  ('FIFA 17','PS4','cd','EA',3,10,2016,0),
  ('FIFA 17','Xbox One','cd','EA',3,10,2016,0),
  ('FIFA 17','PC','cd','EA',3,10,2016,0),
  ('FIFA 17','Xbox 360','cd','EA',3,10,2016,0),
  ('FIFA 16','PS3','cd','EA',3,10,2015,0),
  ('FIFA 16','PS4','cd','EA',3,10,2015,0),
  ('FIFA 16','PC','cd','EA',3,10,2015,0),
  ('FIFA 16','Xbox One','cd','EA',3,10,2015,0),
  ('FIFA 16','Xbox 360','cd','EA',3,10,2015,0),
  ('The Last of Us Remastered','PS4','cd','Naughty Dog',18,10,2014,0),
  ('World of Warcraft','PC','cd','Blizzard',12,10,2004,0),
  ('Red Dead Redemption 2','PS4','cd','Rockstar Games',18,10,2018,0),
  ('Red Dead Redemption 2','Xbox One','cd','Rockstar Games',18,10,2018,0),
  ('Red Dead Redemption','PS4','cd','Rockstar Games',18,10,2016,0),
  ('Red Dead Redemption','Xbox 360','cd','Rockstar Games',18,10,2010,0),
  ('Red Dead Redemption','Xbox One','cd','Rockstar Games',18,10,2010,0),
  ('Grand Theft Auto V','PS3','cd','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','PS4','cd','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','Xbox One','cd','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','PS4','cd','Rockstar Games',13,10,2013,0),
  ('Spider-Man','PS4','cd','Insomniac Games',16,10,2018,0),
  ('Rocket League','PC','cd','Psyonix',3,10,2015,0),
  ('Rocket League','PS4','cd','Psyonix',3,10,2015,0),
  ('Rocket League','Xbox One','cd','Psyonix',3,10,2015,0),
  ('Rocket League','Nintendo Switch','cd','Psyonix',3,10,2015,0),
  ('Rocket League','macOS','cd','Psyonix',3,10,2015,0),
  ('Rocket League','Linux','cd','Psyonix',13,10,2016,0),
  ('The Witcher 3: Wild Hunt','PC','cd','CD Projekt',18,10,2015,0),
  ('FIFA 15','PS3','cd','EA',13,10,2015,0),
  ('FIFA 15','PS4','cd','EA',13,10,2015,0),
  ('FIFA 15','Xbox One','cd','EA',13,10,2015,0),
  ('FIFA 15','Xbox 360','cd','EA',13,10,2015,0),
  ('FIFA 15','PC','cd','EA',13,10,2015,0),
  ('Fallout 76','PS4','cd','Bethesda Game Studios',18,10,2018,0),
  ('Fallout 76','PC','cd','Bethesda Game Studios',18,10,2018,0),
  ('Fallout 76','Xbox One','cd','Bethesda Game Studios',18,10,2018,0),
  ('Dota','PC','tape','Unknown',13,10,2016,0),
  ('PUBG','XBOX','cd','BlueHole',18,15,2017,0);

CREATE TABLE User (
  userID     INT(50) 		AUTO_INCREMENT,
  firstName  VARCHAR(50)        NOT NULL,
  secondName VARCHAR(50)        NOT NULL,
  password   VARCHAR(255)        NOT NULL,
  email      VARCHAR(50)        NOT NULL,
  user_name  VARCHAR(50)        NOT NULL UNIQUE,
  fees        FLOAT(10, 2)  DEFAULT '0.00',
  admin      SMALLINT(1)        NOT NULL,
  administration SMALLINT(1)    NOT NULL,
  banned     SMALLINT(1)        NOT NULL DEFAULT '0',
  PRIMARY KEY (userID)
);

CREATE TABLE Renting (
  id       VARCHAR(50) UNIQUE NOT NULL,
  rentDate DATETIME           NOT NULL,
  dueDate  DATETIME           NOT NULL,
  duration DATETIME           NOT NULL,
  userid   INT(50)   NOT NULL,
  gameid   INT(50)  NOT NULL,
  extentions INT(2) DEFAULT '0',
  FOREIGN KEY (gameid) REFERENCES Game(id),
  FOREIGN KEY (userid) REFERENCES User(userID),
  PRIMARY KEY (id)
);

Insert Into User(firstName, secondName, password, email, user_name, admin, administration, banned)
Values ('Admin','Admin','$2y$10$xkEed2jTNfDQOTZ5qm7W9uPIyL9xZsNCv6oFeIxqXcLkpyUJiY/V6','admin@gmail.com','admin','1', '1', '0');
