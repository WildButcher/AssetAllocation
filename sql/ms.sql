/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-11-03 09:29:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adviser
-- ----------------------------
DROP TABLE IF EXISTS `adviser`;
CREATE TABLE `adviser` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `xingming` varchar(10) NOT NULL,
  `idnumber` varchar(14) NOT NULL,
  `mobliephone` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adviser
-- ----------------------------
INSERT INTO `adviser` VALUES ('1', 'bbbcccc', '123', '123', '123', '123');

-- ----------------------------
-- Table structure for allocation
-- ----------------------------
DROP TABLE IF EXISTS `allocation`;
CREATE TABLE `allocation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publictime` datetime DEFAULT NULL,
  `downcount` int(11) unsigned DEFAULT '0',
  `filelinks` varchar(255) DEFAULT NULL,
  `filecontent` longtext,
  `isshare` bigint(20) unsigned NOT NULL,
  `lid` bigint(20) unsigned DEFAULT NULL,
  `status` bigint(20) unsigned NOT NULL,
  `oid` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `lid` (`lid`),
  KEY `id` (`id`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE,
  KEY `isshare` (`isshare`) USING BTREE,
  KEY `oid` (`oid`),
  CONSTRAINT `al_isshare` FOREIGN KEY (`isshare`) REFERENCES `syscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `al_oid` FOREIGN KEY (`oid`) REFERENCES `adviser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lid` FOREIGN KEY (`lid`) REFERENCES `altemplate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allocation
-- ----------------------------
INSERT INTO `allocation` VALUES ('1', '3333', '2017-10-25 22:04:35', null, '0', null, '22', '5', '1', '8', '1');

-- ----------------------------
-- Table structure for altemplate
-- ----------------------------
DROP TABLE IF EXISTS `altemplate`;
CREATE TABLE `altemplate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `templatename` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filecontent` longtext,
  `isshare` bigint(20) unsigned NOT NULL,
  `oid` bigint(20) unsigned NOT NULL,
  `status` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `oid` (`oid`),
  KEY `status` (`status`),
  KEY `isshare` (`isshare`),
  CONSTRAINT `alt_isshare` FOREIGN KEY (`isshare`) REFERENCES `syscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alt_oid` FOREIGN KEY (`oid`) REFERENCES `adviser` (`id`),
  CONSTRAINT `alt_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of altemplate
-- ----------------------------
INSERT INTO `altemplate` VALUES ('1', '1111', '2017-10-25 21:29:41', '111', '6', '1', '8');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1508434858');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1508434861');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `rate` float(4,2) NOT NULL,
  `buypoint` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `profit` float(11,2) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`) USING BTREE,
  KEY `id` (`id`),
  CONSTRAINT `p_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('22', 'aaaaa', '11.00', '11', '11', '11.00', '2017-10-24 14:47:07', '8');
INSERT INTO `products` VALUES ('23', 'bbb', '12.00', '12', '12', '12.00', '2017-10-24 15:01:16', '9');

-- ----------------------------
-- Table structure for syscode
-- ----------------------------
DROP TABLE IF EXISTS `syscode`;
CREATE TABLE `syscode` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `majorcode` varchar(20) NOT NULL,
  `minicode` varchar(20) NOT NULL,
  `meaning` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syscode
-- ----------------------------
INSERT INTO `syscode` VALUES ('5', 'whether', '0', '否');
INSERT INTO `syscode` VALUES ('6', 'whether', '1', '是');
INSERT INTO `syscode` VALUES ('7', 'status', '0', '停用');
INSERT INTO `syscode` VALUES ('8', 'status', '1', '启用');
INSERT INTO `syscode` VALUES ('9', 'status', '2', '发布');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '9zLWiEf1mhdH3p7Uj1_W7gGqGets_ABn', '$2y$13$ZQ9ec8t0zMppNVCpGA/YA.OnBNTw0B.iXHVRt23GP.2ka3Eam5Yqy', null, 'admin@admin.com', '10', '1508434999', '1508434999');
