-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 08:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prcbbmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `activityschedule`
--

CREATE TABLE `activityschedule` (
  `actid` int(11) NOT NULL,
  `actname` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activityschedule`
--

INSERT INTO `activityschedule` (`actid`, `actname`, `detail`, `place`, `date`) VALUES
(1, 'Blood letting', 'blood letting', 'bacolod city', '2016-12-15'),
(2, 'qdsdafas', 'efwrewfew', 'eewfew', '2016-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbag`
--

CREATE TABLE `bloodbag` (
  `unitserialno` varchar(18) NOT NULL,
  `bagtype` varchar(20) NOT NULL,
  `bagid` int(11) NOT NULL,
  `bloodinfo` int(11) NOT NULL,
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL,
  `test3` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbag`
--

INSERT INTO `bloodbag` (`unitserialno`, `bagtype`, `bagid`, `bloodinfo`, `test1`, `test2`, `test3`, `status`) VALUES
('C01293123', '450cc Single', 8, 7, 0, 0, 0, 'Inventory'),
('O123123', '450cc Triple', 9, 5, 0, 0, 0, 'HIV Positive'),
('AB123123', '450cc Quadruple', 10, 7, 0, 0, 0, 'Inventory'),
('A09123123', 'Apheresis Platelet', 11, 1, 1, 2, 3, 'Inventory'),
('A12310239123', '450cc Triple', 12, 1, 0, 0, 0, 'Inventory'),
('AP123123123', '450cc Single', 18, 1, 0, 0, 0, 'For Testing'),
('OP123123', '450cc Triple', 19, 7, 0, 0, 0, ''),
('A 6100-01093202', '450cc Triple', 20, 1, 0, 0, 0, ''),
('B 6100-020824-2', '450cc Triple', 21, 3, 0, 0, 0, ''),
('B 6100-020825-2', '450cc Triple', 22, 3, 0, 0, 0, ''),
('O 6100-003235-2', '450cc Triple', 23, 7, 0, 0, 0, ''),
('AB NOBBC-402015', '450cc Single', 24, 5, 0, 0, 0, 'For Testing'),
('O 6100-004012-2', '450cc Triple', 25, 7, 0, 0, 0, ''),
('B 6100-017424-2', '450cc Triple', 26, 3, 0, 0, 0, ''),
('AB 6100-023237-2', '450cc Triple', 27, 5, 0, 0, 0, ''),
('B 6100-017439-2', '450cc Triple', 28, 3, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `bankid` int(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaddress` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `contactdetails` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`bankid`, `bankname`, `bankaddress`, `country`, `contactdetails`) VALUES
(1, 'PRC Bacolod', '10th Lacson Street Bacolod City', 'Philippines', '123123123'),
(8, 'ALAMINOS CITY-WESTERN PANGASINAN ', 'WPDH Compound, Sabaro, Poblacion Alaminos City, 2404 Pangasinan', 'Philippines', ' 075-5516356'),
(9, 'APAYAO SUB-CHAPTER', 'Stall # 6 BGV Jr Municipal Gym Poblacion, Luna, Apayao', 'Philippines', '0998-5485949'),
(10, 'AURORA SUB-CHAPTER', 'Palayan Street Brgy Buhangin, Baler Aurora 3200', 'Philippines', '0926-6595124'),
(11, '4000003', 'Jimmy ', 'Virtucio', 'B'),
(12, '4000004', 'Allyn', 'Able', 'A'),
(13, '4000005', 'James', ' Rodriguez', 'P'),
(14, '4000006', 'Angelika ', 'Dela Cruz', 'B'),
(15, '4000003', 'Jimmy ', 'Virtucio', 'B'),
(16, '4000004', 'Allyn', 'Able', 'A'),
(17, '4000005', 'James', ' Rodriguez', 'P'),
(18, '4000006', 'Angelika ', 'Dela Cruz', 'B'),
(19, '4000003', 'Jimmy ', 'Virtucio', 'B'),
(20, '4000004', 'Allyn', 'Able', 'A'),
(21, '4000005', 'James', ' Rodriguez', 'P'),
(22, '4000006', 'Angelika ', 'Dela Cruz', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `bloodinformation`
--

CREATE TABLE `bloodinformation` (
  `bloodid` int(11) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `rhtype` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodinformation`
--

INSERT INTO `bloodinformation` (`bloodid`, `bloodgroup`, `rhtype`) VALUES
(1, 'A', 'Positive'),
(2, 'A', 'Negative'),
(3, 'B', 'Positive'),
(4, 'B', 'Negative'),
(5, 'AB', 'Positive'),
(6, 'AB', 'Negative'),
(7, 'O', 'Positive'),
(8, 'O', 'Negative');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `reqid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `bloodid` int(11) NOT NULL,
  `component` varchar(15) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`reqid`, `status`, `pid`, `bloodid`, `component`, `amount`, `quantity`) VALUES
(1, 'Pending', 4000003, 0, 'Whole Blood', '450cc', 2),
(2, 'Pending', 4000005, 0, 'FFP', '450cc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodtest`
--

CREATE TABLE `bloodtest` (
  `testid` int(11) NOT NULL,
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
  `remarks5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodtest`
--

INSERT INTO `bloodtest` (`testid`, `bagserialno`, `hepab`, `syphillis`, `hepac`, `hiv`, `malaria`, `remarks1`, `remarks2`, `remarks3`, `remarks4`, `remarks5`) VALUES
(1, 'A09123123', 0.32, 0.085, 0.034, 0.077, 0.144, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(2, 'A09123123', 0.32, 0.164, 0.094, 0.13, 0.147, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(3, 'A09123123', 0.085, 0.085, 0.042, 0.08, 0.147, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(22, 'C01293123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(23, 'C01293123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(24, 'C01293123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(25, 'O123123', 1, 3, 1, 3, 1, 'Negative', 'Negative', 'Negative', 'Positive', 'Negative'),
(26, 'O123123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Positive', 'Negative'),
(27, 'O123123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Positive', 'Negative'),
(28, 'A12310239123', 0.08, 0, 0, 0, 0, '', '', '', '', ''),
(29, 'A12310239123', 0, 0, 0, 0, 0, '', '', '', '', ''),
(30, 'A12310239123', 0, 0, 0, 0, 0, '', '', '', '', ''),
(31, 'AB123123', 0.085, 0.1, 0.05, 0.5, 2, 'Negative', 'Negative', 'Negative', 'Negative', 'Negative'),
(32, 'AB123123', 1, 1, 1, 1, 1, 'Negative', 'Negative', 'Positive', 'Negative', 'Negative'),
(33, 'AB123123', 2, 1, 1, 1, 1, 'Negative', 'Negative', 'Negative', 'Positive', 'Negative');

-- --------------------------------------------------------

--
-- Table structure for table `bloodtransfer`
--

CREATE TABLE `bloodtransfer` (
  `transid` int(11) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collid` int(11) NOT NULL,
  `donorcollectid` varchar(18) NOT NULL,
  `cfname` varchar(50) NOT NULL,
  `cmname` varchar(50) NOT NULL,
  `clname` varchar(50) NOT NULL,
  `collectiondate` date NOT NULL,
  `unitserialno` varchar(18) NOT NULL,
  `bagtype` varchar(18) NOT NULL,
  `bloodinfo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collid`, `donorcollectid`, `cfname`, `cmname`, `clname`, `collectiondate`, `unitserialno`, `bagtype`, `bloodinfo`) VALUES
(3000003, '1000018 ', 'Micah', 'Glory', 'Novilla', '2017-01-10', 'C01293123', '450cc Single', 7),
(3000004, '1000013 ', 'Jeremiah', 'Barrios', 'Canuto', '2017-01-03', 'O123123', '450cc Triple', 5),
(3000005, '1000014 ', 'Shaun Elijah', 'Malvar', 'Dadibalos', '2017-01-10', 'AB123123', '450cc Quadruple', 7),
(3000006, '1000012 ', 'Luzzcia Loraine', 'Barrios', 'Alvarez', '2017-01-04', 'A09123123', 'Apheresis Platelet', 1),
(3000007, '1000012 ', 'Luzzcia Loraine', 'Barrios', 'Alvarez', '2017-01-04', 'A12310239123', '450cc Triple', 1),
(3000013, '1000015 ', 'Ana Marie', 'Garriel', 'Quilantang', '2017-01-05', 'AP123123123', '450cc Single', 1),
(3000014, '1000014 ', 'Shaun Elijah', 'Malvar', 'Dadibalos', '2017-01-12', 'OP123123', '450cc Triple', 7),
(3000015, '1000024 ', 'Jose Jerry', '', 'Angeles', '2017-01-31', 'A 6100-01093202', '450cc Triple', 1),
(3000016, '1000025 ', 'Rafael', 'Avillo', 'Archival', '2016-10-02', 'B 6100-020824-2', '450cc Triple', 3),
(3000017, '1000026 ', 'Bryan', '', 'Lumayno', '2016-10-02', 'B 6100-020825-2', '450cc Triple', 3),
(3000018, '1000027 ', 'Gerson', 'de Pedro', 'Aguilar', '2016-10-02', 'O 6100-003235-2', '450cc Triple', 7),
(3000019, '1000029 ', 'Orland', 'Tangayan', 'Alag', '2016-10-06', 'AB NOBBC-402015', '450cc Single', 5),
(3000020, '1000028 ', 'Rudy', 'Chavez', 'Villanueva', '2016-10-06', 'O 6100-004012-2', '450cc Triple', 7),
(3000021, '1000030 ', 'Don', 'Loredo', 'Dano', '2016-10-03', 'B 6100-017424-2', '450cc Triple', 3),
(3000022, '1000031 ', 'Romeo', 'Daulong', 'Malata', '2016-10-10', 'AB 6100-023237-2', '450cc Triple', 5),
(3000023, '1000032 ', 'Albert Erl', 'Ganza', 'Polvora', '2016-10-11', 'B 6100-017439-2', '450cc Triple', 3);

-- --------------------------------------------------------

--
-- Table structure for table `componentsprep`
--

CREATE TABLE `componentsprep` (
  `prepid` int(11) NOT NULL,
  `collid` int(11) NOT NULL,
  `bagserialno` varchar(18) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `componentsprep`
--

INSERT INTO `componentsprep` (`prepid`, `collid`, `bagserialno`, `remarks`) VALUES
(3, 3000003, 'C01293123', 'Done'),
(4, 3000004, 'O123123', 'Done'),
(5, 3000005, 'AB123123', 'Done'),
(6, 3000006, 'A09123123', 'Done'),
(7, 3000007, 'A12310239123', 'Done'),
(10, 3000014, 'OP123123', 'Done'),
(11, 3000015, 'A 6100-01093202', 'Pending'),
(12, 3000016, 'B 6100-020824-2', 'Pending'),
(13, 3000017, 'B 6100-020825-2', 'Pending'),
(14, 3000018, 'O 6100-003235-2', 'Pending'),
(15, 3000020, 'O 6100-004012-2', 'Pending'),
(16, 3000021, 'B 6100-017424-2', 'Pending'),
(17, 3000022, 'AB 6100-023237-2', 'Pending'),
(18, 3000023, 'B 6100-017439-2', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `dispensing`
--

CREATE TABLE `dispensing` (
  `disid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `raddress` varchar(100) NOT NULL,
  `rcontact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `did` int(11) NOT NULL,
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
  `bloodinfo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`did`, `dfname`, `dmname`, `dlname`, `daddress`, `dbirthdate`, `dgender`, `dreligion`, `dcontact`, `dtype`, `dnationality`, `demail`, `dregdate`, `dremarks`, `bloodinfo`) VALUES
(1000007, 'Allyn', 'Alipo-on', 'Able', 'Vallega St. Baranggay 1 Poblacion, Himamaylan Cit, Negros Occidental', '1996-11-24', 'male', 'Roman Catholic', '09999833269', 'Walk-in', 'Filipino', 'icable130@gmail.com', '01-20-2017', 'Deferred', 1),
(1000011, 'Jimmy', 'Belviatura', 'Virtucio Jr. ', 'Cebu', '1997-05-11', 'male', 'Roman Catholic', '09123828492', 'Walk-in', 'Filipino', '', '01-22-2017', 'Accepted', 1),
(1000012, 'Luzzcia Loraine', 'Barrios', 'Alvarez', 'Murcia', '1996-02-24', 'female', 'INC', '012830182123', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 1),
(1000013, 'Jeremiah', 'Barrios', 'Canuto', 'Bacolod', '1995-12-10', 'male', 'Baptist', '01923012321', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 5),
(1000014, 'Shaun Elijah', 'Malvar', 'Dadibalos', 'Antique', '2016-12-27', 'male', 'Roman Catholic', '1231231', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 7),
(1000015, 'Ana Marie', 'Garriel', 'Quilantang', 'St. Francis Village, Taculing, Bacolod City, Negros Occidental', '1980-04-18', 'female', 'Christian', '09177012395', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 1),
(1000018, 'Micah', 'Glory', 'Novilla', 'Villa Caridad Subd, La Carlota City, Negros Occidental', '2017-01-22', 'female', 'Roman Catholic', '09123123123', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 7),
(1000019, 'Valerie', 'Telic', 'Eslabon', 'Pahilanga, Hinigaran, Negros Occidental', '1986-03-17', 'female', 'Roman Catholic', '1230900123123', 'Walk-in', 'Filipino', 'eslabon@gmail.com', '01-23-2017', 'Pending', 6),
(1000020, 'Christine', 'Agustino', 'De la Cruz', 'Mansilingan, Bacolod City, Negros Occidental', '1996-11-15', 'female', 'Roman Catholic', '1231290380123', 'Walk-in', 'Filipino', '', '01-29-2017', 'Pending', 1),
(1000021, 'Alvin', 'Apellido', 'Talite', 'Baranggay 40, Bacolod City, Negros Occidental', '1995-09-10', 'male', 'Roman Catholic', '123819023', 'Walk-in', 'Filipino', '', '01-29-2017', 'Pending', 3),
(1000022, 'Emarie', 'Taguinex', 'Carbajosa', 'Sum-ag, Bacolod City, Negros Occidental', '1996-12-25', 'female', 'Roman Catholic', '09812377434', 'Walk-in', 'Filipino', '', '01-29-2017', 'Pending', 7),
(1000023, 'Hazel Joei', 'Gonzales', 'Caquicla', 'Pahanocoy, Bacold City, Negros Occidental', '1996-02-08', 'female', 'Roman Catholic', '091230123123', 'Walk-in', 'Filipino', '', '01-29-2017', 'Pending', 7),
(1000024, 'Jose Jerry', '', 'Angeles', 'Taculing, Bacolod City, 6100 Negros Occidental', '1968-02-15', 'male', 'Catholic', '4330374', 'Walk-in', 'Filipino', '', '01-31-2017', 'Accepted', 1),
(1000025, 'Rafael', 'Avillo', 'Archival', 'Alijis, Bacolod City, 6100 Negros Occidental', '1970-10-14', 'male', 'Roman Catholic', '09328466878', 'Walk-in', 'Filipino', '', '01-31-2017', 'Accepted', 3),
(1000026, 'Bryan', '', 'Lumayno', 'Fortune Town, Bacolod City, 6100 Negros Occidental', '1988-04-17', 'male', 'Catholic', '0', 'Walk-in', 'Filipino', '', '01-31-2017', 'Accepted', 3),
(1000027, 'Gerson', 'De Pedro', 'Aguilar', 'Manville Subd,Pahanocoy, Bacolod City, 6100, Negros Occidental', '1974-06-26', 'male', 'Roman Catholic', '09199114398', 'Walk-in', 'Filipino', '', '01-31-2017', 'Accepted', 7),
(1000028, 'Rudy', 'Chavez', 'Villanueva', 'Proper, Brgy. Luna, Cadiz, 6121 Negros Occidental', '1952-11-11', 'male', 'Roman Catholic', '09498394347', 'Replacement', 'Filipino', '', '01-31-2017', 'Accepted', 7),
(1000029, 'Orland', 'Tangayan', 'Alag', 'Phase 6 Blk 37 Lot 7, Handumanan, Bacolod City, 6100 Negros Occidental', '1995-08-24', 'male', 'Catholic', '09093806632', 'Walk-in', 'Filipino', 'orlandalag@ymail.com', '01-31-2017', 'Accepted', 5),
(1000030, 'Don', 'Loredo', 'Dano', 'Apitong St, Brgy. Blumentritt, Murcia, Negros Occidental', '1982-06-15', 'male', 'Roman Catholic', '09197795747', 'Replacement', 'Filipino', '', '01-31-2017', 'Accepted', 3),
(1000031, 'Romeo', 'Daulong', 'Malata', 'Jocson Subd, Taculing, Bacolod City, 6100 Negros Occidental', '1991-07-19', 'male', 'Catholic', '09432821662', 'Walk-in', 'Filipino', '', '01-31-2017', 'Accepted', 5),
(1000032, 'Albert Erl', 'Ganza', 'Polvora', '963, Marapara St, Brgy Villamonte, Bacolod City, 6100 Negros Occidental', '1986-01-24', 'male', 'Catholic', '09107862374', 'Replacement', 'Filipino', '', '01-31-2017', 'Accepted', 3);

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

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
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`examid`, `did`, `bldpressure`, `pulserate`, `bodytemp`, `genapp`, `skin`, `heent`, `hnl`, `remarks`, `reason`) VALUES
(1000007, 0, '120/80', 75, 36, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Deferred', ''),
(1000011, 0, '120/80', 75, 36.4, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000012, 0, '120/80', 75, 36, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000013, 0, '120/80', 75, 37, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000014, 0, '123', 123, 123, 'asd', 'asd', 'asd', 'asd', 'Accepted', ''),
(1000015, 0, '123', 123, 123, 'asd', 'asd', 'asd', 'asd', 'Accepted', ''),
(1000018, 0, '120/80', 12, 30, 'Good', 'unremarkable', 'unremarkable', 'unremarkable', 'Accepted', ''),
(1000019, 0, '', 0, 0, '', '', '', '', 'Pending', ''),
(1000020, 0, '', 0, 0, '', '', '', '', 'Pending', ''),
(1000021, 0, '', 0, 0, '', '', '', '', 'Pending', ''),
(1000022, 0, '', 0, 0, '', '', '', '', 'Pending', ''),
(1000023, 0, '', 0, 0, '', '', '', '', 'Pending', ''),
(1000024, 0, '130/80', 79, 36.1, 'Normal', 'No Leisure', 'Normal', 'Normal', 'Accepted', ''),
(1000025, 0, '120/80', 75, 0, 'Normal', 'No Leisure', 'Normal', 'Normal', 'Accepted', ''),
(1000026, 0, '130/90', 95, 36.2, 'Normal', 'No Leisure', 'Normal', 'Normal', 'Accepted', ''),
(1000027, 0, '120/80', 87, 36, 'Normal', 'No Leisure', 'Normal', 'Normal', 'Accepted', ''),
(1000028, 0, '140/90', 68, 33.2, 'Ambulatory', 'No Palor, No Jundice', 'Anichleric Sclerae', 'NCRR, CBS', 'Accepted', ''),
(1000029, 0, '120/80', 90, 36, 'Ok', 'Ok', 'Ok', 'Ok', 'Accepted', ''),
(1000030, 0, '110/90', 75, 36.4, 'Ambulatory', 'No Palor, No Jundice', 'Anicleric Sclerae', 'NCRR', 'Accepted', ''),
(1000031, 0, '110/80', 68, 0, 'Ambulatory', 'No Palor, No Jundice', 'Anicleric Sclerae', 'NCRR, CBS', 'Accepted', ''),
(1000032, 0, '130/80', 65, 36.4, 'Ambulatory', 'No Palor, No Jundice', 'Anicleric Sclerae', 'NCRR, CBS', 'Accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hisid` int(11) NOT NULL,
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
  `A36` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invid` int(11) NOT NULL,
  `unitserialno` varchar(18) NOT NULL,
  `component` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `bloodinfo` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `quality` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invid`, `unitserialno`, `component`, `status`, `bloodinfo`, `amount`, `quality`, `remarks`) VALUES
(10, 'O123123', 'Packed Red Blood Cell', 'For Testing', 5, 250, 'Good Quality', ''),
(11, 'O123123', 'Fresh Frozen Plasma', 'For Testing', 5, 200, 'Poor Quality', ''),
(12, 'O123123', 'Platelet Concentrate', 'For Testing', 5, 40, 'Good Quality', ''),
(13, 'AB123123', 'Packed Red Blood Cell', 'Inventory', 7, 300, 'Good Quality', 'Ok'),
(14, 'AB123123', 'Fresh Frozen Plasma', 'Inventory', 7, 250, 'Good Quality', 'Ok'),
(15, 'AB123123', 'Platelet Concentrate', 'Inventory', 7, 50, 'Good Quality', 'Ok'),
(16, 'AB123123', 'Cryoprecipitate', 'Inventory', 7, 15, 'Good Quality', 'Ok'),
(18, 'A09123123', 'Apheresis Platelet', 'Inventory', 1, 450, 'Good Quality', 'Ok'),
(19, 'A12310239123', 'Packed Red Blood Cell', 'Inventory', 1, 250, 'Good Quality', 'Ok'),
(20, 'A12310239123', 'Fresh Frozen Plasma', 'Inventory', 1, 100, 'Poor Quality', 'Ok'),
(21, 'A12310239123', 'Platelet Concentrate', 'Inventory', 1, 20, 'Poor Quality', 'Ok'),
(24, 'AP123123123', 'Whole Blood', 'For Testing', 1, 450, 'Good Quality', ''),
(25, 'OP123123', 'Packed Red Blood Cell', 'For Testing', 7, 250, 'Good Quality', ''),
(26, 'OP123123', 'Fresh Frozen Plasma', 'For Testing', 7, 250, 'Good Quality', ''),
(27, 'OP123123', 'Platelet Concentrate', 'For Testing', 7, 30, 'Poor Quality', ''),
(28, 'AB NOBBC-402015', 'Whole Blood', 'For Testing', 5, 450, 'Good Quality', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pfname` varchar(50) NOT NULL,
  `pmname` varchar(50) NOT NULL,
  `plname` varchar(50) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pbirthdate` date NOT NULL,
  `pgender` varchar(6) NOT NULL,
  `pcontact` varchar(20) NOT NULL,
  `pregdate` varchar(18) NOT NULL,
  `bloodinfo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pfname`, `pmname`, `plname`, `paddress`, `pbirthdate`, `pgender`, `pcontact`, `pregdate`, `bloodinfo`) VALUES
(4000003, 'Shaun', 'Dadi', 'Balos', 'Vallega', '2017-01-11', 'male', '', '01-25-2017', 1),
(4000004, 'Allyn', 'A', 'Able', 'Himamaylan', '0000-00-00', 'male', '9091234123', '12/16/2006', 1),
(4000005, 'James', 'P', ' Rodriguez', 'Murcia', '0000-00-00', 'male', '9091234652', '12/17/2016', 5);

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

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
  `reason` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`scrid`, `did`, `weight`, `spgravity`, `hemgb`, `hemtcrt`, `rbc`, `wbc`, `pltcount`, `screendate`, `remarks`, `reason`) VALUES
(1000007, 0, 123, 0.0008, 123, 123, 123, 123, 123, '01-22-2017', 'Accepted', ''),
(1000011, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Accepted', ''),
(1000012, 0, 0, 0, 0, 0, 0, 0, 0, '01-22-2017', 'Accepted', ''),
(1000013, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Accepted', ''),
(1000014, 0, 50, 100, 100, 100, 100, 100, 100, '01-27-2017', 'Accepted', ''),
(1000015, 0, 100, 100, 100, 100, 100, 100, 100, '01-23-2017', 'Accepted', ''),
(1000018, 0, 80, 100, 123, 100, 100, 100, 100, '01-27-2017', 'Accepted', ''),
(1000019, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000020, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000021, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000022, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000023, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000024, 0, 69, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000025, 0, 71, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000026, 0, 79, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000027, 0, 79, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000028, 0, 74, 0, 0, 48, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000029, 0, 63, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000030, 0, 65.5, 0, 0, 45, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000031, 0, 61, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', ''),
(1000032, 0, 84, 71.055, 0, 0, 0, 0, 0, '01-31-2017', 'Accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `usertype` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `fname`, `mname`, `lname`, `usertype`) VALUES
(4, 'Allyn', 'Able', 'Allyn', 'Alipo-on', 'Able', 'Admin'),
(8, 'prcuser', 'prcuser', 'Garriel', 'Garriel', 'Quilantang', 'PRC User'),
(9, 'admin', 'admin', 'Ana Marie', 'Garriel', 'Quilantang', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activityschedule`
--
ALTER TABLE `activityschedule`
  ADD PRIMARY KEY (`actid`);

--
-- Indexes for table `bloodbag`
--
ALTER TABLE `bloodbag`
  ADD PRIMARY KEY (`bagid`),
  ADD UNIQUE KEY `bagserialnum` (`unitserialno`);

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `bloodinformation`
--
ALTER TABLE `bloodinformation`
  ADD PRIMARY KEY (`bloodid`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`reqid`);

--
-- Indexes for table `bloodtest`
--
ALTER TABLE `bloodtest`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `bloodtransfer`
--
ALTER TABLE `bloodtransfer`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collid`),
  ADD KEY `donorcollectid` (`donorcollectid`,`cfname`,`cmname`,`clname`),
  ADD KEY `collid` (`collid`),
  ADD KEY `donor_collection_fk` (`cfname`,`cmname`,`clname`,`donorcollectid`);

--
-- Indexes for table `componentsprep`
--
ALTER TABLE `componentsprep`
  ADD PRIMARY KEY (`prepid`);

--
-- Indexes for table `dispensing`
--
ALTER TABLE `dispensing`
  ADD PRIMARY KEY (`disid`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`did`),
  ADD KEY `dfname` (`dfname`,`dmname`,`dlname`),
  ADD KEY `did` (`did`),
  ADD KEY `remarks` (`dremarks`),
  ADD KEY `bloodinfo` (`bloodinfo`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`examid`),
  ADD KEY `remarks` (`remarks`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hisid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `bloodinfo` (`bloodinfo`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`scrid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activityschedule`
--
ALTER TABLE `activityschedule`
  MODIFY `actid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bloodbag`
--
ALTER TABLE `bloodbag`
  MODIFY `bagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `bloodinformation`
--
ALTER TABLE `bloodinformation`
  MODIFY `bloodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bloodtest`
--
ALTER TABLE `bloodtest`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `bloodtransfer`
--
ALTER TABLE `bloodtransfer`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000024;
--
-- AUTO_INCREMENT for table `componentsprep`
--
ALTER TABLE `componentsprep`
  MODIFY `prepid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dispensing`
--
ALTER TABLE `dispensing`
  MODIFY `disid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000033;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hisid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000006;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
