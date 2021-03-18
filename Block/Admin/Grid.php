<?php

Mage::loadClassByFileName('block_core_template');

class Block_Admin_Grid extends Block_Core_Template
{

    protected $admins = null;
    protected $message = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./admin/grid.php');
    }

    public function setAdmin($admins = null)
    {
        if (!$admins) {
            $admins = Mage::getModel("model_adminModel");
            $admins = $admins->fetchAll();
        }
        $this->admins = $admins;
        return $this;
    }
    public function getAdmin()
    {
        if (!$this->admins) {
            $this->setAdmin();
        }
        return $this->admins;
    }
    public function getTitle()
    {
        return "Manage Admins";
    }
}
