SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--
DROP TABLE IF EXISTS `carclassification`;
CREATE TABLE `carclassification` (
  `classificationId` int(10) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
ADD PRIMARY KEY (`classificationId`);

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
MODIFY `classificationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invLocation` varchar(35) DEFAULT NULL,
  `invDealer` varchar(50) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invMmodel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invLocation`, `invDealer`, `invColor`, `classificationID`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!', '/images/jeep-wrangler.jpg', '/images/jeep-wrangler-tn.jpg', '28045', 4, 'Ouray, Colorado', 'Rocky Mountain Offroading', 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it\'s black.', '/images/ford-modelt.jpg', '/images/ford-modelt-tn.jpg', '30000', 2, 'Little Rock, Arkansas', 'Little Rock Motors', 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/images/lambo-Adve.jpg', '/images/lambo-Adve-tn.jpg', '417650', 1, 'Rome, Italy', 'Zues Motors', 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/images/monster.jpg', '/images/monster-tn.jpg', '150000', 3, 'Montrose, Colorado', 'Rocky Mountain Motors', 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/images/ms.jpg', '/images/ms-tn.jpg', '100', 200, 'Delta, Colorado', 'Arvils Used Cars', 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '/images/bat.jpg', '/images/bat-tn.jpg', '65000', 2, 'Gotham City, New York', 'Empire Motors', 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/images/mm.jpg', '/images/mm-tn.jpg', '10000', 12, 'Bethel, New York', 'White Lake Motors', 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/images/fire-truck.jpg', '/images/fire-truck-tn.jpg', '50000', 2, 'Brandon, South Dakota', 'Spartan Motors', 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/images/crown-vic.jpg', '/images/crown-vic-tn.jpg', '10000', 5, 'Honolulu, Hawaii', 'Pineapple Motors', 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/images/camaro.jpg', '/images/camaro-tn.jpg', '25000', 10, 'Las Vegas, Nevada', 'Cactus Motors', 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/images/escalade.jpg', '/images/escalade-tn.jpg', '75195', 4, 'Phoenix, Arizona', 'Cactus Motors', 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/images/hummer.jpg', '/images/hummer-tn.jpg', '58800', 5, 'Denver Colorado', 'Columbine Motors', 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/images/aerocar.jpg', '/images/aerocar-tn.jpg', '1000000', 6, 'Longview, Washimgton', 'Olympas Motors', 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You\'ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/images/fbi.jpg', '/images/fbi-tn.jpg', '20000', 1, 'Washington, D.C.', 'Roosevelt Motors', 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '/images/dog.jpg', '/images/dog-tn.jpg', '35000', 1, 'Aspen Colorado', 'Aspen Motors', 'Brown', 2);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationID` (`classificationID`);
  
  --
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `invId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationID`) REFERENCES `carclassification` (`classificationId`);
  
  
-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

-- CREATE TABLE `clients` (
--   `clientId` int(10) UNSIGNED NOT NULL,
--   `clientFirstname` varchar(15) NOT NULL,
--   `clientLastname` varchar(25) NOT NULL,
--   `clientEmail` varchar(40) NOT NULL,
--   `clientPassword` varchar(255) NOT NULL,
--   `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
--   `comments` text NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `clients`
--
-- ALTER TABLE `clients`
-- ADD PRIMARY KEY (`clientId`);


-- ALTER TABLE `clients`
-- MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

-- ALTER TABLE `clients`
-- ADD UNIQUE (`clientEmail`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
