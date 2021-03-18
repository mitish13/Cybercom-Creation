<?php
Mage::loadClassByFileName("Model_Core_Table");

class Model_AttributeModel extends Model_Core_Table
{
    public function __construct()
    {
        $this->setTableName("attribute");
        $this->setPrimaryKey("attributeId");
    }
}
