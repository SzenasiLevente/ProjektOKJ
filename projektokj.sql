-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jan 31. 10:57
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `gameId` int(11) NOT NULL,
  `gameName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `gameType` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `gamePic` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
(2, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@test.com', NULL, b'0');

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
  MODIFY `aScoreId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `minrequirements`
--
ALTER TABLE `minrequirements`
  MODIFY `minId` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `recId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
