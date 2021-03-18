<?php

Mage::loadClassByFileName('block_core_template');

class Block_Core_Layout extends Block_Core_Template{
    public function __construct()
    {
        $this->setTemplate("./core/layout/two_column_leftBar.php");
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $sidebar = Mage::getBlock("block_core_layout_sidebar");
        $this->addChild($sidebar,"Sidebar");
        
        $header = Mage::getBlock("block_core_layout_header");
        $this->addChild($header,"Header");
        
        $footer = Mage::getBlock("block_core_layout_footer");
        $this->addChild($footer,"Footer");
        
        $content = Mage::getBlock("block_core_layout_content");
        $this->addChild($content,"Content");

    }
    
}

?>