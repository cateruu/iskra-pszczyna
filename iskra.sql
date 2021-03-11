-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Mar 2021, 16:10
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `iskra`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Senior'),
(2, 'Lekkoatletyka'),
(4, 'Junior'),
(5, '2004/2005'),
(6, '2006'),
(7, '2007'),
(8, '2008'),
(9, '2009'),
(10, '2010'),
(11, '2011'),
(12, '2012');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `galeria`
--

INSERT INTO `galeria` (`id`, `post_id`, `img`) VALUES
(9, 77, '6ff1795c2eb39d0b7d7d65a1ce3fd027.jpg'),
(10, 77, '217717599abd8432319f4c849be3e964.jpg'),
(11, 77, 'e1ec32932251a0ee8ffebbe06e1f3600.jpg'),
(12, 77, '7a9564227ccdd1420ecf4fabfbd9f9fa.jpg'),
(13, 77, '0de626538eb7265a444ced7ab1496c4a.jpg'),
(14, 78, '76f6fdc5ca4aa1a3ac376a18d35d6874.jpg'),
(15, 78, 'fbae8503ca1eb58d454fd448644a9813.jpg'),
(16, 78, 'bc20744f8d2d743acad23b829c1c45f9.jpg'),
(17, 78, 'baecda0ff255e4b761ac04bd59d2772c.jpg'),
(18, 78, 'e91826c363eb0a1b6c2fab2eb6a0cd44.jpg'),
(19, 78, 'c5e9a5e38e604b46c6bbfeeab34c2281.jpg'),
(20, 78, '6a2e78c68bcde7360fb9bf9d77ff478f.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `livechat`
--

CREATE TABLE `livechat` (
  `id` int(11) NOT NULL,
  `czas` time NOT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `liveinfo`
--

CREATE TABLE `liveinfo` (
  `id` int(11) NOT NULL,
  `sekcja` text NOT NULL,
  `content` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `liveinfo`
--

INSERT INTO `liveinfo` (`id`, `sekcja`, `content`) VALUES
(1, 'isLive', '0'),
(2, 'Przeciwnik', ''),
(6, 'n', '0'),
(7, 'p', '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecze`
--

CREATE TABLE `mecze` (
  `id` int(11) NOT NULL,
  `przeciwnik` text COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `w` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `wynik` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mecze`
--

INSERT INTO `mecze` (`id`, `przeciwnik`, `data`, `w`, `p`, `r`, `wynik`) VALUES
(107, 'Arsenal', '2020-04-22 12:00:00', 0, 1, 0, '1 : 2'),
(108, 'Manchester United', '2020-07-15 15:00:00', 0, 0, 0, '-:-'),
(109, 'BVB', '2020-02-12 14:30:00', 1, 0, 0, '2 : 1'),
(112, 'Juventus', '2020-02-11 10:30:00', 0, 1, 0, '1 : 3'),
(113, 'Barcelona', '2019-10-17 15:40:00', 1, 0, 0, '3 : 2'),
(114, 'Arsenal', '2021-03-18 16:00:00', 0, 0, 0, '-:-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_polish_ci NOT NULL,
  `category` tinytext COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `img` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posty`
--

INSERT INTO `posty` (`id`, `title`, `category`, `description`, `content`, `data`, `img`) VALUES
(38, 'Tytuł fajny', 'Senior', 'Super krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<strong>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</strong><em>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</em></p>\r\n', '2020-03-24', '3cdae30f6efc96d7d6625cc73f51b5c7.jpg'),
(39, 'Tytuł fajny', 'Senior', 'Super krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<strong>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</strong><em>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</em></p>\r\n', '2020-03-24', '3cdae30f6efc96d7d6625cc73f51b5c7.jpg'),
(40, 'Tytuł fajny', 'Senior', 'Super krótki opis artykułuSuper krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<u>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</u></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(41, 'Super', 'Senior', 'Super krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułu', '<ul>\r\n	<li>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<s>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSupe</s>r kr&oacute;tki op<s>is artykułu</s>Super kr&oacute;tki opis artykułu<sub>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykuł<s>u</s>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artySuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułukułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n	<li><sub><sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n	<li><sub><sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n</ul>\r\n', '2020-03-24', 'cc0a2ce0bc178059057c14bd9e8299df.png'),
(42, 'Fajny', 'Senior', 'asdasdasda', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</p>\r\n', '2020-03-26', '3cdae30f6efc96d7d6625cc73f51b5c7.jpg'),
(43, 'Tytuł', 'Senior', 'Dashboard', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</p>\r\n', '2020-03-24', 'aa7820227d251f441434fe4e112a9e1d.jpg'),
(44, 'asdasdasdasd', 'Senior', 'asdasdasdasd', '<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n', '2020-03-25', 'd6ac72d2ab7d2ea43433d3ea7270cf1f.jpg'),
(45, 'asdasdasd', 'Lekkoatletyka', 'asdasdasdasd', '<p>asdasdasdadsasdas<sub>dasdadsasdasdas</sub><s><sub>dadsasdasdasdadsasdasdas</sub>dadsa<u>sdasdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasda</u>sdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasdasdasdadsasdasdasdads</s></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(46, 'XD', 'Senior', 'ale śmieszny opis fajny krótki', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie<s>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</s></p>\r\n', '2020-03-24', 'df8788abb9774d4f3cc755f0c5e2d5c6.png'),
(47, 'Najświeższy post', 'Senior', 'Bardzo świeży jak bułeczka post', '<p>Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;</p>\r\n\r\n<p>Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;</p>\r\n\r\n<p>Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;</p>\r\n\r\n<p>Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;Bardzo duża bułka&nbsp;</p>\r\n', '2020-03-27', '421fd0d74c9d82dcacf9f9d38cbf9d81.jpg'),
(48, 'Tytuł', 'Senior', 'Dashboard', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</p>\r\n', '2020-03-24', 'aa7820227d251f441434fe4e112a9e1d.jpg'),
(49, 'asdasdasdasd', 'Senior', 'asdasdasdasd', '<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n\r\n<p><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em><em>siedze sobie&nbsp;</em></p>\r\n', '2020-03-25', 'd6ac72d2ab7d2ea43433d3ea7270cf1f.jpg'),
(50, 'Tytuł', 'Senior', 'Dashboard', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</p>\r\n', '2020-03-24', 'aa7820227d251f441434fe4e112a9e1d.jpg'),
(51, 'Tytuł fajny', 'Senior', 'Super krótki opis artykułuSuper krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<u>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</u></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(52, 'Tytuł', 'Senior', 'Dashboard', '<p>Iskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanieIskra Pszczyna _ Dashboard - dodanie</p>\r\n', '2020-03-24', 'aa7820227d251f441434fe4e112a9e1d.jpg'),
(53, 'Super', 'Senior', 'Super krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułuSuper krótki opis artykułu', '<ul>\r\n	<li>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<s>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSupe</s>r kr&oacute;tki op<s>is artykułu</s>Super kr&oacute;tki opis artykułu<sub>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykuł<s>u</s>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artySuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułukułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n	<li><sub><sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n	<li><sub><sup>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</sup></sub></li>\r\n</ul>\r\n', '2020-03-24', 'cc0a2ce0bc178059057c14bd9e8299df.png'),
(54, 'Tytuł fajny', 'Senior', 'Super krótki opis artykułuSuper krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<u>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</u></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(55, 'Tytuł fajny', 'Junior', 'Super krótki opis artykułuSuper krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<u>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</u></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(56, 'Tytuł fajny', 'Junior', 'Super krótki opis artykułuSuper krótki opis artykułu', '<p>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu<u>Super kr&oacute;tki opis artykułuSuper kr&oacute;tki opis artykułu</u></p>\r\n', '2020-03-24', '0c53c5eb6295e1922c53087548c6958b.jpg'),
(67, 'Super post', 'Junior', 'Najlepsze post', '<p>XD <strong>WideHardo</strong></p>\r\n\r\n<p><strong>hahahahhahahaha</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u>asdasdasdasd<s>asdasdasd</s></u></p>\r\n', '2020-04-01', 'df8788abb9774d4f3cc755f0c5e2d5c6.png'),
(68, 'Najlepszy tytuł', 'Lekkoatletyka', 'Bardzo krótki opis.', '<p>Super jest ta lekkoatletyka.</p>\r\n\r\n<p style=\"text-align:center\"><strong>Super zabawa</strong></p>\r\n\r\n<p style=\"text-align:center\"><em>Zdjęcia z zawod&oacute;w:</em></p>\r\n', '2020-04-14', '38aa3818aa17cc37db002406d735f651.jpg'),
(69, 'super tytuł', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasda</p>\r\n', '2020-04-14', 'bc20744f8d2d743acad23b829c1c45f9.jpg'),
(70, 'super tytuł', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasda</p>\r\n', '2020-04-14', 'bc20744f8d2d743acad23b829c1c45f9.jpg'),
(71, 'super tytuł', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasda</p>\r\n', '2020-04-14', 'bc20744f8d2d743acad23b829c1c45f9.jpg'),
(72, 'asdasd', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>asdasdasdasdasd<u>asdasdasdasdasd</u></em></strong></p>\r\n', '2020-04-14', 'd8fcc7daf7e96e851a73957c5185149b.jpg'),
(73, 'asdasd', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>asdasdasdasdasd<u>asdasdasdasdasd</u></em></strong></p>\r\n', '2020-04-14', 'd8fcc7daf7e96e851a73957c5185149b.jpg'),
(74, 'asdasd', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>asdasdasdasdasd<u>asdasdasdasdasd</u></em></strong></p>\r\n', '2020-04-14', 'd8fcc7daf7e96e851a73957c5185149b.jpg'),
(75, 'asdasd', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>asdasdasdasdasd<u>asdasdasdasdasd</u></em></strong></p>\r\n', '2020-04-14', 'd8fcc7daf7e96e851a73957c5185149b.jpg'),
(76, 'asdasd', 'Lekkoatletyka', 'asdasdas', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>asdasdasdasdasd<u>asdasdasdasdasd</u></em></strong></p>\r\n', '2020-04-14', 'd8fcc7daf7e96e851a73957c5185149b.jpg'),
(77, 'Wygrana mistrzostw świata', 'Lekkoatletyka', 'Super wygrana taka bardzo wielka *CIESZYMY SIĘ*', '<p>Ale wygraliśmy nie uwieżycie</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Zdjęcia z mistrzostw:</p>\r\n', '2020-04-14', '38aa3818aa17cc37db002406d735f651.jpg'),
(78, 'Atletyczna potyczka.', 'Lekkoatletyka', 'Ale była potyczka taka niesamowita.', '<p>&nbsp;Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;<strong>Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;&nbsp;Niesamowita potyczka.&nbsp;</strong></p>\r\n', '2020-04-14', '38aa3818aa17cc37db002406d735f651.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tabela`
--

CREATE TABLE `tabela` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `tabela`
--

INSERT INTO `tabela` (`id`, `nazwa`) VALUES
(1, 'ZINA Bielsko-Tychy Grupa 5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `w` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `img` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`id`, `name`, `w`, `p`, `r`, `points`, `img`) VALUES
(9, 'Barcelona', 1, 2, 1, 5, '94c2b62c5dec27be85743377d893a63c.png'),
(10, 'Juventus', 0, 0, 0, 100, 'b7f771ee5978e396dda0eb85c70902d6.png'),
(12, 'BVB', 0, 0, 0, 0, 'ac6077ad6688467b02bacce93b3be240.png'),
(13, 'Arsenal', 0, 0, 0, 0, '828f786d4cfd49a61cd72fddd1931b9a.png'),
(14, 'Manchester United', 0, 0, 0, 0, 'ffa17822d88bd5c7373e4c8c2e066bbf.png'),
(15, 'MKS Iskra Pszczyna', 5, 0, 0, 2, 'b598a1988f4f3d5746b9ba2159e0f269.png'),
(17, 'Real Madryt', 0, 0, 0, 0, '10ff66dfee4426f4643dd0eaa19ed0fd.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext COLLATE utf8_polish_ci NOT NULL,
  `pwd` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`) VALUES
(4, 'admin', '$2y$10$WPzWU3t.wK6y6GZLUlzDYu.9nWCQvdCrLfffk8ACXVNlH55oh6ptO');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `livechat`
--
ALTER TABLE `livechat`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `liveinfo`
--
ALTER TABLE `liveinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `mecze`
--
ALTER TABLE `mecze`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `livechat`
--
ALTER TABLE `livechat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `liveinfo`
--
ALTER TABLE `liveinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `mecze`
--
ALTER TABLE `mecze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT dla tabeli `posty`
--
ALTER TABLE `posty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT dla tabeli `tabela`
--
ALTER TABLE `tabela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
