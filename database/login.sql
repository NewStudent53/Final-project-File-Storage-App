-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2024 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `nombre_archivo` varchar(255) NOT NULL,
  `archivo` longblob NOT NULL,
  `tipo_archivo` varchar(100) NOT NULL,
  `tamano_archivo` int(11) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archivos`
--

INSERT INTO `archivos` (`nombre_archivo`, `archivo`, `tipo_archivo`, `tamano_archivo`, `id_user`) VALUES
('TABLERO.txt', 0x372033362036312038322032203430203137203431203936203837200a0d33332038203338203834203130203331203230203932203739203733200a0d31372037382034372031372034302034302033352038302037203834200a0d37362033203531203339203135203631203933203131203430203537200a0d3333203738203730203737203335203733203233203338203935203136200a0d3633203431203734203335203338203331203734203135203333203635200a0d31203136203630203237203433203138203630203334203834203138200a0d3834203835203937203233203137203835203135203833203139203936200a0d37382037203638203235203331203230203838203731203834203436200a0d3420383320373420383520362038203534203939203736203637200a0d, 'text/plain', 310, 0),
('PRUEBA.txt', 0x4a6f7267650d0a4c7569730d0a45646761720d0a506564726f0d0a, 'text/plain', 310, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `trash_indicator` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `file_name`, `file_type`, `file_path`, `upload_date`, `trash_indicator`) VALUES
(4, 32, 'styles.css', 'css', 'userfiles/user_32/', '2024-08-16 15:53:56', b'0'),
(21, 30, 'Captura de pantalla 2024-06-17 142431.png', 'png', 'userfiles/user_30/', '2024-08-19 23:10:05', b'1'),
(22, 30, 'Apuntes de Algoritmos.pdf', 'pdf', 'userfiles/user_30/', '2024-08-19 23:10:35', b'0'),
(23, 30, 'Parcial1-1 Algoritmo.jpg', 'jpg', 'userfiles/user_30/', '2024-08-19 23:37:14', b'1'),
(26, 34, 'Apuntes de Algoritmos.pdf', 'pdf', 'userfiles/user_34/', '2024-08-20 00:32:03', b'0'),
(28, 34, 'Parcial1-1 Algoritmo.jpg', 'jpg', 'userfiles/user_34/', '2024-08-20 00:37:49', b'0'),
(29, 35, 'Carta de Residencia Residente - Carlos Ramírez.docx', 'docx', 'userfiles/user_35/', '2024-08-20 00:53:15', b'0'),
(30, 35, 'despues de subida.png', 'png', 'userfiles/user_35/', '2024-08-20 00:54:12', b'0'),
(31, 35, 'BIT BYTE -Definicion.PNG', 'PNG', 'userfiles/user_35/', '2024-08-20 00:55:15', b'0'),
(32, 35, 'results english.png', 'png', 'userfiles/user_35/', '2024-08-20 00:55:36', b'0'),
(33, 35, 'TODAY.png', 'png', 'userfiles/user_35/', '2024-08-20 00:57:27', b'0'),
(44, 24, 'dat.guimodule-part1.png', 'png', 'userfiles/user_24/', '2024-08-21 01:05:31', b'0'),
(47, 24, 'dat.guimodule-part2.png', 'png', 'userfiles/user_24/', '2024-08-21 01:20:59', b'0'),
(48, 24, 'dat.guimodule-new.png', 'png', 'userfiles/user_24/', '2024-08-21 01:21:05', b'0'),
(49, 24, 'Final Project User Stories & Wireframes.pdf', 'pdf', 'userfiles/user_24/', '2024-08-21 01:21:27', b'0'),
(54, 40, 'Final Project User Stories & Wireframes.pdf', 'pdf', 'userfiles/user_40/', '2024-08-21 03:44:25', b'0'),
(55, 40, 'happy-happy.jpg', 'jpg', 'userfiles/user_40/', '2024-08-21 03:44:34', b'0'),
(58, 24, 'documento paginafilemanager.docx', 'docx', 'userfiles/user_24/', '2024-08-22 03:01:17', b'0'),
(59, 24, 'Exportar una base de datos MYSQL desde PHPMyAdmin - guillermo L.pdf', 'pdf', 'userfiles/user_24/', '2024-08-22 03:03:42', b'0'),
(61, 44, 'Exportar una base de datos MYSQL desde PHPMyAdmin - guillermo L.pdf', 'pdf', 'userfiles/user_44/', '2024-08-26 00:32:56', b'0'),
(62, 44, 'descargas.pdf', 'pdf', 'userfiles/user_44/', '2024-08-26 01:04:16', b'0'),
(63, 44, 'app.js', 'js', 'userfiles/user_44/', '2024-08-26 01:25:27', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confimpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `lastName`, `email`, `password`, `confimpassword`) VALUES
(1, 'a', 'a', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', ''),
(2, 'test', 'test', 'test@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(19, 'test', '', 'testq@gmail.com', 'dd019d2558f6e70837033950dbfe587a', ''),
(21, 'prueba', '', 'prueba@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(24, '1', '', '123@gmail.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(25, 'TestAtenea', '', 'atenea@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(26, 'ILikeRH', '', 'fdamata@msf.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(27, 'Atenea', '', 'atenea2@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(28, 'maria', '', 'maria@gmail.com', '0f359740bd1cda994f8b55330c86d845', ''),
(29, 'username', '', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', ''),
(30, 'jose', '', 'jose@gmail.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(31, 'pruebaAtenea', '', 'atenea3@gmail.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(32, 'correo', '', 'mariana@ateneamercantil.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(33, '1', '', '098@gmail.com', '1816ac0b4bf213b0cfaacd48b6127f12', ''),
(34, 'Fatima Da Mata De Nobrega', '', 'fatidamata@gmail.com', '2c68c7155ea84c0a056bb40d405dcb26', ''),
(35, 'Manuela Sanchez', '', 'manuela@gmail.com', 'fed2faa9aea3fb0314ce4b71dd4d5cf2', ''),
(38, 'test456', '', 'test456@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(39, 'test457', '', 'test457@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(40, 'Tester', '', 'gsrd2803@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(41, 'testatenea', '', 'testatenea@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(42, 'test', '', 'test4572@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(43, 'test123456789', '', 'new@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', ''),
(44, 'wqaesrdft', '', 'pruebas@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
