/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : company

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-12-04 23:27:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `9f_ad`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ad`;
CREATE TABLE `9f_ad` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `orderid` smallint(5) NOT NULL DEFAULT '0',
  `checkinfo` tinyint(1) NOT NULL DEFAULT '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ad
-- ----------------------------
INSERT INTO `9f_ad` VALUES ('1', '1', '经营理念', 'uploads/image/20140611/1402490364.jpg', '', '1', '0', '1402488473');
INSERT INTO `9f_ad` VALUES ('2', '1', '服务承诺', 'uploads/image/20140611/1402490364.jpg', '', '2', '0', '1402488508');

-- ----------------------------
-- Table structure for `9f_admin`
-- ----------------------------
DROP TABLE IF EXISTS `9f_admin`;
CREATE TABLE `9f_admin` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(40) NOT NULL,
  `roleid` smallint(5) DEFAULT NULL,
  `lastloginip` varchar(16) NOT NULL,
  `lastlogintime` int(10) unsigned NOT NULL,
  `loginnum` int(10) unsigned NOT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `posttime` int(10) unsigned NOT NULL,
  `checkinfo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_admin
-- ----------------------------
INSERT INTO `9f_admin` VALUES ('1', 'admin', 'c016b6b47f41128a4c7f22f10fa106429c817eb2', '0', '127.0.0.1', '1480845060', '211', '测试员', 'admin@admin.com', '0', '0');
INSERT INTO `9f_admin` VALUES ('2', 'dos999', '3591a2969ffb0e352c7762ff52d6477559067b85', null, '127.0.0.1', '1403343276', '0', '九方互联', 'master@dos999.com', '1403343276', '0');

-- ----------------------------
-- Table structure for `9f_admin_text`
-- ----------------------------
DROP TABLE IF EXISTS `9f_admin_text`;
CREATE TABLE `9f_admin_text` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_admin_text
-- ----------------------------
INSERT INTO `9f_admin_text` VALUES ('1', '');

-- ----------------------------
-- Table structure for `9f_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ad_type`;
CREATE TABLE `9f_ad_type` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `width` smallint(5) NOT NULL,
  `height` smallint(5) NOT NULL,
  `description` varchar(255) NOT NULL,
  `orderid` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ad_type
-- ----------------------------
INSERT INTO `9f_ad_type` VALUES ('1', '首页幻灯片', '960', '320', '', '0');
INSERT INTO `9f_ad_type` VALUES ('2', 'home', '1000', '300', '', '0');

-- ----------------------------
-- Table structure for `9f_category`
-- ----------------------------
DROP TABLE IF EXISTS `9f_category`;
CREATE TABLE `9f_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `modelid` smallint(5) unsigned NOT NULL,
  `classname` varchar(30) NOT NULL,
  `dirname` varchar(255) DEFAULT NULL,
  `flag` varchar(500) NOT NULL,
  `picurl` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `navshow` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checkinfo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `list_template` varchar(30) DEFAULT NULL,
  `show_template` varchar(30) DEFAULT NULL,
  `ctitle` varchar(255) DEFAULT NULL,
  `cpicurl` varchar(60) DEFAULT NULL,
  `content` mediumtext,
  `htmlurl` varchar(255) DEFAULT NULL,
  `orderid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_category
-- ----------------------------
INSERT INTO `9f_category` VALUES ('52', '0', '0,52,', '0', 'home', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', '', '', '<p>123<br/></p>', null, '1');
INSERT INTO `9f_category` VALUES ('53', '0', '0,53,', '0', 'catalog', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '2');
INSERT INTO `9f_category` VALUES ('54', '0', '0,54,', '0', 'products', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '3');
INSERT INTO `9f_category` VALUES ('55', '0', '0,55,', '0', 'news', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '4');
INSERT INTO `9f_category` VALUES ('56', '0', '0,56,', '0', 'company', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '5');
INSERT INTO `9f_category` VALUES ('57', '54', '0,54,57,', '0', 'geramics', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '6');
INSERT INTO `9f_category` VALUES ('58', '54', '0,54,58,', '0', 'Sanitary ware', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '7');
INSERT INTO `9f_category` VALUES ('59', '55', '0,55,59,', '1', 'Basuc Faucet', '', '', '', '', '0', '0', '', '', '', 'Content_list_down_cn.html', 'Content_show_cn.html', null, null, null, null, '8');
INSERT INTO `9f_category` VALUES ('60', '55', '0,55,60,', '1', 'Sink Faucet', '', '', '', '', '0', '0', '', '', '', 'Content_list_down_cn.html', 'Content_show_cn.html', null, null, null, null, '9');
INSERT INTO `9f_category` VALUES ('61', '54', '0,54,61,', '0', 'faucet', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', 'Content_show_cn.html', null, null, null, null, '10');

-- ----------------------------
-- Table structure for `9f_content`
-- ----------------------------
DROP TABLE IF EXISTS `9f_content`;
CREATE TABLE `9f_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) NOT NULL,
  `path` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `style` char(24) DEFAULT NULL,
  `flag` varchar(60) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picarr` text,
  `url` varchar(255) DEFAULT NULL,
  `tag` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '1',
  `content` mediumtext NOT NULL,
  `content_arr` text,
  `relation_id` varchar(255) NOT NULL,
  `htmlurl` varchar(255) DEFAULT NULL,
  `orderid` int(10) DEFAULT '1',
  `checkinfo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `posttime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_content
-- ----------------------------
INSERT INTO `9f_content` VALUES ('27', '59', '0,55,59,', '6 Tips for Keeping Your Home Safe This Holiday Season', ';', null, '', '', '', '', '', '', '', 'admin', '1', '<p>It’s tough to believe it’s nearly April. Ah, Spring is a time ,It’s \r\ntough to believe it’s nearly April. Ah, Spring is a time ,It’s tough to \r\nbelieve it’s nearly April. Ah, Spring is a time\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 'null', '', null, '0', '0', '1480855884', '1480855884');
INSERT INTO `9f_content` VALUES ('28', '59', '0,55,59,', '7 Tips for Keeping Your Home Safe This Holiday Season', ';', null, '', '', '', '', '', '', '', 'admin', '1', '<p>It’s tough to believe it’s nearly April. Ah, Spring is a time ,It’s \r\ntough to believe it’s nearly April. Ah, Spring is a time ,It’s tough to \r\nbelieve it’s nearly April. Ah, Spring is a time\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 'null', '', null, '0', '0', '1480855927', '1480855927');
INSERT INTO `9f_content` VALUES ('29', '60', '0,55,60,', '8 Tips for Keeping Your Home Safe This Holiday Season', ';', null, '', '', '', '', '', '', '', 'admin', '1', '<p>It’s tough to believe it’s nearly April. Ah, Spring is a time ,It’s \r\ntough to believe it’s nearly April. Ah, Spring is a time ,It’s tough to \r\nbelieve it’s nearly April. Ah, Spring is a time\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 'null', '', null, '0', '0', '1480855953', '1480855953');

-- ----------------------------
-- Table structure for `9f_copyfrom`
-- ----------------------------
DROP TABLE IF EXISTS `9f_copyfrom`;
CREATE TABLE `9f_copyfrom` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL,
  `siteurl` varchar(100) DEFAULT NULL,
  `orderid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_copyfrom
-- ----------------------------
INSERT INTO `9f_copyfrom` VALUES ('2', '本站', 'www.baidu.com', '0');
INSERT INTO `9f_copyfrom` VALUES ('8', '', null, '0');

-- ----------------------------
-- Table structure for `9f_ip`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ip`;
CREATE TABLE `9f_ip` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ip
-- ----------------------------
INSERT INTO `9f_ip` VALUES ('2', '');

-- ----------------------------
-- Table structure for `9f_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `9f_jobs`;
CREATE TABLE `9f_jobs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(60) NOT NULL,
  `num` smallint(5) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `wage` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_arr` text NOT NULL,
  `checkinfo` tinyint(1) NOT NULL DEFAULT '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_kefu`
-- ----------------------------
DROP TABLE IF EXISTS `9f_kefu`;
CREATE TABLE `9f_kefu` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `account` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `color` char(7) NOT NULL,
  `style` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `orderid` smallint(5) NOT NULL,
  `checkinfo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_kefu
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_link`
-- ----------------------------
DROP TABLE IF EXISTS `9f_link`;
CREATE TABLE `9f_link` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(60) NOT NULL,
  `url` varchar(252) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `orderid` smallint(5) NOT NULL DEFAULT '0',
  `checkinfo` tinyint(1) NOT NULL DEFAULT '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_link
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_link_type`
-- ----------------------------
DROP TABLE IF EXISTS `9f_link_type`;
CREATE TABLE `9f_link_type` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `orderid` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_link_type
-- ----------------------------
INSERT INTO `9f_link_type` VALUES ('1', '默认分类', '0');

-- ----------------------------
-- Table structure for `9f_member`
-- ----------------------------
DROP TABLE IF EXISTS `9f_member`;
CREATE TABLE `9f_member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(5) NOT NULL DEFAULT '0',
  `username` varchar(60) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `phone` char(11) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `qq` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `regtime` int(10) NOT NULL,
  `regip` char(16) NOT NULL,
  `logintime` int(10) NOT NULL,
  `loginip` char(16) NOT NULL,
  `isauth` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_member
-- ----------------------------
INSERT INTO `9f_member` VALUES ('7', '1', 'demo', '1be8c42b3674458c289c549d7c07972ed1d4b446', '4543@qq.com', '', '', '测试', '', '', '', '1480855518', '127.0.0.1', '1480855518', '127.0.0.1', '1');

-- ----------------------------
-- Table structure for `9f_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `9f_member_group`;
CREATE TABLE `9f_member_group` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `point` smallint(6) NOT NULL,
  `orderid` smallint(5) NOT NULL,
  `checkinfo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_member_group
-- ----------------------------
INSERT INTO `9f_member_group` VALUES ('1', '普通会员', '0', '0', '0');

-- ----------------------------
-- Table structure for `9f_message`
-- ----------------------------
DROP TABLE IF EXISTS `9f_message`;
CREATE TABLE `9f_message` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` text,
  `content_arr` text NOT NULL,
  `re_content` text NOT NULL,
  `re_posttime` int(10) NOT NULL,
  `isshow` tinyint(4) NOT NULL DEFAULT '0',
  `checkinfo` tinyint(1) NOT NULL DEFAULT '0',
  `posttime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_message
-- ----------------------------
INSERT INTO `9f_message` VALUES ('3', null, '姜子牙', '075533533502', '1583145788@qq.coma', '内容内容内容内容内容<h2>内容内容内容内容内容</h2>', '', '', '0', '0', '0', '1399622067');
INSERT INTO `9f_message` VALUES ('4', null, '123', '123123', '123', '123123', '', '', '0', '0', '0', '1402475505');

-- ----------------------------
-- Table structure for `9f_mjobs`
-- ----------------------------
DROP TABLE IF EXISTS `9f_mjobs`;
CREATE TABLE `9f_mjobs` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) NOT NULL,
  `username` varchar(60) NOT NULL,
  `sex` char(1) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_mjobs
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_webconfig`
-- ----------------------------
DROP TABLE IF EXISTS `9f_webconfig`;
CREATE TABLE `9f_webconfig` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `varinfo` varchar(80) NOT NULL,
  `vargroup` tinyint(2) NOT NULL,
  `vartype` char(10) NOT NULL,
  `varvalue` text NOT NULL,
  `orderid` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_webconfig
-- ----------------------------
INSERT INTO `9f_webconfig` VALUES ('2', 'webname', '网站名称', '1', 'string', 'FAENZA', '0');
INSERT INTO `9f_webconfig` VALUES ('3', 'weburl', '网站地址', '1', 'string', 'www.xiutub.com', '0');
INSERT INTO `9f_webconfig` VALUES ('4', 'webpath', '网站目录', '1', 'string', '/', '0');
INSERT INTO `9f_webconfig` VALUES ('5', 'keyword', '关键字设置', '1', 'string', 'FAENZA', '0');
INSERT INTO `9f_webconfig` VALUES ('6', 'description', '网站描述', '1', 'bstring', 'this is FAENZA', '0');
INSERT INTO `9f_webconfig` VALUES ('7', 'copyright', '版权信息', '1', 'bstring', '©2016 FAENZA Sanitary ware All Rights Reserved.', '0');
INSERT INTO `9f_webconfig` VALUES ('37', 'beianhao', '备案号', '1', 'string', '©2016 FAENZA Sanitary ware All Rights Reserved.', '0');
INSERT INTO `9f_webconfig` VALUES ('54', 'email', '邮箱', '1', 'string', 'hedong123s@163.com', '0');
INSERT INTO `9f_webconfig` VALUES ('55', 'scape', 'SCAPE', '1', 'string', '474738268@qq.com', '0');
