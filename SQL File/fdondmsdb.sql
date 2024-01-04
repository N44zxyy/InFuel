-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdondmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Admin', 'admin', 1425365212, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-12-15 12:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `ID` int(5) NOT NULL,
  `Stateid` int(5) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`ID`, `Stateid`, `City`, `CreationDate`) VALUES
(1, 1, 'Allahabad', '2022-06-22 08:54:18'),
(2, 1, 'Aligarh', '2022-06-22 08:54:29'),
(3, 1, 'Varanasi', '2022-06-22 08:54:39'),
(4, 2, 'Nagpur', '2022-06-22 08:54:54'),
(5, 2, 'Pune', '2022-06-22 08:55:03'),
(6, 3, 'Bhopal', '2022-06-22 08:55:37'),
(7, 3, 'Indore', '2022-06-22 08:55:48'),
(8, 3, 'Gwalior', '2022-06-22 08:56:05'),
(9, 3, 'Jabalpur', '2022-06-22 08:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Sarita Pandey', 'sar@gmail.com', 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1),
(3, 'Test', 'test@gmail.com', 'Want to know price of forest cake', '2021-07-16 12:51:06', 1),
(4, 'Anuj', 'ak330@gmail.com', 'This is for testing.', '2021-07-18 14:35:50', 1),
(6, 'Test3424', 'test@gmail.com', 'kjugjhgkhefiuryi', '2021-12-27 06:17:31', 1),
(7, 'mahesh', 'mah@gmail.com', 'hey', '2022-06-28 06:24:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfuelprice`
--

CREATE TABLE `tblfuelprice` (
  `ID` int(11) NOT NULL,
  `Typeoffuel` varchar(250) DEFAULT NULL,
  `TodayFuelprice` decimal(10,0) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfuelprice`
--

INSERT INTO `tblfuelprice` (`ID`, `Typeoffuel`, `TodayFuelprice`, `CreationDate`) VALUES
(1, 'Petrol', '100', '2022-06-24 07:04:18'),
(2, 'Diesel', '96', '2022-06-24 07:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblfuelstation`
--

CREATE TABLE `tblfuelstation` (
  `ID` int(5) NOT NULL,
  `OwnerID` int(5) DEFAULT NULL,
  `Stateid` int(5) DEFAULT NULL,
  `Cityid` int(5) DEFAULT NULL,
  `NameoffuelStation` varchar(250) DEFAULT NULL,
  `LocationoffuelStation` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfuelstation`
--

INSERT INTO `tblfuelstation` (`ID`, `OwnerID`, `Stateid`, `Cityid`, `NameoffuelStation`, `LocationoffuelStation`, `CreationDate`) VALUES
(1, 2, 1, 1, 'Siddharth Indian Oil', 'CRXP+R29, Sardar Patel Marg, Madhopur, Prayagraj, Uttar Pradesh 211001', '2022-06-23 07:22:11'),
(2, 2, 1, 3, 'Manish Indian Oil', 'CRXP+R29, Sardar Patel Marg, Madhopur, Varanasi, Uttar Pradesh 221001', '2022-06-23 07:23:13'),
(3, 3, 2, 4, 'Tanu Indian  Oil Cor pvt ltd', 'Bhandara Rd, Pardi, Nagpur, Maharashtra 440034', '2022-06-23 07:30:26'),
(4, 4, 1, 3, 'Johns Fuel Pump and Gas Pump', 'Abc Street Varanasi UP', '2022-07-07 01:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblfuelstationowner`
--

CREATE TABLE `tblfuelstationowner` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `UserName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfuelstationowner`
--

INSERT INTO `tblfuelstationowner` (`ID`, `FullName`, `UserName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(2, 'Test Test', 'har19', 7979798797, 'har@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-20 11:46:15'),
(3, 'Tanu Shree', 'Tanu123', 9797979791, 'tanu@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-23 07:26:15'),
(4, 'John Doe', 'john12', 1212343456, 'jhn@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-07-07 01:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderfuel`
--

CREATE TABLE `tblorderfuel` (
  `ID` int(5) NOT NULL,
  `ordernum` varchar(250) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Stateid` int(5) DEFAULT NULL,
  `Cityid` int(5) DEFAULT NULL,
  `fuelStationid` int(5) DEFAULT NULL,
  `Typeoffuel` varchar(250) DEFAULT NULL,
  `FuelPrice` decimal(10,0) DEFAULT NULL,
  `Dateoffueldelivery` varchar(250) DEFAULT NULL,
  `Timeoffueldeliver` varchar(250) DEFAULT NULL,
  `Quantityoffuel` int(9) DEFAULT NULL,
  `DeliveryAddress` varchar(250) DEFAULT NULL,
  `ModeofPayment` varchar(250) DEFAULT NULL,
  `OrderDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderfuel`
--

INSERT INTO `tblorderfuel` (`ID`, `ordernum`, `UserID`, `Stateid`, `Cityid`, `fuelStationid`, `Typeoffuel`, `FuelPrice`, `Dateoffueldelivery`, `Timeoffueldeliver`, `Quantityoffuel`, `DeliveryAddress`, `ModeofPayment`, `OrderDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(2, '434436333', 1, 2, 4, 3, '2', '86', '2022-06-24', '10:30', 5, 'Faculty Department of BHU, Near Borkha hostel', 'COD', '2022-06-24 05:42:45', NULL, NULL, NULL),
(3, '466428765', 1, 1, 1, 1, '1', '100', '2022-06-25', '19:00', 10, 'H-911, Vihar kunj Allhabad', 'UPI', '2022-06-24 05:44:18', 'Delivered', 'Delivered', '2022-06-27 06:25:43'),
(4, '792693106', 3, 2, 4, 3, '2', '86', '2022-04-02', '13:30', 5, 'NH715, near toll tax', 'UPI', '2022-06-24 06:39:08', NULL, NULL, NULL),
(5, '127618157', 3, 1, 1, 1, '1', '100', '2022-06-24', '10:30', 5, 'Highway near SMS college', 'UPI', '2022-06-24 10:39:31', 'Order Delivered', 'Delivered', '2022-06-27 07:57:36'),
(6, '662376270', 4, 1, 3, 2, '2', '86', '2022-06-29', '15:30', 10, 'K-809, DDD, hfhgfh', 'UPI', '2022-06-29 12:18:46', 'Delivered', 'Delivered', '2022-06-29 12:30:32'),
(7, '891982486', 5, 1, 3, 4, '1', '100', '2022-07-10', '10:00', 10, 'XYZ Street Varanasei UP', 'COD', '2022-07-07 01:23:30', 'Fuel delivered succesffuly', 'Delivered', '2022-07-07 01:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', 'We are committed to offering travel services of the highest quality, combining our energy and enthusiasm, with our years of experience. Our greatest satisfaction comes in serving large numbers of satisfied clients who have experienced the joys and inspiration of travel.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta erat sit amet eros sagittis, quis hendrerit libero aliquam. Fusce semper augue ac dolor efficitur, a pretium metus pellentesque.', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', '982, Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'info@gmail.com', 7896541236, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `ID` int(11) NOT NULL,
  `State` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`ID`, `State`, `CreationDate`) VALUES
(1, 'UP', '2022-06-20 13:41:32'),
(2, 'Maharastra', '2022-06-20 13:43:18'),
(3, 'MP', '2022-06-20 13:43:25'),
(5, 'Mizoram', '2022-06-20 13:44:18'),
(6, 'Rajasthan', '2022-06-20 13:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `OrderNumber` int(10) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `OrderNumber`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 12456789, 'Your Application has been approved', 'Approved', '2021-12-21 05:09:19'),
(2, 12456789, 'Your Loan has been disburesd', 'Disbursed', '2021-12-21 06:41:40'),
(3, 84468, 'Rejected', 'Rejected', '2021-12-21 07:08:41'),
(4, 99252, 'Your Loan Has been approved', 'Approved', '2021-12-22 13:03:58'),
(5, 99252, 'Good Luck', 'Disbursed', '2021-12-22 13:06:17'),
(6, 14227, 'Approved', 'Approved', '2021-12-27 05:42:09'),
(7, 466428765, 'Confirmed', 'Confirmed', '2022-06-27 06:17:09'),
(8, 466428765, 'On th way', 'On The Way', '2022-06-27 06:25:25'),
(9, 466428765, 'Delivered', 'Delivered', '2022-06-27 06:25:43'),
(10, 127618157, 'Order Confirmed', 'Confirmed', '2022-06-27 07:56:30'),
(11, 127618157, 'Delivery Boy is on the way', 'On The Way', '2022-06-27 07:57:14'),
(12, 127618157, 'Order Delivered', 'Delivered', '2022-06-27 07:57:36'),
(13, 662376270, 'Order Confirmed', 'Confirmed', '2022-06-29 12:27:22'),
(14, 662376270, 'Delivery person is on the way', 'On The Way', '2022-06-29 12:29:38'),
(15, 662376270, 'Delivered', 'Delivered', '2022-06-29 12:30:31'),
(16, 891982486, 'Fuel Order Confirmed', 'Confirmed', '2022-07-07 01:24:12'),
(17, 891982486, 'Fuel on the way for delivery', 'On The Way', '2022-07-07 01:24:56'),
(18, 891982486, 'Fuel delivered succesffuly', 'Delivered', '2022-07-07 01:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(250) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `UserName`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'test123', 'Test', 8787878787, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-14 05:36:39'),
(2, 'rah123', 'Rahul', 7878778787, 'rah@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-14 05:37:15'),
(3, 'pan123', 'Pankaj', 4465464646, 'pan@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-23 10:21:23'),
(4, 'test567', 'Test', 9879779798, 'testtest@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-29 12:09:29'),
(5, 'rahul12', 'Rahul kumar', 1425362514, 'rak12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-07-07 01:22:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfuelprice`
--
ALTER TABLE `tblfuelprice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfuelstation`
--
ALTER TABLE `tblfuelstation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfuelstationowner`
--
ALTER TABLE `tblfuelstationowner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderfuel`
--
ALTER TABLE `tblorderfuel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ApplicationNumber` (`OrderNumber`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblfuelprice`
--
ALTER TABLE `tblfuelprice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfuelstation`
--
ALTER TABLE `tblfuelstation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfuelstationowner`
--
ALTER TABLE `tblfuelstationowner`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblorderfuel`
--
ALTER TABLE `tblorderfuel`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
