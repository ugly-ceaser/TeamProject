-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 03:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trx_type` varchar(200) NOT NULL,
  `trx_id` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `trx_type`, `trx_id`, `amount`, `status`, `date`) VALUES
(1, 4, 'deposit', 'Trxv9kufocpaa', 0, 'pending', '2023-05-25 14:00:32.176791'),
(3, 4, 'deposit', 'Trxm2yb5qyie5', 100, 'pending', '2023-05-25 14:00:32.176791'),
(4, 4, 'deposit', 'Trximvbu18q4i', 300, 'pending', '2023-05-25 14:00:32.176791'),
(5, 4, 'deposit', 'Trxxer26ewedk', 500, 'pending', '2023-05-25 14:01:46.954288'),
(6, 4, 'withdraw', 'Trxqturz6oczm', 200, 'pending', '2023-05-25 14:05:34.806038'),
(7, 4, 'withdraw', 'Trx2omf9db3ln', 350, 'pending', '2023-05-25 16:22:03.460742'),
(8, 4, 'deposit', 'Trxbo2a0a6lkc', 3500, 'pending', '2023-05-28 14:01:55.154452'),
(9, 4, 'withdraw', 'Trxh63zo22ugr', 800, 'pending', '2023-05-28 14:02:21.390944'),
(10, 8, 'withdraw', 'Trxn3g9bhdyhe', 310, 'pending', '2023-05-30 10:30:34.942284'),
(11, 8, 'deposit', 'Trxjtnb4oy40p', 2, 'pending', '2023-05-30 10:33:05.795042');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `user_password` varchar(250) NOT NULL,
  `user_image` varchar(250) NOT NULL DEFAULT 'd256e8494750efbcab3f4cde67fc1dc1.webp',
  `firstname` varchar(230) NOT NULL,
  `lastname` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_email`, `balance`, `user_password`, `user_image`, `firstname`, `lastname`) VALUES
(1, 'Kamsi', 'ckamsi04@gmail.com', 0, 'Kamsi', '', '', ''),
(2, 'Kamsi', 'ckamsi04@gmail.com', 0, 'aGVrTDBRaTVnTWI3YXpJSnJtNzJvZz09', '', '', ''),
(3, 'Kamsi', 'ckamsi04@gmail.com', 0, 'aGVrTDBRaTVnTWI3YXpJSnJtNzJvZz09', '', '', ''),
(4, 'Chimdyke Kamsi', 'chidi@k.com', 0, 'L24rUWVGcUdVNVpVZ2dVRCtkTVEzVjQ4RzZWVHRNczR1eUxqa3BIRFV2bz0=', '4_1685438541.png', 'Anagboso', 'Chimdike'),
(5, 'kamsi', 'kamsi04@g', 0, 'MGZHd1lmRkdOaHJtcGdZRU5vL2krdz09', '', '', ''),
(6, 'sophie', 'sophi@s', 0, 'aWxXUzFWK3J6REZWWkxRdHFXNVRydz09', '', '', ''),
(7, 'kamsi', 'kamsi@g', 0, 'MGZHd1lmRkdOaHJtcGdZRU5vL2krdz09', '', '', ''),
(8, 'Ugly Ceaser', 'uglyceaser@gmail.com', 0, 'THl2NkM0RDEyR0l4b2tzVjhIcm84Zz09', '8_1685439009.png', 'Martins', 'Onyia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
