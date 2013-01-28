-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hackits
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `de9f8caa_action`
--

DROP TABLE IF EXISTS `de9f8caa_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `comment` text,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_action`
--

LOCK TABLES `de9f8caa_action` WRITE;
/*!40000 ALTER TABLE `de9f8caa_action` DISABLE KEYS */;
INSERT INTO `de9f8caa_action` VALUES (1,'message_write',NULL,NULL),(2,'message_receive',NULL,NULL),(3,'user_create',NULL,NULL),(4,'user_update',NULL,NULL),(5,'user_remove',NULL,NULL),(6,'user_admin',NULL,NULL);
/*!40000 ALTER TABLE `de9f8caa_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_categories`
--

DROP TABLE IF EXISTS `de9f8caa_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_categories`
--

LOCK TABLES `de9f8caa_categories` WRITE;
/*!40000 ALTER TABLE `de9f8caa_categories` DISABLE KEYS */;
INSERT INTO `de9f8caa_categories` VALUES (11,'Cryptography'),(10,'Database'),(1,'General'),(7,'Hardware'),(9,'Internet'),(6,'Linux'),(2,'Networking'),(8,'Programming'),(4,'Security'),(5,'Windows');
/*!40000 ALTER TABLE `de9f8caa_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_challengeresults`
--

DROP TABLE IF EXISTS `de9f8caa_challengeresults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_challengeresults` (
  `userid` int(11) NOT NULL,
  `challengeid` int(11) NOT NULL,
  `finished` int(11) DEFAULT NULL,
  `lastattempt` int(11) NOT NULL,
  `penultimateattempt` int(11) DEFAULT NULL,
  `lastsolution` varchar(250) NOT NULL,
  PRIMARY KEY (`userid`,`challengeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_challengeresults`
--

LOCK TABLES `de9f8caa_challengeresults` WRITE;
/*!40000 ALTER TABLE `de9f8caa_challengeresults` DISABLE KEYS */;
INSERT INTO `de9f8caa_challengeresults` VALUES (1,2,0,1330791052,1330791038,'lorem ipsum'),(2,1,0,1330798732,1330798728,'567245727'),(2,2,1332529594,0,0,'0'),(3,2,0,1332098694,1332098676,'3'),(4,2,0,1334507240,0,'asd'),(5,1,0,1330866874,1330866852,'asdf\' or \'\'=\''),(5,2,0,1343163301,1343163292,'ddf\''),(6,2,0,1330898143,1330898124,'answer1'),(7,2,0,1330783944,0,'jhsdfkjs'),(23,1,0,1330875531,0,'test'),(23,2,0,1330875528,1330875512,'testchallenge'),(34,1,0,1330872627,0,'Derp'),(34,2,0,1330875493,1330872658,'asd'),(35,2,0,1330907295,1330907290,'$answer[1]'),(39,2,0,1335388939,0,'sdf'),(41,1,0,1338991565,0,'\'OR 1=1 /*\''),(41,2,0,1338991657,1338991537,'-1 OR 1=1'),(43,1,0,1341697355,0,'123'),(43,2,1341697380,0,0,'0'),(44,2,0,1343372445,0,'\"--;echo \'hello\'\"');
/*!40000 ALTER TABLE `de9f8caa_challengeresults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_challenges`
--

DROP TABLE IF EXISTS `de9f8caa_challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_challenges`
--

LOCK TABLES `de9f8caa_challenges` WRITE;
/*!40000 ALTER TABLE `de9f8caa_challenges` DISABLE KEYS */;
INSERT INTO `de9f8caa_challenges` VALUES (1,2,'c237450bc9b83f379b73d24940bfdd76b814548c82ca5154bab45dcb86827dd8f13e09a7841653732efb48337f0ecc29757758e7f1903ffe78d14516c1fa0f8c',1),(2,1,'123',4);
/*!40000 ALTER TABLE `de9f8caa_challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_course_chapters`
--

DROP TABLE IF EXISTS `de9f8caa_course_chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_course_chapters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `de9f8caa_course_chapters_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `de9f8caa_courses` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_course_chapters`
--

LOCK TABLES `de9f8caa_course_chapters` WRITE;
/*!40000 ALTER TABLE `de9f8caa_course_chapters` DISABLE KEYS */;
INSERT INTO `de9f8caa_course_chapters` VALUES (3,'Hackits Courses','<h2>Course structure</h2>\r\n                <p>All courses consist of one or more theory chapters, usually followed by some exercises that allow you to test your understanding of the theory. These exercises are always optional. Finally there is an exam for each course, which will show that you master the course contents and will earn you Hackits points! There is no time limit or penalty for reading a course or doing an exam, so no need to stress.</p>\r\n                <p>At the left of the screen you see how the course is structured, and you can select a chapter/exercise to display and an exam link at the bottom of the list. Usually you will find links to the next part at the bottom of a page as well. At the top of the screen you see some tabs, currently you are in the \'Current Course\' tab of the Courses system. At any time you can click on another tab to check out its contents, as long as you dont select a different course from the overview or refresh the page, your \'Current Course\' tab will stay the same as when you left it.</p>\r\n                <h2>Logging in</h2>\r\n                <p>We advise that you first log in to the <a href=\"http://www.hackits.be/forum/\" target=\"new\">Hackits forum</a> before using the Courses system, because it will allow you to view which courses you completed in the overview, and it will allow the courses system to award you personally with points when completing an exam. You can see if you are logged in by checking out the top bar of the Courses page, which should say \'Logged in as: \' followed by your forum account name. If you submit an exam without being logged in, a warning will be displayed telling you to log in to the forum in a different browser tab or window, no need to fill in the exam again.</p>\r\n                <h2>Difficulty</h2>\r\n                <p>Each course has a difficulty level assigned to it by the Hackits team, the higher the difficulty the higher the score thats rewarded by completing the exam. Also at the start of a course there might be links to other courses as prerequisites listed, we advise that you complete those courses so you will have a much smoother learning curve. </p>\r\n                <p>If you think you already know the contents of a course and want to skip right to the exam, feel free to do so, but keep in mind that there might be details in the theory that you didn\'t know about, or can use some refreshing in your brain. </p>\r\n                ',1,1),(4,'More About Courses','<h2>Getting help</h2>\r\n                <p>The best place to get help on a course is the <a href=\"http://www.hackits.be/forum/index.php?board=12.0\">Courses Help section</a> in the forum. In here, other hackits members and staff can help you out and think along. The questions and remarks you give us, can help us make the courses better for everybody!</p>\r\n                <p>If you need realtime communication then IRC might be a good choice instead, but keep in mind that the author of the course might not be available or on IRC at all.</p>\r\n                <h2>Feedback</h2>\r\n                <p>If something about the Course system is not working like it should, or isn\'t being displayed properly in your browser, or the actual content of the course is outdated or false, there are a few ways to get in contact with the Hackits team.</p>\r\n                <p>First of all, security-related issues should always be communicated privately to one of the Hackits <a href=\"http://www.hackits.be/forum/index.php?action=mlist;sort=id_group;start=0\">Administrators</a>, either trough a private message on the forum, or a query on IRC.</p>\r\n                <p>Technical issues or styling (HTML/CSS) issues are probably best discussed with the author of the Courses system, Sling. He is usually available on IRC but you can of course <a href=\"http://www.hackits.be/forum/index.php?action=pm;sa=send;u=2\">PM</a> him on the Forum as well.</p>\r\n                <p>All other feedback can be given publically in the <a href=\"http://www.hackits.be/forum/index.php?board=11.0\">right section in the Forum</a>.</p>\r\n                <h2>Submitting your own course</h2>\r\n                <p>If you want to share your knowledge about a certain topic that hasn\'t already been covered in a course, feel free to submit your own tutorial on it to <a href=\"http://www.hackits.be/forum/index.php?topic=11.0\">the forum</a>. Staff will check it out and if it meets the quality standards for a course, we will try to get in contact with you to create a new course! If you aren\'t sure if the topic has been covered or if your idea is suitable for a course, just join us on IRC and we can have a chat!</p>\r\n                <h2>Final words</h2>\r\n                <p>This is all we have to tell you about the courses system itself, head over to the <a href=\"#\">exercise</a> to see how an example exercise looks.</p>\r\n                <p>Welcome again and have a great learning experience!</p>',1,1),(5,'How IRC works','',3,1),(6,'IRC Security','',3,1),(7,'Dynamic Host Configuration Protocol','                    <h2>Theory</h2><br />\r\n                    <p>DHCP stands for Dynamic Host Configuration Protocol and is used for automated/centralized configuration of IP addresses.</p>\r\n                    <p>This tutorial\'s objective is to cover the 1% of dhcp capabilities that is sufficient in 99% of it\'s uses, and to get your dhcp server running.</p>\r\n                    <p>If you want a deeper understanding of DHCP, please consult <a href=http://tools.ietf.org/html/rfc2131>RFC2131</a></p><br />\r\n                    <p>Basically, when you connect your computer to a network cable or a wifi network and things just work, it is thanks to DHCP, it gives your computer a free IP address in the right range, the submask, default gateway, DNS server it\'s supposed to use (and some other things too).</p>\r\n                        <ul>\r\n                            <li> You plug the cable in the computer </li>\r\n                            <li> The DHCP client sends out a DHCPDISCOVER</li>\r\n                            <li> The DHCP server receives it and sends a DHCPOFFER</li>\r\n                            <li> The DHCP client confirms responding with a DHCPREQUEST</li>\r\n                            <li> The DHCP server confirms with a DHCPACK to confirm the settings</li>\r\n                            <li> Your computer now has an IP address, knows it\'s network submask and default gateway, as well as the DNS server it\'s supposed to use (and maybe some other things too).</li>\r\n                            <li> When leaving the network, the DHCP client sends a DHCPRELEASE.</li>\r\n                        </ul><br />\r\n                    <h2>Practice</h2><br />\r\n                    <h3>Client setup</h3>\r\n                    <p>To configure the client in windows, set your interface on automatic configuration.</p>\r\n                    <p>To configure the interface un *nix, use \"dhclient [interface]\" as root in a console.</p><br />\r\n                    <p><strong>Now the interesting part: let\'s configure the server on a *nix.</strong></p><br />\r\n                    <p>First install the dhcpd package - it\'s name varies according to distributions (\"net-misc/dhcp\" in gentoo, \"dhcp\" in redhat, \"dhcp3-server\" in debian, installed by default on OpenBSD, ...)</p>\r\n                    <p>Then configure it : everything happens in the /etc/dhcpd.conf file</p><br />\r\n                    <p class=\"code\">#dhcpd.conf file - lines starting with # are comments.<br />\r\n                    #enter your domain here - if you don\'t have one, you can use quite anything unreal, like \"thisis.local\"<br />\r\n                    &nbsp;&nbsp;option  domain-name \"hackits.be\";<br />\r\n                    #DNS server your clients should use by default (here google\'s)<br />\r\n                    &nbsp;&nbsp;option  domain-name-servers 8.8.8.8;<br />\r\n                    #options on the lease time<br />\r\n                    &nbsp;&nbsp;default-lease-time 86000;<br />\r\n                    &nbsp;&nbsp;max-lease-time 100000;<br />\r\n                    #authoritative should be used on your networks primary dhcp.<br />\r\n                    &nbsp;&nbsp;authoritative;<br /><br />\r\n                    #now we go to subnet declarations - thes override global settings<br />\r\n                    # dhcpd automaticaly uses the subnet on the appropriate interface: <br />\r\n                    # eth1 has 172.25.3.1, thus dhcpd will automaticaly use this subnet on this interface<br />\r\n                    &nbsp;&nbsp;&nbsp;&nbsp;	subnet 172.25.3.0 netmask 255.255.255.0 {<br />\r\n                    #the range defines a pool of random adresses, the computers defined lower should NOT be in the range!<br />\r\n                    &nbsp;&nbsp;&nbsp;&nbsp;		range 172.25.3.50 172.25.3.229;<br />\r\n                    #custom domain for this zone, the computers will then be PC1.lan.hackits.be and so on.<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name \"lan.hackits.be\";<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 172.25.3.255;<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 172.25.3.1;<br />\r\n                    #use a different name server for this zones.<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option  domain-name-servers 172.25.3.1;<br />\r\n\r\n                    #now we bind some mac addresses to IP\'s, so that those computers always receive the same address.<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host PC1 {<br />\r\n                    #to get the hardware ethernet, use \"ifconfig\" with *nix or \"ipconfig /all\" with windows (cmd).<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:11:22:33:44:55;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.2;<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n            <br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host PC2 {<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:22:33:44:55:66;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.3;<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n            <br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host Printer {<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:33:44:55:66:77;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.4;<br />\r\n                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n            <br />\r\n            #and we close the subnet<br />\r\n                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n            <br />\r\n                    #our wifi and dmz networks are similar, but with less comments<br />\r\n                    <br />\r\n                        &nbsp;&nbsp;&nbsp;&nbsp;subnet 10.192.168.0 netmask 255.255.255.0 {<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;range 10.192.168.50 10.192.168.254;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name \"wifi.hackits.be\";<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 10.192.168.255;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 10.192.168.1;<br />\r\n                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n            <br />\r\n                        &nbsp;&nbsp;&nbsp;&nbsp;subnet 10.20.30.0 netmask 255.255.255.0 {<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;range 10.20.30.100 10.20.30.254;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name \"dmz.hackits.be\";<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 10.20.30.255;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 10.20.30.1;<br />\r\n                    #Here you could also declare a tftp server.<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option tftp-server-name \"10.20.30.1\";<br />\r\n            <br />\r\n                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host web1 {<br />\r\n                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:11:55:77:99:BB;<br />\r\n                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 10.20.30.40;<br />\r\n                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />\r\n                    </p><br />\r\n\r\n                    <p>Once your configuration is done, save it as /etc/dhcpd.conf, restart dhcpd and things should be working :)</p>\r\n                    <p>Carefull with the \"{ }\" and \";\" If you miss one, dhcpd will not run!</p><br />\r\n                    <p>It\'s nice to have zones... my next tutorial will explain how to enable networking between those zones.</p><br />',2,1),(8,'Firewalling','<h2>With Linux</h2>\r\n                    <p>This course hasn\'t been written yet.</p>\r\n                    <h2>With OpenBSD</h2>\r\n                    <p>This course hasn\'t been written yet.</p>',2,1);
/*!40000 ALTER TABLE `de9f8caa_course_chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_course_exams`
--

DROP TABLE IF EXISTS `de9f8caa_course_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_course_exams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `de9f8caa_course_exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `de9f8caa_courses` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_course_exams`
--

LOCK TABLES `de9f8caa_course_exams` WRITE;
/*!40000 ALTER TABLE `de9f8caa_course_exams` DISABLE KEYS */;
INSERT INTO `de9f8caa_course_exams` VALUES (1,'Exam 1','exam content',1,0),(2,'Exam 1','exam content',2,0),(3,'Exam 1','exam content',3,0);
/*!40000 ALTER TABLE `de9f8caa_course_exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_course_exercises`
--

DROP TABLE IF EXISTS `de9f8caa_course_exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_course_exercises` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `de9f8caa_course_exercises_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `de9f8caa_courses` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_course_exercises`
--

LOCK TABLES `de9f8caa_course_exercises` WRITE;
/*!40000 ALTER TABLE `de9f8caa_course_exercises` DISABLE KEYS */;
INSERT INTO `de9f8caa_course_exercises` VALUES (1,'Exercise 1','<p>Exercises are small tests you can do yourself to see if you understood the contents of the course. Each exercise has an answer that can be revealed by clicking on the \'Reveal Answer\' button.</p>\r\n                <p>Now it would be a bit silly to have an exercise for this course, but we can at least show you how an exercise would look like. So here it goes: the exercise for this course is to reveal the answer to this exercise!</p>\r\n                <div class=\"revealbutton>Reveal Answer</div>\r\n                <div class=\"answer\" id=\"answer1\">\r\n                    <p>Well done, you revealed the answer!</p>\r\n                    <p>This is the only exercise for this course, think you are ready for the exam? <a href=\"#/course/General/Intro+to+Hackits+Courses/Exam\">Click here</a> to check it out!</p>\r\n                </div>',1,0),(2,'Exercise 1','<p>Nothingyet</p>',2,0),(3,'Exercise 1','nothing yet',3,0);
/*!40000 ALTER TABLE `de9f8caa_course_exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_courseresults`
--

DROP TABLE IF EXISTS `de9f8caa_courseresults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_courseresults` (
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `finished` int(11) DEFAULT NULL,
  `lastattempt` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_courseresults`
--

LOCK TABLES `de9f8caa_courseresults` WRITE;
/*!40000 ALTER TABLE `de9f8caa_courseresults` DISABLE KEYS */;
INSERT INTO `de9f8caa_courseresults` VALUES (1,1,1329816181,1329816181),(2,1,1330040584,1330040584),(4,1,1331047151,1331047151),(5,1,1329851222,1329851222),(6,1,1329947909,1329947909),(23,1,1329835195,1329835195),(34,1,1333903601,1333903601),(35,1,1330608569,1330608569),(43,1,1341697156,1341697156);
/*!40000 ALTER TABLE `de9f8caa_courseresults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_courses`
--

DROP TABLE IF EXISTS `de9f8caa_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `level_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `author` int(11) NOT NULL COMMENT 'id from smf_members',
  `title` char(100) NOT NULL,
  `course_intro` text NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `de9f8caa_courses_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `de9f8caa_levels` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `de9f8caa_courses_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `de9f8caa_categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_courses`
--

LOCK TABLES `de9f8caa_courses` WRITE;
/*!40000 ALTER TABLE `de9f8caa_courses` DISABLE KEYS */;
INSERT INTO `de9f8caa_courses` VALUES (1,1,1,1,2,'Intro to Hackits Courses','<h1>Welcome</h1>\r\n            <p>Thanks for checking out the Hackits Courses! These courses will help you to learn a lot about a wide variety of topics related to hacking, computer security, and a lot more. They will help you tackle the Hackits challenges and lift your general skill as a hacker to a higher level.</p>\r\n            <p>Click on the skull to continue to the first chapter of this introduction course!</p>\r\n            <p class=\"center\"><a href=\"#\"><img alt=\"skull\" src=\"images/course1skull.jpg\" /></a></p>',9),(2,1,2,2,1,'Practical Network','<h1>Welcome to Practical Networks!</h1>\r\n                    <p>This course\'s objective is to help you managing your home network with the standard unix tools.</p>\r\n                    <p>While I will skip the technical details and strip these guides to the essential, some understanding of the underlying protocols will greatly help you though.</p><br />\r\n                    <p>In this course, we will be considering working on the following example network</p>\r\n                    <img alt=\"example network 1\" src=\"images/example_network.png\" />\r\n                    <p>It is connected to the internet through a Modem. Most nowadays ADSL and cable modems have a dhcp server configured trough a limited \"clicky friendly\" web interface (I don\'t like this).  The box we will be configuring is the Router/Firewall (in the middle), it has 4 network interfaces:</p>\r\n                    <p>eth0 - 192.168.1.2 - This interface receives it\'s IP by dhcp.</p>\r\n                    <p>eth1 - 172.25.3.1 (statically declared) - Is our internal network.</p>\r\n                    <p>eth2 - 10.192.168.1 (statically declared) - Is our wifi.</p>\r\n                    <p>eth3 - 10.20.30.1 (statically declared) - Is a DMZ with a server accessible from the internet.</p><br />\r\n                    <p>The first chapter will explain you how to set a DHCP server, shaping your networks in zones.</p>\r\n                    <p>The second chapter will guide you trough the setup of the routing and filtering</p>\r\n                    <p>The third and fourth chapters will help you setup NTP and DNS on your network</p>',0),(3,5,2,1,2,'Internet Relay Chat (IRC)','<h1>Internet Relay Chat (IRC)</h1>\r\n                <p>Under construction!</p>',0);
/*!40000 ALTER TABLE `de9f8caa_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_friendship`
--

DROP TABLE IF EXISTS `de9f8caa_friendship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_friendship` (
  `inviter_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acknowledgetime` int(11) DEFAULT NULL,
  `requesttime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`inviter_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_friendship`
--

LOCK TABLES `de9f8caa_friendship` WRITE;
/*!40000 ALTER TABLE `de9f8caa_friendship` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_friendship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_levels`
--

DROP TABLE IF EXISTS `de9f8caa_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_levels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_levels`
--

LOCK TABLES `de9f8caa_levels` WRITE;
/*!40000 ALTER TABLE `de9f8caa_levels` DISABLE KEYS */;
INSERT INTO `de9f8caa_levels` VALUES (3,'Advanced'),(1,'Beginner'),(2,'Intermediate');
/*!40000 ALTER TABLE `de9f8caa_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_membership`
--

DROP TABLE IF EXISTS `de9f8caa_membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_membership` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `payment_date` int(11) DEFAULT NULL,
  `subscribed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_membership`
--

LOCK TABLES `de9f8caa_membership` WRITE;
/*!40000 ALTER TABLE `de9f8caa_membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_message`
--

DROP TABLE IF EXISTS `de9f8caa_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` int(10) unsigned NOT NULL,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `message_read` tinyint(1) NOT NULL,
  `answered` tinyint(1) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_message`
--

LOCK TABLES `de9f8caa_message` WRITE;
/*!40000 ALTER TABLE `de9f8caa_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_payment`
--

DROP TABLE IF EXISTS `de9f8caa_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_payment`
--

LOCK TABLES `de9f8caa_payment` WRITE;
/*!40000 ALTER TABLE `de9f8caa_payment` DISABLE KEYS */;
INSERT INTO `de9f8caa_payment` VALUES (1,'Prepayment',NULL),(2,'Paypal',NULL);
/*!40000 ALTER TABLE `de9f8caa_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_permission`
--

DROP TABLE IF EXISTS `de9f8caa_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_permission` (
  `principal_id` int(11) NOT NULL,
  `subordinate_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('user','role') NOT NULL,
  `action` int(11) NOT NULL,
  `template` tinyint(1) NOT NULL,
  `comment` text,
  PRIMARY KEY (`principal_id`,`subordinate_id`,`type`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_permission`
--

LOCK TABLES `de9f8caa_permission` WRITE;
/*!40000 ALTER TABLE `de9f8caa_permission` DISABLE KEYS */;
INSERT INTO `de9f8caa_permission` VALUES (1,0,'role',4,0,''),(1,0,'role',5,0,''),(1,0,'role',6,0,''),(1,0,'role',7,0,''),(2,0,'role',1,0,'Users can write messages'),(2,0,'role',2,0,'Users can receive messages'),(2,0,'role',3,0,'Users are able to view visits of his profile');
/*!40000 ALTER TABLE `de9f8caa_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_privacysetting`
--

DROP TABLE IF EXISTS `de9f8caa_privacysetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_privacysetting` (
  `user_id` int(10) unsigned NOT NULL,
  `message_new_friendship` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_message` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_profilecomment` tinyint(1) NOT NULL DEFAULT '1',
  `appear_in_search` tinyint(1) NOT NULL DEFAULT '1',
  `show_online_status` tinyint(1) NOT NULL DEFAULT '1',
  `log_profile_visits` tinyint(1) NOT NULL DEFAULT '1',
  `ignore_users` varchar(255) DEFAULT NULL,
  `public_profile_fields` bigint(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_privacysetting`
--

LOCK TABLES `de9f8caa_privacysetting` WRITE;
/*!40000 ALTER TABLE `de9f8caa_privacysetting` DISABLE KEYS */;
INSERT INTO `de9f8caa_privacysetting` VALUES (2,1,1,1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `de9f8caa_privacysetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_profile`
--

DROP TABLE IF EXISTS `de9f8caa_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `privacy` enum('protected','private','public') NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `show_friends` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_profile`
--

LOCK TABLES `de9f8caa_profile` WRITE;
/*!40000 ALTER TABLE `de9f8caa_profile` DISABLE KEYS */;
INSERT INTO `de9f8caa_profile` VALUES (1,1,'2013-01-28 13:23:12','protected','admin','admin',1,1,'webmaster@example.com',NULL,NULL,NULL),(2,2,'2013-01-28 13:23:12','protected','demo','demo',1,1,'demo@example.com',NULL,NULL,NULL);
/*!40000 ALTER TABLE `de9f8caa_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_profile_comment`
--

DROP TABLE IF EXISTS `de9f8caa_profile_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_profile_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_profile_comment`
--

LOCK TABLES `de9f8caa_profile_comment` WRITE;
/*!40000 ALTER TABLE `de9f8caa_profile_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_profile_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_profile_field`
--

DROP TABLE IF EXISTS `de9f8caa_profile_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `hint` text NOT NULL,
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `related_field_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_profile_field`
--

LOCK TABLES `de9f8caa_profile_field` WRITE;
/*!40000 ALTER TABLE `de9f8caa_profile_field` DISABLE KEYS */;
INSERT INTO `de9f8caa_profile_field` VALUES (1,'email','E-Mail','','VARCHAR',255,0,1,'','','','CEmailValidator','',0,3,''),(2,'firstname','First name','','VARCHAR',255,0,1,'','','','','',0,3,''),(3,'lastname','Last name','','VARCHAR',255,0,1,'','','','','',0,3,''),(4,'street','Street','','VARCHAR',255,0,0,'','','','','',0,3,''),(5,'city','City','','VARCHAR',255,0,0,'','','','','',0,3,''),(6,'about','About','','TEXT',255,0,0,'','','','','',0,3,'');
/*!40000 ALTER TABLE `de9f8caa_profile_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_profile_visit`
--

DROP TABLE IF EXISTS `de9f8caa_profile_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`,`visited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_profile_visit`
--

LOCK TABLES `de9f8caa_profile_visit` WRITE;
/*!40000 ALTER TABLE `de9f8caa_profile_visit` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_profile_visit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_role`
--

DROP TABLE IF EXISTS `de9f8caa_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `membership_priority` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_role`
--

LOCK TABLES `de9f8caa_role` WRITE;
/*!40000 ALTER TABLE `de9f8caa_role` DISABLE KEYS */;
INSERT INTO `de9f8caa_role` VALUES (1,'UserManager','These users can manage Users',0,0,0),(2,'Demo','Users having the demo role',0,0,0),(3,'Business','Example Business account',1,9.99,7),(4,'Premium','Example Premium account',2,19.99,28);
/*!40000 ALTER TABLE `de9f8caa_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_translation`
--

DROP TABLE IF EXISTS `de9f8caa_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_translation` (
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`message`,`language`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_translation`
--

LOCK TABLES `de9f8caa_translation` WRITE;
/*!40000 ALTER TABLE `de9f8caa_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_user`
--

DROP TABLE IF EXISTS `de9f8caa_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `lastaction` int(10) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_user`
--

LOCK TABLES `de9f8caa_user` WRITE;
/*!40000 ALTER TABLE `de9f8caa_user` DISABLE KEYS */;
INSERT INTO `de9f8caa_user` VALUES (1,'admin','b0b22856d55696733927f81a4903361bf77762a1a0a78659650e6599eba0a6dd360ec2c224c81f92805b99ca1d2c3a2c02102e8833eb32b338038dd4b697e155','9bd59dfe1a111b340243b6e9c7b53caf392340bd6f9175f4dbb65159c250373d','',1359379392,0,0,0,1,1,NULL,'Instant'),(2,'demo','f1cfc487d269ab71a26c8d54ec69ff1f1a317540c83b410261ddf3ed45440d7ba1ddc5cc2d21f86cc3ba2226de0c483eb3d82c5c8ddd975a621bee22e9cd00d6','164273fe3a6c1d25e9fec9769db0d0ec56df2b56cfb8e9dd440c5a91688018f5','',1359379392,0,0,0,0,1,NULL,'Instant');
/*!40000 ALTER TABLE `de9f8caa_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_user_group_message`
--

DROP TABLE IF EXISTS `de9f8caa_user_group_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_user_group_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_user_group_message`
--

LOCK TABLES `de9f8caa_user_group_message` WRITE;
/*!40000 ALTER TABLE `de9f8caa_user_group_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_user_group_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_user_role`
--

DROP TABLE IF EXISTS `de9f8caa_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_user_role`
--

LOCK TABLES `de9f8caa_user_role` WRITE;
/*!40000 ALTER TABLE `de9f8caa_user_role` DISABLE KEYS */;
INSERT INTO `de9f8caa_user_role` VALUES (2,3);
/*!40000 ALTER TABLE `de9f8caa_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_usergroup`
--

DROP TABLE IF EXISTS `de9f8caa_usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `participants` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_usergroup`
--

LOCK TABLES `de9f8caa_usergroup` WRITE;
/*!40000 ALTER TABLE `de9f8caa_usergroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `de9f8caa_usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `de9f8caa_users`
--

DROP TABLE IF EXISTS `de9f8caa_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `de9f8caa_users` (
  `id` varchar(36) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `challengescore` int(11) NOT NULL,
  `coursescore` int(11) NOT NULL,
  `lastvisited` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `de9f8caa_users`
--

LOCK TABLES `de9f8caa_users` WRITE;
/*!40000 ALTER TABLE `de9f8caa_users` DISABLE KEYS */;
INSERT INTO `de9f8caa_users` VALUES ('1','','','',0,1,'0000-00-00 00:00:00'),('2','','','',5,1,'0000-00-00 00:00:00'),('23','','','',0,1,'0000-00-00 00:00:00'),('34','','','',0,1,'0000-00-00 00:00:00'),('35','','','',0,1,'0000-00-00 00:00:00'),('4','','','',0,1,'0000-00-00 00:00:00'),('43','','','',0,1,'0000-00-00 00:00:00'),('5','','','',0,1,'0000-00-00 00:00:00'),('6','','','',0,1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `de9f8caa_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-28 14:27:30
