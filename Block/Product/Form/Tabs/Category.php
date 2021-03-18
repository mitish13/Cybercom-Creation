<?php

Mage::loadClassByFileName("block_core_template");
class Block_Product_Form_Tabs_Category extends Block_Core_Template{

    public function __construct()
    {
        $this->setTemplate("./product/form/tabs/category.php");
    }

}