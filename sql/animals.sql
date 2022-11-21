-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: Nov 16, 2022 at 03:45 PM

-- Server version: 10.4.21-MariaDB

-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `sql12575953`

--

-- --------------------------------------------------------

USE `animal_adopt`;

--

-- Table structure for table `adoptionR`

--

CREATE TABLE
    `adoptionR` (
        `userID` int(5) NOT NULL,
        `animalName` varchar(50) NOT NULL,
        `animalSP` varchar(50) NOT NULL,
        `adoptedDate` date NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `animalBI`

--

CREATE TABLE
    `animalBI` (
        `name` varchar(50) NOT NULL,
        `sp_name` varchar(50) NOT NULL,
        `gender` varchar(1) NOT NULL CHECK (`gender` in ('F', 'M')),
        `age` int(3) NOT NULL CHECK (`age` > 0),
        `ad_sts` varchar(50) NOT NULL CHECK (
            `ad_sts` in ('adopted', 'waiting')
        )
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `animalBI`

--

INSERT INTO
    `animalBI` (
        `name`,
        `sp_name`,
        `gender`,
        `age`,
        `ad_sts`
    )
VALUES (
        'black',
        'snake',
        'M',
        1,
        'waiting'
    ), ('dodo', 'cat', 'M', 5, 'waiting'), (
        'king',
        'lion',
        'M',
        2,
        'waiting'
    ), (
        'luna',
        'tiger',
        'F',
        3,
        'waiting'
    ), (
        'nana',
        'elephant',
        'F',
        10,
        'waiting'
    ), (
        'peko',
        'raccoon',
        'F',
        3,
        'waiting'
    ), (
        'shana',
        'dog',
        'F',
        4,
        'waiting'
    ), (
        'shiro',
        'dog',
        'M',
        2,
        'waiting'
    );

-- --------------------------------------------------------

--

-- Table structure for table `paymentInfo`

--

CREATE TABLE
    `paymentInfo` (
        `userID` int(5) NOT NULL,
        `cardNum` int(19) NOT NULL,
        `expireM` int(2) NOT NULL CHECK (
            `expireM` < 13
            and `expireM` > 0
        ),
        `expireY` int(4) NOT NULL CHECK (`expireY` > 2022)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `safetyQ`

--

CREATE TABLE
    `safetyQ` (
        `ind` int(1) NOT NULL,
        `Question` varchar(100) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `species`

--

CREATE TABLE
    `species` (`sp_name` varchar(50) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `species`

--

INSERT INTO
    `species` (`sp_name`)
VALUES ('cat'), ('dog'), ('elephant'), ('lion'), ('penguin'), ('raccoon'), ('snake'), ('tiger'), ('turtle');

-- --------------------------------------------------------

--

-- Table structure for table `userInfo`

--

CREATE TABLE
    `userInfo` (
        `userID` int(5) NOT NULL,
        `userName` varchar(30) NOT NULL,
        `email` varchar(50) NOT NULL,
        `passwd` varchar(30) NOT NULL CHECK (`passwd` not like `userName`),
        `birthDate` date NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `userQA`

--

CREATE TABLE
    `userQA` (
        `userID` int(5) NOT NULL,
        `Q_ind` int(1) NOT NULL,
        `Ans` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Indexes for dumped tables

--

--

-- Indexes for table `adoptionR`

--

ALTER TABLE `adoptionR`
ADD KEY `userID` (`userID`),
ADD
    KEY `animalSP` (`animalSP`),
ADD
    KEY `animalName` (`animalName`);

--

-- Indexes for table `animalBI`

--

ALTER TABLE `animalBI`
ADD
    PRIMARY KEY (`name`, `sp_name`),
ADD KEY `sp_name` (`sp_name`);

--

-- Indexes for table `paymentInfo`

--

ALTER TABLE `paymentInfo`
ADD
    UNIQUE KEY `cardNum` (`cardNum`),
ADD KEY `userID` (`userID`);

--

-- Indexes for table `safetyQ`

--

ALTER TABLE `safetyQ` ADD UNIQUE KEY `ind` (`ind`);

--

-- Indexes for table `species`

--

ALTER TABLE `species`
ADD PRIMARY KEY (`sp_name`),
ADD
    UNIQUE KEY `sp_name` (`sp_name`);

--

-- Indexes for table `userInfo`

--

ALTER TABLE `userInfo`
ADD PRIMARY KEY (`userID`),
ADD
    UNIQUE KEY `userName` (`userName`),
ADD UNIQUE KEY `email` (`email`);

--

-- Indexes for table `userQA`

--

ALTER TABLE `userQA`
ADD KEY `userID` (`userID`),
ADD KEY `Q_ind` (`Q_ind`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `safetyQ`

--

ALTER TABLE `safetyQ` MODIFY `ind` int(1) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `userInfo`

--

ALTER TABLE
    `userInfo` MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `adoptionR`

--

ALTER TABLE `adoptionR`
ADD
    CONSTRAINT `adoptionr_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userInfo` (`userID`),
ADD
    CONSTRAINT `adoptionr_ibfk_2` FOREIGN KEY (`animalSP`) REFERENCES `species` (`sp_name`),
ADD
    CONSTRAINT `adoptionr_ibfk_3` FOREIGN KEY (`animalName`) REFERENCES `animalBI` (`name`);

--

-- Constraints for table `animalBI`

--

ALTER TABLE `animalBI`
ADD
    CONSTRAINT `animalbi_ibfk_1` FOREIGN KEY (`sp_name`) REFERENCES `species` (`sp_name`);

--

-- Constraints for table `paymentInfo`

--

ALTER TABLE `paymentInfo`
ADD
    CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userInfo` (`userID`);

--

-- Constraints for table `userQA`

--

ALTER TABLE `userQA`
ADD
    CONSTRAINT `userqa_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userInfo` (`userID`),
ADD
    CONSTRAINT `userqa_ibfk_2` FOREIGN KEY (`Q_ind`) REFERENCES `safetyQ` (`ind`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;