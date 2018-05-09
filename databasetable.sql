-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 12:34 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `Deadline` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`id`, `Name`, `Status`, `created`, `Deadline`) VALUES
(1, 'Craig Dawson', 'Ongoing', '2018-04-04 23:19:00.000000', '2018-04-05 00:19:00.000000'),
(2, 'Craig Dawson', 'Ongoing', '2018-04-15 17:16:49.000000', '2018-04-15 17:16:00.000000'),
(3, 'Bob', 'Ongoing', '2018-04-15 18:25:31.000000', '2018-04-15 18:25:00.000000'),
(4, 'Test Test ', 'Completed', '2018-04-15 18:25:57.000000', '2018-04-15 18:25:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `Tasks`
--

CREATE TABLE `Tasks` (
  `id` int(11) NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Start_Time` datetime(6) NOT NULL,
  `End_Date` datetime(6) NOT NULL,
  `Status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Next_TaskID` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tasks`
--

INSERT INTO `Tasks` (`id`, `Description`, `Start_Time`, `End_Date`, `Status`, `Next_TaskID`, `project_id`) VALUES
(1, 'Test est est ', '2018-04-06 11:08:00.000000', '2018-04-06 11:08:00.000000', 'Ongoing', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Tasks_Users`
--

CREATE TABLE `Tasks_Users` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tasks_Users`
--

INSERT INTO `Tasks_Users` (`id`, `task_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`id`, `Name`, `Description`) VALUES
(1, 'Craig', '');

-- --------------------------------------------------------

--
-- Table structure for table `Teams_Users`
--

CREATE TABLE `Teams_Users` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Role` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 NOT NULL,
  `First_Name` varchar(35) CHARACTER SET utf8 NOT NULL,
  `Surname` varchar(35) CHARACTER SET utf8 NOT NULL,
  `Department` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Job_Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Level` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `First_Name`, `Surname`, `Department`, `Job_Title`, `Level`, `password`) VALUES
(2, 'craig.dawson90@gmail.com', 'Craig', 'Dawson', '', '', 'Admin', '$2y$10$MZ7O15EzEo3qfE17egfKtuc1t0vEUi0MDBoGtiynXkjTL587pZYeS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Prev_TaskID` (`Next_TaskID`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `Tasks_Users`
--
ALTER TABLE `Tasks_Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Teams_Users`
--
ALTER TABLE `Teams_Users`
  ADD PRIMARY KEY (`team_id`,`user_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Tasks_Users`
--
ALTER TABLE `Tasks_Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Tasks`
--
ALTER TABLE `Tasks`
  ADD CONSTRAINT `Task_ibfk_1` FOREIGN KEY (`Next_TaskID`) REFERENCES `Tasks` (`id`),
  ADD CONSTRAINT `Task_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `Projects` (`id`);

--
-- Constraints for table `Teams_Users`
--
ALTER TABLE `Teams_Users`
  ADD CONSTRAINT `Assign_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `Teams` (`id`),
  ADD CONSTRAINT `Assign_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);
