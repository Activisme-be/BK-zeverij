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
INSERT INTO `gov_members` VALUES (1,'Charles Michel','Eerste Minister',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_charles_michel','charles_michel.jpg'),(2,'Kris Peeters','Vice-eersteminister en minister van Werk, Economie en Consumenten, belast met Buitenlandse Handel',1,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_kris_peeters','kris_peeters.jpg'),(3,'Jan Jambon','Vice-eersteminister en minister van Veiligheid en Binnenlandse Zaken, belast met de Regie der gebouwen',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_jan_jambon','jan_jambon.jpg'),(4,'Alexander De Croo','Vice-eersteminister en minister van Ontwikkelingssamenwerking, Digitale Agenda, Telecommunicatie en Post',8,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_alexander#_de#_croo','alexander_de_croo.jpg'),(5,'Didier Reynders','Vice-eersteminister en minister van Buitenlandse Zaken en Europese Zaken, belast met Beliris en de Federale Culturele Instellingen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_didier_reynders','didier_reynders.jpg'),(6,'Koen Geens','Minister van Justitie ',1,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_koen#_geens','koen_geens.jpg'),(7,'Maggie De Block','Minister van Sociale Zaken en Volksgezondheid',8,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_maggie_de_block','maggie_de_block.jpg'),(8,'Daniel Bacquelaine','Minister van Pensioenen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_daniel_bacquelaine','daniel_bacquelaine.jpg'),(9,'Johan Van Overtveldt','Minister van Financi├½n, belast met Bestrijding van de fiscale fraude',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_johan_van_overtveldt','johan_van_overtveldt.jpg'),(10,'Willy Borsus','Minister van Middenstand, Zelfstandigen, KMO\'s, Landbouw en Maatschappelijke Integratie',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_willy_borsus','willy_borsus.jpg'),(11,'Marie Christine Marghem','Minister van Energie, Leefmilieu en Duurzame Ontwikkeling',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_marie_christine_marghem','Marie-christine_marghem.jpg'),(12,'Steven Vandeput','Minister van Defensie, belast met Ambtenarenzaken',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_steven_vandeput','steven_vandeput.jpg'),(13,'Sophie Wilm├®s','Minister van Begroting, belast met de Nationale Loterij',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_sophie_wilmes','sophie_wilmes_1.jpg'),(14,'Fran├ºois Bellot','Minister van Mobiliteit, belast met Belgocontrol en de Nationale Maatschappij der Belgische Spoorwegen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_francois_bellot','bellot.jpg'),(15,'Pieter De Crem','Staatssecretaris voor Buitenlandse Handel, toegevoegd aan de minister belast met Buitenlandse Handel',1,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_pieter_de_crem','Pieter_de_crem.jpg'),(16,'Elke Sleurs','Staatssecretaris voor Armoedebestrijding, Gelijke Kansen, Personen met een beperking, en Wetenschapsbeleid, belast met Grote Steden, toegevoegd aan de minister van Financi├½n\r\n\r\n',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_elke_sleurs','Elke_Sleurs.jpg'),(17,'Theo Francken','Staatssecretaris voor Asiel en Migratie, belast met Administratieve Vereenvoudiging, toegevoegd aan de minister van Veiligheid en Binnenlandse Zaken',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_theo_francken','theo_francken.jpg'),(18,'Philippe De Backer','Staatssecretaris voor Bestrijding van de sociale fraude, Privacy en Noordzee, toegevoegd aan de minister van Sociale Zaken en Volksgezondheid',8,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_philippe_de_backer','de_backer.jpg');
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
INSERT INTO `gov_unions` VALUES (1,'Christen-Democratisch & Vlaams','CD&V','#f47d2a'),(2,'centre d├®mocrate Humaniste  ','cdH','#b64330'),(3,'├ëcologistes conf├®d├®r├®s pour l\'Organisation de Luttes originales','ECOLO','#8CC63F'),(4,'F├®d├®ralistes D├®mocrates Francophones','FDF','#cb0167'),(5,'Groen!','Groen','#008479'),(6,'Mouvement R├®formateur','MR','#044679'),(7,'Nieuw-Vlaamse Alliantie','N-VA','#f9b919'),(8,'Open Vlaamse Liberalen en Democraten','Open VLD','#275ca5'),(9,'Parti Populaire','PP','#773179'),(10,'Parti socialiste','PS','#ff0000'),(11,'ptb-go!','Parti du Travail de Belgique - Gauche d\'Ouverture!','#e8312a'),(12,'socialistische partij anders','SP.A','#e20025'),(13,'Vlaams Belang','Vlaams Belang','#5a9fc1');
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

-- Dump completed on 2017-01-09 17:05:33
