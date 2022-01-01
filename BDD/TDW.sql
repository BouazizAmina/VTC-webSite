SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arrive` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_transport` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `poid` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `moyen_transport` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_annonce`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

INSERT INTO `annonce` (`id_annonce`, `depart`, `arrive`, `titre`, `image`, `texte`, `type_transport`, `poid`,`volume`, `moyen_transport`) VALUES
(1,'alger centre', 'bab zouar', 'Transport Colis', '../assets/annonces/colis.jpg', 'je veux transporte un colis de ma maison qui se situe à
alger centre à la maison de mes parents à bab zouar', 'colis', '0<x<100gr', '0<x<100m3', 'Voiture'),
(2,'boufarik', 'alger centre', 'Transport Machine a Laver', '../assets/annonces/machine.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'électroménager', '0<x<100gr', '0<x<100m3', 'Fourgon'),
(3,'da elbaidha', 'bab zouar', 'Déménagement', '../assets/annonces/demenagememt.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'déménagement', '0<x<100gr', '0<x<100m3', 'Camionnette'),
(4,'thnia', 'samar', 'Transport Cuisinière', '../assets/news/Transmission_Covid-19.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'électroménager', '0<x<100gr', '0<x<100m3', 'Fourgon'),
(5,'klea', 'gue de constantine', 'Transport Fauteuil', '../assets/news/Transmission_Covid-19.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'meuble', '0<x<100gr', '0<x<100m3', 'Fourgon'),
(6,'el harrach', 'bab zouar', 'Transport Colis', '../assets/annonces/colis.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'colis', '0<x<100gr', '0<x<100m3', 'Voiture'),
(7,'blida', 'cheraga', 'Transport lettre', '../assets/news/Transmission_Covid-19.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'lettre', '0<x<100gr', '0<x<100m3', 'Voiture'),
(8,'rghaya', 'thnia', 'Transport Hotte aspirante', '../assets/news/Transmission_Covid-19.jpg', 'je veux transporte des fauteuils de ma maison à
alger centre à la maison de mes parents à bab zouar', 'électroménager', '0<x<100gr', '0<x<100m3', 'Fourgon');



DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xs_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

INSERT INTO `news` (`id_news`, `titre`, `texte`, `image`, `lien`) VALUES
(1,'Transmission du Covid-19','','../assets/news/Transmission_Covid-19.jpg','https://www.femmeactuelle.fr/sante/news-sante/transmission-du-covid-19-quelle-place-choisir-dans-les-transports-pour-limiter-les-risques-2125844'),
(2,'Norfolk: What does the future hold for countys new transport and energy schemes?','','../assets/news/new_transport.jpg','https://www.bbc.com/news/uk-england-norfolk-59812450'),
(3,'La technologie au service du transport de marchandises en Afrique','','../assets/news/village.jpg','https://www.bbc.com/afrique/region-59581079');



DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=ascii COLLATE=ascii_bin;


DROP TABLE IF EXISTS `transporteur`;
CREATE TABLE IF NOT EXISTS `transporteur` (
  `id_transporteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(30),
  `wilayas` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `certifie` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_transporteur`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
