<?php

Mage::loadClassByFileName("Block_Core_Form_Tabs");
class Block_Shipment_Form_Tabs extends Block_Core_Form_Tabs
{

    protected $tabs = [];
    protected $default = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./shipment/form/tabs.php");
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('shipment', ["label" => "Shipment Information", "className" => 'Block_Shipment_Form_Tabs_Form']);
        $this->setDefault('shipment');
    }
}
