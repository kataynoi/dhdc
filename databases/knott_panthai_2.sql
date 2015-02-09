/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-02-08 11:28:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for knott_panthai_2
-- ----------------------------
DROP TABLE IF EXISTS `knott_panthai_2`;
CREATE TABLE `knott_panthai_2` (
  `PROCEDCODE` varchar(7) NOT NULL,
  `oper` varchar(255) DEFAULT NULL,
  `person` bigint(21) NOT NULL DEFAULT '0',
  `visit` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
