DROP TABLE IF EXISTS user;DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `usertype` varchar(18) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("4","Allyn","Alipo-on","Able","Allyn","Able","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("9","Ana Marie","Garriel","Quilantang","admin","admin","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("13","Raine","Alvarez","Barrios","luzzcia","prc","Philippine Red Cross Bacolod","PRC User");
INSERT INTO user VALUES("14","Jimmy","Virtucio","Virtucio","Jimmy","jimmy","Philippine Red Cross Cebu","Admin");
INSERT INTO user VALUES("15","kristine","padernal","osano","ampon","ampon","Lopez District Farmers Hospital Inc","Admin");
INSERT INTO user VALUES("16","Jouise","Dunlao","Benedicto","wis","0000","Dr. Pablo O. Torre, Sr. Memorial Hospital","Admin");
INSERT INTO user VALUES("17","Mexene","Sumagaysay","Samson","Mexene","12345","Philippine Red Cross Abra","Admin");
INSERT INTO user VALUES("33","Raine","Sumagaysay","Barrios","admin98765","pass","Alfredo F. Marañon, Sr. Memorial District Hospita","Admin");



