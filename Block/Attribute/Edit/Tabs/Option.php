<?php


Mage::loadClassByFileName("block_core_Template");

class Block_Attribute_Edit_Tabs_Option extends Block_Core_Template
{
    protected $options = null;
    public function __construct()
    {
        $this->setTemplate("./attribute/edit/tabs/option.php");
    }

    public function setOption($options = null)
    {
        if (!$options) {
            $options = Mage::getModel("Model_AttributeModel_OptionModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $query = "select * from `{$options->getTableName()}` where attributeId={$id}";
                $options = $options->fetchAll($query);
                if (!$options) {
                    return $this;
                }
            }
        }
        $this->options = $options;
        return $this;
    }

    public function getOption()
    {
        if (!$this->options) {
            $this->setOption();
        }
        return $this->options;
    }
}
