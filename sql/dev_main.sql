-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 04:01 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(10) unsigned NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city`, `state`, `zip`, `country`, `coord_lat`, `coord_lng`, `remarks`, `created`, `updated`) VALUES
(1, '0', '0', '', 0, 0, 0, '', '2014-10-09 07:16:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`ID` int(15) NOT NULL,
  `target_type` varchar(255) NOT NULL,
  `target_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attach_type` text NOT NULL,
  `attach_data` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `target_type`, `target_id`, `user_id`, `message`, `attach_type`, `attach_data`) VALUES
(1, '0', '0', '17', 'test', '0', ''),
(2, '0', '0', '17', 'test', '0', ''),
(3, '0', '0', '17', 'test', '0', ''),
(4, '0', '0', '53', 'test', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `email`, `username`, `password`, `created`, `updated`) VALUES
(1, 1, 'jetriconew@gmail.com', 'dragonjet', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(2, 2, 'airzakura@gmail.com', 'airzakura', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(3, 1, 'rare@rare.com', 'rarepat', '1185dd71b0fe452712afaecb6cf3529e', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(4, 1, 'ruelminds@me.com', 'ruelminds', '94cc51084dc6603fbc09042055a3a11c', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(5, 1, 'jreyes@yahoo.com', 'jreyes', 'ed05465ecf7121c255b32e7f1ffbf124', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(6, 2, 'heisenberg@gmail.com', 'heisenberg', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(7, 2, 'areyes@yahoo.com', 'areyes', '1f64c94fab7bec7f52c33309efce6266', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(8, 1, 'jaycu@gmail.com', 'jaycu', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(9, 1, 'ilyas@gmail.com', 'ilyas', '3ea4a8e4d7a95ace878f907ab8b72d1b', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(10, 1, 'sbederi@gmail.com', 'sbederi', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(11, 1, 'da.vibe@hotmail.com', 'DBederi', 'e8f7b8b18c541378c54bfa30f7947829', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(12, 1, 'jasper_frederick02@yahoo.com', 'jasper_frederick02', '347efb63414eb263159a736543aad653', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(13, 1, '3conceptz@gmail.com', 'Z3mama', 'dff5b99208914dadad6c839d2de0b6ac', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(14, 1, 'ilyas@checkapp.asia', 'ilyas2', '0d58cb6d6eca88f59cba3799de36b372', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(15, 1, 'zach.bederi@gmail.com', 'zach bederi', '5741d2fa6ff34e6c0118994e7fd9f5a9', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(16, 1, 'mel_ranola@yahoo.com', 'mel_ranola', '5d76beffe761403531a6eb339e0f0231', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(17, 1, 'ruelminds@mac.com', 'Leur', '9e7fa2e06725093c93c885b37036317c', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(18, 1, 'gapragudo2@gmail.com', 'Gabriel Phillip Ragudo', 'a3dcb4d229de6fde0db5686dee47145d', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(19, 1, 'phillip_ragudo@yahoo.com', 'Felipe W. Ragudo', '63dff83e4483dc088ad94a3de8943835', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(20, 1, 'p_ragudo@yahoo.com', 'lipip', 'a8f5f167f44f4964e6c998dee827110c', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(21, 1, 'bederi.stella@gmail.com', 'chinbederi87', '1f9fca1feed543ff0fd981a157e159cd', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(22, 1, 'bbederi@gmail.com', 'buck bederi II', '02ae80d3ed12356cb95f3e15d28dda34', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(23, 1, 'simple_days2000@yahoo.com', 'dairan03', 'fc721c07de307ab6e6285c3ec9bb54b3', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(24, 1, 'winnie.ragudo@gmail.com', 'Winnie Ragudo', 'c2fc3ef12f5e28f3b4bec1705eb73359', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(25, 1, 'Marifler@yahoo.com', 'Fler', 'a4b02c4a8e64c13e22a7b4bee76d14ff', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(26, 1, 'alex.azurin@yahoo.com', 'Alex Azurin', 'c6dad9264fb53a668b4ee0659213f8c4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(27, 1, 'heschlx@yahoo.com', 'Jeff Michael de la rosa ', '331f84902e94f8eba9b77bb149126a1f', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(28, 1, 'emz_lyn18@yahoo.com', 'em bernardino', '7d42fafd80e159be88fc06367265fd9f', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(29, 1, 'qwert@qwet.com', 'qwert', 'a384b6463fc216a5f8ecb6670f86456a', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(30, 1, 'lgcale@gmail.com', 'louie', '0f359740bd1cda994f8b55330c86d845', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(31, 1, 'rai_perjes08@yahoo.com', 'Raia Isabella', 'c3b6bf5f1d2f4b48b12865bfa07bc4ad', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(32, 1, 'rinnamariee@gmail.com', 'rinnamarie', 'dd5c678d88c2d3a34402cff150fb1ef0', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(33, 1, 'infantelalaine@gmail.com', 'Lala09', '917cefd8ae06bae259538a9b022e4bca', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(34, 1, 'myatsq@yahoo.com', 'ana q', '5cb15f68c6b7b7bced9079f27d880ec5', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(35, 1, 'dermcorner@yahoo.com', 'bertex', '5c101884a49c50f03ca3e6a01ef529c7', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(36, 1, 'jabber.janna@gmail.com', 'janna17', '6ff1f49f186b15df83533f6b87d395c8', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(37, 1, 'ryan.escarez@gmail.com', 'ryan.escarez', '2ffbb2526fa74d25b9f5a2a273b8b355', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(38, 1, 'salivatears@gmail.com', 'salivatears', 'c2c566e0e866d55fafb43f9ea3723600', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(39, 1, 'juan@me.com', 'juan', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(40, 1, 'juan@me.de', 'juanthree', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(41, 1, 'menardjaycu2@gmail.com', 'menard69', 'a8f5f167f44f4964e6c998dee827110c', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(42, 1, 'carla@pat.com', 'carlapat', '1fa4a2211b4e290f2a066de6b84187ec', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(43, 1, 'dardsmindworks@gmail.com', 'patient01', '3c386dcc8e8cb6edddb864fd71d46375', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(44, 1, 'menardjaycu@gmail.com', 'whattest', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(45, 1, 'edmark_sanchez@yahoo.com', '!superuser', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(46, 1, 'edmarkharold@gmail.com', 'edsss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(47, 1, 'fb.japajarillo@gmail.com', 'fb.japajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(48, 1, 'bryanroymendoza@gmail.com', 'lastroy', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(49, 1, 'dontwanncloseyoureyes@gmail.com', 'dontwanna', '742a2d5b4726f2fad1136a40c6e5736a', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(50, 1, 'patient@admin.com', 'patient@admin.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(51, 2, 'menardjaycu1@gmail.com', 'menardcu', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(52, 2, 'salivatzxzxz', 'rafael', '9135d8523ad3da99d8a4eb83afac13d1', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(53, 2, 'syed@checkapp.asia', 'checkapp', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(54, 2, 'stella.bederi@hotmail.com', 'DrBederi', '1f9fca1feed543ff0fd981a157e159cd', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(55, 2, 'raremon@gmail.com', 'raremon', '2e972b14c2eb71db8828b89cfad77e0a', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(56, 2, 'drteh@medicine.com.my', 'Alan Teh', 'c559fc9be2e3fe04d4a42dd6b9b63435', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(57, 2, 'ooi.clinic@gmail.com', 'doc001', 'c8581f2a7e4d2fec82b15548962c0b0f', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(58, 2, 'rescarez@gmail.com', 'rescarez', '2ffbb2526fa74d25b9f5a2a273b8b355', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(59, 2, 'juan@me.me', 'juanto', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(60, 2, 'carla@carla.com', 'carla', '1fa4a2211b4e290f2a066de6b84187ec', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(61, 2, 'salivatears@yahoo.com', 'drrafael', '156c0d646e0e7704a443f9fd9bff08da', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(62, 2, 'dardsmindworks@yahoo.com', 'Physician01', '28a76f841ed138bc9a718e205992081e', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(63, 2, 'edmarkharolds@gmail.com', 'dev', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(64, 2, 'git.japajarillo@gmail.com', 'git.japajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(65, 2, 'raremon2@gmail.com', 'raremon2', '3833490ca05b6a86163b6f355b4b5a3e', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(66, 1, 'raremonpat@gmail.com', 'raremonpat', '793c1b184b7a211b3f6a021547941cfc', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(67, 1, 'raremonpat2@gmail.com', 'raremonpat2', 'a0ca2912690254d0c694073d64a82398', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(68, 1, 'ruelminds@gmail.com', 'leurminds', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(69, 2, 'ruelminds@yahoo.com', 'drjohn', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(70, 2, 'ruel@checkapp.asia', 'drken', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(71, 1, 'sunny@webhoop.com', 'sunnyzimm', 'fb97cfe93e8e8d526916df4aec8171ed', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(72, 1, 'abet@checkapp.asia', 'abetuson', '0182b73961bcff96aeaa6ee6ab8d7ffd', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(73, 1, 'jsantos@yahoo.com', 'jsantos', 'e85c7fd8e4c79c1c3ced59dd9db3534f', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(74, 2, 'jtorres@yahoo.com', 'jtorres', '7bf239eb3f20e10a56cc866b8e5a7197', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(75, 2, 'raremondoc2@docdoc.com', 'raremondoc2', '160a053d5ce569744621a3955848c985', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(76, 2, 'doctoredmark@yopmail.com', 'doctoredmark', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(77, 1, 'patientedmark@yopmail.com', 'patientedmark', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(78, 2, 'jmpajarillo@gmail.com', 'dpajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(79, 1, 'babalama3@gmail.com', 'babalams', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(80, 1, 'tokageru@gmail.com', 'raremonpat3', '3b921b0aac6c302e17a4f2efbf3df5cb', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(81, 2, 'rellmon@doc.com', 'rellmondoc', '4b1dcbc485a81c6e7933ffa7fe6c5bf4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(82, 1, 'liamparungao@gmail.com', 'liamparungao', 'e5b0aaf5578aac9ee499b36cf6830d84', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(83, 2, 'rianparungao@gmail.com', 'gabrielparungao', '647431b5ca55b04fdf3c2fce31ef1915', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(84, 1, 'bryan@yopmail.com', 'bryan', '7d4ef62de50874a4db33e6da3ff79f75', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(85, 2, 'lastroyy@gmail.com', 'lastroyy', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(86, 1, 'melchorkenneth@gmail.com', 'melchorkenneth', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(87, 1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2014-08-05 03:28:15', '0000-00-00 00:00:00'),
(88, 2, 'rizalnevado@yahoo.com', 'rizalnevado', '16d7a4fca7442dda3ad93c9a726597e4', '2014-11-20 15:50:38', '0000-00-00 00:00:00'),
(89, 1, 'mail.vurmz@gmail.com', 'vpatient1', '96e79218965eb72c92a549dd5a330112', '2014-11-21 08:39:54', '0000-00-00 00:00:00'),
(90, 2, 'mail.vurmz@gmail.com', 'vdoctor1', '96e79218965eb72c92a549dd5a330112', '2014-11-21 08:43:03', '0000-00-00 00:00:00'),
(91, 1, 'asdf@asdf.com', 'asdfasdf', '6a204bd89f3c8348afd5c77c717a097a', '2014-11-27 08:54:09', '0000-00-00 00:00:00'),
(107, 1, 'test@mail.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-06 17:12:54', '0000-00-00 00:00:00'),
(108, 1, 'bonryan@gmail.com', 'BonBon', '1bbd886460827015e5d605ed44252251', '2014-12-06 17:21:22', '0000-00-00 00:00:00'),
(109, 1, 'test@mail.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-06 17:27:06', '0000-00-00 00:00:00'),
(111, 1, 'bonryan@gmail.com', 'p660963', '1bbd886460827015e5d605ed44252251', '2014-12-07 14:55:58', '0000-00-00 00:00:00'),
(112, 1, 'bonryan@gmail.com', 'p522823', '1bbd886460827015e5d605ed44252251', '2014-12-07 15:01:59', '0000-00-00 00:00:00'),
(113, 1, 'bonryan@gmail.com', 'p809741', '1bbd886460827015e5d605ed44252251', '2014-12-07 15:16:37', '0000-00-00 00:00:00'),
(114, 1, 'bonryan@gmail.com', 'p323782', '1bbd886460827015e5d605ed44252251', '2014-12-07 15:24:19', '0000-00-00 00:00:00'),
(120, 1, 'ruelminds@mac.com', 'sam', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-12-08 04:33:46', '0000-00-00 00:00:00'),
(121, 1, 'test@mail.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 04:34:41', '0000-00-00 00:00:00'),
(122, 1, 'test@mail.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 04:34:55', '0000-00-00 00:00:00'),
(123, 1, 'test@mail.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 04:35:15', '0000-00-00 00:00:00'),
(124, 1, 'ruelminds.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 04:49:40', '0000-00-00 00:00:00'),
(125, 1, 'ruelminds@mac.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 04:55:20', '0000-00-00 00:00:00'),
(127, 1, 'ruelminds@mac.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 08:15:30', '0000-00-00 00:00:00'),
(128, 1, 'ruelminds@mac.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 08:29:38', '0000-00-00 00:00:00'),
(129, 1, 'bonryan@gmail.com', 'p487712', '1bbd886460827015e5d605ed44252251', '2014-12-08 08:33:39', '0000-00-00 00:00:00'),
(130, 1, 'ruelminds@mac.com', 'testinglang', '81dc9bdb52d04dc20036dbd8313ed055', '2014-12-08 08:50:14', '0000-00-00 00:00:00'),
(131, 1, 'bonryan@gmail.com', 'p487712', '1bbd886460827015e5d605ed44252251', '2014-12-08 13:30:46', '0000-00-00 00:00:00'),
(132, 1, 'info@thumbfriends.com', 'p975475', '1bbd886460827015e5d605ed44252251', '2014-12-11 12:38:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country_id` int(3) NOT NULL,
  `gender` int(10) unsigned NOT NULL,
  `birthdate` datetime NOT NULL,
  `num_landline` varchar(30) NOT NULL,
  `num_phone1` varchar(30) NOT NULL,
  `num_phone2` varchar(30) NOT NULL,
  `c_skype` varchar(100) NOT NULL,
  `c_msn` varchar(100) NOT NULL,
  `c_yahoo` varchar(100) NOT NULL,
  `c_gtalk` varchar(100) NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `title`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `city`, `state`, `country_id`, `gender`, `birthdate`, `num_landline`, `num_phone1`, `num_phone2`, `c_skype`, `c_msn`, `c_yahoo`, `c_gtalk`, `coord_lat`, `coord_lng`, `profile_pic`, `updated`) VALUES
(1, 'Mr.', 'Jet Rico', 'Pollicar', 'Bañas', 'P41-12, 6-11th Street, Villamor', '0', '', '', 0, 1, '1990-06-07 00:00:00', '0', '639276156481', '639102836224', 'jet.rico', '0', 'jetriconew2@yahoo.com', 'jetriconew@yahoo.com', 14.5269243, 121.0149097, '53b6190907626.jpeg', '2014-07-04 03:03:54'),
(2, 'Mr.', 'Taigei', '', 'Ryuuhou', 'G', '0', '', '', 1, 0, '1991-09-28 00:00:00', '0', '1234567', '9876543', 'wotamin.', '0', 'qwe', 'rty', 50.8850706, 12.0807203, '53b61fa4bc1f3.jpeg', '2014-07-04 12:59:35'),
(4, '', 'rarepat', '', 'rarepat', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(17, '', 'Ruel', '', 'Minds', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '0', '', '', '', '', '', '', 0, 0, '539d9103c6de4.jpg', '2014-06-15 12:26:43'),
(18, '', 'Jose', '', 'Reyes', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '539d9103d3ad5.jpg', '2014-06-15 12:26:43'),
(19, 'Mr.', 'Walter', 'Hartwell', 'White', '308 Negra Arroyo Lane', '0', 'Albuquerque', 'New Mexico', 0, 1, '1959-09-07 00:00:00', '0', '1234567', '2345678', 'test_skype', '0', 'test_yahoo', 'test_google', 0, 0, '53b22241f2dd2.jpeg', '2014-07-04 12:23:57'),
(20, '', 'antonio', '', 'reyes', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(31, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-07-02 08:53:11'),
(34, '2', '', '', '', 'here star', 'AO', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-07-02 08:53:11'),
(37, '2', '', '', '', 'Kuala Lumpur', 'MY', '', '', 0, 1, '2014-02-11 00:00:00', '', '0193801733', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(38, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(39, '2', '', '', '', 'Cagayan de Oro City', 'PH', '', '', 0, 1, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(40, '2', '', '', '', 'Aston Kiara 3 Jalan kiara, Kuala Lumpur', 'MY', '', '', 0, 2, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(41, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(42, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(43, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(44, 'Mr.', 'Ruel', '', 'Minds', '#1 Ayala Avenue', '0', 'Makati', 'NCR', 1, 1, '1980-02-11 00:00:00', '0', '', 'W', '', '0', '', '', 14.5564882, 121.0216932, '53b0ec9f9760c.jpeg', '2014-08-01 13:01:39'),
(45, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(46, 'Mr.', 'Phillip', 'Wee', 'Ragudo', 'Lot 20 Block 11 Oak St., Multinational Village', '0', 'Paranaque', 'Metro Manila', 0, 1, '1965-12-22 00:00:00', '0', '+6329189942797', '', '', '0', 'phillip_ragudo@yahoo.com', '', 0, 0, 'default.jpg', '2014-07-13 15:37:16'),
(47, '2', '', '', '', '', 'Select you', '', '', 0, 1, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(48, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(49, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(50, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(51, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(52, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(53, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(54, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(55, '2', '', '', '', '', 'PH', '', '', 0, 2, '2014-02-11 00:00:00', '', '', 'W', '', '', 'emz_lyn18@yahoo.com', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(56, '2', '', '', '', '', 'Select you', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(57, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(58, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(59, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(60, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(61, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(62, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(63, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(64, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(65, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(66, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(67, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(68, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(69, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(70, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(71, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(73, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(76, '2', '', '', '', '', '', '', '', 0, 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-07-02 08:53:11'),
(79, 'Mr.', 'John', '', 'Pajarillo', '46 Kalakhan St., Calumpang', '0', 'Marikina', 'Metro Manila', 0, 1, '1990-08-15 00:00:00', '0', '', '', '', '0', '', '', 14.6133639, 121.0861841, '53b4d54e5a805.jpeg', '2014-07-03 04:00:16'),
(80, 'Mr.', 'Bryan', 'A', 'Mendoza', '', '0', '', '', 0, 0, '2014-11-30 00:00:00', '0', '', 'W', '', '0', '', '', 0, 0, 'default.jpg', '2014-08-01 12:49:38'),
(82, '2', 'Dont', '', 'Wanna', '', '', '', '', 0, 1, '1989-12-31 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(83, '2', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(84, '2', 'Jane', '', 'Doe', '', '', '', '', 0, 1, '2014-01-28 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, '539d91040f3ed.jpg', '2014-06-15 12:26:44'),
(85, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '0', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(86, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(87, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(88, 'Mr.', 'Rellmon', 'P.', 'Ponce de Leon', 'asdf asdf', '0', '', '', 0, 0, '2012-09-03 00:00:00', '0', '234', '57675', 'raremon', '0', '', '', 37.7794841, -122.4295797, '53ad150ff3368.jpeg', '2014-07-25 10:32:27'),
(89, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(90, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(91, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(92, '2', 'Ruel Michael', '', 'Delfin', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(95, '2', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(96, '2', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(97, '2', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(101, '2', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(102, 'Mr.', 'John Aldrin', '', 'Pajarillo', '46 Kalakhan St., Calumpang', '0', 'Marikina', 'Metro Manila', 0, 1, '1990-08-15 00:00:00', '0', '1234567', '2345678', 'skype_id_test', '0', 'yahoo_id_test', 'google_id_test', 14.6133639, 121.0861841, '53b4e3171cf8b.jpeg', '2014-07-03 04:59:03'),
(105, '', 'raremon2', '', 'raremon2', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(106, 'asdf', 'raremonpat', 'asdf', 'raremonpat', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '0', '2342423', '', '', '', '', '', 0, 0, '539d91045c737.jpg', '2014-06-25 02:49:47'),
(107, '', 'raremon', 'pat', 'second', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '0', '12345', '', 'raremon2', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(108, '', 'Ruel', '', 'Minds', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(109, '', 'John', '', 'Castro', '', '', '', '', 0, 1, '0000-00-00 00:00:00', '0', '', '', '', '', '', '', 0, 0, '53b268eba1e76.png', '2014-07-01 08:01:43'),
(110, '', 'Ken', '', 'Doe', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(111, '', 'Sunny', '', 'Khiani', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(112, '', 'Abet', '', 'Uson', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(118, '', 'Jose', '', 'Santos', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(119, '', 'Jose', '', 'Torres', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(122, '', 'raremon', '', 'doc', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(125, 'mr', 'Doctor', 'r', 'Edmark', 'r', 'r', '', '', 0, 1, '1987-06-09 00:00:00', '0', '123', '123', '222', 'd', 'd', 'd', 49.0134297, 49.0134297, 'default.jpg', '2014-06-30 04:51:09'),
(126, '', 'patient', '', 'edmark', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(128, '', 'drin', '', 'Pajarillo', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '53b215afb6e42.jpeg', '2014-07-01 01:58:08'),
(129, 'Mr.', 'Baba', '', 'Lams', '', '0', 'Kuala lumpur', '', 0, 1, '1971-03-13 00:00:00', '0', '', '', '', '0', '', '', 0, 0, '53be06ae51edc.jpeg', '2014-08-03 05:39:11'),
(130, '', 'RellmonPat', '', 'PoncedeleonPat', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(131, '', 'RellmonDoc', '', 'PoncedeleonDoc', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(132, '', 'liam', '', 'parungao', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(133, 'Mr.', 'gabriel', '', 'parungao', 'Manggahan Village', '0', 'Pasig', 'Manilaa', 4, 0, '1930-04-17 00:00:00', '0', '', '', '', '0', '', '', 14.5132218, 121.0403226, 'default.jpg', '2014-07-08 05:09:53'),
(134, 'Mr.', 'Bryan Roy', '', 'Mendoza', 'P11-06 12th 5th Villamor', '0', '', '', 0, 1, '1990-06-20 00:00:00', '0', '799 88 31', '0917 9585 100', 'lastroy', '0', '', '', 0, 0, '53b4f0bf12348.jpeg', '2014-07-10 06:29:58'),
(135, 'Mr.', '', '', '', '', '0', '', '', 0, 0, '1990-06-20 00:00:00', '0', '', '', '', '0', '', '', 0, 0, 'default.jpg', '2014-07-10 06:30:49'),
(136, '', 'Melchor Kenneth', '', 'Mersado', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(137, '', 'Toka', '', 'Geru', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(138, '', 'VIlmer', '', 'Morales', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '53de4811b849f.jpeg', '2014-08-03 14:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `versioning`
--

CREATE TABLE IF NOT EXISTS `versioning` (
`id` int(10) unsigned NOT NULL,
  `table_name` text NOT NULL,
  `record_key` int(10) unsigned NOT NULL,
  `changes` text NOT NULL,
  `date_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `versioning`
--
ALTER TABLE `versioning`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `versioning`
--
ALTER TABLE `versioning`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
