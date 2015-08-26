<?php

class NpfModule extends DaWebModuleAbstract {

	protected $_urlRules = array(
	  'npf/<id:\d+>' => 'npf/default/view',
	  'ratings' => 'npf/default/index',
	);
	
	public function init() {
		$this->setImport(array(
			$this->id.'.models.*',
			$this->id.'.components.*',
		));
	}

}
