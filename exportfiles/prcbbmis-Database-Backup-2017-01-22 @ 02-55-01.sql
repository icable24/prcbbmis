DROP TABLE IF EXISTS activityschedule;

CREATE TABLE `activityschedule` (
  `actid` int(11) NOT NULL AUTO_INCREMENT,
  `actname` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`actid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO activityschedule VALUES("1","Blood letting","blood letting","bacolod city","2016-12-15");
INSERT INTO activityschedule VALUES("2","qdsdafas","efwrewfew","eewfew","2016-12-12");



DROP TABLE IF EXISTS bloodbag;

CREATE TABLE `bloodbag` (
  `bagserialnum` int(11) NOT NULL AUTO_INCREMENT,
  `expirydate` date NOT NULL,
  `bagtype` varchar(20) NOT NULL,
  PRIMARY KEY (`bagserialnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bloodbank;

CREATE TABLE `bloodbank` (
  `bankid` int(11) NOT NULL AUTO_INCREMENT,
  `bankname` varchar(50) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `contactdetails` varchar(20) NOT NULL,
  PRIMARY KEY (`bankid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO bloodbank VALUES("1","PRC Bacolod","10th Lacson Street Bacolod City","Philippines","123123123");



DROP TABLE IF EXISTS bloodinformation;

CREATE TABLE `bloodinformation` (
  `bloodid` int(11) NOT NULL AUTO_INCREMENT,
  `bloodgroup` varchar(3) NOT NULL,
  `rhtype` varchar(8) NOT NULL,
  `component` varchar(20) NOT NULL,
  PRIMARY KEY (`bloodid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bloodrequest;

CREATE TABLE `bloodrequest` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `hospital` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `transhistory` varchar(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `reqstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bloodtest;

CREATE TABLE `bloodtest` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `testtype` varchar(20) NOT NULL,
  `result` varchar(10) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bloodtransfer;

CREATE TABLE `bloodtransfer` (
  `transid` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(3) NOT NULL,
  PRIMARY KEY (`transid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS collection;

CREATE TABLE `collection` (
  `collid` int(11) NOT NULL AUTO_INCREMENT,
  `donorcollectid` varchar(18) NOT NULL,
  `cfname` varchar(50) NOT NULL,
  `cmname` varchar(50) NOT NULL,
  `clname` varchar(50) NOT NULL,
  `collectiondate` date NOT NULL,
  `unitserialno` varchar(18) NOT NULL,
  `bagtype` varchar(18) NOT NULL,
  `bloodtype` varchar(2) NOT NULL,
  `rhtype` varchar(8) NOT NULL,
  PRIMARY KEY (`collid`),
  KEY `donorcollectid` (`donorcollectid`,`cfname`,`cmname`,`clname`),
  KEY `collid` (`collid`),
  KEY `donor_collection_fk` (`cfname`,`cmname`,`clname`,`donorcollectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS dispensing;

CREATE TABLE `dispensing` (
  `disid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(50) NOT NULL,
  `raddress` varchar(100) NOT NULL,
  `rcontact` varchar(20) NOT NULL,
  PRIMARY KEY (`disid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS donor;

CREATE TABLE `donor` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dfname` varchar(50) NOT NULL,
  `dmname` varchar(50) NOT NULL,
  `dlname` varchar(50) NOT NULL,
  `daddress` varchar(100) NOT NULL,
  `dbirthdate` date NOT NULL,
  `dgender` varchar(6) NOT NULL,
  `dreligion` varchar(20) NOT NULL,
  `dcontact` varchar(20) NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `dnationality` varchar(30) NOT NULL,
  `demail` varchar(50) NOT NULL,
  `dregdate` varchar(18) NOT NULL,
  `dremarks` varchar(20) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `dfname` (`dfname`,`dmname`,`dlname`),
  KEY `did` (`did`),
  KEY `remarks` (`dremarks`)
) ENGINE=InnoDB AUTO_INCREMENT=1000008 DEFAULT CHARSET=latin1;

INSERT INTO donor VALUES("1000007","Allyn","Alipo-on","Able","Vallega St. Baranggay 1 Poblacion, Himamaylan Cit, Negros Occidental","1996-11-24","male","Roman Catholic","09999833269","Walk-in","Filipino","icable130@gmail.com","01-20-2017","Pending");



DROP TABLE IF EXISTS examination;

CREATE TABLE `examination` (
  `examid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `bldpressure` varchar(11) NOT NULL,
  `pulserate` int(11) NOT NULL,
  `bodytemp` int(11) NOT NULL,
  `genapp` varchar(50) NOT NULL,
  `skin` varchar(50) NOT NULL,
  `heent` varchar(50) NOT NULL,
  `hnl` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  PRIMARY KEY (`examid`),
  KEY `remarks` (`remarks`),
  KEY `did` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO examination VALUES("1000007","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000008","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000009","0","","0","0","","","","","Pending","");



DROP TABLE IF EXISTS history;

CREATE TABLE `history` (
  `hisid` int(11) NOT NULL AUTO_INCREMENT,
  `A1` varchar(3) NOT NULL,
  `A2` varchar(3) NOT NULL,
  `A3` varchar(3) NOT NULL,
  `A4` varchar(3) NOT NULL,
  `A5` varchar(3) NOT NULL,
  `A6` varchar(3) NOT NULL,
  `A7` varchar(3) NOT NULL,
  `A8` varchar(3) NOT NULL,
  `A9` varchar(3) NOT NULL,
  `A10` varchar(3) NOT NULL,
  `A11` varchar(3) NOT NULL,
  `A12` varchar(3) NOT NULL,
  `A13` varchar(3) NOT NULL,
  `A14` varchar(3) NOT NULL,
  `A15` varchar(3) NOT NULL,
  `A16` varchar(3) NOT NULL,
  `A17` varchar(3) NOT NULL,
  `A18` varchar(3) NOT NULL,
  `A19` varchar(3) NOT NULL,
  `A20` varchar(3) NOT NULL,
  `A21` varchar(3) NOT NULL,
  `A22` varchar(3) NOT NULL,
  `A23` varchar(3) NOT NULL,
  `A24` varchar(3) NOT NULL,
  `A25` varchar(3) NOT NULL,
  `A26` varchar(3) NOT NULL,
  `A27` varchar(3) NOT NULL,
  `A28` varchar(3) NOT NULL,
  `A29` varchar(3) NOT NULL,
  `A30` varchar(3) NOT NULL,
  `A31` varchar(3) NOT NULL,
  `A32` varchar(3) NOT NULL,
  `A33` varchar(3) NOT NULL,
  `A34` varchar(3) NOT NULL,
  `A35` varchar(3) NOT NULL,
  `A36` varchar(3) NOT NULL,
  PRIMARY KEY (`hisid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS inventory;

CREATE TABLE `inventory` (
  `invid` int(11) NOT NULL AUTO_INCREMENT,
  `unitserialno` int(11) NOT NULL,
  `component` varchar(10) NOT NULL,
  `bloodtype` varchar(2) NOT NULL,
  `rhtype` varchar(8) NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS patient;

CREATE TABLE `patient` (
  `pid` varchar(18) NOT NULL,
  `pfname` varchar(50) NOT NULL,
  `pmname` varchar(50) NOT NULL,
  `plname` varchar(50) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pbirthdate` date NOT NULL,
  `pgender` varchar(6) NOT NULL,
  `pcontact` varchar(20) NOT NULL,
  `pregdate` varchar(18) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("012120170150","Aliah","Madrigal","Rodriguez","Pahanocoy, Bacolod City, Negros Occidental","2017-01-01","female","09090912345","01-21-2017");



DROP TABLE IF EXISTS screening;

CREATE TABLE `screening` (
  `scrid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `weight` int(25) NOT NULL,
  `spgravity` int(25) NOT NULL,
  `hemgb` int(25) NOT NULL,
  `hemtcrt` int(25) NOT NULL,
  `rbc` int(25) NOT NULL,
  `wbc` int(25) NOT NULL,
  `pltcount` int(25) NOT NULL,
  `screendate` varchar(18) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`scrid`),
  KEY `did` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO screening VALUES("1000007","0","0","0","0","0","0","0","0","","Pending");



DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `usertype` varchar(18) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("4","Allyn","Able","Allyn","Alipo-on","Able","Admin");
INSERT INTO user VALUES("8","prcuser","prcuser","Ana Marie","Garriel","Quilantang","PRC User");
INSERT INTO user VALUES("9","Raine","raine","Luzzcia Loraine","Barrios","Alvarez","Admin");



