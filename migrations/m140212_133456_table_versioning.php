<?php

class m140212_133456_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','ophouanaestheticsataudit_anaesthetist_lookup');

		$this->execute("alter table ophouanaestheticsataudit_anaesthetist_lookup drop primary key");

		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup','id','int(10) unsigned NOT NULL');

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophouanaestheticsataudit_anaesthetist_lookup")->queryAll() as $i => $row) {
			$this->update('ophouanaestheticsataudit_anaesthetist_lookup',array('id' => $i+1),"user_id = {$row['user_id']}");
		}

		$this->addPrimaryKey('id','ophouanaestheticsataudit_anaesthetist_lookup','id');

		$this->alterColumn('ophouanaestheticsataudit_anaesthetist_lookup','id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','ophouanaestheticsataudit_anaesthetist_lookup','user_id','user','id');

		$this->execute("
CREATE TABLE `et_ophouanaestheticsataudit_anaesthetis_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`anaesthetist_id` int(10) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`non_consultant` tinyint(1) NOT NULL DEFAULT '0',
	`no_anaesthetist` tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophauanaestheticsataudit_anaesthetis_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_anaesthetis_cui_fk` (`created_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_anaesthetis_ev_fk` (`event_id`),
	KEY `acv_et_ophauanaestheticsataudit_anaesthetis_anaesthetist_id_fk` (`anaesthetist_id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_anaesthetis_anaesthetist_id_fk` FOREIGN KEY (`anaesthetist_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_anaesthetis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_anaesthetis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_anaesthetis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophouanaestheticsataudit_anaesthetis_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouanaestheticsataudit_anaesthetis_version');

		$this->createIndex('et_ophouanaestheticsataudit_anaesthetis_aid_fk','et_ophouanaestheticsataudit_anaesthetis_version','id');

		$this->addColumn('et_ophouanaestheticsataudit_anaesthetis_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouanaestheticsataudit_anaesthetis_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouanaestheticsataudit_anaesthetis_version','version_id');
		$this->alterColumn('et_ophouanaestheticsataudit_anaesthetis_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_anaesthetist_lookup_version` (
	`user_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `acv_phauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` (`last_modified_user_id`),
	KEY `acv_phauanaestheticsataudit_anaesthetist_lookup_created_user_fk` (`created_user_id`),
	KEY `acv_ophouanaestheticsataudit_anaesthetist_lookup` (`user_id`),
	CONSTRAINT `acv_ophouanaestheticsataudit_anaesthetist_lookup` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_anaesthetist_lookup_created_user_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_anaesthetist_lookup_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_anaesthetist_lookup_version');

		$this->createIndex('ophouanaestheticsataudit_anaesthetist_lookup_aid_fk','ophouanaestheticsataudit_anaesthetist_lookup_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_anaesthetist_lookup_aid_fk','ophouanaestheticsataudit_anaesthetist_lookup_version','id','ophouanaestheticsataudit_anaesthetist_lookup','id');

		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_anaesthetist_lookup_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_anaesthetist_lookup_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouanaestheticsataudit_notes_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`comments` text,
	`ready_for_discharge_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_auophanaestheticsataudit_notes_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_auophanaestheticsataudit_notes_cui_fk` (`created_user_id`),
	KEY `acv_et_auophanaestheticsataudit_notes_ev_fk` (`event_id`),
	KEY `acv_et_auophanaestheticsataudit_notes_ready_for_discharge_fk` (`ready_for_discharge_id`),
	CONSTRAINT `acv_et_auophanaestheticsataudit_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_auophanaestheticsataudit_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_auophanaestheticsataudit_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_auophanaestheticsataudit_notes_ready_for_discharge_fk` FOREIGN KEY (`ready_for_discharge_id`) REFERENCES `ophouanaestheticsataudit_notes_ready_for_discharge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophouanaestheticsataudit_notes_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouanaestheticsataudit_notes_version');

		$this->createIndex('et_ophouanaestheticsataudit_notes_aid_fk','et_ophouanaestheticsataudit_notes_version','id');

		$this->addColumn('et_ophouanaestheticsataudit_notes_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouanaestheticsataudit_notes_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouanaestheticsataudit_notes_version','version_id');
		$this->alterColumn('et_ophouanaestheticsataudit_notes_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_notes_ready_for_discharge_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_uophanaestheticsataudit_notes_ready_for_discharge_lmui_fk` (`last_modified_user_id`),
	KEY `acv_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_uophanaestheticsataudit_notes_ready_for_discharge_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_notes_ready_for_discharge_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_notes_ready_for_discharge_version');

		$this->createIndex('ophouanaestheticsataudit_notes_ready_for_discharge_aid_fk','ophouanaestheticsataudit_notes_ready_for_discharge_version','id');

		$this->addColumn('ophouanaestheticsataudit_notes_ready_for_discharge_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_notes_ready_for_discharge_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_notes_ready_for_discharge_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_notes_ready_for_discharge_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouanaestheticsataudit_satisfactio_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`pain` int(10) NOT NULL,
	`nausea` int(10) NOT NULL,
	`vomited` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophauanaestheticsataudit_satisfactio_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_satisfactio_cui_fk` (`created_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_satisfactio_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_satisfactio_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_satisfactio_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_satisfactio_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophouanaestheticsataudit_satisfactio_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouanaestheticsataudit_satisfactio_version');

		$this->createIndex('et_ophouanaestheticsataudit_satisfactio_aid_fk','et_ophouanaestheticsataudit_satisfactio_version','id');

		$this->addColumn('et_ophouanaestheticsataudit_satisfactio_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouanaestheticsataudit_satisfactio_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouanaestheticsataudit_satisfactio_version','version_id');
		$this->alterColumn('et_ophouanaestheticsataudit_satisfactio_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouanaestheticsataudit_vitalsigns_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`respiratory_rate_id` int(10) unsigned NOT NULL,
	`oxygen_saturation_id` int(10) unsigned NOT NULL,
	`systolic_id` int(10) unsigned NOT NULL,
	`body_temp_id` int(10) unsigned NOT NULL,
	`heart_rate_id` int(10) unsigned NOT NULL,
	`conscious_lvl_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_cui_fk` (`created_user_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_ev_fk` (`event_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk` (`respiratory_rate_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk` (`oxygen_saturation_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_systolic_fk` (`systolic_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_body_temp_fk` (`body_temp_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk` (`heart_rate_id`),
	KEY `acv_et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk` (`conscious_lvl_id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk` FOREIGN KEY (`conscious_lvl_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_conscious_lvl` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_body_temp_fk` FOREIGN KEY (`body_temp_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_body_temp` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk` FOREIGN KEY (`heart_rate_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_heart_rate` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk` FOREIGN KEY (`oxygen_saturation_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_oxygen_saturation` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk` FOREIGN KEY (`respiratory_rate_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_respiratory_rate` (`id`),
	CONSTRAINT `acv_et_ophauanaestheticsataudit_vitalsigns_systolic_fk` FOREIGN KEY (`systolic_id`) REFERENCES `ophouanaestheticsataudit_vitalsigns_systolic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophouanaestheticsataudit_vitalsigns_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouanaestheticsataudit_vitalsigns_version');

		$this->createIndex('et_ophouanaestheticsataudit_vitalsigns_aid_fk','et_ophouanaestheticsataudit_vitalsigns_version','id');

		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouanaestheticsataudit_vitalsigns_version','version_id');
		$this->alterColumn('et_ophouanaestheticsataudit_vitalsigns_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_body_temp_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_body_temp_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_body_temp_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_body_temp_aid_fk','ophouanaestheticsataudit_vitalsigns_body_temp_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_body_temp_aid_fk','ophouanaestheticsataudit_vitalsigns_body_temp_version','id','ophouanaestheticsataudit_vitalsigns_body_temp','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_body_temp_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_body_temp_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_body_temp_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_body_temp_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_conscious_lvl_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_conscious_lvl_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_conscious_lvl_aid_fk','ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_conscious_lvl_aid_fk','ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','id','ophouanaestheticsataudit_vitalsigns_conscious_lvl','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_heart_rate_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_heart_rate_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_heart_rate_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_heart_rate_aid_fk','ophouanaestheticsataudit_vitalsigns_heart_rate_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_heart_rate_aid_fk','ophouanaestheticsataudit_vitalsigns_heart_rate_version','id','ophouanaestheticsataudit_vitalsigns_heart_rate','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_heart_rate_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_heart_rate_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_heart_rate_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_heart_rate_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phauanaestheticsataudit_vitalsigns_oxygen_saturation_lmui_fk` (`last_modified_user_id`),
	KEY `acv_phauanaestheticsataudit_vitalsigns_oxygen_saturation_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phauanaestheticsataudit_vitalsigns_oxygen_saturation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_vitalsigns_oxygen_saturation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_aid_fk','ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_aid_fk','ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','id','ophouanaestheticsataudit_vitalsigns_oxygen_saturation','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_respiratory_rate_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phauanaestheticsataudit_vitalsigns_respiratory_rate_lmui_fk` (`last_modified_user_id`),
	KEY `acv_phauanaestheticsataudit_vitalsigns_respiratory_rate_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phauanaestheticsataudit_vitalsigns_respiratory_rate_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_vitalsigns_respiratory_rate_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_respiratory_rate_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_respiratory_rate_aid_fk','ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_respiratory_rate_aid_fk','ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','id','ophouanaestheticsataudit_vitalsigns_respiratory_rate','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouanaestheticsataudit_vitalsigns_systolic_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`score` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_systolic_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouanaestheticsataudit_vitalsigns_systolic_version');

		$this->createIndex('ophouanaestheticsataudit_vitalsigns_systolic_aid_fk','ophouanaestheticsataudit_vitalsigns_systolic_version','id');
		$this->addForeignKey('ophouanaestheticsataudit_vitalsigns_systolic_aid_fk','ophouanaestheticsataudit_vitalsigns_systolic_version','id','ophouanaestheticsataudit_vitalsigns_systolic','id');

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_systolic_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouanaestheticsataudit_vitalsigns_systolic_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouanaestheticsataudit_vitalsigns_systolic_version','version_id');
		$this->alterColumn('ophouanaestheticsataudit_vitalsigns_systolic_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_body_temp','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_body_temp_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_heart_rate','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_heart_rate_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_systolic','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouanaestheticsataudit_vitalsigns_systolic_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophouanaestheticsataudit_anaesthetist_lookup','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_body_temp','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_conscious_lvl','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_heart_rate','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_oxygen_saturation','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_respiratory_rate','deleted');
		$this->dropColumn('ophouanaestheticsataudit_vitalsigns_systolic','deleted');

		$this->dropTable('et_ophouanaestheticsataudit_anaesthetis_version');
		$this->dropTable('ophouanaestheticsataudit_anaesthetist_lookup_version');
		$this->dropTable('et_ophouanaestheticsataudit_notes_version');
		$this->dropTable('ophouanaestheticsataudit_notes_ready_for_discharge_version');
		$this->dropTable('et_ophouanaestheticsataudit_satisfactio_version');
		$this->dropTable('et_ophouanaestheticsataudit_vitalsigns_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_body_temp_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_conscious_lvl_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_heart_rate_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_respiratory_rate_version');
		$this->dropTable('ophouanaestheticsataudit_vitalsigns_systolic_version');

		$this->alterColumn('ophouanaestheticsataudit_anaesthetist_lookup','id','int(10) unsigned NOT NULL');

		$this->execute("alter table ophouanaestheticsataudit_anaesthetist_lookup drop primary key");

		$this->dropColumn('ophouanaestheticsataudit_anaesthetist_lookup','id');

		$this->addPrimaryKey('user_id','ophouanaestheticsataudit_anaesthetist_lookup','user_id');
	}
}
