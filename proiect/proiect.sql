-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 05, 2020 alle 11:39
-- Versione del server: 10.4.13-MariaDB
-- Versione PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cos`
--

CREATE TABLE `cos` (
  `idcos` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `starecerere` varchar(100) NOT NULL DEFAULT 'Trimis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cos`
--

INSERT INTO `cos` (`idcos`, `product_id`, `quantity`, `id_client`, `starecerere`) VALUES
(44, 1, 4, 2, 'primit'),
(73, 8, 1, 2, 'Trimis'),
(75, 2, 1, 2, 'Procesare'),
(81, 1, 2, 3, 'Trimis'),
(83, 2, 2, 3, 'Trimis'),
(84, 2, 10, 3, 'Trimis'),
(86, 2, 1, 3, 'Trimis'),
(87, 8, 1, 3, 'Trimis'),
(88, 1, 1, 5, 'Aprobat'),
(89, 2, 1, 5, 'Trimis');

-- --------------------------------------------------------

--
-- Struttura della tabella `produse`
--

CREATE TABLE `produse` (
  `idprodus` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `produse`
--

INSERT INTO `produse` (`idprodus`, `name`, `descriere`, `image`, `price`, `categorie`) VALUES
(1, 'Ceainic', 'fierbator', 'img/abc.jpg', 20.00, 'casnice'),
(2, 'Glob', 'glob', 'img/abc1.jpg', 50.00, 'scoala'),
(8, 'Diesel simplu', 'abc', 'img/abc2.jpg', 30.00, 'scoala');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$9j12FjgN6siVfhfz5gykDOnlXUT250tl8a/ceEueE6VSF5/J1i4L2', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `email`) VALUES
(2, 'artur', '$2y$10$RHv40bk3L4OFwm.ZW3FlfO0cdcAtJAdN1/v.2.nuttpaMukGx9NGe', 'artur@artur.com'),
(3, 'daria', '$2y$10$3RIZiU9bX9lIaDux8.F6NO9.RNgfdefZBf35.j.Gc4276sP4HWcFO', 'daria@daria.com'),
(5, 'bianca', '$2y$10$8ulWws.NuY6YzU1O8WAaI.IiMWQUoijPQU0zF/9pwvRwEnz1XfBs2', 'bianca@bianca.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`idcos`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indici per le tabelle `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`idprodus`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cos`
--
ALTER TABLE `cos`
  MODIFY `idcos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT per la tabella `produse`
--
ALTER TABLE `produse`
  MODIFY `idprodus` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cos`
--
ALTER TABLE `cos`
  ADD CONSTRAINT `cos_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `produse` (`idprodus`),
  ADD CONSTRAINT `cos_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
