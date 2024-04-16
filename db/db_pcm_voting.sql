/*
Navicat MySQL Data Transfer

Source Server         : Database-Lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_pcm_voting

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-07-25 21:39:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `r_jenis_vote`
-- ----------------------------
DROP TABLE IF EXISTS `r_jenis_vote`;
CREATE TABLE `r_jenis_vote` (
  `ID_JENIS_VOTE` int(1) NOT NULL AUTO_INCREMENT,
  `NM_JENIS_VOTE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS_VOTE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of r_jenis_vote
-- ----------------------------
INSERT INTO `r_jenis_vote` VALUES ('1', 'PCM');
INSERT INTO `r_jenis_vote` VALUES ('2', 'PCA');

-- ----------------------------
-- Table structure for `tbl_calon`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_calon`;
CREATE TABLE `tbl_calon` (
  `ID_CALON` varchar(5) NOT NULL,
  `ID_JENIS_VOTE` int(2) DEFAULT NULL,
  `NBM` varchar(10) DEFAULT NULL,
  `NM_CALON` varchar(150) DEFAULT '',
  `ASAL_CALON` varchar(150) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `NO_URUT` int(2) DEFAULT NULL,
  `TGL_PROSES` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_CALON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ----------------------------
-- Records of tbl_calon
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_config`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE `tbl_config` (
  `ID_CONFIG` int(1) NOT NULL AUTO_INCREMENT,
  `NM_CONFIG` varchar(255) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `ID_JENIS_VOTE` int(2) DEFAULT NULL,
  `JML_MAX_VOTE` int(2) DEFAULT NULL,
  `TANGGAL_VOTE` date DEFAULT NULL,
  PRIMARY KEY (`ID_CONFIG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_config
-- ----------------------------
INSERT INTO `tbl_config` VALUES ('1', 'E-Voting Pimpinan Cabang Muhammadiyah Tegalrejo', 'Kecamatan Tegalrejo, Kota Yogyakarta', '1', '9', '2023-07-25');
INSERT INTO `tbl_config` VALUES ('2', 'E-Voting Pimpinan Cabang Aisyiyah Tegalrejo', 'Kecamatan Tegalrejo, Kota Yogyakarta', '2', '5', '2023-07-22');

-- ----------------------------
-- Table structure for `tbl_panitia`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_panitia`;
CREATE TABLE `tbl_panitia` (
  `ID_PANITIA` int(2) NOT NULL AUTO_INCREMENT,
  `NM_PANITIA` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `TGL_PROSES` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_PANITIA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_panitia
-- ----------------------------
INSERT INTO `tbl_panitia` VALUES ('1', 'Panitia MusCab', 'panitia@email.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-07-23 20:06:41');

-- ----------------------------
-- Table structure for `tbl_pemilih`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pemilih`;
CREATE TABLE `tbl_pemilih` (
  `ID_PEMILIH` varchar(10) NOT NULL,
  `NM_PEMILIH` varchar(150) NOT NULL,
  `ID_JENIS_VOTE` int(2) NOT NULL,
  `NBM` varchar(10) NOT NULL,
  `KODE` varchar(10) NOT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMILIH`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_pemilih
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_pilihan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pilihan`;
CREATE TABLE `tbl_pilihan` (
  `ID_PILIHAN` int(5) NOT NULL AUTO_INCREMENT,
  `ID_PEMILIH` varchar(10) NOT NULL,
  `ID_CALON` varchar(10) DEFAULT NULL,
  `PILIHAN_KE` int(2) DEFAULT NULL,
  `IP_DEVICE` varchar(25) DEFAULT NULL,
  `BROWSER` varchar(255) DEFAULT NULL,
  `TGL_PROSES` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_PILIHAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_pilihan
-- ----------------------------

-- ----------------------------
-- View structure for `view_config`
-- ----------------------------
DROP VIEW IF EXISTS `view_config`;
CREATE VIEW `view_config` AS select `tbl_config`.`ID_CONFIG` AS `ID_CONFIG`,`tbl_config`.`NM_CONFIG` AS `NM_CONFIG`,`tbl_config`.`KETERANGAN` AS `KETERANGAN`,`tbl_config`.`ID_JENIS_VOTE` AS `ID_JENIS_VOTE`,`r_jenis_vote`.`NM_JENIS_VOTE` AS `NM_JENIS_VOTE`,`tbl_config`.`JML_MAX_VOTE` AS `JML_MAX_VOTE`,`tbl_config`.`TANGGAL_VOTE` AS `TANGGAL_VOTE` from (`tbl_config` left join `r_jenis_vote` on(`tbl_config`.`ID_JENIS_VOTE` = `r_jenis_vote`.`ID_JENIS_VOTE`)) ;

-- ----------------------------
-- View structure for `view_jumlah_pilihan`
-- ----------------------------
DROP VIEW IF EXISTS `view_jumlah_pilihan`;
CREATE VIEW `view_jumlah_pilihan` AS select `a`.`ID_CALON` AS `ID_CALON`,`a`.`NBM` AS `NBM`,`a`.`NM_CALON` AS `NM_CALON`,`a`.`ASAL_CALON` AS `ASAL_CALON`,`a`.`ID_JENIS_VOTE` AS `ID_JENIS_VOTE`,`a`.`FOTO` AS `FOTO`,(select count(`tbl_pilihan`.`ID_CALON`) from `tbl_pilihan` where `tbl_pilihan`.`ID_CALON` = `a`.`ID_CALON`) AS `JUMLAH` from `tbl_calon` `a` ;
