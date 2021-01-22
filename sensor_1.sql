# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.10-MariaDB)
# Database: sensor
# Generation Time: 2020-10-04 18:04:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_modbus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_modbus`;

CREATE TABLE `tb_modbus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sensor` varchar(11) NOT NULL DEFAULT '',
  `name_sensor` varchar(200) NOT NULL,
  `fungsi` varchar(200) NOT NULL DEFAULT '',
  `alamt` varchar(200) NOT NULL DEFAULT '',
  `register` varchar(200) NOT NULL DEFAULT '',
  `jumlah` varchar(200) NOT NULL DEFAULT '',
  `ip` varchar(200) NOT NULL DEFAULT '',
  `output` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tb_modbus` WRITE;
/*!40000 ALTER TABLE `tb_modbus` DISABLE KEYS */;

INSERT INTO `tb_modbus` (`id`, `id_sensor`, `name_sensor`, `fungsi`, `alamt`, `register`, `jumlah`, `ip`, `output`)
VALUES
	(1,'1','Suhu 1','t3','7','2','1','192.168.0.203',''),
	(2,'2','Suhu 2','t3','6','2','1','192.168.0.203',''),
	(3,'2','Suhu 2','t3','6','2','1','192.168.0.203','');

/*!40000 ALTER TABLE `tb_modbus` ENABLE KEYS */;
UNLOCK TABLES;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tb_sensor` WRITE;
/*!40000 ALTER TABLE `tb_sensor` DISABLE KEYS */;

INSERT INTO `tb_sensor` (`id`, `id_sensor`, `name_sensor`, `protokol`, `versi`, `rocomunity`, `ip`, `mib_name`, `output`)
VALUES
	(1,'1','NTI Temperature 1','snmpget','v1','public','192.168.1.252','ENVIROMUX16D::extSensorValue.1','18.98'),
	(2,'2','NTI Temperature 2','snmpget','v1','public','192.168.0.203','ENVIROMUX16D-MIB','');

/*!40000 ALTER TABLE `tb_sensor` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
