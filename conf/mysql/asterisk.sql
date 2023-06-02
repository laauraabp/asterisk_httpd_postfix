-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: asterisk
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cdr`
--

DROP TABLE IF EXISTS `cdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cdr` (
  `accountcode` varchar(80) DEFAULT NULL,
  `src` varchar(80) DEFAULT NULL,
  `dst` varchar(80) DEFAULT NULL,
  `dcontext` varchar(80) DEFAULT NULL,
  `clid` varchar(80) DEFAULT NULL,
  `channel` varchar(80) DEFAULT NULL,
  `dstchannel` varchar(80) DEFAULT NULL,
  `lastapp` varchar(80) DEFAULT NULL,
  `lastdata` varchar(80) DEFAULT NULL,
  `answer` datetime DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `billsec` int DEFAULT NULL,
  `disposition` varchar(80) DEFAULT NULL,
  `amaflags` varchar(80) DEFAULT NULL,
  `uniqueid` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`start`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cdr`
--

LOCK TABLES `cdr` WRITE;
/*!40000 ALTER TABLE `cdr` DISABLE KEYS */;
INSERT INTO `cdr` VALUES ('','1001','s','sistemas','\"1001\" <1001>','SIP/1001-00000000','SIP/1001-00000001','Dial','SIP/1001,10','2023-05-21 14:37:46','2023-05-21 14:37:46','2023-05-21 14:38:11',25,25,'BUSY','DOCUMENTATION','1684679866.0'),('','1001','s','sistemas','\"1001\" <1001>','SIP/1001-00000000','','VoiceMail','2001@voicemail','2023-05-21 14:38:11','2023-05-21 14:38:11','2023-05-21 14:38:13',2,2,'ANSWERED','DOCUMENTATION','1684679866.0'),('','1001','123','menu','\"1001\" <1001>','SIP/1001-00000002','','BackGround','\"/var/lib/asterisk/sounds/en/bienvenida\"','2023-05-21 20:59:18','2023-05-21 20:59:18','2023-05-21 20:59:34',16,16,'ANSWERED','DOCUMENTATION','1684702758.4'),('','1001','s','sistemas','\"1001\" <1001>','SIP/1001-00000003','SIP/1001-00000004','Dial','SIP/1001,10','2023-05-21 20:59:38','2023-05-21 20:59:38','2023-05-21 20:59:54',16,16,'BUSY','DOCUMENTATION','1684702778.6'),('','1001','s','sistemas','\"1001\" <1001>','SIP/1001-00000003','','VoiceMail','2001@voicemail','2023-05-21 20:59:54','2023-05-21 20:59:54','2023-05-21 20:59:56',1,1,'ANSWERED','DOCUMENTATION','1684702778.6'),('','1001','s','usuarios','\"laura\" <1001>','SIP/1001-00000000','','WaitExten','5','2023-05-26 07:04:34','2023-05-26 07:04:34','2023-05-26 07:04:49',15,15,'ANSWERED','DOCUMENTATION','1685084674.0'),('','1001','s','desarrollo','\"laura\" <1001>','SIP/1001-00000001','','Dial','SIP/1004,10','2023-05-26 07:05:05','2023-05-26 07:05:05','2023-05-26 07:05:29',23,23,'ANSWERED','DOCUMENTATION','1685084705.2');
/*!40000 ALTER TABLE `cdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `fecha` varchar(80) DEFAULT NULL,
  `nivel` varchar(80) DEFAULT NULL,
  `mensaje` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES ('[May 21 10:36:33]','Asterisk','18.17.1 built by root @ localhost.localdomain on a x86_64 running Linux on 2023-05-21 14:24:25 UTC '),('[May 21 10:36:33]','NOTICE[47854]','loader.c: 343 modules will be loaded. '),('[May 21 10:36:33]','NOTICE[47854]','res_config_ldap.c: No directory user found'),('[May 21 10:36:33]','ERROR[47854]','res_config_ldap.c: No directory URL or host found. '),('[May 21 10:36:33]','ERROR[47854]','res_config_ldap.c: Cannot load LDAP RealTime driver. '),('[May 21 10:36:33]','ERROR[47854]','res_config_pgsql.c: PostgreSQL RealTime: Failed to connect database asterisk on 127.0.0.1: '),('[May 21 10:36:33]','WARNING[47854]','res_config_pgsql.c: PostgreSQL RealTime: Couldn\'t establish connection. Check debug. '),('[May 21 10:36:33]','NOTICE[47854]','cdr.c: CDR simple logging enabled. '),('[May 21 10:36:33]','WARNING[47854]','config.c: parse error: No category context for line 310 of /etc/asterisk/geolocation.conf '),('[May 21 10:36:33]','ERROR[47854]','res_sorcery_config.c: Contents of config file \'geolocation.conf\' are invalid and cannot be parsed '),('[May 21 10:36:33]','WARNING[47854]','config.c: parse error: No category context for line 310 of /etc/asterisk/geolocation.conf '),('[May 21 10:36:33]','ERROR[47854]','res_sorcery_config.c: Contents of config file \'geolocation.conf\' are invalid and cannot be parsed '),('[May 21 10:36:33]','WARNING[47854]','res_phoneprov.c: Unable to find a valid server address or name. '),('[May 21 10:36:33]','NOTICE[47854]','res_smdi.c: No SMDI interfaces are available to listen on'),('[May 21 10:36:33]','NOTICE[47854]','chan_dahdi.c: Ignoring any changes to \'userbase\' (on reload) at line 23. '),('[May 21 10:36:33]','NOTICE[47854]','chan_dahdi.c: Ignoring any changes to \'vmsecret\' (on reload) at line 31. '),('[May 21 10:36:33]','NOTICE[47854]','chan_dahdi.c: Ignoring any changes to \'hassip\' (on reload) at line 35. '),('[May 21 10:36:33]','NOTICE[47854]','chan_dahdi.c: Ignoring any changes to \'hasiax\' (on reload) at line 39. '),('[May 21 10:36:33]','NOTICE[47854]','chan_dahdi.c: Ignoring any changes to \'hasmanager\' (on reload) at line 47. '),('[May 21 10:36:33]','NOTICE[47854]','chan_skinny.c: Configuring skinny from skinny.conf '),('[May 21 10:36:33]','ERROR[47854]','ari/config.c: No configured users for ARI '),('[May 21 10:36:33]','NOTICE[47854]','confbridge/conf_config_parser.c: Adding default_menu menu to app_confbridge '),('[May 21 10:36:33]','NOTICE[47854]','cdr_pgsql.c: cdr_pgsql configuration contains no global section'),('[May 21 10:36:33]','NOTICE[47854]','cel_custom.c: No mappings found in cel_custom.conf. Not logging CEL to custom CSVs. '),('[May 21 10:36:33]','WARNING[47854]','cel_pgsql.c: CEL pgsql config file missing global section. '),('[May 21 10:36:33]','ERROR[47854]','codec_dahdi.c: Failed to open /dev/dahdi/transcode: No such file or directory '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Some non-required modules failed to load. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'res_monitor\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 21. Its replacement is \'app_mixmonitor\'. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'chan_mgcp\' has been loaded but will be deprecated in Asterisk version 19 and will be removed in Asterisk version 21. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'chan_skinny\' has been loaded but will be deprecated in Asterisk version 19 and will be removed in Asterisk version 21. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'chan_sip\' has been loaded but was deprecated in Asterisk version 17 and will be removed in Asterisk version 21. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'res_adsi\' has been loaded but may be removed in a future release. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'chan_oss\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_nbscat\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_dahdiras\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_url\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_adsiprog\' has been loaded but may be removed in a future release. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_getcpeid\' has been loaded but may be removed in a future release. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_ices\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','WARNING[47854]','loader.c: Module \'app_image\' has been loaded but was deprecated in Asterisk version 16 and will be removed in Asterisk version 19. '),('[May 21 10:36:33]','ERROR[47854]','loader.c: res_timing_dahdi declined to load. '),('[May 21 10:36:33]','ERROR[47854]','loader.c: res_pjsip_transport_websocket declined to load. '),('[May 21 10:36:33]','ERROR[47854]','loader.c: cdr_sqlite3_custom declined to load. '),('[May 21 10:36:33]','ERROR[47854]','loader.c: cdr_pgsql declined to load. '),('[May 21 10:36:33]','ERROR[47854]','loader.c: cel_sqlite3_custom declined to load. '),('[May 21 10:36:33]','WARNING[48058]','loader.c: Module \'chan_sip.so\' already loaded and running. '),('[May 21 10:36:33]','WARNING[47932]','chan_sip.c: chan_sip has no official maintainer and is deprecated. Migration to '),('[May 21 10:36:33]','WARNING[47932]','chan_sip.c: chan_pjsip is recommended. See guides at the Asterisk Wiki: '),('[May 21 10:36:33]','WARNING[47932]','chan_sip.c: https://wiki.asterisk.org/wiki/display/AST/Migrating+from+chan_sip+to+res_pjsip '),('[May 21 10:36:33]','WARNING[47932]','chan_sip.c: https://wiki.asterisk.org/wiki/display/AST/Configuring+res_pjsip ');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sip`
--

DROP TABLE IF EXISTS `sip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sip` (
  `nombre` varchar(80) DEFAULT NULL,
  `exten` varchar(80) DEFAULT NULL,
  `secret` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sip`
--

LOCK TABLES `sip` WRITE;
/*!40000 ALTER TABLE `sip` DISABLE KEYS */;
INSERT INTO `sip` VALUES ('Laura','2001','123456'),('Pedro','2002','123456'),('Sistemas','1001','123456'),('Redes','1002','123456'),('Base de datos','1003','123456'),('Desarrollo','1004','123456'),('Casper','2003','laura');
/*!40000 ALTER TABLE `sip` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-26  7:05:41
