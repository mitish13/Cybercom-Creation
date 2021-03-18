<?php

Mage::loadClassByFileName('Block_Core_Template');

class Block_Admin_Form extends Block_Core_Template
{
    protected $admins = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./admin/form.php');
    }

    public function getTabContent()
    {
        $tabsObj = Mage::getBlock("Block_Admin_Form_Tabs");
        $tabs = $tabsObj->getTabs();
        $fetchTab = $this->getRequest()->getGet('tab');
        if (!array_key_exists($fetchTab, $tabs)) {
            $fetchTab = $tabsObj->getDefault();
        }
        $gotTab = Mage::getBlock($tabs[$fetchTab]['className']);
        echo $gotTab->toHtml();
    }
}
