<?php

Mage::loadClassByFileName("block_core_template");
class Block_Product_Form_Tabs_Media extends Block_Core_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./product/form/tabs/media.php");
    }

    public function getMedia($id)
    {
        $mediaModel = Mage::getModel("model_mediaModel");
        $query = "select * from `productmedia` where `productId` =" . $id;
        $media = $mediaModel->fetchAll($query);
        return $media;
    }
}
