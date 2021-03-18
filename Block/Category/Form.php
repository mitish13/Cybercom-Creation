<?php

Mage::loadClassByFileName('block_core_template');

class Block_Category_Form extends Block_Core_Template
{
    protected $categories = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./category/form.php');
    }

    public function getTabContent()
    {
        $tabsObj = Mage::getBlock("block_category_form_tabs");
        $tabs = $tabsObj->getTabs();
        $fetchTab = $this->getRequest()->getGet('tab');
        if (!array_key_exists($fetchTab, $tabs)) {
            $fetchTab = $tabsObj->getDefault();
        }
        $gotTab = Mage::getBlock($tabs[$fetchTab]['className']);
        echo $gotTab->toHtml();
    }

    
    
}
