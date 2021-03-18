<?php

Mage::loadClassByFileName('Model_Core_Table_Collection');
class Model_ShipmentModel_Collection extends Model_Core_Table_Collection
{
    public function __construct()
    {
        parent::__construct();
    }
}
