CREATE DATABASE  IF NOT EXISTS `cafeteria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cafeteria`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: cafeteria
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reference` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `weight` int NOT NULL,
  `category` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (14,'Pan','Frances',500,4,'Arina',0,'2022-06-29 08:58:05','2022-06-29 08:58:05'),(15,'Galletas','Bimbo',2000,56,'Arina',12,'2022-06-29 08:58:36','2022-06-29 08:58:36'),(16,'coca-cola','Sin azucar',3000,500,'Refresco',20,'2022-06-29 08:59:53','2022-06-29 08:59:53'),(17,'Empanadas','Pollo',600,20,'Arina',17,'2022-06-29 09:00:16','2022-06-29 09:00:16'),(18,'Hit','Mango',2000,400,'Jugo',10,'2022-06-29 09:01:58','2022-06-29 09:01:58');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_product`
--

DROP TABLE IF EXISTS `sale_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale_product` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `amount_to_sell` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_product`
--

LOCK TABLES `sale_product` WRITE;
/*!40000 ALTER TABLE `sale_product` DISABLE KEYS */;
INSERT INTO `sale_product` VALUES (14,14,4,'2022-06-29 09:50:04','2022-06-29 09:50:04'),(15,15,3,'2022-06-29 09:48:02','2022-06-29 09:48:02'),(16,14,6,'2022-06-29 09:54:51','2022-06-29 09:54:51'),(17,17,6,'2022-06-29 09:55:05','2022-06-29 09:55:05'),(18,17,6,'2022-06-29 09:55:47','2022-06-29 09:55:47'),(19,17,6,'2022-06-29 10:01:48','2022-06-29 10:01:48'),(20,14,5,'2022-06-29 10:03:13','2022-06-29 10:03:13'),(21,14,5,'2022-06-29 10:07:22','2022-06-29 10:07:22'),(22,17,3,'2022-06-29 10:18:42','2022-06-29 10:18:42');
/*!40000 ALTER TABLE `sale_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cafeteria'
--

--
-- Dumping routines for database 'cafeteria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-29  5:38:07
