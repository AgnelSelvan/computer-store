-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 06:35 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cID` int(11) NOT NULL,
  `userID` int(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cID`, `userID`, `productid`, `quantity`) VALUES
(108, 23, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `casecompany`
--

CREATE TABLE `casecompany` (
  `caseCompID` int(11) NOT NULL,
  `caseCompName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casecompany`
--

INSERT INTO `casecompany` (`caseCompID`, `caseCompName`) VALUES
(1, 'Corsair'),
(2, 'NZXT'),
(3, 'Fractal Design'),
(4, 'Cooler Master'),
(5, 'Phanteks'),
(6, 'ASUS'),
(7, 'Antec'),
(8, 'Intel'),
(9, 'Companq'),
(10, 'Foxconn');

-- --------------------------------------------------------

--
-- Table structure for table `graphicscardcompany`
--

CREATE TABLE `graphicscardcompany` (
  `grapCardID` int(11) NOT NULL,
  `graphicsCradComp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graphicscardcompany`
--

INSERT INTO `graphicscardcompany` (`grapCardID`, `graphicsCradComp`) VALUES
(1, 'Nvidia Titan V'),
(2, 'Nvidia RTX 2080 Ti'),
(3, 'Nvidia GTX 1070'),
(4, 'Nvidia RTX 2060'),
(5, 'Nvidia RTX 2060 super'),
(6, 'Nvidia Titan Pascal');

-- --------------------------------------------------------

--
-- Table structure for table `iocompany`
--

CREATE TABLE `iocompany` (
  `IOId` int(11) NOT NULL,
  `CompName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iocompany`
--

INSERT INTO `iocompany` (`IOId`, `CompName`) VALUES
(1, 'SAMSUNG'),
(2, 'Logitech'),
(3, 'Microsoft'),
(4, 'Razer'),
(5, 'HP'),
(6, 'Apple'),
(7, 'IBall');

-- --------------------------------------------------------

--
-- Table structure for table `monitorcompany`
--

CREATE TABLE `monitorcompany` (
  `mID` int(11) NOT NULL,
  `monitorCompName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitorcompany`
--

INSERT INTO `monitorcompany` (`mID`, `monitorCompName`) VALUES
(1, 'Samsung'),
(2, 'LG'),
(3, 'HP'),
(4, 'Dell'),
(5, 'Lenovo'),
(6, 'Alienware');

-- --------------------------------------------------------

--
-- Table structure for table `motherboardtype`
--

CREATE TABLE `motherboardtype` (
  `motherID` int(11) NOT NULL,
  `motherboardName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboardtype`
--

INSERT INTO `motherboardtype` (`motherID`, `motherboardName`) VALUES
(1, 'Gigabyte GA-H61M-S'),
(2, 'Gigabyte H-61 Chipset S2P'),
(3, 'Gigabyte GA-H61M-S1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `ordernumber` int(255) NOT NULL,
  `userID` int(10) DEFAULT NULL,
  `pcID` int(10) DEFAULT NULL,
  `pcQty` int(50) NOT NULL,
  `partID` int(10) DEFAULT NULL,
  `paymentMethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pccart`
--

CREATE TABLE `pccart` (
  `pccartid` int(11) NOT NULL,
  `pcid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pccart`
--

INSERT INTO `pccart` (`pccartid`, `pcid`, `userid`) VALUES
(12, 26, 23);

-- --------------------------------------------------------

--
-- Table structure for table `pcpart`
--

CREATE TABLE `pcpart` (
  `pcPartID` int(11) NOT NULL,
  `partTitle` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `partKeyword` int(10) DEFAULT NULL,
  `partDesc` varchar(255) DEFAULT NULL,
  `qty` int(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcpart`
--

INSERT INTO `pcpart` (`pcPartID`, `partTitle`, `image`, `partKeyword`, `partDesc`, `qty`, `price`) VALUES
(9, 'Basic Mouse', 'uploadedimages/mouse.jpg', 7, 'Smooth, precise and affordable USB-connected 3-button optical mouse.High-definition (1000 dpi) optical tracking enables responsive cursor control for precise tracking and easy text selection.\r\n\r\n\r\n\r\n\r\n', 10, 900),
(10, 'Gigabyte AORUS GeForce RTX 2080 Ti', 'uploadedimages/graphicscard.jpg', 6, 'Powered by GeForce RTX 2080 Ti\r\nNvidia Turing architecture & Real time Ray Tracing\r\nWindforce 3x stacked cooling System', 30, 4000),
(11, 'Thermaltake V200 Tempered Glass RGB', 'uploadedimages/case.jpg', 1, 'Light up the system: 3 Pre installed 120 millimeter 12V motherboard Sync RGB fans (Sync with as US, Gigabyte, MSI, as rock, and BIOSTAR 12V header Mob) + 1 Black fan at back\r\nBuilt in dual mode 12V Sync controller: Control light via I/O port RGB Light but', 9, 1000),
(12, 'MUSETEX Phantom Black', 'uploadedimages/case1.jpg', 1, 'Specially designed for lighting', 15, 1500),
(19, 'Basic kids Keyboard', 'uploadedimages/p-1.jpg', 8, 'Basics kids keyboard', 9, 900),
(20, 'Timetec Hynix IC 16GB Kit (2x8GB) DDR3 1333MHz PC3-10600 ', 'uploadedimages/p-3.jpg', 5, 'DDR3 â€¢ 1333MHz â€¢ PC3-10600 â€¢ 240-Pin â€¢ Unbuffered â€¢ Non ECC â€¢ 1.5V â€¢ CL9 â€¢ Dual Rank â€¢ 2Rx8 based â€¢ 512x8JEDEC standard 1.5V (1.425V ~1.575V) Power SupplyModule Size: 16GB Package: 2x8GB â€¢ For Desktop Computer, Not for LaptopFor Sele', 9, 4000),
(21, 'USB3 DDR3 HDMI DVI USB 3.0 760G MicroATX Motherboard', 'uploadedimages/p-4.jpg', 3, 'AM3+ CPU Support Ready\r\nCore Unlocker- Unlock true Core performance intelligently\r\nAnti-Surge- Full-time Power Guardian-Make System Free From Risk', 10, 4000),
(22, 'Samsung LS24D330HSJ/ZA 24\" S24D330H 1920x1080 LED Monitor ', 'uploadedimages/p-5.jpg', 4, '24-inch desktop business monitor provides impressive picture quality and ultra-fast response time at an accessible price point; includes 3-year Warranty\r\nFull HD 1920 x 1080 resolution; low-glare TN panel delivers sharp images and vivid color even from of', 5, 30000),
(23, 'HGST 1TB 32MB Cache 7200RPM SATA III (6.0Gb/s) 2.5\" PS3 & PS4 Hard Drive 0J22423', 'uploadedimages/p-6.jpg', 9, 'HGST 1TB 32MB Cache 7200RPM SATA III (6.0Gb/s) 2.5\" PS3 & PS4 Hard Drive 0J22423#0039/22', 10, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pcpartcomp`
--

CREATE TABLE `pcpartcomp` (
  `pcPartID` int(11) NOT NULL,
  `pcPartComponents` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcpartcomp`
--

INSERT INTO `pcpartcomp` (`pcPartID`, `pcPartComponents`) VALUES
(1, 'Case'),
(2, 'CPU'),
(3, 'Motherboard'),
(4, 'Monitor'),
(5, 'RAM'),
(6, 'Graphics Card'),
(7, 'Mouse'),
(8, 'Keyboard'),
(9, 'Harddisk');

-- --------------------------------------------------------

--
-- Table structure for table `pctype`
--

CREATE TABLE `pctype` (
  `pcTypeID` int(11) NOT NULL,
  `pcTypeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pctype`
--

INSERT INTO `pctype` (`pcTypeID`, `pcTypeName`) VALUES
(1, 'Desktop'),
(2, 'Gaming'),
(3, 'Streaming');

-- --------------------------------------------------------

--
-- Table structure for table `pc_details`
--

CREATE TABLE `pc_details` (
  `pc_id` int(11) NOT NULL,
  `pc_image` varchar(200) NOT NULL,
  `pcName` varchar(255) NOT NULL,
  `PC_Type` varchar(50) DEFAULT NULL,
  `motherboard` varchar(255) NOT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `pcPrice` int(255) NOT NULL,
  `hardDisk` longtext DEFAULT NULL,
  `monitor` varchar(100) DEFAULT NULL,
  `monitor_display` int(50) DEFAULT NULL,
  `graphics_card_type` longtext DEFAULT NULL,
  `graphics_card` varchar(50) DEFAULT NULL,
  `keyboard_company` longtext DEFAULT NULL,
  `mouse_company` longtext DEFAULT NULL,
  `speakers` longtext DEFAULT NULL,
  `ram_type` longtext DEFAULT NULL,
  `ram_company` longtext DEFAULT NULL,
  `ram_capacity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_details`
--

INSERT INTO `pc_details` (`pc_id`, `pc_image`, `pcName`, `PC_Type`, `motherboard`, `processor`, `pcPrice`, `hardDisk`, `monitor`, `monitor_display`, `graphics_card_type`, `graphics_card`, `keyboard_company`, `mouse_company`, `speakers`, `ram_type`, `ram_company`, `ram_capacity`) VALUES
(11, 'uploadedimages/haha.jpg', 'Remz', 'Gaming', 'AMD', 'Ryzen 5700', 50000, '', 'Samsung', 24, 'Nividea', '8', 'Logitech', 'Logitech', 'Logitech', 'DD4', 'Logitech', '16'),
(16, 'uploadedimages/computer.jpg', 'MSI', 'Desktop', 'Intel', 'I5', 50000, '5', 'Samsung', 26, 'nivedia', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR4', 'Logitech', '16'),
(17, 'uploadedimages/download (1).jpg', 'Cooler Master', 'Streamin', 'Intel', 'I3', 30000, '1', 'LG', 24, 'Nenforce', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR3', 'Logitech', '8'),
(18, 'uploadedimages/download(2).jpg', 'The Best mATX', 'Gaming', 'Intel', 'I9', 100000, '8', 'Samsung', 30, 'Nivedia', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR4', 'Logitech', '24'),
(19, 'uploadedimages/computer.jpg', 'Monster the beast', 'sdfdfs', 'dfsdfs', 'dfsdfs', 43445, '43', 'dfsfd', 43, 'fdsdf', '43', 'dfsdfs', 'fsdfs', 'fdsfdsf', 'fsddfs', 'fsfsdf', '4334'),
(23, 'uploadedimages/streamingcomp.jpg', 'Monster the beast', 'Desktop', 'Gigabyte GA-H61M-S', 'i3 6th generation', 100000, '8', 'Samsung', 32, 'Nvidia Titan V', '16', 'SAMSUNG', 'SAMSUNG', 'SAMSUNG', 'DDR4', 'Corsair', '16'),
(26, 'uploadedimages/p-2.jpg', 'Acer Aspire', 'Desktop', 'Gigabyte GA-H61M-S', 'i3 6th generation', 100000, '4', 'Samsung', 32, 'Nvidia Titan V', '32', 'SAMSUNG', 'SAMSUNG', 'SAMSUNG', 'DDR4', 'Corsair', '32'),
(27, 'uploadedimages/p-7.jpg', 'The Best Desktop Computers for 2019', 'Gaming', 'Gigabyte H-61 Chipset S2P', 'i7 6th generation', 120000, '8', 'Samsung', 32, 'Nvidia GTX 1070', '32', 'Logitech', 'Razer', 'Razer', 'DDR4', 'Micron', '8');

-- --------------------------------------------------------

--
-- Table structure for table `processorlist`
--

CREATE TABLE `processorlist` (
  `pID` int(11) NOT NULL,
  `processorName` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processorlist`
--

INSERT INTO `processorlist` (`pID`, `processorName`) VALUES
(1, 'i3 6th generation'),
(2, 'i5 6th generation'),
(3, 'i7 6th generation'),
(4, 'i3 5th generation'),
(5, 'i5 5th generation'),
(6, 'i7 5th generation'),
(7, 'AMD Ryzen 3'),
(8, 'AMD Ryzen 3 PRO'),
(9, 'AMD Ryzen 5'),
(10, 'AMD Ryzen 5 PRO'),
(11, 'AMD Ryzen 7'),
(12, 'AMD Ryzen 7 PRO');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_table`
--

CREATE TABLE `pwd_table` (
  `idpwd` int(6) NOT NULL,
  `emailVerify` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ramcompany`
--

CREATE TABLE `ramcompany` (
  `rID` int(11) NOT NULL,
  `ramCompany` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ramcompany`
--

INSERT INTO `ramcompany` (`rID`, `ramCompany`) VALUES
(1, 'Corsair'),
(2, 'Micron'),
(3, 'Kingston'),
(4, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `isUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `mobNumber` tinytext NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `userImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`isUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `mobNumber`, `address`, `country`, `state`, `userImage`) VALUES
(23, 'Agnel Selvan', 'agnel007@gmail.com', '$2y$10$HTydL8y5AAVD8f3RARo2/eYBTE4W5Y6RRrlYCprFuLd0fS7oUKp2a', '2147483647', '20 Sunny Street, City, Country or Sunny Street, 20', 'India', '', 'userimages/HAHA.jpeg'),
(25, 'Mr.Useless', 'mr.useless404@gmail.com', '$2y$10$5nE.jigkcDE1rZoFeOwHCO3LFmw.Tg9oltHQSV1KCu9BQ/7s5mefG', '9167877725', 'Jan Kowalski, ul. PiÄ™kna 65B/m.54, 00-000 Warszawa', 'India', '', 'userimages/useless.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `casecompany`
--
ALTER TABLE `casecompany`
  ADD PRIMARY KEY (`caseCompID`);

--
-- Indexes for table `graphicscardcompany`
--
ALTER TABLE `graphicscardcompany`
  ADD PRIMARY KEY (`grapCardID`);

--
-- Indexes for table `iocompany`
--
ALTER TABLE `iocompany`
  ADD PRIMARY KEY (`IOId`);

--
-- Indexes for table `monitorcompany`
--
ALTER TABLE `monitorcompany`
  ADD PRIMARY KEY (`mID`);

--
-- Indexes for table `motherboardtype`
--
ALTER TABLE `motherboardtype`
  ADD PRIMARY KEY (`motherID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `pccart`
--
ALTER TABLE `pccart`
  ADD PRIMARY KEY (`pccartid`);

--
-- Indexes for table `pcpart`
--
ALTER TABLE `pcpart`
  ADD PRIMARY KEY (`pcPartID`);

--
-- Indexes for table `pcpartcomp`
--
ALTER TABLE `pcpartcomp`
  ADD PRIMARY KEY (`pcPartID`);

--
-- Indexes for table `pctype`
--
ALTER TABLE `pctype`
  ADD PRIMARY KEY (`pcTypeID`);

--
-- Indexes for table `pc_details`
--
ALTER TABLE `pc_details`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `processorlist`
--
ALTER TABLE `processorlist`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `pwd_table`
--
ALTER TABLE `pwd_table`
  ADD PRIMARY KEY (`idpwd`);

--
-- Indexes for table `ramcompany`
--
ALTER TABLE `ramcompany`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`isUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `casecompany`
--
ALTER TABLE `casecompany`
  MODIFY `caseCompID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `graphicscardcompany`
--
ALTER TABLE `graphicscardcompany`
  MODIFY `grapCardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `iocompany`
--
ALTER TABLE `iocompany`
  MODIFY `IOId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `monitorcompany`
--
ALTER TABLE `monitorcompany`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `motherboardtype`
--
ALTER TABLE `motherboardtype`
  MODIFY `motherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pccart`
--
ALTER TABLE `pccart`
  MODIFY `pccartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pcpart`
--
ALTER TABLE `pcpart`
  MODIFY `pcPartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pcpartcomp`
--
ALTER TABLE `pcpartcomp`
  MODIFY `pcPartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pctype`
--
ALTER TABLE `pctype`
  MODIFY `pcTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pc_details`
--
ALTER TABLE `pc_details`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `processorlist`
--
ALTER TABLE `processorlist`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pwd_table`
--
ALTER TABLE `pwd_table`
  MODIFY `idpwd` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ramcompany`
--
ALTER TABLE `ramcompany`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `isUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
