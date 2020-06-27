-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ElAullido
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `NoCuenta` varchar(80) NOT NULL,
  `FechaNac` date NOT NULL,
  `CURP` varchar(80) NOT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Contrasena` varchar(80) NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `Modo` enum('Claro','Obscuro') DEFAULT NULL,
  `Elaboradas` int(4) DEFAULT 0,
  `Contestadas` int(4) DEFAULT 0,
  `Bloqueo` enum('No','Si') DEFAULT NULL,
  PRIMARY KEY (`NoCuenta`),
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `IdEncuesta` int(6) NOT NULL AUTO_INCREMENT,
  `Inicio` time DEFAULT NULL,
  `Termino` time DEFAULT NULL,
  `Categoria` enum('Actividades Acad‚micas','Ciencia','Cultura','Deportes','Otro') DEFAULT NULL,
  `IdPregunta` int(1) NOT NULL,
  `Resultado` varchar(80) NOT NULL,
  PRIMARY KEY (`IdEncuesta`),
  KEY `IdPregunta` (`IdPregunta`),
  CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`IdPregunta`) REFERENCES `pregunta` (`IdPregunta`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`IdPregunta` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `IdPregunta` int(1) NOT NULL,
  `Texto` text NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `IdRespuesta` int(2) NOT NULL,
  PRIMARY KEY (`IdPregunta`),
  KEY `IdRespuesta` (`IdRespuesta`),
  CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`IdRespuesta`) REFERENCES `respuesta` (`IdRespuesta`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`IdRespuesta` >= 2),
  CONSTRAINT `CONSTRAINT_2` CHECK (`IdRespuesta` <= 20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `RFC` varchar(80) NOT NULL,
  `FechaNac` date NOT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  `NoTrabajador` varchar(80) NOT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Contrasena` varchar(80) NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `Modo` enum('Claro','Obscuro') DEFAULT NULL,
  `Elaboradas` int(4) DEFAULT 0,
  `Contestadas` int(4) DEFAULT 0,
  `Administrador` enum('No','Si') DEFAULT NULL,
  PRIMARY KEY (`RFC`),
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES ('IfIPs3qiWeyINSJPZ7VGAQooqEekC5iXniy3GBxdcxY=','1967-07-08','xqeoCLEOTF8tVtcu2yBEgEwo5swsF8MZ39pVkDvfUoM=','YGV8wsRHr+QU0f2wffCEPsdSl2L/+YmYsKPcGXEdLoM=','WffTNEvMXQeFA+HJpN/M1Pg3Sk70wJf++5G1xVkaqPs=','$2y$10$0eW/0ghzgpOKta4yj1PjueDzQ.E5EXznSbOiQ2E7Au452yrv.sb5e','profile.jpg','Claro',0,0,'Si');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `IdRespuesta` int(2) NOT NULL,
  `Texto` text NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdRespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-27 14:31:06
