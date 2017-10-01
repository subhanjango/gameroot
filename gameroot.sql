-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gameroot
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `admin_password` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `is_subadmin` smallint(11) DEFAULT '0',
  `created_at` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `deleted_at` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'subhan.nizar@yahoo.com','53b76cc34444f5b08f9a0a333437e32d',0,'2017-09-23 12:34:11','2017-09-23 16:17:51',NULL),(7,'subhan@asd.com','53b76cc34444f5b08f9a0a333437e32d',1,'2017-09-23 12:34:11','2017-09-23 16:17:51',NULL),(8,'nadir@asd.com','53b76cc34444f5b08f9a0a333437e32d',0,'2017-09-23 12:34:41','2017-09-23 16:31:45',NULL),(9,'asdasd@adsd.com','53b76cc34444f5b08f9a0a333437e32d',1,'2017-09-23 12:56:58','2017-09-23 16:31:38',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'As',1,'2017-09-25 22:12:23','2017-09-30 14:17:20',1),(3,'Test243',1,'2017-09-25 22:16:53','2017-09-25 22:20:03',1),(4,'Adasd',1,'2017-09-30 17:12:08','2017-09-30 17:12:08',1),(5,'Dasdasd',1,'2017-09-30 17:25:08','2017-09-30 17:25:08',1),(6,'??رحبا',1,'2017-09-30 17:29:30','2017-09-30 17:29:30',1),(7,'?????',1,'2017-09-30 17:30:00','2017-09-30 17:30:00',1),(8,'Hello testing \' s',1,'2017-09-30 17:30:20','2017-09-30 17:30:20',1),(9,'Adasdasdads1234',1,'2017-09-30 17:41:07','2017-09-30 17:41:07',1),(10,'?????',1,'2017-09-30 17:45:03','2017-09-30 17:45:03',1),(11,'?????',1,'2017-09-30 17:45:59','2017-09-30 17:45:59',1),(12,'?????',1,'2017-09-30 17:52:23','2017-09-30 17:52:23',1),(13,'مرحبا',1,'2017-09-30 17:58:55','2017-09-30 17:58:55',1),(14,'مرحبا مرحبا مرحبامرحبا مرحبا مرحبا مرحبا مرحب',1,'2017-09-30 18:06:07','2017-09-30 18:06:07',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_title` varchar(45) DEFAULT NULL,
  `status` smallint(3) DEFAULT NULL,
  `created_by` tinyint(3) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Asdasdasd123',1,1,'2017-09-28 21:02:52','2017-09-30 00:59:55'),(2,'Asdasasd',1,1,'2017-09-30 13:18:56','2017-09-30 13:18:56');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `group_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (2,1),(2,4),(1,1),(1,3),(1,4),(1,5);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(45) DEFAULT NULL,
  `question_description` longtext,
  `subcategory_id` int(11) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `solutions` longtext,
  `success` longtext,
  `unsuccess` longtext,
  `created_by` int(11) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Asdasd','&lt;p&gt;asdasdasd&lt;/p&gt;',1,1,'&lt;p&gt;adadasdasd&lt;/p&gt;','&lt;p&gt;asdasdasdasd&lt;/p&gt;','&lt;p&gt;adasdasdasd&lt;/p&gt;',1,'2017-09-28 18:56:12','2017-09-30 21:02:52'),(2,'Asdasda','&lt;p&gt;dasdasdasd&lt;/p&gt;',0,1,NULL,NULL,NULL,1,'2017-09-29 21:12:14','2017-09-29 21:12:14'),(3,'Asdasd','&lt;p&gt;dasdadasdas&lt;/p&gt;',1,1,'&lt;p&gt;asdadasddadas&lt;/p&gt;',NULL,NULL,1,'2017-09-29 21:18:04','2017-09-29 21:18:04');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solutions`
--

DROP TABLE IF EXISTS `solutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `yes` longtext,
  `no` longtext,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solutions`
--

LOCK TABLES `solutions` WRITE;
/*!40000 ALTER TABLE `solutions` DISABLE KEYS */;
INSERT INTO `solutions` VALUES (4,2,'&lt;p&gt;dasdasd&lt;/p&gt;','&lt;p&gt;dasdasdasd&lt;/p&gt;',NULL,NULL),(5,2,'&lt;p&gt;asdas&lt;/p&gt;','&lt;p&gt;assadasd&lt;/p&gt;',NULL,NULL),(6,2,'&lt;p&gt;asdasasd&lt;/p&gt;','&lt;p&gt;dasdadasd&lt;/p&gt;',NULL,NULL),(7,2,'&lt;p&gt;asdasdas&lt;/p&gt;','&lt;p&gt;dasdasdasd&lt;/p&gt;',NULL,NULL),(8,2,'&lt;p&gt;asdasdasd&lt;/p&gt;','&lt;p&gt;dasdadasdas&lt;/p&gt;',NULL,NULL),(20,3,'&lt;p&gt;dasdasd&lt;/p&gt;','&lt;p&gt;dasdasdasd&lt;/p&gt;',NULL,NULL),(21,3,'&lt;p&gt;asdasdas&lt;/p&gt;','&lt;p&gt;asdasdasd&lt;/p&gt;',NULL,NULL),(22,3,'&lt;p&gt;asdadasd&lt;/p&gt;','&lt;p&gt;dsadasdasdasd&lt;/p&gt;',NULL,NULL),(23,3,'&lt;p&gt;new&lt;/p&gt;','&lt;p&gt;new&lt;/p&gt;',NULL,NULL),(31,1,'&lt;p&gt;dasdasd&lt;/p&gt;','&lt;p&gt;dasdasdas&lt;/p&gt;',NULL,NULL),(32,1,'&lt;p&gt;asdasdassd&lt;/p&gt;','&lt;p&gt;dsadasd&lt;/p&gt;',NULL,NULL),(33,1,'&lt;p&gt;asdasdas&lt;/p&gt;','&lt;p&gt;asdasdasdsdasdasdasd&lt;/p&gt;',NULL,NULL),(34,1,'&lt;p&gt;hhshshshshshsh&amp;nbsp;&lt;img src=&quot;https://assets.logitech.com/assets/64877/8/z200-stereo-speakers.png&quot; width=&quot;463&quot; height=&quot;398&quot; /&gt;&lt;/p&gt;','',NULL,NULL);
/*!40000 ALTER TABLE `solutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (1,'Saasdasdasd',1,3,1,'2017-09-26 20:04:57','2017-09-26 20:04:57'),(3,'Asdasdasdasdd',1,3,1,'2017-09-26 20:45:18','2017-09-26 20:45:18'),(4,'Dsaassa',1,3,1,'2017-09-26 22:01:37','2017-09-26 22:01:37'),(5,'Asdasdd',1,2,1,'2017-09-30 14:17:27','2017-09-30 14:17:27');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_groups` (
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_groups`
--

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` VALUES (1,4),(1,5),(1,7),(2,4),(2,5);
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` mediumtext,
  `password` mediumtext,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_by` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'subhan.nizar@yahoo.com','53b76cc34444f5b08f9a0a333437e32d',1,'2017-09-28 20:25:24','2017-09-28 20:25:24',1),(5,'rehmanisaghani95@gmail.com','53b76cc34444f5b08f9a0a333437e32d',1,'2017-09-28 20:25:31','2017-09-28 20:25:31',1),(7,'asdadasd@adsda.com','53b76cc34444f5b08f9a0a333437e32d',1,'2017-09-28 22:43:02','2017-09-28 22:43:02',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-01  4:01:54
