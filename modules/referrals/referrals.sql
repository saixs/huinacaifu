DROP TABLE IF EXISTS `{referrals}`;
CREATE TABLE IF NOT EXISTS `{referrals}` (
	`user_id` INT NOT NULL COMMENT '��ԱID',
	`online` INT NULL DEFAULT 0 COMMENT '�����û���',
	`refer` INT DEFAULT NULL COMMENT '�����û���',
	`regtime` INT DEFAULT NULL COMMENT 'ע��ʱ��',
	`commission` VARCHAR(30) DEFAULT NULL COMMENT '���',
	PRIMARY KEY  (`user_id`)
)
ENGINE = MyISAM
COMMENT = '������Ϣ';
