/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : to

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-12-22 17:58:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `campanhas`
-- ----------------------------
DROP TABLE IF EXISTS `campanhas`;
CREATE TABLE `campanhas` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`user_id`  int(11) NOT NULL ,
`title`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`text`  varchar(400) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`photo`  varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`photo_dir`  varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`created`  datetime NOT NULL ,
`modified`  datetime NULL DEFAULT NULL ,
`slug`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`categoria_id`  int(11) NOT NULL ,
`tags`  varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`ribbon_top`  int(11) NOT NULL DEFAULT 0 ,
`ribbon_left`  int(11) NOT NULL DEFAULT 0 ,
`ribbon_width`  int(11) NOT NULL ,
`ribbon_height`  int(11) NOT NULL ,
`ribbon`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`ribbon_dir`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`ribbon_opacity`  decimal(2,1) NOT NULL DEFAULT 1.0 ,
`ribbon_image_width`  decimal(10,3) NOT NULL ,
`ribbon_image_height`  decimal(10,3) NULL DEFAULT NULL ,
`ribbon_image_name`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of campanhas
-- ----------------------------
BEGIN;
INSERT INTO `campanhas` VALUES ('1', '4', 'Botafogo', 'Botafogo é um bom time', null, null, '2015-11-27 19:59:07', '2015-11-27 19:59:07', 'botafogo', '3', 'botafogo;glorioso;futebol', '10', '10', '0', '0', '', '', '1.0', '0.000', null, null), ('3', '4', 'Delata Delcídio', 'bla bla bla', null, null, '2015-12-01 11:58:53', '2015-12-01 11:58:53', 'delata-delcidio', '1', 'delcidio; fora pt; lava jato', '0', '0', '0', '0', '', '', '1.0', '0.000', null, null), ('4', '4', 'asd', 'das', null, null, '2015-12-01 17:52:17', '2015-12-22 19:41:42', 'asd', '0', 'dsa', '258', '282', '102', '120', 'Botafogo_de_Futebol_e_Regatas_logo.png', '6567b6f3-3f4b-41c4-98de-679f816a94ac', '1.0', '258.000', '300.000', 'ea09242d4ca38bf7f34f80317a187337.png');
COMMIT;

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`slug`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`name`  varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`created`  datetime NOT NULL ,
`is_active`  tinyint(4) NOT NULL ,
`deleted`  tinyint(4) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of categorias
-- ----------------------------
BEGIN;
INSERT INTO `categorias` VALUES ('1', 'politica', 'Política', '2015-11-27 17:41:41', '1', '0'), ('2', 'bandeiras-nacionais', 'Bandeiras Nacionais', '2015-11-27 17:42:03', '1', '0'), ('3', 'times-de-futebol', 'Times de Futebol', '2015-11-27 17:55:34', '1', '0');
COMMIT;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`email`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`name`  varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`created`  datetime NOT NULL ,
`dt_birthdate`  date NULL DEFAULT NULL ,
`gender`  char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`provider`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`facebook_id`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('4', 'danielfpedro@gmail.com', 'Daniel Pedro', '2015-11-27 17:54:35', null, 'ma', 'facebook', '989150231148018');
COMMIT;

-- ----------------------------
-- Auto increment value for `campanhas`
-- ----------------------------
ALTER TABLE `campanhas` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `categorias`
-- ----------------------------
ALTER TABLE `categorias` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `users`
-- ----------------------------
ALTER TABLE `users` AUTO_INCREMENT=5;
