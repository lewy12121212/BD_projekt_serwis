-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 10 Sty 2021, 15:50
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `BD_serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Grupy`
--

CREATE TABLE `Grupy` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Typ_grupy` enum('Podstawowa','Wysokościowa','Konserwatorzy powierzchni płaskich','Konserwatorzy','Wywóz śmieci') COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Liczebnosc_grupy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Grupy`
--

INSERT INTO `Grupy` (`Id`, `Nazwa`, `Typ_grupy`, `Liczebnosc_grupy`) VALUES
(1, 'Grupa1', 'Podstawowa', 2),
(2, 'Grupa3', 'Wysokościowa', 2),
(3, 'Grupa3', 'Konserwatorzy', NULL),
(4, 'Grupa32', 'Wysokościowa', 1),
(5, 'Grupa5', 'Wywóz śmieci', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Klienci`
--

CREATE TABLE `Klienci` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Adres` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Klienci`
--

INSERT INTO `Klienci` (`Id`, `Nazwa`, `Adres`) VALUES
(1, 'MatBud', 'MatBud20/30'),
(2, 'Zabuk_zabruk2', 'Zabukiem20/10'),
(3, 'Nowy_klient', 'Nowa_12/23'),
(4, 'Prod2', 'Nowy_22/23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Pracownicy`
--

CREATE TABLE `Pracownicy` (
  `Id` int(11) NOT NULL,
  `Imie` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Nazwisko` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Id_grupy` int(11) NOT NULL,
  `Stawka_godzinowa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Pracownicy`
--

INSERT INTO `Pracownicy` (`Id`, `Imie`, `Nazwisko`, `Id_grupy`, `Stawka_godzinowa`) VALUES
(1, 'Maciej', 'Musiał', 5, 20),
(3, 'Tomek', 'Nierobek', 5, 20),
(4, 'Bartek', 'Mokry', 5, 23);

--
-- Wyzwalacze `Pracownicy`
--
DELIMITER $$
CREATE TRIGGER `Aktualizacja_liczebnosci_grup_insert` AFTER INSERT ON `Pracownicy` FOR EACH ROW BEGIN
DECLARE Liczebnosc INT unsigned DEFAULT 1;
SET Liczebnosc = ( SELECT COUNT(Id) FROM Pracownicy WHERE Id_grupy LIKE NEW.Id_grupy);
UPDATE Grupy SET Grupy.Liczebnosc_grupy = Liczebnosc WHERE Id LIKE NEW.Id_grupy;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Aktualizacja_liczebnosci_grup_update` AFTER UPDATE ON `Pracownicy` FOR EACH ROW BEGIN
DECLARE Liczebnosc INT unsigned DEFAULT 1;
SET Liczebnosc = ( SELECT COUNT(Id) FROM Pracownicy WHERE Id_grupy LIKE NEW.Id_grupy);
UPDATE Grupy SET Grupy.Liczebnosc_grupy = Liczebnosc WHERE Id LIKE NEW.Id_grupy;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Srodki_czystosci`
--

CREATE TABLE `Srodki_czystosci` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Ilosc` float DEFAULT NULL,
  `Jednostka` enum('ml','szt','g') COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Srodki_czystosci`
--

INSERT INTO `Srodki_czystosci` (`Id`, `Nazwa`, `Ilosc`, `Jednostka`, `Cena`) VALUES
(1, 'Domestos', 3425, 'ml', 1),
(2, 'Mop', 30, 'szt', 35),
(3, 'Prod2', 12, 'szt', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Srodki_zuzyte`
--

CREATE TABLE `Srodki_zuzyte` (
  `Id` int(11) NOT NULL,
  `Id_Srodek` int(11) DEFAULT NULL,
  `Id_Usluga` int(11) DEFAULT NULL,
  `Ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Srodki_zuzyte`
--

INSERT INTO `Srodki_zuzyte` (`Id`, `Id_Srodek`, `Id_Usluga`, `Ilosc`) VALUES
(1, 1, 2, 60),
(2, 1, 2, 30),
(3, 2, 2, 10),
(4, 2, 2, 10),
(5, 1, 8, 200);

--
-- Wyzwalacze `Srodki_zuzyte`
--
DELIMITER $$
CREATE TRIGGER `Aktualizacja_kosztow_insert` AFTER INSERT ON `Srodki_zuzyte` FOR EACH ROW BEGIN
DECLARE ilosc_v INT unsigned DEFAULT 1;
DECLARE koszt_v INT unsigned DEFAULT 1;
DECLARE cena_v INT unsigned DEFAULT 1;
SET ilosc_v = ( SELECT SUM(Ilosc) FROM Srodki_zuzyte WHERE Id_Srodek LIKE NEW.Id_Srodek);
SET cena_v = ( SELECT Cena FROM Srodki_czystosci WHERE Id LIKE NEW.Id_Srodek);
SET koszt_v = ilosc_v * cena_v;
UPDATE Uslugi SET Uslugi.Koszt = koszt_v WHERE Uslugi.Id LIKE NEW.Id_Usluga;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Aktualizacja_kosztow_update` AFTER UPDATE ON `Srodki_zuzyte` FOR EACH ROW BEGIN
DECLARE ilosc_v INT unsigned DEFAULT 1;
DECLARE koszt_v INT unsigned DEFAULT 1;
DECLARE cena_v INT unsigned DEFAULT 1;
SET ilosc_v = ( SELECT SUM(Ilosc) FROM Srodki_zuzyte WHERE Id_Srodek LIKE NEW.Id_Srodek);
SET cena_v = ( SELECT Cena FROM Srodki_czystosci WHERE Id LIKE NEW.Id_Srodek);
SET koszt_v = ilosc_v * cena_v;
UPDATE Uslugi SET Uslugi.Koszt = koszt_v WHERE Uslugi.Id LIKE NEW.Id_Usluga;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Aktualizacja_liczebnosci_magazynu_insert` AFTER INSERT ON `Srodki_zuzyte` FOR EACH ROW BEGIN
DECLARE Liczebnosc INT unsigned DEFAULT 1;
SET Liczebnosc = ( SELECT SUM(Ilosc) FROM Srodki_zuzyte WHERE Id_Srodek LIKE NEW.Id_Srodek);
UPDATE Srodki_czystosci SET Srodki_czystosci.Ilosc = Srodki_czystosci.Ilosc - Liczebnosc WHERE Id LIKE NEW.Id_Srodek;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Aktualizacja_liczebnosci_magazynu_update` AFTER UPDATE ON `Srodki_zuzyte` FOR EACH ROW BEGIN
DECLARE Liczebnosc INT unsigned DEFAULT 1;
SET Liczebnosc = ( SELECT SUM(Ilosc) FROM Srodki_zuzyte WHERE Id_Srodek LIKE NEW.Id_Srodek);
UPDATE Srodki_czystosci SET Srodki_czystosci.Ilosc = Srodki_czystosci.Ilosc - Liczebnosc WHERE Id LIKE NEW.Id_Srodek;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uslugi`
--

CREATE TABLE `Uslugi` (
  `Id` int(11) NOT NULL,
  `Typ_uslugi` enum('Podstawowa','Średnia','deLux') COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Id_grupa` int(11) DEFAULT NULL,
  `Id_klient` int(11) DEFAULT NULL,
  `Czas_wykonania` time NOT NULL DEFAULT '00:00:00',
  `Koszt` int(11) NOT NULL DEFAULT 0,
  `Cena_uslugi` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Uslugi`
--

INSERT INTO `Uslugi` (`Id`, `Typ_uslugi`, `Id_grupa`, `Id_klient`, `Czas_wykonania`, `Koszt`, `Cena_uslugi`) VALUES
(1, 'Średnia', 2, 1, '00:00:00', 0, NULL),
(2, 'deLux', 1, 1, '00:00:00', 700, NULL),
(8, 'Średnia', 3, 2, '02:30:00', 580, 0),
(9, 'Podstawowa', 3, 2, '16:16:00', 0, 0),
(10, 'Podstawowa', 3, 2, '16:16:00', 0, 0),
(11, 'Podstawowa', 3, 2, '16:16:00', 0, 0);

--
-- Wyzwalacze `Uslugi`
--
DELIMITER $$
CREATE TRIGGER `Aktualizacja_Ceny_update` AFTER UPDATE ON `Uslugi` FOR EACH ROW BEGIN
DECLARE Cena INT unsigned DEFAULT 1;
SET Cena = ( SELECT Cena FROM Uslugi WHERE Id LIKE NEW.Id );
UPDATE Uslugi SET Uslugi.Cena_uslugi = Cena + 100 WHERE Id LIKE NEW.Id;
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Grupy`
--
ALTER TABLE `Grupy`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Klienci`
--
ALTER TABLE `Klienci`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Pracownicy`
--
ALTER TABLE `Pracownicy`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_grupy` (`Id_grupy`);

--
-- Indeksy dla tabeli `Srodki_czystosci`
--
ALTER TABLE `Srodki_czystosci`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Srodki_zuzyte`
--
ALTER TABLE `Srodki_zuzyte`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Srodek` (`Id_Srodek`),
  ADD KEY `Id_Usluga` (`Id_Usluga`);

--
-- Indeksy dla tabeli `Uslugi`
--
ALTER TABLE `Uslugi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_grupa` (`Id_grupa`),
  ADD KEY `Id_klient` (`Id_klient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Grupy`
--
ALTER TABLE `Grupy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `Klienci`
--
ALTER TABLE `Klienci`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `Pracownicy`
--
ALTER TABLE `Pracownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `Srodki_czystosci`
--
ALTER TABLE `Srodki_czystosci`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `Srodki_zuzyte`
--
ALTER TABLE `Srodki_zuzyte`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `Uslugi`
--
ALTER TABLE `Uslugi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Pracownicy`
--
ALTER TABLE `Pracownicy`
  ADD CONSTRAINT `Pracownicy_ibfk_1` FOREIGN KEY (`Id_grupy`) REFERENCES `Grupy` (`Id`);

--
-- Ograniczenia dla tabeli `Srodki_zuzyte`
--
ALTER TABLE `Srodki_zuzyte`
  ADD CONSTRAINT `Srodki_zuzyte_ibfk_1` FOREIGN KEY (`Id_Srodek`) REFERENCES `Srodki_czystosci` (`Id`),
  ADD CONSTRAINT `Srodki_zuzyte_ibfk_2` FOREIGN KEY (`Id_Usluga`) REFERENCES `Uslugi` (`Id`);

--
-- Ograniczenia dla tabeli `Uslugi`
--
ALTER TABLE `Uslugi`
  ADD CONSTRAINT `Uslugi_ibfk_1` FOREIGN KEY (`Id_grupa`) REFERENCES `Grupy` (`Id`),
  ADD CONSTRAINT `Uslugi_ibfk_2` FOREIGN KEY (`Id_klient`) REFERENCES `Klienci` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
