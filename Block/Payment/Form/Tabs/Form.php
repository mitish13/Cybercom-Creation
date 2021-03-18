<?php

Mage::loadClassByFileName("Block_Core_Template");
class Block_Payment_Form_Tabs_Form extends Block_Core_Template
{
    protected $payments = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./payment/form/tabs/form.php");
    }

    public function setPayment($payments = null)
    {
        if (!$payments) {
            $payments = Mage::getModel("Model_paymentModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $payment = $payments->load($id);
                if (!$payment) {
                    return null;
                }
            }
        }
        $this->payments = $payments;
        return $this;
    }
    public function getPayment()
    {
        if (!$this->payments) {
            $this->setPayment();
        }
        return $this->payments;
    }
}
