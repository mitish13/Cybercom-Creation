<?php

Mage::loadClassByFileName("Model_Core_Table");
class Model_AttributeModel extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('attribute')->setPrimaryKey('attributeId');
    }

    public function getBackendTypeOption()
    {
        return [
            'varchar(255)' => 'Varchar',
            'int' => 'Int',
            'decimal' => 'Decimal',
            'text' => 'Text',
            'boolean' => 'Boolean'
        ];
    }

    public function getInputTypeOption()
    {
        return [
            'textbox' => 'Textbox',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'multiple' => 'Select Multiple',
            'checkbox' => 'Checkbox',
            'radio' => 'radio'
        ];
    }

    public function getEntityType()
    {
        return [
            'product' => 'Product',
            'category' => 'Category'
        ];
    }
}
