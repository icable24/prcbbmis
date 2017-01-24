-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2017 at 10:09 AM
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
  `bagserialnum` int(11) NOT NULL,
  `expirydate` date NOT NULL,
  `bagtype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'PRC Bacolod', '10th Lacson Street Bacolod City', 'Philippines', '123123123');

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
  `reqstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bloodtest`
--

CREATE TABLE `bloodtest` (
  `testid` int(11) NOT NULL,
  `testtype` varchar(20) NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `bloodtype` varchar(2) NOT NULL,
  `rhtype` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collid`, `donorcollectid`, `cfname`, `cmname`, `clname`, `collectiondate`, `unitserialno`, `bagtype`, `bloodtype`, `rhtype`) VALUES
(3000001, '1000011 ', 'Jimmy', 'Belviatura', 'Virtucio Jr. ', '2017-01-10', 'C213012', '250 cc', 'A', 'Positive');

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
(1000007, 'Allyn', 'Alipo-on', 'Able', 'Vallega St. Baranggay 1 Poblacion, Himamaylan Cit, Negros Occidental', '1996-11-24', 'male', 'Roman Catholic', '09999833269', 'Walk-in', 'Filipino', 'icable130@gmail.com', '01-20-2017', 'Accepted', 1),
(1000011, 'Jimmy', 'Belviatura', 'Virtucio Jr. ', 'Cebu', '1997-05-11', 'male', 'Roman Catholic', '09123828492', 'Walk-in', 'Filipino', '', '01-22-2017', 'Accepted', 1),
(1000012, 'Luzzcia Loraine', 'Barrios', 'Alvarez', 'Murcia', '1996-02-24', 'female', 'INC', '012830182123', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 1),
(1000013, 'Jeremiah', 'Barrios', 'Canuto', 'Bacolod', '1995-12-10', 'male', 'Baptist', '01923012321', 'Walk-in', 'Filipino', '', '01-23-2017', 'Accepted', 5),
(1000014, 'Shaun Elijah', 'Malvar', 'Dadibalos', 'Antique', '2016-12-27', 'male', 'Roman Catholic', '1231231', 'Walk-in', 'Filipino', '', '01-23-2017', 'Pending', 7),
(1000015, 'Ana Marie', 'Garriel', 'Quilantang', 'St. Francis Village, Taculing, Bacolod City, Negros Occidental', '1980-04-18', 'female', 'Christian', '09177012395', 'Walk-in', 'Filipino', '', '01-23-2017', 'Pending', 1);

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
(1000007, 0, '120/80', 75, 36, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000011, 0, '120/80', 75, 36.4, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000012, 0, '120/80', 75, 36, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000013, 0, '120/80', 75, 37, 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Unremarkable', 'Accepted', ''),
(1000014, 0, '123', 123, 123, 'asd', 'asd', 'asd', 'asd', 'Accepted', ''),
(1000015, 0, '123', 123, 123, 'asd', 'asd', 'asd', 'asd', 'Accepted', '');

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
  `unitserialno` int(11) NOT NULL,
  `component` varchar(10) NOT NULL,
  `bloodtype` varchar(2) NOT NULL,
  `rhtype` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4000002, 'Allyn', 'Alipo-on', 'Able', 'Vallega', '2017-01-13', 'male', '123', '01-23-2017', 7);

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

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
  `reason` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`scrid`, `did`, `weight`, `spgravity`, `hemgb`, `hemtcrt`, `rbc`, `wbc`, `pltcount`, `screendate`, `remarks`, `reason`) VALUES
(1000007, 0, 123, 123, 123, 123, 123, 123, 123, '01-22-2017', 'Accepted', ''),
(1000011, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Accepted', ''),
(1000012, 0, 0, 0, 0, 0, 0, 0, 0, '01-22-2017', 'Accepted', ''),
(1000013, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Accepted', ''),
(1000014, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', ''),
(1000015, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Pending', '');

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
(8, 'prcuser', 'prcuser', 'Ana Marie', 'Garriel', 'Quilantang', 'PRC User');

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
  ADD PRIMARY KEY (`bagserialnum`);

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
  MODIFY `bagserialnum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bloodinformation`
--
ALTER TABLE `bloodinformation`
  MODIFY `bloodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bloodtest`
--
ALTER TABLE `bloodtest`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bloodtransfer`
--
ALTER TABLE `bloodtransfer`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000002;
--
-- AUTO_INCREMENT for table `dispensing`
--
ALTER TABLE `dispensing`
  MODIFY `disid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000018;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hisid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000003;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
