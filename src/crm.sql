DROP TABLE IF EXISTS `dsp_ad`;
CREATE TABLE `dsp_ad` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `name` VARCHAR(255) NOT NULL  COMMENT '广告标示名',
  `prio` tinyint (4) NOT NULL  DEFAULT '10' COMMENT '优先级,0-9,0为最高优先级',
  `push_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推送开关,1:推送,0:关闭',
  `push_method` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推送方式,1:定向,0:普推',
  `begin_time` INT(11) NOT NULL DEFAULT '0' comment '起始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' comment '结束时间',
  `set_num` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '投放数量,单位个,0表示不限量',
  `url` VARCHAR (1024) NOT NULL DEFAULT '' COMMENT '投放链接,落地页',
  `push_num` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '投放统计,单位个',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `dsp_ad` WRITE;
INSERT INTO `dsp_ad` VALUES (1,'测试需求1',0,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (2,'测试需求2',1,1,1,'1474259075','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (3,'测试需求3',2,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (4,'测试需求4',3,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (5,'测试需求5',4,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (6,'测试需求6',5,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (7,'测试需求7',6,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
INSERT INTO `dsp_ad` VALUES (8,'测试需求8',7,0,0,'1474239091','1476800947',10,'http://219.234.83.60/ad/qunar.html',0);
UNLOCK TABLES;

DROP TABLE IF EXISTS `dsp_domain`;
CREATE TABLE `dsp_domain` (
  `id`       tinyint(4)   unsigned  NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ad_id`     tinyint(4)   unsigned  NOT NULL                COMMENT '广告id,和dsp_ad中id映射',
  `domain`   VARCHAR(1024)          NOT NULL DEFAULT ''     COMMENT '域名',
  `push_num` int    (32)  unsigned  NOT NULL DEFAULT '0'    COMMENT '投放统计,单位个',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
LOCK TABLES `dsp_domain` WRITE;
INSERT INTO `dsp_domain` VALUES (1,2,'http://pangolinnet.com/',0);
INSERT INTO `dsp_domain` VALUES (2,2,'http://navi.pangolinnet.com/',0);
INSERT INTO `dsp_domain` VALUES (3,2,'http://192.168.0.99/~liudeshan/',0);
UNLOCK TABLES;

DROP TABLE IF EXISTS `dsp_users`;
CREATE TABLE `dsp_users` (
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
LOCK TABLES `dsp_users` WRITE;
INSERT INTO `dsp_users` VALUES (5,5,0,'xd','dc483e80a7a0bd9ef71d8cf973673924','冬哥',1468038500,1470124752,'127.0.0.1','192.168.0.128',24,'kk@haiyaotech.com','15915492613',0,0,0,0);
UNLOCK TABLES;

