-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2022 at 05:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal_adopt`
--
CREATE Database animal_adopt;
USE animal_adopt;

-- --------------------------------------------------------

--
-- Table structure for table `adoptionR`
--

CREATE TABLE `adoptionR` (
  `userID` int(5) NOT NULL,
  `animalName` varchar(50) NOT NULL,
  `animalSP` varchar(50) NOT NULL,
  `adoptedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animalBI`
--

CREATE TABLE `animalBI` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sp_name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL CHECK (`gender` in ('F','M')),
  `age` int(3) NOT NULL CHECK (`age` > 0),
  `ad_sts` varchar(50) NOT NULL DEFAULT 'waiting',
  `descrip` varchar(1000) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalBI`
--

INSERT INTO `animalBI` (`id`, `name`, `sp_name`, `gender`, `age`, `ad_sts`, `descrip`, `img`) VALUES
(1, 'Fin', 'Fox', 'M', 2, 'waiting', 'Fin is a fennic with a wild side, always running around from place to place.Though a sweetheart through and through as he will always come running to his owner for attention. A great animal for any family with an active lifestyle.', 'Fin.jpg'),
(2, 'Sky', 'Dog', 'F', 9, 'waiting', 'A Husky with a big heart, Sky was sadly left here when her last family could not keep her due to financial issues. She is already house trained and very friendly towards other animals, especially other dogs. She is a perfect senior dog for those who want a companion to relax with.', 'Sky.jpg'),
(3, 'Bosco', 'dog', 'M', 1, 'waiting', 'Bosco is what is known as a shepsky. A german shepard/Husky mix with a big heart and a playful demeanor. A wonderful animal that absolutely loves kids. This dog would be perfect for anyone looking for a great family pet as well as a protector.', 'Bosco.jpg'),
(4, 'Cleopatra', 'cat', 'F', 3, 'waiting', 'Cleopatra is a prime example of lap cat. A beautiful siamese that is very talkative. This wonderful girl is an absolute gem with families and other pets she does especially well with dogs. A perfect cat for those wanting a furry friend.', 'Cleopatra.jpg'),
(5, 'Patches', 'cat', 'M', 11, 'waiting', 'a sweet old man,Patches is a tortishell thats a prime example of a senior cat that needs some love. He is here due to a tragedy with loosing owner. He especially loves to snuggle up to those around him and is a great companion for those looking for those who wish to spoil their cat.', 'Patches.jpg'),
(6, 'Ebony', 'snake', 'F', 4, 'waiting', 'A snake that loves to be warm and toasty. Ebony is a fine example of an animal that breaks stereotypes she loves humans and is always wanting to learn more with her curious and friendly demeanor. The sweater she is wearing as seen in the picture is her favorite as she always wants to slither up inside and get warm, over all a great animal for those looking to get into snakes. ', 'Ebony.jpg'),
(7, 'Roberto', 'reptile', 'M', 3, 'waiting', 'While most wouldn\'t talk about Roberto. We certainly are! This wonderful bearded dragon male is a great pet for those looking to adopt a great companion. he absolutely loves to be carried around on your shoulder and just watch the day go by. He also loves his reflection and will spend hours looking at himself in the mirror. ', 'Roberto.jpg'),
(8, 'Peko', 'raccoon', 'F', 5, 'waiting', 'Although Raccoons usually cannot be kept as pets. This beautiful Raccoon sadly can not return to the wild due to being used to humans. As such she is here at our facility for adoption. She has a wonderful demanor and is very hands on. Please note that in order to adopt her, you must be in a state that allows for you to adopt them. At the same time. She needs a serious pet owner who has experience.', 'Peko.jpg'),
(9, 'King', 'lion', 'M', 6, 'waiting', 'King is of course the king of the jungle and our hearts. King here is a prime example of a wild animal that isn\'t wild and is a sweetheart at heart. he is very friendly towards everyone and  is perfect for those wanting to take him into their pride. ', 'King.jpg'),
(10, 'Rajah', 'tiger', 'F', 7, 'waiting', 'Resuced from a circus, Rajah is a sweet and caring tiger that needs a good home to take care of her. She is super smart and a wonderful example of a beautiful animal. She is a handful however and requires those who are super willing and able to spend time with her.', 'Rajah.jpg'),
(11, 'Nana', 'elephant', 'F', 15, 'waiting', 'rescued from the same circus as Rajah, Nana is a beautiful animal that has a lot of seniority, she is always there to hang out and a loveable elephant that absolutely loves children letting them ride on top of her. She is a great animal that needs a caring home and one with plenty of space', 'Nana.jpg'),
(12, 'Biggie Cheese', 'rodent', 'M', 1, 'waiting', 'Despite his name, Biggie Cheese is indeed not big at all. In fact he is a sweet little baby that loves to be picked up and held. A great starting pet for any young kid looking to keep their first pet. Biggie also has a small teddy bear he keeps around when he wants to play. Overall a wonderful friend for any family. ', 'Cheese.jpg'),
(13, 'Sally', 'rodent', 'F', 1, 'waiting', 'Sally has always been an explorer at a young age. Learning and wanting to explore around her cage. Sally has always loved those who put her on her shoulder and walk with her. Another great pet rat for any young kid looking to keep their first pet. She is a fine example of a furry friend for life. ', 'Sally.jpg'),
(14, 'Ingot', 'cat', 'M', 2, 'waiting', 'A sweet furball, Ingot was found abandoned a nearby broken down building. Sadly due to complications he has lost an eye due to infection. Despite this however he is as lively and as playful as any other young cat. He loves everyone especially those who will rub behind his ears. He is a great family cat and a wonderful playmate for any child or child at heart. ', 'Ingot.jpg'),
(15, 'Charlie', 'dog', 'M', 3, 'waiting', 'A sweet dachshund with a big heart and plenty of energy. Charlie was a wild dog living on the street until he was brought in due to an accident. Unfortantly he lost his leg however this does not slow him down. In fact charlie doesn\'t even seem to notice and is quite the little fighter. He is quick and nimble and loves other animals. He also loves children and is always wanting to play. A perfect family friend for anyone and a great example to show that despite his disabilty he is always a great friend. ', 'Charlie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `sp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`sp_name`) VALUES
('cat'),
('dog'),
('elephant'),
('fox'),
('lion'),
('penguin'),
('raccoon'),
('reptile'),
('rodent'),
('snake'),
('tiger'),
('turtle');

-- --------------------------------------------------------

--
-- Table structure for table `userInfo`
--

CREATE TABLE `userInfo` (
  `userID` int(5) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(30) NOT NULL CHECK (`passwd`  not like `userName`),
  `birthDate` date NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userInfo`
--

INSERT INTO `userInfo` (`userID`, `userName`, `email`, `passwd`, `birthDate`, `role`) VALUES
(1, 'root', '111@gmail.com', 'justadopt', '1990-09-10', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptionR`
--
ALTER TABLE `adoptionR`
  ADD KEY `userID` (`userID`),
  ADD KEY `animalSP` (`animalSP`),
  ADD KEY `animalName` (`animalName`);

--
-- Indexes for table `animalBI`
--
ALTER TABLE `animalBI`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sp_name` (`sp_name`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`sp_name`),
  ADD UNIQUE KEY `sp_name` (`sp_name`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animalBI`
--
ALTER TABLE `animalBI`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userInfo`
--
ALTER TABLE `userInfo`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
