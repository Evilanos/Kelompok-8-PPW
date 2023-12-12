-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 17.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `fullname`, `email`, `password`, `oauth_id`, `last_login`, `created_at`) VALUES
(1, 'Nadia Putri', 'nadia@gmail.com', 'nadia123', '', '0000-00-00 00:00:00', '2023-12-04 11:49:48'),
(2, 'Mauritz', 'mauritz@gmail.com', 'moris', '', '0000-00-00 00:00:00', '2023-12-04 11:52:30'),
(3, 'juan', 'juan.fredoalexius@yahoo.com', 'Galileo123', '', '0000-00-00 00:00:00', '2023-12-04 16:14:40'),
(4, 'juan', 'fredo@gmail.com', 'fredo', '', '0000-00-00 00:00:00', '2023-12-04 16:17:17'),
(5, 'Juan Fredo A Sihotang', 'juan.fredoalexius123@gmail.com', '', '105365242492172297915', '2023-12-04 11:41:08', '2023-12-04 16:19:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
