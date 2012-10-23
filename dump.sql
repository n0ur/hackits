drop database hackits;
create database hackits default character set utf8 collate utf8_unicode_ci;
use hackits;
grant select on hackits.* to `hackits-read` identified by 'readpass';
grant delete,update,insert,select on hackits.* to `hackits-write` identified by 'writepass';
flush privileges;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `hackits_challengeresults` (
  `userid` int(11) NOT NULL,
  `challengeid` int(11) NOT NULL,
  `finished` int(11) DEFAULT NULL,
  `lastattempt` int(11) NOT NULL,
  `penultimateattempt` int(11) DEFAULT NULL,
  `lastsolution` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hackits_challengeresults` (`userid`, `challengeid`, `finished`, `lastattempt`, `penultimateattempt`, `lastsolution`) VALUES
(2, 2, 1332529594, 0, 0, '0'),
(7, 2, 0, 1330783944, 0, 'jhsdfkjs'),
(1, 2, 0, 1330791052, 1330791038, 'lorem ipsum'),
(2, 1, 0, 1330798732, 1330798728, '567245727'),
(5, 2, 0, 1343163301, 1343163292, 'ddf'''),
(5, 1, 0, 1330866874, 1330866852, 'asdf'' or ''''='''),
(34, 2, 0, 1330875493, 1330872658, 'asd'),
(34, 1, 0, 1330872627, 0, 'Derp'),
(23, 2, 0, 1330875528, 1330875512, 'testchallenge'),
(23, 1, 0, 1330875531, 0, 'test'),
(6, 2, 0, 1330898143, 1330898124, 'answer1'),
(35, 2, 0, 1330907295, 1330907290, '$answer[1]'),
(3, 2, 0, 1332098694, 1332098676, '3'),
(4, 2, 0, 1334507240, 0, 'asd'),
(39, 2, 0, 1335388939, 0, 'sdf'),
(41, 2, 0, 1338991657, 1338991537, '-1 OR 1=1'),
(41, 1, 0, 1338991565, 0, '''OR 1=1 /*'''),
(43, 2, 1341697380, 0, 0, '0'),
(43, 1, 0, 1341697355, 0, '123'),
(44, 2, 0, 1343372445, 0, '"--;echo ''hello''"');

CREATE TABLE IF NOT EXISTS `hackits_challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `hackits_challenges` (`id`, `type`, `answer`, `completed`) VALUES
(1, 2, 'c237450bc9b83f379b73d24940bfdd76b814548c82ca5154bab45dcb86827dd8f13e09a7841653732efb48337f0ecc29757758e7f1903ffe78d14516c1fa0f8c', 1),
(2, 1, '123', 4);

CREATE TABLE IF NOT EXISTS `hackits_courseresults` (
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `finished` int(11) DEFAULT NULL,
  `lastattempt` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hackits_courseresults` (`userid`, `courseid`, `finished`, `lastattempt`) VALUES
(1, 1, 1329816181, 1329816181),
(2, 1, 1330040584, 1330040584),
(23, 1, 1329835195, 1329835195),
(5, 1, 1329851222, 1329851222),
(6, 1, 1329947909, 1329947909),
(35, 1, 1330608569, 1330608569),
(4, 1, 1331047151, 1331047151),
(34, 1, 1333903601, 1333903601),
(43, 1, 1341697156, 1341697156);

CREATE TABLE IF NOT EXISTS `hackits_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `author` int(11) NOT NULL COMMENT 'id from smf_members',
  `title` char(100) NOT NULL,
  `solution` text CHARACTER SET utf32 NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `hackits_courses` (`id`, `points`, `level`, `category`, `author`, `title`, `solution`, `completed`) VALUES
(1, 1, 1, 1, 2, 'Intro to Hackits Courses', 'cc', 9),
(2, 1, 2, 2, 1, 'Practical Network', 'jfdshflquhlfurflruhgaÃ‚Â²', 0),
(3, 5, 2, 1, 2, 'Internet Relay Chat (IRC)', 'xxxx', 0);

CREATE TABLE IF NOT EXISTS `hackits_users` (
  `id` int(11) NOT NULL,
  `challengescore` int(11) NOT NULL,
  `coursescore` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hackits_users` (`id`, `challengescore`, `coursescore`) VALUES
(2, 5, 1),
(1, 0, 1),
(23, 0, 1),
(5, 0, 1),
(6, 0, 1),
(35, 0, 1),
(4, 0, 1),
(34, 0, 1),
(43, 0, 1);

