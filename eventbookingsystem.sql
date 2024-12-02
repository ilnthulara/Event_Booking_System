-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 07:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventbookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `seats_booked` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `customer_name`, `customer_email`, `seats_booked`, `booking_date`) VALUES
(1, 1, 'Alice Johnson', 'alice@gmail.com', 2, '2024-11-12 22:33:31'),
(2, 3, 'Bob Carter', 'bobcarter@yahoo.com', 1, '2024-11-12 22:33:31'),
(3, 4, 'Charlie Adams', 'charlie.adams@outlook.com', 5, '2024-11-12 22:33:31'),
(4, 2, 'Diana Stewart', 'diana.stewart@gmail.com', 1, '2024-11-12 22:33:31'),
(5, 5, 'Ethan Wright', 'ethan.wright@hotmail.com', 4, '2024-11-12 22:33:31'),
(6, 1, 'Nethmi Ilangamge', 'nethu0905@gmail.com', 2, '2024-11-12 22:34:06'),
(7, 3, 'Kate Johnson', 'katejohn@gmail.com', 4, '2024-11-12 22:42:27'),
(8, 5, 'Kate Johnson', 'katejohn@gmail.com', 1, '2024-11-12 22:46:32'),
(9, 4, 'John Doe', 'johndoe123@gmail.com', 2, '2024-11-12 22:48:06'),
(10, 2, 'Kate Johnson', 'katejohn@gmail.com', 1, '2024-11-13 00:22:44'),
(11, 4, 'Anne Atkinson', 'anneatkinson95@yahoo.com', 5, '2024-11-13 06:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `venue`, `total_seats`) VALUES
(1, 'Concert: The Night Beats', '2024-12-15', 'City Hall Auditorium', 198),
(2, 'Tech Workshop: AI Basics', '2024-12-20', 'Innovation Hub', 49),
(3, 'Art Exhibition: Modern Art', '2024-11-25', 'Downtown Gallery', 96),
(4, 'Food Fest: Global Cuisine', '2024-11-30', 'Central Park', 493),
(5, 'Theatre: Hamlet Reimagined', '2024-12-10', 'State Theatre', 149);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
