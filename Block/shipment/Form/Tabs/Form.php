<?php

Mage::loadClassByFileName("block_core_template");
class Block_Shipment_Form_Tabs_Form extends Block_Core_Template
{
    protected $shipments = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate("./shipment/form/tabs/form.php");
    }

    public function setShipment($shipments = null)
    {
        if (!$shipments) {
            $shipments = Mage::getModel("Model_ShipmentModel");
            if ($id = $this->getRequest()->getGet('id')) {
                $shipment = $shipments->load($id);
                if (!$shipment) {
                    return null;
                }
            }
        }
        $this->shipments = $shipments;
        return $this;
    }

    public function getShipment()
    {
        if (!$this->shipments) {
            $this->setShipment();
        }
        return $this->shipments;
    }
}
