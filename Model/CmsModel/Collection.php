<?php

Mage::loadClassByFileName('Model_Core_Table_Collection');
class Model_CmsModel_Collection extends Model_Core_Table_Collection
{
    public function __construct()
    {
        parent::__construct();
    }
}