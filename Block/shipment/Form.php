<?php

Mage::loadClassByFileName('block_core_template');

class Block_Shipment_Form extends Block_Core_Template
{
    protected $shipments = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./shipment/form.php');
    }

    public function getTabContent()
    {
        $tabsObj = Mage::getBlock("Block_Shipment_Form_Tabs");
        $tabs = $tabsObj->getTabs();
        $fetchTab = $this->getRequest()->getGet('tab');
        if (!array_key_exists($fetchTab, $tabs)) {
            $fetchTab = $tabsObj->getDefault();
        }
        $gotTab = Mage::getBlock($tabs[$fetchTab]['className']);
        echo $gotTab->toHtml();
    }
}
