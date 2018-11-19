CREATE TABLE Game (
  id        VARCHAR(50) UNIQUE NOT NULL,
  name      VARCHAR(50)        NOT NULL,
  platform  VARCHAR(50)        NOT NULL,
  format    VARCHAR(50)        NOT NULL,
  developer VARCHAR(20)        NOT NULL,
  PEGI      INT                NOT NULL,
  price     FLOAT(10, 2)       NOT NULL,
  year      DATE               NOT NULL,
  PRIMARY KEY (id)
);
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
