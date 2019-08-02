-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: 3info2
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conv_even`
--

DROP TABLE IF EXISTS `conv_even`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conv_even` (
  `id_evento` int(11) DEFAULT NULL,
  `id_convidado` int(11) DEFAULT NULL,
  KEY `id_evento` (`id_evento`),
  KEY `id_convidado` (`id_convidado`),
  CONSTRAINT `conv_even_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`),
  CONSTRAINT `conv_even_ibfk_2` FOREIGN KEY (`id_convidado`) REFERENCES `convidados` (`id_convidado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conv_even`
--

LOCK TABLES `conv_even` WRITE;
/*!40000 ALTER TABLE `conv_even` DISABLE KEYS */;
/*!40000 ALTER TABLE `conv_even` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convidados`
--

DROP TABLE IF EXISTS `convidados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convidados` (
  `id_convidado` int(11) NOT NULL AUTO_INCREMENT,
  `idade` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_convidado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convidados`
--

LOCK TABLES `convidados` WRITE;
/*!40000 ALTER TABLE `convidados` DISABLE KEYS */;
/*!40000 ALTER TABLE `convidados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_serv`
--

DROP TABLE IF EXISTS `emp_serv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_serv` (
  `id_serv` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `valor_base` float DEFAULT NULL,
  KEY `id_serv` (`id_serv`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `emp_serv_ibfk_1` FOREIGN KEY (`id_serv`) REFERENCES `servicos` (`id_serv`),
  CONSTRAINT `emp_serv_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_serv`
--

LOCK TABLES `emp_serv` WRITE;
/*!40000 ALTER TABLE `emp_serv` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_serv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `nome_evento` varchar(50) DEFAULT NULL,
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serv_contrato`
--

DROP TABLE IF EXISTS `serv_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serv_contrato` (
  `id_serv` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  KEY `id_serv` (`id_serv`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `serv_contrato_ibfk_1` FOREIGN KEY (`id_serv`) REFERENCES `servicos` (`id_serv`),
  CONSTRAINT `serv_contrato_ibfk_2` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serv_contrato`
--

LOCK TABLES `serv_contrato` WRITE;
/*!40000 ALTER TABLE `serv_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `serv_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id_serv` int(11) NOT NULL AUTO_INCREMENT,
  `desc_serv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_serv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefas` (
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_conv`
--

DROP TABLE IF EXISTS `user_conv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_conv` (
  `id_convidado` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  KEY `id_convidado` (`id_convidado`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `user_conv_ibfk_1` FOREIGN KEY (`id_convidado`) REFERENCES `convidados` (`id_convidado`),
  CONSTRAINT `user_conv_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_conv`
--

LOCK TABLES `user_conv` WRITE;
/*!40000 ALTER TABLE `user_conv` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_conv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto_perfil` blob,
  `cpf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Julia Biff','ju@gmail.com','934555797','bola',NULL,'158.814.702-90'),(2,'Bianca Leithold','bia@gmail.com','256554567','banana',NULL,'273.778.022-51'),(3,'Elizabeth Antunes','beth@gmail.com','777554567','maca',NULL,'329.635.185-01'),(4,'Leticia dos Santos','leticia@gmail.com','555554567','batata',NULL,'422.821.472-00'),(5,'Joao Pedro','joao@gmail.com','666554567','tomate',NULL,'538.172.449-75'),(6,'Natalia Dellandrea','nat@gmail.com','333554567','chocolate',NULL,'622.343.276-36'),(7,'Matheus Gomes','gomes@gmail.com','222554567','cebola',NULL,'651.132.287-45'),(8,'Ana Luiza Souza','luiza@gmail.com','111554567','abobora',NULL,'668.265.905-90'),(9,'Karen Fernandes','karen@gmail.com','934665789','1234',NULL,'713.438.116-19'),(10,'Chas Crane','chas@gmail.com','988552266','123',NULL,'785.956.091-79');
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

-- Dump completed on 2019-06-07 13:18:25
