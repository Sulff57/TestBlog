-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 16:38
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`, `source`) VALUES
(1, 'Bienvenue sur mon blog !', 'Blog de test qui me servira à travailler mon PHP / CSS / SQL / JS... en implémentant de nouvelles fonctionnalités au fur et à mesure.', '2019-03-25 16:28:41', NULL),
(2, 'GitHub & sources', 'Les sources de développement du blog sont disponibles sur https://github.com/Sulfz/TestBlog', '2019-03-27 18:31:11', 'https://github.com/Sulfz/TestBlog'),
(21, 'La Nintendo Switch ” boostée ” depuis la mise à jour 8.0.0', '\"Nous ne l’avions pas vu venir, et pourtant ! Depuis la mise à jour 8.0.0 du 16 avril 2019, la Nintendo Switch embarque ce que l’on peut appeler un ” boost mode ” bien caché dans ses entrailles. Ce n’est pas un secret, la console hybride de Nintendo n’est pas la machine la plus puissante de sa génération, et même certains titres phares en pâtissent par moments (coucou la forêt de Zelda Breath of the Wild). Il est apparu que certaines choses risquent de s’améliorer grâce au boost mode en question. Celui-ci permet purement et simplement d’overclocker le processeur de la console, le faisant passer de 1Ghz à 1,75Ghz lorsque la console le désire, et lorsque cela est réellement nécessaire.\"', '2019-05-05 15:17:00', 'https://www.switch-actu.fr/actualites/console/la-nintendo-switch-boostee-depuis-la-mise-a-jour-8-0-0/'),
(22, 'AMD pourrait dévoiler ses GPU Navi dès l\'E3', 'L\'été approche, et avec lui, les multiples lancements d\'AMD. C\'est surtout au niveau de ses prochains GPU que la marque est attendue, puisqu\'ils doivent apporter un nouveau souffle aux Radeon,mais aussi aux consoles de salon. L\'E3 serait ainsi le show parfait pour les présenter, pensent certains de nos confrères...', '2019-05-05 18:13:00', 'https://www.inpact-hardware.com/article/1272/amd-pourrait-devoiler-ses-gpu-navi-des-e3'),
(23, 'Le Ryzen 3 3200G d\'AMD commence à se montrer', 'Continuant de décliner son offre actuelle dans l\'attente des premiers processeurs en 7 nm, AMD devrait proposer des APU légèrement améliorés dans une série 3x00G (Picasso). Un premier modèle commence à fuiter.\r\n\r\nDeux ans après le lancement de l\'architecture Zen, AMD en est encore à multiplier ses dérivés, modifiant plus les dénominations que ses équipes n\'apportent d\'améliorations. On l\'a vu sur le mobile, cela devrait aussi être le cas pour les processeurs de bureau avec des APU 3x00G (Picasso) disposant seulement de fréquences plus élevées que leurs prédécesseurs...', '2019-05-05 18:15:00', 'https://www.inpact-hardware.com/article/1290/le-ryzen-3-3200g-damd-commence-a-se-montrer'),
(24, 'Un tube chirurgical autonome apprend à naviguer vers le cœur par lui-même', '\"Des chercheurs ont mis au point un cathéter robotique autonome capable d\'atteindre le cœur d\'un patient par lui-même.\r\n\r\nCe n\'est autre qu\'un Français, Pierre Dupont, appuyé par ses collègues de la Harvard Medical School, qui a mis au point l\'un des premiers tubes chirurgicaux capable de naviguer par lui-même jusqu\'au cœur d\'un patient. Une innovation de taille dans le domaine de la cardiologie qui, en s\'aventurant vers le cœur de la manière la plus exacte et la plus directe qui soit, pourra aussi bien perfectionner les opérations que les traitements cardiologiques....\"', '2019-05-05 18:17:00', 'https://www.clubic.com/sante/actualite-855633-tube-chirurgical-autonome-apprend-naviguer.html'),
(25, 'Finalement, Intel devrait bel et bien livrer ses puces Ice Lake 10 nm cette année', '\"Intel nous a fait mentir, et c\'est tant mieux. Dans un article publié ce vendredi, nous évoquions l\'éventualité d\'un nouveau report de la gravure 10 nm chez Intel. Ce report devait conduire la firme de Santa Clara à ne proposer des processeurs basés sur son nouveau protocole de gravure qu\'à l\'horizon 2021-2022. Finalement, la première gamme de CPUs 10 nm, la lignée Ice Lake-U, arrivera bien cette année.\r\n\r\nParallèlement à cette rumeur de report, Intel publiait en fin de semaine dernière ses résultats trimestriels. L\'occasion pour la firme et son CEO, Bob Swan, de revenir sur le cas du 10 nm et d\'annoncer l\'arrivée prochaine d\'une première vraie fournée de puces profitant du nouveau process : les processeurs Ice Lake-U pour ordinateurs portables. Ces derniers devraient être disponibles aux OEM dès cet été, comme prévu initialement...\"', '2019-05-05 18:19:00', 'https://www.clubic.com/processeur/processeur-intel/actualite-855679-intel-bel-livrer-puces-ice-lake-10-nm.html'),
(26, 'La capture d\'écran étendue sur Android Stock est \"infaisable\" d\'après Google', '\"Pourquoi Android Stock ne propose-t-il pas nativement de capture d\'écran étendue ? La réponse est simple et provient directement de Google : la chose serait « infaisable ».\r\n\r\nLa capture d\'écran étendue (ou scrolling screenshots) permet de capturer l\'ensemble d\'une page web ou d\'un contenu dépassant le seul cadre de l\'écran. Une fonctionnalité bigrement pratique pour enregistrer, par exemple, l\'intégralité d\'une page sans être forcé de procéder à plusieurs captures distinctes. D\'après Google, intégrer cette feature à Android Stock (version entièrement native d\'Android proposée notamment sur les Google Pixel) ne serait toutefois pas au programme...\"', '2019-05-05 18:25:00', 'https://www.clubic.com/os-mobile/android/actualite-855834-capture-ecran-etendue-android-stock-infaisable-google.html'),
(27, 'En Suisse, la police s\'équipe de Tesla Model X pour réduire les coûts', '\"La police suisse a déployé les premières Tesla Model X acquises auprès du constructeur californien. Un choix motivé par les économies réalisées en termes de coûts d\'essence et d\'entretien.\r\n\r\nSi Tesla s\'installe définitivement dans le cœur des utilisateurs férus de voitures électriques, ses modèles suscitent un intérêt tout aussi grand auprès des forces de l\'ordre du monde entier. L\'année dernière, l\'appel d\'offres lancé par la police de Bâle, en Suisse, avait par exemple été remporté par la firme californienne : un an plus tard, les sept Model X 100D commandées par l\'administration helvète pointent enfin le bout de leur nez...\"', '2019-05-05 18:26:00', 'https://www.clubic.com/pro/entreprises/tesla/actualite-855665-suisse-police-equipe-tesla-model-reduire-couts.html'),
(28, 'Réalité virtuelle : le Valve Index offrira 1440×1600 par œil à 120/144 Hz', '\"Dévoilé début avril, le Valve Index commence à livrer ses secrets en attendant une commercialisation prévue tout au long de l\'été.\r\n\r\nValve nous donne ainsi moult détails concernant son nouveau casque de réalité virtuelle, à commencer par la résolution affichée par ses deux écrans et la fréquence de rafraîchissement de ceux-ci...\"', '2019-05-05 18:27:00', 'https://www.clubic.com/casque-vr/actualite-856013-realite-virtuelle-valve-index-offrira-1440-1600-oeil-120-144-hz.html'),
(29, 'Accord avec Apple : un jackpot à presque 5 milliards de dollars pour Qualcomm', '\"Le solde du conflit entre les deux marques va rapporter gros à Qualcomm. L’entreprise prévoit ainsi de multiplier presque par deux son chiffre d’affaires au prochain trimestre.\r\nLe fabricant de puces Qualcomm a indiqué ce mercredi 1er mai que l\'accord signé avec Apple pour solder deux ans de guerre juridique autour du prix de ses licences lui rapporterait entre 4,5 et 4,7 milliards de dollars pour le trimestre en cours...\"', '2019-05-05 18:30:00', 'https://www.01net.com/actualites/accord-avec-apple-un-jackpot-a-presque-5-milliards-de-dollars-pour-qualcomm-1683841.html'),
(30, 'Le OnePlus 7 Pro se dévoile à quelques jours de son lancement', '\"Des images qui semblent officielles ont été dévoilées sur Internet. On y aperçoit un appareil sans aucune encoche.\r\nLe très attendu OnePlus 7 Pro se dévoile encore un peu plus. Des images qui semblent être les visuels officiels du smartphone ont été dévoilés par le site allemand WinFuture et le compte Twitter d’Ishan Agarwal...\"', '2019-05-05 18:31:00', 'https://www.01net.com/actualites/le-oneplus-7-pro-se-devoile-a-quelques-jours-de-son-lancement-1684393.html'),
(31, 'Malgré les bonnes ventes du Galaxy S10, les profits de Samsung s\'effondrent de 60%', '\"Samsung Electronics vient de publier ses résultats pour le premier trimestre 2019. Le Coréen confirme traverser une tempête. \r\nCes trois derniers mois, Samsung a réalisé un chiffre d\'affaires de 52,39 billions de won, soit 40,1 milliards d\'euros. De ce résultat, la marque coréenne tire un profit de 6,23 billions de won, ce qui représente 4,77 milliards d\'euros. Un résultat impressionnant selon vous ? Nuançons-le tout de même, Samsung avait réalisé un profit de 15,64 billions de won l\'an passé (pratiquement 12 milliards d\'euros), ce qui représente une baisse de… 60 %...\"', '2019-05-05 18:32:00', 'https://www.01net.com/actualites/malgre-les-bonnes-ventes-du-galaxy-s10-les-profits-de-samsung-s-effondrent-de-60percent-1682875.html'),
(32, 'Nantes: Microsoft ouvre une école et un «laboratoire» en intelligence artificielle', '\"Présentée par certains comme la quatrième révolution industrielle, l’intelligence artificielle pourrait bouleverser les pratiques des entreprises dans les prochaines années, et pas que celles du secteur du numérique. « Parce que tous les professionnels vont être concernés et qu’il y a un fort besoin de démocratisation », Microsoft a annoncé, ce jeudi, l’implantation à Nantes d’un « lab » ainsi que d’une école de formation...\"', '2019-05-05 18:35:00', 'https://www.20minutes.fr/high-tech/2504371-20190425-nantes-microsoft-ouvre-ecole-laboratoire-intelligence-artificielle');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(6, 1, 'Test2', '     Test', '0000-00-00 00:00:00'),
(7, 1, 'Test2', 'Test2', '2019-04-20 00:24:02'),
(8, 1, 'Test2', '', '2019-04-24 20:59:47');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `password`) VALUES
(1, 'test', 'valo@gmail.com', '$2y$10$aPIjcRlofqjW5VhwHMrjLesyzAdNhJ9zoVltY9RDDEe09sf9cpvz6'),
(2, 'Test2', 'test2@gmail.com', '$2y$10$BODkfQDMEKwe9ke2L6982OqFNdeW4ClzdWcX8PYnvmoy26SFfOb1i'),
(3, 'Test2', 'valo.brice@gmail.com', '$2y$10$YGPngsgElUOx7QgUI.cxbuTPaosYfOJ99rfqMYHei6g0NS89.iqaG'),
(4, 'Test2', 'valo.brice@gmail.com', '$2y$10$BUYglpnZiEHhNR.D0M7hLejqgoyF0oyBfYWxRsKjGHKZyTXFQc58G');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`, `date`) VALUES
(1, 'Tom', 'Il fait beau aujourd\'hui, vous ne trouvez pas ?', '2019-03-29 23:34:56'),
(2, 'John', 'Ouais, ça faisait un moment qu\'on n\'avait pas vu la lumière du soleil !', '2019-03-29 23:34:56'),
(3, 'Sluf', 'eee', '2019-03-29 23:34:56'),
(4, 'fezrzre', 'rezzer', '2019-03-29 23:34:56'),
(5, 'ee', 'ee', '2019-03-29 23:34:56'),
(6, 'eee', 'eee', '2019-03-29 23:34:56'),
(7, 'Fefzz', '', '2019-03-29 23:34:56'),
(8, 'eee', 'ee', '2019-03-29 23:34:56'),
(9, 'fezrfzer', 'rezezr', '2019-03-29 23:34:56'),
(10, 'fzerzer', 'rzzer', '2019-03-29 23:34:56'),
(11, 'fzefez', 'erzrze', '2019-03-29 23:34:56'),
(12, 'rzerzer', 'rezerze', '2019-03-29 23:34:56'),
(13, 'fezfze', 'ferzfez', '2019-03-29 23:34:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
