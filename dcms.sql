/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.14-log : Database - dcms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dcms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dcms`;

/*Table structure for table `dc_admin` */

DROP TABLE IF EXISTS `dc_admin`;

CREATE TABLE `dc_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `userpwd` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `headpic` varchar(250) NOT NULL DEFAULT 'admin.png',
  `roles` varchar(250) NOT NULL DEFAULT '0' COMMENT '权限组合',
  `status` int(1) NOT NULL DEFAULT '3' COMMENT '用户是否在线3离线1在线2忙碌',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='后台管理用户表';

/*Data for the table `dc_admin` */

insert  into `dc_admin`(`id`,`username`,`userpwd`,`email`,`headpic`,`roles`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin@qq.com','admin.jpg','1',1),(18,'mayaren','e10adc3949ba59abbe56e057f20f883e','mayaren@qq.com','admin.png','0',3),(19,'root','63a9f0ea7bb98050796b649e85481845','root@qq.com','admin.png','5',3),(20,'notnull','3717ba13b29e535bf556c6fef4125702','notnull@qq.com','admin.png','5',3);

/*Table structure for table `dc_bclass` */

DROP TABLE IF EXISTS `dc_bclass`;

CREATE TABLE `dc_bclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '一级分类id',
  `bname` varchar(250) NOT NULL COMMENT '一级分类名',
  `pic` varchar(250) NOT NULL DEFAULT 'bclass.jpg',
  `orderno` int(11) NOT NULL DEFAULT '1' COMMENT '一级分类排序',
  `describe` text COMMENT '一级分类描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='一级分类';

/*Data for the table `dc_bclass` */

insert  into `dc_bclass`(`id`,`bname`,`pic`,`orderno`,`describe`) values (23,'机场接送用车','530c2fbaec3ca.gif',1,'机场接送用车'),(24,'酒店配套用车','530c3046282eb.gif',2,'酒店配套用车'),(25,'节庆活动用车','530c307e67b65.gif',3,'节庆活动用车'),(26,'文化体育用车','530c30e7e4f70.gif',4,'文化体育用车'),(27,'会议用车','530c3120910a1.gif',5,'会议用车'),(28,'市民用车','530c314939b75.gif',6,'市民用车');

/*Table structure for table `dc_carts` */

DROP TABLE IF EXISTS `dc_carts`;

CREATE TABLE `dc_carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `number` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=256 DEFAULT CHARSET=utf8 COMMENT='购物车';

/*Data for the table `dc_carts` */

insert  into `dc_carts`(`id`,`uid`,`fid`,`number`) values (128,22,60,1),(173,42,59,1),(193,44,146,1),(194,45,146,1),(195,46,146,1);

/*Table structure for table `dc_departments` */

DROP TABLE IF EXISTS `dc_departments`;

CREATE TABLE `dc_departments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `truename` varchar(250) NOT NULL,
  `userpwd` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '单位名称',
  `score` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `pay` varchar(200) NOT NULL,
  `email` varchar(120) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `is_discount` bigint(20) NOT NULL COMMENT '1是2否折扣',
  `phone` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `username_3` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `dc_departments` */

insert  into `dc_departments`(`id`,`username`,`truename`,`userpwd`,`name`,`score`,`credit`,`money`,`pay`,`email`,`hotel`,`is_discount`,`phone`,`address`,`about`) values (1,'crinsn','王校长','96e79218965eb72c92a549dd5a330112','杭州电子科技大学',1,1,0,'41234123123412341','test@qq.com','维多利亚。',1,'13777846637','文一路115号。','环境优雅，服务周到，干净整洁。');

/*Table structure for table `dc_driver` */

DROP TABLE IF EXISTS `dc_driver`;

CREATE TABLE `dc_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` varchar(32) NOT NULL,
  `car_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `situation` int(1) NOT NULL DEFAULT '1' COMMENT '2外出,1无外出',
  `email` varchar(120) NOT NULL,
  `pay` varchar(32) NOT NULL,
  `score` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `about_drive` varchar(255) NOT NULL,
  `favorite` int(11) NOT NULL,
  `complain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `dc_driver` */

insert  into `dc_driver`(`id`,`driver_id`,`car_id`,`username`,`password`,`name`,`driver_phone`,`situation`,`email`,`pay`,`score`,`credit`,`class`,`about_drive`,`favorite`,`complain`) values (7,'baomax6',144,'zhangsan','zhangsan','张三','12345678901',1,'','237472354',0,0,0,'1',1,'1'),(8,'baomamini',141,'lisi','dc3a8f1670d65bea69b7b65048a0ac40','李四','13662532621',1,'','37264234',0,0,0,'2',2,'2'),(9,'dajinlong',142,'wangwu','wangwu','王五','12324545651',1,'','3243245',0,0,0,'3',3,'3'),(10,'aodiq7',143,'zhaoliu','zhaoliu','赵六','12345678999',1,'','2356743',0,0,0,'4',4,'4'),(11,'baoshijiekayan',145,'zouqi','cb1af5a94b9441c2800ec99ffdf58521','邹七','12323482357',1,'','343534534',0,0,0,'5',5,'5'),(12,'benchismart',146,'xiba','e571ba0d059e3e30911daac2a78c7908','西八','18447563522',1,'','3534534',0,0,0,'6',6,'6');

/*Table structure for table `dc_evaluate` */

DROP TABLE IF EXISTS `dc_evaluate`;

CREATE TABLE `dc_evaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '车辆编号',
  `uid` int(11) NOT NULL,
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT '给车辆打分',
  `content` text COMMENT '用户评论内容',
  `posttime` bigint(32) NOT NULL,
  `lasttime` bigint(32) NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `isopen` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='用户评价';

/*Data for the table `dc_evaluate` */

insert  into `dc_evaluate`(`id`,`fid`,`uid`,`grade`,`content`,`posttime`,`lasttime`,`lastip`,`isopen`) values (32,146,1,0,'good!!',1393555737,1393555737,'',1);

/*Table structure for table `dc_foods` */

DROP TABLE IF EXISTS `dc_foods`;

CREATE TABLE `dc_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '所属分类',
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `orderno` int(11) NOT NULL DEFAULT '1' COMMENT '车辆排序',
  `describe` varchar(255) NOT NULL,
  `regtime` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1在售 2下架',
  `yprice` double DEFAULT NULL COMMENT '优惠价格',
  `start_time` bigint(20) DEFAULT NULL COMMENT '优惠开始的时间',
  `end_time` bigint(20) DEFAULT NULL COMMENT '优惠结束的时间',
  `driver_id` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COMMENT='车辆信息';

/*Data for the table `dc_foods` */

insert  into `dc_foods`(`id`,`cid`,`name`,`pic`,`price`,`orderno`,`describe`,`regtime`,`status`,`yprice`,`start_time`,`end_time`,`driver_id`) values (141,63,'宝马mini','530ca1aebc06d.jpg',40,1,'宝马mini红',1394961722,1,36,1393680830,1394631180,'baomamini'),(142,66,'大金龙','530f3938123ae.jpg',100,1,'大金龙',1393681188,1,80,1393681152,1399383540,'dajinlong'),(143,62,'奥迪Q7','530f396f76db8.jpg',50,1,'奥迪Q7',1393681219,1,40,1393681203,1400074800,'aodiq7'),(144,63,'宝马X6','530f39af9395b.jpg',50,2,'宝马X6',1393681243,1,40,1393681225,1400074800,'baomax6'),(145,64,'保时捷卡宴','530f3a027406f.jpg',60,1,'保时捷卡宴',1393681288,1,50,1393681264,1399988460,'baoshijiekayan'),(146,67,'奔驰Smart','530f3a4f5f20e.jpg',80,1,'奔驰Smart',1393681309,1,70,1393681293,1399470060,'benchismart');

/*Table structure for table `dc_forms` */

DROP TABLE IF EXISTS `dc_forms`;

CREATE TABLE `dc_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL COMMENT '车辆编号',
  `form_number` varchar(32) NOT NULL COMMENT '订单号',
  `nprice` double NOT NULL COMMENT '成交价',
  `ask` text COMMENT '订车要求',
  `foods_number` int(2) NOT NULL DEFAULT '1' COMMENT '车辆数',
  `ftime` bigint(20) NOT NULL COMMENT '订餐时间',
  `check` int(1) NOT NULL DEFAULT '1' COMMENT '稽查状态2：不通过，1：已通过',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '订单状态：1进行中，3已过期,2已完成',
  `end` varchar(20) NOT NULL,
  `start` varchar(20) NOT NULL,
  `ytime` varchar(32) NOT NULL COMMENT '年/月/日/时(24小时)/分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

/*Data for the table `dc_forms` */

insert  into `dc_forms`(`id`,`uid`,`fid`,`form_number`,`nprice`,`ask`,`foods_number`,`ftime`,`check`,`status`,`end`,`start`,`ytime`) values (229,1,144,'Dcms14111771511',36,'222222',1,1411263560,1,1,'22222','2222','222222'),(230,1,145,'Dcms14111771511',45,'222222',1,1411263560,1,1,'22222','2222','222222'),(231,1,141,'Dcms141118998820',32.4,'111111',1,1411276390,1,1,'1111','111','1111'),(232,1,144,'Dcms141118998820',36,'111111',1,1411276390,1,1,'1111','111','1111'),(233,1,145,'Dcms141118998820',45,'111111',1,1411276390,1,1,'1111','111','1111'),(234,1,146,'Dcms141118998820',63,'111111',1,1411276390,1,1,'1111','111','1111'),(235,1,141,'Dcms141337720720',32.4,'11',1,1413463611,1,1,'11','11','11'),(236,1,146,'Dcms141337720720',63,'11',1,1413463611,1,1,'11','11','11'),(237,1,141,'Dcms14133802606',32.4,'速度',1,1413466663,1,1,'速度','速度','的'),(238,1,142,'Dcms14133802606',72,'速度',1,1413466663,1,1,'速度','速度','的');

/*Table structure for table `dc_friendlinks` */

DROP TABLE IF EXISTS `dc_friendlinks`;

CREATE TABLE `dc_friendlinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `target` varchar(50) NOT NULL DEFAULT '_blank',
  `pic` varchar(200) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型1文字2图片',
  `isallow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1使用2屏蔽',
  `describe` varchar(255) NOT NULL,
  `orderno` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='友情链接';

/*Data for the table `dc_friendlinks` */

insert  into `dc_friendlinks`(`id`,`title`,`url`,`target`,`pic`,`type`,`isallow`,`describe`,`orderno`) values (41,'百度','www.baidu.com','_blank','0',1,1,'',1),(42,'新浪','www.sina.cn','_blank','0',1,1,'新浪网站',1),(47,'网易','www.163.com','_blank',NULL,1,1,'网易链接',1),(49,'腾讯','http://www.qq.com','_blank',NULL,1,1,'腾讯网站链接',1),(52,'淘宝','www.taobao.com','_parent',NULL,1,1,'淘宝',1);

/*Table structure for table `dc_hotels` */

DROP TABLE IF EXISTS `dc_hotels`;

CREATE TABLE `dc_hotels` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `truename` varchar(255) NOT NULL,
  `userpwd` varchar(32) NOT NULL,
  `star` int(11) NOT NULL,
  `discount` bigint(20) NOT NULL COMMENT '1是2否折扣',
  `receiving` bigint(20) NOT NULL COMMENT '1是2否提供接机',
  `favorite` int(11) NOT NULL,
  `scale` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `pay` varchar(200) NOT NULL,
  `about` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `dc_hotels` */

insert  into `dc_hotels`(`id`,`username`,`truename`,`userpwd`,`star`,`discount`,`receiving`,`favorite`,`scale`,`address`,`phone`,`money`,`pay`,`about`) values (2,'维多利亚','吴哈哈哈','96e79218965eb72c92a549dd5a330112',5,1,1,5,'五星级','杭州维多利亚酒店','13777846670',888888,'3412412341234123414','环境优雅，服务周到，棒。'),(8,'ruhua','','96e79218965eb72c92a549dd5a330112',0,7,1,5,'3','杭州龙翔','1232535645646',0,'34365868','好');

/*Table structure for table `dc_ip` */

DROP TABLE IF EXISTS `dc_ip`;

CREATE TABLE `dc_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_IP` bigint(23) NOT NULL,
  `end_IP` bigint(23) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='禁用IP';

/*Data for the table `dc_ip` */

insert  into `dc_ip`(`id`,`start_IP`,`end_IP`) values (30,-1062698495,-1062698494);

/*Table structure for table `dc_logs` */

DROP TABLE IF EXISTS `dc_logs`;

CREATE TABLE `dc_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id游客为0',
  `fid` int(11) NOT NULL COMMENT '用户浏览的车记录',
  `ip` bigint(20) DEFAULT NULL COMMENT '用户ip',
  `number` int(11) DEFAULT '1' COMMENT '用户访问的次数',
  `date` bigint(20) NOT NULL COMMENT '日志生成日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COMMENT='日志管理';

/*Data for the table `dc_logs` */

insert  into `dc_logs`(`id`,`uid`,`fid`,`ip`,`number`,`date`) values (131,46,146,0,1,1393844444),(130,43,146,0,1,1393664607),(129,1,144,0,1,1393579709),(128,1,0,0,12,1393683715),(127,0,0,0,8,1393603905),(118,0,141,0,16,1393829857),(119,1,141,0,19,1394001852),(120,0,146,0,22,1393751702),(121,0,145,0,8,1393686329),(122,0,143,0,1,1393510194),(123,0,144,0,2,1393686276),(124,1,146,0,15,1394001849),(125,1,145,0,4,1393998637),(126,1,143,0,2,1393567518),(132,0,146,2130706433,8,1394958143),(133,1,145,2130706433,3,1394948548),(134,1,146,2130706433,30,1394953682),(135,1,143,2130706433,1,1394343248),(136,2,146,2130706433,1,1394345696),(137,2,145,2130706433,1,1394541143),(138,1,141,2130706433,2,1394948439),(139,1,144,2130706433,2,1394953375),(140,0,143,2130706433,1,1394951870),(141,0,0,2130706433,2,1410331422),(142,0,141,2130706433,1,1411176717);

/*Table structure for table `dc_roles` */

DROP TABLE IF EXISTS `dc_roles`;

CREATE TABLE `dc_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL COMMENT '权限名字',
  `describe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

/*Data for the table `dc_roles` */

insert  into `dc_roles`(`id`,`name`,`describe`) values (1,'超级管理员','可对系统任何信息进行管理，操作表:所有表'),(2,'系统管理员','只可对站点自身非用户相关信息进行管理,操作表:friendlinks,ip,log,webconfig,notices'),(3,'车辆管理员','可对车辆相关进行操作,操作表:classes,foods'),(4,'用户管理员','对用户信息进行管理,操作表:users,admin,roles'),(5,'订单管理员','对用户订单信息进行管理,操作表:forms'),(8,'评论管理员','对用户评论信息进行管理');

/*Table structure for table `dc_sclass` */

DROP TABLE IF EXISTS `dc_sclass`;

CREATE TABLE `dc_sclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '父类id',
  `sname` varchar(250) NOT NULL,
  `orderno` int(11) NOT NULL DEFAULT '1' COMMENT '二级分类排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='二级分类';

/*Data for the table `dc_sclass` */

insert  into `dc_sclass`(`id`,`pid`,`sname`,`orderno`) values (62,28,'奥迪',1),(63,28,'宝马',2),(64,28,'保时捷',3),(69,27,'丰田',3),(66,26,'大金龙',2),(67,25,'奔驰',1),(68,25,'劳斯莱斯',2),(70,24,'法拉利',1),(71,23,'别克',1),(72,23,'本田',2);

/*Table structure for table `dc_users` */

DROP TABLE IF EXISTS `dc_users`;

CREATE TABLE `dc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `truename` varchar(250) DEFAULT NULL,
  `userpwd` char(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `headpic` varchar(255) NOT NULL DEFAULT 'headpic.jpg',
  `post` bigint(20) NOT NULL DEFAULT '1' COMMENT '1是2否允许订车',
  `regip` varchar(15) NOT NULL,
  `regtime` bigint(20) NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `lasttime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='用户基本信息表';

/*Data for the table `dc_users` */

insert  into `dc_users`(`id`,`username`,`truename`,`userpwd`,`email`,`money`,`address`,`phone`,`headpic`,`post`,`regip`,`regtime`,`lastip`,`lasttime`) values (16,'Bruse','林阳','96e79218965eb72c92a549dd5a330112','Bruse@qq.com',50,'北京市五道口','13000010002','52fdba9403a6b.jpg',1,'127.0.0.1',1390389720,'',0),(1,'malan','马兰','96e79218965eb72c92a549dd5a330112','malan@qq.com',185,'下沙','15974405388','52fcba223d4a9.jpg',1,'192.168.130.3',1389602740,'',0),(17,'Jack','Jack','e10adc3949ba59abbe56e057f20f883e','916413@qq.com',0,'',NULL,'headpic.jpg',1,'',1391782049,'',0),(18,'Anny',NULL,'96e79218965eb72c92a549dd5a330112','123@qq.com',0,'',NULL,'headpic.jpg',1,'',1391782258,'',0),(40,'gongjing',NULL,'e10adc3949ba59abbe56e057f20f883e','gongjing@qq.com',30,'',NULL,'52fdd0d0456f3.jpg',1,'',1392365473,'',0),(41,'213',NULL,'e10adc3949ba59abbe56e057f20f883e','admin@qq.com',30,'',NULL,'headpic.jpg',1,'',1392365517,'',0),(38,'admin',NULL,'e00cf25ad42683b3df678c61f42c6bda','admin@163.com',30,'',NULL,'52fdbaf0eccd2.jpg',1,'',1392360166,'',0),(39,'KOKO','crazy man','b1d493021c810630b9b0d7455caeed15','qq@qq.com',35,'南非','10162908433','52fdceb28258f.jpg',1,'',1392365208,'',0),(42,'DuYang','dy','b1d493021c810630b9b0d7455caeed15','ww@ww.com',30,'','1212','52fdd07592bf4.jpg',1,'',1392365662,'',0),(43,'twen','爷爷','3f44afd6d32e9ee196e60372d971123f','joneyee22@qq.com',35,'合肥更好','15974405388','headpic.jpg',1,'',1393664571,'',0),(46,'xxxx','xxxx','e10adc3949ba59abbe56e057f20f883e','xx@qq.com',30,'xxxx','12345678900','headpic.jpg',1,'',1393844418,'',0);

/*Table structure for table `dc_webconfig` */

DROP TABLE IF EXISTS `dc_webconfig`;

CREATE TABLE `dc_webconfig` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact` varchar(30) NOT NULL COMMENT '联系方式',
  `icpno` varchar(50) NOT NULL COMMENT '备案号',
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='站点配置';

/*Data for the table `dc_webconfig` */

insert  into `dc_webconfig`(`id`,`title`,`keywords`,`logo`,`description`,`email`,`contact`,`icpno`,`address`) values (0,'快达汽车租赁','快达 租车系统','530d8606b6d25.png',' 这是网站描述内容！！！                                                                                             ','admin@qq.com','12345677777','杭ICP备00000000号-1','杭州市');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
