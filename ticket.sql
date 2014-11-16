CREATE DATABASE  IF NOT EXISTS `ticket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ticket`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ticket
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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Show'),(2,'Teatro'),(3,'Stand-Up');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Diego Moreira','100.276.256-13'),(2,'Enios Lima','100.245.812-12');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo` varchar(45) DEFAULT NULL,
  `quantidade` varchar(45) DEFAULT NULL,
  `valor_total` varchar(45) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `evento_idevento` int(11) NOT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `fk_compra_cliente_idx` (`cliente_idcliente`),
  KEY `fk_compra_evento1_idx` (`evento_idevento`),
  CONSTRAINT `fk_compra_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'1416062634','2','90',1,6),(2,'1416062654','3','237',1,9),(3,'1416062668','3','270',2,4);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEvento` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`idevento`),
  KEY `fk_evento_categoria1_idx` (`categoria_idcategoria`),
  CONSTRAINT `fk_evento_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (2,'Samba do Zé','1970-01-01','19:00','11.11',1),(3,'Geraldo Magela','2014-01-01','19:00','111.99',1),(4,'U2','2014-02-04','19:45','90.00',1),(5,'Serginho Malandro','2014-11-05','20:45','50.00',3),(6,'Sambô','2014-03-06','21:00','45.00',1),(8,'Jammil','2014-05-13','22:00','120.00',1),(9,'Caetano Veloso','2014-06-17','19:45','79.00',1),(10,'Revelação','2014-06-25','00:00','120.00',1),(11,'Zé Ramalho','2014-07-16','21:00','90.00',1),(12,'Bruno Mars','2014-10-28','13:00','13.00',1),(13,'O Marido da minha mulher','2014-12-18','22:00','15.00',2),(14,'Amar é uma comédia','2014-10-08','21:45','50.00',1),(15,'Vai que cola','2014-09-15','21:00','95.00',2),(16,'Bom gosto','2014-08-29','22:45','120.00',1),(17,'Assunta Brasil','2014-01-28','12:00','200.90',2),(18,'Toquinho','2014-12-25','21:24','45.00',1),(19,'Butequim','2014-04-11','21:45','25.00',1);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nmusuario` varchar(45) DEFAULT NULL,
  `dssenha` varchar(45) DEFAULT NULL,
  `fgstatus` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Diego Moreira','c4ca4238a0b923820dcc509a6f75849b','A','1','admin'),(2,'Enios','d41d8cd98f00b204e9800998ecf8427e','A','enios','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-16 19:37:06
