-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2018 at 06:37 AM
-- Server version: 5.7.9-log
-- PHP Version: 7.2.2

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `Name`) VALUES
(19, 'Winter caps'),
(20, 'Peruvian caps'),
(21, 'Hats'),
(22, 'Basketball caps'),
(23, 'Flat caps'),
(24, 'Weird caps'),
(25, 'Elite caps');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemId` int(11) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Description` longtext,
  `Gender` varchar(6) NOT NULL,
  `ImageUrl` longtext,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `SupplierId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemId`, `ArrivalDate`, `CategoryId`, `Description`, `Gender`, `ImageUrl`, `Name`, `Price`, `SupplierId`) VALUES
(33, '2018-06-14', 20, 'Green magic, warm as hell', 'Men', 'img/caps/367-Peruviancapred.jpg', 'Green machu pikchu', 100, 1),
(34, '2018-06-14', 20, 'Warm as, Yellow and fancy. But most importantly warm. Those peruvian people know how to fight frost', 'Women', 'img/caps/983-Yellowmachupikchu.JPG', 'Yellow machu pikchu', 200, 1),
(35, '2018-06-14', 23, 'Strcitly classical shape, supreme tweed material. Sensational!', 'Men', 'img/caps/330-Grandduke.jpg', 'Grand duke', 190, 1),
(36, '2018-06-14', 21, 'Nice straw summer hat for a lovely creature', 'Women', 'img/caps/408-Summerhat.jpg', 'Summer hat', 80, 3),
(37, '2018-06-14', 19, 'Oh wow, what da hell is that??? ', 'Unisex', 'img/caps/285-Creepydude.jpg', 'Crrepy dude', 140, 3),
(38, '2018-06-14', 24, 'yeay, you know it. That famous character. ', 'Men', 'img/caps/108-Funnycap1.jpg', 'Shreck cap', 90, 4),
(39, '2018-06-14', 24, 'This cap is made in the form of a burger by a talented local designer. Have fun!', 'Men', 'img/caps/205-Burgercap.jpg', 'Burger cap', 250, 4),
(40, '2018-06-14', 23, 'This is a good old classic cap. Best for mid season', 'Men', 'img/caps/900-Greenmachupikchu.JPG', 'Colorful flat cap', 280, 3),
(41, '2018-06-14', 20, 'Cusco is a city in Peru. Beautiful, historical, authentic. So is this cap. Just amazing', 'Unisex', 'img/caps/858-test.jpg', 'Brown cusco', 160, 1),
(42, '2018-06-14', 23, 'very cassical shape', 'Men', 'img/caps/ANotherguy.jpg', 'Classic grey flat cap', 210, 3),
(43, '2018-06-14', 19, 'Ancient luxury cap, that used to be worn by tsars', 'Unisex', 'img/caps/607-Monomah.jpg', 'Monomah', 900, 3),
(44, '2018-06-16', 22, 'Fresh cool cap. Classical shape snap-back', 'Men', 'img/caps/119-Hui.jpg', 'LA wings', 230, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderID`, `ItemID`, `Quantity`) VALUES
(11, 39, 1),
(12, 36, 1),
(12, 43, 3),
(14, 35, 3),
(14, 37, 2),
(14, 42, 2),
(16, 37, 1),
(17, 39, 1),
(18, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `GST` double NOT NULL DEFAULT '15',
  `Status` varchar(10) NOT NULL,
  `Subtotal` double NOT NULL,
  `GrandTotal` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `GST`, `Status`, `Subtotal`, `GrandTotal`) VALUES
(11, 5, '2018-06-16 05:06:10.000000', 15, 'Shipped', 250, 287.5),
(12, 5, '2018-06-16 05:07:27.000000', 15, 'Waiting', 2780, 3197),
(14, 5, '2018-06-16 05:51:01.000000', 15, 'Waiting', 1270, 1460.5),
(16, 2, '2018-06-16 10:50:28.000000', 15, 'Waiting', 140, 161),
(17, 20, '2018-06-16 23:45:37.000000', 15, 'Waiting', 250, 287.5),
(18, 2, '2018-06-17 07:14:40.000000', 15, 'Shipped', 190, 218.5);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcartitems`
--

CREATE TABLE `shoppingcartitems` (
  `Id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `ShoppingCartId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shoppingcartitems`
--

INSERT INTO `shoppingcartitems` (`Id`, `Amount`, `ItemId`, `ShoppingCartId`) VALUES
(3, 1, 39, '85393080-C60F-4E15-9C3B-C98A5DBFEAA3'),
(4, 1, 37, '85393080-C60F-4E15-9C3B-C98A5DBFEAA3'),
(5, 1, 41, 'E36F5DAA-56BC-44BF-82A0-6FAB52275CF4'),
(9, 1, 33, '99669402-493F-4755-B4D8-5101D8145296'),
(17, 4, 41, '4B34EA29-4B37-4722-AF60-47B656146289'),
(18, 1, 37, '4B34EA29-4B37-4722-AF60-47B656146289'),
(19, 3, 39, 'A9B8CF20-0A56-4BD7-937C-668AFEE83C6A'),
(20, 1, 41, 'D1ED4AEB-BEAB-48C1-8008-C7547F7554A9'),
(29, 3, 34, '736A4F89-013C-4F6C-A045-3611E4362F9F'),
(30, 4, 39, 'FA1C11A3-DE51-49EF-906C-84EE5429E1FE'),
(32, 1, 42, '674D33C2-DB2A-4739-B10B-5C89ABA88F4D'),
(34, 4, 35, '173C67D1-B05D-48A8-8CA6-FC0DFB2CD1F3'),
(38, 2, 41, '8C95E667-366C-4D08-B657-41F7ADA36AB2');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierId` int(11) NOT NULL,
  `AddressLine2` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `HomeNumber` varchar(50) DEFAULT NULL,
  `MobileNumber` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `WorkNumber` varchar(50) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL DEFAULT '',
  `City` varchar(50) NOT NULL DEFAULT '',
  `ZipCode` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierId`, `AddressLine2`, `Email`, `HomeNumber`, `MobileNumber`, `Name`, `WorkNumber`, `AddressLine1`, `City`, `ZipCode`) VALUES
(1, '', 'belovolovri@gmail.com', '204471047', '', 'LamaLux', '', '14 Western Springs Rd', 'Auckland', '1021'),
(3, '', 'romnchitto@gmail.com', '204471047', '', 'Ivanovo caps', '', '127c Galloway street', 'Hamilton', '3216'),
(4, '', 'sales@funco.nz', '', '', 'Fun Co', '020-447-47-47', '12 biggle street', 'Weelington', '1022'),
(8, '', 'sales@nice.nz', '0204471047', '+642041509894', 'Nice Supplier', '', '127c Galloway street', 'Hamilton', '3216'),
(9, '', 'qwe@qwe.qq', '204471047', '', 'wqdw', '', '12 Nino', 'Bluff', '3216');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `EmailConfirmed` tinyint(4) NOT NULL,
  `PasswordHash` longtext NOT NULL,
  `Role` varchar(20) NOT NULL,
  `AddressLine1` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(10) DEFAULT NULL,
  `HomeNumber` varchar(20) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `WorkNumber` varchar(20) DEFAULT NULL,
  `IsLocked` tinyint(1) DEFAULT '0',
  `ConfirmToken` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserName`, `FirstName`, `LastName`, `Email`, `EmailConfirmed`, `PasswordHash`, `Role`, `AddressLine1`, `AddressLine2`, `City`, `ZipCode`, `HomeNumber`, `MobileNumber`, `WorkNumber`, `IsLocked`, `ConfirmToken`) VALUES
(1, 'romnchitto@gmail.com', NULL, NULL, 'romnchitto@gmail.com', 0, '$2y$10$N4RcsYMqKFAWbPF5tz4qa./q7fZ1vfmUBSdRuszQThGwZo2opoOsq', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'user@user', 'User', 'Userovich', 'user@user', 0, '$2y$10$a5cyFrd4A2QKmtM/uoolMeB.m2fhHmtETYtIXRJT6l15XuLA0rI1O', 'customer', '12, Qwe', '', 'Cusco', '1231', '', '123321123', '', 0, NULL),
(3, 'user2@user', NULL, NULL, 'user2@user', 0, '$2y$10$hvTmrB0RMl32iKUUp9aBsumcWS6QBrltnVO15iLkhkai6QlN5vQU.', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(4, 'admin@qc.nz', NULL, NULL, 'admin@qc.nz', 1, '$2y$10$hvTmrB0RMl32iKUUp9aBsumcWS6QBrltnVO15iLkhkai6QlN5vQU.', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, 'belovolovri@gmail.com', 'Romansky', 'Belovolov', 'belovolovri@gmail.com', 0, '$2y$10$po6QSHbpxa4fzo35HBQcVOZoZOR9tNcROo3lydCE7x37dLUz1ABS.', 'customer', '14 Western Springs Rd', '', 'Auckland', '1021', '8934329322', '+64204471047', '', 0, NULL),
(6, 'user4@user', NULL, NULL, 'user4@user', 0, '$2y$10$re0zKP/gFe0T64PhMD3f.elGLJIxmEXEm7NbJpyXGh5yAqmWnWHtG', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, 'belovolovri2@gmail.com', 'qwert', 'wert', 'belovolovri2@gmail.com', 0, '$2y$10$v1.6TKQfDMMbAkFtJTeIxOW4I/zNSs/ZwQprqsJiTwWP1jcuBnmT.', 'customer', '14 Western Springs Rd', '', 'Auckland', '1021', '123', '', '', 0, NULL),
(24, 'alexandrafrozen@mail.ru', NULL, NULL, 'alexandrafrozen@mail.ru', 1, '$2y$10$nu1S4VGQBusmlhjhezZUduafCV6m0IgYLsbYbhj2tdpEANNPfJuo2', 'customer', NULL, NULL, NULL, NULL, NULL, '123', NULL, 0, 'd2ba044244fd4c80a3ea2468773b3a775c7c78b552d132768112415d7b30a5d45003b38a4801aa38d13042b06ea69f09d68f'),
(30, 'customer', NULL, NULL, 'user@qc.nz', 0, '$2y$10$5NcpWCgxb0l8y1RC8az6ZuxXMcn8Zkndg6kdHTnN30454aF8GhvwG', 'customer', NULL, NULL, NULL, NULL, NULL, '0204471047', NULL, 0, '5c75fb5c2db2eef24c922eab7d5634393fc90469e51a76ea7c220a9e6acd3c7fb50daefd43d836f8819555ce6da051749b22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemId`),
  ADD KEY `FK_Items_Categories_CategoryId` (`CategoryId`),
  ADD KEY `FK_Items_Suppliers_SupplierId` (`SupplierId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OrderID`,`ItemID`),
  ADD KEY `IX_OrderItems_ItemID` (`ItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `IX_Orders_CustomerID` (`CustomerID`);

--
-- Indexes for table `shoppingcartitems`
--
ALTER TABLE `shoppingcartitems`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UQ_ShoppingCartItems` (`ItemId`,`ShoppingCartId`),
  ADD KEY `IX_ShoppingCartItems_ShoppingCartId` (`ShoppingCartId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserNameIndex` (`UserName`),
  ADD KEY `EmailIndex` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shoppingcartitems`
--
ALTER TABLE `shoppingcartitems`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_Items_Categories_CategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Items_Suppliers_SupplierId` FOREIGN KEY (`SupplierId`) REFERENCES `suppliers` (`SupplierId`) ON DELETE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `FK_OrderItems_Items_ItemID` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_OrderItems_Orders_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Orders_Users_CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`Id`);

--
-- Constraints for table `shoppingcartitems`
--
ALTER TABLE `shoppingcartitems`
  ADD CONSTRAINT `FK_ShoppingCartItems_Items_ItemId` FOREIGN KEY (`ItemId`) REFERENCES `items` (`ItemId`);
