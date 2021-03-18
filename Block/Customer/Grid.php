<?php


Mage::loadClassByFileName('block_core_template');

class Block_Customer_Grid extends Block_Core_Template{

    protected $customers = null;
    public function __construct()
    {

        $this->setTemplate('./customer/grid.php');
        
    }

    public function setCustomers($customers = null)
    {
        if (!$customers) {
            $customers = Mage::getModel("model_customerModel");
            $customers = $customers->fetchAll();
        }
        $this->customers = $customers;
        return $this;
    }
    public function getCustomers()
    {
        if (!$this->customers) {
            $this->setCustomers();
            
        }
        return $this->customers;     
    }
    public function getTitle()
    {
        return "Manage Customers";
    }

}

?>