<?php

Mage::loadClassByFileName("Block_Core_Form_Tabs");
class Block_Product_Form_Tabs extends Block_Core_Form_Tabs
{

    protected $tabs = [];
    protected $default = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./product/form/tabs.php");
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('product', ["label" => "Product Information", "className" => 'Block_Product_Form_Tabs_Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTab('media', ["label" => "Media", "className" => 'Block_Product_Form_Tabs_Media']);
        }

        $this->setDefault('product');
    }
}
