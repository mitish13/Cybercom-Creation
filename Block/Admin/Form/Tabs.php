<?php

Mage::loadClassByFileName("Block_Core_Form_Tabs");
class Block_Admin_Form_Tabs extends Block_Core_Form_Tabs
{

    protected $tabs = [];
    protected $default = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./admin/form/tabs.php");
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('admin', ["label" => "Admin Information", "className" => 'Block_Admin_Form_Tabs_Form']);
        $this->setDefault('admin');
    }
}
