-- MySQL dump 10.13  Distrib 5.5.52, for Win64 (x86)
--
-- Host: localhost    Database: activisme_bk_zeverij
-- ------------------------------------------------------
-- Server version	5.5.52

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
-- Table structure for table `gov_members`
--

DROP TABLE IF EXISTS `gov_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gov_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Function` varchar(255) DEFAULT NULL,
  `Union_id` int(11) DEFAULT NULL,
  `Information` varchar(500) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gov_members`
--

LOCK TABLES `gov_members` WRITE;
/*!40000 ALTER TABLE `gov_members` DISABLE KEYS */;
INSERT INTO `gov_members` VALUES (1,'Charles Michel','Eerste Minister',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_charles_michel',NULL),(2,'Kris Peeters','Vice-eersteminister en minister van Werk, Economie en Consumenten, belast met Buitenlandse Handel',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_kris_peeters',NULL),(3,'Jan Jambon','Vice-eersteminister en minister van Veiligheid en Binnenlandse Zaken, belast met de Regie der gebouwen',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_jan_jambon',NULL),(4,'Alexander De Croo','Vice-eersteminister en minister van Ontwikkelingssamenwerking, Digitale Agenda, Telecommunicatie en Post',NULL,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_alexander#_de#_croo',NULL),(5,'Didier Reynders','Vice-eersteminister en minister van Buitenlandse Zaken en Europese Zaken, belast met Beliris en de Federale Culturele Instellingen',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_didier_reynders',NULL),(6,'Koen Geens','Minister van Justitie ',NULL,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_koen#_geens',NULL),(7,'Maggie De Block','Minister van Sociale Zaken en Volksgezondheid',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_maggie_de_block',NULL),(8,'Daniel Bacquelaine','Minister van Pensioenen',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_daniel_bacquelaine',NULL),(9,'Johan Van Overtveldt','Minister van Financiën, belast met Bestrijding van de fiscale fraude',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_johan_van_overtveldt',NULL),(10,'Willy Borsus','Minister van Middenstand, Zelfstandigen, KMO\'s, Landbouw en Maatschappelijke Integratie',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_willy_borsus',NULL),(11,'Marie Christine Marghem','Minister van Energie, Leefmilieu en Duurzame Ontwikkeling',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_marie_christine_marghem',NULL),(12,'Steven Vandeput','Minister van Defensie, belast met Ambtenarenzaken',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_steven_vandeput',NULL),(13,'Sophie Wilmés','Minister van Begroting, belast met de Nationale Loterij',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_sophie_wilmes',NULL),(14,'François Bellot','Minister van Mobiliteit, belast met Belgocontrol en de Nationale Maatschappij der Belgische Spoorwegen',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_francois_bellot',NULL),(15,'Pieter De Crem','Staatssecretaris voor Buitenlandse Handel, toegevoegd aan de minister belast met Buitenlandse Handel',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_pieter_de_crem',NULL),(16,'Elke Sleurs','Staatssecretaris voor Armoedebestrijding, Gelijke Kansen, Personen met een beperking, en Wetenschapsbeleid, belast met Grote Steden, toegevoegd aan de minister van Financiën\r\n\r\n',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_elke_sleurs',NULL),(17,'Theo Francken','Staatssecretaris voor Asiel en Migratie, belast met Administratieve Vereenvoudiging, toegevoegd aan de minister van Veiligheid en Binnenlandse Zaken',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_theo_francken',NULL),(18,'Philippe De Backer','Staatssecretaris voor Bestrijding van de sociale fraude, Privacy en Noordzee, toegevoegd aan de minister van Sociale Zaken en Volksgezondheid',NULL,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_philippe_de_backer',NULL);
/*!40000 ALTER TABLE `gov_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gov_unions`
--

DROP TABLE IF EXISTS `gov_unions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gov_unions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_full` varchar(255) DEFAULT NULL,
  `name_abbr` varchar(255) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gov_unions`
--

LOCK TABLES `gov_unions` WRITE;
/*!40000 ALTER TABLE `gov_unions` DISABLE KEYS */;
INSERT INTO `gov_unions` VALUES (1,'Christen-Democratisch & Vlaams','CD&V','#f47d2a'),(2,'centre démocrate Humaniste  ','cdH','#b64330'),(3,'Écologistes confédérés pour l\'Organisation de Luttes originales','ECOLO','#8CC63F'),(4,'Fédéralistes Démocrates Francophones','FDF','#cb0167'),(5,'Groen!','Groen','#008479'),(6,'Mouvement Réformateur','MR','#044679'),(7,'N-VA','Nieuw-Vlaamse Alliantie','#f9b919'),(8,'Open VLD','Open Vlaamse Liberalen en Democraten','#275ca5'),(9,'PP','Parti Populaire','#773179'),(10,'PS','Parti socialiste','#ff0000'),(11,'ptb-go!','Parti du Travail de Belgique - Gauche d\'Ouverture!','#e8312a'),(12,'sp.a','socialistische partij anders','#e20025'),(13,'Vlaams Belang','Vlaams Belang','#5a9fc1');
/*!40000 ALTER TABLE `gov_unions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-09  0:36:54
