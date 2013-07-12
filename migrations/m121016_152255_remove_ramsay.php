<?php

class m121016_152255_remove_ramsay extends CDbMigration
{
	public function up()
	{
		$this->dropTable('et_ophauanaestheticsataudit_ramsayscore');
		$this->dropTable('et_ophauanaestheticsataudit_ramsayscore_score');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		if ($this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Ramsay Score',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->delete('element_type', "class_name = 'Element_OphAuAnaestheticsatisfactionaudit_RamsayScore' AND event_type_id = " . $event_type['id']);
		}
	}

	public function down()
	{
		echo "***WARNING: data will not be restored, but ramsay score will be made available again***\nCode will need to be restored from the repository as well\n";

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Ramsay Score',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Ramsay Score','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_RamsayScore', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		// element lookup table et_ophauanaestheticsataudit_ramsayscore_score
		$this->createTable('et_ophauanaestheticsataudit_ramsayscore_score', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_score_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_score_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_score_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_score_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'1 - Anxious or restless or both','display_order'=>1));
		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'2 - Cooperative, orientated and tranquil','display_order'=>2));
		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'3 - Responding to commands','display_order'=>3));
		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'4 - Brisk response to stimulus','display_order'=>4));
		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'5 - Sluggish response to stimulus','display_order'=>5));
		$this->insert('et_ophauanaestheticsataudit_ramsayscore_score',array('name'=>'6 - No response to stimulus','display_order'=>6));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophauanaestheticsataudit_ramsayscore', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'score_id' => 'int(10) unsigned NOT NULL', // Score
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_cui_fk` (`created_user_id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_ev_fk` (`event_id`)',
				'KEY `et_ophauanaestheticsataudit_ramsayscore_score_fk` (`score_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_ramsayscore_score_fk` FOREIGN KEY (`score_id`) REFERENCES `et_ophauanaestheticsataudit_ramsayscore_score` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
