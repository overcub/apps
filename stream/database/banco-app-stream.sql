CREATE DATABASE  IF NOT EXISTS `apps.geeklifeclub` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `apps.geeklifeclub`;
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: apps.geeklifeclub
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `st_streamers`
--

DROP TABLE IF EXISTS `st_streamers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_streamers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_stream` bigint(20) DEFAULT NULL,
  `id_players` bigint(20) DEFAULT NULL,
  `mainStream` char(1) DEFAULT NULL,
  `nickname` varchar(200) DEFAULT NULL,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `st_streamers_id_stream` (`id_stream`),
  KEY `st_streamers_id_players` (`id_players`),
  KEY `st_streamers_updateTime` (`updateTime`),
  KEY `st_streamers_createTime` (`createTime`),
  KEY `fk_st_streamers_id_players` (`id_players`),
  KEY `fk_st_streamers_id_stream` (`id_stream`),
  CONSTRAINT `fk_st_streamers_id_players` FOREIGN KEY (`id_players`) REFERENCES `st_players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_st_streamers_id_stream` FOREIGN KEY (`id_stream`) REFERENCES `st_stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_streamers`
--

LOCK TABLES `st_streamers` WRITE;
/*!40000 ALTER TABLE `st_streamers` DISABLE KEYS */;
INSERT INTO `st_streamers` VALUES (1,1,1,'1','rtancman_lol','2013-09-09 23:48:23','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `st_streamers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_stream`
--

DROP TABLE IF EXISTS `st_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_stream` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `st_stream_updateTime` (`updateTime`),
  KEY `st_stream_createTime` (`createTime`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_stream`
--

LOCK TABLES `st_stream` WRITE;
/*!40000 ALTER TABLE `st_stream` DISABLE KEYS */;
INSERT INTO `st_stream` VALUES (1,'League of Legends','2013-09-09 23:46:16','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `st_stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_players`
--

DROP TABLE IF EXISTS `st_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_players` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `st_players_id_user_UNIQUE` (`id_user`),
  KEY `st_players_updateTime` (`updateTime`),
  KEY `st_players_createTime` (`createTime`),
  KEY `st_players_id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_players`
--

LOCK TABLES `st_players` WRITE;
/*!40000 ALTER TABLE `st_players` DISABLE KEYS */;
INSERT INTO `st_players` VALUES (1,1,'Raffael Tancman','1','1985-10-01 03:00:00','2013-09-09 23:47:28','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `st_players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-09 23:02:42
