-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2019 at 05:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WeThree`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `customerId` int(10) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`customerId`, `userId`, `password`) VALUES
(30, '1', '123'),
(32, '2', '2'),
(39, '3', '3'),
(43, 'hi', 'dldl'),
(41, 'ny', '12345'),
(4, 'nylee', 'newpassword'),
(42, 'sample', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `customerId` int(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`customerId`, `address`) VALUES
(4, '410 White Birch Ave Waterloo ON Canada'),
(30, '1'),
(32, '2'),
(39, '3'),
(41, '200 university ave Waterloo'),
(42, 'sample'),
(43, '1');

-- --------------------------------------------------------

--
-- Table structure for table `Card`
--

CREATE TABLE `Card` (
  `customerId` int(10) NOT NULL,
  `credit` varchar(16) DEFAULT NULL,
  `debit` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Card`
--

INSERT INTO `Card` (`customerId`, `credit`, `debit`) VALUES
(4, '1234567890123456', NULL),
(41, '1234567890123456', NULL),
(42, NULL, '0000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `productId` int(10) DEFAULT NULL,
  `cartQuantity` int(10) NOT NULL,
  `totalPrice` decimal(18,2) NOT NULL,
  `customerId` int(10) DEFAULT NULL,
  `cartId` int(10) NOT NULL,
  `price` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`productId`, `cartQuantity`, `totalPrice`, `customerId`, `cartId`, `price`) VALUES
(4, 1, '62.99', 39, 21, '62.99'),
(10, 1, '8.77', 39, 23, '8.77');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customerId` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customerId`, `firstName`, `lastName`, `phoneNumber`, `email`) VALUES
(4, 'ny', 'lee', '2268686177', 'nlee2421@conestogac.on.ca'),
(30, '1', '1', '1', '1'),
(32, '2', '2', '2', '2'),
(39, '3', '3', '3', '3'),
(41, 'ny', 'lee', '1234567890', 'ny@wethree.com'),
(42, 'sample', 'sample', '0000000000', 'sample@sample.com'),
(43, 'hello', 'hello', '1', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `orderId` int(10) NOT NULL,
  `customerId` int(10) NOT NULL,
  `salesId` int(10) NOT NULL,
  `totalPrice` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`orderId`, `customerId`, `salesId`, `totalPrice`) VALUES
(14, 4, 124, '130.20'),
(15, 4, 125, '142.36');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `productId` int(10) NOT NULL,
  `category` enum('Pen','Paper','Card','ColouredPaper','GreetingCard','StickyNote','Highlighter') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productId`, `category`, `description`, `price`, `quantity`, `productName`, `image`) VALUES
(1, 'Pen', 'Parker QuinkFlow Ballpen Medium Point Black Ink Refill Pack of 6-Refills', '10.99', 0, 'Parker Ballpoint Pen Refills', 'refill1'),
(2, 'Pen', 'Parker QuinkFlow Ballpen Medium Point Blue Ink Refill Pack of 6-Refills', '10.99', 94, 'Parker Ballpoint Pen Refills', 'refill2'),
(3, 'Pen', 'Parker Ballpoint Pen, Refillable, Medium Point Stainless steel barrel', '20.99', 88, 'Parker Ballpoint Pen', 'pen1'),
(4, 'Paper', 'HP Printer Paper, Office Ultra White Copy Paper 10Pack / 5000 Sheets', '62.99', 87, 'HP Printer Paper - 10 Pack', 'paper1'),
(5, 'Paper', 'HP Printer Paper, Multipurpose Ultra White Copy Paper - 3 Pack / 1500 Sheets', '27.99', 86, 'HP Printer Paper - 3 Pack', 'paper2'),
(6, 'Paper', 'HP Printer Paper, 30% Recycled Copy Paper - 1 Ream / 500 Sheets', '16.99', 0, 'HP Printer Paper - 1 Ream', 'paper3'),
(7, 'Paper', 'HP Printer Paper, Office Ultra White Copy Paper - 2500 Sheets / Quick Pack (no ream wrap)', '45.99', 48, 'HP Printer Paper', 'paper4'),
(8, 'Pen', 'BIC Round Stic Ball Pens Stick, Black, Medium Point, Box of 60', '8.99', 97, 'BIC Ball Pen', 'pen4'),
(9, 'Pen', 'Uni_Ball Onyx Rolling Ball Pen -0.5mm Pen Point Size -Black Ink -12/Dozen', '9.99', 95, 'Uni-Ball Pen', 'pen5'),
(10, 'Pen', 'Tombow Fudenosuke Brush Pen 2 Pens Set\r\n<br>', '8.77', 90, 'Tombow Brush Pen', 'pen6'),
(11, 'Pen', 'Tombow Dual Brush Pen Art markers, Bright, 10-Pack', '29.62', 42, 'Tombow Dual Brush Pen', 'pen7'),
(12, 'Pen', 'Tombow Dual Brush Pen Set, 10-Pack, Secondary Colours', '26.75', 47, 'Tombow Dual Brush Pen', 'pen8'),
(13, 'Pen', 'Tombow Twintone Marker Set 12-Pack Dual-Tip, Pastel', '24.35', 50, 'Tombow Twintone Marker', 'pen9'),
(14, 'Paper', 'Rancco 60 Pcs Letter Writing Paper, Assorted Color Writing Stationary Paper printable Kraft Letter Paper', '13.98', 100, 'Rancco 60 Pcs Letter Paper', 'paper5'),
(15, 'Paper', 'IMagicoo 64 Vintage Retro Design Writing Stationery Paper Pad Letter Set', '15.99', 100, 'IMagicoo 64 Vintage Retro Paper', 'paper6'),
(16, 'Paper', '96 Pack marble Stationery Paper - Letterhead - Decorative Design Paper - Double Sided', '26.68', 150, 'Marble Paper 96 Pack', 'paper7'),
(17, 'Paper', 'IMagicoo 50 Cute Design Writing Stationery Lined Paper Pad Letter 2 Set', '11.99', 150, 'IMagicoo 50 Cute Design Paper', 'paper8'),
(18, 'Paper', 'Hilroy Papier Social Stationery Paper, Pack of 10, Kraft', '3.99', 50, 'Hilroy Papier paper 10 Pack', 'paper9'),
(19, 'Paper', '32 Pcs Assorted Color Cute Special Design Writing Paper Letter', '14.99', 150, 'Assorted Color Paper 32 pack', 'paper10'),
(20, 'Paper', 'Deer Design Envelope Smooth Writing Paper Set', '9.77', 200, 'Deer Design Envelope Paper 10 Sets', 'paper11'),
(21, 'Paper', 'Old Fashion Aged Classic Vintage Paper with Envelopes 48 Pack', '28.02', 10, 'Old Fashion Paper Envelope 48 Pack', 'paper12'),
(22, 'Paper', 'Ziye Shop Vintage Retro Design Writing Paper 56 Pcs', '12.99', 33, 'Ziye Vintage Design 56 Pcs', 'paper13'),
(23, 'ColouredPaper', 'A4 Size Assorted Color Copy Printing Papers Pack of 100', '19.99', 90, 'Assorted Colour Paper', 'colouredPaper1'),
(24, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Copper 10 pack', '8.22', 70, 'Activity Glitter Card 10 pack', 'colouredPaper2'),
(25, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Red 10 pack', '12.47', 50, 'Activity Glitter Card 10 pack', 'colouredPaper3'),
(26, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Blue 10 pack', '9.90', 30, 'Activity Glitter Card 10 pack', 'colouredPaper4'),
(27, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Green 10 pack', '9.90', 48, 'Activity Glitter Card 10 pack', 'colouredPaper5'),
(28, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Pink 10 pack', '9.45', 91, 'Activity Glitter Card 10 pack', 'colouredPaper6'),
(29, 'ColouredPaper', 'Premier Stationery 250 GSM Activity Glitter Card - Turquoise 10 pack', '9.84', 93, 'Activity Glitter Card 10 pack', 'colouredPaper7'),
(30, 'ColouredPaper', 'Maruman Color Drawing paper Mitanto A4 10 Sheets Sky Blue', '17.28', 130, 'Maruman Color Paper 10 Sheets', 'colouredPaper8'),
(31, 'ColouredPaper', 'Maruman Color Drawing paper Mitanto A4 10 Sheets Ivy', '17.28', 40, 'Maruman Color Paper 10 Sheets', 'colouredPaper9'),
(32, 'ColouredPaper', 'Maruman Color Drawing paper Mitanto A4 10 Sheets Pearl', '22.60', 150, 'Maruman Color Paper 10 Sheets', 'colouredPaper10'),
(35, 'ColouredPaper', 'Maruman Color Drawing paper Mitanto A4 10 Sheets Black', '15.86', 200, 'Maruman Color Paper 10 Sheets', 'colouredPaper13'),
(36, 'ColouredPaper', 'Maruman Color Drawing paper Mitanto A4 10 Sheets Light Green ', '20.09', 68, 'Maruman Color Paper 10 Sheets', 'colouredPaper14'),
(44, 'ColouredPaper', 'Maruman Color Drawing Paper Mitanto A4 10 Sheets Moonstone', '17.28', 40, 'Maruman Color paper 10 Sheets', 'colouredPaper11'),
(45, 'ColouredPaper', 'Maruman Color Drawing Paper Mitanto A4 10 Sheets Yellow', '15.86', 190, 'Maruman Color paper 10 Sheets', 'colouredPaper12'),
(46, 'GreetingCard', 'Studio Oh! Notecard Set, Woodland Creatures, Box of 12', '16.60', 44, 'Studio Oh! Notecard 12 Set', 'greetingCard1'),
(47, 'GreetingCard', 'Hallmark Boxed Thank You Notes Assortment 40 Sets', '15.30', 50, 'Hallmark Thank You Cards 40 Sets', 'greetingCard2'),
(48, 'GreetingCard', 'American Greetings Pastel Single Panel Cards 80 Sets', '14.84', 60, 'American Greetings Patel Coloured 80 Sets', 'greetingCard3'),
(49, 'GreetingCard', 'Hallmark Assorted Notecards (Stripes, Dots, Flower, Blank Inside) 40 Sets', '24.00', 59, 'Hallmark Assorted Notecards 40 Sets', 'greetingCard4'),
(50, 'GreetingCard', 'Graphique Mint and Gold Flat Notes - Note Card 50 Sets', '28.06', 77, 'Graphique Note Card 50 Sets', 'greetingCard5'),
(51, 'GreetingCard', 'Graphique Pineapple La Petite Presse Notecards, 10 Pack', '22.82', 58, 'Graphique Note Cards 10 Sets', 'greetingCard6'),
(52, 'GreetingCard', 'Leaf Themed Pinter Friendly Letter Size Sheets, 48 Pack', '18.68', 51, 'Leaf A4 Paper 48 Pack', 'greetingCard7'),
(53, 'GreetingCard', 'Elephant Boy Baby Shower Thank You Postcards Set', '25.00', 70, 'Elephant Thank You Postcards', 'greetingCard8'),
(54, 'GreetingCard', 'Elephant Girl Baby Shower Thank You Postcards Set', '25.00', 70, 'Elephant Thank You Postcards', 'greetingCard9'),
(55, 'GreetingCard', 'JINSRAY Cute Lovely Animal Cartoon Design Letter Writing Paper Greeting Card, 12 Pack', '32.01', 90, 'JINSRAY Greeting Card 12 Pack', 'greetingCard10'),
(56, 'GreetingCard', 'Hallmark Thank You Notes (Metallic and Glitter Dots) 40 Sets', '12.69', 40, 'Hallmark Thank You Notes 40 Sets', 'greetingCard11'),
(57, 'GreetingCard', 'Papyrus Silver Border Thank You Boxed Blank Note Cards, 16 Sets', '29.99', 40, 'Papyrus Thank You Note Cards 16 Sets', 'greetingCard13'),
(58, 'GreetingCard', 'Fresh & Lucky Greeting Cards Assortment, 40 Sets', '31.38', 66, 'Greeting Cards 40 Sets', 'greetingCard12'),
(59, 'GreetingCard', 'Cute Christmas Cards Winter Holiday Greeting Cards Assorted 25 Sets', '26.02', 55, 'Christmas Greeting Cards 25 Sets', 'greetingCard14'),
(60, 'GreetingCard', 'American Greeting Pastel Blank Flat Panel Note Cards 100 Sets', '24.06', 44, 'American Greeting Cards 100 Sets', 'greetingCard15'),
(61, 'GreetingCard', 'All Occasion Greeting Cards 25 Sets', '18.62', 50, 'All Occasion Greeting Cards', 'greetingCard16'),
(62, 'GreetingCard', 'Happy Birthday Cards 18 Colourful Designs, 144 pack', '45.37', 10, 'Happy Birthday Cards 144 Pack', 'greetingCard17'),
(63, 'GreetingCard', 'House Warming Congratulations On Your New Home Greeting Cards, 36 Sets', '31.78', 60, 'New Home Greeting Cards 36 Sets', 'greetingCard18'),
(64, 'GreetingCard', 'Assorted All Occasion Greeting Cards, 36 Sets', '31.12', 61, 'Assorted All Occasion Greeting Cards 36 Sets', 'greetingCard19'),
(65, 'StickyNote', 'Redi-Tag-Divider Sticky Notes 60 Ruled Assorted Neon Colours', '10.64', 78, 'Redi_Tag-Divider Pad', 'stickyNote1'),
(66, 'StickyNote', 'Knock Knock High-Five Nifty Note', '8.40', 30, 'High Five Nifty Note', 'stickyNote2'),
(67, 'StickyNote', 'Knock Knock To Accomplish Sticky Packet', '9.15', 10, 'To Accomplish Pad', 'stickyNote3'),
(68, 'StickyNote', 'Merssavo Index Paper Sticker Sticky Notes Bookmark Notebook Memo Pad', '4.69', 91, 'Merssavo Index Sticker', 'stickyNote4'),
(69, 'StickyNote', 'Vann92 Kawaii Computer Style Memo Pad Sticky Notes', '17.61', 783, 'Vann92 Computer Style Sticky Notes', 'stickyNote5'),
(70, 'StickyNote', 'Knock Knock Crap Sticky Note', '4.00', 51, 'Crap Sticky Note', 'stickyNote6'),
(71, 'StickyNote', 'Rrunzfon Coded Arrow Labels Stick Notes Bright Colourful ', '3.09', 40, 'Rrunzfon Arrow Sticky Notes', 'stickyNote7'),
(72, 'StickyNote', 'Milue Gradient Sticky Memo Pad Daily Sticker Note Bookmark Scrapbooking', '5.62', 190, 'Milue Gradient Sticky Memo Pad', 'stickyNote8'),
(73, 'StickyNote', 'Knock Knock Mental Note Sticky Note', '7.20', 81, 'Mental Note Sticky Note', 'stickyNote9'),
(74, 'StickyNote', 'Sticky Notes, 1 1/2 x 2 Inches, Neon Assorted, 100 Sheets, 12 Pads ', '6.40', 1000, 'Sticky Notes', 'stickyNote10'),
(75, 'StickyNote', 'Sipliv Fruit Memo Pad Sticky Notes Self-Stick Notes with a Cute Carrot Gel Ink Pen', '12.79', 71, 'Sipliv Memo Pad & Pen', 'stickyNote11'),
(76, 'StickyNote', 'Floral Design Magnetic Notepad Whiteboard 60 Sheets', '14.16', 44, 'Magnetic Notepad', 'stickyNote12'),
(77, 'StickyNote', 'HOBOYER Desktop Weekly Planner Notepad, Plan Schedule Tear-Off Pages Sticky Note Pads', '3.52', 102, 'HOBOYER Weekly Planner', 'stickyNote13'),
(78, 'StickyNote', 'Cute Cartoon Pattern Sticky Notes 10 Pcs', '3.58', 4011, 'Cartoon Sticky Notes', 'stickyNote14'),
(79, 'StickyNote', 'CoCocina Cute Weekly Plan Paper Scrapbooking Stickers Sticky Note Memo Pad', '7.18', 1093, 'CoCocina Weekly Plan', 'stickyNote15'),
(80, 'StickyNote', 'Solid Colour Memo Pad Stickers Self-Adhesive Sticky Message Notice Notepad 80 Sheets', '2.02', 109, 'Solid Colour Memo Pad', 'stickyNote17'),
(81, 'StickyNote', 'Junlinto Creative Little Prince Memo Pad Weekly Plan Sticky Note', '6.91', 82, 'Junlinto Little Prince Weekly Plan Pad', 'stickyNote16'),
(82, 'StickyNote', 'Leopard Print Sticky Notes Wildlife Animal Theme Design 3 Pack', '13.40', 202, 'Leopard Print Sticky Notes 3 Pack', 'stickyNote18'),
(83, 'StickyNote', 'Cute Animal Cat Sticky Notes Bookmarks Page Flags Index Tabs', '2.92', 103, 'Cat Sticky Notes', 'stickyNote19'),
(84, 'StickyNote', 'Cute Cartoon Snoopys Folding Memo Pad', '21.45', 21, 'Snoopys Folding Memo Pad', 'stickyNote20'),
(85, 'Highlighter', 'Zebra MILDLINER 5-Colour-Set', '18.99', 193, 'Zebra MILDLINER', 'highlighter1'),
(86, 'Highlighter', 'Katoot 6pcs Mini Pill Shaped Highlighter', '9.90', 190, 'Mini Pill Highlighter', 'highlighter2'),
(87, 'Highlighter', 'Zebra MILDLINER Double Sided Highlighter 5-Colour-Set', '8.04', 203, 'Zebra MILDLINER', 'highlighter3'),
(88, 'Highlighter', 'Pilot Frixion Colours 12 Set', '19.10', 29, 'Pilot Frixion 12 Set', 'highlighter4'),
(89, 'Highlighter', 'ArMordy Fine Colour Inkless Markers Pen Crayon highlighter 5pcs', '22.99', 173, 'ArMordy Inkless Crayon', 'highlighter6'),
(90, 'Highlighter', 'Pilot Erasable Highlighter 5 Set', '9.30', 359, 'Pilot Erasable Highlighter', 'highlighter7'),
(91, 'Highlighter', 'Double Head Highlighter Pen Erasable Fluorescent Pen Mildliner Soft Colour Marker Pens 10 Pcs', '7.39', 129, 'Double Head Highlighter', 'highlighter8'),
(92, 'Highlighter', 'Tiptiper Gel Refills Metallic Colours Glitter Sketch Painting 48 Pcs', '8.88', 713, 'Tiptiper Gel Refills', 'highlighter9'),
(93, 'Highlighter', 'Rhfemd Double Headed Highlighter 8 Set Drawing Mark Fluorescent', '5.85', 191, 'Rhfemd Highlighter 8 Set', 'highlighter10');

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `salesId` int(10) NOT NULL,
  `dateTime` datetime NOT NULL,
  `totalPrice` decimal(18,2) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`salesId`, `dateTime`, `totalPrice`, `quantity`) VALUES
(124, '2019-04-04 01:39:43', '115.22', 4),
(125, '2019-04-04 01:53:22', '125.98', 2);

-- --------------------------------------------------------

--
-- Table structure for table `SalesProduct`
--

CREATE TABLE `SalesProduct` (
  `salesId` int(10) NOT NULL,
  `productId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SalesProduct`
--

INSERT INTO `SalesProduct` (`salesId`, `productId`) VALUES
(124, 11),
(124, 5),
(125, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId` (`userId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD KEY `FK_CustomerAddress` (`customerId`);

--
-- Indexes for table `Card`
--
ALTER TABLE `Card`
  ADD KEY `FK_CustomerCard` (`customerId`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `FK_ProductCart` (`productId`),
  ADD KEY `FK_CustomerCart` (`customerId`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `FK_CustomerOrder` (`customerId`),
  ADD KEY `FK_SalesOrder` (`salesId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`salesId`);

--
-- Indexes for table `SalesProduct`
--
ALTER TABLE `SalesProduct`
  ADD KEY `FK_Sales_SalesProduct` (`salesId`),
  ADD KEY `FK_Product_SalesProduct` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cartId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `salesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `FK_CustomerAccount` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `FK_CustomerAddress` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Card`
--
ALTER TABLE `Card`
  ADD CONSTRAINT `FK_CustomerCard` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `FK_CustomerCart` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ProductCart` FOREIGN KEY (`productId`) REFERENCES `Product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `FK_CustomerOrder` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SalesOrder` FOREIGN KEY (`salesId`) REFERENCES `Sales` (`salesId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SalesProduct`
--
ALTER TABLE `SalesProduct`
  ADD CONSTRAINT `FK_Product_SalesProduct` FOREIGN KEY (`productId`) REFERENCES `Product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Sales_SalesProduct` FOREIGN KEY (`salesId`) REFERENCES `Sales` (`salesId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
