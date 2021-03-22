<?php


Mage::loadClassByFileName("block_core_Template");

class Block_Attribute_Edit_Tabs_Form extends Block_Core_Template
{
    protected $attributes;
    public function __construct()
    {
        $this->setTemplate("./attribute/edit/tabs/form.php");
    }

    public function setAttribute($attributes = null)
    {
        if (!$attributes) {
            if ($id = $this->getRequest()->getGet('id')) {
                $attributes = Mage::getModel("Model_AttributeModel");
                $attribute = $attributes->load($id);
                if (!$attribute) {
                    return null;
                }
            }else{
            $attributes = Mage::getModel("model_attributeModel");
        }
    }
        
        
        $this->attributes = $attributes;
       
        return $this;
    }
    
    public function getAttribute()
    {
        if (!$this->attributes) {
            $this->setAttribute();
        }
        return $this->attributes;
    }
}
