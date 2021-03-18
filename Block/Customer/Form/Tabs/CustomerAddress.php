<?php

Mage::loadClassByFileName("block_core_template");
class Block_Customer_Form_Tabs_CustomerAddress extends Block_Core_Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./customer/form/tabs/customerAddress.php");
    }

    public function validCustomer()
    {
        $id = $this->getRequest()->getGet('id');
        $customers = Mage::getModel("Model_customerModel");
        $customer = $customers->load($id);
        if ($customer) {
            return true;
        }
        return false;
    }

    public function setCustomerAddress($customers = null)
    {
        if (!$customers) {
            $customers = Mage::getModel("Model_customerModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $customer = $customers->load($id);
                if (!$customer) {
                    return null;
                }
            }
        }
        $this->customers = $customers;
        return $this;
    }
    public function getCustomerAddress()
    {
        if (!$this->customers) {
            $this->setCustomerAddress();
        }
        return $this->customers;
    }
}
