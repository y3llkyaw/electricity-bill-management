-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2023 at 07:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `original`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'mgyehtetkyaw@gmail.com', 'p@ssword', 'Yell'),
(4, 'gp2@gmail.com', 'gp2', 'Group 2'),
(5, 'mimyashweyeewin@gmail.com', 'mimya123!@#', 'Mi Mya'),
(6, 'suthirihtun@gmail.com', 'su123!@#', 'Su Thiri'),
(7, 'heinhtetnaing@gmail.com', 'hein1!@#', 'Hein Htet Naing');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `board_id` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `due_date` date NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `bill_amount` int(255) NOT NULL,
  `kw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `board_id`, `start_date`, `end_date`, `due_date`, `paid`, `bill_amount`, `kw`) VALUES
(39, 48, 112233, '2023-06-01', '2023-06-29', '2023-07-03', 1, 6050, 100),
(40, 48, 112233, '2023-06-01', '2023-06-30', '2023-07-05', 1, 42550, 400);

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE `billing_info` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit_card` bigint(20) NOT NULL,
  `billing_address` varchar(300) NOT NULL,
  `noc` varchar(300) NOT NULL,
  `exp` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passcode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`id`, `billing_id`, `user_id`, `credit_card`, `billing_address`, `noc`, `exp`, `date`, `passcode`) VALUES
(25, 39, 48, 1124543455, 'Hmawbi yangon burma', 'Mi Mya Shwe Yee Win', '2023-08-05', '2023-07-03 04:20:11', 2121),
(26, 40, 48, 2134242311221, 'Hleden Yangon Myanmar', 'Mi Mya Shwe Yee Win', '2023-07-29', '2023-07-03 05:06:49', 1231);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Yell Htet Kyaw', 'mgyehtetkyaw@gmail.com', 'Hello'),
(2, 'Yell Htet Kyaw', 'mgyehtetkyaw@gmail.com', 'Hello Team, we want to hire you for the new project.');

-- --------------------------------------------------------

--
-- Table structure for table `electricity_board`
--

CREATE TABLE `electricity_board` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `board_id` bigint(100) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electricity_board`
--

INSERT INTO `electricity_board` (`id`, `user_id`, `board_id`, `type`) VALUES
(6, 48, 112233, 1),
(7, 49, 767111, 1),
(8, 50, 223145, 1),
(9, 51, 123432, 1),
(10, 48, 242423, 0),
(11, 52, 986855, 1),
(12, 53, 657435, 0),
(13, 54, 739292, 1),
(14, 55, 736223, 0),
(15, 56, 738379, 1),
(16, 57, 445359, 0),
(17, 58, 763211, 1),
(18, 59, 665532, 0),
(19, 60, 332298, 1),
(20, 61, 876530, 0),
(21, 62, 887900, 1),
(22, 63, 656679, 0),
(23, 64, 762202, 0),
(24, 65, 564365, 1),
(25, 66, 767755, 0),
(26, 67, 786631, 1),
(27, 68, 882234, 0),
(28, 69, 443325, 1),
(29, 70, 674411, 0),
(30, 71, 554311, 1),
(31, 72, 117688, 0),
(32, 73, 554633, 0),
(33, 74, 761122, 0),
(34, 75, 652231, 1),
(35, 76, 547622, 0),
(36, 77, 908845, 1),
(37, 78, 889011, 0),
(38, 79, 9245378831, 0),
(39, 80, 1245378831, 0),
(40, 81, 121212156333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `solve` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `message`, `user_id`, `date`, `solve`) VALUES
(18, 'Hello ', 60, '2023-06-30 06:14:05', 1),
(19, 'Hello HEllo Hello\r\n', 60, '2023-06-30 06:27:10', 1),
(20, 'HEllo \r\n', 48, '2023-06-30 07:44:43', 1),
(21, 'Hello Teams', 48, '2023-07-02 18:14:42', 1),
(22, 'Hello ', 48, '2023-07-03 04:16:59', 0),
(23, 'Hello \r\n', 48, '2023-07-03 05:09:30', 1),
(24, 'HI\r\n', 48, '2023-07-03 05:23:11', 1),
(25, 'leeeee', 48, '2023-07-03 04:33:43', 0),
(26, 'Hi everything is ok', 48, '2023-07-03 05:03:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `non_residentail_price`
--

CREATE TABLE `non_residentail_price` (
  `id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_residentail_price`
--

INSERT INTO `non_residentail_price` (`id`, `start`, `end`, `price`) VALUES
(1, 1, 500, 125),
(2, 501, 5000, 135),
(3, 5001, 10000, 145),
(5, 10001, 20000, 155),
(6, 20001, 50000, 165),
(7, 50001, 100000, 175),
(8, 100001, 0, 180);

-- --------------------------------------------------------

--
-- Table structure for table `residentail_price`
--

CREATE TABLE `residentail_price` (
  `id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentail_price`
--

INSERT INTO `residentail_price` (`id`, `start`, `end`, `price`) VALUES
(1, 1, 30, 35),
(2, 31, 50, 50),
(3, 51, 75, 70),
(5, 76, 100, 90),
(6, 101, 150, 110),
(7, 151, 200, 120),
(8, 201, 0, 125);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(48, 'Yell Htet Htet', 'mgyehtetkyaw@gmail.com', '$2y$10$bR4d51YDauUgcVJ.iE3dlueAIWW1i0ezlCEOkXGQuShonN1nFvWpi'),
(49, 'Hein Htet Naing', 'hein@gmail.com', '$2y$10$MYCeobuNJObXy4bhZP5zUue9H7qv/qrfRpptiFOvwEqB98/G84FOS'),
(50, 'Mi Mya', 'mimya@gmail.com', '$2y$10$W9FyaietJhqUKxXCDc2eYeLMyPMRxS5P7T4BNlqFGbzHcjbTPqFMm'),
(51, 'Su Thiri', 'su@gmail.com', '$2y$10$/cHfAzVwgUbKglzZlVlPYegM9dtgds2xn.QwEWDej1b4ItBrzAGEy'),
(52, 'Htoo', 'htoo@gmail.com', '$2y$10$wQuUMAs6SbmH3kNQCNl8b.mbfT9JkkkJ8qL4wvvYiyFfLgl93ACWm'),
(53, 'Wunna', 'wunna@gmail.com', '$2y$10$dmTqKeOVIPHy5E5i9/T5/OC6.9qOokBOmtbK.WT03nJME4ED8hHEC'),
(54, 'Aung', 'aung@gmail.com', '$2y$10$WZGFeEtM8y4VMcvyg65n3Oveu0oAzXscqcQhSAa52i860bItzAaqq'),
(55, 'Htoo Wunna', 'htwun@gmail.com', '$2y$10$xfIzNZZoIIyRWQ6aEXbW7eEibKzrv9muwShhI/2LTmFMWm00NfV6a'),
(56, 'Aung Htoo', 'auht@gmail.com', '$2y$10$G//Hmj0x4uaINPlCweqv5.AvwD8Z.6gEjZXOxpqOWxwBnBD/r0z9W'),
(57, 'Kyaw Kyaw', 'kyaw2@gmail.com', '$2y$10$4xpZQ0YhLvmkhV0PeW4p0uO3GuzTmxZXTvmwjFn5zxJgtu75RZ6rO'),
(58, 'Ko Kyaw', 'kokyaw@gmail.com', '$2y$10$lIX4PIjMnrZFkYOte6P/6OD70WouUxsdOSw9buNmpPlxxvNjJMuuW'),
(59, 'Ko San', 'san@gmail.com', '$2y$10$9AmKgkPpJtJhlmVt/jLAy.oVZo2vxNmjejjlbH8NAJIqcf61YWkpe'),
(60, 'San Ko Ko', 'sankoko@gmail.com', '$2y$10$SAJH88DG3lRlrccYOISQcuBrVnvN9uzkviW8NFUYq/qZyu91iqwIG'),
(61, 'Pa Pa', 'papa@gmail.com', '$2y$10$bXDGfghB2WX0NPqGJ33aTOCPF5Y3WLI8bB7hITjuU6cMS9bX8MGaW'),
(62, 'Myint Myint', 'myint@gmail.com', '$2y$10$3CsCx/62SjIXyJcUxN40vum4cKJMuvWewlsp8Jlo5gNnOZQFBjvKu'),
(63, 'Myint Aung', 'myintaung@gmail.com', '$2y$10$Gm5g5wOdjDDq4AnNYgMhseAIQjm.uBpp2gnfWOU1tj8KvCS.PLZee'),
(64, 'Aung Myint', 'aungmyint@gmail.com', '$2y$10$DeYb6rDKFgK7EYKwujroz.LK9I9ZmMjz7I4WEGH/aPzSpYwT7N8Xm'),
(65, 'Lwin Lwin', 'lwin@gmail.com', '$2y$10$NffwIr9zaRl9gs0n482Xr.xphnxhua3NgjWSROXiCp7bOoZcfNEM6'),
(66, 'Moon Moon', 'moon@gmail.com', '$2y$10$mSTg/XIkoTpXQ3ZhUhvIAeXTZr82xqQeLCMCuNrjgBhxPOQ2xX3.C'),
(67, 'Moh Moh', 'moh@gmail.com', '$2y$10$XHwjxROT370XHgGrYwY3TenVDKBsfS6eFFt5Mv4OBzpiL/mFiU2lW'),
(68, 'Hein Hein', 'heing@gmail.com', '$2y$10$hjSbX4TTK1u.TCeVBNH/Bunef5FvDDq.dGWl5PP2ooqxu/MNwcw2.'),
(69, 'Hein Htet', 'hehtet@gmail.com', '$2y$10$zXiUkN6QN5azuPomOmjWluv3IeOxlYRIntTQDZGRhd3xh8jnNMYKa'),
(70, 'Htet Naing', 'nine9@gmail.com', '$2y$10$VjUhODRN2ktyuiDHjjmcMuP4e7YGutlOgTm.ovNliPJdllQr7bkX.'),
(71, 'Yell Yell', 'yell10@gmail.com', '$2y$10$sxrYUN2gj0Gj4D2DUOgiUO37BUwxKBi/mi9JLh4pdk7ZhJ9DKJUHe'),
(72, 'Kyaw Naing', 'kynaing@gmail.com', '$2y$10$UlPNe3JD1t1bkTQX74l/V.GsBzovDwXd6iwYLnvl8fzAzd37rS8L6'),
(73, 'Htet Htet', 'htet2@gmail.com', '$2y$10$PL8k2ois9zSeWy3mMGjl0.2P993qFz/qDAh99.42uLOVB3b7fasjS'),
(74, 'Su Myat', 'sumyat@gmail.com', '$2y$10$5uOzoL4b1qlUhlgg1bG.vO7LBzvs3UNmXfQD9azM1DCUQelvfGwOy'),
(75, 'Thiri Su', 'thirithiri@gmail.com', '$2y$10$BWXesARVQOmR5q5YPB496.DDXJLJSHBdieKrBnSux7jUxVusoiDxS'),
(76, 'Htun Lin', 'htunlin@gmail.com', '$2y$10$T/13ZLC5fEVSk.4puBXkOuFPUZGpnVU8GMLFa8gWoPrWQDnEDLx8G'),
(77, 'Kaung Myat', 'kaungmyat@gmail.com', '$2y$10$.x6jpi3l/WLbWapmbWW.peT/YFpJoVP7XOtxqeMFexXtdvnla21xu'),
(78, 'Hein Kyaw', 'heinkyaw@gmail.com', '$2y$10$oMLxGvUIH.sGr2EtRVEXLehl.8LSAjLZ29XOmqrF3xevISJkT0f2K'),
(79, 'Yell Htet Kyaw', 'mgyedfahtetkyaw@gmail.com', '$2y$10$bZgrG/V3YuINrs2LqyQyS.DrAqEL8Kn8/z2ur.zDWP3lOYuSz6sA6'),
(80, 'Yell Htet Kyaw', 'mgyehdfasdftetkyaw@gmail.com', '$2y$10$lIf87cXKcXCHOxa6aR6XEOsNQWpL86nPj0UxBsT51sAR6DCT0NeiW'),
(81, 'Kyaw Htet Ye Kyaw', 'kyaw@gmail.com', '$2y$10$Fa6gQ0cE6MlwP7z0dhI6QuYXy8A/Sss7dNagQ6f7w1r3zuMI0KMmu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricity_board`
--
ALTER TABLE `electricity_board`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `board_id` (`board_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_residentail_price`
--
ALTER TABLE `non_residentail_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residentail_price`
--
ALTER TABLE `residentail_price`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `billing_info`
--
ALTER TABLE `billing_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `electricity_board`
--
ALTER TABLE `electricity_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `non_residentail_price`
--
ALTER TABLE `non_residentail_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `residentail_price`
--
ALTER TABLE `residentail_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
