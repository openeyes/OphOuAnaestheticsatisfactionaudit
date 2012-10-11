<?php

class DefaultController extends BaseEventTypeController {

	public $anaesthetistList;
	
	protected function beforeAction($action)
	{
		$this->anaesthetistList = array();
		foreach (OphAuAnaestheticsatisfactionaudit_AnaesthetistUser::model()->findAll() as $anaesthetist) {
			$this->anaesthetistList[] = $anaesthetist->user;
		}
	
		return parent::beforeAction($action);
	}
	
	public function actionCreate() {
		parent::actionCreate();
	}

	public function actionUpdate($id) {
		parent::actionUpdate($id);
	}

	public function actionView($id) {
		parent::actionView($id);
	}

	public function actionPrint($id) {
		parent::actionPrint($id);
	}
}
