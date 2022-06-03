-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lut 2022, 09:49
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pizza`
--
CREATE DATABASE IF NOT EXISTS `pizza` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pizza`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platnosc`
--

CREATE TABLE `platnosc` (
  `id` int(11) NOT NULL,
  `rodzaj` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `platnosc`
--

INSERT INTO `platnosc` (`id`, `rodzaj`) VALUES
(1, 'u dostawcy'),
(2, 'dotpay'),
(3, 'blik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(60) NOT NULL,
  `opis` text NOT NULL,
  `typ` int(11) NOT NULL,
  `cenam` float(5,2) NOT NULL,
  `cenad` float(5,2) NOT NULL,
  `zdjecie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `typ`, `cenam`, `cenad`, `zdjecie`) VALUES
(1, 'Margherita', 'ciasto, sos pomidorowy, ser, oregano', 1, 16.90, 28.80, '01_margherita.png'),
(2, 'Capriciosa', 'ciasto, sos pomidorowy, ser, szynka, pieczarki, oregano', 1, 22.60, 38.40, '02_capriciosa.png'),
(3, 'Parma', 'ciasto, sos pomidorowy, ser mozzarella, szynka dojrzewająca, bazylia świeża, oregano', 1, 25.80, 44.10, '03_parma.png'),
(4, 'Roma', 'ciasto, sos pomidorowy, ser, salami, kabanosy, papryka konserwowa, oregano', 1, 22.90, 39.10, '04-roma.png'),
(5, 'Polska', 'ciasto, sos pomidorowy, ser, szynka, kiełbasa, kabanosy, cebula biała, papryka świeża, oregano', 1, 25.80, 44.10, '05_polska.png'),
(6, 'Pepperoni', 'ciasto, sos pomidorowy, ser, salami pepperoni, oregano', 1, 21.30, 36.70, '06_pepperoni.png'),
(7, 'Hawajska', 'ciasto, sos pomidorowy, ser, szynka, ananasy, oregano', 1, 22.60, 38.40, '07_hawajska.png'),
(8, 'Prosciutto', 'ciasto, sos pomidorowy, ser, szynka włoska, pomidory koktajlowe, rukola, oregano', 1, 25.80, 44.10, '08_prosciutto.png'),
(9, 'Kebab', 'ciasto, sos pomidorowy, ser, kebab drobiowy, cebula biała, oregano', 1, 22.90, 39.10, '09_kebab.png'),
(10, 'Cztery sery', 'ciasto, sos pomidorowy, ser, ser mozzarella, ser sałatkowy, ser pleśniowy, oregano', 1, 29.50, 50.30, '10_cztery-sery.png'),
(11, 'Pepsi', '0,85l 1szt.', 2, 7.90, 0.00, 'pepsi_085l.png'),
(12, 'Lipton Ice Tea', '0,85l 1szt.', 2, 7.90, 0.00, 'lipton-lemon.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj`
--

CREATE TABLE `rodzaj` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rodzaj`
--

INSERT INTO `rodzaj` (`id`, `nazwa`) VALUES
(1, 'pizza'),
(2, 'napój'),
(3, 'danie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`id`, `nazwa`) VALUES
(1, 'zamówione'),
(2, 'w przygotowaniu'),
(3, 'w drodze'),
(4, 'reklamacja'),
(5, 'zakończone');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statystyki`
--

CREATE TABLE `statystyki` (
  `id` int(11) NOT NULL,
  `wejsc` int(11) NOT NULL,
  `zakupow` int(11) NOT NULL,
  `kasa` float(5,2) NOT NULL,
  `bledy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `statystyki`
--

INSERT INTO `statystyki` (`id`, `wejsc`, `zakupow`, `kasa`, `bledy`) VALUES
(1, 39, 8, 393.70, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `uprawnienia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `uprawnienia`) VALUES
('nHGHq27yPuDMQp9NBgsZ', 'admin', '1f6ccd2be75f1cc94a22a773eea8f8aeb5c68217', 'all');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamówienie`
--

CREATE TABLE `zamówienie` (
  `id` int(11) NOT NULL,
  `ulica` varchar(140) NOT NULL,
  `nr_domu` varchar(4) NOT NULL,
  `nr_mieszkania` varchar(4) DEFAULT NULL,
  `miejscowosc` varchar(120) NOT NULL,
  `email` varchar(240) NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `platnosc` int(11) NOT NULL,
  `zamówienie` text NOT NULL,
  `kasa` float(5,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamówienie`
--

INSERT INTO `zamówienie` (`id`, `ulica`, `nr_domu`, `nr_mieszkania`, `miejscowosc`, `email`, `telefon`, `platnosc`, `zamówienie`, `kasa`, `status`) VALUES
(1, 'Akacjowa', '3', '12', 'Poznań', 'andrzej@gmail.com', '357964790', 1, '1. Margherita duża 28.80zł\r<br>2. Polska mała 25.80zł\r<br>', 54.60, 5),
(2, 'Malinowa', '12', '', 'Murowana Goślina', 'marcin@gmail.com', '964746357', 1, '1. Capriciosa mała 22.60zł\r<br>2. Kebab duża 39.10zł\r<br>', 61.70, 5),
(3, 'Długa', '23', '', 'Murowana Goślina', 'anna@kowalska.pl', '652895453', 1, '1. Hawajska duża 38.40zł\r<br>', 38.40, 5),
(4, 'Wrzosowa', '12', '', 'Murowana Goślina', 'iza@gmail.com', '698384579', 1, '1. Polska duża 44.10zł\r<br>', 44.10, 5),
(5, 'Fredry', '13', '', 'Poznań', 'wojciech.gunia@zsk.poznan.pl', '467365765', 1, '1. Cztery sery mała 29.50zł\r<br>', 29.50, 3),
(6, 'Bukowska', '53', '', 'Poznań', 'marcin@wp.pl', '357536543', 1, '1. Roma duża 39.10zł\r<br>2. Prosciutto mała 25.80zł\r<br>', 64.90, 2),
(7, 'Czereśniowa', '6', '', 'Murowana Goślina', 'adamnizio@wp.pl', '473886352', 1, '1. Prosciutto duża 44.10zł\r<br>2. Capriciosa mała 22.60zł\r<br>', 66.70, 2),
(8, 'Matyi', '45b', '21', 'Poznań', 'alina@gmail.com', '458378543', 1, '1. Margherita mała 16.90zł\r<br>2. Margherita mała 16.90zł\r<br>', 33.80, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `platnosc`
--
ALTER TABLE `platnosc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typ` (`typ`);

--
-- Indeksy dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `statystyki`
--
ALTER TABLE `statystyki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamówienie`
--
ALTER TABLE `zamówienie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platnosc` (`platnosc`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zamówienie`
--
ALTER TABLE `zamówienie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`typ`) REFERENCES `rodzaj` (`id`);

--
-- Ograniczenia dla tabeli `zamówienie`
--
ALTER TABLE `zamówienie`
  ADD CONSTRAINT `zamówienie_ibfk_1` FOREIGN KEY (`platnosc`) REFERENCES `platnosc` (`id`),
  ADD CONSTRAINT `zamówienie_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
