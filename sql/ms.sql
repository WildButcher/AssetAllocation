/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-21 20:51:49
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adviser
-- ----------------------------

-- ----------------------------
-- Table structure for allocation
-- ----------------------------
DROP TABLE IF EXISTS `allocation`;
CREATE TABLE `allocation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `createtime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `publictime` datetime DEFAULT NULL,
  `downcount` int(11) DEFAULT NULL,
  `filelinks` varchar(255) DEFAULT NULL,
  `filecontent` longtext,
  `isshare` tinyint(4) NOT NULL,
  `lid` bigint(20) unsigned NOT NULL,
  `status` bigint(20) unsigned NOT NULL,
  `oid` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `lid` (`lid`),
  KEY `id` (`id`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE,
  KEY `isshare` (`isshare`) USING BTREE,
  KEY `oid` (`oid`),
  CONSTRAINT `al_oid` FOREIGN KEY (`oid`) REFERENCES `adviser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`),
  CONSTRAINT `lid` FOREIGN KEY (`lid`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allocation
-- ----------------------------

-- ----------------------------
-- Table structure for altemplate
-- ----------------------------
DROP TABLE IF EXISTS `altemplate`;
CREATE TABLE `altemplate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `createtime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `filecontent` longtext,
  `isshare` tinyint(1) unsigned NOT NULL,
  `oid` bigint(20) unsigned NOT NULL,
  `status` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `oid` (`oid`),
  KEY `status` (`status`),
  CONSTRAINT `alt_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`),
  CONSTRAINT `oid` FOREIGN KEY (`oid`) REFERENCES `adviser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of altemplate
-- ----------------------------

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
  `rate` float(4,2) NOT NULL,
  `buypoint` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `profit` float(11,2) NOT NULL,
  `createtime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`) USING BTREE,
  KEY `id` (`id`),
  CONSTRAINT `p_status` FOREIGN KEY (`status`) REFERENCES `syscode` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syscode
-- ----------------------------

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