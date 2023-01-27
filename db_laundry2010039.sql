/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.36-community-log : Database - db_laundry2010039
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_laundry2010039` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_laundry2010039`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idadmin` char(20) NOT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`idadmin`,`namalengkap`,`pass`,`level`) values ('admin','Rafi Chandra','21232f297a57a5a743894a0e4a801fc3',1),('admin2','Chaigo','c84258e9c39059a89ab77d846ddab909',1);

/*Table structure for table `cuciankeluar` */

DROP TABLE IF EXISTS `cuciankeluar`;

CREATE TABLE `cuciankeluar` (
  `idkeluar` bigint(20) NOT NULL AUTO_INCREMENT,
  `nofaktur` char(20) DEFAULT NULL,
  `tgldiambil` date DEFAULT NULL,
  PRIMARY KEY (`idkeluar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cuciankeluar` */

insert  into `cuciankeluar`(`idkeluar`,`nofaktur`,`tgldiambil`) values (1,'202208260001','2022-08-26'),(2,'202208260002','2022-08-26'),(3,'202208270002','2022-08-27');

/*Table structure for table `cucianmasuk` */

DROP TABLE IF EXISTS `cucianmasuk`;

CREATE TABLE `cucianmasuk` (
  `nofaktur` char(20) NOT NULL,
  `tglmasuk` date DEFAULT NULL,
  `tglselesai` date DEFAULT NULL,
  `kdpelanggan` char(10) DEFAULT NULL,
  `statuslaundry` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nofaktur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cucianmasuk` */

insert  into `cucianmasuk`(`nofaktur`,`tglmasuk`,`tglselesai`,`kdpelanggan`,`statuslaundry`) values ('202208260001','2022-08-26','2022-08-28','PLG0003','SELESAI LAUNDRY'),('202208260002','2022-08-26','2022-08-29','PLG0001','SELESAI LAUNDRY'),('202208270001','2022-08-26','2022-08-27','PLG0002','Laundry'),('202208270002','2022-08-26','2022-08-28','PLG0001','SELESAI LAUNDRY');

/*Table structure for table `detailcucianmasuk` */

DROP TABLE IF EXISTS `detailcucianmasuk`;

CREATE TABLE `detailcucianmasuk` (
  `iddetail` int(11) NOT NULL AUTO_INCREMENT,
  `detailnofaktur` char(20) DEFAULT NULL,
  `detailkdpaket` char(10) DEFAULT NULL,
  `detailkdpewangi` char(10) DEFAULT NULL,
  `detailberat` int(11) DEFAULT NULL,
  `detailharga` double DEFAULT NULL,
  PRIMARY KEY (`iddetail`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `detailcucianmasuk` */

insert  into `detailcucianmasuk`(`iddetail`,`detailnofaktur`,`detailkdpaket`,`detailkdpewangi`,`detailberat`,`detailharga`) values (2,'202208260001','PKT0003','PWG0002',2,9000),(3,'202208260002','PKT0001','PWG0003',3,5000),(4,'202208270001','PKT0003','PWG0002',2,9000),(5,'202208270002','PKT0002','PWG0001',1,7000);

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `kdpaket` char(20) NOT NULL,
  `namapaket` varchar(30) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`kdpaket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`kdpaket`,`namapaket`,`lama`,`harga`) values ('PKT0001','HEMAT',3,5000),('PKT0002','STANDAR',2,7000),('PKT0003','Expres',1,9000);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `kdpelanggan` char(10) NOT NULL,
  `namapelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`kdpelanggan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`kdpelanggan`,`namapelanggan`,`alamat`,`nohp`) values ('PLG0001','Arif Gunawan','Padang Barat','08235463657'),('PLG0002','Fatia Rahmi Putri','Padang Barat','083224354546'),('PLG0003','Syam Afdol','Padang Barat','0856446666');

/*Table structure for table `pewangi` */

DROP TABLE IF EXISTS `pewangi`;

CREATE TABLE `pewangi` (
  `kdpewangi` char(10) NOT NULL,
  `namapewangi` varchar(30) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`kdpewangi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pewangi` */

insert  into `pewangi`(`kdpewangi`,`namapewangi`,`stok`) values ('PWG0001','Mawar',98),('PWG0002','Sakura White',97),('PWG0003','Blosom',99);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
