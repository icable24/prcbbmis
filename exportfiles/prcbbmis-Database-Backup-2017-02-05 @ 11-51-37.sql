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
  `unitserialno` varchar(18) NOT NULL,
  `bagtype` varchar(20) NOT NULL,
  `bagid` int(11) NOT NULL AUTO_INCREMENT,
  `bloodinfo` int(11) NOT NULL,
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL,
  `test3` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`bagid`),
  UNIQUE KEY `bagserialnum` (`unitserialno`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO bloodbag VALUES("C01293123","450cc Single","8","7","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("O123123","450cc Triple","9","5","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("AB123123","450cc Quadruple","10","7","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("A09123123","Apheresis Platelet","11","1","1","2","3","Inventory");
INSERT INTO bloodbag VALUES("A12310239123","450cc Triple","12","1","0","0","0","For Testing");



DROP TABLE IF EXISTS bloodbank;

CREATE TABLE `bloodbank` (
  `bankid` int(11) NOT NULL AUTO_INCREMENT,
  `bankname` varchar(100) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `contactdetails` varchar(20) NOT NULL,
  `bankcateg` varchar(9) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'registered',
  PRIMARY KEY (`bankid`),
  KEY `bankname` (`bankname`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

INSERT INTO bloodbank VALUES("7","Alfredo F. Marañon, Sr. Memorial District Hospital","Bato, Sagay City","Philippines","(034) 213 0088","Hospital","registered");
INSERT INTO bloodbank VALUES("8","Bacolod Adventist Medical Center","C.V. Ramos Avenue, Taculing","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("9","Bacolod Our Lady of Mercy Specialty Hospital","Eroreco, Mandalagan, Bacolod","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("10","Bago City Hospital","Rafael Salas, Bago City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("11","Binalbagan Infirmary","Rizal, Binalbagan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("12","Cadiz District Hospital","Hortencia, Cadiz City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("13","Calatrava District Hospital","Calatrava","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("14","Cauayan Municipal Hospital","Isio, Cauayan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("15","Corazon Locsin Montelibano Memorial Regional Hospital","Lacson St. Bacolod","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("16","Don Salvador Benedicto Memorial Hospital","La Carlota City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("17","Dr. Gumersindo Garcia, Sr. Memorial Hospital","Guanzon St. Kabankalan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("18","Dr. Pablo O. Torre, Sr. Memorial Hospital","Benigno Aquino Drive, Bacolod","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("19","E.R. ELumba Clinic","Rizal St. La Castellana","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("20","Eleuterio T. Decena Memorial Hospital","Bacuyangan, Hinoba-an","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("21","Gov. Valeriano M. Gatuslao Memorial Hospital","Barangay IV, Himamaylan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("22","Ignacio Lacson Arroyo Sr. Memorial District Hospital","Burgos St. Isabela","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("23","Immaculate Concepcion Health Center","Bandung Village, Victorias","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("24","Kabankalan City Hospital","Tabugon, Kabankalan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("25","Kabankalan District Hospital","Santo Mojon, Binicuil, Kabankalan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("26","Lopez District Farmers Hospital Inc","Sagay City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("27","The Doctors Hospital, Inc","Benigno Aquino Drive, Bacolod","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("28","San Carlos City Hospital","Ylagan St. San Carlos City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("29","San Carlos Doctors Hospital","National Highway, San Carlos City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("30","Southern Negros Doctors Hospital","Don Emilio Village, Kabankalan","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("31","South Bacolod General Hospital & General Center, I","Pahanocoy, Bacolod","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("32","Valladolid District Hospital","Valladolid","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("33","Vicente Gustilo District Hospital","Lopez Drive, Escalante City","Philippines","","Hospital","registered");
INSERT INTO bloodbank VALUES("34","Philippine Red Cross Cagayan","Magallanes corner Gomez Street, Tuguegarao City, 3500, Cagayan Valley","Philippines","(078) 846 2881","Chapter","registered");
INSERT INTO bloodbank VALUES("35","Philippine Red Cross Cagayan","Magallanes corner Gomez Street, Tuguegarao City, 3500, Cagayan Valley","Philippines","(078) 846 2881","Chapter","registered");
INSERT INTO bloodbank VALUES("36","Philippine Red Cross Vigan","Vigan City, Ilocos Sur","Philippines","","Chapter","registered");
INSERT INTO bloodbank VALUES("37","Philippine Red Cross Abra","Corner Taft & Washington Street, Zone 6, Bangued, Abra","Philippines","(074) 752 5393","Chapter","registered");
INSERT INTO bloodbank VALUES("38","Philippine Red Cross La Union","Don Pablo Campos Bldg., Widdoes St., Barangay 2, San Fernando, 2500, La Union","Philippines","(072) 607 3143","Chapter","registered");
INSERT INTO bloodbank VALUES("39","Philippine Red Cross Nueva Vizcaya","Capitol Compound, Bayombong, 3700, Nueva Vizcaya","Philippines","(078) 321 2189","Chapter","registered");
INSERT INTO bloodbank VALUES("40","Philippine Red Cross Quirino","Capitol Compound, Cabarroguis, 3400, Quirino, Capitol Crest Road, Cabarroguis, Quirino","Philippines","(078) 692 5054","Chapter","registered");
INSERT INTO bloodbank VALUES("41","Philippine Red Cross Nueva Ecija","Old Capitol Compound, Llanera Street, Cabanatuan City, 3100","Philippines","(044) 463 1280","Chapter","registered");
INSERT INTO bloodbank VALUES("42","Philippine Red Cross Bulacan","Capitol Compound, Malolos, 3000 Bulacan","Philippines","(044) 662 5922","Chapter","registered");
INSERT INTO bloodbank VALUES("43","Philippine National Red Cross Pampanga","Capitol Compound, Sto. Niño, Regional Government Center, Barangay Maimpis, San Fernando, Pampanga","Philippines","(045) 961 4117","Chapter","registered");
INSERT INTO bloodbank VALUES("44","Philippine Red Cross Valenzuela","Dahlia Street, Lungsod ng Valenzuela, Kalakhang Maynila","Philippines","0917 806 8529","Chapter","registered");
INSERT INTO bloodbank VALUES("45","Philippine Red Cross Malabon","Gov. Pascual Ave, Potero, Malabon, 1475 Metro Manila","Philippines","(02) 366 6470","Chapter","registered");
INSERT INTO bloodbank VALUES("47","Philippine Red Cross Cebu","Osmeña Blvd, Cebu City","Philippines","(032) 253 9793","Chapter","registered");
INSERT INTO bloodbank VALUES("49","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","Philippines","(034) 434 9286","Chapter","registered");



DROP TABLE IF EXISTS bloodinformation;

CREATE TABLE `bloodinformation` (
  `bloodid` int(11) NOT NULL AUTO_INCREMENT,
  `bloodgroup` varchar(3) NOT NULL,
  `rhtype` varchar(8) NOT NULL,
  PRIMARY KEY (`bloodid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO bloodinformation VALUES("1","A","Positive");
INSERT INTO bloodinformation VALUES("2","A","Negative");
INSERT INTO bloodinformation VALUES("3","B","Positive");
INSERT INTO bloodinformation VALUES("4","B","Negative");
INSERT INTO bloodinformation VALUES("5","AB","Positive");
INSERT INTO bloodinformation VALUES("6","AB","Negative");
INSERT INTO bloodinformation VALUES("7","O","Positive");
INSERT INTO bloodinformation VALUES("8","O","Negative");



DROP TABLE IF EXISTS bloodrequest;

CREATE TABLE `bloodrequest` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `bloodid` int(11) NOT NULL,
  `component` varchar(15) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO bloodrequest VALUES("1","Pending","4000003","0","Whole Blood","450cc","2");
INSERT INTO bloodrequest VALUES("2","Pending","4000005","0","FFP","450cc","1");



DROP TABLE IF EXISTS bloodtest;

CREATE TABLE `bloodtest` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `bagserialno` varchar(20) NOT NULL,
  `hepab` float NOT NULL,
  `syphillis` float NOT NULL,
  `hepac` float NOT NULL,
  `hiv` float NOT NULL,
  `malaria` float NOT NULL,
  `remarks1` varchar(20) NOT NULL,
  `remarks2` varchar(20) NOT NULL,
  `remarks3` varchar(20) NOT NULL,
  `remarks4` varchar(20) NOT NULL,
  `remarks5` varchar(20) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO bloodtest VALUES("1","A09123123","0.32","0.085","0.034","0.077","0.144","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("2","A09123123","0.32","0.164","0.094","0.13","0.147","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("3","A09123123","0.085","0.085","0.042","0.08","0.147","Negative","Negative","Negative","Negative","Negative");



DROP TABLE IF EXISTS bloodtransfer;

CREATE TABLE `bloodtransfer` (
  `transid` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(3) NOT NULL,
  PRIMARY KEY (`transid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS chat_interactions;

CREATE TABLE `chat_interactions` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` varchar(255) NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`message_id`)
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
  `bloodinfo` int(11) NOT NULL,
  PRIMARY KEY (`collid`),
  KEY `donorcollectid` (`donorcollectid`,`cfname`,`cmname`,`clname`),
  KEY `collid` (`collid`),
  KEY `donor_collection_fk` (`cfname`,`cmname`,`clname`,`donorcollectid`)
) ENGINE=InnoDB AUTO_INCREMENT=3000008 DEFAULT CHARSET=latin1;

INSERT INTO collection VALUES("3000003","1000018","Micah","Novilla","Aride","2017-01-10","C01293123","450 cc Single","7");
INSERT INTO collection VALUES("3000004","1000013","Jeremiah","Barrios","Canuto","2017-01-03","O123123","450 cc Triple","5");
INSERT INTO collection VALUES("3000005","1000014","Shaun Elijah","Malvar","Dadibalos","2017-01-10","AB123123","450cc Quadruple","7");
INSERT INTO collection VALUES("3000006","1000012","Luzzcia Loraine","Barrios","Alvarez","2017-01-04","A09123123","Apheresis Platelet","1");
INSERT INTO collection VALUES("3000007","1000012","Luzzcia Loraine","Barrios","Alvarez","2017-01-04","A12310239123","450cc Triple","1");



DROP TABLE IF EXISTS componentsprep;

CREATE TABLE `componentsprep` (
  `prepid` int(11) NOT NULL AUTO_INCREMENT,
  `collid` int(11) NOT NULL,
  `bagserialno` varchar(18) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`prepid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO componentsprep VALUES("3","3000003","C01293123","Pending");
INSERT INTO componentsprep VALUES("4","3000004","O123123","Done");
INSERT INTO componentsprep VALUES("5","3000005","AB123123","Done");
INSERT INTO componentsprep VALUES("6","3000006","A09123123","Done");
INSERT INTO componentsprep VALUES("7","3000007","A12310239123","Done");



DROP TABLE IF EXISTS contacts;

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_first` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contact_last` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




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
  `bloodinfo` int(1) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `dfname` (`dfname`,`dmname`,`dlname`),
  KEY `did` (`did`),
  KEY `remarks` (`dremarks`),
  KEY `bloodinfo` (`bloodinfo`)
) ENGINE=InnoDB AUTO_INCREMENT=1000024 DEFAULT CHARSET=latin1;

INSERT INTO donor VALUES("1000007","Allyn","Alipo-on","Able","Vallega St. Baranggay 1 Poblacion, Himamaylan Cit, Negros Occidental","1996-11-24","male","Roman Catholic","09999833269","Walk-in","Filipino","icable130@gmail.com","01-20-2017","Deferred","1");
INSERT INTO donor VALUES("1000011","Jimmy","Belviatura","Virtucio Jr.","Cebu","1997-05-11","male","Roman Catholic","09123828492","Walk-in","Filipino","","01-22-2017","Accepted","1");
INSERT INTO donor VALUES("1000012","Luzzcia Loraine","Barrios","Alvarez","Murcia","1996-02-24","female","INC","012830182123","Walk-in","Filipino","","01-23-2017","Accepted","1");
INSERT INTO donor VALUES("1000013","Jeremiah","Barrios","Canuto","Bacolod","1995-12-10","male","Baptist","01923012321","Walk-in","Filipino","","01-23-2017","Accepted","5");
INSERT INTO donor VALUES("1000014","Shaun Elijah","Malvar","Dadibalos","Antique","2016-12-27","male","Roman Catholic","1231231","Walk-in","Filipino","","01-23-2017","Accepted","7");
INSERT INTO donor VALUES("1000015","Ana Marie","Garriel","Quilantang","St. Francis Village, Taculing, Bacolod City, Negros Occidental","1980-04-18","female","Christian","09177012395","Walk-in","Filipino","","01-23-2017","Accepted","1");
INSERT INTO donor VALUES("1000018","Micah","Glory","Novilla","Villa Caridad Subd, La Carlota City, Negros Occidental","2017-01-22","female","Roman Catholic","09123123123","Walk-in","Filipino","","01-23-2017","Accepted","7");
INSERT INTO donor VALUES("1000019","Valerie","Telic","Eslabon","Pahilanga, Hinigaran, Negros Occidental","1986-03-17","female","Roman Catholic","1230900123123","Walk-in","Filipino","eslabon@gmail.com","01-23-2017","Pending","6");
INSERT INTO donor VALUES("1000020","Christine","Agustino","De la Cruz","Mansilingan, Bacolod City, Negros Occidental","1996-11-15","female","Roman Catholic","1231290380123","Walk-in","Filipino","","01-29-2017","Pending","1");
INSERT INTO donor VALUES("1000021","Alvin","Apellido","Talite","Baranggay 40, Bacolod City, Negros Occidental","1995-09-10","male","Roman Catholic","123819023","Walk-in","Filipino","","01-29-2017","Pending","3");
INSERT INTO donor VALUES("1000022","Emarie","Taguinex","Carbajosa","Sum-ag, Bacolod City, Negros Occidental","1996-12-25","female","Roman Catholic","09812377434","Walk-in","Filipino","","01-29-2017","Pending","7");
INSERT INTO donor VALUES("1000023","Hazel Joei","Gonzales","Caquicla","Pahanocoy, Bacold City, Negros Occidental","1996-02-08","female","Roman Catholic","091230123123","Walk-in","Filipino","","01-29-2017","Pending","1");



DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS examination;

CREATE TABLE `examination` (
  `examid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `bldpressure` varchar(11) NOT NULL,
  `pulserate` int(11) NOT NULL,
  `bodytemp` float NOT NULL,
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

INSERT INTO examination VALUES("1000007","0","120/80","75","36","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Deferred","");
INSERT INTO examination VALUES("1000011","0","120/80","75","36.4","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000012","0","120/80","75","36","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000013","0","120/80","75","37","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000014","0","123","123","123","asd","asd","asd","asd","Accepted","");
INSERT INTO examination VALUES("1000015","0","123","123","123","asd","asd","asd","asd","Accepted","");
INSERT INTO examination VALUES("1000018","0","120/80","12","30","Good","unremarkable","unremarkable","unremarkable","Accepted","");
INSERT INTO examination VALUES("1000019","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000020","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000021","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000022","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000023","0","","0","0","","","","","Pending","");



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
  `unitserialno` varchar(18) NOT NULL,
  `component` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `bloodinfo` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `quality` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO inventory VALUES("10","O123123","Packed Red Blood Cell","For Testing","5","250","Good Quality","");
INSERT INTO inventory VALUES("11","O123123","Fresh Frozen Plasma","For Testing","5","200","Poor Quality","");
INSERT INTO inventory VALUES("12","O123123","Platelet Concentrate","For Testing","5","40","Good Quality","");
INSERT INTO inventory VALUES("13","AB123123","Packed Red Blood Cell","For Testing","7","300","Good Quality","");
INSERT INTO inventory VALUES("14","AB123123","Fresh Frozen Plasma","For Testing","7","250","Good Quality","");
INSERT INTO inventory VALUES("15","AB123123","Platelet Concentrate","For Testing","7","50","Good Quality","");
INSERT INTO inventory VALUES("16","AB123123","Cryoprecipitate","For Testing","7","15","Good Quality","");
INSERT INTO inventory VALUES("18","A09123123","Apheresis Platelet","Inventory","1","450","Good Quality","Ok");
INSERT INTO inventory VALUES("19","A12310239123","Packed Red Blood Cell","For Testing","1","250","Good Quality","");
INSERT INTO inventory VALUES("20","A12310239123","Fresh Frozen Plasma","For Testing","1","100","Poor Quality","");
INSERT INTO inventory VALUES("21","A12310239123","Platelet Concentrate","For Testing","1","20","Poor Quality","");



DROP TABLE IF EXISTS markers;

CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS members;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS patient;

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pfname` varchar(50) NOT NULL,
  `pmname` varchar(50) NOT NULL,
  `plname` varchar(50) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pbirthdate` date NOT NULL,
  `pgender` varchar(6) NOT NULL,
  `pcontact` varchar(20) NOT NULL,
  `pregdate` varchar(18) NOT NULL,
  `bloodinfo` int(1) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `bloodinfo` (`bloodinfo`)
) ENGINE=InnoDB AUTO_INCREMENT=4000008 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("4000007","Geen","Garci","Rodriguez","Pahanocoy, Bacolod City, Negros Occidental","1990-05-14","female","09090912345","02-05-2017","3");



DROP TABLE IF EXISTS screening;

CREATE TABLE `screening` (
  `scrid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `weight` int(25) NOT NULL,
  `spgravity` double NOT NULL,
  `hemgb` int(25) NOT NULL,
  `hemtcrt` int(25) NOT NULL,
  `rbc` int(25) NOT NULL,
  `wbc` int(25) NOT NULL,
  `pltcount` int(25) NOT NULL,
  `screendate` varchar(18) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `reason` varchar(20) NOT NULL,
  PRIMARY KEY (`scrid`),
  KEY `did` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO screening VALUES("1000007","0","123","0.0008","123","123","123","123","123","01-22-2017","Accepted","");
INSERT INTO screening VALUES("1000011","0","0","0","0","0","0","0","0","","Accepted","");
INSERT INTO screening VALUES("1000012","0","0","0","0","0","0","0","0","01-22-2017","Accepted","");
INSERT INTO screening VALUES("1000013","0","0","0","0","0","0","0","0","","Accepted","");
INSERT INTO screening VALUES("1000014","0","50","100","100","100","100","100","100","01-27-2017","Accepted","");
INSERT INTO screening VALUES("1000015","0","100","100","100","100","100","100","100","01-23-2017","Accepted","");
INSERT INTO screening VALUES("1000018","0","80","100","123","100","100","100","100","01-27-2017","Accepted","");
INSERT INTO screening VALUES("1000019","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000020","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000021","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000022","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000023","0","0","0","0","0","0","0","0","","Pending","");



DROP TABLE IF EXISTS transfer;

CREATE TABLE `transfer` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `requester` varchar(100) NOT NULL,
  `bloodtype` varchar(20) NOT NULL,
  `rh` varchar(20) NOT NULL,
  `btqty` int(3) NOT NULL,
  `bloodcomponent` varchar(20) NOT NULL,
  `bcqty` int(3) NOT NULL,
  `dateneeded` date NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaddress` varchar(50) NOT NULL,
  `contactdetails` int(12) NOT NULL,
  `reason` text NOT NULL,
  `remarks` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS user;

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



