-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3307
-- Létrehozás ideje: 2022. Feb 16. 12:24
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `projektokj`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ahighscores`
--

CREATE TABLE `ahighscores` (
  `aScoreId` int(11) NOT NULL,
  `aUId` int(11) NOT NULL,
  `aGId` int(11) NOT NULL,
  `aScorePoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ahighscores`
--

INSERT INTO `ahighscores` (`aScoreId`, `aUId`, `aGId`, `aScorePoints`) VALUES
(1, 5, 1, 879),
(2, 5, 3, 346),
(3, 11, 1, 967),
(4, 13, 1, 832),
(5, 7, 2, 8792),
(6, 14, 2, 9348),
(7, 10, 2, 7962),
(8, 13, 3, 478),
(9, 8, 3, 398);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `gameId` int(11) NOT NULL,
  `gameName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `gameType` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `gamePic` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `gameDesc` varchar(500) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`gameId`, `gameName`, `gameType`, `gamePic`, `gameDesc`) VALUES
(1, 'Call of Battlefield', 'action', 'gameone.png', 'This game is a fun first-person shooter set in the year 2098 where robots have taken over the planet.\r\nYour job is to get rid of the robots, gathering score with each destroyed unit.\r\nHave fun with a wide array of weapons to choose from, and save the planet!\r\n'),
(2, 'Legend of Zrolda', 'adventure', 'gametwo.png', 'This game is an adventurous title, beloved by all fans. \r\nIn this games medieval setting your job is to collect the pieces of the king’s crown and reforge it.\r\nPlayers get scored based on their preformance in the dungeons, killing skeletons, scavaging loot and completing side quests.\r\n'),
(3, 'Ratman', 'arcade', 'gamethree.png', 'Ratman is a game that needs to introduction, first introduced in the 1980s it has since long become an international sensation.\r\nYour objective is to gather the cheese pieces scattered throughout the map avoiding the AI controlled cats that are trying to stop you.\r\nTry to get a high score!\r\n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `minrequirements`
--

CREATE TABLE `minrequirements` (
  `minId` int(11) NOT NULL,
  `minGId` int(11) NOT NULL,
  `minOS` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `minProcessor` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `minMemory` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `minGPU` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `minStorage` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `minrequirements`
--

INSERT INTO `minrequirements` (`minId`, `minGId`, `minOS`, `minProcessor`, `minMemory`, `minGPU`, `minStorage`) VALUES
(1, 1, '64-bit Windows 10', 'Intel Core i5 6600k | AMD Ryzen 5 3600', '8', 'GeForce GTX 1050 Ti | Radeon RX 560', '100 GB'),
(2, 2, '64-bit Windows 7', 'Intel Core i3-3210 | AMD FX-4350', '4', 'GeForce GTX 750 | Radeon R7 260X', '5 GB'),
(3, 3, '64-bit Windows 7', '2.3 Ghz Processor', '2', 'Intel HD Graphics 3000', '1500 MB');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nhighscores`
--

CREATE TABLE `nhighscores` (
  `nScoreId` int(11) NOT NULL,
  `nUId` int(11) NOT NULL,
  `nGId` int(11) NOT NULL,
  `nScorePoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `owngames`
--

CREATE TABLE `owngames` (
  `ownId` int(11) NOT NULL,
  `ownUId` int(11) NOT NULL,
  `ownGId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `recrequirements`
--

CREATE TABLE `recrequirements` (
  `recId` int(11) NOT NULL,
  `recGId` int(11) NOT NULL,
  `recOS` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `recProcessor` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `recMemory` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `recGPU` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `recStorage` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `recrequirements`
--

INSERT INTO `recrequirements` (`recId`, `recGId`, `recOS`, `recProcessor`, `recMemory`, `recGPU`, `recStorage`) VALUES
(1, 1, '64-bit Windows 10', 'Intel Core i7 4790 | AMD Ryzen 7 2700X', '16', 'GeForce RTX 3060 | Radeon RX 6600 XT', '100 GB'),
(2, 2, '64-bit Windows 7', 'Core i5-6400 | Ryzen 3 1200', '6', 'GeForce GTX 1060 6 GB | Radeon RX 470', '5 GB'),
(3, 3, '64-bit Windows 7', '2.69 Ghz Processor', '8', 'Intel HD Graphics 3000', '1500 MB');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userEmail` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userPicture` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `userAdmin` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userEmail`, `userPicture`, `userAdmin`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', NULL, b'0'),
(2, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@test.com', NULL, b'0'),
(3, 'godo', 'e8b554a5700433e00c24dc9df0b079de', 'godo@istvan.com', NULL, b'0'),
(4, 'lol', '6f4a9ff0ca341363419a66083c626c00', 'lol@asd.com', NULL, b'0'),
(5, 'Borderheart', 'cab8c6b15a392c3d1c85ef0dc29e6442', 'Borderheart@email.com', NULL, b'0'),
(6, 'Bulletreign', '729722e19b83eb8f62cfe7806fea9cb2', 'bulletreign@bruh.com', NULL, b'0'),
(7, 'Blockfire', '417f2ef09dbd8bfaef894325ca3586f2', 'blockfire54@gmail.com', NULL, b'0'),
(8, 'Bladenite', '4e7eddc9036d7af5eaf70a03d08996cc', 'BladenIte@generic.com', NULL, b'0'),
(9, 'Dreadflight', '1c9d771d5219983d1eac1516b7716cb7', 'dreadflight@email.com', NULL, b'0'),
(10, 'Madcry', 'c2f45ed91cd7b1f6aa4d4673f1363f4f', 'Madcry@email.com', NULL, b'0'),
(11, 'Altermind', '4348a634d46fdda858bc472d696ad347', 'Altermind@email.com', NULL, b'0'),
(12, 'Endorflight', 'c5eb0fa50599da6f10119253a686c324', 'Endorflight@email.com', NULL, b'0'),
(13, 'Bladerain', '2c2331ac81668bd7af881bd7b092eeb8', 'Bladerain@email.com', NULL, b'0'),
(14, 'Fuserage', '00e296f7d554db0248d8b16479334ec4', 'Fuserage@email.com', NULL, b'0');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ahighscores`
--
ALTER TABLE `ahighscores`
  ADD PRIMARY KEY (`aScoreId`),
  ADD KEY `aUId` (`aUId`),
  ADD KEY `aGId` (`aGId`);

--
-- A tábla indexei `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameId`);

--
-- A tábla indexei `minrequirements`
--
ALTER TABLE `minrequirements`
  ADD PRIMARY KEY (`minId`),
  ADD KEY `minGId` (`minGId`);

--
-- A tábla indexei `nhighscores`
--
ALTER TABLE `nhighscores`
  ADD PRIMARY KEY (`nScoreId`),
  ADD KEY `nUId` (`nUId`),
  ADD KEY `nGId` (`nGId`);

--
-- A tábla indexei `owngames`
--
ALTER TABLE `owngames`
  ADD PRIMARY KEY (`ownId`),
  ADD KEY `ownUId` (`ownUId`),
  ADD KEY `ownGId` (`ownGId`);

--
-- A tábla indexei `recrequirements`
--
ALTER TABLE `recrequirements`
  ADD PRIMARY KEY (`recId`),
  ADD KEY `recGId` (`recGId`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ahighscores`
--
ALTER TABLE `ahighscores`
  MODIFY `aScoreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `minrequirements`
--
ALTER TABLE `minrequirements`
  MODIFY `minId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `nhighscores`
--
ALTER TABLE `nhighscores`
  MODIFY `nScoreId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `owngames`
--
ALTER TABLE `owngames`
  MODIFY `ownId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `recrequirements`
--
ALTER TABLE `recrequirements`
  MODIFY `recId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ahighscores`
--
ALTER TABLE `ahighscores`
  ADD CONSTRAINT `ahighscores_ibfk_1` FOREIGN KEY (`aUId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `ahighscores_ibfk_2` FOREIGN KEY (`aGId`) REFERENCES `games` (`gameId`);

--
-- Megkötések a táblához `minrequirements`
--
ALTER TABLE `minrequirements`
  ADD CONSTRAINT `minrequirements_ibfk_1` FOREIGN KEY (`minGId`) REFERENCES `games` (`gameId`);

--
-- Megkötések a táblához `nhighscores`
--
ALTER TABLE `nhighscores`
  ADD CONSTRAINT `nhighscores_ibfk_1` FOREIGN KEY (`nUId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `nhighscores_ibfk_2` FOREIGN KEY (`nGId`) REFERENCES `games` (`gameId`);

--
-- Megkötések a táblához `owngames`
--
ALTER TABLE `owngames`
  ADD CONSTRAINT `owngames_ibfk_1` FOREIGN KEY (`ownUId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `owngames_ibfk_2` FOREIGN KEY (`ownGId`) REFERENCES `games` (`gameId`);

--
-- Megkötések a táblához `recrequirements`
--
ALTER TABLE `recrequirements`
  ADD CONSTRAINT `recrequirements_ibfk_1` FOREIGN KEY (`recGId`) REFERENCES `games` (`gameId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
