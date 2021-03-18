<?php

Mage::loadClassByFileName("block_core_template");

class Block_Core_Layout_Footer extends Block_Core_Template
{
    public function __construct()
    {
        $this->setTemplate("./core/layout/footer.php");
    }    
}

?>