-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 fév. 2022 à 21:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livredor`
--

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `etat` char(1) NOT NULL DEFAULT 'w'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `titre`, `photo`, `message`, `date`, `etat`) VALUES
(1, 'bonjour', 'photo1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. ', '2022-02-12', 'a'),
(2, 'MERCI', 'photo2.jpg', 'Merci pour cette tres bonne annee', '2022-05-25', 'a'),
(3, 'Quelle journee', 'photo3.jpg', 'Une belle petite journée\n\nSpéciale jolis souvenirs', '2022-02-15', 'a'),
(4, 'Un an chez les francais', 'photo6.jpg', 'du fond du ♥\n\nde partager cette journée\n\nDE BONHEUR', '2022-02-16', 'a'),
(5, 'Lorem ipsum', 'photo5.jpg', 'gjg', '2022-02-12', 'w'),
(6, 'Lorem ipsum', 'photo6.jpg', 'jhkj', '2022-02-21', 'w'),
(7, 'Lorem ipsum', 'photo7.jpg', 'jhkj', '2021-11-02', 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
