-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2012 at 02:47 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cishan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_category`
--

CREATE TABLE IF NOT EXISTS `cs_category` (
  `cid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '类别id',
  `name` varchar(32) DEFAULT '' COMMENT '类别名称',
  `parent_id` bigint(19) unsigned DEFAULT '0' COMMENT '上级类别，根节点为0',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_donate`
--

CREATE TABLE IF NOT EXISTS `cs_donate` (
  `did` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '捐款记录id',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '捐款人id 未注册用户为0',
  `anonymous` tinyint(3) unsigned DEFAULT '0' COMMENT '是否匿名捐款，1为是，2为否',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '捐款项目id',
  `money` int(10) unsigned DEFAULT '0' COMMENT '捐款金额，单位为分',
  `name` varchar(32) DEFAULT '' COMMENT '捐款姓名',
  `phone` varchar(16) DEFAULT '' COMMENT '联系电话',
  `process` int(10) unsigned DEFAULT '0' COMMENT '处理进度，1为发起，2为跳转到第三方，3为返回成功，4为返回失败',
  `process_info` varchar(64) DEFAULT '' COMMENT '处理过程中的附加信息（成功，或者失败原因）',
  `provider` int(10) unsigned DEFAULT '0' COMMENT '支付提供商，1为支付宝，2为网银',
  `bank` int(10) unsigned DEFAULT '0' COMMENT '使用银行',
  `provider_bil` varchar(64) DEFAULT '' COMMENT '支付单号',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_group`
--

CREATE TABLE IF NOT EXISTS `cs_group` (
  `gid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '组id',
  `gname` varchar(32) DEFAULT '' COMMENT '组名称',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_head_picture`
--

CREATE TABLE IF NOT EXISTS `cs_head_picture` (
  `hpid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '推荐头图id',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '项目id',
  `cuid` bigint(19) unsigned DEFAULT '0' COMMENT '推荐人id',
  `pic_url` varchar(128) DEFAULT '' COMMENT '推荐图片地址',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1为删除，2为有效',
  PRIMARY KEY (`hpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_invoice`
--

CREATE TABLE IF NOT EXISTS `cs_invoice` (
  `invoice_id` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '发票记录id ',
  `type` tinyint(3) unsigned DEFAULT '0' COMMENT '发票类别，1表示单位 2表示个人',
  `address` varchar(256) DEFAULT '' COMMENT '发票邮寄地址',
  `zip_code` char(8) DEFAULT '' COMMENT '邮政编码',
  `receiver` varchar(32) DEFAULT '' COMMENT '收件人',
  `title` varchar(128) DEFAULT '' COMMENT '发票抬头',
  `phone` varchar(16) DEFAULT '' COMMENT '电话号码',
  `number` varchar(32) DEFAULT '' COMMENT '发票单号',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_item`
--

CREATE TABLE IF NOT EXISTS `cs_item` (
  `iid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '捐物信息id ',
  `receiver` varchar(32) DEFAULT '' COMMENT '收件人姓名',
  `address` varchar(256) DEFAULT '' COMMENT '收件地址',
  `zip_code` char(8) DEFAULT '' COMMENT '邮编',
  `phone` varchar(16) DEFAULT '' COMMENT '联系电话，可以手机也可以固定电话',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_message`
--

CREATE TABLE IF NOT EXISTS `cs_message` (
  `mid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '留言id ',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '用户id',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '项目id',
  `anonymous` tinyint(3) unsigned DEFAULT '0' COMMENT '是否匿名发表 1表示不匿名 2表示匿名',
  `content` varchar(16) DEFAULT '' COMMENT '留言（祝福语）内容',
  `announce` int(10) unsigned DEFAULT '0' COMMENT '是否发布到留言版上，1表示发布，2表示不发布',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_organization`
--

CREATE TABLE IF NOT EXISTS `cs_organization` (
  `oid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '执行机构id',
  `oname` varchar(32) DEFAULT '' COMMENT '执行机构名称',
  `uid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '认领后，为负责人的uid',
  `owner` varchar(32) DEFAULT '' COMMENT '冗余负责人姓名',
  `phone` varchar(16) DEFAULT '' COMMENT '冗余负责人电话',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_passport`
--

CREATE TABLE IF NOT EXISTS `cs_passport` (
  `uid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `gid` bigint(19) unsigned DEFAULT '0' COMMENT '用户组id',
  `email` varchar(255) DEFAULT '' COMMENT 'Email字段 最长32 忽略非主流 字段长度设为255',
  `activate` int(10) unsigned DEFAULT '0' COMMENT '是否已经激活，1表示激活，2表示未激活',
  `nickname` varchar(32) DEFAULT '' COMMENT '用户昵称',
  `password` varchar(16) DEFAULT '' COMMENT '密码，另：密码限制 6-12,数字字母组成',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_possession`
--

CREATE TABLE IF NOT EXISTS `cs_possession` (
  `poss_id` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '捐款要求id ',
  `account_name` varchar(32) DEFAULT '' COMMENT '账户名称',
  `account_id` varchar(32) DEFAULT '' COMMENT '账户卡号',
  `bank_name` varchar(64) DEFAULT '' COMMENT '银行名称',
  `target_money` int(10) unsigned DEFAULT '0' COMMENT '目标捐款金额',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`poss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_project`
--

CREATE TABLE IF NOT EXISTS `cs_project` (
  `pid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '项目id',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '发起用户id',
  `title` varchar(64) DEFAULT '' COMMENT '项目名称',
  `cid` bigint(19) unsigned DEFAULT '0' COMMENT '项目类别',
  `oid` bigint(19) unsigned DEFAULT '0' COMMENT '执行机构 ',
  `assist_object` varchar(32) DEFAULT '' COMMENT '救助对象',
  `province` smallint(5) unsigned DEFAULT '0' COMMENT '所属省份',
  `city` smallint(5) unsigned DEFAULT '0' COMMENT '所属城市',
  `district` smallint(5) unsigned DEFAULT '0' COMMENT '所属地区',
  `start_time` int(10) unsigned DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) unsigned DEFAULT '0' COMMENT '结束时间',
  `support` int(10) unsigned DEFAULT '0' COMMENT '支持人数',
  `poss_id` bigint(19) unsigned DEFAULT '0' COMMENT '捐款要求，0为无捐款',
  `ii_id` bigint(19) unsigned DEFAULT '0' COMMENT '捐物要求，0为无捐物',
  `vi_id` bigint(19) unsigned DEFAULT '0' COMMENT '志愿者要求，0为无志愿者',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示审核中 3表示进行中 4表示已结束 5表示审核未通过',
  `picurl` varchar(255) DEFAULT '' COMMENT '项目图片地址，为序列化的字符串，图片存储按照日期建文件夹（相同前缀）',
  `application_file` varchar(255) DEFAULT '' COMMENT '存放项目的申请材料文件，可以是压缩包，也可以使图片，不过只有一个文件',
  `description` text NOT NULL COMMENT '项目介绍，长文本',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_recmd_project`
--

CREATE TABLE IF NOT EXISTS `cs_recmd_project` (
  `rpid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '推荐项目id',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '项目id',
  `cuid` bigint(19) unsigned DEFAULT '0' COMMENT '推荐人id',
  `title` varchar(64) DEFAULT '' COMMENT '冗余项目名称',
  `description` varchar(255) DEFAULT '' COMMENT '项目简短介绍',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1为删除，2为有效',
  PRIMARY KEY (`rpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_sponsor_feedback`
--

CREATE TABLE IF NOT EXISTS `cs_sponsor_feedback` (
  `sfb_id` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '项目发起人反馈id',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '发起人id',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '项目id',
  `fb_pic` varchar(255) DEFAULT '' COMMENT '反馈图片地址',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  `fb_content` text NOT NULL COMMENT '反馈内容，长文本',
  PRIMARY KEY (`sfb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_summary`
--

CREATE TABLE IF NOT EXISTS `cs_summary` (
  `smid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '统计id',
  `people` bigint(19) unsigned DEFAULT '0' COMMENT '总人数',
  `money` bigint(19) unsigned DEFAULT '0' COMMENT '总钱数',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除，2表示有效',
  PRIMARY KEY (`smid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_support`
--

CREATE TABLE IF NOT EXISTS `cs_support` (
  `uid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '支持用户id',
  `pid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '支持项目id',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示有效',
  PRIMARY KEY (`uid`,`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_token`
--

CREATE TABLE IF NOT EXISTS `cs_token` (
  `tkid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT 'token id',
  `token` char(64) DEFAULT '' COMMENT 'token',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '申请token的用户',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1为删除，2为有效',
  PRIMARY KEY (`tkid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_user`
--

CREATE TABLE IF NOT EXISTS `cs_user` (
  `uid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `idcard` varchar(32) DEFAULT '' COMMENT '身份证号',
  `realname` varchar(16) DEFAULT '' COMMENT '真实姓名',
  `phone` varchar(16) DEFAULT '' COMMENT '联系电话，可能是手机，也可能是固定电话',
  `province` smallint(5) unsigned DEFAULT '0' COMMENT '所在省份',
  `city` smallint(5) unsigned DEFAULT '0' COMMENT '所在城市',
  `district` smallint(5) unsigned DEFAULT '0' COMMENT '所在地区',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_volunteer`
--

CREATE TABLE IF NOT EXISTS `cs_volunteer` (
  `vid` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '志愿者id',
  `uid` bigint(19) unsigned DEFAULT '0' COMMENT '用户id',
  `realname` varchar(32) DEFAULT '' COMMENT '真实姓名',
  `phone` varchar(16) DEFAULT '' COMMENT '联系电话',
  `idcard` varchar(32) DEFAULT '' COMMENT '身份证号',
  `province` smallint(5) unsigned DEFAULT '0' COMMENT '所在省份',
  `city` smallint(5) unsigned DEFAULT '0' COMMENT '所在城市',
  `district` smallint(5) unsigned DEFAULT '0' COMMENT '所在地区',
  `description` varchar(128) DEFAULT '' COMMENT '备注信息',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除 2表示审核未通过，3表示审核已通过',
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_volunteer_feedback`
--

CREATE TABLE IF NOT EXISTS `cs_volunteer_feedback` (
  `vfb_id` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '志愿者反馈id',
  `vid` bigint(19) unsigned DEFAULT '0' COMMENT '志愿者id',
  `pid` bigint(19) unsigned DEFAULT '0' COMMENT '项目id',
  `fb_pic` varchar(256) DEFAULT '' COMMENT '反馈图片地址',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态，1表示删除,2表示未发布，3表示已发布',
  `fb_content` text NOT NULL COMMENT '反馈内容，长文本',
  PRIMARY KEY (`vfb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cs_volunteer_info`
--

CREATE TABLE IF NOT EXISTS `cs_volunteer_info` (
  `vi_id` bigint(19) unsigned NOT NULL DEFAULT '0' COMMENT '志愿者信息id',
  `number` smallint(5) unsigned DEFAULT '0' COMMENT '志愿者数量',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `modify_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '记录状态 1表示删除 2表示有效',
  PRIMARY KEY (`vi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
