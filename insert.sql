insert into Game values
  (10000000,'Call of Duty: Black Ops 4','PS4','FPS','Activision',18,49.99,2018-10-12,0)
  (10000001,'HALO 5: Gurdian','XBOX ONE','FPS','Microsoft',16,14.99,2015-10-27,0)
  (10000002,'Forza: Horizon 4','XBOX ONE','Racing Game','Microsoft',3,39.99,2018-10-3,0)
  (10000003,'Red Dead: Redempton 2','PS4','ACT','Rocket Star',18,49.99,2018-10-27,1)
  (10000004,'Red Dead: Redempton 2','XBOX ONE','ACT','Rocket Star',18,49.99,2018-10-27,0)
  (10000005,'Marvel Spider-Man','PS4','ACT','SONY',16,39.99,2018-09-07,0)
  (10000006,'Marvel Spider-Man','PS4','ACT','SONY',16,39.99,2018-09-07,0)
  (10000005,'GOD OF WAR','PS4','ACT','SONY',18,39.99,2018-04-20,0)

insert into User values
  ('TempID1','Mohamed','Alim','123456789','mohamed.alim@kcl.ac.uk',1,0)
  ('TempID2','Fahad','Mustafa','123456789','fahad.mustafa@kcl.ac.uk',1,0)
  ('TempID3','Mateusz ','Nowak','123456789','mateusz.nowak@kcl.ac.uk',1,0)
  ('TempID4','Vitesh','Soni','123456789','vitesh.soni@kcl.ac.uk',1,0)
  ('TempID5','Huajun','Lin','123456789','huajun.lin@kcl.ac.uk',1,0)
  ('TempID6','tempFristname1','tempSurname1','123456789','whatever Email',0,0)
  ('TempID7','tempFristname2','tempSurname2','123456789','whatever Email2',0,0)
  ('TempBannedID','tempFristname3','tempSurname4','123456789','whatever Email3',0,1)

  insert into Renting
  ('20000000',2018-11-23,2018-11-30,10000003,'TempID1',0)
  ('20000001',2018-11-27,2018-12-04,10000002,'TempID5',1)
