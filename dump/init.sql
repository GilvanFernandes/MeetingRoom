-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: meetingroom
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sala` varchar(45) NOT NULL,
  `detalhes` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,'Sala X','Sala Frontal',1,'2016-12-18 07:54:17','0000-00-00 00:00:00'),(2,'Sala Z','Sala Lateral',1,'2016-12-18 07:54:41','0000-00-00 00:00:00'),(3,'Sala Presidencial','Sala de Vidro',1,'2016-12-18 11:17:48','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas_reservas`
--

DROP TABLE IF EXISTS `salas_reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas_reservas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `data_historico` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salas_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_salas_reservas_salas_idx` (`salas_id`),
  KEY `fk_salas_reservas_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_salas_reservas_salas` FOREIGN KEY (`salas_id`) REFERENCES `salas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salas_reservas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas_reservas`
--

LOCK TABLES `salas_reservas` WRITE;
/*!40000 ALTER TABLE `salas_reservas` DISABLE KEYS */;
INSERT INTO `salas_reservas` VALUES (1,'teste',2,'2016-12-18','19:00:00','2016-12-18 09:26:58',1,1),(2,'teste',1,'2016-12-18','19:00:00','2016-12-18 09:31:11',1,1),(3,'teste',1,'2016-12-18','19:00:00','2016-12-18 09:31:51',1,1),(4,'teste',1,'2016-12-18','19:00:00','2016-12-18 09:32:35',1,1),(5,'Sei lá',1,'2016-12-18','20:00:00','2016-12-18 21:25:12',2,1),(6,'okkk',1,'2016-12-18','07:00:00','2016-12-18 21:25:44',2,1),(7,'aaaaaa',2,'2016-12-18','21:00:00','2016-12-18 21:26:04',1,1),(8,'aaaaaaaaaaaaaaasdasdasd',1,'2016-12-18','21:00:00','2016-12-18 21:26:34',2,1),(9,'amanha',1,'2016-12-19','09:00:00','2016-12-18 21:27:23',2,1),(10,'OKOK',1,'2016-12-18','09:00:00','2016-12-18 22:08:34',3,4),(11,'asdasdas',1,'2016-12-20','21:00:00','2016-12-18 23:53:05',1,1);
/*!40000 ALTER TABLE `salas_reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `adm` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Gilvan','gil-f-o@hotmail.com','a1a8d617f884f106ccdcc6470c29cbdc4d9f7990',1,1,'2016-12-18 06:40:57',NULL),(2,'João','joao@joao.com','6b06a3d6e255fe6d6bde8127e8e11dd2508570bf',1,2,'2016-12-18 12:04:32','0000-00-00 00:00:00'),(3,'Danieli','danieli@ditech.com.br','6614a64d004a980344d5b2149f9450201a2bb4d9',1,1,'2016-12-18 12:07:19',NULL),(4,'Pedro','pedro@pedro.com','4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8',1,2,'2016-12-18 12:11:52','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_sessoes`
--

DROP TABLE IF EXISTS `usuarios_sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_sessoes` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_sessoes`
--

LOCK TABLES `usuarios_sessoes` WRITE;
/*!40000 ALTER TABLE `usuarios_sessoes` DISABLE KEYS */;
INSERT INTO `usuarios_sessoes` VALUES ('r7tvaqn6ihod7qiiui5qmi0q9dlfgel4','127.0.0.1',1482044337,'__ci_last_regenerate|i:1482044334;'),('5mol9bbg7jvdjvmns1atdv1i40mvh9pd','127.0.0.1',1482045333,'__ci_last_regenerate|i:1482045333;'),('0tqgdrp1t6ou5ovs20e0b0cd9aog8o6i','127.0.0.1',1482045602,'__ci_last_regenerate|i:1482045602;'),('915u5rmk7r1vfhipco8j4ke8pme2j4pf','127.0.0.1',1482067818,'__ci_last_regenerate|i:1482067792;id|s:1:\"1\";nome|s:6:\"Gilvan\";email|s:19:\"gil-f-o@hotmail.com\";adm|s:1:\"1\";logado|b:1;'),('tueae9uknhriq02on2q8bugjdq343p5v','127.0.0.1',1482094573,'__ci_last_regenerate|i:1482094573;'),('ieg4atf709c12kuua2ci9n4l44u24jrc','127.0.0.1',1482105629,'__ci_last_regenerate|i:1482105629;');
/*!40000 ALTER TABLE `usuarios_sessoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-18 22:02:43
