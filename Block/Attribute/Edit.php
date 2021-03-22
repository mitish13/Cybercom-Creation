<?php

Mage::loadClassByFileName('block_core_Template');

class Block_Attribute_Edit extends Block_Core_Template
{
  protected $attributes = null;

  public function __construct()
  {
    $this->setTemplate('./attribute/edit.php');
  }

  public function getTabContent()
  {
    $tabsObj = Mage::getBlock("Block_Attribute_Edit_Tabs");
    $tabs = $tabsObj->getTabs();
    $fetchTab = $this->getRequest()->getGet('tab');
    if (!array_key_exists($fetchTab, $tabs)) {
      $fetchTab = $tabsObj->getDefault();
    }
    $gotTab = \Mage::getBlock($tabs[$fetchTab]['className']);
    echo $gotTab->toHtml();
  }
}
