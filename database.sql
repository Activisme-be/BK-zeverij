--
-- Host: localhost    Database: activisme_be
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.20-MariaDB
-- Host: activisme.be.mysql:3306
-- Generation Time: Jan 26, 2017 at 01:46 AM
-- Server version: 5.5.53-MariaDB-1~wheezy
-- PHP Version: 5.4.45-0+deb7u6

SET SQL_MODE  = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
-- Database: `activisme_be`
--
DROP DATABASE IF EXISTS activisme_be;
CREATE DATABASE activisme_be DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE activisme_be;

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS abilities;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS abilities (
    PRIMARY KEY (id),
    id          INT(11)       NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)  DEFAULT NULL,
    description VARCHAR(255)  DEFAULT NULL,
    created_at  TIMESTAMP     NULL DEFAULT NULL,
    updated_at  TIMESTAMP     NULL DEFAULT NULL,
    deleted_at  TIMESTAMP     NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

DROP TABLE IF EXISTS bans;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS bans (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    reason      TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS notifications;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS notifications (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    creator_id  INT(11)         NULL DEFAULT NULL,
    deliver_id  INT(11)         NULL DEFAULT NULL,
    is_read     VARCHAR(1)      NOT NULL DEFAULT 'N',
    message     VARCHAR(255)    NULL DEFAULT NULL,
    sub_message VARCHAR(255)    NULL DEFAULT NULL,
    link        VARCHAR(255)    NULL DEFAULT NULL,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
    deleted_at  TIMESTAMP       NULL DEFAULT NULL,
    CONSTRAINT  fk_creator      FOREIGN KEY (creator_id) REFERENCES users(id),
    CONSTRAINT  fk_deliver      FOREIGN KEY (deliver_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS categories;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS categories (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    creator_id  INT(11)     DEFAULT NULL,
    category    VARCHAR(40) DEFAULT NULL,
    module      VARCHAR(40) DEFAULT NULL,
    description TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_creator_categoy FOREIGN KEY (creator_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `gov_members`
--

DROP TABLE IF EXISTS gov_members;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS gov_members (
    PRIMARY KEY (id),
    id          INT(11)       NOT NULL AUTO_INCREMENT,
    Name        VARCHAR(255)  DEFAULT NULL,
    Function    VARCHAR(255)  DEFAULT NULL,
    Union_id    INT(11)       DEFAULT NULL,
    Information VARCHAR(500)  DEFAULT NULL,
    photo       VARCHAR(255)  DEFAULT NULL,
    created_at  TIMESTAMP     NULL DEFAULT NULL,
    updated_at  TIMESTAMP     NULL DEFAULT NULL,
    deleted_at  TIMESTAMP     NULL DEFAULT NULL,
    CONSTRAINT  fk_union      FOREIGN KEY (union_id) REFERENCES gov_unions(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Dumping data for table `gov_members`
--

LOCK TABLES gov_members WRITE;

/*!40000 ALTER TABLE `gov_members` DISABLE KEYS */;
INSERT INTO gov_members (Name, Function, Union_id, Information, photo)
     VALUES ('Charles Michel', 'Eerste Minister', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_charles_michel', 'charles_michel.jpg'),
            ('Kris Peeters', 'Vice-eersteminister en minister van Werk, Economie en Consumenten, belast met Buitenlandse Handel', 1, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_kris_peeters', 'kris_peeters.jpg'),
            ('Jan Jambon', 'Vice-eersteminister en minister van Veiligheid en Binnenlandse Zaken, belast met de Regie der gebouwen', 7, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_jan_jambon', 'jan_jambon.jpg'),
            ('Alexander De Croo', 'Ontwikkelingssamenwerking, Digitale Agenda, Telecommunicatie en Post', 8, 'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_alexander#_de#_croo', 'alexander_de_croo.jpg'),
            ('Didier Reynders', 'Vice-eersteminister en minister van Buitenlandse Zaken en Europese Zaken, belast met Beliris en de Federale Culturele Instellingen', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_didier_reynders', 'didier_reynders.jpg'),
            ('Koen Geens', 'Minister van Justitie', 1, 'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_koen#_geens', 'koen_geens.jpg'),
            ('Maggie De Block', 'Minister van Sociale Zaken en Volksgezondheid', 8, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_maggie_de_block', 'maggie_de_block.jpg'),
            ('Daniel Bacquelaine', 'Minister van Pensioenen', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_daniel_bacquelaine', 'daniel_bacquelaine.jpg'),
            ('Johan Van Overtveldt', 'Minister van Financien, belast met Bestrijding van de fiscale fraude', 7, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_johan_van_overtveldt', 'johan_van_overtveldt.jpg'),
            ('Willy Borsus', "Minister van Middenstand, Zelfstandigen, KMO's, Landbouw en Maatschappelijke Integratie", 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_willy_borsus', 'willy_borsus.jpg'),
            ('Marie Christine Marghem', 'Minister van Energie, Leefmilieu en Duurzame Ontwikkeling', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_marie_christine_marghem', 'Marie-christine_marghem.jpg'),
            ('Steven Vandeput', 'Minister van Defensie, belast met Ambtenarenzaken', 7, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_steven_vandeput', 'steven_vandeput.jpg'),
            ('Sophie Wilmes', 'Minister van Begroting, belast met de Nationale Loterij', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_sophie_wilmes', 'sophie_wilmes_1.jpg'),
            ('Francois Bellot', 'Minister van Mobiliteit, belast met Belgocontrol en de Nationale Maatschappij der Belgische Spoorwegen', 6, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_francois_bellot', 'bellot.jpg'),
            ('Pieter De Crem', 'Staatssecretaris voor Buitenlandse Handel, toegevoegd aan de minister belast met Buitenlandse Handel', 1, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_pieter_de_crem', 'Pieter_de_crem.jpg'),
            ('Elke Sleurs', 'Staatssecretaris voor Armoedebestrijding, Gelijke Kansen, Personen met een beperking, en Wetenschapsbeleid, belast met Grote Steden, toegevoegd aan de minister van Financien', 7, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_elke_sleurs', 'Elke_Sleurs.jpg'),
            ('Theo Francken', 'Staatssecretaris voor Asiel en Migratie, belast met Administratieve Vereenvoudiging, toegevoegd aan de minister van Veiligheid en Binnenlandse Zaken', 7, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_theo_francken', 'theo_francken.jpg'),
            ('Philipple De Backer', 'Staatssecretaris voor Bestrijding van de sociale fraude, Privacy en Noordzee, toegevoegd aan de minister van Sociale Zaken en Volksgezondheid', 8, 'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_philippe_de_backer', 'de_backer.jpg');

/*!40000 ALTER TABLE `gov_members` ENABLE KEYS */;

UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `gov_unions`
--

DROP TABLE IF EXISTS gov_unions;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS gov_unions (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    name_full   VARCHAR(255)    DEFAULT NULL,
    name_abbr   VARCHAR(255)    DEFAULT NULL,
    color       VARCHAR(10)     DEFAULT NULL,
    label       VARCHAR(255)    DEFAULT NULL,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
    deleted_at  TIMESTAMP       NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Dumping data for table `gov_unions`
--

LOCK TABLES gov_unions WRITE;

/*!40000 ALTER TABLE `gov_unions` DISABLE KEYS */;
INSERT INTO gov_unions (name_full, name_abbr, color, label)
     VALUES ('Christen-Democratisch & Vlaams', 'CD&V', '#f47d2a', 'label-cdv'),
            ('Centre Democrate Humaniste', 'cdH', '#b64330', 'label-cdh'),
            ("Ecologistes Confederes pour l' Organisation de Luttes Originales", 'ECOLO', '#8cc63f', 'label-ecolo'),
            ('Federalistes Democrates Francophones', 'FDF', '#cb0167', 'label-fdf'),
            ('Groen!', 'Groen', '#008479', 'label-groen'),
            ('Mouvement Reformateur', 'MR', '#044679', 'label-mr'),
            ('Nieuw-Vlaamse Alliantie', 'N-VA', '#f9b919', 'label-nva'),
            ('Open Vlaamse Liberalen en Democraten', 'Open VLD', '#275ca5', 'label-ovld'),
            ('Parti Populaire', 'PP', '#773179', 'label-pp'),
            ('Parti socialiste', 'PS', '#ff0000', 'label-ps'),
            ("Parti du Travail de Belgique - Gauche d' Ouverture!", 'ptb-go!', '#e8312a', 'label-ptbgo'),
            ('Socialistische partij anders', 'SP.A', '#e20025', 'label-spa'),
            ('Vlaams Belang', 'Vlaams Belang', '#5a9fc1', 'label-vb');
/*!40000 ALTER TABLE `gov_unions` ENABLE KEYS */;

UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `login_abilities`
--

DROP TABLE IF EXISTS login_abilities;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS login_abilities (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    login_id    INT(11)     DEFAULT NULL,
    ability_id  INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_abilities        FOREIGN KEY (ability_id) REFERENCES abilities(id),
    CONSTRAINT  fk_abilities_login  FOREIGN KEY (login_id)   REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `login_permissions`
--

DROP TABLE IF EXISTS login_permissions;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS login_permissions (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    permissions_id  INT(11)     DEFAULT NULL,
    login_id        INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL,
    deleted_at      TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT      fk_permissions       FOREIGN key (permissions_id) REFERENCES permissions(id),
    CONSTRAINT      fk_permissions_login FOREIGN KEY (login_id)       REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Dumping data for table `login_permissions`
--

LOCK TABLES login_permissions WRITE;

/*!40000 ALTER TABLE `login_permissions` DISABLE KEYS */;
INSERT INTO login_permissions (permissions_id, login_id)
     VALUES (1, 1);
/*!40000 ALTER TABLE `login_permissions` ENABLE KEYS */;

UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `new_items`
--

DROP TABLE IF EXISTS new_items;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS new_items (
    PRIMARY KEY (id),
    id          INT(10)         NOT NULL AUTO_INCREMENT,
    creator_id  INT(11)         DEFAULT NULL,
    heading     VARCHAR(255)    NULL DEFAULT NULL,
    message     TEXT,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
    deleted_at  TIMESTAMP       NULL DEFAULT NULL,
    CONSTRAINT  fk_news_creator FOREIGN KEY (creator_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

DROP TABLE IF EXISTS news_comments;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS news_comments (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    user_id     INT(11)     DEFAULT NULL,
    comment     TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_comment_creator  FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS permissions;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS permissions (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)    DEFAULT NULL,
    description TEXT,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
    deleted_at  TIMESTAMP       NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Dumping data for table `permissions`
--

LOCK TABLES permissions WRITE;

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO permissions (name, description)
     VALUES ('admin', 'The administrator role for the application.'),
            ('guest', 'The normal permissions role for the application,');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_comments`
--

DROP TABLE IF EXISTS pivot_comments;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS pivot_comments (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    post_id     INT(11)     DEFAULT NULL,
    comment_id  INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_news_item    FOREIGN KEY (post_id)    REFERENCES new_items(id),
    CONSTRAINT  fk_item_comment FOREIGN KEY (comment_id) REFERENCES news_comments(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_items`
--

DROP TABLE IF EXISTS pivot_items;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS pivot_items (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    sportsmen_id    INT(11)     DEFAULT NULL,
    item_id         INT(11)     DEFAULT NULL,
    creator_id      INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL,
    deleted_at      TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT      fk_gov_member       FOREIGN KEY (sportsmen_id)  REFERENCES gov_members(id),
    CONSTRAINT      fk_item_gov_member  FOREIGN KEY (item_id)       REFERENCES new_items(id),
    CONSTRAINT      fk_item_creator     FOREIGN KEY (creator_id)    REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_news_categories`
--

DROP TABLE IF EXISTS pivot_news_categories;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS pivot_news_categories (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    category_id INT(11)     DEFAULT NULL,
    news_id     INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    deleted_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_categories       FOREIGN KEY (category_id) REFERENCES categories(id),
    CONSTRAINT  fk_category_news    FOREIGN KEY (news_id)     REFERENCES new_items(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pivot_helpdesk_category`
--
DROP TABLE IF EXISTS pivot_helpdesk_category;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE pivot_helpdesk_category (
    PRIMARY KEY (id),
    id              INT(11)       NOT NULL AUTO_INCREMENT,
    ticket_id       INT(11)       DEFAULT NULL,
    category_id     INT(11)       DEFAULT NULL,
    created_at      TIMESTAMP     NULL DEFAULT NULL,
    updated_at      TIMESTAMP     NULL DEFAULT NULL,
    CONSTRAINT      fk_ticket           FOREIGN KEY (ticket_id)     REFERENCES tickets(id),
    CONSTRAINT      fk_ticket_category  FOREIGN KEY (category_id)   REFERENCES categories(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `pivot_ranking`
--

DROP TABLE IF EXISTS pivot_ranking;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS pivot_ranking (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    sportsmen_id    INT(11)     DEFAULT NULL,
    item_id         INT(11)     DEFAULT NULL,
    user_id         INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT      fk_ranking_member   FOREIGN KEY (sportsmen_id) REFERENCES gov_members(id),
    CONSTRAINT      fk_vote_id          FOREIGN KEY (item_id)      REFERENCES points(id),
    CONSTRAINT      fk_voter            FOREIGN KEY (user_id)      REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_reaction_report`
--

DROP TABLE IF EXISTS pivot_reaction_report;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS pivot_reaction_report (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    comment_id  INT(11)     DEFAULT NULL,
    report_id   INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_report_comment   FOREIGN KEY (comment_id)    REFERENCES news_comments(id),
    CONSTRAINT  fk_report_creator   FOREIGN KEY (report_id)     REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS points;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS points (
    PRIMARY KEY (id),
    id              INT(11)         NOT NULL AUTO_INCREMENT,
    creator_id      INT(11)         DEFAULT NULL,
    sportsmen_id    INT(11)         DEFAULT NULL,
    status          INT(11)         DEFAULT NULL,
    point           VARCHAR(255)    DEFAULT NULL,
    media_url       VARCHAR(255)    DEFAULT NULL,
    description     TEXT,
    created_at      TIMESTAMP       NULL DEFAULT NULL,
    updated_at      TIMESTAMP       NULL DEFAULT NULL,
    CONSTRAINT      fk_point_creator        FOREIGN KEY(creator_id)   REFERENCES users(id),
    CONSTRAINT      fk_point_gov_member     FOREIGN KEY(sportsmen_id) REFERENCES gov_members(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `reactions_reports`
--


DROP TABLE IF EXISTS reactions_reports;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS reactions_reports (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    user_id     INT(11)     DEFAULT NULL,
    reason      TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
    CONSTRAINT  fk_report_reaction_author   FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS sessions;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS sessions (
    PRIMARY KEY (id, ip_address),
    id          VARCHAR(128) NOT NULL,
    ip_address  VARCHAR(45) NOT NULL,
    TIMESTAMP   INT(10) unsigned NOT NULL DEFAULT '0',
    data        BLOB NOT NULL,
                KEY ci_sessions_TIMESTAMP(TIMESTAMP)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS tickets;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS tickets (
    PRIMARY KEY (id),
    id            INT(11)         NOT NULL AUTO_INCREMENT,
    creator_id    INT(11)         NULL DEFAULT NULL,
    status        VARCHAR(255)    NULL DEFAULT NULL,
    publish       VARCHAR(50)     NULL DEFAULT NULL,
    title         VARCHAR(255)    DEFAULT NULL,
    export_github VARCHAR(10)     NOT NULL DEFAULT 'N',
    description   TEXT,
    created_at    TIMESTAMP       NULL DEFAULT NULL,
    updated_at    TIMESTAMP       NULL DEFAULT NULL,
    deleted_at    TIMESTAMP       NULL DEFAULT NULL,
    CONSTRAINT  fk_ticket_creator   FOREIGN KEY (creator_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS users;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS users (
    PRIMARY KEY (id),
    id              INT(11)         NOT NULL AUTO_INCREMENT,
    ban_id          INT(11)         DEFAULT '0',
    avatar          VARCHAR(255)    DEFAULT NULL,
    avatar_name     VARCHAR(255)    DEFAULT NULL,
    username        VARCHAR(255)    DEFAULT NULL,
    name            VARCHAR(255)    DEFAULT NULL,
    blocked         VARCHAR(1)      DEFAULT NULL,
    password        VARCHAR(125)    DEFAULT NULL,
    email           VARCHAR(255)    DEFAULT NULL,
    updated_at      TIMESTAMP NULL  DEFAULT NULL,
    created_at      TIMESTAMP NULL  DEFAULT NULL,
    deleted_at      TIMESTAMP NULL  DEFAULT NULL,
    CONSTRAINT      fk_ban_users    FOREIGN KEY(ban_id) REFERENCES bans(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

-- --------------------------------------------------------

--
-- Dumping data for table `permissions`
--

LOCK TABLES users WRITE;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO users (username, name, blocked, password, email)
     VALUES ('Topairy', 'Tim Joosten', 'N', MD5('root1995'), 'Topairy@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

UNLOCK TABLES;

-- --------------------------------------------------------

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-30 11:48:10
