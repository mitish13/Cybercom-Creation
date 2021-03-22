<?php

Mage::loadClassByFileName("Model_Core_Table");

class Model_AttributeModel_OptionModel extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attributeoptions')->setPrimaryKey('optionId');
    }
}
