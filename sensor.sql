# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.10-MariaDB)
# Database: sensor
# Generation Time: 2020-04-16 08:23:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_sensor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_sensor`;

CREATE TABLE `tb_sensor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sensor` varchar(11) NOT NULL DEFAULT '',
  `name_sensor` varchar(200) NOT NULL,
  `protokol` varchar(200) NOT NULL,
  `versi` varchar(200) NOT NULL,
  `rocomunity` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `mib_name` varchar(200) NOT NULL,
  `output` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tb_sensor` WRITE;
/*!40000 ALTER TABLE `tb_sensor` DISABLE KEYS */;

INSERT INTO `tb_sensor` (`id`, `id_sensor`, `name_sensor`, `protokol`, `versi`, `rocomunity`, `ip`, `mib_name`, `output`)
VALUES
	(1,'1','NTI Temperature 1','snmpget','v1','public','192.168.1.252','AIRSYS-BR-MIB-V2::frontTemp.0','18.98');

/*!40000 ALTER TABLE `tb_sensor` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
