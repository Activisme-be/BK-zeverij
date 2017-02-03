-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: activisme.be.mysql:3306
-- Generation Time: Jan 26, 2017 at 01:46 AM
-- Server version: 5.5.53-MariaDB-1~wheezy
-- PHP Version: 5.4.45-0+deb7u6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `activisme_be_activisme_zeverij`
--
CREATE DATABASE `activisme_be_activisme_zeverij` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `activisme_be_activisme_zeverij`;

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE IF NOT EXISTS abilities (
    PRIMARY KEY (id),
    id          INT(11)       NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)  DEFAULT NULL,
    description VARCHAR(255)  DEFAULT NULL,
    created_at  TIMESTAMP     NULL DEFAULT NULL,
    updated_at  TIMESTAMP     NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE IF NOT EXISTS bans (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    reason      TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS categories (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    creator_id  INT(11)     DEFAULT NULL,
    category    VARCHAR(40) DEFAULT NULL,
    description TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gov_members`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gov_unions`
--

CREATE TABLE IF NOT EXISTS gov_unions (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    name_full   VARCHAR(255)    DEFAULT NULL,
    name_abbr   VARCHAR(255)    DEFAULT NULL,
    color       VARCHAR(10)     DEFAULT NULL,
    label       VARCHAR(255)    DEFAULT NULL,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_abilities`
--

CREATE TABLE IF NOT EXISTS login_abilities (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    login_id    INT(11)     DEFAULT NULL,
    ability_id  INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_permissions`
--

CREATE TABLE IF NOT EXISTS login_permissions (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    permissions_id  INT(11)     DEFAULT NULL,
    login_id        INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_items`
--

CREATE TABLE IF NOT EXISTS new_items (
    PRIMARY KEY (id),
    id          INT(10)         NOT NULL AUTO_INCREMENT,
    heading     TIMESTAMP(255)  DEFAULT NULL,
    message     TEXT,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
    creator_id  INT(11)         DEFAULT NULL,
    deleted_at  TIMESTAMP       NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE IF NOT EXISTS news_comments (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    user_id     INT(11)     DEFAULT NULL,
    comment     TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS permissions (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)    DEFAULT NULL,
    description TEXT,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_comments`
--

CREATE TABLE IF NOT EXISTS pivot_comments (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    post_id     INT(11)     DEFAULT NULL,
    comment_id  INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_items`
--

CREATE TABLE IF NOT EXISTS pivot_items (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    sportsmen_id    INT(11)     DEFAULT NULL,
    item_id         INT(11)     DEFAULT NULL,
    creator_id      INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_news_categories`
--

CREATE TABLE IF NOT EXISTS pivot_news_categories (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    category_id INT(11)     DEFAULT NULL,
    news_id     INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_ranking`
--

CREATE TABLE IF NOT EXISTS pivot_ranking (
    PRIMARY KEY (id),
    id              INT(11)     NOT NULL AUTO_INCREMENT,
    sportsmen_id    INT(11)     DEFAULT NULL,
    created_at      TIMESTAMP   NULL DEFAULT NULL,
    updated_at      TIMESTAMP   NULL DEFAULT NULL,
    item_id         INT(11)     DEFAULT NULL,
    user_id         INT(11)     DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_reaction_report`
--

CREATE TABLE IF NOT EXISTS pivot_reaction_report (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    comment_id  INT(11)     DEFAULT NULL,
    report_id   INT(11)     DEFAULT NULL,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poINTs`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reactions_reports`
--

CREATE TABLE IF NOT EXISTS reactions_reports (
    PRIMARY KEY (id),
    id          INT(11)     NOT NULL AUTO_INCREMENT,
    user_id     INT(11)     DEFAULT NULL,
    reason      TEXT,
    created_at  TIMESTAMP   NULL DEFAULT NULL,
    updated_at  TIMESTAMP   NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS sessions (
    PRIMARY KEY (id, ip_address),
    id          VARCHAR(128) NOT NULL,
    ip_address  VARCHAR(45) NOT NULL,
    TIMESTAMP   INT(10) unsigned NOT NULL DEFAULT '0',
    data        BLOB NOT NULL,
                KEY ci_sessions_TIMESTAMP(TIMESTAMP)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS tickets (
    PRIMARY KEY (id),
    id          INT(11)         NOT NULL AUTO_INCREMENT,
    title       VARCHAR(255)    DEFAULT NULL,
    description TEXT,
    created_at  TIMESTAMP       NULL DEFAULT NULL,
    updated_at  TIMESTAMP       NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
