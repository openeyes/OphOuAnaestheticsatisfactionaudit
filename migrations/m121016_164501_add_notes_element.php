<?php 
class m121016_164501_add_notes_element extends CDbMigration
{
	public function up() {

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Notes',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Notes','class_name' => 'Element_OphAuAnaestheticsatisfactionaudit_Notes', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Notes'))->queryRow();

		// element lookup table et_auophanaestheticsataudit_notes_ready_for_discharge
		$this->createTable('et_auophanaestheticsataudit_notes_ready_for_discharge', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_auophanaestheticsataudit_notes_ready_for_discharge_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_ready_for_discharge_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_auophanaestheticsataudit_notes_ready_for_discharge',array('name'=>'Yes','display_order'=>1));
		$this->insert('et_auophanaestheticsataudit_notes_ready_for_discharge',array('name'=>'No','display_order'=>2));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_auophanaestheticsataudit_notes', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'comments' => 'text DEFAULT \'\'', // Comments
				'ready_for_discharge_id' => 'int(10) unsigned NOT NULL', // Ready for discharge from recovery
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_auophanaestheticsataudit_notes_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_auophanaestheticsataudit_notes_cui_fk` (`created_user_id`)',
				'KEY `et_auophanaestheticsataudit_notes_ev_fk` (`event_id`)',
				'KEY `et_auophanaestheticsataudit_notes_ready_for_discharge_fk` (`ready_for_discharge_id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_auophanaestheticsataudit_notes_ready_for_discharge_fk` FOREIGN KEY (`ready_for_discharge_id`) REFERENCES `et_auophanaestheticsataudit_notes_ready_for_discharge` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');


	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		$this->dropTable('et_auophanaestheticsataudit_notes');


		$this->dropTable('et_auophanaestheticsataudit_notes_ready_for_discharge');

		$this->delete('element_type','event_type_id='.$event_type['id']." and class_name = 'Element_OphAuAnaestheticsatisfactionaudit_Notes'");

	}
}
?>