-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 02-Dez-2020 às 23:41
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplicacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
CREATE TABLE IF NOT EXISTS `especialidade` (
  `idEspecialidade` int(11) NOT NULL AUTO_INCREMENT,
  `espNome` varchar(100) NOT NULL,
  PRIMARY KEY (`idEspecialidade`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`idEspecialidade`, `espNome`) VALUES
(3, 'DERMATOLOGIA'),
(2, 'CARDIOLOGIA'),
(4, 'GASTROLOGIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

DROP TABLE IF EXISTS `exame`;
CREATE TABLE IF NOT EXISTS `exame` (
  `idExame` int(11) NOT NULL AUTO_INCREMENT,
  `exNomeExame` varchar(100) NOT NULL,
  `exNomePaciente` varchar(100) NOT NULL,
  `exTexto` text NOT NULL,
  `exFoto` varchar(100) NOT NULL,
  PRIMARY KEY (`idExame`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`idExame`, `exNomeExame`, `exNomePaciente`, `exTexto`, `exFoto`) VALUES
(42, 'Nome Exame 4', 'Nome Paciente 4', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas nibh at magna aliquet fringilla. Pellentesque posuere, velit sagittis vestibulum blandit, ligula elit sollicitudin nisl, et finibus turpis magna id nibh. Fusce pellentesque, urna nec interdum gravida, dolor purus faucibus felis, euismod ornare turpis nisi quis lectus. Proin et metus non leo dapibus lacinia id at massa. Suspendisse massa nisi, condimentum eu ultrices ac, lobortis et sapien. Sed in accumsan nunc. Mauris interdum, neque eu tristique dignissim, metus sapien semper augue, quis vulputate enim lacus nec lectus.\r\n\r\nPellentesque eget lectus augue. Duis tincidunt lorem in est imperdiet luctus. Duis tristique consequat eros sit amet lacinia. In ullamcorper congue rhoncus. Mauris tempor nisi non est ornare, quis lacinia nisl auctor. Curabitur tincidunt mi ac odio lacinia, sit amet hendrerit tortor blandit. Donec eget lectus ipsum. Aenean justo lectus, sagittis vel pretium sed, laoreet at velit. Phasellus sollicitudin augue tellus. Curabitur sagittis mauris in nisl congue euismod. Integer ut aliquet metus. Ut at leo volutpat, lobortis nibh vitae, posuere mauris. Phasellus molestie lectus risus, non gravida sapien aliquet a. Sed tristique diam vehicula diam molestie, et pretium ante finibus. Sed mollis faucibus odio, non aliquet felis blandit quis.\r\n\r\nDonec a fermentum diam. In vel eleifend nibh, id consequat nisl. Quisque vel elit nec felis semper luctus. Duis mollis ornare dapibus. Proin fringilla nec augue sed gravida. Maecenas nulla ligula, posuere id lacinia at, egestas et urna. Praesent in erat sed nulla interdum ultrices quis in nibh. Praesent sit amet lectus metus. Mauris lacus lectus, rutrum ac nunc sed, imperdiet gravida elit. Suspendisse lacinia nisi enim, sit amet accumsan lectus dictum at. Ut fermentum vel ipsum eu luctus. Suspendisse potenti.\r\n\r\nUt gravida lectus id lacus elementum varius. Maecenas ut dui sed tellus malesuada gravida. Donec rutrum tortor sed ipsum lacinia consectetur. Donec aliquam a diam eu varius. Quisque rhoncus eros ut augue ultricies, eu ullamcorper lacus consectetur. Proin vitae enim tincidunt, posuere orci eget, facilisis lacus. Aliquam erat volutpat. Maecenas blandit, sapien sed lobortis faucibus, velit ipsum placerat orci, eu euismod lectus dolor fermentum nisi. Morbi auctor mauris eget urna dignissim, sed interdum nibh porttitor. Vestibulum in ligula eget diam tempor placerat. Morbi non porta libero. Donec ex ipsum, ultricies eget lorem vitae, interdum tristique odio.\r\n\r\nNunc feugiat ex in eros tristique tincidunt. Phasellus ex orci, congue non leo eu, lacinia interdum tortor. Sed mi mauris, cursus id pulvinar id, ultricies id est. Suspendisse quis tincidunt libero. Mauris pretium luctus porttitor. Cras sodales leo in elit tempus, a elementum nunc ultricies. Sed congue, massa ut dictum elementum, felis dolor placerat arcu, a egestas neque lacus sed odio. Quisque viverra eget magna quis accumsan. Donec efficitur enim sed neque sagittis scelerisque at vel felis. Praesent vulputate ex velit, suscipit sodales orci pretium eu. Vivamus pulvinar blandit dolor non scelerisque. Nullam metus augue, mattis at egestas id, luctus et lectus.', ''),
(41, 'Nome Exame 3', 'Nome Paciente 3', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas nibh at magna aliquet fringilla. Pellentesque posuere, velit sagittis vestibulum blandit, ligula elit sollicitudin nisl, et finibus turpis magna id nibh. Fusce pellentesque, urna nec interdum gravida, dolor purus faucibus felis, euismod ornare turpis nisi quis lectus. Proin et metus non leo dapibus lacinia id at massa. Suspendisse massa nisi, condimentum eu ultrices ac, lobortis et sapien. Sed in accumsan nunc. Mauris interdum, neque eu tristique dignissim, metus sapien semper augue, quis vulputate enim lacus nec lectus.\r\n\r\nPellentesque eget lectus augue. Duis tincidunt lorem in est imperdiet luctus. Duis tristique consequat eros sit amet lacinia. In ullamcorper congue rhoncus. Mauris tempor nisi non est ornare, quis lacinia nisl auctor. Curabitur tincidunt mi ac odio lacinia, sit amet hendrerit tortor blandit. Donec eget lectus ipsum. Aenean justo lectus, sagittis vel pretium sed, laoreet at velit. Phasellus sollicitudin augue tellus. Curabitur sagittis mauris in nisl congue euismod. Integer ut aliquet metus. Ut at leo volutpat, lobortis nibh vitae, posuere mauris. Phasellus molestie lectus risus, non gravida sapien aliquet a. Sed tristique diam vehicula diam molestie, et pretium ante finibus. Sed mollis faucibus odio, non aliquet felis blandit quis.\r\n\r\nDonec a fermentum diam. In vel eleifend nibh, id consequat nisl. Quisque vel elit nec felis semper luctus. Duis mollis ornare dapibus. Proin fringilla nec augue sed gravida. Maecenas nulla ligula, posuere id lacinia at, egestas et urna. Praesent in erat sed nulla interdum ultrices quis in nibh. Praesent sit amet lectus metus. Mauris lacus lectus, rutrum ac nunc sed, imperdiet gravida elit. Suspendisse lacinia nisi enim, sit amet accumsan lectus dictum at. Ut fermentum vel ipsum eu luctus. Suspendisse potenti.\r\n\r\nUt gravida lectus id lacus elementum varius. Maecenas ut dui sed tellus malesuada gravida. Donec rutrum tortor sed ipsum lacinia consectetur. Donec aliquam a diam eu varius. Quisque rhoncus eros ut augue ultricies, eu ullamcorper lacus consectetur. Proin vitae enim tincidunt, posuere orci eget, facilisis lacus. Aliquam erat volutpat. Maecenas blandit, sapien sed lobortis faucibus, velit ipsum placerat orci, eu euismod lectus dolor fermentum nisi. Morbi auctor mauris eget urna dignissim, sed interdum nibh porttitor. Vestibulum in ligula eget diam tempor placerat. Morbi non porta libero. Donec ex ipsum, ultricies eget lorem vitae, interdum tristique odio.\r\n\r\nNunc feugiat ex in eros tristique tincidunt. Phasellus ex orci, congue non leo eu, lacinia interdum tortor. Sed mi mauris, cursus id pulvinar id, ultricies id est. Suspendisse quis tincidunt libero. Mauris pretium luctus porttitor. Cras sodales leo in elit tempus, a elementum nunc ultricies. Sed congue, massa ut dictum elementum, felis dolor placerat arcu, a egestas neque lacus sed odio. Quisque viverra eget magna quis accumsan. Donec efficitur enim sed neque sagittis scelerisque at vel felis. Praesent vulputate ex velit, suscipit sodales orci pretium eu. Vivamus pulvinar blandit dolor non scelerisque. Nullam metus augue, mattis at egestas id, luctus et lectus.', ''),
(39, 'Nome Exame 1', 'Nome Paciente 1', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas nibh at magna aliquet fringilla. Pellentesque posuere, velit sagittis vestibulum blandit, ligula elit sollicitudin nisl, et finibus turpis magna id nibh. Fusce pellentesque, urna nec interdum gravida, dolor purus faucibus felis, euismod ornare turpis nisi quis lectus. Proin et metus non leo dapibus lacinia id at massa. Suspendisse massa nisi, condimentum eu ultrices ac, lobortis et sapien. Sed in accumsan nunc. Mauris interdum, neque eu tristique dignissim, metus sapien semper augue, quis vulputate enim lacus nec lectus.\r\n\r\nPellentesque eget lectus augue. Duis tincidunt lorem in est imperdiet luctus. Duis tristique consequat eros sit amet lacinia. In ullamcorper congue rhoncus. Mauris tempor nisi non est ornare, quis lacinia nisl auctor. Curabitur tincidunt mi ac odio lacinia, sit amet hendrerit tortor blandit. Donec eget lectus ipsum. Aenean justo lectus, sagittis vel pretium sed, laoreet at velit. Phasellus sollicitudin augue tellus. Curabitur sagittis mauris in nisl congue euismod. Integer ut aliquet metus. Ut at leo volutpat, lobortis nibh vitae, posuere mauris. Phasellus molestie lectus risus, non gravida sapien aliquet a. Sed tristique diam vehicula diam molestie, et pretium ante finibus. Sed mollis faucibus odio, non aliquet felis blandit quis.\r\n\r\nDonec a fermentum diam. In vel eleifend nibh, id consequat nisl. Quisque vel elit nec felis semper luctus. Duis mollis ornare dapibus. Proin fringilla nec augue sed gravida. Maecenas nulla ligula, posuere id lacinia at, egestas et urna. Praesent in erat sed nulla interdum ultrices quis in nibh. Praesent sit amet lectus metus. Mauris lacus lectus, rutrum ac nunc sed, imperdiet gravida elit. Suspendisse lacinia nisi enim, sit amet accumsan lectus dictum at. Ut fermentum vel ipsum eu luctus. Suspendisse potenti.\r\n\r\nUt gravida lectus id lacus elementum varius. Maecenas ut dui sed tellus malesuada gravida. Donec rutrum tortor sed ipsum lacinia consectetur. Donec aliquam a diam eu varius. Quisque rhoncus eros ut augue ultricies, eu ullamcorper lacus consectetur. Proin vitae enim tincidunt, posuere orci eget, facilisis lacus. Aliquam erat volutpat. Maecenas blandit, sapien sed lobortis faucibus, velit ipsum placerat orci, eu euismod lectus dolor fermentum nisi. Morbi auctor mauris eget urna dignissim, sed interdum nibh porttitor. Vestibulum in ligula eget diam tempor placerat. Morbi non porta libero. Donec ex ipsum, ultricies eget lorem vitae, interdum tristique odio.\r\n\r\nNunc feugiat ex in eros tristique tincidunt. Phasellus ex orci, congue non leo eu, lacinia interdum tortor. Sed mi mauris, cursus id pulvinar id, ultricies id est. Suspendisse quis tincidunt libero. Mauris pretium luctus porttitor. Cras sodales leo in elit tempus, a elementum nunc ultricies. Sed congue, massa ut dictum elementum, felis dolor placerat arcu, a egestas neque lacus sed odio. Quisque viverra eget magna quis accumsan. Donec efficitur enim sed neque sagittis scelerisque at vel felis. Praesent vulputate ex velit, suscipit sodales orci pretium eu. Vivamus pulvinar blandit dolor non scelerisque. Nullam metus augue, mattis at egestas id, luctus et lectus.', ''),
(40, 'Nome Exame 2', 'Nome Paciente 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer egestas nibh at magna aliquet fringilla. Pellentesque posuere, velit sagittis vestibulum blandit, ligula elit sollicitudin nisl, et finibus turpis magna id nibh. Fusce pellentesque, urna nec interdum gravida, dolor purus faucibus felis, euismod ornare turpis nisi quis lectus. Proin et metus non leo dapibus lacinia id at massa. Suspendisse massa nisi, condimentum eu ultrices ac, lobortis et sapien. Sed in accumsan nunc. Mauris interdum, neque eu tristique dignissim, metus sapien semper augue, quis vulputate enim lacus nec lectus.\r\n\r\nPellentesque eget lectus augue. Duis tincidunt lorem in est imperdiet luctus. Duis tristique consequat eros sit amet lacinia. In ullamcorper congue rhoncus. Mauris tempor nisi non est ornare, quis lacinia nisl auctor. Curabitur tincidunt mi ac odio lacinia, sit amet hendrerit tortor blandit. Donec eget lectus ipsum. Aenean justo lectus, sagittis vel pretium sed, laoreet at velit. Phasellus sollicitudin augue tellus. Curabitur sagittis mauris in nisl congue euismod. Integer ut aliquet metus. Ut at leo volutpat, lobortis nibh vitae, posuere mauris. Phasellus molestie lectus risus, non gravida sapien aliquet a. Sed tristique diam vehicula diam molestie, et pretium ante finibus. Sed mollis faucibus odio, non aliquet felis blandit quis.\r\n\r\nDonec a fermentum diam. In vel eleifend nibh, id consequat nisl. Quisque vel elit nec felis semper luctus. Duis mollis ornare dapibus. Proin fringilla nec augue sed gravida. Maecenas nulla ligula, posuere id lacinia at, egestas et urna. Praesent in erat sed nulla interdum ultrices quis in nibh. Praesent sit amet lectus metus. Mauris lacus lectus, rutrum ac nunc sed, imperdiet gravida elit. Suspendisse lacinia nisi enim, sit amet accumsan lectus dictum at. Ut fermentum vel ipsum eu luctus. Suspendisse potenti.\r\n\r\nUt gravida lectus id lacus elementum varius. Maecenas ut dui sed tellus malesuada gravida. Donec rutrum tortor sed ipsum lacinia consectetur. Donec aliquam a diam eu varius. Quisque rhoncus eros ut augue ultricies, eu ullamcorper lacus consectetur. Proin vitae enim tincidunt, posuere orci eget, facilisis lacus. Aliquam erat volutpat. Maecenas blandit, sapien sed lobortis faucibus, velit ipsum placerat orci, eu euismod lectus dolor fermentum nisi. Morbi auctor mauris eget urna dignissim, sed interdum nibh porttitor. Vestibulum in ligula eget diam tempor placerat. Morbi non porta libero. Donec ex ipsum, ultricies eget lorem vitae, interdum tristique odio.\r\n\r\nNunc feugiat ex in eros tristique tincidunt. Phasellus ex orci, congue non leo eu, lacinia interdum tortor. Sed mi mauris, cursus id pulvinar id, ultricies id est. Suspendisse quis tincidunt libero. Mauris pretium luctus porttitor. Cras sodales leo in elit tempus, a elementum nunc ultricies. Sed congue, massa ut dictum elementum, felis dolor placerat arcu, a egestas neque lacus sed odio. Quisque viverra eget magna quis accumsan. Donec efficitur enim sed neque sagittis scelerisque at vel felis. Praesent vulputate ex velit, suscipit sodales orci pretium eu. Vivamus pulvinar blandit dolor non scelerisque. Nullam metus augue, mattis at egestas id, luctus et lectus.', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuNome` varchar(100) NOT NULL,
  `usuSenha` varchar(50) NOT NULL,
  `usuLogin` varchar(100) NOT NULL,
  `usuNivel` int(11) DEFAULT '0',
  `usuDataCad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuNome`, `usuSenha`, `usuLogin`, `usuNivel`, `usuDataCad`) VALUES
(11, 'Bisaia Rodrigues', 'e10adc3949ba59abbe56e057f20f883e', 'teste', 0, '2020-11-27 12:58:22'),
(10, 'Julio Bisaia', '202cb962ac59075b964b07152d234b70', 'julio', 0, '2020-11-26 10:26:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
