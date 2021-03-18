<?php

Mage::loadClassByFileName('block_core_template');

class Block_Product_Form extends Block_Core_Template
{
  protected $products = null;

  public function __construct()
  {
    parent::__construct();
    $this->setTemplate('./product/form.php');
  }

  public function getTabContent()
  {
    $tabsObj = Mage::getBlock("block_product_form_tabs");
    $tabs = $tabsObj->getTabs();
    $fetchTab = $this->getRequest()->getGet('tab');
    if (!array_key_exists($fetchTab, $tabs)) {
      $fetchTab = $tabsObj->getDefault();
    }
    $gotTab = Mage::getBlock($tabs[$fetchTab]['className']);
    echo $gotTab->toHtml();
  }
}
