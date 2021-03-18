<?php


Mage::loadClassByFileName("Block_Core_Template");


class Block_Attribute_Edit_Tabs extends Block_Core_Template
{
    protected $tabs = [];
    protected $defaultTab = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./Attribute/Edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTabs('attribute', ['label' => 'Attribute', 'block' => 'Block_Attribute_Edit_Tabs_Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTabs('option', ['label' => 'Options', 'block' => 'Block_Attribute_Edit_Tabs_OptionGrid']);
        }
        $this->setDefaultTab('attribute');
    }

    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTabs(array $tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTabs($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }

    public function getTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        return $this->tabs[$key];
    }

    public function removeTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        unset($this->tabs[$key]);
    }
}
