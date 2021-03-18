<?php


Mage::loadClassByFileName("Model_Core_Table");
class Model_CustomerGroupModel extends Model_Core_Table{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer_address')->setPrimaryKey('address_id');
    }
}

?>