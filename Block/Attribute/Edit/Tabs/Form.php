<?php

Mage::loadClassByFileName("Block_Core_Template");

class Block_Attribute_Edit_Tabs_Form extends Block_Core_Template
{
    protected $attribute = null;

    function __construct()
    {
        parent::__construct();
        $this->setTemplate("./View/Attribute/Edit/Tabs/form.php");
    }

    public function setAttribute($attribute = null)
    {
        try {
            if ($attribute) {
                $this->attribute = $attribute;
                return $this;
            }
            $attribute = Mage::getModel("Model_Attribute");
            if ($id = $this->getRequest()->getGet('id'))
                $attribute = $attribute->load($id);

            if (!$attribute) {
                throw new Exception("Id Not Found");
            }
            $this->attribute = $attribute;
            return $this;
        } catch (exception $e) {
            $message = Mage::getModel("Model_Admin_Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
        }
    }


    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }

    public function getButton()
    {
        if ($this->getAttribute()->attributeId) {
            echo 'Update';
        } else {
            echo 'Add';
        }
    }

    public function getBackendTypeOptions()
    {
        return [
            'varchar' => 'Varchar',
            'int' => 'Int',
            'decimal' => 'Decimal',
            'text' => 'Text'
        ];
    }

    public function getInputTypeOptions()
    {
        return [
            'text' => 'Text Box',
            'textarea' => 'Text Area',
            'selsect' => 'Select',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio'
        ];
    }

    public function getEntityTypeOptions()
    {
        return [
            'product' => 'Product',
            'category' => 'Category'
        ];
    }
}
