<?php
class m121010_085427_event_type_OphAuAnaestheticsatisfactionaudit extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Outcomes'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphAuAnaestheticsatisfactionaudit', 'name' => 'Anaesthetic Satisfaction Audit','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anaesthetist',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anaesthetist','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_Anaesthetist', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anaesthetist'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Satisfaction',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Satisfaction','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_Satisfaction', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Satisfaction'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Vital Signs',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Vital Signs','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_VitalSigns', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Vital Signs'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Ramsay Score',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Ramsay Score','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_RamsayScore', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Ramsay Score'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophauanaestheticsataudit_anaesthetis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'anaesthetist_id' => 'int(10) unsigned NOT NULL', // Anaesthetist
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetis_cui_fk` (`created_user_id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetis_ev_fk` (`event_id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetis_anaesthetist_id_fk` (`anaesthetist_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetis_anaesthetist_id_fk` FOREIGN KEY (`anaesthetist_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophauanaestheticsataudit_satisfactio', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'pain' => 'int(10) NOT NULL', // Pain
				'nausea' => 'int(10) NOT NULL', // Nausea
				'vomited' => 'tinyint(1) unsigned NOT NULL', // Vomited
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_satisfactio_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_satisfactio_cui_fk` (`created_user_id`)',
				'KEY `et_ophauanaestheticsataudit_satisfactio_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_satisfactio_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_satisfactio_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_satisfactio_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophauanaestheticsataudit_vitalsigns', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'respiratory_rate' => 'int(10) unsigned NOT NULL', // Respiratory rate
				'oxygen_saturation' => 'int(10) unsigned NOT NULL', // Oxygen Saturation
				'systolic_blood_pressure' => 'int(10) unsigned NOT NULL', // Systolic Blood Pressure
				'body_temperature' => 'decimal (3, 1) NOT NULL', // Body Temperature
				'heart_rate' => 'int(10) unsigned NOT NULL', // Heart Rate
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_cui_fk` (`created_user_id`)',
				'KEY `et_ophauanaestheticsataudit_vitalsigns_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_vitalsigns_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

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

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophauanaestheticsataudit_anaesthetis');



		$this->dropTable('et_ophauanaestheticsataudit_satisfactio');



		$this->dropTable('et_ophauanaestheticsataudit_vitalsigns');



		$this->dropTable('et_ophauanaestheticsataudit_ramsayscore');


		$this->dropTable('et_ophauanaestheticsataudit_ramsayscore_score');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphAuAnaestheticsatisfactionaudit does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
