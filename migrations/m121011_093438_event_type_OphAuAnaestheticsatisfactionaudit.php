<?php
class m121011_093438_event_type_OphAuAnaestheticsatisfactionaudit extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','respiratory_rate');
		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation');
		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','systolic_blood_pressure');
		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','body_temperature');
		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','heart_rate');

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_respiratory_rate
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate',array('name'=>'8 or less','display_order'=>1, 'score' => 3));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate',array('name'=>'9-11','display_order'=>2, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate',array('name'=>'12-20','display_order'=>3, 'score' => 0));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate',array('name'=>'21-24','display_order'=>4, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate',array('name'=>'25 or above','display_order'=>5, 'score' => 3));

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation',array('name'=>'85 or lower','display_order'=>1, 'score' => 3));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation',array('name'=>'85-89','display_order'=>2, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation',array('name'=>'90-94','display_order'=>3, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation',array('name'=>'95 or above','display_order'=>4, 'score' => 0));

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_systolic
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_systolic', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'70 or lower','display_order'=>1, 'score' => 3));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'71-80','display_order'=>2, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'81-95','display_order'=>3, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'96-189','display_order'=>4, 'score' => 0));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'190-199','display_order'=>5, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_systolic',array('name'=>'200 or above','display_order'=>6, 'score' => 3));

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_body_temp
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_body_temp', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'35 or lower','display_order'=>1, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'35.1-36','display_order'=>2, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'36.1-37.4','display_order'=>3, 'score' => 0));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'37.5-38.4','display_order'=>4, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'38.5-38.9','display_order'=>5, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_body_temp',array('name'=>'39 or above','display_order'=>6, 'score' => 3));

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_heart_rate
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_heart_rate', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'40 or lower','display_order'=>1, 'score' => 3));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'41-50','display_order'=>2, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'51-100','display_order'=>3, 'score' => 0));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'101-110','display_order'=>4, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'111-129','display_order'=>5, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_heart_rate',array('name'=>'130 or above','display_order'=>6, 'score' => 3));

		// element lookup table et_ophauanaestheticsataudit_vitalsigns_conscious_lvl
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'score' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'New agitation confusion','display_order'=>1, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'Alert','display_order'=>2, 'score' => 0));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'Responds to VERBAL commands','display_order'=>3, 'score' => 1));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'Responds to PAIN','display_order'=>4, 'score' => 2));
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'Unresponsive','display_order'=>5, 'score' => 3));



		// update the element type table with the new fields
		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','respiratory_rate_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk','et_ophauanaestheticsataudit_vitalsigns','respiratory_rate_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk','et_ophauanaestheticsataudit_vitalsigns','respiratory_rate_id','et_ophauanaestheticsataudit_vitalsigns_respiratory_rate','id');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk','et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk','et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation_id','et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation','id');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','systolic_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_systolic_fk','et_ophauanaestheticsataudit_vitalsigns','systolic_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_systolic_fk','et_ophauanaestheticsataudit_vitalsigns','systolic_id','et_ophauanaestheticsataudit_vitalsigns_systolic','id');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','body_temp_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_body_temp_fk','et_ophauanaestheticsataudit_vitalsigns','body_temp_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_body_temp_fk','et_ophauanaestheticsataudit_vitalsigns','body_temp_id','et_ophauanaestheticsataudit_vitalsigns_body_temp','id');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','heart_rate_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk','et_ophauanaestheticsataudit_vitalsigns','heart_rate_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk','et_ophauanaestheticsataudit_vitalsigns','heart_rate_id','et_ophauanaestheticsataudit_vitalsigns_heart_rate','id');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','conscious_lvl_id','int(10) unsigned NOT NULL');

		$this->createIndex('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk','et_ophauanaestheticsataudit_vitalsigns','conscious_lvl_id');

		$this->addForeignKey('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk','et_ophauanaestheticsataudit_vitalsigns','conscious_lvl_id','et_ophauanaestheticsataudit_vitalsigns_conscious_lvl','id');


	}

	public function down()
	{
		// update the element type table with the new fields
		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','respiratory_rate_id');

		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation_id');

		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_systolic_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_systolic_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','systolic_id');

		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_body_temp_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_body_temp_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','body_temp_id');

		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_heart_rate_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','heart_rate_id');

		$this->dropForeignKey('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropIndex('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_fk','et_ophauanaestheticsataudit_vitalsigns');

		$this->dropColumn('et_ophauanaestheticsataudit_vitalsigns','conscious_lvl_id');

		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate');
		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation');
		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_systolic');
		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_body_temp');
		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_heart_rate');
		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl');

		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','respiratory_rate', 'int(10) unsigned NOT NULL');
		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','oxygen_saturation', 'int(10) unsigned NOT NULL');
		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','systolic_blood_pressure', 'int(10) unsigned NOT NULL');
		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','body_temperature', 'decimal (3, 1) NOT NULL');
		$this->addColumn('et_ophauanaestheticsataudit_vitalsigns','heart_rate', 'int(10) unsigned NOT NULL');
	}
}
?>
