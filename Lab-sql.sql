
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
  ('overwatch','PS4','Disc','Blizzard',12,10,2016,0),
  ('overwatch','XBOX','Disc','Blizzard',12,10,2016,0),
  ('overwatch','PC','Disc','Blizzard',12,10,2016,0),
  ('Heroes of the Storm','PC','Disc','Blizzard',12,10,2015,0),
  ('Destiny','PS3','Disc','Bungie',16,10,2014,0),
  ('Destiny','PS4','Disc','Bungie',16,10,2014,0),
  ('Destiny','XBOX','Disc','Bungie',16,10,2014,0),
  ('Destiny 2','PS4','Disc','Bungie',13,10,2014,0),
  ('Destiny 2','XBOX','Disc','Bungie',13,10,2016,0),
  ('Destiny 2','PC','Disc','Bungie',13,10,2016,0),
  ('FIFA 18','PS3','Disc','EA',3,10,2017,0),
  ('FIFA 18','PS4','Disc','EA',3,10,2017,0),
  ('FIFA 18','XBOX','Disc','EA',3,10,2017,0),
  ('FIFA 18','PC','Disc','EA',3,10,2017,0),
  ('FIFA 18','Nintendo Switch','Card','EA',3,10,2017,0),
  ('FIFA 17','PS3','Disc','EA',3,10,2016,0),
  ('FIFA 17','PS4','Disc','EA',3,10,2016,0),
  ('FIFA 17','XBOX ONE','Disc','EA',3,10,2016,0),
  ('FIFA 17','PC','Disc','EA',3,10,2016,0),
  ('FIFA 17','XBOX 360','Disc','EA',3,10,2016,0),
  ('FIFA 16','PS3','Disc','EA',3,10,2015,0),
  ('FIFA 16','PS4','Disc','EA',3,10,2015,0),
  ('FIFA 16','PC','Disc','EA',3,10,2015,0),
  ('FIFA 16','XBOX ONE','Disc','EA',3,10,2015,0),
  ('FIFA 16','XBOX 360','Disc','EA',3,10,2015,0),
  ('The Last of Us Remastered','PS4','Disc','Naughty Dog',18,10,2014,0),
  ('The Last of Us','PS3','Disc','Naughty Dog',18,10,2013,0),
  ('World of Warcraft','PC','Disc','Blizzard',12,10,2004,0),
  ('Red Dead Redemption 2','PS4','Disc','Rockstar Games',18,10,2018,0),
  ('Red Dead Redemption 2','XBOX ONE','Disc','Rockstar Games',18,10,2018,0),
  ('Red Dead Redemption','PS3','Disc','Rockstar Games',18,10,2010,0),
  ('Red Dead Redemption','XBOX 360','Disc','Rockstar Games',18,10,2010,0),
  ('Grand Theft Auto V','PS3','Disc','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','PS4','Disc','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','XBOX ONE','Disc','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto V','PS4','Disc','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto IV','PS3','Disc','Rockstar Games',13,10,2013,0),
  ('Grand Theft Auto IV','XBOX 360','Disc','Rockstar Games',13,10,2013,0),
  ('Spider-Man','PS4','Disc','Insomniac Games',16,10,2018,0),
  ('Rocket League','PC','Disc','Psyonix',3,10,2015,0),
  ('Rocket League','PS4','Disc','Psyonix',3,10,2015,0),
  ('Rocket League','XBOX ONE','Disc','Psyonix',3,10,2015,0),
  ('Rocket League','Nintendo Switch','Card','Psyonix',3,10,2015,0),
  ('Rocket League','macOS','Disc','Psyonix',3,10,2015,0),
  ('Rocket League','Linux','Disc','Psyonix',13,10,2016,0),
  ('The Witcher 3: Wild Hunt','PC','Disc','CD Projekt',18,10,2015,0),
  ('FIFA 15','PS3','Disc','EA',13,10,2015,0),
  ('FIFA 15','PS4','Disc','EA',13,10,2015,0),
  ('FIFA 15','XBOX ONE','Disc','EA',13,10,2015,0),
  ('FIFA 15','XBOX 360','Disc','EA',13,10,2015,0),
  ('FIFA 15','PC','Disc','EA',13,10,2015,0),
  ('Fallout 76','PS4','Disc','Bethesda Game Studios',18,10,2018,0),
  ('Fallout 76','PC','Disc','Bethesda Game Studios',18,10,2018,0),
  ('Fallout 76','XBOX ONE','Disc','Bethesda Game Studios',18,10,2018,0),
  ('Dota','PC','tape','Valve',13,10,2016,0),
  ('PUBG','XBOX','Disc','BlueHole',18,15,2017,0),
  ('Rocket League','Nintendo Switch','Card','Psyonix',3,10,2015,0),
  ('Super Smash Bros: Utilmate','Nintendo Switch','Card','Nintendo',12,10,2018,0)
  ('Monster Hunter Generations Ultimate','Nintendo Switch','Card','Capcom',15,10,2018,0)
  ('Pikachu Let s go ','Nintendo Switch','Card','Nintendo',12,10,2018,0)
  ('Legend of Zelda; Breath of Wild','Nintendo Switch','Card','Nintendo',12,10,2018,0)
  ('Mariokart 8','Nintendo Switch','Card','Nintendo',3,10,2018,0)
  ('uncharted 4','PS4','Disc','Naughty Dog',18,10,2018,0),
  ('God of War','PS4','Disc','Santa Monica Studio',18,10,2018,0),
  ('Bloodborne','PS4','Disc','From Software',18,10,2018,0),
  ('The last of Gurdian','PS4','Disc','SIE Japan',12,10,2018,0),
  ('Until Dawn','PS4','Disc','Supermassive Games',18,10,2016,0),
  ('Final Fantasy XV','PS4','Disc','SE',18,10,2018,0),
  ('Final Fantasy XV','XBOX ONE','Disc','SE',18,10,2018,0),
  ('HALO 5: Gurdian','XBOX ONE','Disc','343 Industry',15,10,2015,0),
  ('Gear of War 4','XBOX ONE','Disc','The Coalition',15,10,2015,0),
  ('Call of Duty Modern warfare 2','XBOX 360','Disc','Infinity Ward',18,10,2009,0),
  ('Call of Duty Modern warfare 2','PS3','Disc','Infinity Ward',18,10,2009,0),
  ('Call of Duty World at War','XBOX 360','Disc','Infinity Ward',18,10,2009,0),
  ('Call of Duty World at War','PS3','Disc','Infinity Ward',18,10,2009,0),
  ('Farcry 5','PS4','Disc','Ubisoft',18,10,2017,0),
  ('Farcry 5','XBOX ONE','Disc','Ubisoft',18,10,2017,0),
  ('Battlefield V','PS4','Disc','DICE',18,10,2018,0),
  ('Battlefield V','XBOX ONE','Disc','DICE',18,10,2018,0),
  ('Star Wars Battlefront 2','PS4','Disc','DICE',18,10,2017,0),
  ('Star Wars Battlefront 2','XBOX ONE','Disc','DICE',18,10,2017,0),
  ('Resident Evil 7','XBOX ONE','Disc','Capcom',18,10,2017,0),
  ('Resident Evil 7','PS4','Disc','Capcom',18,10,2017,0),
  ('Monster Hunter World','PS4','Disc','Capcom',18,10,2018,0),
  ('Monster Hunter World','XBOX ONE','Disc','Capcom',18,10,2018,0),
  ('Mid-Earth: Shadow of War','XBOX ONE','Disc','Warner Bros',18,10,2017,0),
  ('Mid-Earth: Shadow of War','PS4','Disc','Warner Bros',18,10,2017,0),
  ('Tom Clancys Rainbow Six: Seige','PS4','Disc','Ubisoft',18,10,2016,0),
  ('Tom Clancys Rainbow Six: Seige','XBOX ONE','Disc','Ubisoft',18,10,2016,0),
  ('Tom Clancys The Division','PS4','Disc','Ubisoft',18,10,2016,0),
  ('Tom Clancys The Division','XBOX ONE','Disc','Ubisoft',18,10,2016,0),
  ('Harry Potter 1-7 BluRay set','BluRay','Disc','Warner Bros',12,10,2016,0),
  ('Star Wars The Prequel Trilogy','BluRay','Disc','20th Century Fox',12,10,2011,0),
  ('Termintor Quadrilogy','DVD','Disc','Sony Entertainment',18,10,2015,0),
  ('Middle Earth Six films','DVD','Disc','Warner Bros',12,10,2016,0),
  ('Frozen','DVD','Disc','Disney',3,10,2013,0),
  ('The wold of Wall street','DVD','Disc','Paramount',18,10,2013,0),
  ('Black Panther','DVD','Disc','Marvel Entertainment',12,10,2018,0),
  ('Iron Man','DVD','Disc','Marvel Entertainment',12,10,2008,0),
  ('Kung Fu Panda','DVA','Disc','Paramount',6,10,2008,0),
  ('Kung Fu Hustle','DVA','Disc','Paramount',12,10,2004,0),
  ('Ready Player One','DVD','Disc','Warner Bros',14,10,2018,0);




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
