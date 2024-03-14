-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 08:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_unklab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_history`
--

CREATE TABLE `tbl_attendance_history` (
  `id_class` varchar(100) NOT NULL,
  `id_attendance` varchar(100) NOT NULL,
  `email_student` varchar(50) NOT NULL,
  `name_subject` varchar(150) NOT NULL,
  `email_lecturer` varchar(50) NOT NULL,
  `student_lat` varchar(30) NOT NULL,
  `student_long` varchar(30) NOT NULL,
  `distance` varchar(25) NOT NULL,
  `time_take_attendance` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance_history`
--

INSERT INTO `tbl_attendance_history` (`id_class`, `id_attendance`, `email_student`, `name_subject`, `email_lecturer`, `student_lat`, `student_long`, `distance`, `time_take_attendance`, `status`, `note`, `created_at`) VALUES
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's354321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '10', '10:15:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's154321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '16', '10:00:49', 'P', '', '2023-04-13\r\n22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's254321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '12', '10:05:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's354321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '20', '10:08:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's454321@student.unklab.ac.id', 'Artificial\r\nIntelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '15', '10:20:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's554321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '6', '10:30:49', 'P', '', '2023-04-13\r\n22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's644321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '7', '10:45:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643ac4d56e4a8', 'ATD745ac4d56e4b7', 's654321@student.unklab.ac.id', 'Artificial Intelligence', 'semmy@unklab.ac.id', '1,239484', '124,348583', '8', '10:27:49', 'P', '', '2023-04-13 22:54:33'),
('CLASS643838975a476', 'ATTE6451d6ce98d25', 's154321@student.unklab.ac.id', 'Statistics and\r\nProbability', 'semmy@unklab.ac.id', '0', '0', '0', '0', 'P', 'Hadir', '2023-05-03 11:37:39'),
('CLASS643838975a476', 'ATTE6451d6ce98d25', 's754321@student.unklab.ac.id', 'Statistics and Probability', 'semmy@unklab.ac.id', '0', '0', '0', '0', 'L', 'Datang terlambat', '2023-05-03 11:37:58'),
('CLASS643838975a476', 'ATTE6451d6ce98d25', 'mandola@gamil.com', 'Statistics and Probability', 'semmy@unklab.ac.id', '0', '0', '0', '0', 'E', 'Sakit', '2023-05-03 11:38:20'),
('CLASS6445f8b7ce4de', 'ATTE6451db1ca165d', 'semmy@yahoo.com', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', '0', '0', '0', '0', 'P', '', '2023-05-03 11:55:46'),
('CLASS6445f8b7ce4de', 'ATTE6451db1ca165d', 'putra@gmail.com', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', '0', '0', '0', '0', 'E', 'Sakit', '2023-05-03 11:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_list`
--

CREATE TABLE `tbl_attendance_list` (
  `id_attendance` varchar(30) NOT NULL,
  `title_short` varchar(100) NOT NULL,
  `date_attendance` varchar(50) NOT NULL,
  `time_attendance` varchar(50) NOT NULL,
  `id_class` varchar(30) NOT NULL,
  `name_subject` varchar(100) NOT NULL,
  `email_lecturer` varchar(70) NOT NULL,
  `name_lecturer` varchar(70) NOT NULL,
  `room_latitude` varchar(50) NOT NULL,
  `room_longitude` varchar(50) NOT NULL,
  `max_radius` varchar(50) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance_list`
--

INSERT INTO `tbl_attendance_list` (`id_attendance`, `title_short`, `date_attendance`, `time_attendance`, `id_class`, `name_subject`, `email_lecturer`, `name_lecturer`, `room_latitude`, `room_longitude`, `max_radius`, `created_at`) VALUES
('ATD665ac4d56e4b7', 'Attendance #1', '21 April 2023', '10.30 - 11.30', 'CLASS663ac4d56e4a8', 'Research Method', 'andrew@unklab.ac.id', 'Andrew Liem', '1,4174176', '124,9840658', '20', '12-12-2023 10:32-43'),
('ATD745ac4d56e4b7', 'Attendance #1', '17 April 2023', '14.00 - 15.00', 'CLASS643ac4d56e4a8', 'Big Data Analysis', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4174176', '124,9840658', '100', '12-12-2023 10:32-43'),
('ATD745ac4d56e4c7', 'Attendance #2', '26 April 2023', '09.30 - 10.40', 'CLASS643ac4d56e4a8', 'System Analysis and Design', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,20438484', '124,343566', '200', '12-12-2023 10:32-43'),
('ATD788ac4d56e4b7', 'Attendance #1', '20 April 2023', '08.30 -\r\n19.30', 'CLASS883ac4d56e4a8', 'Front-end Web Development', 'reymond@unklab.ac.id', 'Reymond Rotikan', '1,4174176', '124,9840658', '50', '12-12-2023 10:32-\r\n43'),
('ATD995ac4d56e4b7', 'Attendance #1', '19 April 2023', '07.30 - .0830', 'CLASS993ac4d56e4a8', 'Computer Networkings', 'stelly@unklab.ac.id', 'Stelly Adam', '1,4174176', '124,9840658', '40', '12-12-2023 10:32-43'),
('ATTE6444526a2e1b7', 'Attendance #3', '26 April 2023', '08.00 - 10.00', 'CLASS643aa53d7f8c9', 'Big Data\r\nAnalysis', 'semmy@unklab.ac.id', 'Stelly Adam', '1,4191753', '124,9845743', '200', '2023-04-23 05:32:50'),
('ATTE64445305d6cee', 'Attendance #3', '29 April 2023', '07.00 -\r\n08.30', 'CLASS643ac4d56e4a8', 'Front-end Web Development', 'semmy@unklab.ac.id', 'Raissa Maringka', '1,4174176', '124,9840658', '250', '2023-04-23\r\n05:35:45'),
('ATTE6445b2210cf5c', 'Attendance #15', '18 April 2023', '20.00 - 21.00', 'CLASS643aa53d7f8c9', 'Big Data Analysis', 'semmy@unklab.ac.id', 'Stelly Adam', '1,4191753', '124,9845743', '150', '2023-04-24 06:33:58'),
('ATTE6445f3cb39bca', 'Attedance #1', '24 April 2023', '07.00 - 08.30', 'CLASS6445e3981e4aa', 'Natural Language\r\nProcessing', 'juan@unklab.ac.id', 'Juan Taju', '1,4171919', '124,9828838', '100', '2023-04-24 11:13:42'),
('ATTE64462606d35a3', 'Attendance #1', '24 April 2023', '08.00 -\r\n09.00', 'CLASS64383858ec58d', 'Artificial Intelligence', 'semmy@unklab.ac.id', 'Green Sandag', '1,4178155', '124,9844905', '50', '2023-04-24\r\n14:47:56'),
('ATTE6446261c86db6', 'Attendance #2', '26 April 2023', '10.00 - 11.00', 'CLASS64383858ec58d', 'Artificial Intelligence', 'semmy@unklab.ac.id', 'Green Sandag', '1,4178155', '124,9844905', '60', '2023-04-24 14:48:44'),
('ATTE644647fba4842', 'Attendance #4', '30 April 2023', '13.00 - 14.30', 'CLASS643ac4d56e4a8', 'Front-end Web\r\nDevelopment', 'semmy@unklab.ac.id', 'Raissa Maringka', '1,4174176', '124,9840658', '70', '2023-04-24 17:12:55'),
('ATTE6447363ab836f', 'Attendance #5', '26 April 2023', '08.00 - 09.00', 'CLASS643ac4d56e4a8', 'Front-end Web Development', 'semmy@unklab.ac.id', 'Raissa Maringka', '1,4174176', '124,9840658', '70', '2023-04-25\r\n10:11:08'),
('ATTE644754987cf94', 'Attendance #1', '25 April 2023', '07.00 - 08.30', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy\r\nWellem Taju', '1,4172063', '124,9828819', '60', '2023-04-25 12:18:56'),
('ATTE644754b0cdcab', 'Attendance #2', '27 April 2023', '08.00 - 09.00', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4172063', '124,9828819', '150', '2023-04-25 12:19:13'),
('ATTE6451d686525a0', 'Attendance\r\n#1', '04 May 2023', '07.00 - 08.30', 'CLASS643838975a476', 'Statistics and Probability', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4178155', '124,9844905', '60', '2023-05-03 11:36:12'),
('ATTE6451d6b52ba51', 'Attendance #2', '04 May 2023', '08.00 - 09.00', 'CLASS643838975a476', 'Statistics and Probability', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4178155', '124,9844905', '70', '2023-05-03 11:36:46'),
('ATTE6451d6ce98d25', 'Pertemuan ke-3', '06 May 2023', '08.00 - 09.00', 'CLASS643838975a476', 'Statistics and Probability', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4178155', '124,9844905', '60', '2023-05-03\r\n11:37:06'),
('ATTE6451daee51b0a', 'Attendance #3', '04 May 2023', '08.00 - 09.00', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy\r\nWellem Taju', '1,4172063', '124,9828819', '70', '2023-05-03 11:54:45'),
('ATTE6451db0537079', 'Attendance #4', '05 May 2023', '07.00 - 09.00', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4172063', '124,9828819', '60', '2023-05-03 11:54:57'),
('ATTE6451db115ba2c', 'Attendance\r\n#5', '04 May 2023', '07.00 - 09.00', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4172063', '124,9828819', '60', '2023-05-03 11:55:08'),
('ATTE6451db1ca165d', 'Attendance #6', '08 May 2023', '08.00 - 09.00', 'CLASS6445f8b7ce4de', 'Fundamental Apache PHP5', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4172063', '124,9828819', '80', '2023-05-03 11:55:23'),
('ATTE6451db64f1047', 'Pertemuan ke-4', '05 May 2023', '07.00 -\r\n09.00', 'CLASS643838975a476', 'Statistics and Probability', 'semmy@unklab.ac.id', 'Semmy Wellem Taju', '1,4178155', '124,9844905', '60', '2023-05-03\r\n11:56:36'),
('ATTE6451db74d7759', 'Pertemuan ke-5', '05 May 2023', '07.00 - 09.00', 'CLASS643838975a476', 'Statistics and Probability', 'semmy@unklab.ac.id', 'Semmy\r\nWellem Taju', '1,4178155', '124,9844905', '70', '2023-05-03 11:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id_class` varchar(100) NOT NULL,
  `email_lecturer` varchar(50) NOT NULL,
  `code_class` varchar(30) NOT NULL,
  `name_subject` varchar(150) NOT NULL,
  `name_lecturer` varchar(100) NOT NULL,
  `fakultas` varchar(250) NOT NULL,
  `prodi` varchar(150) NOT NULL,
  `sks` varchar(25) NOT NULL,
  `building_room` varchar(50) NOT NULL,
  `room_latitude` varchar(50) NOT NULL,
  `room_longitude` varchar(50) NOT NULL,
  `jadwal_class_day_time` varchar(100) NOT NULL,
  `daftar_email_student` text NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `status_class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id_class`, `email_lecturer`, `code_class`, `name_subject`, `name_lecturer`, `fakultas`, `prodi`, `sks`, `building_room`, `room_latitude`, `room_longitude`, `jadwal_class_day_time`, `daftar_email_student`, `created_at`, `status_class`) VALUES
('CLASS64381629449e2', 'semmy@unklab.ac.id', '234ABCD', 'Java Programming', 'Semmy Wellem Taju', 'Fakultas Ekonomi', 'Pendidikan Keagamaan Kristen (Religious)', '3 SKS', 'GA Computer\r\nLab 202/FIK', '1,4178155', '124,9844905', 'Selasa ~ Kamis, 08.00 - 10.00', 'semmy@unklab.ac.id,yonatan@gmail.com,jeremy@yahoo.com,s254321@student.unklab.ac.id,s354321@student.unklab.ac.id,s454321@student.unklab.ac.id,tajusemmy@\r\nyahoo.com,budiman@yahoo.com', '2023-04-13 22:48:47', 'complete'),
('CLASS64381721a4505', 'semmy@unklab.ac.id', '2345ABC', 'Python Programming', 'Adam Stelly', 'Fakultas Pendidikan', 'Pendidikan Luar Sekolah (Non Formal Education)', '3 SKS', 'GK1-204 Comp. Lab (Hardware)', '1,4178155', '124,9844905', 'Senin ~ Rabu, 08.00 -\r\n09.00', 's254321@student.unklab.ac.id,juan@yahoo.com,putra@gmail.com', '2023-04-13 22:54:33', 'complete'),
('CLASS64383858ec58d', 'semmy@unklab.ac.id', 'AI3456S', 'Artificial Intelligence', 'Green Sandag', 'Fakultas Ilmu Komputer', 'Sistem Informasi (Information System)', '3 SKS', 'GK3-205', '1,4178155', '124,9844905', 'Senin\r\n~ Rabu, 14.30 - 16.00', 'bobon@yhaoo.com,jeremy@yahoo.com,s154321@student.unklab.ac.id,s254321@student.unklab.ac.id,s354321@student.unklab.ac.id,semmy@yahoo.com,s454321@stude\r\nnt.unklab.ac.id,budihardo@ggamil.com,s554321@student.unklab.ac.id,patricia@yahoo.com,s644321@student.unklab.ac.id,s654321@student.unklab.ac.id,s754321@stude\r\nnt.unklab.ac.id', '2023-04-14 01:14:59', 'active'),
('CLASS643838975a476', 'semmy@unklab.ac.id', 'PD23232S', 'Statistics and Probability', 'Semmy Wellem Taju', 'Fakultas\r\nIlmu Komputer', 'Sistem Informasi (Information System)', '3 SKS', 'GK2-Tissue Culture Lab', '1,4178155', '124,9844905', 'Senin ~ Rabu, 08.00 - 09.00', 's154321@student.unklab.ac.id,moningkatri@gmail.com,brendaabu@yahoo.com,saturundes@gmail.com,eugenie@gmail.com,semmy@yahoo.com,s754321@student.unkla\r\nb.ac.id,s954321@student.unklab.ac.id,ayu@yahoo.com,mandola@gamil.com,budi@gmail.chot.com', '2023-04-14 01:15:47', 'active'),
('CLASS643a940726a3d', 'semmy@unklab.ac.id', 'MLC4335', 'Machine Learning Algorithms', 'Semmy Wellem Taju', 'Fakultas Ilmu Komputer', 'Pendidikan Keagamaan Kristen (Religious)', '3 SKS', 'GA Computer Lab 203/FIK', '1,4178155', '124,9844905', 'Selasa ~ Kamis, 07.00 - 08.30', 'semmy@yahoo.com,tajudespies@gmail.com', '2023-04-15 20:10:28', 'active'),
('CLASS643aa53d7f8c9', 'semmy@unklab.ac.id', 'DBA984', 'Big Data Analysis', 'Stelly Adam', 'Fakultas Ilmu Komputer', 'Sistem Informasi (Information System)', '3 SKS', 'GK3-203', '1,4191753', '124,9845743', 'Senin ~ Rabu, 17.00 - 18.00', 'semmy@unklab.ac.id,s604321@student.unklab.ac.id,s654321@student.unklab.ac.id,s854321@student.unklab.ac.id,arnold@gmail.com,mawar@student.unklab.ac.id,sem\r\nmytaju@yahoo.com', '2023-04-15 21:23:54', 'active'),
('CLASS643ac4d56e4a8', 'semmy@unklab.ac.id', 'FED3464', 'Front-end Web Development', 'Raissa Maringka', 'Akademi Sekretari Manajemen Indonesia', 'Pendidikan Keagamaan Kristen (Religious)', '3 SKS', 'GA Computer Lab 202/FIK', '1,4174176', '124,9840658', 'Senin ~ Rabu,\r\n14.30 - 16.00', 'budiy@gmail.com,s21710268@student.unklab.ac.id,jeremy@unklab.ac.id,semmy@yahoo.com', '2023-04-15 23:38:52', 'active'),
('CLASS6445e32a2c21e', 'juan@unklab.ac.id', 'CN1264D', 'Computer Networking', 'Juan Taju', 'Fakultas Ilmu Komputer', 'Sistem Informasi (Information System)', '3 SKS', 'GA Computer Lab\r\n202/FIK', '1,4174176', '124,9840658', 'Senin ~ Rabu, 10.00 - 12.00', '', '2023-04-24 10:03:03', 'active'),
('CLASS6445e35cd31eb', 'juan@unklab.ac.id', 'HCI5644', 'Human\r\nComputer Interaction', 'Juan Taju', 'Fakultas Keperawatan', 'Pendidikan Ekonomi (Economy Education)', '3 SKS', 'GK1 Nursing Lab (Demo Room)', '1,4180611', '124,9845825', 'Senin ~ Rabu, 09.00 - 10.00', '', '2023-04-24 10:03:47', 'complete'),
('CLASS6445e3981e4aa', 'juan@unklab.ac.id', 'NLP3456', 'Natural Language\r\nProcessing', 'Juan Taju', 'Fakultas Ilmu Komputer', 'Pendidikan Keagamaan Kristen (Religious)', '3 SKS', 'GK2-104', '1,4171919', '124,9828838', 'Senin ~ Rabu, 09.30 -\r\n11.00', '', '2023-04-24 10:05:11', 'active'),
('CLASS6445f499431e6', 'juan@unklab.ac.id', 'ABC564D', 'Data Analytics', 'Juan Taju', 'Fakultas Filsafat', 'Bahasa Inggris\r\n(English)', '3 SKS', 'GA Computer Lab 202/FIK', '1,4174176', '124,9840658', 'Jumat, 09.00 - 10.00', '', '2023-04-24 11:17:17', 'active'),
('CLASS6445f87da49d6', 'semmy@unklab.ac.id', 'GAC3678', 'Sentiment Analysis', 'Semmy Wellem Taju', 'Fakultas Ilmu Komputer', 'Filsafat (Philosophy)', '3 SKS', 'GK2-103', '1,4172063', '124,9828819', 'Selasa ~ Kamis, 09.00 - 10.00', 'buddyhars@gmail.com,eugenie@yahoo.com,patricia@gmail.com', '2023-04-24 11:34:05', 'active'),
('CLASS6445f8b7ce4de', 'semmy@unklab.ac.id', 'APC496', 'Fundamental Apache PHP5', 'Semmy Wellem Taju', 'Fakultas Ilmu Komputer', 'Pendidikan Keagamaan Kristen (Religious)', '3 SKS', 'GK2-103', '1,4172063', '124,9828819', 'Senin ~ Rabu, 09.30 - 11.00', 'semmy@yahoo.com,putra@gmail.com,tampijeni@yahoo.com', '2023-04-24 11:34:57', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_operator`
--

CREATE TABLE `tbl_operator` (
  `nip` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_operator`
--

INSERT INTO `tbl_operator` (`nip`, `email`, `fullname`, `password`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(12345, 'andrewws@unklab.ac.id', 'Andrew Liem', 'abcd123', '0852123456', 'admin', '12-04-2023 12:04:32', '12-04-2023 12:04:32'),
(12345, 'gledis@unklab.ac.id', 'Gladis Sepang', 'abcw1243', '0852123456', 'admin', '12-04-2023 12:04:32', '12-04-2023 12:04:32'),
(876578, 'juanmambu@unklab.ac.id', 'Juan Taju', 'acbc1213', '0852123456', 'admin', '12-04-2023 12:04:32\r\n', '12-04-2023 12:04:32\r\n'),
(34567, 'reymond@unklab.ac.id', 'Reymond Rotikan', '123475', '0852123456', 'staff', '12-04-2023 12:04:32', '12-04-2023 12:04:32'),
(12345, 'semmytaju@unklab.ac.id', 'Semmy Wellem Taju', 'abc1233', '0852123456', 'admin', '12-04-2023 12:04:32', '12-04-2023 12:04:32'),
(23456, 'stenlyadam@unklab.ac.id', 'Stenly Adam', '123425', '0852123456', 'admin', '12-04-2023\r\n12:04:32', '12-04-2023 12:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `reg_number` varchar(100) NOT NULL,
  `nim_number` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`reg_number`, `nim_number`, `email`, `fullname`, `password`, `created_at`, `updated_at`) VALUES
('123456789012', '154321', 's154321@student.unklab.ac.id', 'Radix Basalama', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('105021710031', '21710268', 's21710268@student.unklab.ac.id', 'Pongantung, Jeremy', '1234qwer', '12-12-2023 10:32-43', '12-12-2023 10:32-43'),
('123456789012', '254321', 's254321@student.unklab.ac.id', 'Putra Podomi', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '354321', 's354321@student.unklab.ac.id', 'ChinChin Long', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '454321', 's454321@student.unklab.ac.id', 'Miehie Kawekiang Sie', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '554321', 's554321@student.unklab.ac.id', 'Dinda Manopo Putri', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '604321', 's604321@student.unklab.ac.id', 'Margono Raharjo', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '644321', 's644321@student.unklab.ac.id', 'Sempoyonangan Ojomiso', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '654321', 's654321@student.unklab.ac.id', 'David Kawekiang', '12345', '12-12-2023 10:32-43', '12-12-2023 10:32-43'),
('123456789012', '754321', 's754321@student.unklab.ac.id', 'Citra Lentari Anada', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '854321', 's854321@student.unklab.ac.id', 'Sandra Dewi', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33'),
('123456789012', '954321', 's954321@student.unklab.ac.id', 'Putri Moningka', '12345', '2023-04-13 22:54:33', '2023-04-13 22:54:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance_list`
--
ALTER TABLE `tbl_attendance_list`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `tbl_operator`
--
ALTER TABLE `tbl_operator`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
