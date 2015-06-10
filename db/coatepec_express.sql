-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: coatepec_express
-- ------------------------------------------------------
-- Server version	5.5.24-5

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
-- Table structure for table `calles`
--

DROP TABLE IF EXISTS `calles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calles` (
  `id_calle` int(11) NOT NULL AUTO_INCREMENT,
  `id_colonia` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `calle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_calle`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calles`
--

LOCK TABLES `calles` WRITE;
/*!40000 ALTER TABLE `calles` DISABLE KEYS */;
INSERT INTO `calles` VALUES (1,1,38,'Lerdo'),(2,101,38,'Bernardo Casals'),(3,1,38,'1a Moctezuma'),(4,33,38,'Anahuac'),(5,64,38,'Jazmin'),(6,36,38,'Priv. del Obrador'),(7,50,38,'Papaloapan'),(8,1,38,'Degollado');
/*!40000 ALTER TABLE `calles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambio_canal`
--

DROP TABLE IF EXISTS `cambio_canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambio_canal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `canal_0` int(1) DEFAULT NULL,
  `canal_1` int(1) DEFAULT NULL,
  `canal_2` int(1) DEFAULT NULL,
  `canal_3` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambio_canal`
--

LOCK TABLES `cambio_canal` WRITE;
/*!40000 ALTER TABLE `cambio_canal` DISABLE KEYS */;
/*!40000 ALTER TABLE `cambio_canal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'coatepec'),(2,'xalapa');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonias`
--

DROP TABLE IF EXISTS `colonias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonias` (
  `id_colonia` int(11) NOT NULL AUTO_INCREMENT,
  `colonia` varchar(255) NOT NULL,
  `tipo_de_asentamiento` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `cp` int(255) NOT NULL,
  `id_estado` int(255) NOT NULL,
  `id_municipio` int(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  PRIMARY KEY (`id_colonia`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonias`
--

LOCK TABLES `colonias` WRITE;
/*!40000 ALTER TABLE `colonias` DISABLE KEYS */;
INSERT INTO `colonias` VALUES (1,'Coatepec Centro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(2,'La Purísima','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(3,'La Luz','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(4,'Anfer','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(5,'Carlos Roberto Smith','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(6,'Popular','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(7,'Del Bosque','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(8,'Azuzul','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(9,'El Porvenir','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(10,'Pomarosa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(11,'Sinesco','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(12,'Sayago Cristóbal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(13,'Ignacio Allende','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(14,'Zona Dorada','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(15,'La Florida','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(16,'Mariano Escobedo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(17,'Plan de la Cruz','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(18,'La Pitaya','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(19,'San Pedro Buenavista','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(20,'Arboledas San Pedro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(21,'Campestre la Orduña','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(22,'Francisco Villa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(23,'Las Jacarandas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(24,'Del Carmen','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(25,'Rincón Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(26,'La Gachupina','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(27,'Los Pinos','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(28,'Roberto Amoros','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(29,'Nestle','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(30,'Encino','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(31,'Libertad','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(32,'El Mirador','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(33,'Las Golondrinas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(34,'La Herradura','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(35,'Araucarias','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(36,'El Obrador','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(37,'Centenario','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(38,'Díaz Mirón','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(39,'Loma de los Angeles','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(40,'San Jerónimo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(41,'Agrícola','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(42,'Setse','Unidad habitacional','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(43,'Rafael Sánchez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(44,'10 de Mayo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(45,'El Pedregal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(46,'Reyes Heroles','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(47,'Las Hayas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(48,'San Jerónimo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(49,'Olivares Pineda','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(50,'Francisco Javier Mina','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(51,'Los Carriles','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(52,'Lázaro Cárdenas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(53,'Campo Viejo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(54,'Santa Rosa','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(55,'Las Auroras','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(56,'22 de Septiembre','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(57,'Santa Teresa','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(58,'Santa Bárbara','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(59,'Casa Blanca','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(60,'Jardines de Coatepec','Unidad habitacional','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(61,'Plan Mavil','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(62,'Los Olivos','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(63,'María Enriqueta Fracción II','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(64,'2 de Abril','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(65,'Campestre','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(66,'Primero de Mayo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(67,'Fuentes de Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(68,'Emiliano Zapata','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(69,'6 de Julio','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(70,'Espinal Alto','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(71,'Espinal Bajo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(72,'Magisterial Jardines de Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(73,'El Pimiento','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(74,'6 de Enero','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(75,'S. N. T. E. Sección 56','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(76,'María Enriqueta','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(77,'2 de Enero','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(78,'Las Bugambilias','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(79,'Casa Pinta','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(80,'Las Primaveras','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(81,'El Cedro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(82,'Jardines de Pastoreza','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(83,'Lomas de Flores','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(84,'Miguel Alemán','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(85,'Las Cruces','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(86,'Sostenes Guzmán','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(87,'Santa Martha','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(88,'Loma del Suchill','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(89,'Fernando Gutiérrez Barrios','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(90,'El Arenal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(91,'El Paraíso','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(92,'Benito Juárez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(93,'Mosvic','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(94,'Orquídeas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(95,'Los Prados','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(96,'Manantiales','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(97,'Los Lirios','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(98,'Las Azaleas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(99,'INFONAVIT los Cafetos','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(100,'Nueva Nestle','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(101,'Bernardo Casals','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(102,'Andrea','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(103,'Las Margaritas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(104,'Setse II','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(105,'La Mata','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(106,'La Mata 2da Sección','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(107,'Hernández Ochoa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(108,'San José','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(109,'Juan de la Luz Enríquez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(110,'Zimpizahua','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(111,'Pacho Viejo','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91002,30,38,'Rural'),(112,'Obrera (Las Puentes)','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(113,'La Orduña','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(114,'La Laguna','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(115,'San Marcos de Leon','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(116,'Las Lomas','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91002,30,38,'Rural'),(117,'El Grande','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(118,'Briones','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Urbano'),(119,'Mahuixtlan','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(120,'Zoncuatla','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(121,'Cuauhtémoc','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(122,'Vaquería','Ranchería','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(123,'Rancho Viejo','Ranchería','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(124,'Bella Esperanza','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(125,'Tuzamapan','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural');
/*!40000 ALTER TABLE `colonias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp`
--

DROP TABLE IF EXISTS `cp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `asentamiento` varchar(255) NOT NULL,
  `tipo_de_asentamiento` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `cp` int(255) NOT NULL,
  `clave_estado` int(255) NOT NULL,
  `clave_municipio` int(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp`
--

LOCK TABLES `cp` WRITE;
/*!40000 ALTER TABLE `cp` DISABLE KEYS */;
INSERT INTO `cp` VALUES (1,'91500','Coatepec Centro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(2,'91500','La Purísima','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(3,'91503','La Luz','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(4,'91505','Anfer','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(5,'91506','Carlos Roberto Smith','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(6,'91506','Popular','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(7,'91506','Del Bosque','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(8,'91510','Azuzul','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(9,'91510','El Porvenir','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(10,'91514','Pomarosa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(11,'91514','Sinesco','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(12,'91514','Sayago Cristóbal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(13,'91515','Ignacio Allende','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(14,'91516','Zona Dorada','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(15,'91517','La Florida','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(16,'91517','Mariano Escobedo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(17,'91517','Plan de la Cruz','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(18,'91517','La Pitaya','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(19,'91518','San Pedro Buenavista','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(20,'91518','Arboledas San Pedro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(21,'91518','Campestre la Orduña','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(22,'91519','Francisco Villa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(23,'91519','Las Jacarandas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(24,'91520','Del Carmen','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(25,'91520','Rincón Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(26,'91520','La Gachupina','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(27,'91520','Los Pinos','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(28,'91520','Roberto Amoros','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(29,'91520','Nestle','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(30,'91521','Encino','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(31,'91521','Libertad','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(32,'91521','El Mirador','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(33,'91521','Las Golondrinas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(34,'91527','La Herradura','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(35,'91528','Araucarias','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(36,'91528','El Obrador','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(37,'91529','Centenario','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(38,'91529','Díaz Mirón','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(39,'91529','Loma de los Angeles','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(40,'91529','San Jerónimo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(41,'91530','Agrícola','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(42,'91533','Setse','Unidad habitacional','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(43,'91533','Rafael Sánchez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(44,'91537','10 de Mayo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(45,'91538','El Pedregal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(46,'91538','Reyes Heroles','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(47,'91538','Las Hayas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(48,'91538','San Jerónimo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(49,'91539','Olivares Pineda','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(50,'91539','Francisco Javier Mina','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(51,'91539','Los Carriles','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(52,'91539','Lázaro Cárdenas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(53,'91540','Campo Viejo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(54,'91540','Santa Rosa','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(55,'91549','Las Auroras','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(56,'91549','22 de Septiembre','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(57,'91549','Santa Teresa','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(58,'91550','Santa Bárbara','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(59,'91556','Casa Blanca','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(60,'91557','Jardines de Coatepec','Unidad habitacional','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(61,'91559','Plan Mavil','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(62,'91559','Los Olivos','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(63,'91559','María Enriqueta Fracción II','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(64,'91559','2 de Abril','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(65,'91559','Campestre','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(66,'91559','Primero de Mayo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(67,'91559','Fuentes de Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(68,'91560','Emiliano Zapata','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(69,'91565','6 de Julio','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(70,'91566','Espinal Alto','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(71,'91566','Espinal Bajo','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(72,'91567','Magisterial Jardines de Coatepec','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(73,'91567','El Pimiento','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(74,'91567','6 de Enero','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(75,'91567','S. N. T. E. Sección 56','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(76,'91568','María Enriqueta','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(77,'91569','2 de Enero','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(78,'91569','Las Bugambilias','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(79,'91569','Casa Pinta','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(80,'91569','Las Primaveras','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(81,'91569','El Cedro','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(82,'91569','Jardines de Pastoreza','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(83,'91570','Lomas de Flores','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(84,'91570','Miguel Alemán','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(85,'91570','Las Cruces','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(86,'91570','Sostenes Guzmán','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(87,'91570','Santa Martha','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(88,'91570','Loma del Suchill','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(89,'91575','Fernando Gutiérrez Barrios','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(90,'91575','El Arenal','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(91,'91575','El Paraíso','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(92,'91575','Benito Juárez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(93,'91576','Mosvic','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(94,'91576','Orquídeas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(95,'91576','Los Prados','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(96,'91579','Manantiales','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(97,'91579','Los Lirios','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(98,'91580','Las Azaleas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(99,'91580','INFONAVIT los Cafetos','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(100,'91581','Nueva Nestle','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(101,'91581','Bernardo Casals','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(102,'91581','Andrea','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(103,'91581','Las Margaritas','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(104,'91581','Setse II','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(105,'91583','La Mata','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(106,'91583','La Mata 2da Sección','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(107,'91583','Hernández Ochoa','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(108,'91584','San José','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(109,'91589','Juan de la Luz Enríquez','Colonia','Coatepec','Veracruz de Ignacio de la Llave','Coatepec',91501,30,38,'Urbano'),(110,'91601','Zimpizahua','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(111,'91602','Pacho Viejo','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91002,30,38,'Rural'),(112,'91603','Obrera (Las Puentes)','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(113,'91603','La Orduña','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(114,'91604','La Laguna','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(115,'91605','San Marcos de Leon','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(116,'91606','Las Lomas','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91002,30,38,'Rural'),(117,'91607','El Grande','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(118,'91607','Briones','Fraccionamiento','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Urbano'),(119,'91608','Mahuixtlan','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(120,'91608','Zoncuatla','Congregación','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(121,'91609','Cuauhtémoc','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(122,'91609','Vaquería','Ranchería','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(123,'91609','Rancho Viejo','Ranchería','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(124,'91610','Bella Esperanza','Colonia','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural'),(125,'91610','Tuzamapan','Pueblo','Coatepec','Veracruz de Ignacio de la Llave','',91501,30,38,'Rural');
/*!40000 ALTER TABLE `cp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuera_de_momento`
--

DROP TABLE IF EXISTS `fuera_de_momento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuera_de_momento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `hora_ini_0` time DEFAULT NULL,
  `hora_ini_1` time DEFAULT NULL,
  `hora_ini_2` time DEFAULT NULL,
  `hora_ini_3` time DEFAULT NULL,
  `hora_ini_4` time DEFAULT NULL,
  `hora_ini_5` time DEFAULT NULL,
  `hora_fin_0` time DEFAULT NULL,
  `hora_fin_1` time DEFAULT NULL,
  `hora_fin_2` time DEFAULT NULL,
  `hora_fin_3` time DEFAULT NULL,
  `hora_fin_4` time DEFAULT NULL,
  `hora_fin_5` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuera_de_momento`
--

LOCK TABLES `fuera_de_momento` WRITE;
/*!40000 ALTER TABLE `fuera_de_momento` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuera_de_momento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidades`
--

DROP TABLE IF EXISTS `localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) NOT NULL,
  `localidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidades`
--

LOCK TABLES `localidades` WRITE;
/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
INSERT INTO `localidades` VALUES (38,1,'coatepec'),(39,0,'Xico'),(40,0,'Teocelo'),(41,0,'Zimpizahua'),(42,0,'Pacho Viejo'),(43,0,'La Orduña'),(44,0,'La Laguna'),(45,0,'San Marcos de Leon'),(46,0,'Las Lomas'),(47,0,'El Grande'),(48,0,'Mahuixtlan'),(49,0,'Zoncuatla'),(50,0,'Vaquería'),(51,0,'Rancho Viejo'),(52,0,'Tuzamapan'),(53,0,'Estanzuela');
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operadores`
--

DROP TABLE IF EXISTS `operadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) NOT NULL,
  `id_economico` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT 'N/A',
  `ap_paterno` varchar(255) DEFAULT 'N/A',
  `ap_materno` varchar(255) DEFAULT 'N/A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operadores`
--

LOCK TABLES `operadores` WRITE;
/*!40000 ALTER TABLE `operadores` DISABLE KEYS */;
INSERT INTO `operadores` VALUES (1,1,192,'N/A','N/A','N/A'),(2,2,40,'N/A','N/A','N/A'),(3,3,553,'N/A','N/A','N/A'),(4,4,39,'N/A','N/A','N/A'),(5,5,526,'N/A','N/A','N/A'),(6,6,49,'N/A','N/A','N/A'),(7,7,427,'N/A','N/A','N/A'),(8,8,69,'N/A','N/A','N/A'),(9,9,73,'N/A','N/A','N/A'),(10,10,59,'N/A','N/A','N/A'),(11,11,179,'','',''),(12,12,91,'','',''),(13,13,279,'','',''),(14,14,286,'','',''),(15,15,172,'','',''),(16,16,124,'','',''),(17,17,44,'','',''),(18,18,9,'N/A','N/A','N/A'),(19,19,135,'','',''),(20,20,337,'','',''),(21,21,149,'','',''),(22,22,292,'','',''),(23,23,166,'N/A','N/A','N/A'),(24,24,411,'N/A','N/A','N/A'),(25,25,359,'','',''),(26,26,415,'','',''),(27,27,188,'','',''),(28,28,423,'','',''),(29,29,263,'','',''),(30,30,208,'','',''),(31,31,210,'','',''),(32,32,211,'','',''),(33,33,236,'','',''),(34,34,398,'','',''),(35,35,260,'','',''),(36,36,222,'','',''),(37,37,287,'','',''),(38,38,341,'','',''),(39,39,36,'','',''),(40,40,298,'','',''),(41,41,317,'','',''),(42,42,323,'','',''),(43,43,348,'','',''),(44,44,360,'','',''),(45,45,453,'','',''),(46,46,406,'','',''),(47,47,417,'','',''),(48,48,420,'','',''),(49,49,536,'','',''),(50,50,389,'','',''),(51,51,479,'','',''),(52,52,399,'','',''),(53,53,510,'','',''),(54,54,541,'','',''),(55,55,512,'','',''),(56,56,314,'','',''),(57,57,547,'','',''),(58,58,105,'','',''),(59,59,60,'','',''),(60,60,556,'','',''),(61,61,365,'','',''),(62,62,346,'','',''),(63,63,206,'','',''),(64,78,456,'','','');
/*!40000 ALTER TABLE `operadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_colonia` int(11) DEFAULT NULL,
  `id_calle` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `lada` int(11) DEFAULT NULL,
  `phone` int(20) NOT NULL,
  `call_and_go` tinyint(1) NOT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` VALUES (1,38,NULL,1,1,'',228,0,0,'','',''),(2,38,NULL,33,4,'13',228,8161460,1,'','N/A',''),(3,38,NULL,50,7,'34',228,8164715,1,NULL,'N/A','San Jeronimo'),(4,38,NULL,101,2,'10',228,8161047,1,'','N/A',''),(5,38,NULL,1,3,'29',228,8161106,1,'','N/A',''),(6,38,NULL,33,4,'53',228,8163103,1,'','N/A',''),(7,38,NULL,64,5,'77',228,8162871,1,'','N/A',''),(8,38,NULL,36,6,'9',228,8163812,1,'','N/A',''),(9,38,NULL,50,7,'27',228,8164638,1,'','N/A','');
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_programados`
--

DROP TABLE IF EXISTS `servicios_programados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_programados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `id_calle` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `hora` time NOT NULL,
  `lunes` int(3) DEFAULT NULL,
  `LunGo` tinyint(1) NOT NULL DEFAULT '1',
  `martes` int(3) DEFAULT NULL,
  `MarGo` tinyint(1) NOT NULL DEFAULT '1',
  `miercoles` int(3) DEFAULT NULL,
  `MieGo` tinyint(1) NOT NULL DEFAULT '1',
  `jueves` int(3) DEFAULT NULL,
  `JueGo` tinyint(1) NOT NULL DEFAULT '1',
  `viernes` int(3) DEFAULT NULL,
  `VieGo` tinyint(1) NOT NULL DEFAULT '1',
  `sabado` int(3) DEFAULT NULL,
  `SabGo` tinyint(1) NOT NULL DEFAULT '1',
  `domingo` int(3) DEFAULT NULL,
  `DomGo` tinyint(1) NOT NULL DEFAULT '1',
  `week` int(11) NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_programados`
--

LOCK TABLES `servicios_programados` WRITE;
/*!40000 ALTER TABLE `servicios_programados` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_programados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_telefonicos`
--

DROP TABLE IF EXISTS `servicios_telefonicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_telefonicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) NOT NULL,
  `id_economico` int(11) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_colonia` varchar(11) DEFAULT NULL,
  `id_calle` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `lada` int(11) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_telefonicos`
--

LOCK TABLES `servicios_telefonicos` WRITE;
/*!40000 ALTER TABLE `servicios_telefonicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_telefonicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpo_servicio`
--

DROP TABLE IF EXISTS `tpo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tpo_servicio` (
  `id_tpo_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `tpo_servicio` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tpo_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpo_servicio`
--

LOCK TABLES `tpo_servicio` WRITE;
/*!40000 ALTER TABLE `tpo_servicio` DISABLE KEYS */;
INSERT INTO `tpo_servicio` VALUES (1,'Dama'),(2,'Caballero'),(3,'Complemento Familiar'),(4,'Libre');
/*!40000 ALTER TABLE `tpo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_en_servicio`
--

DROP TABLE IF EXISTS `unidades_en_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_en_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `entrada` time NOT NULL DEFAULT '00:00:00',
  `salida` time NOT NULL DEFAULT '00:00:00',
  `pase_de_lista` tinyint(1) DEFAULT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_en_servicio`
--

LOCK TABLES `unidades_en_servicio` WRITE;
/*!40000 ALTER TABLE `unidades_en_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidades_en_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_fuera_ciudad`
--

DROP TABLE IF EXISTS `unidades_fuera_ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_fuera_ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movil` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_localidad` varchar(200) NOT NULL,
  `id_tpo_servicio` int(11) NOT NULL,
  `tpo_servicio` varchar(255) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `mom_r` varchar(2) NOT NULL,
  `turno` varchar(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_fuera_ciudad`
--

LOCK TABLES `unidades_fuera_ciudad` WRITE;
/*!40000 ALTER TABLE `unidades_fuera_ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidades_fuera_ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `clear_password` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` tinytext NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `turno` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nocturno','b72bb5f1741b041f1e099e6a8fa2095737ab5eb8','123456','R','M','1@2.com',0,0,'N'),(2,'ambagasdowa','f96bd74e5e3fa4f26d99901f557fe9691327a73d','hide','sekai','hakaimono','1@2.com',12,1,'M'),(3,'matutino','b72bb5f1741b041f1e099e6a8fa2095737ab5eb8','123456','M','R','q@w.com',0,0,'M'),(4,'vespertino','b72bb5f1741b041f1e099e6a8fa2095737ab5eb8','123456','usuario','ap_paterno','1@2.express.com',0,0,'V'),(5,'Isadora','701bd4234550f9e3ce37b27b8ea0f5354bb4cb08','isadora','Isadora','Baizabal','isa@mail.com',0,0,'M');
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

-- Dump completed on 2013-10-21 18:27:18
