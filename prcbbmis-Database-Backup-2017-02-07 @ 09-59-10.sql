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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("4","Allyn","Alipo-on","Able","Allyn","Able","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("9","Ana Marie","Garriel","Quilantang","admin","admin","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("12","Raine","Barrios","Alvarez","Raine","admin","Philippine Red Cross Cebu","Admin");



