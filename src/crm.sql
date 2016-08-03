-- MySQL dump 10.13  Distrib 5.7.10, for osx10.9 (x86_64)
--
-- Host: localhost    Database: thinkphp
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `think_auth_group`
--

DROP TABLE IF EXISTS `think_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态 0-禁用 1-正常',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_auth_group`
--

LOCK TABLES `think_auth_group` WRITE;
/*!40000 ALTER TABLE `think_auth_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_auth_group_access`
--

DROP TABLE IF EXISTS `think_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_auth_group_access`
--

LOCK TABLES `think_auth_group_access` WRITE;
/*!40000 ALTER TABLE `think_auth_group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_auth_rule`
--

DROP TABLE IF EXISTS `think_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '规则状态 0-禁用 1-正常',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_auth_rule`
--

LOCK TABLES `think_auth_rule` WRITE;
/*!40000 ALTER TABLE `think_auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_data`
--

DROP TABLE IF EXISTS `think_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_data` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_data`
--

LOCK TABLES `think_data` WRITE;
/*!40000 ALTER TABLE `think_data` DISABLE KEYS */;
INSERT INTO `think_data` VALUES (1,'thinkphp'),(2,'php'),(3,'framework');
/*!40000 ALTER TABLE `think_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_gather_day`
--

DROP TABLE IF EXISTS `think_gather_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_gather_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL COMMENT '日期',
  `aim` double(10,2) NOT NULL COMMENT '目标收益',
  `reality` double(10,2) NOT NULL COMMENT '实际收益',
  `explain` varchar(200) DEFAULT NULL COMMENT '备注',
  `gid` int(11) NOT NULL COMMENT '业务ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COMMENT='日收益';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_gather_day`
--

LOCK TABLES `think_gather_day` WRITE;
/*!40000 ALTER TABLE `think_gather_day` DISABLE KEYS */;
INSERT INTO `think_gather_day` VALUES (1,'2016-05-30',10000.00,7428.17,'',2),(6,'2016-06-02',10000.00,6707.47,NULL,2),(3,'2016-06-01',10000.00,7793.31,NULL,2),(2,'2016-05-31',10000.00,7895.65,'',2),(7,'2016-06-03',10000.00,7886.55,NULL,2),(8,'2016-06-04',10000.00,14048.04,NULL,2),(9,'2016-06-05',10000.00,15099.82,NULL,2),(10,'2016-06-06',10000.00,8389.23,'',2),(11,'2016-06-07',10000.00,6717.47,NULL,2),(12,'2016-06-08',10000.00,7743.31,NULL,2),(13,'2016-06-09',10000.00,7795.65,'',2),(14,'2016-06-10',10000.00,7986.55,NULL,2),(15,'2016-06-11',10000.00,12048.04,NULL,2),(16,'2016-06-12',10000.00,15199.82,NULL,2),(17,'2016-06-13',10000.00,6777.47,NULL,2),(18,'2016-06-14',10000.00,7713.31,NULL,2),(19,'2016-06-15',10000.00,7805.65,'',2),(20,'2016-06-16',10000.00,7846.55,NULL,2),(21,'2016-06-17',10000.00,14648.04,NULL,2),(22,'2016-06-18',10000.00,15199.82,NULL,2),(23,'2016-06-19',10000.00,6700.47,NULL,2),(24,'2016-06-20',10000.00,7791.31,NULL,2),(25,'2016-06-21',10000.00,7899.65,'',2),(26,'2016-06-22',10000.00,7876.55,NULL,2),(27,'2016-06-23',10000.00,14148.04,NULL,2),(28,'2016-06-24',10000.00,15199.82,NULL,2),(29,'2016-06-25',10000.00,6717.47,NULL,2),(30,'2016-06-26',10000.00,7793.11,NULL,2),(31,'2016-06-27',10000.00,7895.65,'',2),(32,'2016-06-28',10000.00,7836.55,NULL,2),(33,'2016-06-29',10000.00,14098.04,NULL,2),(34,'2016-06-30',10000.00,15019.82,NULL,2),(35,'2016-07-01',10000.00,6703.47,NULL,2),(36,'2016-07-02',10000.00,7798.31,NULL,2),(37,'2016-07-03',10000.00,7894.65,'',2),(38,'2016-07-04',10000.00,7886.55,NULL,2),(39,'2016-07-05',10000.00,14018.04,NULL,2),(40,'2016-07-06',10000.00,15019.82,NULL,2),(41,'2016-07-07',10000.00,6747.47,NULL,2),(42,'2016-07-08',10000.00,7795.31,NULL,2),(43,'2016-07-09',10000.00,7895.65,'',2),(44,'2016-07-10',10000.00,7886.55,NULL,2),(45,'2016-07-11',10000.00,14038.04,NULL,2),(46,'2016-07-12',10000.00,15199.82,NULL,2);
/*!40000 ALTER TABLE `think_gather_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_users`
--

DROP TABLE IF EXISTS `think_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_users` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `companyid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '公司id',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '父id',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` char(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `regdate` int(10) unsigned NOT NULL COMMENT '注册时间',
  `lastdate` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后一次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `vip` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否会员',
  `overduedate` int(11) NOT NULL DEFAULT '0' COMMENT '账户过期时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态-用于软删除',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_users`
--

LOCK TABLES `think_users` WRITE;
/*!40000 ALTER TABLE `think_users` DISABLE KEYS */;
INSERT INTO `think_users` VALUES (5,5,0,'shan275','dc483e80a7a0bd9ef71d8cf973673924','欧耶山哥',1468038500,1470124752,'127.0.0.1','192.168.0.128',24,'cooper@haiyaotech.com','15915492613',0,0,0,0);
/*!40000 ALTER TABLE `think_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-03 13:06:28
