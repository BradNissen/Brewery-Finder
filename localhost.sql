-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2018 at 04:44 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beer`
--
CREATE DATABASE IF NOT EXISTS `beer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `beer`;

-- --------------------------------------------------------

--
-- Table structure for table `faves`
--

CREATE TABLE `faves` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `www` varchar(45) DEFAULT NULL,
  `stat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faves`
--

INSERT INTO `faves` (`id`, `title`, `street`, `city`, `state`, `zip`, `country`, `phone`, `www`, `stat`) VALUES
(137, 'Big Time Brewery and Alehouse', '4133 University Way NE', 'Seattle', 'WA', '98105', 'United States', '(206) 545-4509', 'bigtimebrewery.com%2F', 'Brewpub'),
(169, 'Blue Corn Cafe and Brewery', '4056 Cerrillos Rd.', 'Santa Fe', 'NM', '87505', 'United States', '(505) 438-1800', 'bluecorncafe.com%2F', 'Brewpub'),
(286, 'Chicago Brewing Company', '2201 South Fort Apache Road', 'Las Vegas', 'NV', '89117', 'United States', '(702) 254-3333', 'chicagobrewingcolv.com', 'Brewpub'),
(408, 'Ellis Island Casino and Brewery', '4178 Koval Lane', 'Las Vegas', 'NV', '89109', 'United States', '(702) 733-8901', 'ellisislandcasino.com%2Fbrew.html', 'Brewpub'),
(412, 'Elysian Tangletown', '2106 N 55th St', 'Seattle', 'WA', '98103', 'United States', '(206) 547-5929', 'elysianbrewing.com%2F', 'Brewpub'),
(1166, 'Santa Fe Brewing Co. Pub and Grill', '27 Fire Place', 'Santa Fe', 'NM', '87508', 'United States', '(505) 424-3333', 'santafebrewing.com%2F', 'Brewpub'),
(1212, 'Sixpoint Craft Ales', '40 Van Dyke St', 'Brooklyn', 'NY', '11231', 'United States', '', 'sixpointcraftales.com%2F', 'Brewery'),
(6730, 'Frog and Rosbif, The', '116 Rue St. Denis', 'Paris', '', '75002', 'France', '+33 1 42363473', 'frogpubs.com', 'Brewpub'),
(9090, 'La Fabrique', '53, rue du Faubourg Saint Antoine', 'Paris', '', '75011', 'France', '01 43 07 67 07', '', 'Brewpub'),
(9092, 'The Frog and British Library', '114, avenue de France', 'Paris', '', '75013', 'France', '01 45 84 34 26', 'frogpubs.com%2F', 'Brewpub'),
(9924, 'Sin City Brewery', '3663 Las Vegas Blvd S', 'Las Vegas', 'NV', '89109', 'United States', '(702) 732-1142', 'sincitybeer.com', 'Brewery'),
(15554, 'Birreria', '200 5th Avenue', 'New York', 'NY', '10010', 'United States', '(212) 937-8910', 'eatalyny.com%2Feat%2Fbirreria', 'Brewpub'),
(15555, 'Bronx Brewery', '856 E 136th St', 'New York', 'NY', '10454', 'United States', '(718) 402-1000', 'thebronxbrewery.com', 'Brewery'),
(17764, 'Wet Head Brewery', '513 A ST NE', 'Auburn', 'WA', '98001', 'United States', '', 'wetheadbrewery.com', 'Brewery'),
(18491, 'Banger Brewing', '450 Fremont St Suite 135', 'Las Vegas', 'NV', '89101', 'United States', '(702) 456-2739', 'bangerbrewing.com', 'Brewery'),
(18539, 'Paulaner NYC Brauhaus and Restaurant', '265 Bowery', 'New York', 'NY', '10002', 'United States', '(212) 780-0300', 'paulaner-brauhaus.com%2Fnyc', 'Brewpub'),
(19873, 'Hop Nuts Brewing', '1120 S Main St #150', 'Las Vegas', 'NV', '89104', 'United States', '(702) 816-5371', 'hopnutsbrewing.com', 'Brewery'),
(20688, 'Tenaya Creek Brewery', '831 W Bonanza Rd', 'Las Vegas', 'NV', '89106', 'United States', '702-362-7335', 'tenayacreek.com', 'Brewery'),
(21151, 'Paname Brewing Company', '41 bis Quai de la Loire', 'Paris', '', '', 'France', '01 40 36 43 55', 'panamebrewingcompany.com', 'Brewpub'),
(21881, 'Rowley Farmhouse Ale', '1405 Maclovia St.', 'Santa Fe', 'NM', '87505', 'United States', '505-428-0719', 'rowleyfarmhouse.com', 'Brewery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faves`
--
ALTER TABLE `faves`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
