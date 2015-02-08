/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-02-08 11:17:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for knott_panthai_3
-- ----------------------------
DROP TABLE IF EXISTS `knott_panthai_3`;
CREATE TABLE `knott_panthai_3` (
  `right` varchar(262) DEFAULT NULL,
  `person` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
