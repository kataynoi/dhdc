/*
Navicat MySQL Data Transfer

Source Server         : local-mariadb
Source Server Version : 50540
Source Host           : localhost:3309
Source Database       : dhdc_update

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-02-24 20:37:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_month
-- ----------------------------
DROP TABLE IF EXISTS `sys_month`;
CREATE TABLE `sys_month` (
  `month` varchar(6) NOT NULL,
  `selyear` varchar(4) DEFAULT NULL,
  `selmonth` varchar(2) DEFAULT NULL,
  `month_th` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_month
-- ----------------------------
INSERT INTO `sys_month` VALUES ('201210', '2556', '10', 'ตุลาคม');
INSERT INTO `sys_month` VALUES ('201211', '2556', '11', 'พฤศจิกายน');
INSERT INTO `sys_month` VALUES ('201212', '2556', '12', 'ธันวาคม');
INSERT INTO `sys_month` VALUES ('201301', '2556', '01', 'มกราคม');
INSERT INTO `sys_month` VALUES ('201302', '2556', '02', 'กุมภาพันธ์');
INSERT INTO `sys_month` VALUES ('201303', '2556', '03', 'มีนาคม');
INSERT INTO `sys_month` VALUES ('201304', '2556', '04', 'เมษายน');
INSERT INTO `sys_month` VALUES ('201305', '2556', '05', 'พฤษภาคม');
INSERT INTO `sys_month` VALUES ('201306', '2556', '06', 'มิถุนายน');
INSERT INTO `sys_month` VALUES ('201307', '2556', '07', 'กรกฎาคม');
INSERT INTO `sys_month` VALUES ('201308', '2556', '08', 'สิงหาคม');
INSERT INTO `sys_month` VALUES ('201309', '2556', '09', 'กันยายน');
INSERT INTO `sys_month` VALUES ('201310', '2557', '10', 'ตุลาคม');
INSERT INTO `sys_month` VALUES ('201311', '2557', '11', 'พฤศจิกายน');
INSERT INTO `sys_month` VALUES ('201312', '2557', '12', 'ธันวาคม');
INSERT INTO `sys_month` VALUES ('201401', '2557', '01', 'มกราคม');
INSERT INTO `sys_month` VALUES ('201402', '2557', '02', 'กุมภาพันธ์');
INSERT INTO `sys_month` VALUES ('201403', '2557', '03', 'มีนาคม');
INSERT INTO `sys_month` VALUES ('201404', '2557', '04', 'เมษายน');
INSERT INTO `sys_month` VALUES ('201405', '2557', '05', 'พฤษภาคม');
INSERT INTO `sys_month` VALUES ('201406', '2557', '06', 'มิถุนายน');
INSERT INTO `sys_month` VALUES ('201407', '2557', '07', 'กรกฎาคม');
INSERT INTO `sys_month` VALUES ('201408', '2557', '08', 'สิงหาคม');
INSERT INTO `sys_month` VALUES ('201409', '2557', '09', 'กันยายน');
INSERT INTO `sys_month` VALUES ('201410', '2558', '10', 'ตุลาคม');
INSERT INTO `sys_month` VALUES ('201411', '2558', '11', 'พฤศจิกายน');
INSERT INTO `sys_month` VALUES ('201412', '2558', '12', 'ธันวาคม');
INSERT INTO `sys_month` VALUES ('201501', '2558', '01', 'มกราคม');
INSERT INTO `sys_month` VALUES ('201502', '2558', '02', 'กุมภาพันธ์');
INSERT INTO `sys_month` VALUES ('201503', '2558', '03', 'มีนาคม');
INSERT INTO `sys_month` VALUES ('201504', '2558', '04', 'เมษายน');
INSERT INTO `sys_month` VALUES ('201505', '2558', '06', 'พฤษภาคม');
INSERT INTO `sys_month` VALUES ('201506', '2558', '06', 'มิถุนายน');
INSERT INTO `sys_month` VALUES ('201507', '2668', '07', 'กรกฎาคม');
INSERT INTO `sys_month` VALUES ('201508', '2558', '08', 'สิงหาคม');
INSERT INTO `sys_month` VALUES ('201509', '2558', '09', 'กันยายน');

-- ----------------------------
-- Procedure structure for cal_sys_count_all
-- ----------------------------
DROP PROCEDURE IF EXISTS `cal_sys_count_all`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cal_sys_count_all`(IN `ym` varchar(6))
BEGIN
	set @ym = ym;

REPLACE into sys_count_all 


SELECT SQL_BIG_RESULT h.hoscode as hospcode,@ym as month,
(select COUNT(*) from person t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as person,
(select COUNT(*) from death t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as death,
(select COUNT(*) from service t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as service,
(select COUNT(*) from accident t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as accident,
(select COUNT(*) from diagnosis_opd t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as diagnosis_opd,
(select COUNT(*) from procedure_opd t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as procedure_opd,
(select COUNT(*) from ncdscreen t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as ncdscreen,
(select COUNT(*) from chronicfu t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as chronicfu,
(select COUNT(*) from labfu t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as labfu,
(select COUNT(*) from chronic t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_DIAG)=@ym) as chronic,
(select COUNT(*) from fp t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as fp,
(select COUNT(*) from epi t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as epi,
(select COUNT(*) from nutrition t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as nutrition,
(select COUNT(*) from prenatal t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as prenatal,
(select COUNT(*) from anc t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as anc,
(select COUNT(*) from labor t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as labor,
(select COUNT(*) from postnatal t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as postnatal,
(select COUNT(*) from newborn t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.BDATE)=@ym) as newborn,
(select COUNT(*) from newborncare t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as newborncare,
(select COUNT(*) from dental t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATE_SERV)=@ym) as dental,
(select COUNT(*) from admission t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATETIME_ADMIT)=@ym) as admission,
(select COUNT(*) from diagnosis_ipd t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.DATETIME_ADMIT)=@ym) as diagnosis_ipd,
(select COUNT(*) from procedure_ipd t where t.HOSPCODE=h.hoscode and EXTRACT(YEAR_MONTH FROM t.D_UPDATE)=@ym) as procedure_ipd

from chospital_amp h;


END
;;
DELIMITER ;
