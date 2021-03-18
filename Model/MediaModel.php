<?php

Mage::loadClassByFileName("Model_Core_Table");
class Model_MediaModel extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('productgallery')->setPrimaryKey('productGalleryId');
    }
}
