
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
  year          INT(4)        	NOT NULL,
  rented 	SMALLINT(1) 	NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO Game(name,platform,format,developer,PEGI,price,year,rented,image,review) Values
  ('overwatch','PS4','Disc','Blizzard',12,20,2016,0,'https://images-na.ssl-images-amazon.com/images/I/811pj8JZ8iL._SL1500_.jpg','https://uk.ign.com/articles/2016/05/28/overwatch-review'),
  ('overwatch','XBOX One','Disc','Blizzard',12,20,2016,0,'https://images-na.ssl-images-amazon.com/images/I/810AUO3CUzL._SY445_.jpg','https://uk.ign.com/articles/2016/05/28/overwatch-review'),
  ('overwatch','PC','Disc','Blizzard',12,20,2016,0,'https://images-na.ssl-images-amazon.com/images/I/917xadgCebL._SL1500_.jpg','https://uk.ign.com/articles/2016/05/28/overwatch-review'),
  ('Heroes of the Storm','PC','Disc','Blizzard',12,10,2015,0,'https://i.ytimg.com/vi/wPk004vsjuE/maxresdefault.jpg','https://uk.ign.com/articles/2018/03/20/heroes-of-the-storm-review-2018'),
  ('Destiny','PS3','Disc','Bungie',16,10,2014,0,'https://news-cdn.softpedia.com/images/news2/Destiny-Was-Scraped-5-or-6-Times-Before-Release-Last-Iteration-Developed-in-1-Year-468274-2.jpg','https://uk.ign.com/games/destiny'),
  ('Destiny','PS4','Disc','Bungie',16,10,2014,0,'https://news-cdn.softpedia.com/images/news2/Destiny-Was-Scraped-5-or-6-Times-Before-Release-Last-Iteration-Developed-in-1-Year-468274-2.jpg','https://uk.ign.com/games/destiny'),
  ('Destiny','XBOX ONE','Disc','Bungie',16,10,2014,0,'https://news-cdn.softpedia.com/images/news2/Destiny-Was-Scraped-5-or-6-Times-Before-Release-Last-Iteration-Developed-in-1-Year-468274-2.jpg','https://uk.ign.com/games/destiny'),
  ('Destiny 2','PS4','Disc','Bungie',13,30,2014,0,'https://www.mobygames.com/images/covers/l/433360-destiny-2-playstation-4-front-cover.jpg','https://uk.ign.com/games/destiny-2'),
  ('Destiny 2','XBOX','Disc','Bungie',13,30,2016,0,'https://www.mobygames.com/images/covers/l/433360-destiny-2-playstation-4-front-cover.jpg','https://uk.ign.com/games/destiny-2'),
  ('Destiny 2','PC','Disc','Bungie',13,30,2016,0,'https://www.mobygames.com/images/covers/l/433360-destiny-2-playstation-4-front-cover.jpg','https://uk.ign.com/games/destiny-2'),
  ('FIFA 18','PS3','Disc','EA',3,40,2017,0,'https://images-na.ssl-images-amazon.com/images/I/81G6K6XnLxL._SX342_.jpg','https://uk.ign.com/games/fifa-18'),
  ('FIFA 18','PS4','Disc','EA',3,40,2017,0,'https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/FIFA18cover.png/220px-FIFA18cover.png','https://uk.ign.com/games/fifa-18'),
  ('FIFA 18','XBOX','Disc','EA',3,40,2017,0,'https://images-na.ssl-images-amazon.com/images/I/816-STm%2BeyL._SX425_.jpg','https://uk.ign.com/games/fifa-18'),
  ('FIFA 18','PC','Disc','EA',3,40,2017,0,'https://savekeys.net/wp-content/uploads/2017/09/face_product_pc.png','https://uk.ign.com/games/fifa-18'),
  ('FIFA 18','Nintendo Switch','Card','EA',3,40,2017,0,'https://images-na.ssl-images-amazon.com/images/I/81CqJJnyBLL._SY500_.jpg','https://uk.ign.com/games/fifa-18'),
  ('FIFA 17','PS3','Disc','EA',3,30,2016,0,'https://cdn.wallapop.com/images/10420/3w/ra/__/c10420p236419376/i533641642.jpg?pictureSize=W640','https://uk.ign.com/games/fifa-2017'),
  ('FIFA 17','PS4','Disc','EA',3,30,2016,0,'https://images.livrariasaraiva.com.br/imagemnet/imagem.aspx/?pro_id=9370768&qld=90&l=430&a=-1','https://uk.ign.com/games/fifa-2017'),
  ('FIFA 17','XBOX ONE','Disc','EA',3,30,2016,0,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC1I5edysZ0J2Ev1sjg2CUHu72EC3hgcB4whYiUMoLg2JDPur1','https://uk.ign.com/games/fifa-2017'),
  ('FIFA 17','PC','Disc','EA',3,30,2016,0,'https://originassets.akamaized.net/origin-com-store-final-assets-prod/182633/231.0x326.0/1038862_LB_231x326_en_US_%5E_2016-07-21-10-11-54_1b27093a8723b707c8433a4aafc9203fd660d669.jpg','https://uk.ign.com/games/fifa-2017'),
  ('FIFA 17','XBOX 360','Disc','EA',3,30,2016,0,'https://i5.walmartimages.com/asr/17aaec14-97e4-4509-91e5-c3e17c44e001_1.a56753e79120912da72b14c33b5bc5e5.jpeg','https://uk.ign.com/games/fifa-2https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC1I5edysZ0J2Ev1sjg2CUHu72EC3hgcB4whYiUMoLg2JDPur1017'),
  ('FIFA 16','PS3','Disc','EA',3,20,2015,0,'https://images-na.ssl-images-amazon.com/images/I/610Ge2w6rdL.jpg','https://uk.ign.com/games/fifa-2016'),
  ('FIFA 16','PS4','Disc','EA',3,20,2015,0,'https://images-na.ssl-images-amazon.com/images/I/51ffLjm6vUL.jpg','https://uk.ign.com/games/fifa-2016'),
  ('FIFA 16','PC','Disc','EA',3,20,2015,0,'https://images-na.ssl-images-amazon.com/images/I/71LyLL5Xq5L._SX569_.jpg','https://uk.ign.com/games/fifa-2016'),
  ('FIFA 16','XBOX ONE','Disc','EA',3,20,2015,0,'https://images-na.ssl-images-amazon.com/images/I/51zIFKpez%2BL.jpg','https://uk.ign.com/games/fifa-2016'),
  ('FIFA 16','XBOX 360','Disc','EA',3,20,2015,0,'https://images-na.ssl-images-amazon.com/images/I/51xkOMZN3%2BL.jpg','https://uk.ign.com/games/fifa-2016'),
  ('The Last of Us Remastered','PS4','Disc','Naughty Dog',18,20,2014,0,'https://images-na.ssl-images-amazon.com/images/I/81TFSr6Vx4L._SL1500_.jpg','https://uk.ign.com/games/the-last-of-us'),
  ('The Last of Us','PS3','Disc','Naughty Dog',18,15,2013,0,'https://www.gamepark.ru/upload/iblock/4d7/the-last-of-us-ps3-goye_enl.jpg','https://uk.ign.com/games/the-last-of-us'),
  ('World of Warcraft','PC','Disc','Blizzard',12,30,2004,0,'https://images-na.ssl-images-amazon.com/images/I/51QmN8S-tqL.jpg','https://uk.ign.com/games/world-of-warcraft'),
  ('Red Dead Redemption 2','PS4','Disc','Rockstar Games',18,50,2018,0,'https://http2.mlstatic.com/red-dead-redemption-2-ps4-fisico-nuevo-sellado-D_NQ_NP_823596-MLA28472825959_102018-F.jpg','https://uk.ign.com/games/red-dead-redemption-2'),
  ('Red Dead Redemption 2','XBOX ONE','Disc','Rockstar Games',18,50,2018,0,'https://images-na.ssl-images-amazon.com/images/I/91ftcNv8XvL._SX342_.jpg','https://uk.ign.com/games/red-dead-redemption-2'),
  ('Red Dead Redemption','PS3','Disc','Rockstar Games',18,15,2010,0,'https://static.fnac-static.com/multimedia/Images/ES/NR/5b/0d/11/1117531/1540-6.jpg','https://uk.ign.com/games/red-dead-redemption'),
  ('Red Dead Redemption','XBOX 360','Disc','Rockstar Games',18,15,2010,0,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQflbjkItpaU-hHk-60Okm2ADHkxwfBNs8qehJK-EdqUjyM2Zsd','https://uk.ign.com/games/red-dead-redemption'),
  ('Grand Theft Auto V','PS3','Disc','Rockstar Games',13,20,2013,0,'https://media.rockstargames.com/rockstargames/img/global/news/upload/actual_1364906194.jpg','https://uk.ign.com/games/grand-theft-auto-v'),
  ('Grand Theft Auto V','PS4','Disc','Rockstar Games',13,20,2013,0,'https://media.rockstargames.com/rockstargames/img/global/news/upload/actual_1364906194.jpg','https://uk.ign.com/games/grand-theft-auto-v'),
  ('Grand Theft Auto V','XBOX ONE','Disc','Rockstar Games',13,20,2013,0,'https://media.rockstargames.com/rockstargames/img/global/news/upload/actual_1364906194.jpg','https://uk.ign.com/games/grand-theft-auto-v'),
  ('Grand Theft Auto V','PS4','Disc','Rockstar Games',13,20,2013,0,'https://media.rockstargames.com/rockstargames/img/global/news/upload/actual_1364906194.jpg','https://uk.ign.com/games/grand-theft-auto-v'),
  ('Grand Theft Auto IV','PS3','Disc','Rockstar Games',13,10,2013,0,'https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/Grand_Theft_Auto_IV_cover.jpg/220px-Grand_Theft_Auto_IV_cover.jpg','https://uk.ign.com/games/grand-theft-auto-iv'),
  ('Grand Theft Auto IV','XBOX 360','Disc','Rockstar Games',13,10,2013,0,'https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/Grand_Theft_Auto_IV_cover.jpg/220px-Grand_Theft_Auto_IV_cover.jpg','https://uk.ign.com/games/grand-theft-auto-iv'),
  ('Spider-Man','PS4','Disc','Insomniac Games',16,40,2018,0,'https://images-na.ssl-images-amazon.com/images/I/81d6JU6g1pL._SL1500_.jpg','https://uk.ign.com/games/marvels-spider-man'),
  ('Rocket League','PC','Disc','Psyonix',3,10,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('Rocket League','PS4','Disc','Psyonix',3,10,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('Rocket League','XBOX ONE','Disc','Psyonix',3,10,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('Rocket League','Nintendo Switch','Card','Psyonix',3,10,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('Rocket League','macOS','Disc','Psyonix',3,10,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('Rocket League','Linux','Disc','Psyonix',13,10,2016,0,'https://images.g2a.com/newlayout/323x433/1x1x0/c5cce5c915b4/591311205bafe31cbf5cd2db','https://uk.ign.com/games/rocket-league'),
  ('The Witcher 3: Wild Hunt','PC','Disc','CD Projekt',18,20,2015,0,'https://images.g2a.com/newlayout/323x433/1x1x0/06114476276e/59108976ae653aa55c6ac1f2','https://uk.ign.com/games/the-witcher-3'),
  ('FIFA 15','PS3','Disc','EA',13,10,2014,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcujvhK4w_h08TbKBdDxitQniOwvvxYpY9YLSkjg6DMt14fUerQ4dF1uKr4b9NAIRa2WzrD1ZN5zmgR_dI5ME_ucxvZHM.IRkeTFkAjjReVY2IpNT7_EJP.j5bOq4nJ4rCQh1izs.ci3ort6FnjTUwHzNEd3ZYG07_WIZL43Oz_TY-&h=300&w=200&format=jpg','https://uk.ign.com/games/fifa-2015'),
  ('FIFA 15','PS4','Disc','EA',13,10,2014,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcujvhK4w_h08TbKBdDxitQniOwvvxYpY9YLSkjg6DMt14fUerQ4dF1uKr4b9NAIRa2WzrD1ZN5zmgR_dI5ME_ucxvZHM.IRkeTFkAjjReVY2IpNT7_EJP.j5bOq4nJ4rCQh1izs.ci3ort6FnjTUwHzNEd3ZYG07_WIZL43Oz_TY-&h=300&w=200&format=jpg','https://uk.ign.com/games/fifa-2015'),
  ('FIFA 15','XBOX ONE','Disc','EA',13,10,2014,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcujvhK4w_h08TbKBdDxitQniOwvvxYpY9YLSkjg6DMt14fUerQ4dF1uKr4b9NAIRa2WzrD1ZN5zmgR_dI5ME_ucxvZHM.IRkeTFkAjjReVY2IpNT7_EJP.j5bOq4nJ4rCQh1izs.ci3ort6FnjTUwHzNEd3ZYG07_WIZL43Oz_TY-&h=300&w=200&format=jpg','https://uk.ign.com/games/fifa-2015'),
  ('FIFA 15','XBOX 360','Disc','EA',13,10,2014,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcujvhK4w_h08TbKBdDxitQniOwvvxYpY9YLSkjg6DMt14fUerQ4dF1uKr4b9NAIRa2WzrD1ZN5zmgR_dI5ME_ucxvZHM.IRkeTFkAjjReVY2IpNT7_EJP.j5bOq4nJ4rCQh1izs.ci3ort6FnjTUwHzNEd3ZYG07_WIZL43Oz_TY-&h=300&w=200&format=jpg','https://uk.ign.com/games/fifa-2015'),
  ('FIFA 15','PC','Disc','EA',13,10,2015,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcujvhK4w_h08TbKBdDxitQniOwvvxYpY9YLSkjg6DMt14fUerQ4dF1uKr4b9NAIRa2WzrD1ZN5zmgR_dI5ME_ucxvZHM.IRkeTFkAjjReVY2IpNT7_EJP.j5bOq4nJ4rCQh1izs.ci3ort6FnjTUwHzNEd3ZYG07_WIZL43Oz_TY-&h=300&w=200&format=jpg','https://uk.ign.com/games/fifa-2015'),
  ('Fallout 76','PS4','Disc','Bethesda Game Studios',18,30,2018,0,'https://boygeniusreport.files.wordpress.com/2018/05/fallout-76.jpg?quality=98&strip=all&w=782','https://uk.ign.com/games/fallout-76'),
  ('Fallout 76','PC','Disc','Bethesda Game Studios',18,30,2018,0,'https://boygeniusreport.files.wordpress.com/2018/05/fallout-76.jpg?quality=98&strip=all&w=782','https://uk.ign.com/games/fallout-76'),
  ('Fallout 76','XBOX ONE','Disc','Bethesda Game Studios',18,30,2018,0,'https://boygeniusreport.files.wordpress.com/2018/05/fallout-76.jpg?quality=98&strip=all&w=782','https://uk.ign.com/games/fallout-76'),
  ('Dota2','PC','tape','Valve',13,0,2016,0,'https://www.mobygames.com/images/covers/l/274887-dota-2-linux-front-cover.jpg','https://uk.ign.com/games/dota-2'),
  ('PUBG','XBOX','Disc','BlueHole',18,15,2017,0,'https://www.thenerdmag.com/wp-content/uploads/2017/10/pubg.jpg','https://uk.ign.com/games/playerunknowns-battlegrounds'),
  ('Super Smash Bros: Utilmate','Nintendo Switch','Card','Nintendo',12,50,2018,0,'https://assets1.ignimgs.com/2018/06/13/super-smash-btros-ultimate---button-0001-1528851298611.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/super-smash-bros-ultimate'),
  ('Monster Hunter Generations Ultimate','Nintendo Switch','Card','Capcom',15,30,2018,0,'https://assets1.ignimgs.com/2018/05/10/monster-hunter-generations-ultimate-button-1-1525990989338.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/monster-hunter-generations-ultimate'),
  ('Pokemon: Lets Go, Pikachu!','Nintendo Switch','Card','Nintendo',12,50,2018,0,'https://assets1.ignimgs.com/2018/11/12/pokemon-lets-go-pikachu---button-fin-1542047719936.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/pokemon-lets-go-pikachu'),
  ('The Legend of Link: Breath of the Wild','Nintendo Switch','Card','Nintendo',12,30,2018,0,'https://assets1.ignimgs.com/2016/06/16/legend-of-zelda-breath-of-the-wild-button-2016jpg-c104e4.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/the-legend-of-zelda-breath-of-the-wild'),
  ('Mariokart 8','Nintendo Switch','Card','Nintendo',3,30,2018,0,'https://assets2.ignimgs.com/2013/06/11/mario-kart-8generaljpg-30b88d.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/mario-kart-8'),
  ('Uncharted 4','PS4','Disc','Naughty Dog',18,30,2018,0,'https://assets2.ignimgs.com/2015/06/03/uncharted-4-button-v2jpg-5a448e.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/uncharted-4'),
  ('God of War','PS4','Disc','Santa Monica Studio',18,50,2018,0,'https://assets1.ignimgs.com/2017/07/28/god-of-war-ps4---button-1-1501203533464.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/god-of-war-ps4'),
  ('Bloodborne','PS4','Disc','From Software',18,20,2018,0,'https://assets2.ignimgs.com/2014/06/10/bloodbournejpg-e0ea8a.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/bloodborne'),
  ('The last of Gurdian','PS4','Disc','SIE Japan',12,10,2018,0,'https://assets2.ignimgs.com/2016/08/18/the-last-guardian-button-2016jpg-7b17d4.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/the-last-guardian'),
  ('KillZone 3','PS3','Disc','Guerrilla Games',18,10,2011,0,'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Killzone_3.jpg/220px-Killzone_3.jpg','https://uk.ign.com/games/killzone-3')
  ('KillZone 2','PS3','Disc','Guerrilla Games',18,10,2009,0,'https://media.ign.com/games/image/object/748/748475/Killzone-2_PS3_UK_BBFCUK_boxart_160w.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/killzone-2')
  ('Horizon: Zero Dawn','PS4','Disc','Guerrilla Games',14,25,2017,0,'https://assets1.ignimgs.com/2015/06/16/horizon-buttonjpg-a3f1bf.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/horizon-zero-dawn')
  ('Persona 5','PS4','Disc','Atlus',14,25,2017,0,'https://uk.ign.com/games/shin-megami-tensei-persona-5','https://www.technobuffalo.com/wp-content/uploads/2016/06/persona-5-cover-2-470x310@2x.jpg')
  ('Persona 5','PS3','Disc','Atlus',14,25,2017,0,'https://uk.ign.com/games/shin-megami-tensei-persona-5','https://www.technobuffalo.com/wp-content/uploads/2016/06/persona-5-cover-2-470x310@2x.jpg')
  ('Until Dawn','PS4','Disc','Supermassive Games',18,15,2016,0,'https://assets1.ignimgs.com/2013/12/04/until-dawn-generaljpg-e96e8e.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/until-dawn'),
  ('Final Fantasy XV','PS4','Disc','SE',18,25,2018,0,'https://assets2.ignimgs.com/2016/07/18/final-fantasy-xv-button-2016jpg-19b146.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/final-fantasy-xv'),
  ('Final Fantasy XV','XBOX ONE','Disc','SE',18,25,2018,0,'https://assets2.ignimgs.com/2016/07/18/final-fantasy-xv-button-2016jpg-19b146.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/final-fantasy-xv'),
  ('Forza Horizon 4','XBOX ONE','Disc','Trun 10',7,30,2018,0,'https://assets1.ignimgs.com/2018/04/13/forza-motorsport-generic-button-1523643033650.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/forza-horizon-4')
  ('Fable II','XBOX 360','Disc','LionHead',12,10,2008,0,'https://upload.wikimedia.org/wikipedia/en/thumb/7/7f/Fable_II.jpg/220px-Fable_II.jpg','https://uk.ign.com/games/fable-2')
  ('Forza 7','XBON ONE','Disc','Trun 10',7,30,2017,0,'https://assets1.ignimgs.com/2018/04/13/forza-motorsport-generic-button-1523643033650.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/forza-7')
  ('HALO 5: Gurdian','XBOX ONE','Disc','343 Industry',15,15,2015,0,'https://assets1.ignimgs.com/2015/08/03/halo-5-guardians-cover-art-verticaljpg-67bf76.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/halo-5'),
  ('Gear of War 4','XBOX ONE','Disc','The Coalition',15,20,2015,0,'https://assets2.ignimgs.com/2016/04/07/gears-4-button-2jpg-652442.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/gears-of-war-4'),
  ('Call of Duty Modern warfare 2','XBOX 360','Disc','Infinity Ward',18,10,2009,0,'https://upload.wikimedia.org/wikipedia/en/thumb/d/db/Modern_Warfare_2_cover.PNG/220px-Modern_Warfare_2_cover.PNG','https://uk.ign.com/games/call-of-duty-modern-warfare-2'),
  ('Call of Duty Modern warfare 2','PS3','Disc','Infinity Ward',18,10,2009,0,'https://upload.wikimedia.org/wikipedia/en/thumb/d/db/Modern_Warfare_2_cover.PNG/220px-Modern_Warfare_2_cover.PNG','https://uk.ign.com/games/call-of-duty-modern-warfare-2'),
  ('Call of Duty World at War','XBOX 360','Disc','Treyarch',18,10,2009,0,'https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Call_of_Duty_World_at_War_cover.png/220px-Call_of_Duty_World_at_War_cover.png','https://uk.ign.com/games/call-of-duty-world-at-war'),
  ('Call of Duty World at War','PS3','Disc','Treyarch',18,10,2009,0,'https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Call_of_Duty_World_at_War_cover.png/220px-Call_of_Duty_World_at_War_cover.png','https://uk.ign.com/games/call-of-duty-world-at-war'),
  ('Ninja Gaiden II','XBOX 360','Disc','Tecmo',18,10,2008,0,'https://media.ign.com/games/image/object/686/686645/UK_ninja_gaiden_2UK_boxart_160w.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/ninja-gaiden-ii')
  ('Halo 3','XBOX 360','Disc','Bungie',14,10,2007,0,'https://media.ign.com/games/image/object/734/734817/Halo3_UK_360UK_boxart_160w.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/halo-3')
  ('Halo 3: ODST','XBOX 360','Disc','Bungie',14,10,2009,0,'https://media.ign.com/games/image/object/852/852871/halo_3_odst_ukUK_boxart_160w.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/halo-3-odst')
  ('Halo Reach','XBOX 360','Disc','Bungie',14,10,2010,0,'https://upload.wikimedia.org/wikipedia/en/thumb/5/5c/Halo-_Reach_box_art.png/220px-Halo-_Reach_box_art.png','https://uk.ign.com/games/halo-reach')
  ('HALO 4','XBOX 360','Disc','343 Industry',14,10,2012,0,'https://upload.wikimedia.org/wikipedia/en/thumb/9/92/Halo_4_box_artwork.png/220px-Halo_4_box_artwork.png',,'https://uk.ign.com/games/halo-4')
  ('Ace Combat 6','XBOX 360','Disc','Namco',14,10,2007,0,'https://media.ign.com/games/image/object/894/894201/AC6_-_Xuk360UK_boxart_160w.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/ace-combat-6-game-ace-edge-flightstick')
  ('Farcry 5','PS4','Disc','Ubisoft',18,30,2017,0,'https://assets1.ignimgs.com/2017/05/24/far-cry-5-button-1495644783373.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/far-cry-5'),
  ('Farcry 5','XBOX ONE','Disc','Ubisoft',18,30,2017,0,'https://assets1.ignimgs.com/2017/05/24/far-cry-5-button-1495644783373.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/far-cry-5'),
  ('Battlefield V','PS4','Disc','DICE',18,40,2018,0,'https://assets1.ignimgs.com/2018/05/23/battlefield-v---button-fin-1527112517144.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/battlefield-5'),
  ('Battlefield V','XBOX ONE','Disc','DICE',18,40,2018,0,'https://assets1.ignimgs.com/2018/05/23/battlefield-v---button-fin-1527112517144.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/battlefield-5'),
  ('Star Wars Battlefront 2','PS4','Disc','DICE',18,20,2017,0,'https://assets1.ignimgs.com/2017/07/31/star-wars-battlefront-2---button-1501544517635.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/star-wars-battlefront-2'),
  ('Star Wars Battlefront 2','XBOX ONE','Disc','DICE',18,20,2017,0,'https://assets1.ignimgs.com/2017/07/31/star-wars-battlefront-2---button-1501544517635.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/star-wars-battlefront-2'),
  ('Resident Evil 7','XBOX ONE','Disc','Capcom',18,25,2017,0,'https://assets2.ignimgs.com/2016/06/13/re7-buttonjpg-bf679f.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/resident-evil-7'),
  ('Resident Evil 7','PS4','Disc','Capcom',18,25,2017,0,'https://assets2.ignimgs.com/2016/06/13/re7-buttonjpg-bf679f.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/resident-evil-7'),
  ('Monster Hunter World','PS4','Disc','Capcom',18,30,2018,0,'https://assets1.ignimgs.com/2017/06/13/monster-hunter-world-button-1497319986998.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/monster-hunter-world'),
  ('Monster Hunter World','XBOX ONE','Disc','Capcom',18,30,2018,0,'https://assets1.ignimgs.com/2017/06/13/monster-hunter-world-button-1497319986998.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/monster-hunter-world'),
  ('Mid-Earth: Shadow of War','XBOX ONE','Disc','Warner Bros',18,25,2017,0,'https://assets1.ignimgs.com/2017/02/27/middle-earth-shadow-of-war-button-1-1488226845213.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/middle-earth-shadow-of-war'),
  ('Mid-Earth: Shadow of War','PS4','Disc','Warner Bros',18,25,2017,0,'https://assets1.ignimgs.com/2017/02/27/middle-earth-shadow-of-war-button-1-1488226845213.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/middle-earth-shadow-of-war'),
  ('Tom Clancys Rainbow Six: Seige','PS4','Disc','Ubisoft',18,10,2016,0,'https://assets2.ignimgs.com/2015/03/31/r6-siege-button-02jpg-b778df.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/rainbow-six-siege'),
  ('Tom Clancys Rainbow Six: Seige','XBOX ONE','Disc','Ubisoft',18,10,2016,0,'https://assets2.ignimgs.com/2015/03/31/r6-siege-button-02jpg-b778df.jpg?fit=bounds&width=188&height=188','https://uk.ign.com/games/rainbow-six-siege'),
  ('Tom Clancys The Division','PS4','Disc','Ubisoft',18,10,2016,0,'https://www.mobygames.com/images/covers/l/325674-tom-clancy-s-the-division-playstation-4-front-cover.jpg','https://uk.ign.com/games/tom-clancys-the-division'),
  ('Tom Clancys The Division','XBOX ONE','Disc','Ubisoft',18,10,2016,0,'https://www.mobygames.com/images/covers/l/325674-tom-clancy-s-the-division-playstation-4-front-cover.jpg','https://uk.ign.com/games/tom-clancys-the-division'),
  ('Ace Combat 5','PS2','Disc','Namco',12,10,2004,0,'https://static.tvtropes.org/pmwiki/pub/images/ps2_ace_combat_5_the_unsung_war.jpg','https://uk.ign.com/games/ace-combat-5'),
  ('Ace Combat Zero','PS2','Disc','Namco',12,10,2006,0,'https://i.kym-cdn.com/photos/images/newsfeed/000/792/064/34e.jpg','https://uk.ign.com/games/ace-combat-zero-the-belkan-war'),
  ('Resident Evil 4','PS2','Disc','Capcom',18,10,2004,0,'https://www.mobygames.com/images/covers/l/71525-resident-evil-4-playstation-2-front-cover.jpg','https://uk.ign.com/games/resident-evil-4'),
  ('Halo: Combat Evolved','XBOX','Disc','Bungie',12,10,2001,0,'https://vignette.wikia.nocookie.net/halo/images/8/81/Halo_Combat_Evolved_-_Xbox_Cover.png/revision/latest?cb=20150331162657','https://uk.ign.com/games/halo-combat-evolved'),
  ('Halo 2','XBOX','Disc','Bungie',12,10,2001,0,'https://upload.wikimedia.org/wikipedia/en/thumb/9/92/Halo2-cover.png/220px-Halo2-cover.png','https://uk.ign.com/games/halo-2'),
  ('Star Wars: Knights of the Old Republic','XBOX','Dsic','Bioware',12,10,2003,0,'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc2ci.3T53EYdWRyH5jDqL83e0Squ7tPYWlr1kEJnJG_NnliYi1DAiny4P7xeGtN86Uwx2bDjJYKGh4tX.WWqgb_sJdW1VXCCEZliMl7NfXa4lE0L_H_Mo96HGG4BMfUX4_yIzNNn8EqwSjGEOvTEWmFWZ8p6G2ZoA36wA.HNsbBk-&h=300&w=200&format=jpg','https://uk.ign.com/games/star-wars-knights-of-the-old-republic'),
  ('Harry Potter 1-7 BluRay set','BluRay','Disc','Warner Bros',12,25,2016,0,'https://images-na.ssl-images-amazon.com/images/I/91pqZiiI3nL._SX342_.jpg','https://www.imdb.com/'),
  ('Star Wars The Prequel Trilogy','BluRay','Disc','20th Century Fox',12,20,2011,0,'https://images-na.ssl-images-amazon.com/images/I/91czT2QJL1L._SX522_.jpg','https://www.imdb.com/'),
  ('Termintor Quadrilogy','DVD','Disc','Sony Entertainment',18,10,2015,0,'https://images-na.ssl-images-amazon.com/images/I/81-xb8df6uL._SL1500_.jpg','https://www.imdb.com/'),
  ('Middle Earth Six films','DVD','Disc','Warner Bros',12,10,2016,0,'https://images-na.ssl-images-amazon.com/images/I/81HD5UwSxvL._SX522_.jpg','https://www.imdb.com/'),
  ('Frozen','DVD','Disc','Disney',3,10,2013,0,'https://images-na.ssl-images-amazon.com/images/I/91tpXOktjtL._SL1500_.jpg','https://www.imdb.com/'),
  ('The wolf of Wall street','DVD','Disc','Paramount',18,10,2013,0,'https://upload.wikimedia.org/wikipedia/en/thumb/d/d8/The_Wolf_of_Wall_Street_%282013%29.png/220px-The_Wolf_of_Wall_Street_%282013%29.png','https://www.imdb.com/'),
  ('Black Panther','DVD','Disc','Marvel Entertainment',12,10,2018,0,'https://images.store.hmv.com/app_/responsive/HMVStore/media/product/166363/01-166363.jpg?w=950','https://www.imdb.com/'),
  ('Iron Man','DVD','Disc','Marvel Entertainment',12,10,2008,0,'https://images-na.ssl-images-amazon.com/images/I/518odP7%2Bg0L.jpg','https://www.imdb.com/'),
  ('Kung Fu Panda','DVD','Disc','Paramount',6,10,2008,0,'https://images-na.ssl-images-amazon.com/images/I/517M%2BF7msHL._SY445_.jpg','https://www.imdb.com/'),
  ('Kung Fu Hustle','DVD','Disc','Paramount',12,10,2004,0,'https://images-na.ssl-images-amazon.com/images/I/51FMQ2G3B7L.jpg','https://www.imdb.com/'),
  ('Ready Player One','DVD','Disc','Warner Bros',14,13,2018,0,'https://images.store.hmv.com/app_/responsive/HMVStore/media/product/265498/01-265498.jpg?w=950','https://www.imdb.com/');





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
