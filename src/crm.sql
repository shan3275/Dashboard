DROP TABLE IF EXISTS `kq_person_info`;
CREATE TABLE `kq_person_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `mac`  varchar(20) NOT NULL COMMENT 'MAC 地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='个人信息';

LOCK TABLES `kq_person_info` WRITE;
INSERT INTO `kq_person_info` VALUES (1,'刘德山','80:e6:50:00:ec:26');
INSERT INTO `kq_person_info` VALUES (2,'刘德山phone','cc:29:f5:8a:88:68');
UNLOCK TABLES;

DROP TABLE IF EXISTS `kq_day`;

CREATE TABLE `kq_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL COMMENT '日期',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `mac`  varchar(20) NOT NULL COMMENT 'MAC 地址',
  `work_on_time` time NOT NULL COMMENT '工作开始时间',
  `work_off_time` time NOT NULL COMMENT '工作结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='日考勤';

LOCK TABLES `kq_day` WRITE;
INSERT INTO `kq_day` VALUES (1,'2016-08-26','刘德山','80:e6:50:00:ec:26', '09:10:04', '21:10:04');
INSERT INTO `kq_day` VALUES (2,'2016-08-26','刘德山phone','cc:29:f5:8a:88:68', '09:11:04', '21:14:04');
UNLOCK TABLES;

DROP TABLE IF EXISTS `kq_users`;
CREATE TABLE `kq_users` (
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

LOCK TABLES `kq_users` WRITE;
INSERT INTO `kq_users` VALUES (5,5,0,'shan275','dc483e80a7a0bd9ef71d8cf973673924','欧耶山哥',1468038500,1470124752,'127.0.0.1','192.168.0.128',24,'cooper@haiyaotech.com','15915492613',0,0,0,0);
UNLOCK TABLES;
