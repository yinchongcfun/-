# Host: localhost  (Version: 5.5.53)
# Date: 2017-08-28 17:48:29
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tbadmin"
#

CREATE TABLE `tbadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tbadmin"
#

INSERT INTO `tbadmin` VALUES (1,'admin','admin');

#
# Structure for table "tballgrade"
#

CREATE TABLE `tballgrade` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `usergrade` varchar(255) DEFAULT NULL,
  `pici` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COMMENT='用户成绩表';

#
# Data for table "tballgrade"
#

INSERT INTO `tballgrade` VALUES (164,'7','0','2');

#
# Structure for table "tbcheckbox"
#

CREATE TABLE `tbcheckbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `pici` int(11) DEFAULT NULL,
  `op5` varchar(255) DEFAULT NULL,
  `op6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "tbcheckbox"
#

INSERT INTO `tbcheckbox` VALUES (1,'小猫喜欢吃什么1','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','豹子'),(2,'小猫喜欢吃什么2','鱼','鱼','鱼','鱼','1,2,3',2,'老鼠','豹子'),(4,'小猫喜欢吃什么3','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(5,'小猫喜欢吃什么4','鱼','鱼','鱼','鱼','1,2,3',2,'豹子','老鼠'),(6,'小猫喜欢吃什么5','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(7,'小猫喜欢吃什么6','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(8,'小猫喜欢吃什么7','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(9,'小猫喜欢吃什么8','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(10,'小猫喜欢吃什么9','鱼','鱼','鱼','鱼','1,5,6',2,'豹子','老鼠'),(11,'小猫喜欢吃什么10','鱼','鱼','鱼','鱼','2,3,4',2,'豹子','老鼠'),(12,'小猫喜欢吃什么11','鱼','鱼','鱼','鱼','4,5,6',2,'豹子','老鼠'),(13,'小猫喜欢吃什么12','鱼','鱼','鱼','鱼','3,5',2,'豹子','老鼠'),(14,'小猫喜欢吃什么13','鱼','鱼','鱼','鱼','5,6',2,'豹子','老鼠'),(15,'小猫喜欢吃什么14','鱼','鱼','鱼','鱼','1,6',2,'豹子','老鼠'),(16,'小猫喜欢吃什么15','鱼','鱼','鱼','鱼','2,4',2,'豹子','老鼠'),(17,'小猫喜欢吃什么16','鱼','鱼','鱼','鱼','5,6',2,'豹子','老鼠'),(18,'小猫喜欢吃什么17','鱼','鱼','鱼','鱼','1,2',2,'豹子','老鼠'),(19,'小猫喜欢吃什么18','鱼','鱼','鱼','鱼','3,5',2,'豹子','老鼠'),(20,'小猫喜欢吃什么19','鱼','鱼','鱼','鱼','2,4,5',2,'豹子','老鼠'),(21,'小猫喜欢吃什么20','鱼','鱼','鱼','鱼','2,3',2,'豹子','老鼠');

#
# Structure for table "tbconfig"
#

CREATE TABLE `tbconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tixingid` int(11) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "tbconfig"
#

INSERT INTO `tbconfig` VALUES (1,1,'5','1','单项选择'),(2,2,'5','1','多项选择'),(3,3,'10','1','判断题');

#
# Structure for table "tbconfig2"
#

CREATE TABLE `tbconfig2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timespan` int(11) DEFAULT NULL,
  `pici` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tbconfig2"
#

INSERT INTO `tbconfig2` VALUES (1,30,'2');

#
# Structure for table "tbpanduan"
#

CREATE TABLE `tbpanduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `pici` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "tbpanduan"
#

INSERT INTO `tbpanduan` VALUES (1,'java最烂吗','1',2),(2,'php最好吗','1',2),(3,'python最烂吗','1',2),(4,'php最好吗','1',2),(5,'php最好吗','1',2),(6,'php最好吗','1',2),(7,'php最好吗','1',2);

#
# Structure for table "tbradio"
#

CREATE TABLE `tbradio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `pici` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='单选题';

#
# Data for table "tbradio"
#

INSERT INTO `tbradio` VALUES (3,'小猪吃什么1','饭','屎','空气','水果','1',2),(4,'小猪吃什么2','饭','屎','空气','水果','2',2),(5,'小猪吃什么3','饭','屎','空气','水果','3',2),(6,'小猪吃什么4','饭','屎','空气','水果','4',2),(7,'小猪吃什么5','饭','屎','空气','水果','1',2),(8,'小猪吃什么6','饭','屎','空气','水果','2',2),(9,'小猪吃什么7','饭','屎','空气','水果','3',2),(10,'小猪吃什么8','饭','屎','空气','水果','4',2),(11,'小猪吃什么9','饭','屎','空气','水果','1',2),(12,'小猪吃什么10','饭','屎','空气','水果','2',2),(13,'小猪吃什么11','饭','屎','空气','水果','2',2),(14,'小猪吃什么12','饭','屎','空气','水果','2',2),(15,'小猪吃什么13','饭','屎','空气','水果','2',2),(16,'小猪吃什么14','饭','屎','空气','水果','2',2),(17,'小猪吃什么15','饭','屎','空气','水果','2',2),(18,'小猪吃什么17','饭','屎','空气','水果','3',2),(19,'小猪吃什么18','饭','屎','空气','水果','3',2),(20,'小猪吃什么19','饭','屎','空气','水果','3',2),(21,'小猪吃什么16','饭','屎','空气','水果','3',2),(22,'小猪吃什么20','饭','屎','空气','水果','3',2),(23,'小猪吃什么21','饭','屎','空气','水果','4',2),(26,'单选1234','1','2','3','4','2',3),(27,'单选1234','1','2','3','4','2',3),(28,'单选1234','1','2','3','4','2',3),(29,'单选1234','1','2','3','4','2',3),(30,'单选1234','1','2','3','4','2',3),(31,'单选1234','1','2','3','4','2',3),(32,'单选1234','1','2','3','4','2',3);

#
# Structure for table "tbshijuan"
#

CREATE TABLE `tbshijuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tixing` int(11) DEFAULT NULL,
  `tihaoid` int(11) DEFAULT NULL,
  `pici` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tbshijuan"
#

INSERT INTO `tbshijuan` VALUES (1,1,1,1,221);

#
# Structure for table "tbuser"
#

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) DEFAULT NULL,
  `usertruename` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpwd` varchar(255) DEFAULT '123456',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "tbuser"
#

INSERT INTO `tbuser` VALUES (1,'政治部','1','admin','123456'),(5,'小方步','5','123456','123456'),(6,'小方步','6','123','111111'),(7,'小方步','7','456','123');

#
# Structure for table "tbusergrade"
#

CREATE TABLE `tbusergrade` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `pici` varchar(255) DEFAULT NULL,
  `shitiid` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL COMMENT '用户提交答案',
  `shititype` varchar(255) DEFAULT NULL COMMENT '试题类型',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 COMMENT='用户提交';

#
# Data for table "tbusergrade"
#

INSERT INTO `tbusergrade` VALUES (235,'2','20','5','4','1'),(236,'2','12','5','4','2'),(237,'2','4','5','2','3'),(253,'2','4','1','4','1'),(254,'2','5','1','4','2'),(255,'2','1','1','2','3'),(276,NULL,'12',NULL,'4','1'),(277,NULL,'17',NULL,'4','2'),(278,NULL,'4',NULL,'2','3'),(279,NULL,'20',NULL,'4','1'),(280,NULL,'7',NULL,'4','2'),(281,NULL,'1',NULL,'2','3'),(282,NULL,'17',NULL,'4','1'),(283,NULL,'1',NULL,'4','2'),(284,NULL,'6',NULL,'1','3'),(285,NULL,'12',NULL,'3','1'),(286,NULL,'14',NULL,'3','2'),(287,NULL,'5',NULL,'2','3'),(288,NULL,'17',NULL,'4','1'),(289,NULL,'5',NULL,'4','2'),(290,NULL,'6',NULL,'1','3');
