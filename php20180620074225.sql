-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: php
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` varchar(255) DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKABCA3FBE469341C5` (`question_id`),
  CONSTRAINT `FKABCA3FBE469341C5` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (52,'PHP',1,66),(53,'Java',0,66),(54,'第二题',1,67),(55,'第二题',1,67),(56,'adobe',0,68),(57,'microsoft',0,68),(58,'jetbrain',1,68),(59,'一个月多少生活费？',9,69),(60,'一个月多少生活费？',9,69),(61,'一个月多少生活费？',9,69),(62,'25',0,70),(63,'30',7,70),(64,'40',1,70),(65,'50',1,70),(66,'会的',3,71),(67,'不会',6,71),(68,'不想去食堂',7,72),(69,'想换个口味',1,72),(70,'专门为了某个菜',1,72),(71,'网上购物',3,73),(72,'线下店铺',6,73),(87,'QQ音乐',11,79),(88,'酷狗',15,79),(89,'酷我',6,79),(90,'QQ',8,80),(91,'微信',4,80),(92,'今日头条',15,80),(93,'抖音',4,80),(100,'妥妥的支持',0,84),(101,'点32个赞',0,84),(102,'A',0,85),(103,'B',0,85),(104,'C',0,85),(105,'D',0,85),(115,'选项A',0,89),(116,'选项B',0,89),(117,'选项C',0,89),(118,'选项A',0,90),(119,'选项B',0,90),(120,'选项C',0,90),(121,'选项A',0,91),(122,'选项B',0,91),(123,'选项C',0,91),(124,'选项D',0,91),(125,'选项1111',12,92),(126,'选项22222',5,92),(127,'请在此作答',31,93),(128,'选项1111',12,94),(129,'选项2222',4,94),(130,'选项11111',3,95),(131,'选项22222',5,95),(132,'请在此作答',31,96),(133,'选项1111',12,97),(134,'选项22222',5,97),(135,'请在此作答',31,98),(138,'是',0,100),(139,'真的是',0,100),(142,'biglong',1,102),(143,'big',0,102),(144,'邦子月',0,102),(145,'选项4',1,102),(146,'选项1',29,103),(147,'选项2',7,103),(148,'选项1',29,104),(149,'选项2',7,104),(150,'选项1',29,105),(151,'选项2',7,105),(152,'选项1',29,106),(153,'选项2',7,106),(200,'左转车道',5,123),(201,'掉头车道',4,123),(202,'绕行车道',1,123),(203,'分向车道',0,123),(204,'违规行为',4,124),(205,'违章行为',2,124),(206,'违法行为',4,124),(207,'犯罪行为',0,124),(208,'降低轮胎气压',5,125),(209,'定期检查轮胎',0,125),(210,'及时清理轮胎沟槽里的异物',1,125),(211,'更换有裂纹或有很深损伤的轮胎',4,125),(212,'应当鸣喇叭',5,126),(213,'禁止鸣喇叭',0,126),(214,'禁止鸣高音喇叭',4,126),(215,'禁止鸣低音喇叭',1,126),(216,'选择较缓的下坡路段超车',8,127),(217,'上陡坡',1,127),(218,'下陡坡',0,127),(219,'连续下坡',1,127),(220,'选择任意路段超车',8,128),(221,'选择较缓的下坡路段超车',8,128),(222,'选择宽阔的缓上坡路段超车',2,128),(223,'选择较长的下坡路段超车',0,128),(224,'保持50米以上',4,129),(225,'保持60米以上',5,129),(226,'保持80米以上',0,129),(227,'保持100米以上',1,129),(228,'发动机温度过低',5,130),(229,'发动机温度过高',4,130),(230,'发动机冷却系故障',1,130),(231,'发动机润滑系故障',0,130),(232,'靠道路右侧停车',4,131),(233,'只准向右转弯',5,131),(234,'右侧是下坡路段',1,131),(235,'靠右侧道路行驶',0,131),(236,'50公里/小时',2,132),(237,'40公里/小时',2,132),(238,'30公里/小时',2,132),(239,'20公里/小时',4,132),(312,'afdf选项1',6,170),(313,'cvzxv选项2',3,170),(314,'cxgf选项1',8,171),(315,'gfhfd选项2',1,171),(316,'请在此作答',22,172),(317,'请在此作答',21,173),(318,'1单选题目标题',0,174),(319,'1单选题目标题',0,174),(320,'2单选题目标题',0,175),(321,'2单选题目标题',0,175),(324,'111选项1',1,179),(325,'222选项2',1,179),(326,'3333选项1',1,180),(327,'4444选项2',1,180),(328,'请在此作答',21,181);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `sort_num` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FKBA823BE6E2301405` (`survey_id`),
  CONSTRAINT `FKBA823BE6E2301405` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (66,'第一题',48,0),(67,'第二题',48,0),(68,'第三题',48,0),(69,'一个月多少生活费？',49,0),(70,'每天花费多少？',49,0),(71,'会不会点外卖',49,0),(72,'在什么场合点外卖',49,0),(73,'通过什么方式购物',49,0),(79,'经常从哪里听歌',51,0),(80,'手机上什么软件用的最多',51,0),(84,'免费共享电动车',55,0),(85,'第一题',56,0),(89,'第一题',60,0),(90,'第一题',61,0),(91,'第一题',62,0),(92,'第一道单选题',63,0),(93,'填空题',63,1),(94,'第一道单选',64,0),(95,'第二道单选',64,0),(96,'第一道填空',64,1),(97,'第三道单选',64,0),(98,'第二道填空',64,1),(100,'徐亚运是**吗？',66,0),(102,'第一题',68,0),(103,'单选题目标题',68,0),(104,'单选题目标题',68,0),(105,'单选题目标题',68,0),(106,'单选题目标题',68,0),(123,'这个标志是何含义？',75,0),(124,'驾驶这种机动车上路行驶属于什么行为？',75,0),(125,'避免爆胎的错误的做法是什么？',75,0),(126,'这个标志是何含义？',75,0),(127,'这个标志是何含义？',75,0),(128,'在山区道路超车时，应怎样超越？',75,0),(129,'驾驶小型载客汽车在高速公路上时速超过100公里时的跟车距离是多少？',75,0),(130,'行车中仪表板上（如图所示）亮表示什么？',75,0),(131,'这个标志是何含义？',75,0),(132,'牵引发生故障的机动车时，最高车速不得超过多少？',75,0),(170,'第一题',88,0),(171,'第二题',88,0),(172,'这是填空题',88,1),(173,'22填空题目标题',89,1),(174,'1单选题目标题',89,0),(175,'2单选题目标题',89,0),(179,'单选第一题',92,0),(180,'单选第二题',92,0),(181,'填空题填空题',92,1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` varchar(32) DEFAULT NULL,
  `hit_times` int(20) DEFAULT '0',
  `shelves` int(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FKCAE3A75A40DF9925` (`user_id`),
  KEY `FKCAE3A75A16CB2EC5` (`type_id`),
  CONSTRAINT `FKCAE3A75A16CB2EC5` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `FKCAE3A75A40DF9925` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (48,'测试问卷调查',54,2,'1526646678',1,1),(49,'生活消费',55,1,'1526711399',15,1),(51,'部分音乐平台的满意度调查',54,1,'1526716666',35,1),(55,'生活服务',54,1,'1526908789',0,1),(56,'测试三',55,1,'1526910101',0,1),(60,'测试六',63,4,'1526975769',0,1),(61,'测试七',64,4,'1526975823',0,1),(62,'测试八',63,4,'1526975862',0,1),(63,'只是一份有填空题的问卷调查',64,1,'1527211366',0,1),(64,'似乎可以了',54,1,'1527211905',8,1),(66,'敏感词汇测试2',64,1,'1527232448',0,1),(68,'给大龙侧看',64,1,'1527857677',1,1),(75,'2018科目一考试',54,1,'1528209926',10,1),(88,'这是一个最严谨的可以用来测试论述题的问卷',54,1,'1528614957',9,1),(89,'调查问卷主题',54,1,'1528618272',0,1),(92,'区分单选和填空题',54,1,'1528620419',2,1);
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (54,'生活服务'),(55,'生活消费'),(63,'幸福指数'),(64,'满意度');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  `email` varchar(32) DEFAULT NULL,
  `status` varchar(10) DEFAULT '1',
  `sex` varchar(4) DEFAULT '3',
  `uid` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root','e10adc3949ba59abbe56e057f20f883e',1,'root@sohu.com','1','3',0),(2,'admin','e10adc3949ba59abbe56e057f20f883e',0,'admin@sohu.com','1','',1),(4,'lisi','e10adc3949ba59abbe56e057f20f883e',1,'lisi@sohu.com','1','2',0),(7,'wangwu','e10adc3949ba59abbe56e057f20f883e',1,'wangwu@sohu.com','1','3',0),(9,'huigee','e10adc3949ba59abbe56e057f20f883e',0,'huigee@sohu.com','1','2',0),(13,'huige8','e10adc3949ba59abbe56e057f20f883e',0,'huige8@sohu.com','1','3',0),(14,'huige1996','e10adc3949ba59abbe56e057f20f883e',0,'huige1996@sohu.com','1','3',0),(15,'yangdashuai','e10adc3949ba59abbe56e057f20f883e',1,'yangdashuai@sohu.com','1','1',0),(16,'dashuai','e10adc3949ba59abbe56e057f20f883e',0,'dashuai@sohu.com','1','3',0),(17,'qqq','e10adc3949ba59abbe56e057f20f883e',0,'qqq@sohu.com','1','3',0),(19,'tttttt','099b3b060154898840f0ebdfb46ec78f',1,'tttttt@sohu.com','1','3',0),(20,'hhhhhh','81dc9bdb52d04dc20036dbd8313ed055',1,'hhhhhh@sohu.com','1','3',0),(21,'yyyyyy','81dc9bdb52d04dc20036dbd8313ed055',1,'yyyyyy@sohu.com','1','3',0),(23,'vvvvvv','e10adc3949ba59abbe56e057f20f883e',1,'vvvvvv@sohu.com','1','3',0),(24,'zzzz','e10adc3949ba59abbe56e057f20f883e',1,'zzzz@sohu.com','1','3',0),(25,'vvvvvvv','e10adc3949ba59abbe56e057f20f883e',1,'vvvvvvv@sohu.com','1','3',0),(26,'tytyty','e10adc3949ba59abbe56e057f20f883e',1,'tytyty@sohu.com','1','3',0);
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

-- Dump completed on 2018-06-20  7:42:27
