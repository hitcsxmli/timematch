/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : timematching

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-01-20 20:12:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tim_activity`
-- ----------------------------
DROP TABLE IF EXISTS `tim_activity`;
CREATE TABLE `tim_activity` (
  `ActivityId` int(100) NOT NULL AUTO_INCREMENT,
  `ActivityTitle` varchar(500) DEFAULT NULL COMMENT '活动标题',
  `ActivityLeaderId` varchar(100) DEFAULT 'userId' COMMENT '活动发起者',
  `ActivityPlace` varchar(100) DEFAULT NULL,
  `ActivityLeaderName` varchar(100) DEFAULT NULL COMMENT '发起者姓名',
  `ActivityRemark` varchar(500) DEFAULT '无' COMMENT '其他说明',
  `ActivityStartDate` date DEFAULT NULL COMMENT '活动开始时间',
  `ActivityEndDate` date DEFAULT NULL COMMENT '活动结束日期',
  `ActivityIdMd5` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ActivityId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tim_activity
-- ----------------------------
INSERT INTO `tim_activity` VALUES ('4', 'a', 'userId', 'a', 'a', 'a', null, null, null);
INSERT INTO `tim_activity` VALUES ('5', 'll', 'userId', 'll', 'll', 'll', null, null, null);
INSERT INTO `tim_activity` VALUES ('6', '感知计算党支部发展大会2345789', 'userId', '综合楼21623457896', '李晓明2345789', '无2345789', null, null, null);
INSERT INTO `tim_activity` VALUES ('7', 'test title', 'asd', '综合楼701', '张三', '无', null, null, null);
INSERT INTO `tim_activity` VALUES ('8', 'testa', 'userId', '综合楼', '离我好', '眼底哦饭', '2015-11-11', '2015-11-11', null);
INSERT INTO `tim_activity` VALUES ('9', '新增活动', 'userId', '新增活动地', '新增活动发起人', '新增活动备注', '1970-01-01', '1970-01-01', null);
INSERT INTO `tim_activity` VALUES ('10', '1', 'userId', '1', '1', '1212', '1970-01-01', '1970-01-01', null);
INSERT INTO `tim_activity` VALUES ('11', '新增活动3', 'o0JATs9whVPA80hiMToUlMcQtppE', '新增活动地点', '新增活动发起人', '新增备注3', '2015-12-27', '2015-12-31', null);
INSERT INTO `tim_activity` VALUES ('12', '创客面对面', 'o0JATs9whVPA80hiMToUlMcQtppE', '管楼216', '孙中元', '咖啡', '2015-12-28', '2015-12-28', null);
INSERT INTO `tim_activity` VALUES ('13', '我', 'userId', '是', '说', '顶多', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('14', '额', 'userId', '人', '他', '一', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('15', '他', 'userId', '一', 'u', '顶多', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('16', '123', 'userId', '123', '123', 'asdd', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('17', '134', 'userId', '11', '11', '112', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('18', '1', null, '1', '1', '1', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('19', '2', null, '2', '2', '22', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('20', '3', null, '3', '3', '3', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('21', '4', '4', '4', '4', '44', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('23', '在', '4', '在', '在', '在', '2016-01-14', '2016-01-15', null);
INSERT INTO `tim_activity` VALUES ('24', '啊', '4', '啊', '啊', '啊啊', '2016-01-14', '2016-01-18', null);
INSERT INTO `tim_activity` VALUES ('36', '测试md5', 'o0JATs9whVPA80hiMToUlMcQtppE', '综合楼', '李晓明', '哈哈哈', '2016-01-17', '2016-01-18', '19ca14e7ea6328a42e0eb13d585e4c22');
INSERT INTO `tim_activity` VALUES ('37', '助管开会', 'o0JATs9whVPA80hiMToUlMcQtppE', '综合楼305', '李晓明', '', '2016-01-18', '2016-01-20', 'a5bfc9e07964f8dddeb95fc584cd965d');
INSERT INTO `tim_activity` VALUES ('38', '商量假期任务', 'o0JATsynccYy7AJW1Yv9bSLpIXqU', '一区成教或管院', '王战威', '', '2016-01-18', '2016-01-20', 'a5771bce93e200c36f7cd9dfd0e5deaa');
INSERT INTO `tim_activity` VALUES ('39', '三人行', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '待定', '小明', '哈哈哈哈', '2016-01-19', '2016-01-20', 'd67d8ab4f4c10bf22aa353e27879133c');

-- ----------------------------
-- Table structure for `tim_record`
-- ----------------------------
DROP TABLE IF EXISTS `tim_record`;
CREATE TABLE `tim_record` (
  `RecordId` int(100) NOT NULL AUTO_INCREMENT,
  `RecordDate` date DEFAULT NULL,
  `RecordDateStart` int(2) DEFAULT NULL,
  `RecordDateEnd` int(2) DEFAULT NULL,
  `RecordUserId` varchar(100) DEFAULT NULL,
  `RecordActivityId` varchar(100) DEFAULT NULL,
  `RecordUserName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tim_record
-- ----------------------------
INSERT INTO `tim_record` VALUES ('6', '2015-12-27', '0', '2', 'test', '11', '小刚');
INSERT INTO `tim_record` VALUES ('7', '2015-12-28', '0', '4', 'test', '11', '小刚');
INSERT INTO `tim_record` VALUES ('8', '2015-12-29', '0', '6', 'test', '11', '小刚');
INSERT INTO `tim_record` VALUES ('9', '2015-12-27', '0', '8', 'test3', '11', '小亮');
INSERT INTO `tim_record` VALUES ('10', '2015-12-31', '0', '10', 'test', '11', '小刚');
INSERT INTO `tim_record` VALUES ('11', '2015-12-27', '1', '4', 'test2', '11', '小红');
INSERT INTO `tim_record` VALUES ('12', '2015-12-28', '0', '3', 'test2', '11', '小红');
INSERT INTO `tim_record` VALUES ('13', '2015-12-29', '0', '0', 'test2', '11', '小红');
INSERT INTO `tim_record` VALUES ('14', '2015-12-30', '0', '7', 'test2', '11', '小红');
INSERT INTO `tim_record` VALUES ('15', '2015-12-31', '0', '9', 'test2', '11', '小红');
INSERT INTO `tim_record` VALUES ('16', '2015-12-28', '3', '9', 'test2', '12', '小红');
INSERT INTO `tim_record` VALUES ('42', '2015-12-27', '2', '3', 'o0JATs9whVPA80hiMToUlMcQtppE', '11', '小明');
INSERT INTO `tim_record` VALUES ('43', '2015-12-28', '0', '5', 'o0JATs9whVPA80hiMToUlMcQtppE', '11', '小明');
INSERT INTO `tim_record` VALUES ('44', '2015-12-29', '4', '6', 'o0JATs9whVPA80hiMToUlMcQtppE', '11', '小明');
INSERT INTO `tim_record` VALUES ('45', '2015-12-30', '2', '3', 'o0JATs9whVPA80hiMToUlMcQtppE', '11', '小明');
INSERT INTO `tim_record` VALUES ('46', '2015-12-31', '8', '12', 'o0JATs9whVPA80hiMToUlMcQtppE', '11', '小明');
INSERT INTO `tim_record` VALUES ('47', '2016-01-17', '5', '11', 'o0JATs9whVPA80hiMToUlMcQtppE', '36', '小明要努力啦');
INSERT INTO `tim_record` VALUES ('48', '2016-01-18', '2', '8', 'o0JATs9whVPA80hiMToUlMcQtppE', '36', '小明要努力啦');
INSERT INTO `tim_record` VALUES ('49', '2016-01-17', '4', '11', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '36', '小明要加油啦');
INSERT INTO `tim_record` VALUES ('50', '2016-01-18', '0', '3', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '36', '小明要加油啦');
INSERT INTO `tim_record` VALUES ('51', '2016-01-18', '2', '4', 'o0JATs9whVPA80hiMToUlMcQtppE', '37', '小明要努力啦');
INSERT INTO `tim_record` VALUES ('52', '2016-01-19', '7', '11', 'o0JATs9whVPA80hiMToUlMcQtppE', '37', '小明要努力啦');
INSERT INTO `tim_record` VALUES ('53', '2016-01-20', '8', '12', 'o0JATs9whVPA80hiMToUlMcQtppE', '37', '小明要努力啦');
INSERT INTO `tim_record` VALUES ('54', '2016-01-19', '2', '11', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '39', '小明要加油啦');
INSERT INTO `tim_record` VALUES ('55', '2016-01-20', '3', '13', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '39', '小明要加油啦');
INSERT INTO `tim_record` VALUES ('56', '2016-01-19', '2', '9', 'o0JATsynccYy7AJW1Yv9bSLpIXqU', '39', '小帅熊');
INSERT INTO `tim_record` VALUES ('57', '2016-01-20', '2', '11', 'o0JATsynccYy7AJW1Yv9bSLpIXqU', '39', '小帅熊');
INSERT INTO `tim_record` VALUES ('58', '2016-01-19', '3', '8', 'o0JATs042CGueJrWcKyk6PRcgf5Y', '39', '中元');
INSERT INTO `tim_record` VALUES ('59', '2016-01-20', '0', '0', 'o0JATs042CGueJrWcKyk6PRcgf5Y', '39', '中元');

-- ----------------------------
-- Table structure for `tim_user`
-- ----------------------------
DROP TABLE IF EXISTS `tim_user`;
CREATE TABLE `tim_user` (
  `UserId` int(100) NOT NULL AUTO_INCREMENT,
  `UserOpenid` varchar(200) DEFAULT '用户的openid',
  `UserNickName` varchar(200) DEFAULT NULL,
  `UserCity` varchar(100) DEFAULT NULL,
  `UserSex` int(1) DEFAULT NULL,
  `UserProvince` varchar(100) DEFAULT NULL COMMENT '1为男',
  `UserCountry` varchar(100) DEFAULT NULL,
  `UserHeadImgUrl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tim_user
-- ----------------------------
INSERT INTO `tim_user` VALUES ('14', 'o0JATs0EAfwtFGwhbzXkrbQdSpgs', '小明要加油啦', '哈尔滨', '1', '黑龙江', '中国', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKvPDtNxfk8ibAcicojljWHu4pW9tHnC1OgsqqEPkx7S1U4xoxNh7pdc6d9gpBNiblNqWjvj54uNv0ibQ/0');
INSERT INTO `tim_user` VALUES ('30', 'o0JATs9whVPA80hiMToUlMcQtppE', '小明要努力啦', '哈尔滨', '1', '黑龙江', '中国', 'http://wx.qlogo.cn/mmopen/0TZ5FJqOgiclqiaRhStXUjfjJgYPzqfxLmInLZox78QObdDxAjtWVIVIiaeyBKbyADUlibNklw2sSBblMNstgR4ia9CgFtN6dTAKQ/0');
INSERT INTO `tim_user` VALUES ('33', 'o0JATsynccYy7AJW1Yv9bSLpIXqU', '小帅熊', '哈尔滨', '1', '黑龙江', '中国', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKUjAHyW56XTFsB3tTr5cwib0WrK93iaKA01C5ZEt4uycXzcyx9PtQRbgoPSvVstY4UZGlu20AqkwKA/0');
INSERT INTO `tim_user` VALUES ('34', 'o0JATs042CGueJrWcKyk6PRcgf5Y', '中元', '哈尔滨', '1', '黑龙江', '中国', 'http://wx.qlogo.cn/mmopen/0T8yO33zeehMz60wu4ZDZdY9eEmqF39Rsb9LxMy1LVibVXLavIfMCXwb3n1c6RoMIudv1OgvS9L3u2kwAJeVWicg/0');
INSERT INTO `tim_user` VALUES ('35', 'o0JATsxgKBDecPK5XEOp4V8CmuKQ', '吴昊Amber', '哈尔滨', '2', '黑龙江', '中国', 'http://wx.qlogo.cn/mmopen/0T8yO33zeegMJ6dIMnTk6w1NTGq5LnCrgGDxWtibEiac51Sxqar6icsNHWncWJLJcRHvSlZGNQmdziadLaHjCXGQJS9KGXOvpKov/0');
INSERT INTO `tim_user` VALUES ('36', 'o0JATs6PsMteXB8cB7LrQiRQfVFw', 'Cherub', '', '1', '巴黎', '法国', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM48zxACBdGgjG3icibpeAz0OMunGic1ejFYYgegPAxnzWMOtRsxIdlGFbD9HqjlDGNYySc0hGBQn2ayw/0');
