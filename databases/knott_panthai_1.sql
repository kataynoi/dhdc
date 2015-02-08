/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-02-08 11:01:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `knott_panthai_1`
-- ----------------------------
DROP TABLE IF EXISTS `knott_panthai_1`;
CREATE TABLE `knott_panthai_1` (
  `disease` varchar(255) DEFAULT NULL,
  `persons` bigint(21) NOT NULL DEFAULT '0',
  `times` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of knott_panthai_1
-- ----------------------------
INSERT INTO `knott_panthai_1` VALUES ('U77-การส่งเสริมสุขภาพและการป้องกันโรค', '2954', '4330');
INSERT INTO `knott_panthai_1` VALUES ('U75.05-ปวดกล้ามเนื้อ', '452', '602');
INSERT INTO `knott_panthai_1` VALUES ('U64.3-ไอ', '143', '151');
INSERT INTO `knott_panthai_1` VALUES ('U57.33-ลมปลายปัตฆาตสัญญาณ 4 หลัง / คอ', '63', '148');
INSERT INTO `knott_panthai_1` VALUES ('U56.10-ไข้หวัดน้อย', '62', '127');
INSERT INTO `knott_panthai_1` VALUES ('U66.70-จุกเสียดแน่นท้อง', '91', '102');
INSERT INTO `knott_panthai_1` VALUES ('U75.06-ปวดขา หรือ ปวดเข่า หรือ ปวดเท้า', '54', '96');
INSERT INTO `knott_panthai_1` VALUES ('U65.30-คออักเสบ', '80', '87');
INSERT INTO `knott_panthai_1` VALUES ('U57.53-ลมจับโปงแห้งเข่า', '24', '84');
INSERT INTO `knott_panthai_1` VALUES ('U50.9-ความผิดปกติของสตรีตั้งครรภ์และหลังคลอด, ไม่ระบุรายละเอียด', '15', '70');
