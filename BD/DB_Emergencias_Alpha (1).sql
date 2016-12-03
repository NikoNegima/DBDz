-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2016 at 01:20 AM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_Emergencias_Alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rut_admin` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `last_name_first` varchar(15) NOT NULL,
  `last_name_second` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `residency` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communes`
--

CREATE TABLE `communes` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `emergency_in_progress` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communes_volunteers`
--

CREATE TABLE `communes_volunteers` (
  `commune_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `commune_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(20) NOT NULL,
  `severity` varchar(15) NOT NULL,
  `description` text,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rut_manager` varchar(15) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `last_name_first` varchar(15) NOT NULL,
  `last_name_second` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `residency` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `emergency_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `mission_name` varchar(15) NOT NULL,
  `volunteer_amount` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `detail` text,
  `urgency_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `skill_type` varchar(15) NOT NULL,
  `skill_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills_volunteers`
--

CREATE TABLE `skills_volunteers` (
  `volunteer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `domain_degree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL,
  `task_name` varchar(20) NOT NULL,
  `volunteer_amount` int(11) NOT NULL,
  `task_status` varchar(10) NOT NULL,
  `guide_doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_tools`
--

CREATE TABLE `tasks_tools` (
  `task_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `attributes` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `rut_volunteer` varchar(15) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `last_name_first` varchar(15) NOT NULL,
  `last_name_second` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `residency` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `disponibility` tinyint(1) NOT NULL,
  `performance_area` varchar(15) NOT NULL,
  `experience` int(11) DEFAULT '0',
  `phone` varchar(20) NOT NULL,
  `actual_ubication` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_24` (`user_id`);

--
-- Indexes for table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEFINE_` (`admin_id`),
  ADD KEY `FK_TIENE1` (`region_id`);

--
-- Indexes for table `communes_volunteers`
--
ALTER TABLE `communes_volunteers`
  ADD PRIMARY KEY (`commune_id`,`volunteer_id`),
  ADD KEY `FK_DECLARA_2` (`volunteer_id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEFINE_ACTUALIZA` (`admin_id`),
  ADD KEY `FK_OCURREN` (`commune_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEFINE` (`admin_id`),
  ADD KEY `FK_RELATIONSHIP_22` (`user_id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEFINE_DECLARA` (`admin_id`),
  ADD KEY `FK_ES_ASIGNADO2` (`manager_id`),
  ADD KEY `FK_SE_COMPONE_DE` (`emergency_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_REALIZA_RECIBE` (`volunteer_id`),
  ADD KEY `FK_RECIBE_REALIZA` (`manager_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEFINidAS_POR` (`manager_id`);

--
-- Indexes for table `skills_volunteers`
--
ALTER TABLE `skills_volunteers`
  ADD PRIMARY KEY (`volunteer_id`,`skill_id`),
  ADD KEY `FK_POSEE` (`skill_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DECLARA_DEFINE` (`manager_id`),
  ADD KEY `FK_SE_COMPONE` (`mission_id`);

--
-- Indexes for table `tasks_tools`
--
ALTER TABLE `tasks_tools`
  ADD PRIMARY KEY (`task_id`,`tool_id`),
  ADD KEY `FK_SE_OCUPA` (`tool_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_REALIZA` (`task_id`),
  ADD KEY `FK_RELATIONSHIP_23` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `FK_DEFINE_` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_TIENE1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `communes_volunteers`
--
ALTER TABLE `communes_volunteers`
  ADD CONSTRAINT `FK_DECLARA_` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`),
  ADD CONSTRAINT `FK_DECLARA_2` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteers` (`id`);

--
-- Constraints for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD CONSTRAINT `FK_DEFINE_ACTUALIZA` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_OCURREN` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `FK_DEFINE` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `FK_DEFINE_DECLARA` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_ES_ASIGNADO2` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`),
  ADD CONSTRAINT `FK_SE_COMPONE_DE` FOREIGN KEY (`emergency_id`) REFERENCES `emergencies` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_REALIZA_RECIBE` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteers` (`id`),
  ADD CONSTRAINT `FK_RECIBE_REALIZA` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FK_DEFINidAS_POR` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`);

--
-- Constraints for table `skills_volunteers`
--
ALTER TABLE `skills_volunteers`
  ADD CONSTRAINT `FK_DECLARA` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteers` (`id`),
  ADD CONSTRAINT `FK_POSEE` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `FK_DECLARA_DEFINE` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`),
  ADD CONSTRAINT `FK_SE_COMPONE` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`);

--
-- Constraints for table `tasks_tools`
--
ALTER TABLE `tasks_tools`
  ADD CONSTRAINT `FK_SE_OCUPA` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`),
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `FK_REALIZA` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
