<?php

Mage::loadClassByFileName("block_core_template");

class Block_Core_Layout_Message extends Block_Core_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./core/layout/message.php");
    }    
}

?>