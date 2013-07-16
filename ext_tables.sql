#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	privacy tinyint(1) unsigned DEFAULT '0' NOT NULL,
	authentication_code varchar(255) DEFAULT '' NOT NULL,
	moderator_approval tinyint(1) unsigned DEFAULT '0' NOT NULL,
	moderator_approvalate_d int(11) DEFAULT '0' NOT NULL,
	user_approval tinyint(1) unsigned DEFAULT '0' NOT NULL,

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);