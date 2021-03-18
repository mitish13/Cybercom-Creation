<?php
Mage::loadClassByFileName('Block_Core_Template');

class Block_Attribute_Grid extends Block_Core_Template
{
    protected $attributes = [];

    public function __construct()
    {
        $this->setTemplate('./Attribute/grid.php');
    }

    public function setAttributes($attributes = null)
    {
        if (!$attributes) {
            $attributes = Mage::getModel('Model_AttributeModel')->fetchAll();
        }
        $this->attributes = $attributes;
        return $this;
    }

    public function getAttributes()
    {
        if (!$this->attributes) {
            $this->setAttributes();
        }
        return $this->attributes;
    }
}
