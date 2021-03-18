<?php

Mage::loadClassByFileName("block_core_template");

class Block_Core_Layout_Sidebar extends Block_Core_Template
{
    public function __construct()
    {
        $this->setTemplate("./core/layout/sidebar.php");
    }    
}

?>