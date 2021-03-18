<?php


Mage::loadClassByFileName('block_core_template');

class Block_Payment_Grid extends Block_Core_Template{

    protected $payments = null;
    public function __construct()
    {
        $this->setTemplate('./payment/grid.php');
        
    }
    public function setPayments($payments = null)
    {
        if (!$payments) {
            $payments = Mage::getModel("model_paymentModel");
            $payments = $payments->fetchAll();
        }
        $this->payments = $payments;
        return $this;
    }
    public function getPayments()
    {
        if (!$this->payments) {
            $this->setPayments();
            
        }
        return $this->payments;     
    }
    public function getTitle()
    {
        return "Manage Payments";
    }

}

?>