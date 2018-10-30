/*
Navicat MySQL Data Transfer

Source Server         : maozhiyong
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : ymx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-30 15:09:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ymx_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_admin`;
CREATE TABLE `ymx_admin` (
  `admin_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `passwd` varchar(128) DEFAULT NULL,
  `true_name` varchar(20) DEFAULT NULL COMMENT '真名',
  `telephone` varchar(40) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `login_count` mediumint(8) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_ip` varchar(40) DEFAULT NULL COMMENT '最后登录ip',
  `last_ip_region` varchar(40) DEFAULT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `group_id` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='后台管理员';

-- ----------------------------
-- Records of ymx_admin
-- ----------------------------
INSERT INTO `ymx_admin` VALUES ('1', 'admin', 'MDAwMDAwMDAwMLKEfty0d7do', '', '', 'admin@admin.com', '9', '127.0.0.1', '', '1505270345', '0', '1540861248', '1', '2');
INSERT INTO `ymx_admin` VALUES ('5', 'shou', 'MDAwMDAwMDAwMLKEftyzh6uw', null, '18588414149', '1075298840@qq.com', '0', null, null, '1540805119', '0', '0', '1', '3');

-- ----------------------------
-- Table structure for `ymx_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_auth_group`;
CREATE TABLE `ymx_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `type` varchar(20) DEFAULT NULL,
  `title` char(20) DEFAULT NULL COMMENT '用户组中文名称',
  `description` varchar(80) DEFAULT NULL COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` text COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymx_auth_group
-- ----------------------------
INSERT INTO `ymx_auth_group` VALUES ('2', 'admin', '超级管理员', '后台超级管理员', '1', '1,2,13,19,28,29,30,38,46,48,57,66,67,68,69,70,71,72,73,75,76,77,84,85,86,87,113,120,121,122,123,124,125,126,127,129,130,131,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223');
INSERT INTO `ymx_auth_group` VALUES ('3', null, 'caiwu', 'caiwu', '1', '57,129,130,166,167,168,169,290');

-- ----------------------------
-- Table structure for `ymx_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_auth_group_access`;
CREATE TABLE `ymx_auth_group_access` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymx_auth_group_access
-- ----------------------------
INSERT INTO `ymx_auth_group_access` VALUES ('1', '2');
INSERT INTO `ymx_auth_group_access` VALUES ('5', '3');

-- ----------------------------
-- Table structure for `ymx_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_auth_rule`;
CREATE TABLE `ymx_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymx_auth_rule
-- ----------------------------
INSERT INTO `ymx_auth_rule` VALUES ('13', '3', '57', 'admin/index/index');
INSERT INTO `ymx_auth_rule` VALUES ('14', '3', '129', '');
INSERT INTO `ymx_auth_rule` VALUES ('15', '3', '130', 'member/menu_backend/index');
INSERT INTO `ymx_auth_rule` VALUES ('16', '3', '166', 'member/menu_backend/add');
INSERT INTO `ymx_auth_rule` VALUES ('17', '3', '167', 'member/menu_backend/edit');
INSERT INTO `ymx_auth_rule` VALUES ('18', '3', '168', 'member/menu_backend/del');
INSERT INTO `ymx_auth_rule` VALUES ('19', '3', '169', 'member/menu_backend/get_info');
INSERT INTO `ymx_auth_rule` VALUES ('20', '3', '290', 'admin/index/logout');

-- ----------------------------
-- Table structure for `ymx_config`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_config`;
CREATE TABLE `ymx_config` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extend_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_for` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ymx_config
-- ----------------------------
INSERT INTO `ymx_config` VALUES ('13', 'SITE_TITLE', 'oscshop', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('14', 'SITE_NAME', 'oscshop', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('15', 'SITE_DESCRIPTION', 'oscshop1', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('16', 'SITE_KEYWORDS', 'oscshop', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('17', 'SITE_URL', 'http://www.oscshop.cn', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('19', 'SITE_ICP', '闽ICP备12345678号', 'ICP备案号', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('20', 'EMAIL', 'yc@123.com', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('21', 'TELEPHONE', '15859571190', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('22', 'WEB_SITE_CLOSE', '0', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('48', 'SITE_SLOGAN', '使用thinkphp5重新设计的oscshop,B2C开源商城系统，遵循Apache2开源协议发布，QQ交流群：291969317', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('53', 'SITE_ICON', 'images/osc2/1.jpg', '网站图标', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('61', 'qq', '82944930', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('62', 'administrator', 'admin', '超级管理员账号', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('70', 'page_num', '10', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('71', 'SHORT_URL', 'oscshop.cn', null, 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('73', 'account', null, '支付宝账号', 'member', '会员', 'alipay', 'payment', '1', '1');
INSERT INTO `ymx_config` VALUES ('74', 'key', null, '支付宝key', 'member', '会员', 'alipay', 'payment', '1', '2');
INSERT INTO `ymx_config` VALUES ('75', 'partner', null, '合作者身份（partner ID）', 'member', '会员', 'alipay', 'payment', '1', '3');
INSERT INTO `ymx_config` VALUES ('76', 'appid', null, 'appid', 'member', '会员', 'weixin', 'payment', '1', '1');
INSERT INTO `ymx_config` VALUES ('77', 'token', null, 'token', 'member', '会员', 'weixin', 'payment', '1', '2');
INSERT INTO `ymx_config` VALUES ('78', 'appsecret', null, 'appsecret', 'member', '会员', 'weixin', 'payment', '1', '3');
INSERT INTO `ymx_config` VALUES ('79', 'encodingaeskey', null, 'encodingaeskey', 'member', '会员', 'weixin', 'payment', '1', '4');
INSERT INTO `ymx_config` VALUES ('80', 'weixin_partner', null, 'partner（商户号）', 'member', '会员', 'weixin', 'payment', '1', '5');
INSERT INTO `ymx_config` VALUES ('81', 'partnerkey', null, 'partnerkey', 'member', '会员', 'weixin', 'payment', '1', '6');
INSERT INTO `ymx_config` VALUES ('82', 'storage_user_action', 'true', '保存用户行为', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('83', 'ck_image_width', '630', 'ck编辑器图片最大宽度', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('84', 'FRONTEND_USER', '网站会员', '前台用户', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('85', 'BACKEND_USER', '后台系统用户', '后台用户', 'common', '网站公共配置', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('86', 'member_login_type', 'cookie', '会员信息记录在(session/cookie)', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('87', 'default_group_id', '2', '默认会员组', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('88', 'reg_check', '0', '注册审核', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('89', 'weight_id', '1', '重量单位', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('90', 'length_id', '1', '长度单位', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('91', 'default_order_status_id', '3', '默认订单状态 ', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('92', 'paid_order_status_id', '1', '订单付款状态', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('93', 'complete_order_status_id', '4', '订单完成状态 ', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('94', 'cancel_order_status_id', '5', '订单取消状态 ', 'member', '会员', null, null, '1', '0');
INSERT INTO `ymx_config` VALUES ('105', 'PWD_KEY', 'wyd', '', '', '', '', '', '1', '0');

-- ----------------------------
-- Table structure for `ymx_member`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_member`;
CREATE TABLE `ymx_member` (
  `admin_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `passwd` varchar(128) DEFAULT NULL,
  `true_name` varchar(20) DEFAULT NULL COMMENT '真名',
  `telephone` varchar(40) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `login_count` mediumint(8) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_ip` varchar(40) DEFAULT NULL COMMENT '最后登录ip',
  `last_ip_region` varchar(40) DEFAULT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `group_id` smallint(5) NOT NULL DEFAULT '0',
  `email_code` varchar(200) DEFAULT NULL COMMENT '邮箱验证码',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='后台管理员';

-- ----------------------------
-- Records of ymx_member
-- ----------------------------
INSERT INTO `ymx_member` VALUES ('1', 'admin', 'MDAwMDAwMDAwMLKEfty0d7do', '', '', 'admin@admin.com', '9', '127.0.0.1', '', '1505270345', '0', '1540861248', '1', '2', '');
INSERT INTO `ymx_member` VALUES ('5', 'shou', 'MDAwMDAwMDAwMLKEftyzh6uw', null, '18588414149', '1075298840@qq.com', '0', null, null, '1540805119', '0', '0', '1', '3', '');

-- ----------------------------
-- Table structure for `ymx_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_menu`;
CREATE TABLE `ymx_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `module` varchar(20) DEFAULT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `icon` varchar(64) DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `type` varchar(40) DEFAULT NULL COMMENT 'nav,auth',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf8 COMMENT='后台菜单';

-- ----------------------------
-- Records of ymx_menu
-- ----------------------------
INSERT INTO `ymx_menu` VALUES ('1', 'admin', '0', '系统管理', 'admin/systen', '&#xe62e;', '0', 'nav', '1');
INSERT INTO `ymx_menu` VALUES ('2', 'admin', '0', '管理员管理', 'admin', '&#xe62d;', '1', 'nav', '1');
INSERT INTO `ymx_menu` VALUES ('3', 'admin', '2', '管理员列表', 'admin/Role/adminlist', null, '1', 'nav', '1');
INSERT INTO `ymx_menu` VALUES ('4', 'admin', '2', '角色管理', 'admin/Role/rolelist', null, '2', 'nav', '1');
INSERT INTO `ymx_menu` VALUES ('5', 'admin', '1', '栏位管理', 'admin/System/catelist', null, '1', 'nav', '1');
INSERT INTO `ymx_menu` VALUES ('6', 'admin', '3', '添加', 'admin/Role/admin_add', null, '0', 'auth', '1');
INSERT INTO `ymx_menu` VALUES ('323', 'admin', '2', '权限管理', 'admin/Role/role', '', '0', 'nav', '1');

-- ----------------------------
-- Table structure for `ymx_user_action`
-- ----------------------------
DROP TABLE IF EXISTS `ymx_user_action`;
CREATE TABLE `ymx_user_action` (
  `ua_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `uname` varchar(40) DEFAULT NULL COMMENT '用户名',
  `type` varchar(40) DEFAULT NULL COMMENT 'frontend,backend',
  `info` varchar(255) DEFAULT NULL COMMENT '行为描述',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '加入时间',
  PRIMARY KEY (`ua_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='用户行为';

-- ----------------------------
-- Records of ymx_user_action
-- ----------------------------
INSERT INTO `ymx_user_action` VALUES ('1', '1', 'admin', '后台系统用户', '登录了后台系统', '1540349295');
INSERT INTO `ymx_user_action` VALUES ('2', '1', 'admin', '后台系统用户', '更新商品状态', '1540349467');
INSERT INTO `ymx_user_action` VALUES ('3', '1', 'admin', '后台系统用户', '更新商品状态', '1540349470');
INSERT INTO `ymx_user_action` VALUES ('4', '1', 'admin', '后台系统用户', '复制了运费模板', '1540349534');
INSERT INTO `ymx_user_action` VALUES ('5', '1', 'admin', '后台系统用户', '删除了运费模板', '1540349545');
INSERT INTO `ymx_user_action` VALUES ('6', '1', 'admin', '后台系统用户', '复制了运费模板', '1540350264');
INSERT INTO `ymx_user_action` VALUES ('7', '1', 'admin', '后台系统用户', '复制了运费模板', '1540350265');
INSERT INTO `ymx_user_action` VALUES ('8', '1', 'admin', '后台系统用户', '复制了运费模板', '1540350266');
INSERT INTO `ymx_user_action` VALUES ('9', '1', 'admin', '后台系统用户', '删除了运费模板', '1540350269');
INSERT INTO `ymx_user_action` VALUES ('10', '1', 'admin', '后台系统用户', '删除了运费模板', '1540350272');
INSERT INTO `ymx_user_action` VALUES ('11', '1', 'admin', '后台系统用户', '删除了运费模板', '1540350274');
INSERT INTO `ymx_user_action` VALUES ('12', '1', 'hahaha', '网站会员', '注册成为会员', '1540351073');
INSERT INTO `ymx_user_action` VALUES ('13', '1', 'hahaha', '网站会员', '加入商品到购物车', '1540351082');
INSERT INTO `ymx_user_action` VALUES ('14', '1', 'hahaha', '网站会员', '新增了收货地址', '1540351978');
INSERT INTO `ymx_user_action` VALUES ('15', '1', 'hahaha', '网站会员', '下了订单，未支付', '1540351995');
INSERT INTO `ymx_user_action` VALUES ('16', '1', 'hahaha', '网站会员', '查看了订单详情', '1540352017');
INSERT INTO `ymx_user_action` VALUES ('17', '1', 'hahaha', '网站会员', '点击了去支付', '1540352037');
INSERT INTO `ymx_user_action` VALUES ('18', '1', 'hahaha', '网站会员', '取消了订单', '1540352048');
INSERT INTO `ymx_user_action` VALUES ('19', '1', 'admin', '后台系统用户', '登录了后台系统', '1540452758');
INSERT INTO `ymx_user_action` VALUES ('20', '1', 'admin', '后台系统用户', '添加了用户组', '1540452775');
INSERT INTO `ymx_user_action` VALUES ('21', '1', 'admin', '后台系统用户', '修改了用户组状态', '1540452803');
INSERT INTO `ymx_user_action` VALUES ('22', '1', 'admin', '后台系统用户', '修改了用户组状态', '1540452804');
INSERT INTO `ymx_user_action` VALUES ('23', '1', 'admin', '后台系统用户', '编辑了用户权限', '1540452838');
INSERT INTO `ymx_user_action` VALUES ('24', '1', 'admin', '后台系统用户', '新增了会员', '1540452963');
INSERT INTO `ymx_user_action` VALUES ('25', '1', 'admin', '后台系统用户', '编辑了会员', '1540452973');
INSERT INTO `ymx_user_action` VALUES ('26', '1', 'admin', '后台系统用户', '新增了系统用户', '1540453021');
INSERT INTO `ymx_user_action` VALUES ('27', '2', 'haha', '后台系统用户', '登录了后台系统', '1540453044');
INSERT INTO `ymx_user_action` VALUES ('28', '1', 'admin', '后台系统用户', '修改了用户组状态', '1540453060');
INSERT INTO `ymx_user_action` VALUES ('29', '1', 'admin', '后台系统用户', '修改了用户组状态', '1540453061');
INSERT INTO `ymx_user_action` VALUES ('30', '1', 'admin', '后台系统用户', '编辑了用户权限', '1540453069');
INSERT INTO `ymx_user_action` VALUES ('31', '1', 'admin', '后台系统用户', '编辑了用户权限', '1540453116');
INSERT INTO `ymx_user_action` VALUES ('32', '2', 'haha', '后台系统用户', '退出了系统', '1540462486');
INSERT INTO `ymx_user_action` VALUES ('33', '1', 'admin', '后台系统用户', '修改了系统用户', '1540462520');
INSERT INTO `ymx_user_action` VALUES ('34', '2', 'haha', '后台系统用户', '登录了后台系统', '1540462525');
INSERT INTO `ymx_user_action` VALUES ('35', '1', 'admin', '后台系统用户', '登录了后台系统', '1540516044');
INSERT INTO `ymx_user_action` VALUES ('36', '2', 'haha', '后台系统用户', '登录了后台系统', '1540519560');
INSERT INTO `ymx_user_action` VALUES ('37', '1', 'admin', '后台系统用户', '清除了缓存', '1540524451');
INSERT INTO `ymx_user_action` VALUES ('38', '1', 'admin', '后台系统用户', '添加了会员用户组', '1540535972');
INSERT INTO `ymx_user_action` VALUES ('39', '1', 'admin', '后台系统用户', '更新了会员用户组', '1540535984');
INSERT INTO `ymx_user_action` VALUES ('40', '1', 'admin', '后台系统用户', '修改了支付接口状态', '1540536002');
INSERT INTO `ymx_user_action` VALUES ('41', '1', 'admin', '后台系统用户', '修改了支付接口状态', '1540536003');
INSERT INTO `ymx_user_action` VALUES ('42', '1', 'admin', '后台系统用户', '编辑了会员', '1540537817');
INSERT INTO `ymx_user_action` VALUES ('43', '1', 'admin', '后台系统用户', '登录了后台系统', '1540793537');
INSERT INTO `ymx_user_action` VALUES ('44', '1', 'admin', '后台系统用户', '登录了后台系统', '1540793816');
INSERT INTO `ymx_user_action` VALUES ('45', '1', 'admin', '后台系统用户', '登录了后台系统', '1540794688');
INSERT INTO `ymx_user_action` VALUES ('46', '1', 'admin', '后台系统用户', '登录了后台系统', '1540798809');
INSERT INTO `ymx_user_action` VALUES ('47', '1', 'admin', '后台系统用户', '新增了系统用户', '1540805119');
INSERT INTO `ymx_user_action` VALUES ('48', '1', 'admin', '后台系统用户', '登录了后台系统', '1540861249');
