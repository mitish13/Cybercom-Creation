<?php
Mage::getBlock('Block_Core_Template');
class Block_Product_Form_Tabs_Media extends Block_Core_Template
{
    protected $imageData = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('product/form/tabs/media.php');
    }
    public function setProductMedia()
    {

        $media = Mage::getModel('Model_MediaModel');
        $id = $this->getRequest()->getGet('id');
        $query = "SELECT * FROM `productgallery` WHERE `productid`= {$id}";
        $this->imageData = $media->fetchAll($query);
        return $this->imageData;
    }
    public function getProductMedia()
    {
        if (!$this->imageData) {
            $this->setProductMedia();
        }
        return $this->imageData;
    }
    public function getTitle()
    {
        return 'Product Media';
    }

}