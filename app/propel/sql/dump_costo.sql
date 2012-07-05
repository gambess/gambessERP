-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: testing
-- ------------------------------------------------------
-- Server version	5.1.61-0ubuntu0.11.04.1

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
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `id_cuenta` int(20) NOT NULL AUTO_INCREMENT,
  `nombre_cuenta` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor_cuenta` float(7,2) NOT NULL DEFAULT '0.00',
  `tipo_cuenta` enum('FORMAL','INFORMAL') COLLATE utf8_unicode_ci DEFAULT 'FORMAL',
  `user_crea_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion_cuenta` timestamp NULL DEFAULT NULL,
  `fecha_modificacion_cuenta` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,'Gastos Generales',21000.00,'FORMAL','gambess','2012-06-17 16:18:49','2012-07-05 08:18:32'),(9,'Casa Fija',11110.00,'FORMAL',NULL,'2012-06-28 10:51:11','2012-07-05 08:18:01');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gasto`
--

DROP TABLE IF EXISTS `gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gasto` (
  `id_gasto` int(20) NOT NULL AUTO_INCREMENT,
  `fk_cuenta` int(20) NOT NULL DEFAULT '0',
  `nombre_gasto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo_gasto` float(7,2) NOT NULL DEFAULT '0.00',
  `fecha_emision_gasto` date DEFAULT NULL,
  `fecha_pago_gasto` date DEFAULT NULL,
  `numero_doc_gasto` text COLLATE utf8_unicode_ci,
  `fecha_creacion_gasto` timestamp NULL DEFAULT NULL,
  `fecha_modificacion_gasto` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gasto`),
  KEY `fk_cuenta` (`fk_cuenta`),
  CONSTRAINT `fk_gasto_cuenta` FOREIGN KEY (`fk_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gasto`
--

LOCK TABLES `gasto` WRITE;
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT INTO `gasto` VALUES (1,1,'Telefonia Fija',10000.00,'2012-06-21','2012-07-05',NULL,'2012-06-17 17:12:26','2012-07-05 08:18:32'),(2,1,'Internet Banda Ancha',1000.00,'2012-06-24','2012-07-02',NULL,'2012-06-17 17:12:26','2012-07-05 08:19:35'),(3,1,'Telefonía Celular',10000.00,'2012-06-28','2012-07-31',NULL,'2012-06-17 17:12:26','2012-07-05 08:20:10'),(4,9,'Tratando cambiar2',11110.00,'2007-06-28','2007-07-12',NULL,'2012-06-29 15:35:43','2012-07-05 08:18:00');
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `tipo_venta` enum('FORMAL','INFORMAL') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FORMAL',
  `total_venta` float(7,2) NOT NULL DEFAULT '0.00',
  `formal_total_venta` float(7,2) NOT NULL DEFAULT '0.00',
  `informal_total_venta` float(7,2) NOT NULL DEFAULT '0.00',
  `total_iva_venta_formal` float(7,2) NOT NULL DEFAULT '0.00',
  `detalle_venta` text COLLATE utf8_unicode_ci,
  `fecha_creacion_venta` timestamp NULL DEFAULT NULL,
  `fecha_modificacion_venta` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  UNIQUE KEY `fecha_venta_UNIQUE` (`fecha_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,'2012-07-02','FORMAL',80000.00,30000.00,50000.00,5700.00,'Venta dia lunes',NULL,'2012-07-05 08:45:14'),(2,'2012-07-04','FORMAL',50000.00,45000.00,5000.00,8550.00,'venta hoy bla bla bla','2012-07-05 08:41:15','2012-07-05 08:43:42');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-06  0:04:28
