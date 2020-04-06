-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 06 avr. 2020 à 20:38
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oop_ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminUser` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPass` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'saga', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(50) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Samsung'),
(3, 'Iphone');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `catId` int(100) NOT NULL,
  `catName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Footwear'),
(7, 'Jewellery'),
(9, 'Bag');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
