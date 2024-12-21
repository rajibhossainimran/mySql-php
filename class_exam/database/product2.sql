-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 06:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_manufacturer` (IN `nam` VARCHAR(100), IN `adde` VARCHAR(100), IN `con` VARCHAR(100))   BEGIN
INSERT INTO manufacturer SET id = null,name=nam,address=adde,contact=con;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_product` (IN `nam` VARCHAR(100), IN `pric` DOUBLE(10,2), IN `manu_id` INT(10))   BEGIN
INSERT INTO
product(id,name,price,manufacturer_id)VALUES(null,nam,pric,manu_id);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `condi_view`
-- (See below for the actual view)
--
CREATE TABLE `condi_view` (
`name` varchar(100)
,`address` varchar(100)
,`contact` varchar(100)
,`p_name` varchar(100)
,`price` double(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_product`
-- (See below for the actual view)
--
CREATE TABLE `display_product` (
`name` varchar(100)
,`address` varchar(100)
,`contact` varchar(100)
,`p_name` varchar(100)
,`price` double(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `address`, `contact`) VALUES
(5, 'tata', 'ind', '38432');

--
-- Triggers `manufacturer`
--
DELIMITER $$
CREATE TRIGGER `delete_manufacturer` AFTER DELETE ON `manufacturer` FOR EACH ROW BEGIN
DELETE FROM product WHERE manufacturer_id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `manufacturer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(9, 'bmw xi32', 200.00, 5);

-- --------------------------------------------------------

--
-- Structure for view `condi_view`
--
DROP TABLE IF EXISTS `condi_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `condi_view`  AS SELECT `display_product`.`name` AS `name`, `display_product`.`address` AS `address`, `display_product`.`contact` AS `contact`, `display_product`.`p_name` AS `p_name`, `display_product`.`price` AS `price` FROM `display_product` WHERE `display_product`.`price` > 5000 ORDER BY `display_product`.`name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_product`
--
DROP TABLE IF EXISTS `display_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_product`  AS SELECT `manufacturer`.`name` AS `name`, `manufacturer`.`address` AS `address`, `manufacturer`.`contact` AS `contact`, `product`.`name` AS `p_name`, `product`.`price` AS `price` FROM (`manufacturer` join `product`) WHERE `manufacturer`.`id` = `product`.`manufacturer_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
