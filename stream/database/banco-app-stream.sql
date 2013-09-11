CREATE DATABASE  IF NOT EXISTS `apps.geeklifeclub` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `apps.geeklifeclub`;
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: apps.geeklifeclub
-- ------------------------------------------------------
-- Server version 5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `lol_champions`
--

DROP TABLE IF EXISTS `lol_champions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lol_champions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `excerpt` text,
  `description` text,
  `skills` text,
  `abilities` text,
  `skins` text,
  `mixData` text,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `lol_champions_updateTime` (`updateTime`),
  KEY `lol_champions_createTime` (`createTime`),
  KEY `lol_champions_code` (`code`),
  KEY `lol_champions_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lol_champions`
--

LOCK TABLES `lol_champions` WRITE;
/*!40000 ALTER TABLE `lol_champions` DISABLE KEYS */;
INSERT INTO `lol_champions` VALUES (1,'Annie',1,'a Criança Sombria',' Logo antes da liga surgir, existiam aqueles na sinistra cidade-estado de Noxus que não concordavam com o mal causado pelo Alto Comando Noxiano. O Alto Comando havia acabado com uma tentativa de golpe feito pelo auto proclamado Príncipe da Coroa Raschallion, e uma repressão contra o novo governo estava prestes a acontecer. Estes excluídos social e politicamente, conhecidos como a Ordem Cinza, procuravam deixar todos em paz enquanto procuravam por mais conhecimento sombrio arcano. Os líderes dessa sociedade de excluídos eram um casal: Gregori Hastur, o Feiticeiro Cinzento, e sua esposa Amoline, a Bruxa da Sombra. Juntos eles lideraram o êxodo de magos e outros seres sábios de Noxus, levando seus seguidores para viveram além da Grande Barreira no norte das terríveis Terras Vodu. Apesar da sobrevivência ser difícil, a colônia da Ordem Cinza conseguiu se assentar em uma terra onde muitos outros falharam.\r\n\r\nAnos após o êxodo, Gregori e Amoline tiveram uma filha: Annie. Desde o princípio, eles souberam que havia algo de especial nela. Com dois anos de idade, Annie enfeitiçou um urso das sombras - um feroz habitante das florestas petrificadas fora da colônia - transformando-o em seu mascote. Até hoje o urso \'\'Tibbers\'\' a acompanha, e ela o mantém sob um feitiço para que possa carregá-lo como um brinquedo. A combinação da linhagem de Annie com a magia negra do seu local de nascimento concederam a esta criança grande poder arcano. A garota é também um dos campeões mais procurados de League of Legends - até mesmo na cidade-estado que teria exilado seus pais se eles não tivessem fugido antes.\r\n\r\n\'\'Talvez Annie seja um dos mais poderosos campeões a já terem lutado no Campo de Justiça. Fico com medo só de pensar em suas habilidades quando for adulta.\'\'\r\n-- Alto Conselheiro Kiersta Mandrake','','','','','2013-09-10 22:52:46','0000-00-00 00:00:00'),(2,'Olaf',2,'o Berserker','A maioria dos homens diria que a morte é algo a ser temido; nenhum desses homens seria Olaf. O Berserker vive somente pelo bramido de um grito de guerra e da colisão das espadas. Impelido por sua fome de glória e pela maldição iminente de uma morte esquecível, Olaf se mete em qualquer briga com abandono negligente. Rendendo-se à sede de sangue que existe em si, ele somente está vivo de verdade quando agarra a morte pelas presas.\r\n\r\nA península costal de Lokfar está entre os lugares mais brutais de Freljord. Lá, a ira é o único fogo que aquece ossos gelados, sangue é o único líquido que flui desimpedido e não há destino pior do que o de envelhecer frágil e esquecido. Olaf era um guerreiro de Lokfar que acumulava glórias e não hesitava em compartilhá-las. Enquanto gabava-se certa noite com os homens de seu clã, com um vilarejo em brasas recentemente atacado ao fundo, um dos guerreiros anciões se cansou de sua fanfarrice. O velho lutador instigou Olaf a ler o próprio destino e ver se sua sorte ia de encontro a sua displicência. Provocado pelo desafio, Olaf zombou da inveja do velho guerreiro e jogou os ossos do punho de uma criatura morta há muito tempo para predizer as grandes glórias que alcançará em sua morte. Toda a alegria se esvaiu da congregação quando os homens leram o presságio: os ossos falavam de uma longa vida e falecimento calmo.\r\n\r\nEnfurecido, Olaf disparou pela noite, determinado a provar que a previsão era falsa ao encontrar e derrotar a serpente de gelo mais temida de Lokfar. O monstro havia consumido milhares, tanto homens quanto naus, em sua longa vida. Morrer em combate com ela seria um fim adequado para qualquer guerreiro. Conforme Olaf se emaranhava dentro da escuridão de sua mandíbula, aprofundou-se na escuridão da própria mente. Quando o choque de água gelada o despertou da escuridão, havia somente uma carcaça da besta, massacrada e flutuando ao seu lado. Frustrado, mas não derrotado, Olaf seguiu na caçada de cada criatura lendária com garras e presas, esperando que a próxima batalha seria sua última. Em todas as vezes ele avançou em direção à sua ansiada morte, somente para ser poupado pelo frenesi que o dominava quando chegava ao seu limite.\r\n\r\nOlaf concluiu que nenhuma criatura simples poderia lhe dar a morte de um guerreiro. Sua solução foi enfrentar a tribo mais temida de Freljord: a Garra do Inverno. Sejuani se impressionou com o fato de Olaf desafiar sua tribo, mas sua audácia não lhe renderia qualquer piedade. Ela ordenou o ataque e enviou um grande número de seus guerreiros para devastá-lo. Todos caíram, um por um, até ele ser tomado pela sede de sangue novamente, abrindo caminho sem esforço algum até a líder da Garra do Inverno. O choque entre Olaf e Sejuani fez tremer as geleiras com força e, embora ele tenha parecido ser indomável, ela combateu o berserker até sua paralisação. Travados em luta, o olhar de Sejuani penetrou a aura de cólera de Olaf de maneira que nenhuma arma poderia fazer. Seu frenesi se acalmou o suficiente para ela lhe fazer uma oferta: Sejuani jurou que ela encontraria para Olaf sua morte gloriosa se ele empunhasse seu machado na campanha de sua conquista. Foi nesse momento que Olaf jurou entalhar seu legado na própria Freljord.\r\n\r\n\'\'Quando for conhecer seus ancestrais, diga a eles que foi Olaf quem te mandou.\'\'\r\n-- Olaf ','','','','','2013-09-10 22:54:19','0000-00-00 00:00:00'),(3,'Brand',63,'a Vingança Flamejante','','','','','','2013-09-10 22:56:43','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `lol_champions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lol_championsBadAgainst`
--

DROP TABLE IF EXISTS `lol_championsBadAgainst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lol_championsBadAgainst` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_champions` bigint(20) NOT NULL,
  `id_champions_badagainst` bigint(20) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `excerpt` text,
  `description` text,
  `mixData` text,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `lol_championsBadAgainst_updateTime` (`updateTime`),
  KEY `lol_championsBadAgainst_createTime` (`createTime`),
  KEY `lol_championsBadAgainst_id_champions` (`id_champions`),
  KEY `lol_championsBadAgainst_id_champions_badagainst` (`id_champions_badagainst`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lol_championsBadAgainst`
--

LOCK TABLES `lol_championsBadAgainst` WRITE;
/*!40000 ALTER TABLE `lol_championsBadAgainst` DISABLE KEYS */;
INSERT INTO `lol_championsBadAgainst` VALUES (1,1,3,100,'','','','2013-09-10 22:58:36','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `lol_championsBadAgainst` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-10 21:16:15
