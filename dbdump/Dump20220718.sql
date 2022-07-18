-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: virtualpiano
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `records` (
  `name` varchar(50) NOT NULL,
  `record` varchar(10000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `playCount` int DEFAULT '0',
  `visibility` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`name`,`username`),
  KEY `username` (`username`),
  CONSTRAINT `records_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `records_chk_1` CHECK ((`visibility` in (_utf8mb3'private',_utf8mb3'public')))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES ('Depressing','{\"2583\":\"C3\",\"3640\":\"D3\",\"3957\":\"G3s\",\"5769\":\"C3\",\"6187\":\"D3\",\"6558\":\"C3\",\"8025\":\"F3\",\"8498\":\"G3\",\"9043\":\"F3\",\"10565\":\"C3\",\"11105\":\"D3\",\"11635\":\"C3\",\"12901\":\"F3\",\"13658\":\"G3s\",\"14236\":\"F3\",\"15885\":\"C3\",\"16217\":\"D3\",\"16564\":\"F3\",\"16957\":\"G3s\",\"17371\":\"C3\",\"17745\":\"D3\",\"17931\":\"F3\",\"18069\":\"G3s\",\"18412\":\"C3\",\"18589\":\"D3\",\"18687\":\"F3\",\"18781\":\"G3s\"}','laravel23','2022-07-17 08:03:12',2,'public'),('Do Re Me fa','{\"938\":\"C3\",\"2666\":\"D3\",\"3749\":\"E3\",\"4796\":\"F3\",\"5943\":\"G3\",\"6989\":\"A3\",\"8327\":\"B3\",\"9417\":\"C4\",\"10481\":\"C4\",\"11427\":\"B3\",\"12438\":\"A3\",\"13521\":\"G3\",\"14609\":\"F3\",\"15648\":\"E3\",\"16733\":\"D3\",\"17744\":\"C3\"}','laravel23','2022-07-18 05:57:10',0,'public'),('Gaga','{\"1676\":\"C5s\",\"2660\":\"C4s\",\"3039\":\"G3s\",\"3234\":\"D4\",\"3619\":\"G4\",\"3951\":\"D4s\",\"4149\":\"G4\",\"4161\":\"G3s\",\"4442\":\"C3s\"}','laravel23','2022-07-18 06:27:39',0,'public'),('Hello','{\"1427\":\"F4s\",\"4005\":\"C3\",\"4868\":\"D3\",\"5611\":\"E3\",\"6372\":\"F3\",\"7112\":\"F3s\",\"7905\":\"G3\",\"8639\":\"F3s\",\"9164\":\"F3\",\"9679\":\"E3\",\"10182\":\"D3s\",\"10324\":\"C3s\"}','laravel23','2022-07-17 04:18:29',1,'public'),('JimsTrack','{\"1864\":\"F4s\",\"4851\":\"F4s\",\"5825\":\"G3s\",\"6755\":\"F4s\",\"8640\":\"C3s\",\"9633\":\"F4s\",\"10536\":\"A3\",\"12220\":\"C3s\",\"13256\":\"D3s\",\"14204\":\"C3s\",\"15226\":\"F3\",\"15949\":\"C3s\",\"16859\":\"F3s\",\"17802\":\"A3\",\"18846\":\"C3s\",\"19937\":\"F3s\",\"21142\":\"G3s\",\"22345\":\"F3s\",\"23628\":\"C3s\",\"24465\":\"F3s\",\"24984\":\"G3s\",\"25236\":\"F3s\",\"25646\":\"C3s\",\"25867\":\"F3s\",\"26045\":\"G3s\",\"26265\":\"F3s\",\"26485\":\"G3s\",\"26527\":\"C3s\",\"26734\":\"F3s\",\"26860\":\"G3s\",\"27040\":\"F3s\",\"27142\":\"G3s\"}','jim42','2022-07-17 11:08:09',0,'public'),('test','{\"853\":\"C3\",\"1052\":\"D3\",\"1335\":\"F3s\",\"1459\":\"A3\",\"1569\":\"F3s\",\"1644\":\"A3\",\"1745\":\"F3s\",\"1816\":\"A3\",\"1933\":\"F3s\",\"2013\":\"A3\",\"2120\":\"F3s\",\"2197\":\"A3\",\"2266\":\"F3s\",\"2672\":\"C3\",\"2864\":\"D3s\",\"2962\":\"F3s\",\"3077\":\"A3\",\"3222\":\"F3s\",\"3326\":\"A3\",\"3439\":\"F3s\",\"3517\":\"A3\",\"3631\":\"F3s\",\"3717\":\"A3\",\"3838\":\"F3s\",\"4090\":\"C3\",\"4278\":\"D3\",\"4352\":\"F3s\",\"4437\":\"A3\",\"4567\":\"F3s\",\"4663\":\"A3\",\"4771\":\"F3s\",\"4839\":\"A3\",\"4972\":\"F3s\",\"5051\":\"A3\",\"5182\":\"F3s\",\"5608\":\"C3\",\"5756\":\"E3\",\"5900\":\"A3\",\"5994\":\"F3s\",\"6098\":\"A3\",\"6208\":\"F3s\",\"6291\":\"A3\",\"6441\":\"F3s\",\"6558\":\"A3\",\"6663\":\"F3s\"}','laravel23','2022-07-18 06:28:49',0,'public'),('Track 1','{\"1716\":\"G4\",\"2118\":\"C4s\",\"2339\":\"G3s\",\"2520\":\"D4\",\"3168\":\"F4s\",\"3494\":\"G3s\",\"3683\":\"C3s\",\"3890\":\"F4s\",\"5840\":\"E4\",\"5843\":\"F4s\",\"5845\":\"C4s\",\"6478\":\"F4s\",\"6485\":\"E4\",\"7070\":\"F4s\",\"7082\":\"E4\",\"7093\":\"C4s\",\"7707\":\"F4s\",\"7715\":\"C4s\",\"7717\":\"E4\",\"8412\":\"G3\",\"8427\":\"E4\",\"8428\":\"C3s\",\"9017\":\"G3\",\"9022\":\"E4\",\"9038\":\"C3s\",\"9519\":\"G3\",\"9541\":\"E4\",\"9544\":\"C3s\",\"10077\":\"G3\",\"10101\":\"C3s\",\"10104\":\"E4\",\"10859\":\"D4\",\"10983\":\"G4s\",\"10995\":\"F4\",\"11450\":\"G4s\",\"11466\":\"F4\",\"11472\":\"D4\",\"11990\":\"G4s\",\"12002\":\"D4\",\"12469\":\"G4s\",\"12472\":\"F4\",\"12489\":\"D4\",\"12875\":\"C4s\",\"13191\":\"D3s\",\"13192\":\"G3\",\"13714\":\"C4s\",\"13716\":\"G3\",\"14250\":\"G3\",\"14265\":\"D3s\",\"14279\":\"C4s\",\"14848\":\"G3\",\"14867\":\"D3s\",\"14875\":\"C4s\"}','laravel23','2022-07-10 08:40:12',1,'public'),('Track 3','{\"847\":\"C4s\",\"1006\":\"G3s\",\"1161\":\"G4\",\"1321\":\"G3s\",\"1372\":\"D4\",\"1443\":\"G4\",\"1593\":\"D4\",\"1839\":\"E4\"}','laravel23','2022-07-10 08:42:44',1,'public'),('Track 4','{\"1968\":\"C5s\",\"2738\":\"G4\",\"2978\":\"G3s\",\"3236\":\"G4\",\"3439\":\"G3s\",\"3628\":\"G4\",\"3789\":\"G3s\",\"4151\":\"C3s\",\"4812\":\"D3s\",\"5819\":\"C3s\",\"6009\":\"D3s\",\"6287\":\"F3\",\"6504\":\"G3\",\"6901\":\"A3\",\"7070\":\"C3\",\"7249\":\"G3\",\"7493\":\"D3s\",\"7711\":\"F3\"}','laravel23','2022-07-10 08:43:06',0,'public'),('Track 6','{\"1668\":\"C4s\",\"2197\":\"D4s\",\"2448\":\"F4s\",\"2517\":\"G3s\",\"3357\":\"C4s\",\"3771\":\"D4s\",\"4133\":\"F4s\",\"4249\":\"G4s\",\"5100\":\"C4s\",\"5534\":\"D4s\",\"9681\":\"C4s\",\"10046\":\"D4s\",\"10411\":\"F4s\",\"10524\":\"G4s\",\"11121\":\"C4s\",\"11324\":\"D4s\",\"11575\":\"F4s\",\"11825\":\"G5s\",\"12416\":\"F4s\",\"12596\":\"G4\",\"13145\":\"G4\",\"13429\":\"C4s\",\"13615\":\"D4s\",\"13772\":\"F4s\",\"14187\":\"F5s\",\"14409\":\"C4s\",\"14655\":\"F4s\",\"14855\":\"D4s\",\"15165\":\"F4\",\"15679\":\"F4\",\"15990\":\"F4\",\"16129\":\"F4\",\"16407\":\"F4\",\"16875\":\"C4s\",\"17339\":\"D4s\",\"17738\":\"D4\",\"18268\":\"F4\",\"18614\":\"F4s\",\"19375\":\"F4s\",\"19617\":\"F4\",\"19837\":\"C4s\",\"20098\":\"F4\",\"20573\":\"F4s\",\"20818\":\"C4s\",\"21032\":\"F4\",\"21275\":\"C4s\",\"21448\":\"F4s\",\"21719\":\"C4s\",\"22061\":\"C4s\"}','laravel23','2022-07-10 08:43:44',0,'public'),('Track 7','{\"1373\":\"C4s\",\"1750\":\"F4s\",\"2178\":\"G3\",\"2584\":\"G3\",\"2971\":\"G3\",\"3122\":\"G3\",\"3571\":\"C3s\",\"4039\":\"D3s\",\"4499\":\"G3\",\"4902\":\"C3s\",\"5439\":\"D3s\",\"5763\":\"F3\",\"6555\":\"C3s\",\"6793\":\"D3s\",\"7098\":\"F3\",\"7806\":\"F3s\",\"8323\":\"C3s\",\"8573\":\"D3s\",\"8831\":\"F3\",\"9154\":\"F3s\",\"9532\":\"C3s\",\"9709\":\"D3s\",\"9947\":\"F3\",\"10220\":\"F3s\",\"10457\":\"G3\",\"10726\":\"G3s\",\"11132\":\"C3s\",\"11470\":\"D3s\",\"11654\":\"F3\",\"11977\":\"F3s\",\"12650\":\"G3s\",\"13172\":\"A3\",\"13640\":\"C3s\",\"13860\":\"A3s\",\"14567\":\"A3s\",\"14792\":\"F3s\",\"14969\":\"A3s\",\"15063\":\"F3s\",\"15194\":\"A3s\",\"15313\":\"F3s\",\"15407\":\"A3s\",\"15624\":\"C3s\"}','laravel23','2022-07-10 08:44:13',0,'private'),('Track 8','{\"1591\":\"D2\",\"1887\":\"G2s\",\"2226\":\"A2\",\"2392\":\"A2s\",\"2565\":\"A2s\",\"2731\":\"A2s\",\"2896\":\"A2s\",\"3055\":\"A2s\",\"3222\":\"A2s\",\"3389\":\"A2s\",\"3554\":\"A2s\",\"3709\":\"A2s\",\"3859\":\"A2s\",\"4016\":\"A2s\",\"4148\":\"A2s\",\"4343\":\"D2\",\"4469\":\"D2s\",\"4769\":\"F2\"}','laravel23','2022-07-10 08:44:33',0,'public'),('Track 9','{\"1601\":\"D2s\",\"1878\":\"A2\",\"2100\":\"G2\",\"2287\":\"A2s\",\"2509\":\"A2\",\"2708\":\"D2\",\"2907\":\"G2\",\"3156\":\"A2\",\"3321\":\"A2s\",\"3503\":\"A2\",\"3734\":\"D2s\",\"3954\":\"G2\",\"4114\":\"A2\",\"4284\":\"A2s\",\"4479\":\"A2\",\"4653\":\"G2\",\"4914\":\"D2\",\"5063\":\"A2\",\"5290\":\"A2s\",\"5457\":\"A2\",\"5623\":\"G2\",\"5816\":\"A2\",\"5977\":\"A2s\",\"6141\":\"A2\",\"6346\":\"G2\",\"6537\":\"D2s\",\"6654\":\"A2\",\"6825\":\"A2s\"}','laravel23','2022-07-10 08:44:55',0,'public'),('Track2','{\"2395\":\"C3\",\"2407\":\"D3\",\"6185\":\"F4s\",\"6694\":\"G3\",\"7131\":\"F4s\",\"7561\":\"G3\",\"8021\":\"F4s\",\"8455\":\"G3\",\"8912\":\"F4s\",\"9357\":\"G3\",\"9827\":\"F3\",\"10327\":\"G3\",\"10809\":\"F3\",\"11087\":\"G3\",\"12654\":\"D3\",\"13046\":\"G3s\",\"13551\":\"G3s\",\"13983\":\"G3s\",\"14272\":\"G3\",\"14863\":\"G3s\",\"15480\":\"F3\",\"16020\":\"F3\",\"16552\":\"C3\",\"16906\":\"G3s\",\"17547\":\"F3\",\"18278\":\"C3\",\"18659\":\"F3\",\"18960\":\"G3s\",\"19509\":\"C3\",\"19800\":\"F3\",\"20070\":\"G3s\",\"20399\":\"C3\",\"20654\":\"F3\",\"20934\":\"G3s\",\"21301\":\"C3\",\"21684\":\"F3\",\"22014\":\"G3s\",\"22865\":\"C3\",\"23209\":\"F3\",\"23499\":\"G3s\",\"23882\":\"C3\",\"24268\":\"F3\",\"24607\":\"G3s\",\"24936\":\"C3\",\"25241\":\"F3\",\"25979\":\"G3s\"}','laravel23','2022-07-10 08:42:28',0,'public');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Jim42','jimmyhello','Jim',''),('Jimmy51','minfitwer','Jimmy',NULL),('laravel23','killgore','Sam','Wilson');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-18 23:08:20
