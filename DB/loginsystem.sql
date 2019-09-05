-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2019 at 03:53 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `caseCompany`
--

CREATE TABLE `caseCompany` (
  `caseCompID` int(11) NOT NULL,
  `caseCompName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caseCompany`
--

INSERT INTO `caseCompany` (`caseCompID`, `caseCompName`) VALUES
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
-- Table structure for table `pcPart`
--

CREATE TABLE `pcPart` (
  `pcPartID` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `partName` varchar(50) DEFAULT NULL,
  `partDesc` varchar(100) DEFAULT NULL,
  `qty` int(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcPart`
--

INSERT INTO `pcPart` (`pcPartID`, `image`, `partName`, `partDesc`, `qty`, `price`) VALUES
(1, 'uploadedimages/graphics.jpeg', 'Graphics Card', 'INVO 3D\r\n16GB', 7, 5000),
(2, 'uploadedimages/graphics.jpeg', 'Graphics Card', 'INVO 3D \r\n16GB\r\n', 7, 6000),
(3, 'uploadedimages/graphics.jpeg', 'Graphics Card', 'INVO 3D\r\n8GB', 8, 10000),
(4, '', 'Graphics Card', 'dfasdfas', 54453, 5353),
(5, 'uploadedimages/graphics.jpeg', 'Motherboard', 'fdggfdgfd', 6656, 67),
(6, 'uploadedimages/graphics.jpeg', 'Mouse', 'fdzsdfs', 67567, 6576567),
(7, 'uploadedimages/graphics.jpeg', 'Graphics Card', 'dfgfd', 56, 5654);

-- --------------------------------------------------------

--
-- Table structure for table `pcPartComp`
--

CREATE TABLE `pcPartComp` (
  `pcPartID` int(11) NOT NULL,
  `pcPartComponents` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcPartComp`
--

INSERT INTO `pcPartComp` (`pcPartID`, `pcPartComponents`) VALUES
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
  `PC_Type` varchar(255) DEFAULT NULL,
  `motherboard` varchar(255) NOT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `pcPrice` int(255) NOT NULL,
  `hardDisk` longtext,
  `monitor` varchar(100) DEFAULT NULL,
  `monitor_display` int(50) DEFAULT NULL,
  `graphics_card_type` longtext,
  `graphics_card` varchar(50) DEFAULT NULL,
  `keyboard_company` longtext,
  `mouse_company` longtext,
  `speakers` longtext,
  `ram_type` longtext,
  `ram_company` longtext,
  `ram_capacity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_details`
--

INSERT INTO `pc_details` (`pc_id`, `pc_image`, `PC_Type`, `motherboard`, `processor`, `pcPrice`, `hardDisk`, `monitor`, `monitor_display`, `graphics_card_type`, `graphics_card`, `keyboard_company`, `mouse_company`, `speakers`, `ram_type`, `ram_company`, `ram_capacity`) VALUES
(11, 'uploadedimages/haha.jpg', 'Gaming', 'AMD', 'Ryzen 5700', 50000, '', 'Samsung', 24, 'Nividea', '8', 'Logitech', 'Logitech', 'Logitech', 'DD4', 'Logitech', '16'),
(16, 'uploadedimages/computer.jpg', 'Desktop', 'Intel', 'I5', 50000, '5', 'Samsung', 26, 'nivedia', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR4', 'Logitech', '16'),
(17, 'uploadedimages/download (1).jpg', 'Streamin', 'Intel', 'I3', 30000, '1', 'LG', 24, 'Nenforce', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR3', 'Logitech', '8'),
(18, 'uploadedimages/download(2).jpg', 'Gaming', 'Intel', 'I9', 100000, '8', 'Samsung', 30, 'Nivedia', '8', 'Logitech', 'Logitech', 'Logitech', 'DDR4', 'Logitech', '24'),
(19, 'uploadedimages/computer.jpg', 'sdfdfs', 'dfsdfs', 'dfsdfs', 43445, '43', 'dfsfd', 43, 'fdsdf', '43', 'dfsdfs', 'fsdfs', 'fdsfdsf', 'fsddfs', 'fsfsdf', '4334'),
(22, 'uploadedimages/graphics.jpeg', 'Desktop', 'Gigabyte GA-H61M-S', 'i3 6th generation', 21, '3', 'Samsung', 21, 'Nvidia Titan V', '32', 'SAMSUNG', 'SAMSUNG', 'SAMSUNG', '21', 'Corsair', '23');

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
  `mobNumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`isUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `mobNumber`) VALUES
(9, 'Mr.Useless', 'mr.useless404@gmail.com', '$2y$10$8zztGc8dIrzAIDgOSkSJhO.Da7hWkFSl0EaoWstwz0TUL6VmmLTaK', 2147483647),
(10, 'a', 'a@gmail.com', '$2y$10$wGGwNnuuhSDI0LljSSbjR.1DKhCHbr1Q0r0o4kq7aPL63xAFscAxi', 2147483647),
(11, 'h', 'h@gmail.com', '$2y$10$7fh1OcziNaQu0RSjosvHN.2439Zyh9jaC32wQNfTkYvnG8Fs4cf4e', 2147483647),
(12, 'Agnel', 'agnelselvan007@gmail.com', '$2y$10$ArMGTPYI70opp/Hkgh5w6ee1OJ/ZWGjr7IzkBCmIKiwSnDAqjQlty', 2147483647),
(13, 'b', 'b@gmail.com', '$2y$10$DVWkAavIa/NHSM2FbQ2R4uvYAoSWNm1.jBMO/DmCfEn0gUti3IhdS', 2147483647),
(14, 'g', 'g@gmail.com', '$2y$10$TjDre1Qg.Mu21XxM9ueeguZmsN2xMdO.kqzSnbNOWAkJFQnpsYI.e', 2147483647),
(15, 'j', 'j@gmail.com', '$2y$10$9BJ0AP7H74uRwFEx67d8UOKDh5JxQo.HPQZ917zLPxtCoY1ze3sQ6', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caseCompany`
--
ALTER TABLE `caseCompany`
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
-- Indexes for table `pcPart`
--
ALTER TABLE `pcPart`
  ADD PRIMARY KEY (`pcPartID`);

--
-- Indexes for table `pcPartComp`
--
ALTER TABLE `pcPartComp`
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
-- AUTO_INCREMENT for table `caseCompany`
--
ALTER TABLE `caseCompany`
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
-- AUTO_INCREMENT for table `pcPart`
--
ALTER TABLE `pcPart`
  MODIFY `pcPartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pcPartComp`
--
ALTER TABLE `pcPartComp`
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
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `isUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
