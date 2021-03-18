<?php

Mage::loadClassByFileName('block_core_template');

class Block_Shipment_Grid extends Block_Core_Template
{

    protected $shipments = null;
    protected $message = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./shipment/grid.php');
    }

    public function setShipment($shipments = null)
    {
        if (!$shipments) {
            $shipments = Mage::getModel("model_shipmentModel");
            $shipments = $shipments->fetchAll();
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
    public function getTitle()
    {
        return "Manage Shipments";
    }
}
