<?php

Mage::loadClassByFileName("block_core_template");
class Block_CustomerGroup_Form_Tabs_Form extends Block_Core_Template
{
    protected $customerGroups = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./customerGroup/form/tabs/form.php");
    }

    public function setCustomerGroup($customerGroups = null)
    {
        if (!$customerGroups) {
            $customerGroups = Mage::getModel("Model_customerGroupModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $customerGroup = $customerGroups->load($id);
                if (!$customerGroup) {
                    return null;
                }
            }
        }
        $this->customerGroups = $customerGroups;
        return $this;
    }

    public function getCustomerGroup()
    {
        if (!$this->customerGroups) {
            $this->setcustomerGroup();
        }
        return $this->customerGroups;
    }
}
