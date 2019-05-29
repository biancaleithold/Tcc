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
  `cpf` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_contrato` int(11) NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `cpf` (`cpf`),
  KEY `cnpj` (`cnpj`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `user_comum` (`cpf`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`cnpj`) REFERENCES `fornecedor` (`cnpj`),
  CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convidados`
--

DROP TABLE IF EXISTS `convidados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convidados` (
  `id_convidado` int(11) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_convidado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convidados`
--

LOCK TABLES `convidados` WRITE;
/*!40000 ALTER TABLE `convidados` DISABLE KEYS */;
/*!40000 ALTER TABLE `convidados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `cpf` (`cpf`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `user_comum` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `for_serv`
--

DROP TABLE IF EXISTS `for_serv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `for_serv` (
  `id_serv` int(11) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `valor_base` float DEFAULT NULL,
  KEY `id_serv` (`id_serv`),
  KEY `cnpj` (`cnpj`),
  CONSTRAINT `for_serv_ibfk_1` FOREIGN KEY (`id_serv`) REFERENCES `servicos` (`id_serv`),
  CONSTRAINT `for_serv_ibfk_2` FOREIGN KEY (`cnpj`) REFERENCES `fornecedor` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `for_serv`
--

LOCK TABLES `for_serv` WRITE;
/*!40000 ALTER TABLE `for_serv` DISABLE KEYS */;
/*!40000 ALTER TABLE `for_serv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `cnpj` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `id_serv` int(11) NOT NULL,
  `desc_serv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_serv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `titulo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_comum`
--

DROP TABLE IF EXISTS `user_comum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_comum` (
  `cpf` varchar(50) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `user_comum_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_comum`
--

LOCK TABLES `user_comum` WRITE;
/*!40000 ALTER TABLE `user_comum` DISABLE KEYS */;
INSERT INTO `user_comum` VALUES ('158.814.702-90',NULL),('273.778.022-51',NULL),('329.635.185-01',NULL),('422.821.472-00',NULL),('538.172.449-75',NULL),('622.343.276-36',NULL),('651.132.287-45',NULL),('668.265.905-90',NULL),('713.438.116-19',NULL),('785.956.091-79',NULL);
/*!40000 ALTER TABLE `user_comum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Karen Fernandes','karen@gmail.com','934665789','123'),(2,'Chas Crane','chas@gmail.com','988552266','123');
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

-- Dump completed on 2019-05-02 15:59:58
