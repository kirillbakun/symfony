/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50619
Source Host           : localhost:3306
Source Database       : symfony

Target Server Type    : MYSQL
Target Server Version : 50619
File Encoding         : 65001

Date: 2014-10-23 18:32:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('2', null, '1', 'text_23');
INSERT INTO `article` VALUES ('3', null, null, 'test artice');
INSERT INTO `article` VALUES ('4', null, '1', 'one more atricle');
INSERT INTO `article` VALUES ('6', null, null, 'efqefwfewe');
INSERT INTO `article` VALUES ('7', null, '1', '123123');
INSERT INTO `article` VALUES ('8', null, '1', '76373737');
INSERT INTO `article` VALUES ('10', null, null, 'text_1234');
INSERT INTO `article` VALUES ('12', null, '1', 'test page item');
INSERT INTO `article` VALUES ('13', null, '1', 'new test article');
INSERT INTO `article` VALUES ('14', null, null, 'wjfowijefoiwef');
INSERT INTO `article` VALUES ('21', null, null, 'asdefjweofj');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_role` (`role`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'role_name', 'role');
INSERT INTO `role` VALUES ('2', 'one_more_role_name', 'one_more_roel');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`) USING BTREE,
  UNIQUE KEY `unique_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', 'user_1', '$2y$13$NGD2XgOT44Xv09sXF7m7Y.fJQOwHoq81N0QgoCgVOPVZMjAaTXTDm', 'mail@mail.ru', null);

-- ----------------------------
-- Table structure for `user_to_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_to_role`;
CREATE TABLE `user_to_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_to_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_to_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_to_role
-- ----------------------------
