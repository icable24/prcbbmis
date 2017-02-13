DROP TABLE IF EXISTS activityschedule;

CREATE TABLE `activityschedule` (
  `actid` int(11) NOT NULL AUTO_INCREMENT,
  `actname` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`actid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO activityschedule VALUES("3","Give Blood Save Life!","Blood Letting Activity\r\n3:00pm\r\n5 medtech","University of Negros Occidental Recoletos","2017-02-14");
INSERT INTO activityschedule VALUES("4","Blood Letting","Blood Rescue","Bacolod City","2017-02-10");
INSERT INTO activityschedule VALUES("5","Give Blood Save Life!","blood letting","Bacolod City","2017-02-15");



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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO bloodbag VALUES("C01293123","450cc Single","8","7","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("O123123","450cc Triple","9","5","0","0","0","HIV Positive");
INSERT INTO bloodbag VALUES("AB123123","450cc Quadruple","10","7","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("A09123123","Apheresis Platelet","11","1","1","2","3","Inventory");
INSERT INTO bloodbag VALUES("A12310239123","450cc Triple","12","1","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("AP123123123","450cc Single","18","1","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("OP123123","450cc Triple","19","7","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("A 6100-01093202","450cc Triple","20","1","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("B 6100-020824-2","450cc Triple","21","3","0","0","0","Hepatitis C Positive");
INSERT INTO bloodbag VALUES("B 6100-020825-2","450cc Triple","22","3","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("O 6100-003235-2","450cc Triple","23","7","0","0","0","Inventory");
INSERT INTO bloodbag VALUES("AB NOBBC-402015","450cc Single","24","5","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("O 6100-004012-2","450cc Triple","25","7","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("B 6100-017424-2","450cc Triple","26","3","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("AB 6100-023237-2","450cc Triple","27","5","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("B 6100-017439-2","450cc Triple","28","3","0","0","0","For Testing");
INSERT INTO bloodbag VALUES("AB 6100-0221231-2","450cc Triple","29","5","0","0","0","For Testing");



DROP TABLE IF EXISTS bloodbank;

CREATE TABLE `bloodbank` (
  `bankid` int(11) NOT NULL AUTO_INCREMENT,
  `bankname` varchar(100) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `contactdetails` varchar(15) NOT NULL,
  `bankcateg` varchar(9) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'registered',
  PRIMARY KEY (`bankid`),
  KEY `bankname` (`bankname`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO bloodbank VALUES("7","Alfredo F. Marañon, Sr. Memorial District Hospital","Bato, Sagay City","Philippines","(034) 213 0","Hospital","registered");
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
INSERT INTO bloodbank VALUES("34","Philippine Red Cross Cagayan","Magallanes corner Gomez Street, Tuguegarao City, 3500, Cagayan Valley","Philippines","(078) 846 2","Chapter","registered");
INSERT INTO bloodbank VALUES("35","Philippine Red Cross Cagayan","Magallanes corner Gomez Street, Tuguegarao City, 3500, Cagayan Valley","Philippines","(078) 846","Chapter","registered");
INSERT INTO bloodbank VALUES("36","Philippine Red Cross Vigan","Vigan City, Ilocos Sur","Philippines","","Chapter","registered");
INSERT INTO bloodbank VALUES("37","Philippine Red Cross Abra","Corner Taft & Washington Street, Zone 6, Bangued, Abra","Philippines","(074) 752 5","Chapter","registered");
INSERT INTO bloodbank VALUES("38","Philippine Red Cross La Union","Don Pablo Campos Bldg., Widdoes St., Barangay 2, San Fernando, 2500, La Union","Philippines","(072) 607 3","Chapter","registered");
INSERT INTO bloodbank VALUES("39","Philippine Red Cross Nueva Vizcaya","Capitol Compound, Bayombong, 3700, Nueva Vizcaya","Philippines","(078) 321","Chapter","registered");
INSERT INTO bloodbank VALUES("40","Philippine Red Cross Quirino","Capitol Compound, Cabarroguis, 3400, Quirino, Capitol Crest Road, Cabarroguis, Quirino","Philippines","(078) 692","Chapter","registered");
INSERT INTO bloodbank VALUES("41","Philippine Red Cross Nueva Ecija","Old Capitol Compound, Llanera Street, Cabanatuan City, 3100","Philippines","(044) 463 1","Chapter","registered");
INSERT INTO bloodbank VALUES("42","Philippine Red Cross Bulacan","Capitol Compound, Malolos, 3000 Bulacan","Philippines","(044) 662 5","Chapter","registered");
INSERT INTO bloodbank VALUES("43","Philippine National Red Cross Pampanga","Capitol Compound, Sto. Niño, Regional Government Center, Barangay Maimpis, San Fernando, Pampanga","Philippines","(045) 961 4","Chapter","registered");
INSERT INTO bloodbank VALUES("44","Philippine Red Cross Valenzuela","Dahlia Street, Lungsod ng Valenzuela, Kalakhang Maynila","Philippines","0917 806 85","Chapter","registered");
INSERT INTO bloodbank VALUES("45","Philippine Red Cross Malabon","Gov. Pascual Ave, Potero, Malabon, 1475 Metro Manila","Philippines","(02) 366 6","Chapter","registered");
INSERT INTO bloodbank VALUES("47","Philippine Red Cross Cebu","Osmeña Blvd, Cebu City","Philippines","(032) 253 9","Chapter","registered");
INSERT INTO bloodbank VALUES("49","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","Philippines","(034) 434 9","Chapter","registered");
INSERT INTO bloodbank VALUES("50","BBR Medical Center","Calatrava, Negros Occidental","Philippines","09925389202","Hospital","registered");



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
  `component` varchar(30) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO bloodrequest VALUES("12","Approved","4000004","1","Whole Blood","450cc","1");
INSERT INTO bloodrequest VALUES("13","Approved","4000005","5","Cryoprecipitate","450cc","2");
INSERT INTO bloodrequest VALUES("14","Approved","4000003","1","Platelet Concentrate","450cc","2");
INSERT INTO bloodrequest VALUES("15","Approved","4000007","1","Packed Red Blood Cell","450cc","2");
INSERT INTO bloodrequest VALUES("16","Approved","4000004","1","Packed Red Blood Cell","450cc","2");
INSERT INTO bloodrequest VALUES("17","Pending","4000003","1","Whole Blood","450cc","2");
INSERT INTO bloodrequest VALUES("18","Approved","4000005","5","Whole Blood","450cc","1");
INSERT INTO bloodrequest VALUES("19","Approved","4000008","7","Whole Blood","450cc","9");
INSERT INTO bloodrequest VALUES("20","Approved","4000008","7","Whole Blood","450cc","12");
INSERT INTO bloodrequest VALUES("21","Approved","4000008","7","FFP","450cc","1");
INSERT INTO bloodrequest VALUES("22","Approved","4000008","7","Packed Red Blood Cell","450cc","1");
INSERT INTO bloodrequest VALUES("23","Approved","4000008","7","Whole Blood","450cc","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO bloodtest VALUES("1","A09123123","0.32","0.085","0.034","0.077","0.144","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("2","A09123123","0.32","0.164","0.094","0.13","0.147","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("3","A09123123","0.085","0.085","0.042","0.08","0.147","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("22","C01293123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("23","C01293123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("24","C01293123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("25","O123123","1","3","1","3","1","Negative","Negative","Negative","Positive","Negative");
INSERT INTO bloodtest VALUES("26","O123123","1","1","1","1","1","Negative","Negative","Negative","Positive","Negative");
INSERT INTO bloodtest VALUES("27","O123123","1","1","1","1","1","Negative","Negative","Negative","Positive","Negative");
INSERT INTO bloodtest VALUES("28","A12310239123","0.08","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("29","A12310239123","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("30","A12310239123","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("31","AB123123","0.085","0.1","0.05","0.5","2","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("32","AB123123","1","1","1","1","1","Negative","Negative","Positive","Negative","Negative");
INSERT INTO bloodtest VALUES("33","AB123123","2","1","1","1","1","Negative","Negative","Negative","Positive","Negative");
INSERT INTO bloodtest VALUES("34","AP123123123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("35","AP123123123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("36","AP123123123","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("37","A 6100-01093202","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("38","A 6100-01093202","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("39","A 6100-01093202","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("40","B 6100-020824-2","1","1","1","1","1","Negative","Positive","Positive","Positive","Negative");
INSERT INTO bloodtest VALUES("41","B 6100-020824-2","1","1","1","1","1","Positive","Negative","Positive","Negative","Negative");
INSERT INTO bloodtest VALUES("42","B 6100-020824-2","1","1","1","1","1","Negative","Negative","Positive","Negative","Positive");
INSERT INTO bloodtest VALUES("43","B 6100-020825-2","1","1","1","1","1","Positive","Negative","Positive","Negative","Positive");
INSERT INTO bloodtest VALUES("44","B 6100-020825-2","1","1","1","1","1","Negative","Positive","Negative","Positive","Negative");
INSERT INTO bloodtest VALUES("45","B 6100-020825-2","1","1","1","1","1","Negative","Negative","Negative","Negative","Negative");
INSERT INTO bloodtest VALUES("46","OP123123","1","1","1","1","1","Negative","Negative","Positive","Positive","Positive");
INSERT INTO bloodtest VALUES("47","OP123123","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("48","OP123123","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("49","O 6100-003235-2","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("50","O 6100-003235-2","0","0","0","0","0","","","","","");
INSERT INTO bloodtest VALUES("51","O 6100-003235-2","0","0","0","0","0","","","","","");



DROP TABLE IF EXISTS bloodtransfer;

CREATE TABLE `bloodtransfer` (
  `transid` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(3) NOT NULL,
  PRIMARY KEY (`transid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bycountry;

CREATE TABLE `bycountry` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `requester` varchar(50) NOT NULL,
  `ffpqty` int(2) NOT NULL,
  `pcqty` int(2) NOT NULL,
  `wbqty` int(2) NOT NULL,
  `cqty` int(2) NOT NULL,
  `dateneeded` date NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `contactdetails` varchar(15) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `remarks` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO bycountry VALUES("11","Ana Marie G. Quilantang","1","2","5","7","2017-03-08","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","(034) 434 9","for samples","Accepted");
INSERT INTO bycountry VALUES("12","Ana Marie G. Quilantang","1","2","0","0","2017-03-08","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","(034) 434 9","for samples","pending");
INSERT INTO bycountry VALUES("13","kristine p. osano","0","0","0","0","2017-02-22","Lopez District Farmers Hospital Inc","Sagay City","","ajajkkl","pending");
INSERT INTO bycountry VALUES("14","Luzzcia Loraine Alvarez","1","2","3","4","2017-02-14","Bago City Hospital","10th Lacson Street Bacolod","(034) 213 0088","for Blood Samples","pending");
INSERT INTO bycountry VALUES("16","Luzzcia Loraine Alvarez","1","0","0","0","2017-03-03","Binalbagan Infirmary","10th Lacson Street","(078) 846 2881","for Samples","pending");
INSERT INTO bycountry VALUES("17","Loraine Alvarez","1","2","0","0","2017-02-22","Bacolod Adventist Medical Center","Magallanes corner Gomez Street, Tuguegarao City, 3500, Cagayan Valley","(078) 846 2881","For samples","pending");
INSERT INTO bycountry VALUES("18","Ana Marie G. Quilantang","1","1","0","0","2017-02-21","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","(034) 434 9","for samples","pending");
INSERT INTO bycountry VALUES("19","Luzzcia Loraine Alvarez","3","0","0","0","2017-03-09","Philippine Red Cross Bacolod","Bacolod City","(044) 662 5922","For Samples","pending");



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
) ENGINE=InnoDB AUTO_INCREMENT=3000029 DEFAULT CHARSET=latin1;

INSERT INTO collection VALUES("3000003","1000018","Micah","Glory","Novilla","2017-01-10","C01293123","450cc Single","7");
INSERT INTO collection VALUES("3000004","1000013","Jeremiah","Barrios","Canuto","2017-01-03","O123123","450cc Triple","5");
INSERT INTO collection VALUES("3000005","1000014","Shaun Elijah","Malvar","Dadibalos","2017-01-10","AB123123","450cc Quadruple","7");
INSERT INTO collection VALUES("3000006","1000012","Luzzcia Loraine","Barrios","Alvarez","2017-01-04","A09123123","Apheresis Platelet","1");
INSERT INTO collection VALUES("3000007","1000012","Luzzcia Loraine","Barrios","Alvarez","2017-01-04","A12310239123","450cc Triple","1");
INSERT INTO collection VALUES("3000013","1000015","Ana Marie","Garriel","Quilantang","2017-01-05","AP123123123","450cc Single","1");
INSERT INTO collection VALUES("3000014","1000014","Shaun Elijah","Malvar","Dadibalos","2017-01-12","OP123123","450cc Triple","7");
INSERT INTO collection VALUES("3000015","1000024","Jose Jerry","","Angeles","2017-01-31","A 6100-01093202","450cc Triple","1");
INSERT INTO collection VALUES("3000016","1000025","Rafael","Avillo","Archival","2016-10-02","B 6100-020824-2","450cc Triple","3");
INSERT INTO collection VALUES("3000017","1000026","Bryan","","Lumayno","2016-10-02","B 6100-020825-2","450cc Triple","3");
INSERT INTO collection VALUES("3000018","1000027","Gerson","de Pedro","Aguilar","2016-10-02","O 6100-003235-2","450cc Triple","7");
INSERT INTO collection VALUES("3000019","1000029","Orland","Tangayan","Alag","2016-10-06","AB NOBBC-402015","450cc Single","5");
INSERT INTO collection VALUES("3000020","1000028","Rudy","Chavez","Villanueva","2016-10-06","O 6100-004012-2","450cc Triple","7");
INSERT INTO collection VALUES("3000021","1000030","Don","Loredo","Dano","2016-10-03","B 6100-017424-2","450cc Triple","3");
INSERT INTO collection VALUES("3000022","1000031","Romeo","Daulong","Malata","2016-10-10","AB 6100-023237-2","450cc Triple","5");
INSERT INTO collection VALUES("3000023","1000032","Albert Erl","Ganza","Polvora","2016-10-11","B 6100-017439-2","450cc Triple","3");
INSERT INTO collection VALUES("3000024","1000033","Jayson","Malvan","Solinap","2017-02-07","AB 6100-0221231-2","450cc Triple","5");
INSERT INTO collection VALUES("3000025","4000011","Jimvirt","Belviatura","Virtucio","2017-02-09","098765","450cc Triple","3");
INSERT INTO collection VALUES("3000026","1000011","Jimmy","Belviatura","Virtucio Jr.","2017-02-09","A 6900-09999-2","Apheresis Platelet","1");
INSERT INTO collection VALUES("3000027","4000012","Jouise","Wis","Benedicto","2017-02-11","11022-15214547458","450cc Triple","7");
INSERT INTO collection VALUES("3000028","1000018","Micah","Glory","Novilla","2017-02-11","o 1545-145425121","450cc Single","7");



DROP TABLE IF EXISTS componentsprep;

CREATE TABLE `componentsprep` (
  `prepid` int(11) NOT NULL AUTO_INCREMENT,
  `collid` int(11) NOT NULL,
  `bagserialno` varchar(18) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`prepid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO componentsprep VALUES("3","3000003","C01293123","Done");
INSERT INTO componentsprep VALUES("4","3000004","O123123","Done");
INSERT INTO componentsprep VALUES("5","3000005","AB123123","Done");
INSERT INTO componentsprep VALUES("6","3000006","A09123123","Done");
INSERT INTO componentsprep VALUES("7","3000007","A12310239123","Done");
INSERT INTO componentsprep VALUES("10","3000014","OP123123","Done");
INSERT INTO componentsprep VALUES("11","3000015","A 6100-01093202","Done");
INSERT INTO componentsprep VALUES("12","3000016","B 6100-020824-2","Done");
INSERT INTO componentsprep VALUES("13","3000017","B 6100-020825-2","Done");
INSERT INTO componentsprep VALUES("14","3000018","O 6100-003235-2","Done");
INSERT INTO componentsprep VALUES("15","3000020","O 6100-004012-2","Done");
INSERT INTO componentsprep VALUES("16","3000021","B 6100-017424-2","Pending");
INSERT INTO componentsprep VALUES("17","3000022","AB 6100-023237-2","Pending");
INSERT INTO componentsprep VALUES("18","3000023","B 6100-017439-2","Pending");
INSERT INTO componentsprep VALUES("19","3000024","AB 6100-0221231-2","Pending");
INSERT INTO componentsprep VALUES("20","3000025","098765","Pending");
INSERT INTO componentsprep VALUES("21","3000026","A 6900-09999-2","Pending");
INSERT INTO componentsprep VALUES("22","3000027","11022-15214547458","Pending");



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
  `reqid` int(11) NOT NULL,
  `dispensingdate` date NOT NULL,
  PRIMARY KEY (`disid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO dispensing VALUES("2","Mara Amoto","Kabankalan City, Negros Occidental","09995236987","12","2017-02-12");
INSERT INTO dispensing VALUES("3","Maria Marie","Sum-ag, Bacolod City, 6100 Negros Occidental","0912300123102","14","2017-02-12");



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
) ENGINE=InnoDB AUTO_INCREMENT=4000014 DEFAULT CHARSET=latin1;

INSERT INTO donor VALUES("1000011","Jimmy","Belviatura","Virtucio Jr.","Cebu","1997-05-11","male","Roman Catholic","09123828492","Walk-in","Filipino","","01-22-2017","Accepted","1");
INSERT INTO donor VALUES("1000012","Luzzcia Loraine","Barrios","Alvarez","Murcia","1996-02-24","female","INC","012830182123","Walk-in","Filipino","","01-23-2017","Accepted","1");
INSERT INTO donor VALUES("1000013","Jeremiah","Barrios","Canuto","Bacolod","1995-12-10","male","Baptist","01923012321","Walk-in","Filipino","","01-23-2017","Accepted","5");
INSERT INTO donor VALUES("1000014","Shaun Elijah","Malvar","Dadibalos","Antique","2016-12-27","male","Roman Catholic","1231231","Walk-in","Filipino","","01-23-2017","Accepted","7");
INSERT INTO donor VALUES("1000015","Ana Marie","Garriel","Quilantang","St. Francis Village, Taculing, Bacolod City, Negros Occidental","1980-04-18","female","Christian","09177012395","Walk-in","Filipino","","01-23-2017","Accepted","1");
INSERT INTO donor VALUES("1000018","Micah","Glory","Novilla","Villa Caridad Subd, La Carlota City, Negros Occidental","2017-01-09","female","Roman Catholic","09123123123","Patient Directed","Filipino","","01-23-2017","Accepted","7");
INSERT INTO donor VALUES("1000019","Valerie","Telic","Eslabon","Pahilanga, Hinigaran, Negros Occidental","1986-03-17","female","Roman Catholic","1230900123123","Walk-in","Filipino","eslabon@gmail.com","01-23-2017","Pending","6");
INSERT INTO donor VALUES("1000020","Christine","Agustino","De la Cruz","Mansilingan, Bacolod City, Negros Occidental","1996-11-15","female","Roman Catholic","1231290380123","Walk-in","Filipino","","01-29-2017","Pending","1");
INSERT INTO donor VALUES("1000021","Alvin","Apellido","Talite","Baranggay 40, Bacolod City, Negros Occidental","1995-09-10","male","Roman Catholic","123819023","Walk-in","Filipino","","01-29-2017","Pending","7");
INSERT INTO donor VALUES("1000022","Emarie","Taguinex","Carbajosa","Sum-ag, Bacolod City, Negros Occidental","1996-12-25","female","Roman Catholic","09812377434","Walk-in","Filipino","","01-29-2017","Pending","7");
INSERT INTO donor VALUES("1000023","Hazel Joei","Gonzales","Caquicla","Pahanocoy, Bacold City, Negros Occidental","1996-02-08","female","Roman Catholic","091230123123","Walk-in","Filipino","","01-29-2017","Pending","7");
INSERT INTO donor VALUES("1000024","Jose Jerry","","Angeles","Taculing, Bacolod City, 6100 Negros Occidental","1968-02-15","male","Catholic","4330374","Walk-in","Filipino","","01-31-2017","Accepted","1");
INSERT INTO donor VALUES("1000025","Rafael","Avillo","Archival","Alijis, Bacolod City, 6100 Negros Occidental","1970-10-14","male","Roman Catholic","09328466878","Walk-in","Filipino","","01-31-2017","Accepted","3");
INSERT INTO donor VALUES("1000026","Bryan","","Lumayno","Fortune Town, Bacolod City, 6100 Negros Occidental","1988-04-17","male","Catholic","0","Walk-in","Filipino","","01-31-2017","Accepted","3");
INSERT INTO donor VALUES("1000027","Gerson","De Pedro","Aguilar","Manville Subd,Pahanocoy, Bacolod City, 6100, Negros Occidental","1974-06-26","male","Roman Catholic","09199114398","Walk-in","Filipino","","01-31-2017","Accepted","7");
INSERT INTO donor VALUES("1000028","Rudy","Chavez","Villanueva","Proper, Brgy. Luna, Cadiz, 6121 Negros Occidental","1952-11-11","male","Roman Catholic","09498394347","Replacement","Filipino","","01-31-2017","Accepted","7");
INSERT INTO donor VALUES("1000029","Orland","Tangayan","Alag","Phase 6 Blk 37 Lot 7, Handumanan, Bacolod City, 6100 Negros Occidental","1995-08-24","male","Catholic","09093806632","Walk-in","Filipino","orlandalag@ymail.com","01-31-2017","Accepted","5");
INSERT INTO donor VALUES("1000030","Don","Loredo","Dano","Apitong St, Brgy. Blumentritt, Murcia, Negros Occidental","1982-06-15","male","Roman Catholic","09197795747","Replacement","Filipino","","01-31-2017","Accepted","3");
INSERT INTO donor VALUES("1000031","Romeo","Daulong","Malata","Jocson Subd, Taculing, Bacolod City, 6100 Negros Occidental","1991-07-19","male","Catholic","09432821662","Walk-in","Filipino","","01-31-2017","Accepted","5");
INSERT INTO donor VALUES("1000032","Albert Erl","Ganza","Polvora","963, Marapara St, Brgy Villamonte, Bacolod City, 6100 Negros Occidental","1986-01-24","male","Catholic","09107862374","Replacement","Filipino","","01-31-2017","Accepted","3");
INSERT INTO donor VALUES("1000033","Jayson","Malvan","Solinap","Purok Fatima, Sum-ag, Bacolod City, 6100 Negros Occidental","1994-12-16","male","Roman Catholic","09274215725","Walk-in","Filipino","","02-06-2017","Accepted","5");
INSERT INTO donor VALUES("4000007","Steve","Gonzales","Tuiza","Barangay 36, Bacolod City, 6100 Negros Occidental","1996-08-22","male","Roman Catholic","09776407015","Walk-in","Filipino","","02-07-2017","Pending","1");
INSERT INTO donor VALUES("4000008","Maxene","Ira","Samson","Bacolod City","1994-02-10","female","Catholic","09123546781","Walk-in","Filipino","maxene@gmail.com","02-09-2017","Deferred","1");
INSERT INTO donor VALUES("4000009","Able","Alipo-on","Allyn","Himamaylan","1996-11-24","male","Catholic","09999833269","Walk-in","Filipino","icable130@gmail.com","02-09-2017","Pending","1");
INSERT INTO donor VALUES("4000010","Able","Alipo-on","Allyn","Himamaylan","1996-11-24","male","Catholic","09999821222","Walk-in","Filipino","icable130@gmail.com","02-09-2017","Pending","1");
INSERT INTO donor VALUES("4000011","Jimvirt","Belviatura","Virtucio","Cebu City","1997-05-11","male","Catholic","09123585051","Walk-in","Filipino","jimvirtucio123@gmail.com","02-09-2017","Accepted","3");
INSERT INTO donor VALUES("4000012","Jouise","Wis","Benedicto","cvcvbc","1996-07-20","female","Catholic","09994785123","Patient Directed","Filipino","","02-11-2017","Accepted","7");
INSERT INTO donor VALUES("4000013","Mexene","Samson","Rio","Silay City","1994-02-28","female","Catholic","09872134563","Walk-in","Filipino","samson@yahoo","02-11-2017","Deferred","1");



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

INSERT INTO examination VALUES("1000011","0","120/80","75","36.4","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000012","0","120/80","75","36","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000013","0","120/80","75","37","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("1000014","0","123","123","123","asd","asd","asd","asd","Accepted","");
INSERT INTO examination VALUES("1000015","0","123","123","123","asd","asd","asd","asd","Accepted","");
INSERT INTO examination VALUES("1000018","0","120/80","13","30","Good","unremarkable","unremarkable","unremarkable","Accepted","");
INSERT INTO examination VALUES("1000019","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000020","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000021","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000022","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000023","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("1000024","0","130/80","79","36.1","Normal","No Leisure","Normal","Normal","Accepted","");
INSERT INTO examination VALUES("1000025","0","120/80","75","0","Normal","No Leisure","Normal","Normal","Accepted","");
INSERT INTO examination VALUES("1000026","0","130/90","95","36.2","Normal","No Leisure","Normal","Normal","Accepted","");
INSERT INTO examination VALUES("1000027","0","120/80","87","36","Normal","No Leisure","Normal","Normal","Accepted","");
INSERT INTO examination VALUES("1000028","0","140/90","68","33.2","Ambulatory","No Palor, No Jundice","Anichleric Sclerae","NCRR, CBS","Accepted","");
INSERT INTO examination VALUES("1000029","0","120/80","90","36","Ok","Ok","Ok","Ok","Accepted","");
INSERT INTO examination VALUES("1000030","0","110/90","75","36.4","Ambulatory","No Palor, No Jundice","Anicleric Sclerae","NCRR","Accepted","");
INSERT INTO examination VALUES("1000031","0","110/80","68","0","Ambulatory","No Palor, No Jundice","Anicleric Sclerae","NCRR, CBS","Accepted","");
INSERT INTO examination VALUES("1000032","0","130/80","65","36.4","Ambulatory","No Palor, No Jundice","Anicleric Sclerae","NCRR, CBS","Accepted","");
INSERT INTO examination VALUES("1000033","0","120/80","75","36.5","Ambulatory","No Palor, No Jundice","Anichleric Sclerae","NBCC, CBS","Accepted","");
INSERT INTO examination VALUES("4000007","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("4000008","0","120/80","10","37","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Accepted","");
INSERT INTO examination VALUES("4000009","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("4000010","0","","0","0","","","","","Pending","");
INSERT INTO examination VALUES("4000011","0","120/80","70","37","Remarkable","Remarkable","Remarkable","Remarkable","Accepted","");
INSERT INTO examination VALUES("4000012","0","120/80","100","50","dfgb","dfnbk","sdfdf","bfg","Accepted","");
INSERT INTO examination VALUES("4000013","0","120/80","65","27","Unremarkable","Unremarkable","Unremarkable","Unremarkable","Deferred","");



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
  `dispid` int(11) NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

INSERT INTO inventory VALUES("10","O123123","Packed Red Blood Cell","For Testing","5","250","Good Quality","","0");
INSERT INTO inventory VALUES("11","O123123","Fresh Frozen Plasma","For Testing","5","200","Poor Quality","","0");
INSERT INTO inventory VALUES("12","O123123","Platelet Concentrate","For Testing","5","40","Good Quality","","0");
INSERT INTO inventory VALUES("13","AB123123","Packed Red Blood Cell","Inventory","7","300","Good Quality","Ok","0");
INSERT INTO inventory VALUES("14","AB123123","Fresh Frozen Plasma","Inventory","7","250","Good Quality","Ok","0");
INSERT INTO inventory VALUES("15","AB123123","Platelet Concentrate","Inventory","7","50","Good Quality","Ok","0");
INSERT INTO inventory VALUES("16","AB123123","Cryoprecipitate","Inventory","7","15","Good Quality","Ok","0");
INSERT INTO inventory VALUES("18","A09123123","Apheresis Platelet","Inventory","1","450","Good Quality","Ok","0");
INSERT INTO inventory VALUES("19","A12310239123","Packed Red Blood Cell","Inventory","1","250","Good Quality","Ok","0");
INSERT INTO inventory VALUES("20","A12310239123","Fresh Frozen Plasma","Inventory","1","100","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("21","A12310239123","Platelet Concentrate","Inventory","1","20","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("24","AP123123123","Whole Blood","Inventory","1","450","Good Quality","Ok","0");
INSERT INTO inventory VALUES("25","OP123123","Packed Red Blood Cell","Inventory","7","250","Good Quality","Ok","0");
INSERT INTO inventory VALUES("26","OP123123","Fresh Frozen Plasma","Inventory","7","250","Good Quality","Ok","0");
INSERT INTO inventory VALUES("27","OP123123","Platelet Concentrate","Inventory","7","30","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("28","AB NOBBC-402015","Whole Blood","For Testing","5","450","Good Quality","","0");
INSERT INTO inventory VALUES("29","A 6100-01093202","Packed Red Blood Cell","Inventory","1","250","Good Quality","Ok","0");
INSERT INTO inventory VALUES("30","A 6100-01093202","Fresh Frozen Plasma","Inventory","1","200","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("31","A 6100-01093202","Platelet Concentrate","Inventory","1","20","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("32","B 6100-020824-2","Packed Red Blood Cell","For Testing","3","250","Good Quality","","0");
INSERT INTO inventory VALUES("33","B 6100-020824-2","Fresh Frozen Plasma","For Testing","3","100","Poor Quality","","0");
INSERT INTO inventory VALUES("34","B 6100-020824-2","Platelet Concentrate","For Testing","3","40","Good Quality","","0");
INSERT INTO inventory VALUES("35","B 6100-020825-2","Packed Red Blood Cell","Inventory","3","300","Good Quality","Ok","0");
INSERT INTO inventory VALUES("36","B 6100-020825-2","Fresh Frozen Plasma","Inventory","3","500","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("37","B 6100-020825-2","Platelet Concentrate","Inventory","3","600","Good Quality","Ok","0");
INSERT INTO inventory VALUES("38","O 6100-003235-2","Packed Red Blood Cell","Inventory","7","0","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("39","O 6100-003235-2","Fresh Frozen Plasma","Inventory","7","1","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("40","O 6100-003235-2","Platelet Concentrate","Inventory","7","0","Poor Quality","Ok","0");
INSERT INTO inventory VALUES("41","O 6100-004012-2","Packed Red Blood Cell","For Testing","7","1","Poor Quality","","0");
INSERT INTO inventory VALUES("42","O 6100-004012-2","Fresh Frozen Plasma","For Testing","7","0","Poor Quality","","0");
INSERT INTO inventory VALUES("43","O 6100-004012-2","Platelet Concentrate","For Testing","7","0","Poor Quality","","0");
INSERT INTO inventory VALUES("44","o 1545-145425121","Whole Blood","For Testing","7","450","Good Quality","","0");



DROP TABLE IF EXISTS markers;

CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=465 DEFAULT CHARSET=latin1;

INSERT INTO markers VALUES("447","Don Salvador Benedicto Memorial Hospital","La Carlota City","10.422815","122.913704","hospital");
INSERT INTO markers VALUES("448","Dr. Gumersindo Garcia, Sr. Memorial Hospital","Guanzon St. Kabankalan","9.989791","122.813293","hospital");
INSERT INTO markers VALUES("449","Dr. Pablo O. Torre, Sr. Memorial Hospital","Benigno Aquino Drive, Bacolod","10.682791","122.958130","hospital");
INSERT INTO markers VALUES("450","E.R. ELumba Clinic","Rizal St. La Castellana","10.321948","123.019394","hospital");
INSERT INTO markers VALUES("451","Eleuterio T. Decena Memorial Hospital","Bacuyangan, Hinoba-an","9.629561","122.466255","hospital");
INSERT INTO markers VALUES("452","Gov. Valeriano M. Gatuslao Memorial Hospital","Barangay IV, Himamaylan","10.114413","122.871368","hospital");
INSERT INTO markers VALUES("453","Ignacio Lacson Arroyo Sr. Memorial District Hospital","Burgos St. Isabela","10.205783","122.983902","hospital");
INSERT INTO markers VALUES("454","Immaculate Concepcion Health Center","Bandung Village, Victorias","10.898256","123.074165","hospital");
INSERT INTO markers VALUES("455","Kabankalan City Hospital","Tabugon, Kabankalan","9.787708","122.803474","hospital");
INSERT INTO markers VALUES("456","Kabankalan District Hospital","Santo Mojon, Binicuil, Kabankalan","10.009465","122.819756","hospital");
INSERT INTO markers VALUES("457","Lopez District Farmers Hospital Inc","Sagay City","10.896768","123.414185","hospital");
INSERT INTO markers VALUES("458","The Doctors Hospital, Inc","Benigno Aquino Drive, Bacolod","10.678132","122.960358","hospital");
INSERT INTO markers VALUES("459","San Carlos City Hospital","Ylagan St. San Carlos City","10.480735","123.419182","hospital");
INSERT INTO markers VALUES("460","San Carlos Doctors Hospital","National Highway, San Carlos City","10.491080","123.421227","hospital");
INSERT INTO markers VALUES("461","Southern Negros Doctors Hospital","Don Emilio Village, Kabankalan","10.205783","122.983902","hospital");
INSERT INTO markers VALUES("462","South Bacolod General Hospital & General Center, Inc.","Pahanocoy, Bacolod","10.790804","122.977707","hospital");
INSERT INTO markers VALUES("463","Valladolid District Hospital","Valladolid","10.790804","122.977707","hospital");
INSERT INTO markers VALUES("464","Vicente Gustilo District Hospital","Lopez Drive, Escalante City","10.790804","122.977707","hospital");
INSERT INTO markers VALUES("445","Cauayan Municipal Hospital","Isio, Cauayan","9.971837","122.587364","hospital");
INSERT INTO markers VALUES("446","Corazon Locsin Montelibano Memorial Regional Hospital","Lacson St. Bacolod","10.685624","122.957298","hospital");
INSERT INTO markers VALUES("444","Calatrava District Hospital","Calatrava","10.595604","123.482864","hospital");
INSERT INTO markers VALUES("443","Cadiz District Hospital","Hortencia, Cadiz City","10.947597","123.289810","hospital");
INSERT INTO markers VALUES("441","Bago City Hospital","Rafael Salas, Bago City","10.535333","122.847504","hospital");
INSERT INTO markers VALUES("442","Binalbagan Infirmary","Rizal, Binalbagan","10.204477","122.975815","hospital");
INSERT INTO markers VALUES("440","Bacolod Our Lady of Mercy Specialty Hospital","Eroreco, Mandalagan, Bacolod","10.689861","122.971451","hospital");
INSERT INTO markers VALUES("439","Bacolod Adventist Medical Center","C.V. Ramos Avenue, Taculing","10.647661","122.949471","hospital");
INSERT INTO markers VALUES("436","Thailand","","16.010902","100.992737","country");
INSERT INTO markers VALUES("437","Vietnam","","14.866920","108.309692","country");
INSERT INTO markers VALUES("438","Alfredo F. Maranon, Sr. Memorial District Hospital","Bato, Sagay City","10.807708","123.372704","hospital");
INSERT INTO markers VALUES("434","Philippines","","12.126214","122.451508","country");
INSERT INTO markers VALUES("435","Singapore","","1.315070","103.706932","country");
INSERT INTO markers VALUES("432","Malaysia","","5.138909","102.119987","country");
INSERT INTO markers VALUES("433","Myanmar","","20.878080","96.636864","country");
INSERT INTO markers VALUES("430","Indonesia","","-4.824171","121.768387","country");
INSERT INTO markers VALUES("431","Laos","","19.164404","102.392471","country");
INSERT INTO markers VALUES("428","Brunei","","4.525403","114.159142","country");
INSERT INTO markers VALUES("429","Cambodia","","12.296328","104.736145","country");
INSERT INTO markers VALUES("427","Philippine Red Cross Cotabato","Don Teodoro V Juliano Ave, Cotabato City, Maguindanao","7.221364","124.243759","Chapter");
INSERT INTO markers VALUES("426","Philippine Red Cross Davao","Roxas Ave, Poblacion District, Davao City, 8000 Davao del Sur","7.072708","125.611153","Chapter");
INSERT INTO markers VALUES("425","Philippine Red Cross Bukidnon","Capitol Site, Malaybalay, 8700, Bukidnon, Inicial Street, Malaybalay City, 8700","8.155439","125.129768","Chapter");
INSERT INTO markers VALUES("424","Philippine Red Cross Isabela","City Hall Compound, San Andres, Santiago City, 3311, Isabela","8.214435","124.241913","Chapter");
INSERT INTO markers VALUES("423","Philippine Red Cross Oroquieta","Oroquieta City, Misamis Occidental","8.485909","123.798927","Chapter");
INSERT INTO markers VALUES("422","Philippine Red Cross Negros Oriental","Surban St. Dumaguete City 6200 Negros Oriental Dumaguete Negros Oriental, Dumag","9.320709","123.309029","Chapter");
INSERT INTO markers VALUES("421","Philippine Red Cross Bohol","Provincial Capitol Compound, Marapao St. corner J. A. Clarin St., Tagbilaran Ci","10.132913","124.845871","Chapter");
INSERT INTO markers VALUES("420","Philippine Red Cross Southern Leyte","Tomas Oppus Street, Abgao, Maasin City","10.132977","124.845955","Chapter");
INSERT INTO markers VALUES("419","Philippine Red Cross Lapu-Lapu/Cordova","R dela Serna Street, Poblacion, Lapu-Lapu City, 6015 Cebu","10.310582","123.948776","Chapter");
INSERT INTO markers VALUES("418","Philippine Red Cross Western Samar","Mabine Avenue, Catbalogan City, Western Samar, Catbalogan City Proper, Catbalog","11.774571","124.882233","Chapter");
INSERT INTO markers VALUES("417","Philippine Red Cross Eastern Samar","Capitol Site, Alang-alang, Borongan, 6800, Eastern Samar","11.603146","125.438095","Chapter");
INSERT INTO markers VALUES("416","Philippine Red Cross Capiz","Roxas City, Capiz","11.576002","122.756737","Chapter");
INSERT INTO markers VALUES("415","Philippine Red Cross Aklan","Fortunato F. Quimpo St., Kalibo, 5600, Aklan, 5600","11.706573","122.366348","Chapter");
INSERT INTO markers VALUES("414","Philippine Red Cross Northern Samar","Capitol Site, Catarman, 6400, Northern Samar","12.503521","124.633957","Chapter");
INSERT INTO markers VALUES("413","Philippine Red Cross Masbate","Social Center Site, Masbate City, 5400, Ibingay Street, Masbate City, Masbate","12.371277","123.624657","Chapter");
INSERT INTO markers VALUES("412","Philippine Red Cross Sorsogon","PRC Capitol Compound, Sorsogon City, 4700, Sorsogon","12.971770","124.001518","Chapter");
INSERT INTO markers VALUES("411","Philippine Red Cross Tangub","Philippine Red Cross, City Hall Drive, Tangub City, Misamis Occidental","8.061177","123.751396","Chapter");
INSERT INTO markers VALUES("410","Philippine Red Cross Romblon","114 7th Avenue East, Grace Park, Caloocan City","12.530439","122.285416","Chapter");
INSERT INTO markers VALUES("409","Philippine Red Cross Camarines Norte","Bagasbas Rd, Daet, Camarines Norte","13.621737","123.196541","Chapter");
INSERT INTO markers VALUES("408","Philippine Red Cross Camarines Sur","Panganiban Dr, Naga, 4400 Camarines Sur","13.447075","121.841034","Chapter");
INSERT INTO markers VALUES("407","Philippine Red Cross Marinduque","Kasilag St, Isok I, Boac, 4900, Marinduque","13.447075","121.841034","Chapter");
INSERT INTO markers VALUES("405","Philippine Red Cross Laguna","Pedro Guevara Ave, Santa Cruz, Laguna","14.274669","121.417877","Chapter");
INSERT INTO markers VALUES("406","Philippine Red Cross San Pablo","#1, Rizal Avenue, San Pablo City, 4000 Laguna","14.069712","121.325737","Chapter");
INSERT INTO markers VALUES("404","Philippine Red Cross Pasay","Aurora Blvd, Pasay, Metro Manila","14.530942","121.004105","Chapter");
INSERT INTO markers VALUES("403","Philippine Red Cross Rizal","PRC Bldg, 611 Shaw Boulevard, Kapitolyo, Pasig City, 1603 Metro Manila","14.574675","121.060745","Chapter");
INSERT INTO markers VALUES("402","Philippine Red Cross Manila","Victoria St, Manila City, Manila, Metro Manila","14.587934","120.976250","Chapter");
INSERT INTO markers VALUES("401","Philippine Red Cross Quezon","Quezon City Hall Compound, Kalayaan Avenue, Diliman, Quezon City, Diliman, Quez","14.646149","121.052032","Chapter");
INSERT INTO markers VALUES("399","Philippine Red Cross Malabon","Gov. Pascual Ave, Potero, Malabon, 1475 Metro Manila","14.669536","120.975662","Chapter");
INSERT INTO markers VALUES("400","Philippine Red Cross Caloocan","114 7th Avenue East, Grace Park, Caloocan City","14.647308","120.991898","Chapter");
INSERT INTO markers VALUES("398","Philippine Red Cross Valenzuela","Dahlia Street, Lungsod ng Valenzuela, Kalakhang Maynila","14.678009","120.978523","Chapter");
INSERT INTO markers VALUES("397","Philippine Red Cross Pampanga","Capitol Compound, Sto. Nino, Regional Government Center, Barangay Maimpis, San","15.023959","120.687569","Chapter");
INSERT INTO markers VALUES("396","Philippine Red Cross Bulacan","Capitol Compound, Malolos, 3000 Bulacan","14.856940","120.814064","Chapter");
INSERT INTO markers VALUES("395","Philippine Red Cross Nueva Ecija","Old Capitol Compound, Llanera Street, Cabanatuan City, 3100","15.490043","120.969070","Chapter");
INSERT INTO markers VALUES("394","Philippine Red Cross Quirino","Capitol Compound, Cabarroguis, 3400, Quirino, Capitol Crest Road, Cabarroguis,","16.524609","121.519386","Chapter");
INSERT INTO markers VALUES("393","Philippine Red Cross Nueva Vizcaya","Capitol Compound, Bayombong, 3700, Nueva Vizcaya","16.487871","121.159775","Chapter");
INSERT INTO markers VALUES("392","Philippine Red Cross La Union","Don Pablo Campos Bldg., Widdoes St., Barangay 2, San Fernando, 2500, La Union","16.614651","120.317177","Chapter");
INSERT INTO markers VALUES("390","Philippine Red Cross Vigan","Vigan City, Ilocos Sur","17.575159","120.386292","Chapter");
INSERT INTO markers VALUES("391","Philippine Red Cross Abra","Corner Taft & Washington Street, Zone 6, Bangued, Abra","17.599834","120.618538","Chapter");
INSERT INTO markers VALUES("389","Philippine Red Cross Cagayan","PRC 10th St, Bacolod, 6001 Negros Occidental","10.676172","122.957069","Chapter");
INSERT INTO markers VALUES("388","Philippine Red Cross Cebu","Osmena Blvd, Cebu City, Cebu","10.312433","123.891701","Chapter");
INSERT INTO markers VALUES("387","Philippine Red Cross Bacolod","PRC 10th St, Bacolod, 6001 Negros Occidental","10.676172","122.957069","Chapter");
INSERT INTO markers VALUES("361","Dr. Pablo O. Torre, Sr. Memorial Hospital","Benigno Aquino Drive, Bacolod","10.682791","122.958130","hospital");
INSERT INTO markers VALUES("360","Dr. Gumersindo Garcia, Sr. Memorial Hospital","Guanzon St. Kabankalan","9.989791","122.813293","hospital");
INSERT INTO markers VALUES("359","Don Salvador Benedicto Memorial Hospital","La Carlota City","10.422815","122.913704","hospital");
INSERT INTO markers VALUES("358","Corazon Locsin Montelibano Memorial Regional Hospital","Lacson St. Bacolod","10.685624","122.957298","hospital");
INSERT INTO markers VALUES("357","Cauayan Municipal Hospital","Isio, Cauayan","9.971837","122.587364","hospital");
INSERT INTO markers VALUES("356","Calatrava District Hospital","Calatrava","10.595604","123.482864","hospital");
INSERT INTO markers VALUES("355","Cadiz District Hospital","Hortencia, Cadiz City","10.947597","123.289810","hospital");
INSERT INTO markers VALUES("354","Binalbagan Infirmary","Rizal, Binalbagan","10.204477","122.975815","hospital");
INSERT INTO markers VALUES("353","Bago City Hospital","Rafael Salas, Bago City","10.535333","122.847504","hospital");
INSERT INTO markers VALUES("352","Bacolod Our Lady of Mercy Specialty Hospital","Eroreco, Mandalagan, Bacolod","10.689861","122.971451","hospital");
INSERT INTO markers VALUES("351","Bacolod Adventist Medical Center","C.V. Ramos Avenue, Taculing","10.647661","122.949471","hospital");
INSERT INTO markers VALUES("350","Alfredo F. Maranon, Sr. Memorial District Hospital","Bato, Sagay City","10.807708","123.372704","hospital");



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
) ENGINE=InnoDB AUTO_INCREMENT=4000011 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("4000003","Shaun","Malvar","Dadibalos","Vallega","2017-01-11","male","","01-25-2017","1");
INSERT INTO patient VALUES("4000007","Janella Mae","Siracha","Doe","Banago, Bacolod City, 6100 Negros Occidental","1996-11-07","male","09881","02-09-2017","1");
INSERT INTO patient VALUES("4000008","Jouise","Reyes","Benedicto","Toboso, Negros Occidental","1996-07-20","female","09488314808","02-11-2017","7");
INSERT INTO patient VALUES("4000010","neri","mars","maia","bacolod","2017-02-26","female","09879888888","02-11-2017","7");



DROP TABLE IF EXISTS screening;

CREATE TABLE `screening` (
  `scrid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `weight` float NOT NULL,
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

INSERT INTO screening VALUES("1000011","0","0","0","0","0","0","0","0","","Accepted","");
INSERT INTO screening VALUES("1000012","0","0","0","0","0","0","0","0","01-22-2017","Accepted","");
INSERT INTO screening VALUES("1000013","0","0","0","0","0","0","0","0","","Accepted","");
INSERT INTO screening VALUES("1000014","0","50","100","100","100","100","100","100","01-27-2017","Accepted","");
INSERT INTO screening VALUES("1000015","0","100","100","100","100","100","100","100","01-23-2017","Accepted","");
INSERT INTO screening VALUES("1000018","0","100","200","200","300","300","400","400","02-11-2017","Accepted","");
INSERT INTO screening VALUES("1000019","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000020","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000021","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000022","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000023","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("1000024","0","69","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000025","0","71","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000026","0","79","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000027","0","79","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000028","0","74","0","0","48","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000029","0","63","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000030","0","65.5","0","0","45","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000031","0","61","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000032","0","84","71.055","0","0","0","0","0","01-31-2017","Accepted","");
INSERT INTO screening VALUES("1000033","0","67","71.055","0","0","0","0","0","02-07-2017","Accepted","");
INSERT INTO screening VALUES("4000007","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("4000008","0","45","70","70","70","70","70","70","02-09-2017","Deferred","");
INSERT INTO screening VALUES("4000009","0","0","0","0","0","0","0","0","","Pending","");
INSERT INTO screening VALUES("4000010","0","56","71.055","100","200","300","400","500","02-09-2017","Accepted","");
INSERT INTO screening VALUES("4000011","0","65","70","70","70","70","70","70","02-09-2017","Accepted","");
INSERT INTO screening VALUES("4000012","0","100","100","100","100","100","100","100","02-11-2017","Accepted","");
INSERT INTO screening VALUES("4000013","0","45","70","70","70","70","70","70","02-11-2017","Deferred","");



DROP TABLE IF EXISTS tmpbloodcomponent;

CREATE TABLE `tmpbloodcomponent` (
  `bcid` int(5) NOT NULL AUTO_INCREMENT,
  `bloodcomponent` varchar(30) NOT NULL,
  `bcqty` int(3) NOT NULL,
  `rtid` int(5) NOT NULL,
  PRIMARY KEY (`bcid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tmpbloodcomponent VALUES("3","Packed Red Blood Cell","2","0");
INSERT INTO tmpbloodcomponent VALUES("4","Packed Red Blood Cell","1","0");



DROP TABLE IF EXISTS tmpbloodtype;

CREATE TABLE `tmpbloodtype` (
  `btid` int(5) NOT NULL AUTO_INCREMENT,
  `bloodtype` varchar(4) NOT NULL,
  `rhtype` varchar(10) NOT NULL,
  `btqty` int(3) NOT NULL,
  `rtid` int(5) NOT NULL,
  PRIMARY KEY (`btid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO tmpbloodtype VALUES("20","AB","Positive","2","0");
INSERT INTO tmpbloodtype VALUES("21","B","Positive","1","0");
INSERT INTO tmpbloodtype VALUES("22","A","Positive","1","0");
INSERT INTO tmpbloodtype VALUES("24","A","Positive","4","0");
INSERT INTO tmpbloodtype VALUES("26","A","Positive","1","0");
INSERT INTO tmpbloodtype VALUES("30","AB","Positive","1","0");
INSERT INTO tmpbloodtype VALUES("31","B","Negative","1","0");
INSERT INTO tmpbloodtype VALUES("32","B","Positive","2","0");



DROP TABLE IF EXISTS transfer;

CREATE TABLE `transfer` (
  `rtid` int(5) NOT NULL AUTO_INCREMENT,
  `requester` varchar(100) NOT NULL,
  `positiveA` int(2) NOT NULL DEFAULT '0',
  `negativeA` int(2) NOT NULL DEFAULT '0',
  `positiveB` int(2) NOT NULL DEFAULT '0',
  `negativeB` int(2) NOT NULL DEFAULT '0',
  `positiveO` int(2) NOT NULL DEFAULT '0',
  `negativeO` int(2) NOT NULL DEFAULT '0',
  `positiveAB` int(2) NOT NULL DEFAULT '0',
  `negativeAB` int(2) NOT NULL DEFAULT '0',
  `ffpqty` int(2) NOT NULL DEFAULT '0',
  `pcqty` int(2) NOT NULL DEFAULT '0',
  `wbqty` int(2) NOT NULL DEFAULT '0',
  `cqty` int(2) NOT NULL DEFAULT '0',
  `dateneeded` date NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `contactdetails` varchar(15) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `remarks` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`rtid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO transfer VALUES("17","Ana Marie G. Quilantang","1","0","0","2","4","0","0","0","0","0","0","0","2017-03-09","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","(034) 434 9","for patient","Accepted");
INSERT INTO transfer VALUES("18","Ana Marie G. Quilantang","4","3","5","4","4","0","1","0","4","5","2","0","2017-03-28","Philippine Red Cross Bacolod","10th Lacson Street Bacolod","(034) 434 9","For Samples","Pending");
INSERT INTO transfer VALUES("19","Jouise D. Benedicto","0","0","0","3","1","2","2","0","0","0","0","0","2017-02-18","Dr. Pablo O. Torre, Sr. Memorial Hospital","Benigno Aquino Drive, Bacolod","","nyenyenyenye","Pending");
INSERT INTO transfer VALUES("20","Luzzcia Loraine Alvarez","1","0","2","0","3","0","0","0","0","0","0","0","2017-02-28","Bacolod Adventist Medical Center","Capitol Shopping Center, 10th Street near Lacson St., Capitol Subdivision, Bacolod City, 6100, Negro","(044) 463 1280","For Patients\\\' Need","Pending");
INSERT INTO transfer VALUES("21","Luzzcia Loraine Alvarez","1","0","2","0","3","0","0","0","0","0","0","0","2017-02-28","Bacolod Adventist Medical Center","Capitol Shopping Center, 10th Street near Lacson St., Capitol Subdivision, Bacolod City, 6100, Negro","(044) 463 1280","For Patients\\\' Need","Pending");



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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("4","Allyn","Alipo-on","Able","Allyn","Able","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("9","Ana Marie","Garriel","Quilantang","admin","admin","Philippine Red Cross Bacolod","Admin");
INSERT INTO user VALUES("13","Raine","Alvarez","Barrios","luzzcia","prc","Philippine Red Cross Bacolod","PRC User");
INSERT INTO user VALUES("14","Jimmy","Virtucio","Virtucio","Jimmy","jimmy","Philippine Red Cross Cebu","Admin");
INSERT INTO user VALUES("15","kristine","padernal","osano","ampon","ampon","Lopez District Farmers Hospital Inc","Admin");
INSERT INTO user VALUES("16","Jouise","Dunlao","Benedicto","wis","0000","Dr. Pablo O. Torre, Sr. Memorial Hospital","Admin");
INSERT INTO user VALUES("17","Mexene","Sumagaysay","Samson","Mexene","12345","Philippine Red Cross Abra","Admin");
INSERT INTO user VALUES("33","Raine","Sumagaysay","Barrios","admin98765","pass","Alfredo F. Marañon, Sr. Memorial District Hospita","Admin");



