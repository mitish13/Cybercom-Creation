<?php

Mage::loadClassByFileName("Block_Core_Form_Tabs");
class Block_Payment_Form_Tabs extends Block_Core_Form_Tabs
{

    protected $tabs = [];
    protected $default = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./payment/form/tabs.php");
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('payment', ["label" => "Payment Information", "className" => 'Block_Payment_Form_Tabs_Form']);
        $this->setDefault('payment');
    }
}
