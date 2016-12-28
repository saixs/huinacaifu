DROP TABLE IF EXISTS `{referrals}`;
CREATE TABLE IF NOT EXISTS `{referrals}` (
	`user_id` INT NOT NULL COMMENT '会员ID',
	`online` INT NULL DEFAULT 0 COMMENT '上线用户名',
	`refer` INT DEFAULT NULL COMMENT '下线用户名',
	`regtime` INT DEFAULT NULL COMMENT '注册时间',
	`commission` VARCHAR(30) DEFAULT NULL COMMENT '提成',
	PRIMARY KEY  (`user_id`)
)
ENGINE = MyISAM
COMMENT = '下线信息';
