-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 04:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `repo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `img`, `url`, `repo`, `created_at`) VALUES
(1, 'Movie Project', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be0e17d921.png', 'https://andrewmicheal.github.io/movies-app/#/', 'https://github.com/AndrewMicheal/movies-app', '2021-03-30 18:25:50'),
(2, 'Recipes', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be1c37b4c4.png', 'https://andrewmicheal.github.io/recipes/#/', 'https://github.com/AndrewMicheal/recipes', '2021-03-30 18:25:50'),
(3, 'React template', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be27be8b78.png', 'https://andrewmicheal.github.io/react-template/#/', 'https://github.com/AndrewMicheal/react-template', '2021-03-30 18:25:50'),
(11, 'Bakery Template', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be4308126a.png', 'https://andrewmicheal.github.io/BakeryTemplate/', 'https://github.com/AndrewMicheal/BakeryTemplate', '2021-05-12 16:20:32'),
(12, 'Bezel Template', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be4cfb5cfc.png', 'https://andrewmicheal.github.io/Bezel-Template/', 'https://github.com/AndrewMicheal/Bezel-Template', '2021-05-12 16:23:11'),
(13, 'smart login', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum quod id molestias temporibus atque perferendis distinctio commodi illum? Alias quasi ipsam eaque consectetur at.', '609be53be48ed.png', 'https://andrewmicheal.github.io/Smart-Login-System/', 'https://github.com/AndrewMicheal/Smart-Login-System', '2021-05-12 16:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$xTY9h01NoylKzV8OmA1S7u0kFNEksifQPF7QvDoglN5qV1a/NRdjG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
