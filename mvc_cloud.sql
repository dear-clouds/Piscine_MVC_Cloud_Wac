-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 14 Septembre 2014 à 15:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mvc_cloud`
--

-- --------------------------------------------------------

--
-- Structure de la table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `size` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `url`, `user_id`, `created_at`, `updated_at`, `size`, `description`, `extension`, `type`) VALUES
(24, 'boubou', 'uploads/sCPnOSmLmQF6TDTdslGw.jpg', 1, '2014-09-09 17:20:33', '2014-09-09 19:09:48', 879394, 'C''est moche...', 'jpg', ''),
(27, 'COOLRAOUL', 'uploads/bQJySTHrld3z4eMK691R.jpg', 1, '2014-09-09 18:45:12', '2014-09-09 18:45:25', 780831, 'Salut je suis un koala ! <3', 'jpg', ''),
(29, 'WZQ3I60Inc0aohCS8gyS', 'uploads/WZQ3I60Inc0aohCS8gyS.jpg', 1, '2014-09-10 08:04:40', '2014-09-10 08:04:40', 561276, 'Un phare...', 'jpg', ''),
(31, 'Fuck les tulipes', 'uploads/3Dzt9rwSVMvhmnrBNNCd.jpg', 1, '2014-09-10 08:39:10', '2014-09-10 09:37:42', 620888, '?(??´??', 'jpg', ''),
(32, 'vWBzVZrymw6V3qHT0m26', 'uploads/vWBzVZrymw6V3qHT0m26.jpg', 1, '2014-09-10 08:39:34', '2014-09-10 08:39:34', 595284, '', 'jpg', ''),
(34, 'jOYJ5VyEr8wWcILqYHM6', 'uploads/jOYJ5VyEr8wWcILqYHM6.jpg', 1, '2014-09-10 08:51:24', '2014-09-10 08:51:24', 879394, '', 'jpg', 'image/jpeg'),
(35, 'Super méduse !', 'uploads/yrc7VN10sRERdJD2Uvf6.jpg', 1, '2014-09-10 08:51:49', '2014-09-10 09:36:47', 775702, ':)', 'jpg', 'image/jpeg'),
(42, 'Yeah', 'uploads/FTD1Ufttmf9orXuRGdhq.jpg', 2, '2014-09-10 13:19:09', '2014-09-10 13:19:33', 720576, 'KAMEN RIDER o/', 'jpg', 'image/jpeg'),
(43, 'BfLV045SzMRywO9J526N', 'uploads/BfLV045SzMRywO9J526N.jpg', 13, '2014-09-10 13:25:41', '2014-09-10 13:25:41', 59339, 'POTATOES~!', 'jpg', 'image/jpeg'),
(45, 'rAkUS1vvF2tgM3PIPFx9', 'uploads/ReddoWan/rAkUS1vvF2tgM3PIPFx9.jpg', 1, '2014-09-11 07:35:28', '2014-09-11 07:35:28', 70681, '', 'jpg', 'image/jpeg'),
(47, 'ASjp6MhJSVkqroZ90LeT', 'uploads/Kamen Rider/ASjp6MhJSVkqroZ90LeT.jpg', 2, '2014-09-11 14:08:10', '2014-09-11 14:08:10', 70681, '', 'jpg', 'image/jpeg'),
(48, 'Lie7I3BkDBQiJZl3G7w7', 'uploads/Patate/Lie7I3BkDBQiJZl3G7w7.jpg', 13, '2014-09-11 14:27:17', '2014-09-11 14:27:17', 122007, 'Madame patate', 'jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'utilisateur',
  `remember_token` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `birthdate`, `email`, `created_at`, `updated_at`, `role`, `remember_token`) VALUES
(1, 'ReddoWan', '$2y$10$VpEi5mJdTinblQGyKgwINeaPxfN/3TLpG7L6/h.Xz7VkkjomRL3ue', 'Reddo', 'Wan', '1990-12-18', 'manorie.kam-oon@epitech.eu', '2014-09-08 09:44:31', '2014-09-14 10:48:56', 'administrateur', 'iqLWqXj63l9ByZliTQvti59RyDbmE7YwPZHDHlfgZxTgUWdF0gTdLDRpunvs'),
(2, 'Kamen Rider', '$2y$10$VpEi5mJdTinblQGyKgwINeaPxfN/3TLpG7L6/h.Xz7VkkjomRL3ue', 'Kamen', 'Rider', '0000-00-00', 'kamenrider@live.fr', '0000-00-00 00:00:00', '2014-09-12 07:28:02', 'administrateur', 'dvLxJbOaHA3qaHGSjVPZkHO2HaUUQGP2xyhdU8seJg6VSoHghU2CcSTfOvRN'),
(13, 'Patate', '$2y$10$LoNcqX9uZKaAS8UtQlFhHevz2xiueXOeQS3lZOv8sgMV0bkcwOPYm', '', '', '0000-00-00', 'patate@gmail.com', '0000-00-00 00:00:00', '2014-09-12 07:28:27', 'utilisateur', 'mDagKuv742y1PXO1wwWyrXDHk82qT1EkmswlH4v9AYpmEIncYq93LqDD4E3F'),
(15, 'Connard', '$2y$10$utK6kuWiklV3DzTQNrjlsOHj0mSXgwTN5nxVrraJh/dE9ONkE/1RS', '', '', '0000-00-00', 'connard@gmail.com', '0000-00-00 00:00:00', '2014-09-11 08:29:41', 'utilisateur', ''),
(16, 'PZJ', '$2y$10$D26/mbRlWjX0hNazICtqiu/f8IbJ2GJoaFuYYEMAJvf8z8.fAJz8C', 'Yolo', '', '1999-12-17', 'goe@gmail.com', '0000-00-00 00:00:00', '2014-09-11 08:29:46', 'utilisateur', ''),
(17, 'ofe', '$2y$10$eHmh7u98rCXgp.qAA6fIYu3H8sfipPq.Fo7TawSVqX5RJp520BQAK', '', '', '7828-07-17', 'ofve@gmail.com', '0000-00-00 00:00:00', '2014-09-11 08:29:52', 'utilisateur', ''),
(18, 'Pzrfg', '$2y$10$jur2riC3Wm6jBWP4gnohg.8h1xP7L/o80koEXmyyIkgZsoDnNRicW', '', '', '0000-00-00', 'poanfvg@gmail.com', '0000-00-00 00:00:00', '2014-09-11 08:29:58', 'utilisateur', ''),
(19, 'Lol', '$2y$10$pnMfYh0wH0lxs3f5uw5xDuCjtqk44w1BMAupxpaJ3tzo..twxXaXS', '', '', '0000-00-00', 'lol@gmail.com', '2014-09-09 09:14:16', '2014-09-14 10:51:38', 'utilisateur', 'yuhel4VVuO5PWY9b1Ca8xXfVbp7DxMAqom6ikXLIRO48rQFdnKIS0MxSmlhz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
