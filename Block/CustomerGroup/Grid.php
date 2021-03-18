<?php


Mage::loadClassByFileName('block_core_template');

class Block_CustomerGroup_Grid extends Block_Core_Template{

    protected $customerGroups = null;
    public function __construct()
    {
        $this->setTemplate('./customerGroup/grid.php');
        
    }

    public function setCustomerGroups($customerGroups = null)
    {
        if (!$customerGroups) {
            $customerGroups = Mage::getModel("model_customerGroupModel");
            $customerGroups = $customerGroups->fetchAll();
        }
        $this->customerGroups = $customerGroups;
        return $this;
    }
    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroups();
            
        }
        return $this->customerGroups;     
    }
    public function getTitle()
    {
        return "Manage Customer Group";
    }

}
