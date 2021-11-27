-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 nov. 2021 à 23:41
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dokini`
--

-- --------------------------------------------------------

--
-- Structure de la table `saison_product`
--

CREATE TABLE `saison_product` (
  `name` text NOT NULL,
  `saison` text NOT NULL,
  `tag` text NOT NULL,
  `local` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO 'saison_product' ('name', 'saison', 'tag', 'local') VALUES
('Fraise', '[4, 5, 6]', 'fr', 1),
('Pomme', '[0, 1, 2, 3, 7, 8, 9, 10, 11]', 'fr', 1),
('Orange', '[0, 1, 2]', 'fr',0),
('Citron', '[0, 1]', 'fr', 0),
('Ail', '[6, 7, 8, 9, 10, 11]', 'fr', 1),
('Artichaut', '[4, 5, 6, 7, 8]', 'fr', 1),
('Asperge', '[3, 4, 5]', 'fr', 1),
('Betterave', '[0, 1, 2, 9, 10, 11]', 'fr', 1),
('Blette', '[5, 6, 7, 8, 9, 10]', 'fr', 1),
('Carotte', '[0, 1, 2, 8, 9, 10, 11]', 'fr', 1),
('Céleri', '[0, 1, 2, 9, 10, 11]', 'fr', 1),
('Champignon de Paris', '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]', 'fr', 1),
('Chou', '[0, 1, 2, 9, 10, 11]', 'fr', 1),
('Chou de Bruxelles', '[0, 1, 2, 9, 10, 11]', 'fr', 1),
('Chou-fleur','[0, 1, 2, 8, 9, 10, 11]', 'fr', 1),
('Concombre', '[4, 5, 6, 7, 8, 9]', 'fr', 1),
('Courge', '[0, 8, 9, 10, 11]', 'fr', 1),
('Courgette', '4, 5, 6, 7, 8, 9]', 'fr', 1),
('Cresson', '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]', 'fr', 1),
('Echalote', '[9, 10, 11]', 'fr', 1),
('Endive', '[0, 1, 2, 3, 4, 9]', 'fr', 1),
('Epinard', '[0, 1, 2, 3, 4, 8, 9, 10, 11]', 'fr', 1),
('Fenouil', '[3, 5, 6, 7, 8, 9, 10]', 'fr', 1),
('Haricot vert', '[5, 6, 7, 8, 9]', 'fr', 1),
('Laitue', '[4, 5, 6, 7, 8]', 'fr', 1),
('Mâche', '[0, 1, 9, 10, 11]', 'fr', 1),
('Navet', '[0, 1, 2, 3, 4, 9, 10, 11]', 'fr', 1),
('Maïs', '[6, 7, 8]', 'fr', 1),
('Oignon', '[0, 1, 2, 3, 8, 9, 10, 11]', 'fr', 1),
('Panais', '[0, 1, 2, 9, 10, 11]', 'fr', 1),
('Petit pois', '[4, 5, 6]', 'fr', 1),
('Poireau', '[0, 1, 2, 3, 8, 9, 10, 11]', 'fr', 1),
('Poivron', '[5, 6, 7, 8]', 'fr', 1),
('Potiron', '[0, 8, 9, 10, 11]', 'fr', 1),
('Radis', '[2, 3, 4, 5]','fr', 1),
('Salsifis', '[0, 1, 2, 10, 11]', 'fr', 1),
('Topinambour', '[0, 1, 10, 11]', 'fr', 1),
('Cassis', '[5, 6, 7]', 'fr', 1),
('Châtaigne', '[9, 10]', 'fr', 1),
('Clémentine', '[0, 1, 10, 11]', 'fr', 1),
('Pamplemousse', '[1, 2, 3, 4, 5]', 'fr', 1),
('Coing', '[9]', 'fr', 1),
('Figue', '[6, 7, 8, 9]', 'fr', 1),
('Groseille', '[5, 6, 7]', 'fr', 1),
('Kiwi', '[0, 1, 2, 10, 11]', 'fr', 1),
('Mandarine', '[0, 1, 10, 11]', 'fr', 0),
('Melon', '[5, 6, 7, 8]', 'fr', 1),
('Mirabelle', '[7, 8]', 'fr', 1),
('Mûre', '[7, 8]', 'fr', 1),
('Nectarine', '[7, 8]', 'fr', 1),
('Myrtille', '[6, 7, 8]', 'fr', 1),
('Noisette', '[8, 9, 10]', 'fr', 1),
('Noix', '[8, 9]', 'fr', 1),
('Prune', '[6, 7, 8]', 'fr', 1),
('Quetsche', '[7, 8, 9]', 'fr', 1),
('Reine Claude','[8]', 'fr', 1),
('Rhubarbe', '[3, 4, 5]', 'fr', 1),
('Pêche', '[5, 6, 7, 8]', 'fr', 1),
('Cerise', '[5, 6]', 'fr', 1),
('Abricot', '[5, 6, 7]', 'fr', 1),
('Framboise', '[5, 6, 7]', 'fr', 1),
('Poire', '[0, 1, 2, 7, 8, 9, 10, 11]',' fr', 1),
('Raisin', '[8, 9]', 'fr', 1),
('Aubergine','[5, 6, 7, 8]', 'fr', 1),
('Brocoli', '[8, 9, 10]', 'fr', 1),
('Tomate', '[5, 6, 7, 8]', 'fr', 1),
('Ananas', '[0, 1, 2, 10, 11]', 'fr', 0),
('Banane', '[0, 1, 2, 3]', 'fr', 0),
('Mangue', '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]', 'fr', 0),
('Avocat', '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]', 'fr', 0),
('Carambole','[0, 10, 11]', 'fr', 0),
('Datte', '[0, 9, 10, 11]', 'fr', 0),
('Fruit de la passion', '[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]', 'fr', 0),
('Grenade', '[0, 1, 10, 11]', 'fr', 0),
('Kaki','[0, 9, 10, 11]', 'fr', 0),
('Noix de coco', '[0, 1, 10, 11]', 'fr', 0),
('Pastèque', '[5, 6, 7, 8]', 'fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` text NOT NULL,
  `hash_psswd` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `premuim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
