-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 sep. 2021 à 17:58
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etai_intranet`
--

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_accesfiches`
--

CREATE TABLE `etai_intranet_accesfiches` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `email` int(11) NOT NULL DEFAULT 1,
  `tel` int(1) NOT NULL DEFAULT 0,
  `adresse` int(1) NOT NULL DEFAULT 0,
  `cp` int(1) NOT NULL DEFAULT 0,
  `ville` int(1) NOT NULL DEFAULT 0,
  `genre` int(1) NOT NULL DEFAULT 1,
  `naissance` int(1) NOT NULL DEFAULT 0,
  `nom` int(1) NOT NULL DEFAULT 0,
  `prenom` int(1) NOT NULL DEFAULT 0,
  `facebook` int(1) NOT NULL DEFAULT 0,
  `twister` int(1) NOT NULL DEFAULT 0,
  `site` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_accesfiches`
--

INSERT INTO `etai_intranet_accesfiches` (`id`, `id_membre`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `facebook`, `twister`, `site`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(3, 3, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
(4, 4, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(5, 5, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0),
(6, 6, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(7, 7, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(8, 8, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(9, 9, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(10, 10, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(11, 11, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(12, 12, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(13, 13, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(14, 14, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(15, 15, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(16, 16, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(17, 17, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(18, 18, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(19, 19, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(20, 20, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(21, 21, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(22, 22, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(23, 23, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(24, 24, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(25, 25, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(26, 26, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(27, 27, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(28, 28, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(29, 29, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(30, 30, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_activation`
--

CREATE TABLE `etai_intranet_activation` (
  `id` int(11) NOT NULL,
  `mode` varchar(150) CHARACTER SET latin1 NOT NULL,
  `activation` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_activation`
--

INSERT INTO `etai_intranet_activation` (`id`, `mode`, `activation`) VALUES
(1, 'aucune', 0),
(2, 'mail', 0),
(3, 'manuel', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_activationmail`
--

CREATE TABLE `etai_intranet_activationmail` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `jeton` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_avatar`
--

CREATE TABLE `etai_intranet_avatar` (
  `id` int(11) NOT NULL,
  `url` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_avatar`
--

INSERT INTO `etai_intranet_avatar` (`id`, `url`) VALUES
(1, 'design/image/avatar/1.png'),
(2, 'design/image/avatar/2.png'),
(3, 'design/image/avatar/3.png'),
(4, 'design/image/avatar/4.png'),
(5, 'design/image/avatar/5.png'),
(6, 'design/image/avatar/6.png'),
(7, 'design/image/avatar/7.png'),
(8, 'design/image/avatar/8.png'),
(9, 'design/image/avatar/9.png'),
(10, 'design/image/avatar/10.png'),
(11, 'design/image/avatar/11.png'),
(12, 'design/image/avatar/12.png'),
(13, 'design/image/avatar/13.png'),
(14, 'design/image/avatar/14.png'),
(15, 'design/image/avatar/15.png'),
(16, 'design/image/avatar/16.png'),
(17, 'design/image/avatar/17.png'),
(18, 'design/image/avatar/18.png'),
(19, 'design/image/avatar/19.png'),
(20, 'design/image/avatar/20.png'),
(21, 'design/image/avatar/21.png'),
(22, 'design/image/avatar/22.png'),
(23, 'design/image/avatar/23.png'),
(24, 'design/image/avatar/24.png'),
(25, 'design/image/avatar/25.png'),
(26, 'design/image/avatar/26.png'),
(27, 'design/image/avatar/27.png'),
(28, 'design/image/avatar/28.png'),
(29, 'design/image/avatar/29.png'),
(30, 'design/image/avatar/30.png'),
(31, 'design/image/avatar/31.png'),
(32, 'design/image/avatar/32.png'),
(33, 'design/image/avatar/33.png'),
(34, 'design/image/avatar/34.png'),
(35, 'design/image/avatar/35.png'),
(36, 'design/image/avatar/36.png'),
(37, 'design/image/avatar/37.png'),
(38, 'design/image/avatar/38.png'),
(39, 'design/image/avatar/39.png'),
(40, 'design/image/avatar/40.png'),
(41, 'design/image/avatar/41.png'),
(42, 'design/image/avatar/42.png'),
(43, 'design/image/avatar/43.png'),
(44, 'design/image/avatar/44.png'),
(45, 'design/image/avatar/45.png'),
(46, 'design/image/avatar/46.png'),
(47, 'design/image/avatar/47.png'),
(48, 'design/image/avatar/48.png'),
(49, 'design/image/avatar/49.png'),
(50, 'design/image/avatar/50.png'),
(51, 'design/image/avatar/51.png'),
(52, 'design/image/avatar/52.png'),
(53, 'design/image/avatar/53.png'),
(54, 'design/image/avatar/54.png'),
(55, 'design/image/avatar/55.png'),
(56, 'design/image/avatar/56.png'),
(57, 'design/image/avatar/57.png'),
(58, 'design/image/avatar/58.png'),
(59, 'design/image/avatar/59.png'),
(60, 'design/image/avatar/60.png'),
(61, 'design/image/avatar/61.png'),
(62, 'design/image/avatar/62.png'),
(63, 'design/image/avatar/63.png'),
(64, 'design/image/avatar/64.png'),
(65, 'design/image/avatar/65.png'),
(66, 'design/image/avatar/66.png'),
(67, 'design/image/avatar/67.png'),
(68, 'design/image/avatar/68.png'),
(69, 'design/image/avatar/69.png'),
(70, 'design/image/avatar/70.png'),
(71, 'design/image/avatar/71.png'),
(72, 'design/image/avatar/72.png'),
(73, 'design/image/avatar/73.png'),
(74, 'design/image/avatar/74.png'),
(75, 'design/image/avatar/75.png'),
(76, 'design/image/avatar/76.png'),
(77, 'design/image/avatar/77.png'),
(78, 'design/image/avatar/78.png'),
(79, 'design/image/avatar/79.png'),
(80, 'design/image/avatar/80.png'),
(81, 'design/image/avatar/81.png'),
(82, 'design/image/avatar/82.png'),
(83, 'design/image/avatar/83.png'),
(84, 'design/image/avatar/84.png'),
(85, 'design/image/avatar/85.png'),
(86, 'design/image/avatar/86.png'),
(87, 'design/image/avatar/87.png'),
(88, 'design/image/avatar/88.png'),
(89, 'design/image/avatar/89.png'),
(90, 'design/image/avatar/90.png'),
(91, 'design/image/avatar/91.png'),
(92, 'design/image/avatar/92.png'),
(93, 'design/image/avatar/93.png'),
(94, 'design/image/avatar/94.png'),
(95, 'design/image/avatar/95.png'),
(96, 'design/image/avatar/96.png'),
(97, 'design/image/avatar/97.png'),
(98, 'design/image/avatar/98.png'),
(99, 'design/image/avatar/99.png'),
(100, 'design/image/avatar/100.png'),
(101, 'design/image/avatar/101.png'),
(102, 'design/image/avatar/102.png'),
(103, 'design/image/avatar/103.png'),
(104, 'design/image/avatar/104.png'),
(105, 'design/image/avatar/105.png'),
(106, 'design/image/avatar/106.png'),
(107, 'design/image/avatar/107.png'),
(108, 'design/image/avatar/108.png'),
(109, 'design/image/avatar/109.png'),
(110, 'design/image/avatar/110.png'),
(111, 'design/image/avatar/111.png'),
(112, 'design/image/avatar/112.png'),
(113, 'design/image/avatar/113.png'),
(114, 'design/image/avatar/114.png'),
(115, 'design/image/avatar/115.png'),
(116, 'design/image/avatar/116.png'),
(117, 'design/image/avatar/117.png'),
(118, 'design/image/avatar/118.png'),
(119, 'design/image/avatar/119.png'),
(120, 'design/image/avatar/120.png'),
(121, 'design/image/avatar/121.png'),
(122, 'design/image/avatar/122.png'),
(123, 'design/image/avatar/123.png'),
(124, 'design/image/avatar/124.png'),
(125, 'design/image/avatar/125.png'),
(126, 'design/image/avatar/126.png'),
(127, 'design/image/avatar/127.png'),
(128, 'design/image/avatar/128.png'),
(129, 'design/image/avatar/129.png'),
(130, 'design/image/avatar/130.png'),
(131, 'design/image/avatar/131.png'),
(132, 'design/image/avatar/132.png'),
(133, 'design/image/avatar/133.png'),
(134, 'design/image/avatar/134.png'),
(135, 'design/image/avatar/135.png'),
(136, 'design/image/avatar/136.png'),
(137, 'design/image/avatar/137.png'),
(138, 'design/image/avatar/138.png'),
(139, 'design/image/avatar/139.png'),
(140, 'design/image/avatar/140.png'),
(141, 'design/image/avatar/141.png'),
(142, 'design/image/avatar/142.png'),
(143, 'design/image/avatar/143.png'),
(144, 'design/image/avatar/144.png'),
(145, 'design/image/avatar/145.png'),
(146, 'design/image/avatar/146.png'),
(147, 'design/image/avatar/147.png'),
(148, 'design/image/avatar/148.png'),
(149, 'design/image/avatar/149.png'),
(150, 'design/image/avatar/150.png'),
(151, 'design/image/avatar/151.png'),
(152, 'design/image/avatar/152.png'),
(153, 'design/image/avatar/153.png'),
(154, 'design/image/avatar/154.png'),
(155, 'design/image/avatar/155.png'),
(156, 'design/image/avatar/156.png'),
(157, 'design/image/avatar/157.png'),
(158, 'design/image/avatar/158.png'),
(159, 'design/image/avatar/159.png'),
(160, 'design/image/avatar/160.png'),
(161, 'design/image/avatar/161.png'),
(162, 'design/image/avatar/162.png'),
(163, 'design/image/avatar/163.png'),
(164, 'design/image/avatar/164.png'),
(165, 'design/image/avatar/165.png'),
(166, 'design/image/avatar/166.png'),
(167, 'design/image/avatar/167.png'),
(168, 'design/image/avatar/168.png'),
(169, 'design/image/avatar/169.png'),
(170, 'design/image/avatar/170.png'),
(171, 'design/image/avatar/171.png'),
(172, 'design/image/avatar/172.png'),
(173, 'design/image/avatar/173.png'),
(174, 'design/image/avatar/174.png'),
(175, 'design/image/avatar/175.png'),
(176, 'design/image/avatar/176.png'),
(177, 'design/image/avatar/177.png'),
(178, 'design/image/avatar/178.png'),
(179, 'design/image/avatar/179.png'),
(180, 'design/image/avatar/180.png'),
(181, 'design/image/avatar/181.png'),
(182, 'design/image/avatar/182.png'),
(183, 'design/image/avatar/183.png'),
(184, 'design/image/avatar/184.png'),
(185, 'design/image/avatar/185.png'),
(186, 'design/image/avatar/186.png'),
(187, 'design/image/avatar/187.png'),
(188, 'design/image/avatar/188.png'),
(189, 'design/image/avatar/189.png'),
(190, 'design/image/avatar/190.png'),
(191, 'design/image/avatar/191.png'),
(192, 'design/image/avatar/192.png'),
(193, 'design/image/avatar/193.png'),
(194, 'design/image/avatar/194.png'),
(195, 'design/image/avatar/195.png'),
(196, 'design/image/avatar/196.png'),
(197, 'design/image/avatar/197.png'),
(198, 'design/image/avatar/198.png'),
(199, 'design/image/avatar/199.png'),
(200, 'design/image/avatar/200.png'),
(201, 'design/image/avatar/201.png'),
(202, 'design/image/avatar/202.png'),
(203, 'design/image/avatar/203.png'),
(204, 'design/image/avatar/204.png'),
(205, 'design/image/avatar/205.png'),
(206, 'design/image/avatar/206.png'),
(207, 'design/image/avatar/207.png'),
(208, 'design/image/avatar/208.png'),
(209, 'design/image/avatar/209.png'),
(210, 'design/image/avatar/210.png'),
(211, 'design/image/avatar/211.png'),
(212, 'design/image/avatar/212.png'),
(213, 'design/image/avatar/213.png'),
(214, 'design/image/avatar/214.png'),
(215, 'design/image/avatar/215.png'),
(216, 'design/image/avatar/216.png'),
(217, 'design/image/avatar/217.png'),
(218, 'design/image/avatar/218.png'),
(219, 'design/image/avatar/219.png'),
(220, 'design/image/avatar/220.png'),
(221, 'design/image/avatar/221.png'),
(222, 'design/image/avatar/222.png'),
(223, 'design/image/avatar/223.png'),
(224, 'design/image/avatar/224.png'),
(225, 'design/image/avatar/225.png'),
(226, 'design/image/avatar/226.png'),
(227, 'design/image/avatar/227.png'),
(228, 'design/image/avatar/228.png'),
(229, 'design/image/avatar/229.png'),
(230, 'design/image/avatar/230.png'),
(231, 'design/image/avatar/231.png'),
(232, 'design/image/avatar/232.png'),
(233, 'design/image/avatar/233.png'),
(234, 'design/image/avatar/234.png'),
(235, 'design/image/avatar/235.png'),
(236, 'design/image/avatar/236.png'),
(237, 'design/image/avatar/237.png'),
(238, 'design/image/avatar/238.png'),
(239, 'design/image/avatar/239.png'),
(240, 'design/image/avatar/240.png'),
(241, 'design/image/avatar/241.png'),
(242, 'design/image/avatar/242.png'),
(243, 'design/image/avatar/243.png'),
(244, 'design/image/avatar/244.png'),
(245, 'design/image/avatar/245.png'),
(246, 'design/image/avatar/246.png'),
(247, 'design/image/avatar/247.png'),
(248, 'design/image/avatar/248.png'),
(249, 'design/image/avatar/249.png'),
(250, 'design/image/avatar/250.png'),
(251, 'design/image/avatar/251.png'),
(252, 'design/image/avatar/252.png'),
(253, 'design/image/avatar/253.png'),
(254, 'design/image/avatar/254.png'),
(255, 'design/image/avatar/255.png'),
(256, 'design/image/avatar/256.png'),
(257, 'design/image/avatar/257.png'),
(258, 'design/image/avatar/258.png'),
(259, 'design/image/avatar/259.png'),
(260, 'design/image/avatar/260.png'),
(261, 'design/image/avatar/261.png'),
(262, 'design/image/avatar/262.png'),
(263, 'design/image/avatar/263.png'),
(264, 'design/image/avatar/264.png'),
(265, 'design/image/avatar/265.png'),
(266, 'design/image/avatar/266.png'),
(267, 'design/image/avatar/267.png'),
(268, 'design/image/avatar/268.png'),
(269, 'design/image/avatar/269.png'),
(270, 'design/image/avatar/270.png'),
(271, 'design/image/avatar/271.png'),
(272, 'design/image/avatar/272.png'),
(273, 'design/image/avatar/273.png'),
(274, 'design/image/avatar/274.png'),
(275, 'design/image/avatar/275.png'),
(276, 'design/image/avatar/276.png'),
(277, 'design/image/avatar/277.png'),
(278, 'design/image/avatar/278.png'),
(279, 'design/image/avatar/279.png'),
(280, 'design/image/avatar/280.png'),
(281, 'design/image/avatar/281.png'),
(282, 'design/image/avatar/282.png'),
(283, 'design/image/avatar/283.png'),
(284, 'design/image/avatar/284.png'),
(285, 'design/image/avatar/285.png'),
(286, 'design/image/avatar/286.png'),
(287, 'design/image/avatar/287.png'),
(288, 'design/image/avatar/288.png'),
(289, 'design/image/avatar/289.png'),
(290, 'design/image/avatar/290.png'),
(291, 'design/image/avatar/291.png'),
(292, 'design/image/avatar/292.png'),
(293, 'design/image/avatar/293.png'),
(294, 'design/image/avatar/294.png'),
(295, 'design/image/avatar/295.png'),
(296, 'design/image/avatar/296.png'),
(297, 'design/image/avatar/297.png'),
(298, 'design/image/avatar/298.png'),
(299, 'design/image/avatar/299.png'),
(300, 'design/image/avatar/300.png'),
(301, 'design/image/avatar/301.png'),
(302, 'design/image/avatar/302.png'),
(303, 'design/image/avatar/303.png'),
(304, 'design/image/avatar/304.png'),
(305, 'design/image/avatar/305.png'),
(306, 'design/image/avatar/306.png'),
(307, 'design/image/avatar/307.png'),
(308, 'design/image/avatar/308.png'),
(309, 'design/image/avatar/309.png'),
(310, 'design/image/avatar/310.png'),
(311, 'design/image/avatar/311.png'),
(312, 'design/image/avatar/312.png'),
(313, 'design/image/avatar/313.png'),
(314, 'design/image/avatar/314.png'),
(315, 'design/image/avatar/315.png'),
(316, 'design/image/avatar/316.png'),
(317, 'design/image/avatar/317.png'),
(318, 'design/image/avatar/318.png'),
(319, 'design/image/avatar/319.png'),
(320, 'design/image/avatar/320.png'),
(321, 'design/image/avatar/321.png'),
(322, 'design/image/avatar/322.png'),
(323, 'design/image/avatar/323.png'),
(324, 'design/image/avatar/324.png'),
(325, 'design/image/avatar/325.png'),
(326, 'design/image/avatar/326.png'),
(327, 'design/image/avatar/327.png'),
(328, 'design/image/avatar/328.png'),
(329, 'design/image/avatar/329.png'),
(330, 'design/image/avatar/330.png'),
(331, 'design/image/avatar/331.png'),
(332, 'design/image/avatar/332.png'),
(333, 'design/image/avatar/333.png'),
(334, 'design/image/avatar/334.png'),
(335, 'design/image/avatar/335.png'),
(336, 'design/image/avatar/336.png'),
(337, 'design/image/avatar/337.png'),
(338, 'design/image/avatar/338.png'),
(339, 'design/image/avatar/339.png'),
(340, 'design/image/avatar/340.png'),
(341, 'design/image/avatar/341.png'),
(342, 'design/image/avatar/342.png'),
(343, 'design/image/avatar/343.png'),
(344, 'design/image/avatar/344.png'),
(345, 'design/image/avatar/345.png'),
(346, 'design/image/avatar/346.png'),
(347, 'design/image/avatar/347.png'),
(348, 'design/image/avatar/348.png'),
(349, 'design/image/avatar/349.png'),
(350, 'design/image/avatar/350.png'),
(351, 'design/image/avatar/351.png'),
(352, 'design/image/avatar/352.png'),
(353, 'design/image/avatar/353.png'),
(354, 'design/image/avatar/354.png'),
(355, 'design/image/avatar/355.png'),
(356, 'design/image/avatar/356.png'),
(357, 'design/image/avatar/357.png'),
(358, 'design/image/avatar/358.png'),
(359, 'design/image/avatar/359.png'),
(360, 'design/image/avatar/360.png'),
(361, 'design/image/avatar/361.png'),
(362, 'design/image/avatar/362.png'),
(363, 'design/image/avatar/363.png'),
(364, 'design/image/avatar/364.png'),
(365, 'design/image/avatar/365.png'),
(366, 'design/image/avatar/366.png'),
(367, 'design/image/avatar/367.png'),
(368, 'design/image/avatar/368.png'),
(369, 'design/image/avatar/369.png'),
(370, 'design/image/avatar/370.png'),
(371, 'design/image/avatar/371.png'),
(372, 'design/image/avatar/372.png'),
(373, 'design/image/avatar/373.png'),
(374, 'design/image/avatar/374.png'),
(375, 'design/image/avatar/375.png'),
(376, 'design/image/avatar/376.png'),
(377, 'design/image/avatar/377.png'),
(378, 'design/image/avatar/378.png'),
(379, 'design/image/avatar/379.png'),
(380, 'design/image/avatar/380.png'),
(381, 'design/image/avatar/381.png'),
(382, 'design/image/avatar/382.png'),
(383, 'design/image/avatar/383.png'),
(384, 'design/image/avatar/384.png'),
(385, 'design/image/avatar/385.png'),
(386, 'design/image/avatar/386.png'),
(387, 'design/image/avatar/387.png'),
(388, 'design/image/avatar/388.png'),
(389, 'design/image/avatar/389.png'),
(390, 'design/image/avatar/390.png'),
(391, 'design/image/avatar/391.png'),
(392, 'design/image/avatar/392.png'),
(393, 'design/image/avatar/393.png'),
(394, 'design/image/avatar/394.png'),
(395, 'design/image/avatar/395.png'),
(396, 'design/image/avatar/396.png'),
(397, 'design/image/avatar/397.png'),
(398, 'design/image/avatar/398.png'),
(399, 'design/image/avatar/399.png'),
(400, 'design/image/avatar/400.png'),
(401, 'design/image/avatar/401.png'),
(402, 'design/image/avatar/402.png'),
(403, 'design/image/avatar/403.png'),
(404, 'design/image/avatar/404.png'),
(405, 'design/image/avatar/405.png'),
(406, 'design/image/avatar/406.png'),
(407, 'design/image/avatar/407.png'),
(408, 'design/image/avatar/408.png'),
(409, 'design/image/avatar/409.png'),
(410, 'design/image/avatar/410.png'),
(411, 'design/image/avatar/411.png'),
(412, 'design/image/avatar/412.png'),
(413, 'design/image/avatar/413.png'),
(414, 'design/image/avatar/414.png'),
(415, 'design/image/avatar/415.png'),
(416, 'design/image/avatar/416.png'),
(417, 'design/image/avatar/417.png'),
(418, 'design/image/avatar/418.png'),
(419, 'design/image/avatar/419.png'),
(420, 'design/image/avatar/420.png'),
(421, 'design/image/avatar/421.png'),
(422, 'design/image/avatar/422.png'),
(423, 'design/image/avatar/423.png'),
(424, 'design/image/avatar/424.png'),
(425, 'design/image/avatar/425.png'),
(426, 'design/image/avatar/426.png'),
(427, 'design/image/avatar/427.png'),
(428, 'design/image/avatar/428.png'),
(429, 'design/image/avatar/429.png'),
(430, 'design/image/avatar/430.png'),
(431, 'design/image/avatar/431.png'),
(432, 'design/image/avatar/432.png'),
(433, 'design/image/avatar/433.png'),
(434, 'design/image/avatar/434.png'),
(435, 'design/image/avatar/435.png'),
(436, 'design/image/avatar/436.png'),
(437, 'design/image/avatar/437.png'),
(438, 'design/image/avatar/438.png'),
(439, 'design/image/avatar/439.png'),
(440, 'design/image/avatar/440.png'),
(441, 'design/image/avatar/441.png'),
(442, 'design/image/avatar/442.png'),
(443, 'design/image/avatar/443.png'),
(444, 'design/image/avatar/444.png'),
(445, 'design/image/avatar/445.png'),
(446, 'design/image/avatar/446.png'),
(447, 'design/image/avatar/447.png'),
(448, 'design/image/avatar/448.png'),
(449, 'design/image/avatar/449.png'),
(450, 'design/image/avatar/450.png'),
(451, 'design/image/avatar/451.png'),
(452, 'design/image/avatar/452.png'),
(453, 'design/image/avatar/453.png'),
(454, 'design/image/avatar/454.png'),
(455, 'design/image/avatar/455.png'),
(456, 'design/image/avatar/456.png'),
(457, 'design/image/avatar/457.png'),
(458, 'design/image/avatar/458.png'),
(459, 'design/image/avatar/459.png'),
(460, 'design/image/avatar/460.png'),
(461, 'design/image/avatar/461.png'),
(462, 'design/image/avatar/462.png'),
(463, 'design/image/avatar/463.png'),
(464, 'design/image/avatar/464.png'),
(465, 'design/image/avatar/465.png'),
(466, 'design/image/avatar/466.png'),
(467, 'design/image/avatar/467.png'),
(468, 'design/image/avatar/468.png'),
(469, 'design/image/avatar/469.png'),
(470, 'design/image/avatar/470.png'),
(471, 'design/image/avatar/471.png'),
(472, 'design/image/avatar/472.png'),
(473, 'design/image/avatar/473.png'),
(474, 'design/image/avatar/474.png'),
(475, 'design/image/avatar/475.png'),
(476, 'design/image/avatar/476.png'),
(477, 'design/image/avatar/477.png'),
(478, 'design/image/avatar/478.png'),
(479, 'design/image/avatar/479.png'),
(480, 'design/image/avatar/480.png'),
(481, 'design/image/avatar/481.png'),
(482, 'design/image/avatar/482.png'),
(483, 'design/image/avatar/483.png'),
(484, 'design/image/avatar/484.png'),
(485, 'design/image/avatar/485.png'),
(486, 'design/image/avatar/486.png'),
(487, 'design/image/avatar/487.png'),
(488, 'design/image/avatar/488.png'),
(489, 'design/image/avatar/489.png'),
(490, 'design/image/avatar/490.png'),
(491, 'design/image/avatar/491.png'),
(492, 'design/image/avatar/492.png'),
(493, 'design/image/avatar/493.png'),
(494, 'design/image/avatar/494.png'),
(495, 'design/image/avatar/495.png'),
(496, 'design/image/avatar/496.png'),
(497, 'design/image/avatar/497.png'),
(498, 'design/image/avatar/498.png'),
(499, 'design/image/avatar/499.png'),
(500, 'design/image/avatar/500.png'),
(501, 'design/image/avatar/501.png'),
(502, 'design/image/avatar/502.png'),
(503, 'design/image/avatar/503.png'),
(504, 'design/image/avatar/504.png'),
(505, 'design/image/avatar/505.png'),
(506, 'design/image/avatar/506.png'),
(507, 'design/image/avatar/507.png'),
(508, 'design/image/avatar/508.png'),
(509, 'design/image/avatar/509.png'),
(510, 'design/image/avatar/510.png'),
(511, 'design/image/avatar/511.png'),
(512, 'design/image/avatar/512.png'),
(513, 'design/image/avatar/513.png'),
(514, 'design/image/avatar/514.png'),
(515, 'design/image/avatar/515.png'),
(516, 'design/image/avatar/516.png'),
(517, 'design/image/avatar/517.png'),
(518, 'design/image/avatar/518.png'),
(519, 'design/image/avatar/519.png'),
(520, 'design/image/avatar/520.png'),
(521, 'design/image/avatar/521.png'),
(522, 'design/image/avatar/522.png'),
(523, 'design/image/avatar/523.png'),
(524, 'design/image/avatar/524.png'),
(525, 'design/image/avatar/525.png'),
(526, 'design/image/avatar/526.png'),
(527, 'design/image/avatar/527.png'),
(528, 'design/image/avatar/528.png'),
(529, 'design/image/avatar/529.png'),
(530, 'design/image/avatar/530.png'),
(531, 'design/image/avatar/531.png'),
(532, 'design/image/avatar/532.png'),
(533, 'design/image/avatar/533.png'),
(534, 'design/image/avatar/534.png'),
(535, 'design/image/avatar/535.png'),
(536, 'design/image/avatar/536.png'),
(537, 'design/image/avatar/537.png'),
(538, 'design/image/avatar/538.png'),
(539, 'design/image/avatar/539.png'),
(540, 'design/image/avatar/540.png'),
(541, 'design/image/avatar/541.png'),
(542, 'design/image/avatar/542.png'),
(543, 'design/image/avatar/543.png'),
(544, 'design/image/avatar/544.png'),
(545, 'design/image/avatar/545.png'),
(546, 'design/image/avatar/546.png'),
(547, 'design/image/avatar/547.png'),
(548, 'design/image/avatar/548.png'),
(549, 'design/image/avatar/549.png'),
(550, 'design/image/avatar/550.png'),
(551, 'design/image/avatar/551.png'),
(552, 'design/image/avatar/552.png'),
(553, 'design/image/avatar/553.png'),
(554, 'design/image/avatar/554.png'),
(555, 'design/image/avatar/555.png'),
(556, 'design/image/avatar/556.png'),
(557, 'design/image/avatar/557.png'),
(558, 'design/image/avatar/558.png'),
(559, 'design/image/avatar/559.png'),
(560, 'design/image/avatar/560.png'),
(561, 'design/image/avatar/561.png'),
(562, 'design/image/avatar/562.png'),
(563, 'design/image/avatar/563.png'),
(564, 'design/image/avatar/564.png'),
(565, 'design/image/avatar/565.png'),
(566, 'design/image/avatar/566.png'),
(567, 'design/image/avatar/567.png'),
(568, 'design/image/avatar/568.png'),
(569, 'design/image/avatar/569.png'),
(570, 'design/image/avatar/570.png'),
(571, 'design/image/avatar/571.png'),
(572, 'design/image/avatar/572.png'),
(573, 'design/image/avatar/573.png'),
(574, 'design/image/avatar/574.png'),
(575, 'design/image/avatar/575.png'),
(576, 'design/image/avatar/576.png'),
(577, 'design/image/avatar/577.png'),
(578, 'design/image/avatar/578.png'),
(579, 'design/image/avatar/579.png'),
(580, 'design/image/avatar/580.png'),
(581, 'design/image/avatar/581.png'),
(582, 'design/image/avatar/582.png'),
(583, 'design/image/avatar/583.png'),
(584, 'design/image/avatar/584.png'),
(585, 'design/image/avatar/585.png'),
(586, 'design/image/avatar/586.png'),
(587, 'design/image/avatar/587.png'),
(588, 'design/image/avatar/588.png'),
(589, 'design/image/avatar/589.png'),
(590, 'design/image/avatar/590.png'),
(591, 'design/image/avatar/591.png'),
(592, 'design/image/avatar/592.png'),
(593, 'design/image/avatar/593.png'),
(594, 'design/image/avatar/594.png'),
(595, 'design/image/avatar/595.png'),
(596, 'design/image/avatar/596.png'),
(597, 'design/image/avatar/597.png'),
(598, 'design/image/avatar/598.png'),
(599, 'design/image/avatar/599.png'),
(600, 'design/image/avatar/600.png'),
(601, 'design/image/avatar/601.png'),
(602, 'design/image/avatar/602.png'),
(603, 'design/image/avatar/603.png'),
(604, 'design/image/avatar/604.png'),
(605, 'design/image/avatar/605.png'),
(606, 'design/image/avatar/606.png'),
(607, 'design/image/avatar/607.png'),
(608, 'design/image/avatar/608.png'),
(609, 'design/image/avatar/609.png'),
(610, 'design/image/avatar/610.png'),
(611, 'design/image/avatar/611.png'),
(612, 'design/image/avatar/612.png'),
(613, 'design/image/avatar/613.png'),
(614, 'design/image/avatar/614.png'),
(615, 'design/image/avatar/615.png'),
(616, 'design/image/avatar/616.png'),
(617, 'design/image/avatar/617.png'),
(618, 'design/image/avatar/618.png'),
(619, 'design/image/avatar/619.png'),
(620, 'design/image/avatar/620.png'),
(621, 'design/image/avatar/621.png'),
(622, 'design/image/avatar/622.png'),
(623, 'design/image/avatar/623.png'),
(624, 'design/image/avatar/624.png'),
(625, 'design/image/avatar/625.png'),
(626, 'design/image/avatar/626.png'),
(627, 'design/image/avatar/627.png'),
(628, 'design/image/avatar/628.png'),
(629, 'design/image/avatar/629.png'),
(630, 'design/image/avatar/630.png'),
(631, 'design/image/avatar/631.png'),
(632, 'design/image/avatar/632.png'),
(633, 'design/image/avatar/633.png'),
(634, 'design/image/avatar/634.png'),
(635, 'design/image/avatar/635.png'),
(636, 'design/image/avatar/636.png'),
(637, 'design/image/avatar/637.png'),
(638, 'design/image/avatar/638.png'),
(639, 'design/image/avatar/639.png'),
(640, 'design/image/avatar/640.png'),
(641, 'design/image/avatar/641.png'),
(642, 'design/image/avatar/642.png'),
(643, 'design/image/avatar/643.png'),
(644, 'design/image/avatar/644.png'),
(645, 'design/image/avatar/645.png'),
(646, 'design/image/avatar/646.png'),
(647, 'design/image/avatar/647.png'),
(648, 'design/image/avatar/648.png'),
(649, 'design/image/avatar/649.png'),
(650, 'design/image/avatar/650.png'),
(651, 'design/image/avatar/651.png'),
(652, 'design/image/avatar/652.png'),
(653, 'design/image/avatar/653.png'),
(654, 'design/image/avatar/654.png'),
(655, 'design/image/avatar/655.png'),
(656, 'design/image/avatar/656.png'),
(657, 'design/image/avatar/657.png'),
(658, 'design/image/avatar/658.png'),
(659, 'design/image/avatar/659.png'),
(660, 'design/image/avatar/660.png'),
(661, 'design/image/avatar/661.png'),
(662, 'design/image/avatar/662.png'),
(663, 'design/image/avatar/663.png'),
(664, 'design/image/avatar/664.png'),
(665, 'design/image/avatar/665.png'),
(666, 'design/image/avatar/666.png'),
(667, 'design/image/avatar/667.png'),
(668, 'design/image/avatar/668.png'),
(669, 'design/image/avatar/669.png'),
(670, 'design/image/avatar/670.png'),
(671, 'design/image/avatar/671.png'),
(672, 'design/image/avatar/672.png'),
(673, 'design/image/avatar/673.png'),
(674, 'design/image/avatar/674.png'),
(675, 'design/image/avatar/675.png'),
(676, 'design/image/avatar/676.png'),
(677, 'design/image/avatar/677.png'),
(678, 'design/image/avatar/678.png'),
(679, 'design/image/avatar/679.png'),
(680, 'design/image/avatar/680.png'),
(681, 'design/image/avatar/681.png'),
(682, 'design/image/avatar/682.png'),
(683, 'design/image/avatar/683.png'),
(684, 'design/image/avatar/684.png'),
(685, 'design/image/avatar/685.png'),
(686, 'design/image/avatar/686.png'),
(687, 'design/image/avatar/687.png'),
(688, 'design/image/avatar/688.png'),
(689, 'design/image/avatar/689.png'),
(690, 'design/image/avatar/690.png'),
(691, 'design/image/avatar/691.png'),
(692, 'design/image/avatar/692.png'),
(693, 'design/image/avatar/693.png'),
(694, 'design/image/avatar/694.png'),
(695, 'design/image/avatar/695.png'),
(696, 'design/image/avatar/696.png'),
(697, 'design/image/avatar/697.png'),
(698, 'design/image/avatar/698.png'),
(699, 'design/image/avatar/699.png'),
(700, 'design/image/avatar/700.png'),
(701, 'design/image/avatar/701.png'),
(702, 'design/image/avatar/702.png'),
(703, 'design/image/avatar/703.png'),
(704, 'design/image/avatar/704.png'),
(705, 'design/image/avatar/705.png'),
(706, 'design/image/avatar/706.png'),
(707, 'design/image/avatar/707.png'),
(708, 'design/image/avatar/708.png'),
(709, 'design/image/avatar/709.png'),
(710, 'design/image/avatar/710.png'),
(711, 'design/image/avatar/711.png'),
(712, 'design/image/avatar/712.png'),
(713, 'design/image/avatar/713.png'),
(714, 'design/image/avatar/714.png'),
(715, 'design/image/avatar/715.png'),
(716, 'design/image/avatar/716.png'),
(717, 'design/image/avatar/717.png'),
(718, 'design/image/avatar/718.png'),
(719, 'design/image/avatar/719.png'),
(720, 'design/image/avatar/720.png'),
(721, 'design/image/avatar/721.png'),
(722, 'design/image/avatar/722.png'),
(723, 'design/image/avatar/723.png'),
(724, 'design/image/avatar/724.png'),
(725, 'design/image/avatar/725.png'),
(726, 'design/image/avatar/726.png'),
(727, 'design/image/avatar/727.png'),
(728, 'design/image/avatar/728.png'),
(729, 'design/image/avatar/729.png'),
(730, 'design/image/avatar/730.png'),
(731, 'design/image/avatar/731.png'),
(732, 'design/image/avatar/732.png'),
(733, 'design/image/avatar/733.png'),
(734, 'design/image/avatar/734.png'),
(735, 'design/image/avatar/735.png'),
(736, 'design/image/avatar/736.png'),
(737, 'design/image/avatar/737.png'),
(738, 'design/image/avatar/738.png'),
(739, 'design/image/avatar/739.png'),
(740, 'design/image/avatar/740.png'),
(741, 'design/image/avatar/741.png'),
(742, 'design/image/avatar/742.png'),
(743, 'design/image/avatar/743.png'),
(744, 'design/image/avatar/744.png'),
(745, 'design/image/avatar/745.png'),
(746, 'design/image/avatar/746.png'),
(747, 'design/image/avatar/747.png'),
(748, 'design/image/avatar/748.png'),
(749, 'design/image/avatar/749.png'),
(750, 'design/image/avatar/750.png'),
(751, 'design/image/avatar/751.png'),
(752, 'design/image/avatar/752.png'),
(753, 'design/image/avatar/753.png'),
(754, 'design/image/avatar/754.png'),
(755, 'design/image/avatar/755.png'),
(756, 'design/image/avatar/756.png'),
(757, 'design/image/avatar/757.png'),
(758, 'design/image/avatar/758.png'),
(759, 'design/image/avatar/759.png'),
(760, 'design/image/avatar/760.png'),
(761, 'design/image/avatar/761.png'),
(762, 'design/image/avatar/762.png'),
(763, 'design/image/avatar/763.png'),
(764, 'design/image/avatar/764.png'),
(765, 'design/image/avatar/765.png'),
(766, 'design/image/avatar/766.png'),
(767, 'design/image/avatar/767.png'),
(768, 'design/image/avatar/768.png'),
(769, 'design/image/avatar/769.png'),
(770, 'design/image/avatar/770.png'),
(771, 'design/image/avatar/771.png'),
(772, 'design/image/avatar/772.png'),
(773, 'design/image/avatar/773.png'),
(774, 'design/image/avatar/774.png'),
(775, 'design/image/avatar/775.png'),
(776, 'design/image/avatar/776.png'),
(777, 'design/image/avatar/777.png'),
(778, 'design/image/avatar/778.png'),
(779, 'design/image/avatar/779.png'),
(780, 'design/image/avatar/780.png'),
(781, 'design/image/avatar/781.png'),
(782, 'design/image/avatar/782.png'),
(783, 'design/image/avatar/783.png'),
(784, 'design/image/avatar/784.png'),
(785, 'design/image/avatar/785.png'),
(786, 'design/image/avatar/786.png'),
(787, 'design/image/avatar/787.png'),
(788, 'design/image/avatar/788.png'),
(789, 'design/image/avatar/789.png'),
(790, 'design/image/avatar/790.png'),
(791, 'design/image/avatar/791.png'),
(792, 'design/image/avatar/792.png'),
(793, 'design/image/avatar/793.png'),
(794, 'design/image/avatar/794.png'),
(795, 'design/image/avatar/795.png'),
(796, 'design/image/avatar/796.png'),
(797, 'design/image/avatar/797.png'),
(798, 'design/image/avatar/798.png'),
(799, 'design/image/avatar/799.png'),
(800, 'design/image/avatar/800.png'),
(801, 'design/image/avatar/801.png'),
(802, 'design/image/avatar/802.png'),
(803, 'design/image/avatar/803.png'),
(804, 'design/image/avatar/804.png'),
(805, 'design/image/avatar/805.png'),
(806, 'design/image/avatar/806.png'),
(807, 'design/image/avatar/807.png'),
(808, 'design/image/avatar/808.png'),
(809, 'design/image/avatar/809.png'),
(810, 'design/image/avatar/810.png'),
(811, 'design/image/avatar/811.png'),
(812, 'design/image/avatar/812.png'),
(813, 'design/image/avatar/813.png'),
(814, 'design/image/avatar/814.png'),
(815, 'design/image/avatar/815.png'),
(816, 'design/image/avatar/816.png'),
(817, 'design/image/avatar/817.png'),
(818, 'design/image/avatar/818.png'),
(819, 'design/image/avatar/819.png'),
(820, 'design/image/avatar/820.png'),
(821, 'design/image/avatar/821.png'),
(822, 'design/image/avatar/822.png'),
(823, 'design/image/avatar/823.png'),
(824, 'design/image/avatar/824.png'),
(825, 'design/image/avatar/825.png'),
(826, 'design/image/avatar/826.png'),
(827, 'design/image/avatar/827.png'),
(828, 'design/image/avatar/828.png'),
(829, 'design/image/avatar/829.png'),
(830, 'design/image/avatar/830.png'),
(831, 'design/image/avatar/831.png'),
(832, 'design/image/avatar/832.png'),
(833, 'design/image/avatar/833.png'),
(834, 'design/image/avatar/834.png'),
(835, 'design/image/avatar/835.png'),
(836, 'design/image/avatar/836.png'),
(837, 'design/image/avatar/837.png'),
(838, 'design/image/avatar/838.png'),
(839, 'design/image/avatar/839.png'),
(840, 'design/image/avatar/840.png'),
(841, 'design/image/avatar/841.png'),
(842, 'design/image/avatar/842.png'),
(843, 'design/image/avatar/843.png'),
(844, 'design/image/avatar/844.png'),
(845, 'design/image/avatar/845.png'),
(846, 'design/image/avatar/846.png'),
(847, 'design/image/avatar/847.png'),
(848, 'design/image/avatar/848.png'),
(849, 'design/image/avatar/849.png'),
(850, 'design/image/avatar/850.png'),
(851, 'design/image/avatar/851.png'),
(852, 'design/image/avatar/852.png'),
(853, 'design/image/avatar/853.png'),
(854, 'design/image/avatar/854.png'),
(855, 'design/image/avatar/855.png'),
(856, 'design/image/avatar/856.png'),
(857, 'design/image/avatar/857.png'),
(858, 'design/image/avatar/858.png'),
(859, 'design/image/avatar/859.png'),
(860, 'design/image/avatar/860.png'),
(861, 'design/image/avatar/861.png'),
(862, 'design/image/avatar/862.png'),
(863, 'design/image/avatar/863.png'),
(864, 'design/image/avatar/864.png'),
(865, 'design/image/avatar/865.png'),
(866, 'design/image/avatar/866.png'),
(867, 'design/image/avatar/867.png'),
(868, 'design/image/avatar/868.png'),
(869, 'design/image/avatar/869.png'),
(870, 'design/image/avatar/870.png'),
(871, 'design/image/avatar/871.png'),
(872, 'design/image/avatar/872.png'),
(873, 'design/image/avatar/873.png'),
(874, 'design/image/avatar/874.png'),
(875, 'design/image/avatar/875.png'),
(876, 'design/image/avatar/876.png'),
(877, 'design/image/avatar/877.png'),
(878, 'design/image/avatar/878.png'),
(879, 'design/image/avatar/879.png'),
(880, 'design/image/avatar/880.png'),
(881, 'design/image/avatar/881.png'),
(882, 'design/image/avatar/882.png'),
(883, 'design/image/avatar/883.png'),
(884, 'design/image/avatar/884.png'),
(885, 'design/image/avatar/885.png'),
(886, 'design/image/avatar/886.png'),
(887, 'design/image/avatar/887.png'),
(888, 'design/image/avatar/888.png'),
(889, 'design/image/avatar/889.png'),
(890, 'design/image/avatar/890.png'),
(891, 'design/image/avatar/891.png'),
(892, 'design/image/avatar/892.png'),
(893, 'design/image/avatar/893.png'),
(894, 'design/image/avatar/894.png'),
(895, 'design/image/avatar/895.png'),
(896, 'design/image/avatar/896.png'),
(897, 'design/image/avatar/897.png'),
(898, 'design/image/avatar/898.png'),
(899, 'design/image/avatar/899.png'),
(900, 'design/image/avatar/900.png'),
(901, 'design/image/avatar/901.png'),
(902, 'design/image/avatar/902.png'),
(903, 'design/image/avatar/903.png'),
(904, 'design/image/avatar/904.png'),
(905, 'design/image/avatar/905.png'),
(906, 'design/image/avatar/906.png'),
(907, 'design/image/avatar/907.png'),
(908, 'design/image/avatar/908.png'),
(909, 'design/image/avatar/909.png'),
(910, 'design/image/avatar/910.png'),
(911, 'design/image/avatar/911.png'),
(912, 'design/image/avatar/912.png'),
(913, 'design/image/avatar/913.png'),
(914, 'design/image/avatar/914.png'),
(915, 'design/image/avatar/915.png'),
(916, 'design/image/avatar/916.png'),
(917, 'design/image/avatar/917.png'),
(918, 'design/image/avatar/918.png'),
(919, 'design/image/avatar/919.png'),
(920, 'design/image/avatar/920.png'),
(921, 'design/image/avatar/921.png'),
(922, 'design/image/avatar/922.png'),
(923, 'design/image/avatar/923.png'),
(924, 'design/image/avatar/924.png'),
(925, 'design/image/avatar/925.png'),
(926, 'design/image/avatar/926.png'),
(927, 'design/image/avatar/927.png'),
(928, 'design/image/avatar/928.png'),
(929, 'design/image/avatar/929.png'),
(930, 'design/image/avatar/930.png'),
(931, 'design/image/avatar/931.png'),
(932, 'design/image/avatar/932.png'),
(933, 'design/image/avatar/933.png'),
(934, 'design/image/avatar/934.png'),
(935, 'design/image/avatar/935.png'),
(936, 'design/image/avatar/936.png'),
(937, 'design/image/avatar/937.png'),
(938, 'design/image/avatar/938.png'),
(939, 'design/image/avatar/939.png'),
(940, 'design/image/avatar/940.png'),
(941, 'design/image/avatar/941.png'),
(942, 'design/image/avatar/942.png'),
(943, 'design/image/avatar/943.png'),
(944, 'design/image/avatar/944.png'),
(945, 'design/image/avatar/945.png');

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_comm`
--

CREATE TABLE `etai_intranet_comm` (
  `etai_intranet_comm_id` int(11) NOT NULL,
  `etai_intranet_comm_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_email_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_date` date DEFAULT NULL,
  `etai_intranet_comm_cat` int(1) NOT NULL DEFAULT 0,
  `etai_intranet_comm_titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_sous_titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etai_intranet_comm_statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_comm`
--

INSERT INTO `etai_intranet_comm` (`etai_intranet_comm_id`, `etai_intranet_comm_user`, `etai_intranet_comm_email_user`, `etai_intranet_comm_date`, `etai_intranet_comm_cat`, `etai_intranet_comm_titre`, `etai_intranet_comm_sous_titre`, `etai_intranet_comm_desc`, `etai_intranet_comm_img`, `etai_intranet_comm_statut`) VALUES
(3, 'RACHDI MED', 'Mohamed.INAAMRACHDI@infopro-digital.com', '2021-07-28', 1, 'Communication interne : Lancement d\'une plateforme de formation', 'Plateforme de formation en ligne', '<p>TEST</p>\r\n', '/ckfinder/userfiles/images/RH/rh.png', 3),
(4, 'RACHDI MED', 'Mohamed.INAAMRACHDI@infopro-digital.com', '2021-07-28', 1, 'Communication interne : Lancement d\'une plateforme de formation', 'Communication Générale', '<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Bonjour &agrave; toutes et &agrave; tous,</span></span></p>\r\n\r\n<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Je tiens &agrave; souhaiter A&iuml;d Mabrouk &agrave; chacun et chacune d&rsquo;entre vous &agrave; travers ce mail&nbsp;et que vous puissiez profiter de ce moment le mieux possible vu les circonstances. Effectivement, encore cette ann&eacute;e, cette f&ecirc;te familiale ne sera pas un A&iuml;d comme les autres.</span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Mon plus grand souhait est que la sortie de crise sanitaire arrive le plus vite possible pour que la s&eacute;r&eacute;nit&eacute; puisse &ecirc;tre retrouv&eacute;e.</span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Toutes les mesures en vigueur dans l&rsquo;entreprise&nbsp;: port du masque obligatoire en permanence, respect absolu des gestes barri&egrave;res, planning de l&rsquo;occupation du r&eacute;fectoire, t&eacute;l&eacute;travail, distanciation et &eacute;loignement des postes de travail pour ceux qui sont sur site vont rester en vigueur jusqu&rsquo;au vendredi 13 ao&ucirc;t inclus. Les d&eacute;cisions concernant la p&eacute;riode apr&egrave;s cette date d&eacute;pendront de l&rsquo;&eacute;volution de la situation sanitaire et vous seront communiqu&eacute;es &agrave; travers vos managers. </span></span></p>\r\n\r\n<p><u><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Continuez &agrave; prendre soin de vous et de vos proches&nbsp;!</span></span></u></p>\r\n\r\n<p><a href=\"/ckfinder/userfiles/files/DG/livret_ipd.pdf\">T&eacute;l&eacute;charger notre livret</a></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#44546a\">St&eacute;phanie ROGER</span></span></strong></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#44546a\">Directrice G&eacute;n&eacute;rale</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#44546a\">ETAI Tunisie &amp; Com Online</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#44546a\">01 75 60 55 63</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#44546a\">GSM&nbsp;: (+216) 53&nbsp;222 555</span></span></span></span></p>\r\n\r\n<p><img alt=\"\" height=\"70\" src=\"/ckfinder/userfiles/images/RH/Image1.png\" style=\"float:left\" width=\"150\" /></p>\r\n', '/ckfinder/userfiles/images/RH/rh.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_comm_lecteurs`
--

CREATE TABLE `etai_intranet_comm_lecteurs` (
  `etai_intranet_comm_lecteurs_id` int(11) NOT NULL,
  `etai_intranet_comm_lecteurs_user` int(11) NOT NULL DEFAULT 0,
  `etai_intranet_comm_id` int(11) NOT NULL DEFAULT 0,
  `etai_intranet_comm_lecteurs_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_membres`
--

CREATE TABLE `etai_intranet_membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '00.00.00.00.00',
  `adresse` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'adresse',
  `cp` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `ville` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ville',
  `genre` int(1) NOT NULL DEFAULT 1,
  `naissance` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Do',
  `prenom` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Jhon',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_avatar` int(10) NOT NULL DEFAULT 1,
  `mailing` int(1) NOT NULL DEFAULT 1,
  `activation` int(1) NOT NULL DEFAULT 0,
  `niveau` int(1) NOT NULL DEFAULT 1,
  `design` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etai_intranet_membres`
--

INSERT INTO `etai_intranet_membres` (`id`, `pseudo`, `password`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `description`, `id_avatar`, `mailing`, `activation`, `niveau`, `design`) VALUES
(2, 'minaamrachdi', '$2y$10$QVYLU4Hjt8zBvW14cafC6OTJ6vyaWiHOxkmYWAh.tSil5qDYEAbh6', 'Mohamed.INAAMRACHDI@infopro-digital.com', '55 314 153', 'ANTONY PARC 2 10 PLACE DU GENERAL DE GAULLE', '92160', 'ANTONY', 1, '29 April, ', 'RACHDI', 'MED', '', 1, 0, 1, 3, 1),
(5, 'Zied-jlassi', '$2y$10$QVYLU4Hjt8zBvW14cafC6OTJ6vyaWiHOxkmYWAh.tSil5qDYEAbh6', 'zied.jlassi@infopro-digital.com', '00.00.00.00.00', 'adresse', '00000', 'ville', 1, '12/11/1981', 'Jlassi', 'Mohamed Zied', '', 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_messagerie`
--

CREATE TABLE `etai_intranet_messagerie` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `titre` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `timestamp` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `message` text CHARACTER SET latin1 DEFAULT NULL,
  `lu` int(1) NOT NULL DEFAULT 0,
  `effacer` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_messagerie`
--

INSERT INTO `etai_intranet_messagerie` (`id`, `id_expediteur`, `id_destinataire`, `titre`, `timestamp`, `message`, `lu`, `effacer`) VALUES
(1, 2, 5, 'Communication Générale', '1626695100', '<p>Bonjour &agrave; toutes et &agrave; tous,</p>\r\n\r\n<p>Je tiens &agrave; souhaiter A&iuml;d Mabrouk &agrave; chacun et chacune d&rsquo;entre vous &agrave; travers ce mail&nbsp;et que vous puissiez profiter de ce moment le mieux possible vu les circonstances. Effectivement, encore cette ann&eacute;e, cette f&ecirc;te familiale ne sera pas un A&iuml;d comme les autres.</p>\r\n\r\n<p>Mon plus grand souhait est que la sortie de crise sanitaire arrive le plus vite possible pour que la s&eacute;r&eacute;nit&eacute; puisse &ecirc;tre retrouv&eacute;e.</p>\r\n\r\n<p>Toutes les mesures en vigueur dans l&rsquo;entreprise&nbsp;: port du masque obligatoire en permanence, respect absolu des gestes barri&egrave;res, planning de l&rsquo;occupation du r&eacute;fectoire, t&eacute;l&eacute;travail, distanciation et &eacute;loignement des postes de travail pour ceux qui sont sur site vont rester en vigueur jusqu&rsquo;au vendredi 13 ao&ucirc;t inclus. Les d&eacute;cisions concernant la p&eacute;riode apr&egrave;s cette date d&eacute;pendront de l&rsquo;&eacute;volution de la situation sanitaire et vous seront communiqu&eacute;es &agrave; travers vos managers.</p>\r\n\r\n<p>Continuez &agrave; prendre soin de vous et de vos proches&nbsp;!</p>\r\n\r\n<hr />\r\n<p><strong>St&eacute;phanie ROGER</strong></p>\r\n\r\n<p>Directrice G&eacute;n&eacute;rale</p>\r\n\r\n<p>ETAI Tunisie &amp; Com Online</p>\r\n\r\n<p>01 75 60 55 63</p>\r\n\r\n<p>GSM&nbsp;: (+216) 53&nbsp;222 555</p>\r\n\r\n<p><img alt=\"\" height=\"41\" src=\"/ckfinder/userfiles/files/image-20210719134428-1.jpeg\" width=\"132\" /></p>\r\n', 1, 0),
(2, 5, 2, 'Communication interne : Lancement d\'une plateforme de formation', '1626695337', '<p>Bonjour</p>\r\n\r\n<p>J&rsquo;ai mis &agrave; jour mon identifiant de connexion. Je voulais modifier dans mon compte le nom de la structure (OPUS 67 n&rsquo;existe plus et a &eacute;t&eacute; absorb&eacute;e par ALSACE HABITAT), mais je n&rsquo;y ai pas acc&egrave;s.</p>\r\n\r\n<p>Pourriez-vous effectuer cette manipulation de votre c&ocirc;t&eacute; svp&nbsp;?</p>\r\n\r\n<p>Merci d&rsquo;avance</p>\r\n\r\n<p>Cordialement,</p>\r\n\r\n<p>Merci</p>\r\n\r\n<p><img alt=\"\" height=\"70\" src=\"/ckfinder/userfiles/images/RH/Image1.png\" style=\"float:left\" width=\"150\" /></p>\r\n', 1, 1),
(3, 2, 5, 'RGPD', '1626696020', 'Cher Client,<br />\r\n<br />\r\nDans quelques semaines, le mode de connexion au site Marches Online va &eacute;voluer. Votre adresse e-mail deviendra votre identifiant de connexion !<br />\r\n<br />\r\nMettez &agrave; jour votre compte d&egrave;s maintenant en suivant les &eacute;tapes suivantes :<br />\r\n1. Je me connecte &agrave; mon compte (identifiant et mot de passe habituel)<br />\r\n2. Je confirme ou modifie mon adresse email afin de la mettre &agrave; jour<br />\r\n3. Je m&eacute;morise ces &eacute;l&eacute;ments : identifiant actuel, adresse email &agrave; jour et enfin le mot de passe qui reste inchang&eacute;.<br />\r\n<br />\r\nUne fois l&rsquo;&eacute;volution du site MarchesOnline.com effective, vous serez alors inform&eacute; et vous pourrez ensuite utiliser votre adresse email comme identifiant pour vous connecter.<br />\r\n<br />\r\nJe me connecte pour mettre &agrave; jour mon compte !<br />\r\n<br />\r\nCordialement,<br />\r\n', 1, 0),
(4, 2, 5, 'Communication interne : Lancement d\'une plateforme de formation', '1627463934', '<p>Bonjour &agrave; toutes et &agrave; tous,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Je tiens &agrave; souhaiter A&iuml;d Mabrouk &agrave; chacun et chacune d&rsquo;entre vous &agrave; travers ce mail&nbsp;et que vous puissiez profiter de ce moment le mieux possible vu les circonstances. Effectivement, encore cette ann&eacute;e, cette f&ecirc;te familiale ne sera pas un A&iuml;d comme les autres.</p>\r\n\r\n<p>Mon plus grand souhait est que la sortie de crise sanitaire arrive le plus vite possible pour que la s&eacute;r&eacute;nit&eacute; puisse &ecirc;tre retrouv&eacute;e.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Toutes les mesures en vigueur dans l&rsquo;entreprise&nbsp;: port du masque obligatoire en permanence, respect absolu des gestes barri&egrave;res, planning de l&rsquo;occupation du r&eacute;fectoire, t&eacute;l&eacute;travail, distanciation et &eacute;loignement des postes de travail pour ceux qui sont sur site vont rester en vigueur jusqu&rsquo;au vendredi 13 ao&ucirc;t inclus. Les d&eacute;cisions concernant la p&eacute;riode apr&egrave;s cette date d&eacute;pendront de l&rsquo;&eacute;volution de la situation sanitaire et vous seront communiqu&eacute;es &agrave; travers vos managers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Continuez &agrave; prendre soin de vous et de vos proches&nbsp;!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>St&eacute;phanie ROGER</strong></p>\r\n\r\n<p>Directrice G&eacute;n&eacute;rale</p>\r\n\r\n<p>ETAI Tunisie &amp; Com Online</p>\r\n\r\n<p>01 75 60 55 63</p>\r\n\r\n<p>GSM&nbsp;: (+216) 53&nbsp;222 555</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" height=\"101\" src=\"/ckfinder/userfiles/images/RH/Image1.png\" style=\"float:left\" width=\"216\" /></p>\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_niveau`
--

CREATE TABLE `etai_intranet_niveau` (
  `id` int(11) NOT NULL,
  `nom_niveau` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_niveau`
--

INSERT INTO `etai_intranet_niveau` (`id`, `nom_niveau`) VALUES
(1, 'Membre'),
(2, 'Moderateur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_secure`
--

CREATE TABLE `etai_intranet_secure` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `jeton` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `ip_connexion` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `date` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_secure`
--

INSERT INTO `etai_intranet_secure` (`id`, `id_membre`, `jeton`, `ip_connexion`, `date`) VALUES
(15, 2, 'q?ZK\n?^?:\"iz??/g', '::1', '1631202428'),
(16, 5, '$2y$10$wh76HsKdEKAKyJWyF3.FGumGdK0tiSrC9XhLTzCyIiL1So3QLs6My', '::1', '1627463966');

-- --------------------------------------------------------

--
-- Structure de la table `etai_intranet_smiley`
--

CREATE TABLE `etai_intranet_smiley` (
  `id` int(11) NOT NULL,
  `url` varchar(150) CHARACTER SET latin1 NOT NULL,
  `bbcode` varchar(4) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etai_intranet_smiley`
--

INSERT INTO `etai_intranet_smiley` (`id`, `url`, `bbcode`) VALUES
(1, 'design/image/smiley/1.gif', 'S1S'),
(2, 'design/image/smiley/2.gif', 'S2S'),
(3, 'design/image/smiley/3.gif', 'S3S'),
(4, 'design/image/smiley/4.gif', 'S4S'),
(5, 'design/image/smiley/5.gif', 'S5S'),
(6, 'design/image/smiley/6.gif', 'S6S'),
(7, 'design/image/smiley/7.gif', 'S7S'),
(8, 'design/image/smiley/8.gif', 'S8S'),
(9, 'design/image/smiley/9.gif', 'S9S'),
(10, 'design/image/smiley/10.gif', 'S10S'),
(11, 'design/image/smiley/11.gif', 'S11S'),
(12, 'design/image/smiley/12.gif', 'S12S'),
(13, 'design/image/smiley/13.gif', 'S13S'),
(14, 'design/image/smiley/14.gif', 'S14S'),
(15, 'design/image/smiley/15.gif', 'S15S'),
(16, 'design/image/smiley/16.gif', 'S16S'),
(17, 'design/image/smiley/17.gif', 'S17S'),
(18, 'design/image/smiley/18.gif', 'S18S'),
(19, 'design/image/smiley/19.gif', 'S19S'),
(20, 'design/image/smiley/20.gif', 'S20S'),
(21, 'design/image/smiley/21.gif', 'S21S'),
(22, 'design/image/smiley/22.gif', 'S22S'),
(23, 'design/image/smiley/23.gif', 'S23S'),
(24, 'design/image/smiley/24.gif', 'S24S'),
(25, 'design/image/smiley/25.gif', 'S25S'),
(26, 'design/image/smiley/26.gif', 'S26S'),
(27, 'design/image/smiley/27.gif', 'S27S'),
(28, 'design/image/smiley/28.gif', 'S28S'),
(29, 'design/image/smiley/29.gif', 'S29S'),
(30, 'design/image/smiley/30.gif', 'S30S'),
(31, 'design/image/smiley/31.gif', 'S31S'),
(32, 'design/image/smiley/32.gif', 'S32S'),
(33, 'design/image/smiley/33.gif', 'S33S'),
(34, 'design/image/smiley/34.gif', 'S34S'),
(35, 'design/image/smiley/35.gif', 'S35S'),
(36, 'design/image/smiley/36.gif', 'S36S'),
(37, 'design/image/smiley/37.gif', 'S37S'),
(38, 'design/image/smiley/38.gif', 'S38S'),
(39, 'design/image/smiley/39.gif', 'S39S'),
(40, 'design/image/smiley/40.gif', 'S40S'),
(41, 'design/image/smiley/41.gif', 'S41S'),
(42, 'design/image/smiley/42.gif', 'S42S'),
(43, 'design/image/smiley/43.gif', 'S43S'),
(44, 'design/image/smiley/44.gif', 'S44S'),
(45, 'design/image/smiley/45.gif', 'S45S'),
(46, 'design/image/smiley/46.gif', 'S46S'),
(47, 'design/image/smiley/47.gif', 'S47S'),
(48, 'design/image/smiley/48.gif', 'S48S'),
(49, 'design/image/smiley/49.gif', 'S49S'),
(50, 'design/image/smiley/50.gif', 'S50S'),
(51, 'design/image/smiley/51.gif', 'S51S'),
(52, 'design/image/smiley/52.gif', 'S52S'),
(53, 'design/image/smiley/53.gif', 'S53S'),
(54, 'design/image/smiley/54.gif', 'S54S'),
(55, 'design/image/smiley/55.gif', 'S55S'),
(56, 'design/image/smiley/56.gif', 'S56S'),
(57, 'design/image/smiley/57.gif', 'S57S');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etai_intranet_accesfiches`
--
ALTER TABLE `etai_intranet_accesfiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_activation`
--
ALTER TABLE `etai_intranet_activation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_activationmail`
--
ALTER TABLE `etai_intranet_activationmail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_avatar`
--
ALTER TABLE `etai_intranet_avatar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_comm`
--
ALTER TABLE `etai_intranet_comm`
  ADD PRIMARY KEY (`etai_intranet_comm_id`);

--
-- Index pour la table `etai_intranet_comm_lecteurs`
--
ALTER TABLE `etai_intranet_comm_lecteurs`
  ADD PRIMARY KEY (`etai_intranet_comm_lecteurs_id`);

--
-- Index pour la table `etai_intranet_membres`
--
ALTER TABLE `etai_intranet_membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_messagerie`
--
ALTER TABLE `etai_intranet_messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_niveau`
--
ALTER TABLE `etai_intranet_niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_secure`
--
ALTER TABLE `etai_intranet_secure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etai_intranet_smiley`
--
ALTER TABLE `etai_intranet_smiley`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etai_intranet_accesfiches`
--
ALTER TABLE `etai_intranet_accesfiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `etai_intranet_activation`
--
ALTER TABLE `etai_intranet_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etai_intranet_activationmail`
--
ALTER TABLE `etai_intranet_activationmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etai_intranet_avatar`
--
ALTER TABLE `etai_intranet_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT pour la table `etai_intranet_comm`
--
ALTER TABLE `etai_intranet_comm`
  MODIFY `etai_intranet_comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etai_intranet_comm_lecteurs`
--
ALTER TABLE `etai_intranet_comm_lecteurs`
  MODIFY `etai_intranet_comm_lecteurs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etai_intranet_membres`
--
ALTER TABLE `etai_intranet_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `etai_intranet_messagerie`
--
ALTER TABLE `etai_intranet_messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etai_intranet_niveau`
--
ALTER TABLE `etai_intranet_niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etai_intranet_secure`
--
ALTER TABLE `etai_intranet_secure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `etai_intranet_smiley`
--
ALTER TABLE `etai_intranet_smiley`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
