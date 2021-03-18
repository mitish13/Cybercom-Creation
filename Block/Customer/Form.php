<?php

Mage::loadClassByFileName('block_core_template');

class Block_Customer_Form extends Block_Core_Template{


  public function __construct()
  {
      parent::__construct();
      $this->setTemplate('./customer/form.php');

  }

  public function getTabContent()
  {
        $tabsObj = Mage::getBlock("block_customer_form_tabs");
        $tabs = $tabsObj->getTabs();
        $fetchTab = $this->getRequest()->getGet('tab'); 
         if(!array_key_exists($fetchTab,$tabs))   
         {
            $fetchTab = $tabsObj->getDefault();   
         }
         $gotTab = Mage::getBlock($tabs[$fetchTab]['className']); 
         echo $gotTab->toHtml();

  }

}

?>