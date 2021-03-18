<?php

Mage::loadClassByFileName("model_core_session");

class Model_Admin_Session extends Model_Core_Session{

    public function __construct()
    {
        parent::__construct();
        $this->setNameSpace('admin'); 
    }
}
