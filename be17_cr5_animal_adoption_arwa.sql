-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 05:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be17_cr5_animal_adoption_arwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `live` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` varchar(500) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `photo`, `live`, `description`, `size`, `age`, `vaccinated`, `status`) VALUES
(1, 'Khao Manee', 'khao-manee.jpg', 'praterstrasse45', 'The Khao Manee is a cat of pure Thai origin, They are very rare outside of Thailand. Because of their rareness and the cost of importing, a Khao Manee kitten from a reputable breeder can set you back somewhere between $7,000–$11,000. The Khao Manee is one of the top 10 most expensive cat breeds in the world.', 'Small', 9, 'vaccinated', 'Availabel'),
(2, 'munchkin', 'munchkin-cat.jpg', 'Linzer Strasse 290', 'Munchkin kittens coming from reputable breeders, with high quality, beautiful bodies and beautiful coat will cost between $1500 and $3500. Since more and more people want to care for this controversial breed, their prices continue to increase.', 'Small', 9, 'Not vaccinated', 'Availabel'),
(3, 'British Shorthair', 'british-shorthair.jpg', 'Margaretengurtel 21', 'Kittens that come from high-titled breeding lines can costs anywhere from $1,500 to $3,000 or more. Prices will vary according to the breeder and the quality, age, and show record, if any, of the cat that you are considering.', 'large', 2, 'vaccinated', 'Not Availabel'),
(4, 'Alaskan Malamute', 'alaskan-malamute.jpg', 'wienerstrasse 68', 'Usually, the average price of an Alaskan Malamute puppy from a reputable breeder is between $1,200 and $2,000, while a top-quality Alaskan Malamute puppy can cost as high as $3,000. Their price depends upon the pup’s age, sex, quality, pedigree, and breeder’s location.', 'large', 9, 'vaccinated', 'Availabel'),
(5, 'Scottish Fold', 'scottish-fold.jpg', 'Austr50', 'Scottish folds get their name from the fact they generally have folded ears. Not every kitten has folded ears, so those who do have this trait are the ones in high demand. Kittens that come from high-titled breeding lines can costs anywhere from $1,500 to $2,500 or more. Prices will vary according to the breeder and the quality, age, and show record, if any, of the cat that you are considering.', 'small', 4, 'vaccinated', 'Not Availabel'),
(6, 'Amazon-Parrot', 'Amazon-Parrot.jpg', 'pratersterm 20', 'Amazon parrots are among the more popular medium-sized parrot species, which might have something to do with their gregarious personalities. They are often described as boisterous, playful, and outgoing — some even like to sing. Male Amazons have a reputation for exhibiting “macho” behavior — they might flare their tail feathers, pin their eyes and “strut” across the floor or table top.', 'large', 3, 'Not vaccinated', 'Availabel'),
(7, 'Blanc de Hotot', 'rabbit-breeds-blanc.jpg', 'diesterweggasse 31', 'Originating from France, the Blanc de Hotot can easily be spotted by its \"black eyeliner\" that contrasts the rest of its white body. As a bonus, these bunnies do well with children and other pets as long as they grow up with them. Dedicated brushing time and taking walks outside are amazing ways to bond with them.', 'small', 4, 'vaccinated', 'Not Availabel'),
(8, 'syrian-hamster', 'syrian-hamster.jpg', 'goldschlagstasse 15', 'Syrian hamsters are the most popular type of pet hamster. They’re also the largest (though they’re still just a few inches long) and therefore the easiest to handle.\r\nSyrian hamsters like to live alone. If you have a hamster already, you’ll have to keep your pets in two separate hamster cages – otherwise you’ll have a fight on your hands!', 'small', 9, 'Not vaccinated', 'Availabel'),
(9, 'Selkirk Rex', 'selkirk-rex.jpg', 'winerstrass 78', 'The Selkirk Rex cat is famous for her thick, curly hair Prices depend upon the coat quality, but also on body type, color and pattern, bloodline, gender, area and breeder.', 'large', 2, 'vaccinated', 'Availabel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first-name` varchar(255) NOT NULL,
  `last-name` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone-number` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `password` int(60) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first-name`, `last-name`, `email`, `phone-number`, `address`, `picture`, `password`, `status`) VALUES
(1, 'arwa', 'arwa', 'arwa1@gmail.com', 681818181, 'wien14', 'admavatar.png', 123123, 'adm'),
(2, 'alrefaai', 'alrefaai', 'alr@gmail.com', 681818181, 'wien14', 'avatar.png', 123456, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
