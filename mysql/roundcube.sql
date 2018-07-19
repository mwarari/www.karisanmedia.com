-- MySQL dump 10.13  Distrib 5.5.59, for Linux (x86_64)
--
-- Host: localhost    Database: roundcube
-- ------------------------------------------------------
-- Server version	5.5.59-cll-lve

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
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail_host` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `preferences` longtext,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`mail_host`)
) ENGINE=InnoDB AUTO_INCREMENT=922 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--
-- WHERE:  user_id IN (871,312,313,872,874,310,314,311,870,873,875)

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `mail_host`, `created`, `last_login`, `language`, `preferences`) VALUES (310,'ron@karisanmedia.com','localhost','2010-12-07 00:01:42','2010-12-07 00:01:42','en_US',''),(311,'sueerik','localhost','2010-12-13 20:21:20','2017-09-23 13:13:41','en_US','a:2:{s:11:\"client_hash\";s:32:\"538b51ce1021ff5dc90a009f2ebb03c3\";s:15:\"namespace_fixed\";b:1;}'),(312,'marketing@karisanmedia.com','localhost','2011-04-15 20:58:18','2011-04-15 20:58:18','en_US',''),(313,'mwarari@karisanmedia.com','localhost','2011-08-11 00:37:22','2018-06-10 12:00:55','en_US','a:3:{s:9:\"junk_mbox\";s:10:\"INBOX.Junk\";s:11:\"client_hash\";s:32:\"a6b75bcb05560d2ed2dcd427b04070eb\";s:15:\"namespace_fixed\";b:1;}'),(314,'sales@karisanmedia.com','localhost','2012-08-16 23:04:43','2012-08-17 19:53:27','en_US','a:3:{s:20:\"default_imap_folders\";a:5:{i:0;s:5:\"INBOX\";i:1;s:12:\"INBOX.Drafts\";i:2;s:10:\"INBOX.Sent\";i:3;s:10:\"INBOX.Junk\";i:4;s:11:\"INBOX.Trash\";}s:8:\"timezone\";s:4:\"auto\";s:15:\"namespace_fixed\";b:1;}'),(870,'sueerik@karisanmedia.com','localhost','2017-09-23 13:07:57','2018-06-17 21:43:45','en_US','a:6:{s:16:\"message_sort_col\";s:4:\"date\";s:18:\"message_sort_order\";s:4:\"DESC\";s:9:\"junk_mbox\";s:10:\"INBOX.spam\";s:11:\"search_mods\";a:4:{s:1:\"*\";a:2:{s:7:\"subject\";i:1;s:4:\"from\";i:1;}s:10:\"INBOX.Sent\";a:2:{s:7:\"subject\";i:1;s:2:\"to\";i:1;}s:12:\"INBOX.Drafts\";a:2:{s:7:\"subject\";i:1;s:2:\"to\";i:1;}s:5:\"INBOX\";a:2:{s:7:\"subject\";i:1;s:4:\"from\";i:1;}}s:11:\"client_hash\";s:32:\"2df78d74d759976c5eae6c04e4f11ac5\";s:15:\"namespace_fixed\";b:1;}'),(871,'editor@karisanmedia.com','localhost','2017-09-23 13:08:38','2017-09-23 13:08:38','en_US','a:2:{s:11:\"client_hash\";s:32:\"7243845a1084c552fc41d6e1c25a1db5\";s:15:\"namespace_fixed\";b:1;}'),(872,'pasha@karisanmedia.com','localhost','2017-09-23 13:09:02','2017-10-14 10:41:50','en_US','a:2:{s:11:\"client_hash\";s:32:\"13ddc9fe5de05858a63fc8c0d9f81ed1\";s:15:\"namespace_fixed\";b:1;}'),(873,'susan@karisanmedia.com','localhost','2017-09-23 13:10:24','2017-10-14 10:34:25','en_US','a:3:{s:11:\"search_mods\";a:4:{s:1:\"*\";a:2:{s:7:\"subject\";i:1;s:4:\"from\";i:1;}s:10:\"INBOX.Sent\";a:2:{s:7:\"subject\";i:1;s:2:\"to\";i:1;}s:12:\"INBOX.Drafts\";a:2:{s:7:\"subject\";i:1;s:2:\"to\";i:1;}s:5:\"INBOX\";a:2:{s:7:\"subject\";i:1;s:4:\"from\";i:1;}}s:11:\"client_hash\";s:32:\"972ff5beaf402abb7c858afc3331ab60\";s:15:\"namespace_fixed\";b:1;}'),(874,'permission@karisanmedia.com','localhost','2017-09-27 20:17:54','2017-11-12 15:56:27','en_US','a:2:{s:11:\"client_hash\";s:32:\"6f1b392d37ab96d1ae0b3bf20e4b5501\";s:15:\"namespace_fixed\";b:1;}'),(875,'talentsearch@karisanmedia.com','localhost','2017-09-27 20:21:42','2017-09-27 20:21:42','en_US','a:2:{s:11:\"client_hash\";s:32:\"d6a768e2a5612fef3a5afec6a41f8390\";s:15:\"namespace_fixed\";b:1;}');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identities` (
  `identity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `changed` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `standard` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `organization` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL,
  `reply-to` varchar(128) NOT NULL DEFAULT '',
  `bcc` varchar(128) NOT NULL DEFAULT '',
  `signature` longtext,
  `html_signature` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`identity_id`),
  KEY `user_identities_index` (`user_id`,`del`),
  KEY `email_identities_index` (`email`,`del`),
  CONSTRAINT `user_id_fk_identities` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=934 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identities`
--
-- WHERE:  user_id IN (871,312,313,872,874,310,314,311,870,873,875)

LOCK TABLES `identities` WRITE;
/*!40000 ALTER TABLE `identities` DISABLE KEYS */;
INSERT INTO `identities` (`identity_id`, `user_id`, `changed`, `del`, `standard`, `name`, `organization`, `email`, `reply-to`, `bcc`, `signature`, `html_signature`) VALUES (318,310,'2010-12-07 00:01:42',0,1,'','','ron@karisanmedia.com','','','',0),(319,311,'2010-12-13 20:21:20',0,1,'sueerik','','sueerik@karisanmedia.com','','','',0),(320,312,'2011-04-15 20:58:18',0,1,'','','marketing@karisanmedia.com','','','',0),(321,313,'2011-08-11 00:37:22',0,1,'','','mwarari@karisanmedia.com','','','',0),(322,314,'2012-08-16 23:04:43',0,1,'','','sales@karisanmedia.com','','','',0),(882,870,'2017-09-23 13:07:57',0,1,'','','sueerik@karisanmedia.com','','',NULL,0),(883,871,'2017-09-23 13:08:38',0,1,'','','editor@karisanmedia.com','','',NULL,0),(884,872,'2017-09-23 13:09:02',0,1,'','','pasha@karisanmedia.com','','',NULL,0),(885,873,'2017-09-23 13:10:24',0,1,'','','susan@karisanmedia.com','','',NULL,0),(886,874,'2017-09-27 20:17:54',0,1,'','','permission@karisanmedia.com','','',NULL,0),(887,875,'2017-09-27 20:21:42',0,1,'','','talentsearch@karisanmedia.com','','',NULL,0);
/*!40000 ALTER TABLE `identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `changed` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `firstname` varchar(128) NOT NULL DEFAULT '',
  `surname` varchar(128) NOT NULL DEFAULT '',
  `vcard` longtext,
  `words` text,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `user_contacts_index` (`user_id`,`del`),
  CONSTRAINT `user_id_fk_contacts` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8643 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--
-- WHERE:  user_id IN (871,312,313,872,874,310,314,311,870,873,875)

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactgroups`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactgroups` (
  `contactgroup_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `changed` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`contactgroup_id`),
  KEY `contactgroups_user_index` (`user_id`,`del`),
  CONSTRAINT `user_id_fk_contactgroups` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactgroups`
--
-- WHERE:  user_id IN (871,312,313,872,874,310,314,311,870,873,875)

LOCK TABLES `contactgroups` WRITE;
/*!40000 ALTER TABLE `contactgroups` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'roundcube'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-24 11:37:16
-- MySQL dump 10.13  Distrib 5.5.59, for Linux (x86_64)
--
-- Host: localhost    Database: roundcube
-- ------------------------------------------------------
-- Server version	5.5.59-cll-lve

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
-- Table structure for table `contactgroupmembers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactgroupmembers` (
  `contactgroup_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  PRIMARY KEY (`contactgroup_id`,`contact_id`),
  KEY `contactgroupmembers_contact_index` (`contact_id`),
  CONSTRAINT `contactgroup_id_fk_contactgroups` FOREIGN KEY (`contactgroup_id`) REFERENCES `contactgroups` (`contactgroup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contact_id_fk_contacts` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactgroupmembers`
--
-- WHERE:  0

LOCK TABLES `contactgroupmembers` WRITE;
/*!40000 ALTER TABLE `contactgroupmembers` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactgroupmembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'roundcube'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-24 11:37:16
