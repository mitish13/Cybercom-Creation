<?php

Mage::loadClassByFileName('block_core_template');

class Block_Payment_Form extends Block_Core_Template
{
    protected $payments = null;

    public function __construct()
    {
        $this->setTemplate('./payment/form.php');
    }

    public function getTabContent()
    {
        $tabsObj = Mage::getBlock("block_payment_form_tabs");
        $tabs = $tabsObj->getTabs();
        $fetchTab = $this->getRequest()->getGet('tab');
        if (!array_key_exists($fetchTab, $tabs)) {
            $fetchTab = $tabsObj->getDefault();
        }
        $gotTab = Mage::getBlock($tabs[$fetchTab]['className']);
        echo $gotTab->toHtml();
    }

    // public function setPayment($payments = null)
    // {
    //     if (!$payments) 
    //     {
    //         $payments = Mage::getModel("Model_paymentModel");
    //         if ($id = $this->getRequest()->getGet('id')) 
    //         {
    //             $payment = $payments->load($id);
    //             if (!$payment) {
    //                 return null;
    //             }
    //         }  
    //     }
    //     $this->payments = $payments;
    //     return $this;
    // }
    // public function getPayment()
    // {
    //     if (!$this->payments) {
    //         $this->setPayment();
    //     }
    //     return $this->payments;     
    // }  
}
