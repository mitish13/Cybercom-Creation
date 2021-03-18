<?php

Mage::loadClassByFileName("block_core_template");
class Block_Category_Form_Tabs_Media extends Block_Core_Template{

    public function __construct()
    {
        $this->setTemplate("./category/form/tabs/media.php");
    }

}