<?php

Mage::loadClassByFileName('Block_Core_Template');

class Block_Attribute_Edit extends Block_Core_Template
{

    protected $attribute = NULL;

    function __construct()
    {
        parent::__construct();
        $this->setTemplate("./Attribute/edit.php");
    }

    public function getTabContent()
    {
        $tabBlock = Mage::getBlock("Block_Attribute_Edit_Tabs");
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = Mage::getBlock($blockClassName);
        return $block;
    }

    public function setAttribute($attribute = NULL)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = Mage::getModel("Model_Attribute");
        if ($id = $this->getRequest()->getGet('id')) {
            $attribute = $attribute->load($id);
        }
        $this->attribute = $attribute;
        return $this->attribute;
    }

    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }

    public function getTitle()
    {
        if ($this->getAttribute()->attributeId) {
            echo 'Update Attribute Details';
        } else {
            echo 'Add Attribute Details';
        }
    }

    public function getFormUrl()
    {
        return $this->getUrl('save');
    }

    public function getButton()
    {
        if ($this->getAttribute()->AttributeId) {
            echo 'Update';
        } else {
            echo 'Add';
        }
    }
}
