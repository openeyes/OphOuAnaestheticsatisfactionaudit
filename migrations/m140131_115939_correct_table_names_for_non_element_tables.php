<?php

class m140131_115939_correct_table_names_for_non_element_tables extends CDbMigration
{
	public $tables = array(
		'et_ophouanaestheticsataudit_notes_ready_for_discharge' => array(
			'cui' => 'et_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk',
			'lmui' => 'et_auophanaestheticsataudit_notes_ready_for_discharge_lmui_fk',
			'version_fks' => array(
				'acv_et_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk' => array(
					'name' => 'acv_auophanaestheticsataudit_notes_ready_for_discharge_cui_fk',
					'field' => 'created_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'et_ophouanaestheticsataudit_notes_ready_for_discharge_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_notes_ready_for_discharge_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_notes_ready_for_discharge',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_body_temp' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk',
			'version_fks' => array(
				'acv_et_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_body_temp_lmui_fk',
					'field' => 'last_modified_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'acv_et_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_body_temp_cui_fk',
					'field' => 'created_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'et_ophouanaestheticsataudit_vitalsigns_body_temp_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_body_temp_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_body_temp',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_conscious_lvl' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk',
			'version_fks' => array(
				'acv_et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_lmui_fk',
					'field' => 'last_modified_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'acv_et_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_conscious_lvl_cui_fk',
					'field' => 'created_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'et_ophouanaestheticsataudit_vitalsigns_conscious_lvl_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_conscious_lvl_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_conscious_lvl',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_heart_rate' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk',
			'version_fks' => array(
				'acv_et_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_heart_rate_lmui_fk',
					'field' => 'last_modified_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'acv_et_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_heart_rate_cui_fk',
					'field' => 'created_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'et_ophouanaestheticsataudit_vitalsigns_heart_rate_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_heart_rate_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_heart_rate',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_oxygen_saturation_lmui_fk',
			'version_fks' => array(
				'et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_oxygen_saturation_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_oxygen_saturation',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_respiratory_rate' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_respiratory_rate_lmui_fk',
			'version_fks' => array(
				'et_ophouanaestheticsataudit_vitalsigns_respiratory_rate_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_respiratory_rate_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_respiratory_rate',
					'remote_field' => 'id',
				),
			),
		),
		'et_ophouanaestheticsataudit_vitalsigns_systolic' => array(
			'cui' => 'et_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk',
			'lmui' => 'et_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk',
			'version_fks' => array(
				'acv_et_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_systolic_lmui_fk',
					'field' => 'last_modified_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'acv_et_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk' => array(
					'name' => 'acv_ophauanaestheticsataudit_vitalsigns_systolic_cui_fk',
					'field' => 'created_user_id',
					'table' => 'user',
					'remote_field' => 'id',
				),
				'et_ophouanaestheticsataudit_vitalsigns_systolic_aid_fk' => array(
					'name' => 'ophouanaestheticsataudit_vitalsigns_systolic_aid_fk',
					'field' => 'id',
					'table' => 'ophouanaestheticsataudit_vitalsigns_systolic',
					'remote_field' => 'id',
				),
			),
		),
	);

	public function up()
	{
		$this->dropForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('et_ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('et_ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('et_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','et_ophouanaestheticsataudit_anaesthetist_lookup');

		$this->renameTable('et_ophouanaestheticsataudit_anaesthetist_lookup','ophouanaestheticsataudit_anaesthetist_lookup');

		$this->addForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','ophouanaestheticsataudit_anaesthetist_lookup','user_id','user','id');
		$this->addForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','ophouanaestheticsataudit_anaesthetist_lookup','last_modified_user_id','user','id');
		$this->addForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','ophouanaestheticsataudit_anaesthetist_lookup','created_user_id','user','id');

		foreach ($this->tables as $table => $data) {
			$target = preg_replace('/^et_/','',$table);

			$cui = isset($data['cui']) ? $data['cui'] : $table.'_cui_fk';
			$lmui = isset($data['lmui']) ? $data['lmui'] : $table.'_lmui_fk';

			$this->dropForeignKey($cui,$table);
			$this->dropForeignKey($lmui,$table);
			$this->dropIndex($cui,$table);
			$this->dropIndex($lmui,$table);
			$this->renameTable($table, $target);
			$this->addForeignKey($target.'_cui_fk',$target,'created_user_id','user','id');
			$this->addForeignKey($target.'_lmui_fk',$target,'last_modified_user_id','user','id');

			foreach ($data['version_fks'] as $version_fk => $params) {
				$this->dropForeignKey($version_fk, $table.'_version');
				$this->dropIndex($version_fk, $table.'_version');
			}

			$this->renameTable($table.'_version', $target.'_version');

			foreach ($data['version_fks'] as $version_fk => $params) {
				$this->addForeignKey($params['name'], $target.'_version', $params['field'], $params['table'], $params['remote_field']);
			}
		}
	}

	public function down()
	{
		$this->dropForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropForeignKey('ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','ophouanaestheticsataudit_anaesthetist_lookup');
		$this->dropIndex('ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','ophouanaestheticsataudit_anaesthetist_lookup');

		$this->renameTable('ophouanaestheticsataudit_anaesthetist_lookup','et_ophouanaestheticsataudit_anaesthetist_lookup');

		$this->addForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk','et_ophouanaestheticsataudit_anaesthetist_lookup','user_id','user','id');
		$this->addForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk','et_ophouanaestheticsataudit_anaesthetist_lookup','created_user_id','user','id');

		foreach ($this->tables as $target => $data) {
			$table = preg_replace('/^et_/','',$target);

			$cui = isset($data['cui']) ? $data['cui'] : $table.'_cui_fk';
			$lmui = isset($data['lmui']) ? $data['lmui'] : $table.'_lmui_fk';

			$this->dropForeignKey($table.'_cui_fk',$table);
			$this->dropForeignKey($table.'_lmui_fk',$table);
			$this->dropIndex($table.'_cui_fk',$table);
			$this->dropIndex($table.'_lmui_fk',$table);
			$this->renameTable($table, $target);
			$this->addForeignKey($cui,$target,'created_user_id','user','id');
			$this->addForeignKey($lmui,$target,'last_modified_user_id','user','id');

			foreach ($data['version_fks'] as $version_fk => $params) {
				$this->dropForeignKey($params['name'], $table.'_version');
				$this->dropIndex($params['name'], $table.'_version');
			}

			$this->renameTable($table.'_version', $target.'_version');

			foreach ($data['version_fks'] as $version_fk => $params) {
				if (preg_match('/^oph/',$params['table'])) {
					$params['table'] = 'et_'.$params['table'];
				}

				$this->addForeignKey($version_fk, $target.'_version', $params['field'], $params['table'], $params['remote_field']);
			}
		}
	}
}
