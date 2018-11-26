
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
INSERT INTO Game Values
  ('g000001','overwatch','PS4','cd','Blizzard',12,10,2016,0),
  ('g000002','overwatch','Xbox','cd','Blizzard',12,10,2016,0),
  ('g000003','overwatch','PC','cd','Blizzard',12,10,2016,0),
  ('g000004','Heroes of the Storm','PC','cd','Blizzard',12,10,2015,0),
  ('g000005','Destiny','PS3','cd','Bungie',16,10,2014,0),
  ('g000006','Destiny','PS4','cd','Bungie',16,10,2014,0),
  ('g000007','Destiny','Xbox','cd','Bungie',16,10,2014,0),
  ('g000008','Destiny 2','PS4','cd','Bungie',13,10,2014,0),
  ('g000009','Destiny 2','Xbox','cd','Bungie',13,10,2016,0),
  ('g000010','Destiny 2','PC','cd','Bungie',13,10,2016,0),
  ('g000011','FIFA 18','PS3','cd','EA',3,10,2017,0),
  ('g000012','FIFA 18','PS4','cd','EA',3,10,2017,0),
  ('g000013','FIFA 18','Xbox','cd','EA',3,10,2017,0),
  ('g000014','FIFA 18','PC','cd','EA',3,10,2017,0),
  ('g000015','FIFA 18','Nintendo Switch','cd','EA',3,10,2017,0),
  ('g000016','FIFA 17','PS3','cd','EA',3,10,2016,0),
  ('g000017','FIFA 17','PS4','cd','EA',3,10,2016,0),
  ('g000018','FIFA 17','Xbox One','cd','EA',3,10,2016,0),
  ('g000019','FIFA 17','PC','cd','EA',3,10,2016,0),
  ('g000020','FIFA 17','Xbox 360','cd','EA',3,10,2016,0),
  ('g000021','FIFA 16','PS3','cd','EA',3,10,2015,0),
  ('g000022','FIFA 16','PS4','cd','EA',3,10,2015,0),
  ('g000023','FIFA 16','PC','cd','EA',3,10,2015,0),
  ('g000024','FIFA 16','Xbox One','cd','EA',3,10,2015,0),
  ('g000025','FIFA 16','Xbox 360','cd','EA',3,10,2015,0),
  ('g000026','The Last of Us Remastered','PS4','cd','Naughty Dog',18,10,2014,0),
  ('g000027','World of Warcraft','PC','cd','Blizzard',12,10,2004,0),
  ('g000028','Red Dead Redemption 2','PS4','cd','Rockstar Games',18,10,2018,0),
  ('g000029','Red Dead Redemption 2','Xbox One','cd','Rockstar Games',18,10,2018,0),
  ('g000030','Red Dead Redemption','PS4','cd','Rockstar Games',18,10,2016,0),
  ('g000031','Red Dead Redemption','Xbox 360','cd','Rockstar Games',18,10,2010,0),
  ('g000032','Red Dead Redemption','Xbox One','cd','Rockstar Games',18,10,2010,0),
  ('g000033','Grand Theft Auto V','PS3','cd','Rockstar Games',13,10,2013,0),
  ('g000034','Grand Theft Auto V','PS4','cd','Rockstar Games',13,10,2013,0),
  ('g000035','Grand Theft Auto V','Xbox One','cd','Rockstar Games',13,10,2013,0),
  ('g000036','Grand Theft Auto V','PS4','cd','Rockstar Games',13,10,2013,0),
  ('g000037','Spider-Man','PS4','cd','Insomniac Games',16,10,2018,0),
  ('g000038','Rocket League','PC','cd','Psyonix',3,10,2015,0),
  ('g000039','Rocket League','PS4','cd','Psyonix',3,10,2015,0),
  ('g000040','Rocket League','Xbox One','cd','Psyonix',3,10,2015,0),
  ('g000041','Rocket League','Nintendo Switch','cd','Psyonix',3,10,2015,0),
  ('g000042','Rocket League','macOS','cd','Psyonix',3,10,2015,0),
  ('g000043','Rocket League','Linux','cd','Psyonix',13,10,2016,0),
  ('g000044','The Witcher 3: Wild Hunt','PC','cd','CD Projekt',18,10,2015,0),
  ('g000045','FIFA 15','PS3','cd','EA',13,10,2015,0),
  ('g000046','FIFA 15','PS4','cd','EA',13,10,2015,0),
  ('g000047','FIFA 15','Xbox One','cd','EA',13,10,2015,0),
  ('g000048','FIFA 15','Xbox 360','cd','EA',13,10,2015,0),
  ('g000049','FIFA 15','PC','cd','EA',13,10,2015,0),
  ('g000050','Fallout 76','PS4','cd','Bethesda Game Studios',18,10,2018,0),
  ('g000051','Fallout 76','PC','cd','Bethesda Game Studios',18,10,2018,0),
  ('g000052','Fallout 76','Xbox One','cd','Bethesda Game Studios',18,10,2018,0),
  ('g000053','Dota','PC','tape','Unknown',13,10,2016,0),
  ('g000054','PUBG','XBOX','cd','BlueHole',18,15,2017,0);

CREATE TABLE User (
  userID     VARCHAR(50) UNIQUE NOT NULL,
  firstName  VARCHAR(50)        NOT NULL,
  secondName VARCHAR(50)        NOT NULL,
  password   VARCHAR(50)        NOT NULL,
  email      VARCHAR(50)        NOT NULL,
  user_name  VARCHAR(50)        NOT NULL,
  admin      SMALLINT(1)        NOT NULL,
  banned     SMALLINT(1)        NOT NULL,
  PRIMARY KEY (userID)
);

CREATE TABLE Renting (
  id       VARCHAR(50) UNIQUE NOT NULL,
  rentDate DATETIME           NOT NULL,
  dueDate  DATETIME           NOT NULL,
  duration DATETIME           NOT NULL,
  userid   VARCHAR(50),
  gameid   VARCHAR(50),
  FOREIGN KEY (gameid) REFERENCES Game (id),
  FOREIGN KEY (userid) REFERENCES User (userID),
  PRIMARY KEY (id)
);
