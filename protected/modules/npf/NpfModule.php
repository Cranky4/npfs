<?php

    class NpfModule extends DaWebModuleAbstract
    {
        public $ratingPageMenuId = 116;
        public $calculatorPageMenuId = 117;
        public $newsPageMenuId = 121;

        protected $_urlRules = array(
          'npf/<id:\d+>' => 'npf/default/view',
          'ratings'      => 'npf/default/index',
          'calculator'   => 'npf/default/calculator',
          'blank'        => 'npf/default/blank',
        );

        public function init()
        {
            $this->setImport(array(
              $this->id.'.models.*',
              $this->id.'.components.*',
            ));
        }

    }
