<?php

Mage::loadClassByFileName("Block_Core_Form_Tabs");
class Block_Attribute_Edit_Tabs extends Block_Core_Form_Tabs
{

    protected $tabs = [];
    protected $default = null;
    public function __construct()
    {
        $this->setTemplate("./attribute/edit/tabs.php");
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('attribute', ["label" => "Attribute Information", "className" => 'Block_Attribute_Edit_Tabs_Form']);
        if($this->getRequest()->getGet('id')){
            $this->addTab('option', ["label" => "Option Information", "className" => 'Block_Attribute_Edit_Tabs_Option']);
        }
        $this->setDefault('attribute');
    }
}
