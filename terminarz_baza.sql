-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Kwi 2021, 22:48
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `terminarz_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekcje`
--

CREATE TABLE `lekcje` (
  `id` int(11) NOT NULL,
  `idPrzedmiotu` int(11) NOT NULL,
  `idWykladowcy` int(11) NOT NULL,
  `idUcznia` int(11) NOT NULL,
  `idSali` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina_lekcyjna` int(11) NOT NULL,
  `Widoczny` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lekcje`
--

INSERT INTO `lekcje` (`id`, `idPrzedmiotu`, `idWykladowcy`, `idUcznia`, `idSali`, `Data`, `Godzina_lekcyjna`, `Widoczny`) VALUES
(1, 1, 4, 5, 1, '2021-03-09', 1, 0),
(2, 6, 2, 5, 2, '2021-03-09', 3, 0),
(3, 5, 4, 5, 4, '2021-03-11', 2, 0),
(4, 8, 2, 6, 2, '2021-03-10', 2, 0),
(5, 4, 2, 6, 3, '2021-03-09', 2, 0),
(6, 7, 4, 2, 3, '2021-03-10', 2, 0),
(8, 1, 1, 5, 1, '2021-03-17', 1, 0),
(15, 1, 1, 5, 1, '2021-03-26', 1, 0),
(16, 6, 2, 6, 1, '2021-03-26', 1, 0),
(18, 7, 1, 5, 1, '2021-03-09', 2, 0),
(22, 1, 15, 5, 1, '2021-03-20', 1, 0),
(23, 6, 15, 16, 3, '2021-03-25', 1, 0),
(24, 5, 3, 17, 1, '2021-03-24', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id` int(11) NOT NULL,
  `Nazwa` varchar(30) NOT NULL,
  `Kategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id`, `Nazwa`, `Kategoria`) VALUES
(1, 'CMS Joomla', 'Tworzenie stron WWW'),
(2, 'CMS Wordpress', 'Tworzenie stron WWW'),
(3, 'Adobe Illustrator', 'Grafika komputerowa'),
(4, 'Adobe InDesign', 'Grafika komputerowa'),
(5, 'Word', 'MS Office i ECDL'),
(6, 'Excel', 'MS Office i ECDL'),
(7, 'Java', 'Programowanie'),
(8, 'C++', 'Programowanie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `numer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sale`
--

INSERT INTO `sale` (`id`, `numer`) VALUES
(1, 601),
(2, 602),
(3, 603),
(4, 604);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Haslo` varchar(64) NOT NULL,
  `Imie` varchar(30) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Ranga` int(11) NOT NULL,
  `Rola` int(11) NOT NULL,
  `Widoczny` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Ranga`, `Rola`, `Widoczny`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 1, 1, 0),
(2, 'test1', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 1, 1, 0),
(3, 'test2', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 1, 1, 0),
(4, 'test3', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 1, 1, 0),
(5, 'test4', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 2, 0),
(6, 'test5', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 2, 0),
(9, 'test6', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 1, 1, 0),
(10, 'test7', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 2, 0),
(15, 'test8', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 1, 0),
(16, 'test9', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 2, 0),
(17, 'test10', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Test', 'Test', 2, 2, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPrzedmiotu` (`idPrzedmiotu`),
  ADD KEY `idWykladowcy` (`idWykladowcy`),
  ADD KEY `idUcznia` (`idUcznia`),
  ADD KEY `idSali` (`idSali`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  ADD CONSTRAINT `lekcje_ibfk_1` FOREIGN KEY (`idPrzedmiotu`) REFERENCES `przedmioty` (`id`),
  ADD CONSTRAINT `lekcje_ibfk_2` FOREIGN KEY (`idWykladowcy`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `lekcje_ibfk_3` FOREIGN KEY (`idSali`) REFERENCES `sale` (`id`),
  ADD CONSTRAINT `lekcje_ibfk_4` FOREIGN KEY (`idUcznia`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
