<?php

Mage::loadClassByFileName("block_core_template");
class Block_Customer_Form_Tabs_Form extends Block_Core_Template{
    
    protected $customers = null;
    protected $customerGroupOptions = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./customer/form/tabs/form.php");
    }


    public function setCustomer($customers = null)
    {
        if (!$customers) 
        {
            $customers = Mage::getModel("Model_customerModel");
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $customer = $customers->load($id);
                if (!$customer) {
                    return null;
                }
            }  
        }
        $this->customers = $customers;
        return $this;
    }
    public function getCustomer()
    {
        if (!$this->customers) {
            $this->setCustomer();
        }
        return $this->customers;     
    }

    public function getCustomerGroupOptions(){

        if(!$this->customerGroupOptions){
            $query = "select `group_id`,`name` from customer_group";
            $this->customerGroupOptions = $this->getCustomer()->getAdapter()->fetchPairs($query);
        }
          
            return $this->customerGroupOptions;

    }
    }

