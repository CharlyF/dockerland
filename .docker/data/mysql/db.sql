CREATE DATABASE /*!32312 IF NOT EXISTS*/ `log_activities` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `log_activities`;

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `task_ref` varchar(20) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `task_name` varchar(20) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `dependencies` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


LOCK TABLES `logs` WRITE;

INSERT INTO `logs` VALUES ('Bug_idendification','Assist','Peer coding',NULL,NULL,600,'customer_issue'),('Phone','Recruit','Call with candidate',NULL,NULL,150,NULL),('to_Charly','Assign','Ticket to Charly',NULL,NULL,2500,NULL),('to_Charly','Assign','Ticket to Cha',NULL,NULL,2500,NULL),('customer_issues','improve','investigation',NULL,NULL,250,NULL),('customer_issue','improve','investigation',NULL,NULL,250,NULL);

UNLOCK TABLES;
