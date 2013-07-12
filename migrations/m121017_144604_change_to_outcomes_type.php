<?php

class m121017_144604_change_to_outcomes_type extends CDbMigration
{
	public function up()
	{
		// change event type class name
		$this->update('event_type', array('class_name' => 'OphOuAnaestheticsatisfactionaudit'), 'name="Anaesthetic Satisfaction Audit"');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Anaesthetic Satisfaction Audit'))->queryRow();

		// change event element class names and their related table(s)
		$this->update('element_type', array('class_name' => 'Element_OphOuAnaestheticsatisfactionaudit_Anaesthetist'), 'event_type_id = ' . $event_type['id'] .' and name = "Anaesthetist"');
		$this->renameTable('et_ophauanaestheticsataudit_anaesthetis', 'et_ophouanaestheticsataudit_anaesthetis');

		$this->renameTable('et_ophauanaestheticsataudit_anaesthetist_lookup', 'et_ophouanaestheticsataudit_anaesthetist_lookup');

		$this->update('element_type', array('class_name' => 'Element_OphOuAnaestheticsatisfactionaudit_Satisfaction'), 'event_type_id = ' . $event_type['id'] . ' and name = "Satisfaction"');
		$this->renameTable('et_ophauanaestheticsataudit_satisfactio', 'et_ophouanaestheticsataudit_satisfactio');

		$this->update('element_type', array('class_name' => 'Element_OphOuAnaestheticsatisfactionaudit_VitalSigns'), 'event_type_id = ' . $event_type['id'] . ' and name = "Vital Signs"');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns', 'et_ophouanaestheticsataudit_vitalsigns');

		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_respiratory_rate', 'et_ophouanaestheticsataudit_vitalsigns_respiratory_rate');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation', 'et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_systolic', 'et_ophouanaestheticsataudit_vitalsigns_systolic');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_body_temp','et_ophouanaestheticsataudit_vitalsigns_body_temp');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_heart_rate', 'et_ophouanaestheticsataudit_vitalsigns_heart_rate');
		$this->renameTable('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl', 'et_ophouanaestheticsataudit_vitalsigns_conscious_lvl');

		$this->update('element_type', array('class_name' => 'Element_OphOuAnaestheticsatisfactionaudit_Notes'), 'event_type_id = ' . $event_type['id'] . ' and name = "Notes"');
		$this->renameTable('et_auophanaestheticsataudit_notes', 'et_ophouanaestheticsataudit_notes');
		$this->renameTable('et_auophanaestheticsataudit_notes_ready_for_discharge', 'et_ophouanaestheticsataudit_notes_ready_for_discharge');
	}

	public function down()
	{
		echo "m121017_144604_change_to_outcomes_type does not support migration down.\n";
		return false;
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
