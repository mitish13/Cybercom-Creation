<?php

Mage::loadClassByFileName("Model_Core_Table");
class Model_ShipmentModel extends Model_Core_Table{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('shipping')->setPrimaryKey('shippingId');
    }
}

?>