/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2017-11-09 20:16:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adviser`
-- ----------------------------
DROP TABLE IF EXISTS `adviser`;
CREATE TABLE `adviser` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xingming` varchar(10) NOT NULL,
  `idnumber` varchar(14) NOT NULL,
  `mobliephone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adviser
-- ----------------------------
INSERT INTO `adviser` VALUES ('1', '9zLWiEf1mhdH3p7Uj1_W7gGqGets_ABn', null, '$2y$13$ZQ9ec8t0zMppNVCpGA/YA.OnBNTw0B.iXHVRt23GP.2ka3Eam5Yqy', 'admin', 'bbbcccc', '123', '123', '123', '1234');
INSERT INTO `adviser` VALUES ('10', 'KrhBAEX2VHhYujc0mSu7FTektwox8yPD', null, '$2y$13$lsP7TYjj2ZlbQ7TX6LZxQOuAhrS2M02115a/o5uwRiIvOeWH5lZtO', 'wfhou', 'wf', '123', '123', 'wfhou@ronghuifeng.cn', '1234');
INSERT INTO `adviser` VALUES ('11', 'E-9Oun19f4-Y4dhTYTsjanbT134XnRJF', null, '$2y$13$yH5Ht4xp4mTsGZlrx9OuFugp8yjdVTFDTHXcULaDgNu4hoitFM7ta', 'cc', 'cc', 'cc', 'cc', 'cc@cc.cn', 'cc');
INSERT INTO `adviser` VALUES ('12', '1yxsUxk5EY3JrhZ4lkzF2SUNwg-KqM2C', null, '$2y$13$XCk5XkDBXpkxfeUYUkDe2OJjr/xpIH1mvAS0XV6uyxxOx3ocl9dQy', 'bb', 'bbbbbb', 'bb', 'bb', 'bb@bb.bb', 'bb');
INSERT INTO `adviser` VALUES ('13', 'mPB7OhUS8faFbmCwH-3Kyv_gMgytjduF', null, '$2y$13$fAz4BF6tT2bF1HTAadhjx.9vO4Kfe6.JD7E0IqRHcolxpFXLRJRhO', 'hou', 'houwenfeng', '123', '123', '1234@123.cn', '所属营业部');

-- ----------------------------
-- Table structure for `allocation`
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allocation
-- ----------------------------
INSERT INTO `allocation` VALUES ('1', '3333', '2017-10-25 22:04:35', null, '0', null, '22', '5', '1', '9', '1');
INSERT INTO `allocation` VALUES ('5', '而他当时再挖染发', '2017-11-08 10:28:14', '2017-11-08 11:09:48', '0', null, '', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('6', '右腿亚特', '2017-11-08 10:47:38', '2017-11-08 11:08:17', '0', null, '<ol class=row><li>1111</li></ol>', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('7', '撒旦发射点发的萨芬', '2017-11-08 20:09:17', null, '0', null, '<ol class=row><li>1111</li></ol>#ppp#', '5', '1', '9', '13');
INSERT INTO `allocation` VALUES ('8', '滴滴滴滴滴滴滴滴', '2017-11-08 20:25:00', '2017-11-08 20:41:57', '0', null, '<ol class=row><li>1111</li></ol><ol class=row><li>bbb</li></ol><ol class=row><li>大成现金增利货币A</li></ol>', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('9', '日日日日日日日日日日', '2017-11-08 20:52:55', '2017-11-08 20:53:28', '0', null, '111<div class=searchbox><ul class=list-group><li class=list-group-item>aaaaa</li></ul><ul class=list-group><li class=list-group-item>bbb</li></ul></div>', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('10', '停停停停停停停停停 ', '2017-11-08 21:00:09', null, '0', null, '作者：白狼 出处：http://www.manks.top/article/yii2_redactor本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。\r\n<div class=searchbox><ul class=list-group><li class=list-group-item>aaaaa</li></ul><ul class=list-group><li class=list-group-item>bbb</li></ul><ul class=list-group><li class=list-group-item>大成现金增利货币A</li></ul>\r\n首先我们不急不躁，先进行安装Redactor。\r\n\r\n可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。</div>', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('11', '我问问我问问我问问我为', '2017-11-08 21:03:19', '2017-11-08 21:29:11', '0', null, '作者：白狼 出处：http://www.manks.top/article/yii2_redactor本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。\r\n<div class=searchbox><ol class=list-group><li class=list-group-item>aaaaa</li><li class=list-group-item>11</li><li class=list-group-item>11</li></ol><ol class=list-group><li class=list-group-item>bbb</li><li class=list-group-item>12</li><li class=list-group-item>12</li></ol><ol class=list-group><li class=list-group-item>大成现金增利货币A</li><li class=list-group-item>5.07</li><li class=list-group-item>90</li></ol>\r\n首先我们不急不躁，先进行安装Redactor。\r\n\r\n可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。</div>', '5', '1', '9', '13');
INSERT INTO `allocation` VALUES ('13', '啊啊啊啊啊啊啊啊啊啊啊', '2017-11-08 21:37:52', '2017-11-08 21:39:21', '0', null, '作者：白狼 出处：http://www.manks.top/article/yii2_redactor本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。\r\n<table class=table table-striped><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody><tr><td>aaaaa</td><td>11</td><td>11</td></tr><tr><td>bbb</td><td>12</td><td>12</td></tr><tr><td>大成现金增利货币A</td><td>5.07</td><td>10000</td></tr>\r\n首先我们不急不躁，先进行安装Redactor。\r\n\r\n可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。</tbody></table>', '6', '1', '9', '13');
INSERT INTO `allocation` VALUES ('15', '钱钱钱钱钱', '2017-11-08 22:31:40', '2017-11-08 22:31:58', '0', null, '作者：白狼 出处：http://www.manks.top/article/yii2_redactor本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。\r\n<table class=table table-striped><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody><tr><td>aaaaa</td><td>11</td><td>11</td></tr><tr><td>大成现金增利货币A</td><td>5.07</td><td>10000</td></tr></tbody></table>\r\n首先我们不急不躁，先进行安装Redactor。\r\n\r\n可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。', '6', '1', '9', '10');
INSERT INTO `allocation` VALUES ('16', '停停停停停停 ', '2017-11-09 00:28:13', '2017-11-09 00:39:26', '0', null, '<p>作者：白狼 出处：<a href=\"http://www.manks.top/article/yii2_redactor\" _src=\"http://www.manks.top/article/yii2_redactor\">http://www.manks.top/article/yii2_redactor</a></p><p>&nbsp;&nbsp;本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。&nbsp;</p><p>&nbsp;&nbsp;<table class=table table-striped><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody><tr><td>aaaaa</td><td>11</td><td>11</td></tr><tr><td>bbb</td><td>12</td><td>12</td></tr><tr><td>大成现金增利货币A</td><td>5.07</td><td>10000</td></tr></tbody></table>&nbsp;</p><p>&nbsp;&nbsp;首先我们不急不躁，先进行安装Redactor。可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。</p>', '5', '1', '9', '10');
INSERT INTO `allocation` VALUES ('17', '就斤斤计较斤斤计较斤斤计较', '2017-11-09 10:39:19', '2017-11-09 10:39:44', '0', null, '<p style=\"text-align:center\"><span style=\"font-size:29px;font-family:宋体\">产品报价单</span></p><p style=\"text-align:center\"><span style=\"font-size:29px\">&nbsp;</span></p><p><span style=\"font-size: 19px;font-family:宋体\">河南永新科技有限公司：</span></p><p><span style=\"font-size: 19px;font-family:宋体\">根据贵公司软模图纸生产胶套产品、模具报价如下：</span></p><p><img src=\"/image/20171109/1510195091988483.jpg\" title=\"1510195091988483.jpg\" alt=\"091.jpg\"/></p><table cellspacing=\"0\" cellpadding=\"0\" width=\"692\"><tbody><tr style=\";height:40px\" class=\"firstRow\"><td width=\"52\" nowrap=\"\" style=\"border-width: 1px; border-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">序号</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">名称</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">规格</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">模具费（元）</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">产品单价（元）</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">备注</span></p></td></tr><tr style=\";height:40px\"><td width=\"52\" nowrap=\"\" style=\"border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-family: 宋体\">1</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size:19px\">YXMJ-17</span><span style=\"font-size:   19px;font-family:宋体\">胶套</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size: 19px;font-family: 宋体\">¢55-¢61x1336</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">4000</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">730</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-family: 宋体\">含税、运</span></p></td></tr><tr style=\";height:40px\"><td width=\"52\" nowrap=\"\" style=\"border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-family: 宋体\">2</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size:19px\">YXMJ-003</span><span style=\"font-size:   19px;font-family:宋体\">胶套</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size: 19px;font-family: 宋体\">¢64.5-¢65.5x1406</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">4500</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">850</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-family: 宋体\">含税、运</span></p></td></tr></tbody></table><p style=\"text-indent: 38px\"><span style=\"font-size:19px\">&nbsp; &nbsp; <table class=table table-striped><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody><tr><td>aaaaa</td><td>11</td><td>11</td></tr><tr><td>bbb</td><td>12</td><td>12</td></tr><tr><td>大成现金增利货币A</td><td>5.07</td><td>10000</td></tr></tbody></table></span></p><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family:宋体\">自贡市荣汇丰橡塑有限公司</span></p><p style=\"text-align:right\"><span style=\"font-size:19px\">2017-11-09</span></p><p><br/></p>', '5', '2', '9', '10');
INSERT INTO `allocation` VALUES ('18', '克雷格iuoiu', '2017-11-09 10:45:13', '2017-11-09 10:46:39', '0', null, '<p><img src=\"/image/20171109/1510195456213007.jpg\" title=\"1510195456213007.jpg\" alt=\"0106.jpg\"/></p><p></p><table class=\"table\" table-striped=\"\"><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody><tr><td>aaaaa</td><td>11</td><td>11</td></tr><tr><td>bbb</td><td>12</td><td>12</td></tr><tr><td>大成现金增利货币A</td><td>5.07</td><td>10000</td></tr></tbody></table><p></p><p><img src=\"/image/20171109/1510195477713466.jpg\" title=\"1510195477713466.jpg\" alt=\"0122.jpg\"/></p>', '6', '3', '8', '10');

-- ----------------------------
-- Table structure for `altemplate`
-- ----------------------------
DROP TABLE IF EXISTS `altemplate`;
CREATE TABLE `altemplate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `templatename` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of altemplate
-- ----------------------------
INSERT INTO `altemplate` VALUES ('1', '大家诶out颇为哦i敬佛', '2017-10-25 21:29:41', '<p>作者：白狼 出处：http://www.manks.top/article/yii2_redactor</p><p>&nbsp;&nbsp;本文版权归作者，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接，否则保留追究法律责任的权利。\r\n\r\n前面我们说过如何在yii2中集成百度编辑器umeditor以及如何解决umeditor上传图片问题\r\n今天我们来谈谈yii2集成另外一个强大好用的富文本编辑器Redactor，个人觉得redactor比百度编辑器好用哦\r\n\r\nRedactor有官方的Yii2插件package，实用性也是很强的。&nbsp;</p><p>&nbsp;&nbsp;#ppp#&nbsp;</p><p>&nbsp;&nbsp;首先我们不急不躁，先进行安装Redactor。可以参考 https://github.com/yiidoc/yii2-redactor 进行安装。有很多新手看不惯英文哈，如果你点击了链接参考了github上的安装，希望你再回来看看在整个安装过程中都要哪些必要的注意点。</p>', '6', '1', '9');
INSERT INTO `altemplate` VALUES ('2', '请问犬瘟热额外前往', '2017-11-09 10:38:22', '<p style=\"text-align:center\"><span style=\"font-size:29px;font-family:宋体\">产品报价单</span></p><p style=\"text-align:center\"><span style=\"font-size:29px\">&nbsp;</span></p><p><span style=\"font-size: 19px;font-family:宋体\">河南永新科技有限公司：</span></p><p><span style=\"font-size: 19px;font-family:宋体\">根据贵公司软模图纸生产胶套产品、模具报价如下：</span></p><p><img src=\"/image/20171109/1510195091988483.jpg\" title=\"1510195091988483.jpg\" alt=\"091.jpg\"/></p><table cellspacing=\"0\" cellpadding=\"0\" width=\"692\"><tbody><tr style=\";height:40px\" class=\"firstRow\"><td width=\"52\" nowrap=\"\" style=\"border-width: 1px; border-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">序号</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">名称</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">规格</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">模具费（元）</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">产品单价（元）</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-size: 16px;font-family: 宋体\">备注</span></p></td></tr><tr style=\";height:40px\"><td width=\"52\" nowrap=\"\" style=\"border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-family: 宋体\">1</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size:19px\">YXMJ-17</span><span style=\"font-size:   19px;font-family:宋体\">胶套</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size: 19px;font-family: 宋体\">¢55-¢61x1336</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">4000</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">730</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-family: 宋体\">含税、运</span></p></td></tr><tr style=\";height:40px\"><td width=\"52\" nowrap=\"\" style=\"border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:center\"><span style=\"font-family: 宋体\">2</span></p></td><td width=\"157\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size:19px\">YXMJ-003</span><span style=\"font-size:   19px;font-family:宋体\">胶套</span></p></td><td width=\"100\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-size: 19px;font-family: 宋体\">¢64.5-¢65.5x1406</span></p></td><td width=\"94\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">4500</span></p></td><td width=\"104\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family: 宋体\">850</span></p></td><td width=\"133\" nowrap=\"\" style=\"border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;\" height=\"40\"><p><span style=\"font-family: 宋体\">含税、运</span></p></td></tr></tbody></table><p style=\"text-indent: 38px\"><span style=\"font-size:19px\">&nbsp; &nbsp; #ppp#</span></p><p style=\"text-align:right\"><span style=\"font-size: 19px;font-family:宋体\">自贡市荣汇丰橡塑有限公司</span></p><p style=\"text-align:right\"><span style=\"font-size:19px\">2017-11-09</span></p><p><br/></p>', '5', '10', '9');
INSERT INTO `altemplate` VALUES ('3', '自行车啊是的发生地方', '2017-11-09 11:47:17', '<p><img src=\"/image/20171109/1510195456213007.jpg\" title=\"1510195456213007.jpg\" alt=\"0106.jpg\"/></p><p>#ppp#</p><p><img src=\"/image/20171109/1510195477713466.jpg\" title=\"1510195477713466.jpg\" alt=\"0122.jpg\"/></p>', '6', '10', '9');

-- ----------------------------
-- Table structure for `migration`
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
-- Table structure for `products`
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('22', 'aaaaa', '11.00', '11', '11', '11.00', '2017-10-24 14:47:07', '9');
INSERT INTO `products` VALUES ('23', 'bbb', '12.00', '12', '12', '12.00', '2017-10-24 15:01:16', '9');
INSERT INTO `products` VALUES ('24', '大成现金增利货币A', '5.07', '10000', '90', '10057.00', '2017-11-08 09:36:10', '9');

-- ----------------------------
-- Table structure for `syscode`
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
INSERT INTO `syscode` VALUES ('8', 'status', '1', '已保存');
INSERT INTO `syscode` VALUES ('9', 'status', '2', '已发布');

-- ----------------------------
-- Table structure for `user`
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
