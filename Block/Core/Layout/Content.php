<?php

Mage::loadClassByFileName("block_core_template");

class Block_Core_Layout_Content extends Block_Core_Template
{
    public function __construct()
    {
        $this->setTemplate("./core/layout/content.php");
    }    
}

?>