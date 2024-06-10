-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 10:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040069`
--

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE `cate` (
  `id_category` int NOT NULL,
  `FPS` varchar(255) NOT NULL,
  `id_game` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`id_category`, `FPS`, `id_game`) VALUES
(1, 'FPS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id_game` int NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `deskripsi` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(50) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `developer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_game`, `nama_game`, `deskripsi`, `genre`, `tanggal_rilis`, `developer`, `gambar`) VALUES
(2, 'Pubg Mobile', 'PUBG Mobile memiliki fitur permainan yang mirip dengan yang asli. Pemain terjun payung ke pulau terpencil dan berjuang untuk tetap bertahan sebagai pemain terakhir.Permainan ini diterbitkan oleh penerbit seperti Krafton.', 'Battle Royale', '2018-03-18', 'Lightning Studios', 'pubg-mobile.jpg'),
(3, 'Apex legend', 'Apex Legends mengusung konsep permainan battle royale dari permainan tembak-menembak pahlawan.  Apex berbeda dari kebanyakan permainan battle royale dengan menggunakan Legend (karakter pahlawan yang memiliki kemampuan.', 'Battle Royale', '2019-02-04', 'Respawn Entertaiment', 'apex-legends.jpg'),
(4, 'Valorant', 'Alur permainan\r\nValorant adalah penembak taktis berbasis tim dan penembak orang pertama yang diatur dalam dekat masa depan.Pemain bermain sebagai salah satu dari sekumpulan agen,karakter yang dirancang berdasarkan beberapa negara.', 'FPS', '2020-06-02', 'Riot Games', 'Valorant2.jpg'),
(42, 'Counter Strike 2', 'Seperti seri permainan sebelumnya, Counter-Strike 2 adalah penembak orang pertama taktis multipemain, di mana dua tim bersaing untuk menyelesaikan objek yang berbeda, tergantung pada mode permainan apa yang dipilih. Pemain dibagi menjadi dua tim, Kontra-Teroris (Counter-Terrorist) dan Teroris (Terrorist). ', 'FPS', '2023-09-27', 'Valve', '6665cd7763856.jpg'),
(45, 'Ace Combat 7', 'Gim ini mengambil tempat di dunia fiksi yang sama dengan gim utama sebelumnya dalam serial Ace Combat. Setelah kejadian Ace Combat 04 dan Ace Combat 5, Federasi Osea menengahi perdamaian antara kekuatan militer Erusea dan seluruh benua Usea.', 'Air Combat Simulation', '2019-01-18', 'Bandai Namco Studios', '66646ead1515f.jpg'),
(46, 'Battlefield 2042', 'Mirip dengan pendahulunya, Battlefield 2042 adalah penembak orang pertama yang berfokus pada multipemain. Karena permainan ini berlatar waktu di masa depan, permainan ini menampilkan senjata dan gadget futuristik seperti deployable turret dan drone, serta kendaraan yang dapat dikendalikan pemain.', 'FPS', '2021-11-19', 'DICE', '66647021638bd.jpg'),
(47, 'Dead By Daylight 4', 'Dead by Daylight adalah permainan video horor kesintasan yang dikembangkan oleh Behaviour Interactive. Dead by Daylight dirilis untuk platform Microsoft Windows pada bulan Juni tahun 2016, PlayStation 4 dan Xbox One pada bulan Juni 2017, Nintendo Switch pada 24 September 2019 serta versi untuk ponsel di iOS dan Android pada 17 April 2020.  ', 'Survival Horror', '2016-06-14', 'Behavior Interactive', '666471cd2f0a3.jpg'),
(48, 'Sabnautica', ' 307 / 5,000 Subnautica adalah game aksi-petualangan bertahan hidup yang berlatar lingkungan dunia terbuka dan dimainkan dari sudut pandang orang pertama. Pemain mengontrol satu-satunya yang selamat dari pesawat ruang angkasa yang jatuh yang dikenal sebagai The Aurora, Ryley Robinson, saat ia terdampar di planet laut terpencil yang dikenal sebagai 4546B di Galaksi Andromeda. ', 'Action-adventure, Survival', '2018-01-23', 'Unknown Worlds Entertaiment', '666484e3bfe8c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(7, 'poke', '$2y$10$wy078C1Tcl6F6FGclyQdtO89wjMFAFR2vleGpEpHsrrrWu0gSvWly', ''),
(8, 'boom', '$2y$10$xxb66kpw4Bt9FeU0PpZ3XuhYFDcE2SwnJQ/Xs8a8sjBHVTHm48Fse', ''),
(9, 'admin', '$2y$10$HucJ7C1VreJ2lzzPPqzj3u47Ve/4b67kesInl0LqiFknprWG83h4O', 'admin'),
(10, 'uusss', '$2y$10$WLPIxC5Rq8CXnncxpDEkhuRuSMIFfgDpi2AM04Slvz1kNZlSGL2La', 'user'),
(12, 'yuki', '$2y$10$ye92oTnb5JpIkMc9T0rL0.GCUMCR460kib/Soz34cA3GaYnFhNzc6', 'user'),
(13, 'oyo', '$2y$10$2KzP4X8.12sNcuPAimFx5eskPLmlZ25JBYhc9soVD4cZUgvuW5foK', 'user'),
(14, 'oki', '$2y$10$IGIigZ/uhDzcN1T8lQVyLuu4K/RLw90giYH2b2XXl6NYGL/2H5H26', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cate`
--
ALTER TABLE `cate`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cate`
--
ALTER TABLE `cate`
  ADD CONSTRAINT `cate_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
