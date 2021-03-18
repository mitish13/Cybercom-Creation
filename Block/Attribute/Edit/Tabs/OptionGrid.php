<?php
Mage::loadClassByFileName('Block_Core_Template');

class Block_Attribute_Edit_Tabs_OptionGrid extends Block_Core_Template
{
    protected $options = [];

    public function __construct()
    {
        $this->setTemplate('./View/Attribute/Edit/Tabs/optionGrid.php');
    }

    public function setOptions($options = null)
    {
        try {
            if ($options) {
                $this->options = $options;
                return $this;
            }
            $options = Mage::getModel("Model_Attribute_Option");
            if ($id = $this->getRequest()->getGet('id'))
                $options = $options->load($id);

            if (!$options) {
                throw new Exception("Id Not Found");
            }
            $this->options = $options;
            return $this;
        } catch (exception $e) {
            $message = Mage::getModel("Model_Admin_Message");
            $message->setFailure($e->getMessage());
            $this-redirect('grid');
        }
    }

    public function getOptions()
    {
        $options = Mage::getModel('Model_Attribute_Option');
        $id = $this->getRequest()->getGet('id');
        if (!$id) {
            return false;
        }
        $query = "SELECT * FROM `{$options->getTableName()}`
        WHERE `attributeId` = {$id}
        ORDER BY `sortOrder` ASC";

        $options = $options->fetchAll($query)->getData();
        return $options;
    }
}
