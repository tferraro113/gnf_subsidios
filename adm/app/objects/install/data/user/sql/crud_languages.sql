/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : phpadminpro_v1.0

 Target Server Type    : MySQL
 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 05/02/2013 10:49:33 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `crud_languages`
-- ----------------------------
DROP TABLE IF EXISTS `crud_languages`;
CREATE TABLE `crud_languages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(255) DEFAULT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `crud_languages`
-- ----------------------------
BEGIN;
INSERT INTO `crud_languages` (`id`, `language_code`, `language_name`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'en_US', 'English (United States)', 1, '2013-04-24 00:16:13', 1, '2013-04-29 23:34:48'),
(2, 'it_IT', 'Italian (italy)', 1, '2013-09-21 23:21:43', NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
