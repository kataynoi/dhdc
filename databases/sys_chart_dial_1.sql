/*
Navicat MySQL Data Transfer

Source Server         : local-mariadb
Source Server Version : 50540
Source Host           : localhost:3309
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-02-23 12:50:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_chart_dial_1
-- ----------------------------
DROP TABLE IF EXISTS `sys_chart_dial_1`;
CREATE TABLE `sys_chart_dial_1` (
  `hospcode` char(5) NOT NULL DEFAULT '',
  `hospname` varchar(255) DEFAULT NULL,
  `target` bigint(21) DEFAULT NULL,
  `chronic` bigint(21) DEFAULT NULL,
  `result` bigint(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_chart_dial_1
-- ----------------------------
INSERT INTO `sys_chart_dial_1` VALUES ('07432', 'รพ.สต.คลองตาล', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07433', 'รพ.สต.วังลึก', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07434', 'รพ.สต.สามเรือน', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07435', 'รพ.สต.บ้านนา', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07436', 'รพ.สต.วังทอง', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07437', 'รพ.สต.บ้านวังพิกุล ตำบลนาขุนไกร', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07438', 'รพ.สต.นาขุนไกร', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07439', 'รพ.สต.เกาะตาเลี้ยง', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07440', 'รพ.สต.บ้านวงฆ้อง ตำบลเกาะตาเลี้ยง', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07441', 'รพ.สต.วัดเกาะ', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07442', 'รพ.สต.บ้านไร่', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07443', 'รพ.สต.ทับผึ้ง', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07444', 'รพ.สต.บ้านเตว็ดนอก ตำบลทับผึ้ง', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07445', 'รพ.สต.บ้านซ่าน', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07446', 'รพ.สต.วังใหญ่', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07447', 'รพ.สต.บ้านสระบัว ตำบลวังใหญ่', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07448', 'รพ.สต.ราวต้นจันทร์', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('07449', 'รพ.สต.บ้านท่ามักกะสัง  ตำบลราวต้นจัทร์', null, null, null);
INSERT INTO `sys_chart_dial_1` VALUES ('14050', 'รพ.สต.บ้านลุเต่า ตำบลนาขุนไกร', null, null, null);
